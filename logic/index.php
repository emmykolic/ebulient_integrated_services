<?php
class index extends boiler
{
	public function __construct()
	{
		parent::__construct();
		$this->stats = new stats($this->db);
	}

	public function defaultb(){
		$get_filters = $this->db->query("SELECT DISTINCT name FROM rentals");
		$get_rentals = $this->db->query("SELECT * FROM rentals");

		// Debugging: Print results to check if queries are returning data
		if ($get_filters->num_rows == 0) {
			echo "No filters found.<br>";
		} else {
			while($filter_row = $get_filters->fetch_assoc()) {
				// echo "Filter: " . $filter_row['name'] . "<br>";
			}
		}

		if ($get_rentals->num_rows == 0) {
			echo "No rentals found.<br>";
		} else {
			while($row = $get_rentals->fetch_assoc()) {
				// echo "Rental: " . $row['name'] . " - " . $row['rental_img'] . "<br>";
			}
		}

		// Reset pointers for queries
		$get_filters->data_seek(0);
		$get_rentals->data_seek(0);

		$get_services = $this->db->query("SELECT * FROM chemical_cleaning ");

		include_once 'themes/' . $this->setting->landing_theme . '/header.php';
		include_once 'themes/' . $this->setting->landing_theme . '/index.php';
		include_once 'themes/' . $this->setting->landing_theme . '/footer.php';
	}


	function sanitizeClassName($name) {
		return strtolower(preg_replace('/[^a-z0-9]+/', '-', trim($name)));
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
}
