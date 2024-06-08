<?php
class login extends boiler
{

	public function  defaultb()
	{
		$_SESSION['_PAGE_TITLE'] = 'Login';
		$this->page_js=BURL."assets/login.js";
		$this->page_title=  "Login";
		$pre_page=1;
		$this->set_token();
		include_once 'themes/' . $this->setting->admin_theme . '/login.php';
	}

	public function  forgot()
	{
		$this->page_title = "Forgot password";
		$this->set_token();
		include_once 'themes/' . $this->setting->admin_theme . '/header.php';
		include_once 'themes/' . $this->setting->admin_theme . '/login_forgot.php';
		include_once 'themes/' . $this->setting->admin_theme . '/footer.php';
	}

	public function  forgot_success()
	{
		$this->page_title = "Reset Password";
		$this->set_token();
		include_once 'themes/' . $this->setting->admin_theme . '/header.php';
		include_once 'themes/' . $this->setting->admin_theme . '/login_forgot_success.php';
		include_once 'themes/' . $this->setting->admin_theme . '/footer.php';
	}

	public function action(){
		if ($this->validate() == 1) {
			$this->auth->form();
			$email = $this->clean->post('email');
			$password = $this->clean->post('password');
			
			if ($email == "" || $password == "") {
				$this->error = 1;
				$this->error_msg .= "Email Or Password Is Empty";
			} else {
				// Validation for email or username
				if (preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i', $email)) {
					// Email is valid
				} elseif (ctype_alnum($email)) {
					// Username is valid
				} else {
					$this->error = 1;
					$this->error_msg .= ' Invalid username or email ! ';
				}
			}
	
			if ($this->error == 0) {
				$email = strtolower($email);
				$password = sha1(md5($password));
				$user_query = $this->db->query("SELECT * FROM users WHERE email='$email' AND password='$password' ");
	
				if ($user_query->num_rows != 1) {
					$this->error = 1; 
					$this->error_msg .= ' Invalid details ! ';
				}
	
				if ($this->error == 0) {
					$token = sha1($email . microtime() . rand(0, 100));
					$_SESSION["_auth"] = $token;
					$this->db->query("UPDATE users SET token='$token' WHERE password='$password'");
					header('location:' . BURL . 'index');
				} else {
					$this->alert->set($this->error_msg, 'danger');
					header('location:' . BURL . "signin");
				}
			} else {
				$this->alert->set($this->error_msg, 'danger');
				header('location:' . BURL . "signin");
			}
		} else {
			$this->alert->set("You Haven't Been Registered Yet!", "danger");
			header('location:' . BURL . "index");
		}
	}
	

	// public function action(){
	// 	if ($this->validate() == 1) {
	// 		$param = $this->clean->post('param');
	// 		$password = $this->clean->post('password');
	// 		if (isset($_SESSION['where'])) {
	// 			$where = $_SESSION['where'];
	// 		} else {
	// 			$where = "";
	// 		}
	// 		if ($param == "" || $password == "") {
	// 			$this->error = 1;
	// 			$this->error_msg .= ' Empty login details!';
	// 		}


	// 		if (preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i', $param) == true) {
	// 		} elseif (ctype_alnum($param)) {
	// 		} else {
	// 			$this->error = 1;
	// 			$this->error_msg .= ' Invalid username or email ! ';
	// 		}

	// 		$password = sha1(md5($password));

	// 		$login_query = $this->db->query("SELECT * FROM users WHERE (email='$param' AND password='$password') OR  (username='$param' AND password='$password') ");
	// 		if ($login_query->num_rows > 0) {
	// 			$login_query = $login_query->fetch_assoc();
	// 			$email = $login_query['email'];
	// 			$is_suspended = $login_query['is_suspended'];
	// 			if ($is_suspended == 1) {
	// 				$this->error = 1;
	// 				$this->error_msg .= ' Account suspended Contact Site Admin! ';
	// 			}
	// 		} else {
	// 			$this->error = 1;
	// 			$this->error_msg .= ' Invalid details ! ';
	// 		}

	// 		if ($this->error == 0) {
	// 			$tokenx = sha1($email . microtime() . rand(0, 100));
	// 			$this->db->query("UPDATE users SET token='$tokenx' WHERE email='$email'");
	// 			$_SESSION["_auth"] = $tokenx;
	// 			if ($where == "") {
	// 				$where = 'dashboard';
	// 				header('location:' . BURL . $where);
	// 			} else {
	// 				header('location:' . BURL . $where);
	// 			}
	// 		} else {
	// 			$this->alert->set($this->error_msg, 'danger');
	// 			header('location:' . BURL . "login");
	// 		}
	// 	} else {
	// 		$this->alert->set("Invalid request", "danger");
	// 		header('location:' . BURL . 'login');
	// 	}
	// }
}
