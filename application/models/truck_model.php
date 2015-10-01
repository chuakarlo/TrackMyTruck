<?php

class Truck_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}
	
	function add() {
		date_default_timezone_set('Asia/Manila');
		
		$truckNum = $this->input->post("truckNum");
		$commodity = $this->input->post("commodity");
		$origin = $this->input->post("startDest");
		$destination = $this->input->post("endDest");
		$soldTo = $this->input->post("soldTo");
		$volume = $this->input->post("volume");
		$driver = $this->input->post("driver");
		$drNum = $this->input->post("drNum");
		$remarks = $this->input->post("remarks");
		
		$this->db->trans_start();
		$truck = array(
			"TRUCK_NUM"	=> $truckNum,
			"COMMODITY"	=> $commodity,
			"DEST_FROM"	=> $origin,
			"DEST_TO"		=> $destination,
			"SOLD_TO"		=> $soldTo,
			"VOLUME"			=> $volume,
			"DRIVER"			=> $driver,
			"DR_NUM"			=> $drNum,
			"REMARKS"		=> $remarks
		);
		$this->db->insert("tbl_truck", $truck);
		$this->db->trans_complete();
		
		return $this->db->trans_status();
	}
	
	function get_search() {
		$truckNum = $this->input->post("search-truckNum");
		$commodity = $this->input->post("search-commodity");
		$soldTo = $this->input->post("search-soldTo");
		$driver = $this->input->post("search-driver");
		$drNum = $this->input->post("search-drNum");
		
	}

}

?>