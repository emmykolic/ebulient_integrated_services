<?php
class index extends boiler
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
		include_once 'themes/' . $this->setting->landing_theme . '/index.php';
		include_once 'themes/' . $this->setting->landing_theme . '/footer.php';
	}


	public function booking_action()
	{
		$this->validate();
		$route = $this->clean->post('route');
		$trip_date = $this->clean->post('trip_date');
		$ticket_type = $this->clean->post('ticket_type');
		if ($route == "" || $trip_date == "" || $ticket_type == "") {
			$this->error = 1;
			$this->error_msg .= " Fill up empty fields";
		}

		$check_route = $this->db->query("SELECT * FROM routes WHERE rid=$route");
		if ($check_route->num_rows < 1) {
			$this->error = 1;
			$this->error_msg .= " invalid Route";
		} else {
			$check_route = $check_route->fetch_assoc();
			$price = $check_route['price'];
		}
		if ($this->error == 0) {
			$trips = $this->db->query("SELECT * FROM trips,routes WHERE trips.route=routes.rid AND trips.route=$route AND trips.trip_date='$trip_date'");
			include_once 'themes/' . $this->setting->landing_theme . '/header.php';
			include_once 'themes/' . $this->setting->landing_theme . '/index_booking_action.php';
			include_once 'themes/' . $this->setting->landing_theme . '/footer.php';
		} else {
			echo $this->error_msg;
			$this->alert->set($this->error_msg, "danger");
			header('location:' . BURL . "/index");
		}
	}

	public function booking_action_action()
	{

		$ticket_type = $this->clean->post('ticket_type');

		if ($ticket_type == "") {
			$this->error = 1;
			$this->error_msg .= "Cannot detect your ticket type<br>";
		} else {
			$route = $this->clean->post('route');
			if ($route == "") {
				$this->error = 1;
				$this->error_msg .= " Cannot detect your route, please try again<br>";
			} else {
				$check_route = $this->db->query("SELECT * FROM routes WHERE rid=$route");
				if ($check_route->num_rows < 1) {
					$this->error = 1;
					$this->error_msg .= " invalid Route<br>";
				} else {
					$check_route = $check_route->fetch_assoc();
					$price = $check_route['price'];
					if ($ticket_type == "Single Ticket") {
						$cost = $price;
					} elseif ($ticket_type == "Return Ticket") {
						$cost = $price * 2;
					} else {
						$this->error = 1;
						$this->error_msg .= " Something went wrong, couldn't calculate your ticket cost!<br>";
					}
				}
			}
		}
		$trip = $this->clean->post('trip');
		if ($trip != "") {
			$check_trip = $this->db->query("SELECT * FROM trips WHERE tid=$trip");
			if ($check_trip->num_rows < 1) {
				$this->error = 1;
				$this->error_msg .= " invalid Trip<br>";
			}
			$pref_time = "Trip official time";
		} else {
			$pref_time = $this->clean->post('pref_time');
			$trip = 0;
			if ($pref_time == "") {
				$this->error = 1;
				$this->error_msg .= " Something went wrong! <br>";
			}
		}

		$trip_date = $this->clean->post('trip_date');

		$name = $this->clean->post('name');
		if ($name == "") {
			$this->error = 1;
			$this->error_msg .= " Fill up the name field <br>";
		}
		$email = $this->clean->post('email');
		if ($email == "") {
			$this->error = 1;
			$this->error_msg .= " Fill up the email field <br>";
		}
		$address = $this->clean->post('address');
		if ($address == "") {
			$this->error = 1;
			$this->error_msg .= " Fill up the address field <br>";
		}
		$phone = $this->clean->post('phone');
		if ($phone == "") {
			$this->error = 1;
			$this->error_msg .= " Fill up the phone no field <br>";
		}
		$nok_name = $this->clean->post('nok_name');
		if ($nok_name == "") {
			$this->error = 1;
			$this->error_msg .= " Fill up the next of kin name field field <br>";
		}
		$nok_address = $this->clean->post('nok_address');
		if ($nok_address == "") {
			$this->error = 1;
			$this->error_msg .= " Fill up next of kin address field <br>";
		}
		$nok_phone = $this->clean->post('nok_phone');
		if ($nok_phone == "") {
			$this->error = 1;
			$this->error_msg .= " Fill up next of kin phone no field <br>";
		}

		$ref = $this->clean->post('ref');
		if ($ref == "") {
			$this->error = 1;
			$this->error_msg .= " no reference for this transaction";
		}


		if ($this->error == 0) {
			$code = new codegen($this->db, 'bookings', "pin");
			$pin = $code->unique(10);
			$this->db->query("INSERT INTO bookings (trip_date, route, fullname, phone, nok_fullname, nok_phone, nok_address, address, prefered_time, email, ticket_type, trip , pin, ref) VALUES ('$trip_date','$route','$name','$phone','$nok_name','$nok_phone','$nok_address','$address','$pref_time','$email','$ticket_type','$trip','$pin','$ref') ");
			$result = array();
			//The parameter after verify/ is the transaction reference to be verified
			$url = 'https://api.paystack.co/transaction/verify/' . $ref;

			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt(
				$ch,
				CURLOPT_HTTPHEADER,
				[
					'Authorization: Bearer ' . PAY_STACK_SECRET_KEY
				]
			);
			$request = curl_exec($ch);
			curl_close($ch);

			if ($request) {
				$result = json_decode($request, true);
				if ($result) {
					if ($result['data']) {
						//something came in
						if ($result['data']['status'] == 'success') {
							$chargeAmount = ($result['data']['amount']) / 100;
							if ($chargeAmount == $cost) {
								$this->db->query("UPDATE bookings SET status=1 WHERE ref='$ref'");
								$title = "Your Genext Ticket";
								$message = "You Completeted a payment for a trip with Genext motors. <br>";
								$message .= "Your ticket pin is $pin <br>";
								$message .= "If you please keep this pin safe it would be used to validate you ticket <br>";
								$body = "
								<html>
								<body> 
									<div style='width:100%;margin:0px auto;background-color:red;padding-top:50px;'>
										<div style='width:70%;margin:0px auto;background-color:white;padding:25px;'>
											<h2>" . $title . "</h1>
											<p>" . $message . "</p>
										</div>
									</div>
								</body>
								</html>
									";
								$this->mail->send($email, $title, $body);
								echo 1;
							} else {
								echo "a problem has occured with your payment";
							}
						} else {
							echo "Transaction was not successful: Last gateway response was: " . $result['data']['gateway_response'];
						}
					} else {
						echo $result['message'];
					}
				} else {
					//print_r($result);
					die("Something went wrong while trying to convert the request variable to json. Uncomment the print_r command to see what is in the result variable.");
				}
			} else {
				//var_dump($request);
				die("Something went wrong while executing curl. Uncomment the var_dump line above this line to see what the issue is. Please check your CURL command to make sure everything is ok");
			}
		} else {
			echo $this->error_msg;
		}
	}


	public function  payment_success($ref = "")
	{
		$this->page_title = "Payment Success";
		$this->set_token();
		include_once 'themes/' . $this->setting->landing_theme . '/header.php';
		include_once 'themes/' . $this->setting->landing_theme . '/index_payment_success.php';
		include_once 'themes/' . $this->setting->landing_theme . '/footer.php';
	}


	public function  contact()
	{
		$this->page_title = "Contact Us";
		$this->page_description = $this->setting->site_description;
		$this->page_keywords = "Buy, Rent, lease, properties, agent, hire artisans, property advisor";
		$this->page_author = "Eauston Properties";
		$this->page_image = $this->setting->site_logo;
		$this->set_token();
		include_once 'themes/' . $this->setting->landing_theme . '/header.php';
		include_once 'themes/' . $this->setting->landing_theme . '/index_contact.php';
		include_once 'themes/' . $this->setting->landing_theme . '/footer.php';
	}

	public function contactAction()
	{
		$this->validate();
		$email = $this->clean->post('email');
		$name = $this->clean->post('name');
		$phone = $this->clean->post('phone');
		$message = $this->clean->post('message');
		if ($phone == "" || $email == "" || $name == "") {
			$this->error = 1;
			$this->error_msg .= " Fill up empty fields";
		}
		if (preg_match('/^[A-Za-z\s\. ]+$/', $name) == false) {
			$this->error = 1;
			$this->error_msg .= ' Invalid Name ! ';
		}
		if ($this->error == 0) {
			$mail = new mail();
			$title = "Email from " . $name;
			$body = '<title>' . $title . '</title>
		   </head><body style="background-color: #ccc; padding:5%;"><div style="min-height:200px;background-color: white;width:70%;margin: 20px auto;border-radius: 10px; padding:15px;">
		   <h2 style="color:#ccc">' . $title . '</h2>
		   <p>Phone:' . $phone . '</p>
		   <p>Email:' . $email . '</p>
		   <p>Message:' . $message . '</p>
		   </div></body></html>';
			$mail->send($title, $body, $this->setting->site_email);


			$this->alert->set("Your message has been sent", "success");
			header('location:' . BURL . "/index/contact");
		} else {

			$this->alert->set($this->error_msg, "danger");
			header('location:' . BURL . "/index/contact");
		}
	}


	public function  privacyPolicy()
	{
		$this->page_title = "Privacy Policy";
		$this->set_token();
		include_once 'themes/' . $this->setting->landing_theme . '/header.php';
		include_once 'themes/' . $this->setting->landing_theme . '/privacyPolicy.php';
		include_once 'themes/' . $this->setting->landing_theme . '/footer.php';
	}


	public function  returnPolicy()
	{
		$this->page_title = "Return Policy";
		$this->set_token();
		include_once 'themes/' . $this->setting->landing_theme . '/header.php';
		include_once 'themes/' . $this->setting->landing_theme . '/returnPolicy.php';
		include_once 'themes/' . $this->setting->landing_theme . '/footer.php';
	}

	public function  disclaimer()
	{
		$this->page_title = "Disclaimer";
		$this->set_token();
		include_once 'themes/' . $this->setting->landing_theme . '/header.php';
		include_once 'themes/' . $this->setting->landing_theme . '/disclaimer.php';
		include_once 'themes/' . $this->setting->landing_theme . '/footer.php';
	}

	public function  terms()
	{
		$this->page_title = "Terms";
		$this->set_token();
		include_once 'themes/' . $this->setting->landing_theme . '/header.php';
		include_once 'themes/' . $this->setting->landing_theme . '/terms.php';
		include_once 'themes/' . $this->setting->landing_theme . '/footer.php';
	}





	public function  testimony()
	{

		$name = $this->clean->post('name');
		$testimony = $this->clean->post('testimony');
		$dated = time();
		if ($testimony == "" || $name == "") {
			$this->error = 1;
			$this->error_msg .= " Fill up empty fields";
		}

		if ($this->error == 0) {
			$this->db->query("INSERT INTO testimonies (name, testimony, date_created) VALUES ('$name' , '$testimony' ,'$dated') ");
			echo "<div class='alert alert-success'>Your Testimony has been submitted</div>";
		} else {
			echo "<div class='alert alert-danger'>" . $this->error_msg . "</div>";
		}
	}


	public function testimony_delete($tid)
	{
		$this->auth->editor();
		$this->db->query("DELETE FROM testimonies WHERE tid='$tid'");
		$this->alert->set("Testimony Deleted", 'success');
		header('location:' . BURL . "index/testimony_mgt");
	}

	public function testimony_approve($tid)
	{
		$this->auth->editor();
		$this->db->query("UPDATE testimonies SET is_approved=1 WHERE tid='$tid'");
		$this->alert->set("Testimony Approved", 'success');
		header('location:' . BURL . "index/testimony_mgt");
	}

	public function  testimony_mgt($start = 0)
	{
		$this->auth->editor();
		$this->page_title = "Testimonies";
		$testimonies = $this->db->query("SELECT * FROM testimonies WHERE is_approved=0 ");

		include_once 'themes/' . $this->setting->admin_theme . '/header.php';
		include_once 'themes/' . $this->setting->admin_theme . '/index_testimonies_mgt.php';
		include_once 'themes/' . $this->setting->admin_theme . '/footer.php';
	}

	public function  cargo()
	{
		$this->page_title = "waybill/cargo";
		$this->set_token();
		include_once 'themes/' . $this->setting->landing_theme . '/header.php';
		include_once 'themes/' . $this->setting->landing_theme . '/index_cargo.php';
		include_once 'themes/' . $this->setting->landing_theme . '/footer.php';
	}

	public function  charter()
	{
		$this->page_title = "waybill/cargo";
		$this->set_token();
		include_once 'themes/' . $this->setting->landing_theme . '/header.php';
		include_once 'themes/' . $this->setting->landing_theme . '/index_charter.php';
		include_once 'themes/' . $this->setting->landing_theme . '/footer.php';
	}

	public function  patner()
	{
		$this->page_title = "waybill/cargo";
		$this->set_token();
		include_once 'themes/' . $this->setting->landing_theme . '/header.php';
		include_once 'themes/' . $this->setting->landing_theme . '/index_charter.php';
		include_once 'themes/' . $this->setting->landing_theme . '/footer.php';
	}
}
