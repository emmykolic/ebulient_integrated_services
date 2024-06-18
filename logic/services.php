<?php
class services extends boiler
{

	public function __construct()
	{
		parent::__construct();
	}


	public function  defaultb()
	{
		// $this->auth->user("dashboard");
		$this->page_title = "Services";
		$this->stats = new stats($this->db);
		$uid = $this->auth->uid;
		// $users = $this->db->query("SELECT * FROM users WHERE uid = '$uid' ");
		// $users = $users->fetch_assoc();
		// $users_num = $this->db->query("SELECT * FROM users");
		// $users_num = $users_num->num_rows;
		// $drivers = $this->db->query("SELECT * FROM users WHERE type=4 ");
		// $driver_num = $drivers->num_rows;
		// $audio = $this->db->query("SELECT * FROM audios ");
		// $audio_num = $audio->num_rows;
		$this->set_token();
		include_once 'themes/' . $this->setting->landing_theme . '/header.php';
		include_once 'themes/' . $this->setting->landing_theme . '/services.php';
		include_once 'themes/' . $this->setting->landing_theme . '/footer.php';
	}

	public function chemical_cleaning(){
		$this->page_title = "Chemical Cleaning Services";
		// $this->stats = new stats($this->db);
	
		// $this->set_token();
		$ccid_result = $this->db->query("SELECT ccid FROM chemical_cleaning");
		if ($ccid_result) {
			$ccid = $ccid_result->fetch_assoc();
			if ($ccid) {
				$get_chemical_cleaning = $this->db->query("SELECT * FROM chemical_cleaning");
				// $get_chemical_cleaning = $this->db->query("SELECT * FROM chemical_cleaning WHERE ccid = '" . $ccid['ccid'] . "'");
				if ($get_chemical_cleaning) {
					include_once 'themes/' . $this->setting->landing_theme . '/header.php';
					include_once 'themes/' . $this->setting->landing_theme . '/chemical_cleaning_services.php';
					include_once 'themes/' . $this->setting->landing_theme . '/footer.php';
				} else {
					echo "Error fetching chemical cleaning data: " . $this->db->error;
				}
			} else {
				echo "No ccid found.";
			}
		} else {
			echo "Error fetching ccid: " . $this->db->error;
		}
	}
	
	
	public function chemical_cleaning_action() {
		$service_name = $this->clean->post('service_name');
		$points = $this->clean->post('points');
		$service_img = $_FILES['service_img']; // Change this line to access the file input for the image
		
		// Validate required fields
		if ($service_name=="" || $points=="") {
			$this->error = 1;
			$this->error_msg = "All fields are required.";
		}

		$uploadDir = 'assets/tiny_uploads/';
		$allowedImageTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif', 'image/webp'];

		// Handle Image File Upload
		$imageFilePath = $uploadDir . basename($service_img['name']);
		$imageFileType = $this->getFileMimeType($service_img['tmp_name']);
		
		echo "Image File Type: " . $imageFileType . "<br>";  // Debugging line
	
		if (in_array($imageFileType, $allowedImageTypes)) {
			if (move_uploaded_file($service_img['tmp_name'], $imageFilePath)) {
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
			$this->db->query("INSERT INTO chemical_cleaning (service_name, points, service_img, date_created) VALUES ('$service_name', '$points',  '$imageFilePath', '$date_created')");
	
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

	public function engineering(){
		include_once 'themes/' . $this->setting->landing_theme . '/header.php';
		include_once 'themes/' . $this->setting->landing_theme . '/engineering_services.php';
		include_once 'themes/' . $this->setting->landing_theme . '/footer.php';
	}

	public function supply_services(){
		include_once 'themes/' . $this->setting->landing_theme . '/header.php';
		include_once 'themes/' . $this->setting->landing_theme . '/supply_services.php';
		include_once 'themes/' . $this->setting->landing_theme . '/footer.php';
	}

}
