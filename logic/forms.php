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

	
}


?>