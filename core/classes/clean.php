<?php 
class clean {
	public $error="";

	public function __construct($db){
		$this->db=$db;
	}
	public function select($txt){
		if(isset($_POST[$txt])){
			$txt = implode(',', $_POST[$txt]);
			$txt=trim(strip_tags(htmlspecialchars($txt)));
			$txt=mysqli_real_escape_string($this->db,$txt);
		}else{
			$txt="";
			$this->error.=" $txt is empty";
		}
		return $txt;
	}

	public function clean($txt){
		if(isset($_POST[$txt])){
			$txt=trim(strip_tags(htmlspecialchars($_POST[$txt])));
			$txt=mysqli_real_escape_string($this->db,$txt);
		}else{
			$txt="";
			$this->error.=" $txt is empty";
		}
		return $txt;
	}

	public function cleanx($x){
		$x = trim(strip_tags(htmlspecialchars($x)));
		return mysqli_real_escape_string($this->db, $x);
	}

	public function cleanxx($x){
		if(isset($_POST[$txt])){
			$txt=trim(strip_tags($_POST[$txt])) ;
			$txt=mysqli_real_escape_string($this->db,$txt);
		}else{
			$txt="";
			$this->error.=" $txt is empty";
		}
		return $txt;
	}

	public function retag($x){
		$x = htmlspecialchars_decode($x);
		return stripcslashes($x);
	}

	public function retagx($x){
		$x = strip_tags(htmlspecialchars_decode($x));
		return stripcslashes($x);
	}

	public function post($txt){
		if(isset($_POST[$txt])){
			$txt=trim(strip_tags($_POST[$txt])) ;
			$txt=mysqli_real_escape_string($this->db,$txt);
		}else{
			$txt="";
			$this->error.=" $txt is empty";
		}
		return $txt;
	}

	public function postx($txt){
		if(isset($_POST[$txt])){
			$txt=trim(strip_tags($_POST[$txt]));
			$txt=str_replace("-", "", $txt);
			$txt=mysqli_real_escape_string($this->db,$txt);
		}else{
			$txt="";
			$this->error.=" $txt is empty";
		}
		return $txt;
	}

	public function get($txt){
		if(isset($_GET[$txt])){
			$txt=trim(strip_tags($_GET[$txt])) ;
			$txt=mysqli_real_escape_string($this->db,$txt);
		}else{
			$txt="";
			$this->error.=" $txt is empty";
		}
		return $txt;
	}

	public function photo($txt, $path) {
		$photo = "";
	
		if (isset($_FILES[$txt]) && $_FILES[$txt]["error"] == 0) {
			$types = array('image/jpeg', 'image/gif', 'image/png');
	
			if (in_array($_FILES[$txt]['type'], $types)) {
				$photo = $path . sha1(microtime() . rand(0, 100)) . $_FILES[$txt]['name'];
				move_uploaded_file($_FILES[$txt]['tmp_name'], $photo);
			}
		}
	
		return $photo;
	}
	

	// public function photo($txt,$path){
	// 	if($_FILES[$txt]["error"] == 0){
	//         $types = array('image/jpeg','image/gif','image/png');
	//         if (in_array($_FILES[$txt]['type'], $types)==1) {
	// 	        $photo=$path.sha1(microtime().rand(0,100)).$_FILES[$txt]['name'];
	// 	        move_uploaded_file($_FILES[$txt]['tmp_name'], $photo);
	//         }else{
	//         	$photo="";
	//         }
	//     }else{
	//     	$photo=""; 
	//     }
		
	// 	return $photo;
	// }
		
}

?>