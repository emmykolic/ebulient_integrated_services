<?php
class profile extends boiler{
 	public function __construct(){
 		parent::__construct();
    }

 	public function  defaultb($uid){
 		$this->page_title="Edit Profile";
		$this->set_token(); 
        $profile=$this->db->query("SELECT * FROM users WHERE uid='$uid'");
		$profile=$profile->fetch_assoc();

		include_once 'themes/'.$this->setting->admin_theme.'/header.php';
 		include_once 'themes/'.$this->setting->admin_theme.'/profile.php';
 		include_once 'themes/'.$this->setting->admin_theme.'/footer.php';
 		
 	}
	public function  change_photo(){
		$this->page_title="Edit Profile";
		$this->auth->user();
		$uid=$this->auth->uid;
	   $this->set_token(); 
	   $profile=$this->db->query("SELECT * FROM users WHERE uid='$uid'");
	   $profile=$profile->fetch_assoc();

	   include_once 'themes/'.$this->setting->admin_theme.'/header.php';
		include_once 'themes/'.$this->setting->admin_theme.'/profile_change_photo.php';
		include_once 'themes/'.$this->setting->admin_theme.'/footer.php';
		
	}
	
 	 
 	

 	public function action(){
        $this->auth->user("profile");
        $username=$this->auth->user->username;
 		if($this->validate()==1){  
		    $fullname=$this->clean->post('fullname');
		    $address=$this->clean->post('address');
            $phone=$this->clean->post('phone');
			$email=$this->clean->post('email');
			if($this->auth->user->type<8){
            	$this->db->query("UPDATE users SET fullname='$fullname',  phone='$phone'  WHERE username='$username' ");
			}else{
				$this->db->query("UPDATE users SET fullname='$fullname', phone='$phone' WHERE email='$email' ");
			}
            $this->alert->set("Profile Updated","success");
			if($this->auth->user->type<8){
		   		header('location:'.BURL.'dashboard');
			}else{
				header('location:'.BURL.'users');
			}
		}else{
			$this->alert->set("Invalid request","danger");
			if($this->auth->user->type>4){
				header('location:'.BURL.'user');
			}else{
				header('location:'.BURL.'dashboard');
			}
		}
	
 	}


	public function upload_image(){
		if(isset($_POST["image"])){
			$data=$_POST['image'];
			$data = base64_decode($data);
			if(isset($this->auth->uid)){
				$uid=$this->auth->uid;
				$imageName = "assets/uploads/".sha1(microtime()).'.jpg';
				$this->db->query("UPDATE users SET photo='$imageName' WHERE uid='$uid'");
				file_put_contents($imageName, $data);
			}
		}
	}
}
?>