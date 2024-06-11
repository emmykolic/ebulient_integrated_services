<?php
class contact extends boiler
{
	public function __construct()
	{
		parent::__construct();
		$this->stats = new stats($this->db);
	}

	public function  defaultb()
	{
		// $is_landing = 1;
		// $this->set_token();
		// $routes = $this->db->query("SELECT * FROM routes");
		include_once 'themes/' . $this->setting->landing_theme . '/header.php';
		include_once 'themes/' . $this->setting->landing_theme . '/contact.php';
		include_once 'themes/' . $this->setting->landing_theme . '/footer.php';
	}

	public function contactAction(){
		// Validate form submission
			$name = $this->clean->post('name');
			$email = $this->clean->post('email');
			$subject = $this->clean->post('subject');
			$message = $this->clean->post('message');
	
			// Validate required fields
			if ($name=="" || $email=="" || $subject=="" || $message=="") {
				$this->error = 1;
				$this->error_msg = "All fields are required.";
			}
	
			// Validate email format
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$this->error = 1;
				$this->error_msg = "Invalid email format.";
			}
	
			if ($this->error == 0) {
				// Insert data into the database
				$date_created = time();
				$this->db->query("INSERT INTO contacts (name, email, subject, message, date_created) VALUES ('$name', '$email', '$subject', '$message', '$date_created' )");
				// $this->db->query($query);

				// echo 'Hi';
				// Send email to the receiver
				$to = 'info@eislltd.com'; // Replace with receiver's email
				$headers = "From: $name <$email>\r\n";
				$email_subject = "New Contact Form Submission: $subject";
				$email_body = "You have received a new message from the contact form on your website.\n\n".
							  "Here are the details:\n".
							  "Name: $name\n".
							  "Email: $email\n".
							  "Subject: $subject\n".
							  "Message:\n$message\n";
	
				if (mail($to, $email_subject, $email_body, $headers)) {
					$this->alert->set("Message sent successfully.", "success");
					header('location:'.BURL.'contact');
				} else {
					$this->alert->set("Failed to send message. Please try again later.", "danger");
					header('location:'.BURL.'contact');
				}
			} else {
				$this->alert->set($this->error_msg, "danger");
				header('location:'.BURL.'contact');
			}
	}
	
}