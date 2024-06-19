<?php
class about extends boiler{
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
		include_once 'themes/' . $this->setting->landing_theme . '/about.php';
		include_once 'themes/' . $this->setting->landing_theme . '/footer.php';
	}
}

?>