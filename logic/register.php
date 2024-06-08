<?php 
	/**
	 * 
	 */
	class register extends boiler
	{
		
		public function __construct(){
			parent::__construct();
		}

		public function defaultb(){
			$_SESSION['_PAGE_TITLE'] = 'Register';
			$this->page_js=BURL."assets/login.js";
	        $this->page_title=  "Register";
	        // $pre_page=1;
			$this->set_token();
			include_once 'themes/' . $this->setting->admin_theme . '/registration.php';
		}

		public function action(){
			if ($this->validate()==1) {
				$this->auth->form(); 
				$fullname=$this->clean->post('fullname');
				$email=$this->clean->post('email');
				$password=$this->clean->post('password');
				if ($fullname==""){
					$this->error=1;
					$this->error_msg.="Name Is Empty";
				}
				if($password==""){
					$this->error=1; 
					$this->error_msg.='Empty password!'; 
				}else{
					$cpassword=$this->clean->post('cpassword');
					if($cpassword!=$password){  
						$this->error=1; 
						$this->error_msg.=" passwords Don't match!"; 
					}else{
						// $password=$password;
						$password=sha1(md5($password));
					}
				}
				if ($email != "") {
					$email=filter_var($email, FILTER_SANITIZE_EMAIL);
					$email=strtolower($email);
					$user=$this->db->query("SELECT uid FROM users WHERE email='$email' LIMIT 1 ");
	
					if ($user->num_rows>0) {
						$this->error=1; 
						$this->error_msg.="Email Already Exist";
					}
				}else{
					if ($user->num_rows>0) {
						$this->error=1; 
						$this->error_msg.="Email is Empty ";
					}
				}
				$type = 9;
				if ($this->error==0) {
					$token=sha1(microtime().rand(0, 1000).$email);
					$this->db->query("INSERT INTO users(fullname,email,password,token,type) VALUES('$fullname','$email', '$password', '$token','$type')");
					$this->alert->set("Registration successful","success");
					header('location:'.BURL.'login');
				}else{
					$this->alert->set($this->error_msg,"danger");
					header('location:'.BURL.'register');
				}
			}else{
				$this->alert->set("You Are Not Qualified To Access That Page","danger");
				header('location:'.BURL.'index');
			}
		}
	}
?>