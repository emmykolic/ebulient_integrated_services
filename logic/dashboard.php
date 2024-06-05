<?php
class dashboard extends boiler
{

	public function __construct()
	{
		parent::__construct();
	}


	public function  defaultb()
	{
		$this->auth->user("dashboard");
		$this->page_title = "Dashboard";
		$this->stats = new stats($this->db);
		$uid = $this->auth->uid;
		$managers = $this->db->query("SELECT * FROM users WHERE type=5");
		$manager_num = $managers->num_rows;
		$drivers = $this->db->query("SELECT * FROM users WHERE type=4 ");
		$driver_num = $drivers->num_rows;
		$this->set_token();
		include_once 'themes/' . $this->setting->admin_theme . '/header.php';
		include_once 'themes/' . $this->setting->admin_theme . '/dashboard.php';
		include_once 'themes/' . $this->setting->admin_theme . '/footer.php';
	}

}
