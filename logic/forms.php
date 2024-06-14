<?php
class forms extends boiler{
    public function __construct()
	{
		parent::__construct();
		$this->stats = new stats($this->db);
	}

	public function  defaultb()
	{
		$this->auth->user("dashboard");
		$this->page_title = "Forms | Dashboard";
		// $this->stats = new stats($this->db);
		$uid = $this->auth->uid;
		$this->set_token();
		$this->auth->user();
		include_once 'themes/' .  $this->setting->admin_theme . '/header.php';
		include_once 'themes/' .  $this->setting->admin_theme . '/forms.php';
		include_once 'themes/' .  $this->setting->admin_theme . '/footer.php';
	}

	public function rental_action() {
		$uploadDir = 'assets/uploads/';
		$allowedImageTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif', 'image/webp'];
	
		$uid = $this->auth->uid;
		$name = $this->clean->post("name");
		$rental_img = $_FILES['rental_img']; // Change this line to access the file input for the image
	
		// Handle Image File Upload
		$imageFilePath = $uploadDir . basename($rental_img['name']);
		$imageFileType = $this->getFileMimeType($rental_img['tmp_name']);
		
		echo "Image File Type: " . $imageFileType . "<br>";  // Debugging line
	
		if (in_array($imageFileType, $allowedImageTypes)) {
			if (move_uploaded_file($rental_img['tmp_name'], $imageFilePath)) {
				// Image upload successful
			} else {
				$this->error = 1;
				$this->error_msg .= "Error moving uploaded image file.<br>";
			}
		} else {
			$this->error = 1;
			$this->error_msg .= "Invalid image file type.<br>";
		}
	
		$date_created = time();
	
		// Insert data into the database
		if ($this->error == 0) {
			$this->db->query("INSERT INTO rentals (name, rental_img, date_created) VALUES ('$name', '$imageFilePath', '$date_created')");
	
			$this->alert->set("Upload successful", "success");
			header('Location: ' . BURL . 'forms'); // Redirect to a success page
		} else {
			$this->alert->set($this->error_msg, "danger");
			header('Location: ' . BURL . 'forms'); // Redirect back to the upload page
		}
	}
	

	public function getFileMimeType($filePath) {
		if (function_exists('mime_content_type')) {
			return mime_content_type($filePath);
		} else {
			// Fallback method
			$finfo = finfo_open(FILEINFO_MIME_TYPE);
			$mimeType = finfo_file($finfo, $filePath);
			finfo_close($finfo);
			return $mimeType;
		}
	}

}
?>