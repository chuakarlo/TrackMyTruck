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
	
	function update($drNum) {
		$this->db->trans_start();
		
		$this->db->trans_complete();
		
		return $this->db->trans_status();
	}
	
	function delete($drNum) {
		$this->db->trans_start();
		$this->db->where("DR_NUM", $drNum);
		$this->db->update('tbl_truck', array('DELETE_FLAG' => 1));
		$this->db->trans_complete();
		
		return $this->db->trans_status();
	}
	
	function get($drNum) {
		$this->db->select("TRUCK_NUM,COMMODITY,DEST_FROM,DEST_TO,SOLD_TO,VOLUME,DRIVER,DR_NUM,REMARKS");
		$this->db->where("DR_NUM", $drNum);
		$query = $this->db->get("tbl_truck");
		return $query->result();
	}
	
	function getSearch($limit=null, $offset=null) {
		$truckNum = $this->input->post("search-truckNum");
		$commodity = $this->input->post("search-commodity");
		$soldTo = $this->input->post("search-soldTo");
		$driver = $this->input->post("search-driver");
		$drNum = $this->input->post("search-drNum");
		
		$this->db->select("TRUCK_NUM,COMMODITY,DEST_FROM,DEST_TO,SOLD_TO,VOLUME,DRIVER,DR_NUM,REMARKS");
		
		if ($truckNum != "") {
			$this->db->like("TRUCK_NUM", $truckNum);
		}
		if ($commodity != "") {
			$this->db->where("COMMODITY", $commodity);
		}
		if ($soldTo != "") {
			$this->db->like("SOLD_TO", $soldTo);
		}
		if ($driver != "") {
			$this->db->like("DRIVER", $driver);
		}
		if ($drNum != "") {
			$this->db->like("DR_NUM", $drNum);
		}
		$this->db->where("DELETE_FLAG", 0);
		$this->db->limit($limit, $offset);
		$query = $this->db->get("tbl_truck");
		return $query->result();
	}
	
	function countTruck() {
		$truckNum = $this->input->post("search-truckNum");
		$commodity = $this->input->post("search-commodity");
		$soldTo = $this->input->post("search-soldTo");
		$driver = $this->input->post("search-driver");
		$drNum = $this->input->post("search-drNum");
		
		$this->db->select("TRUCK_NUM,COMMODITY,DEST_FROM,DEST_TO,SOLD_TO,VOLUME,DRIVER,DR_NUM,REMARKS");
		
		if ($truckNum != "") {
			$this->db->like("TRUCK_NUM", $truckNum);
		}
		if ($commodity != "") {
			$this->db->like("COMMODITY", $commodity);
		}
		if ($soldTo != "") {
			$this->db->like("SOLD_TO", $soldTo);
		}
		if ($driver != "") {
			$this->db->like("DRIVER", $driver);
		}
		if ($drNum != "") {
			$this->db->like("DR_NUM", $drNum);
		}
		
		$this->db->where("DELETE_FLAG", 0);
		
		return $this->db->count_all_results("tbl_truck");
	}
	
	function getAll($limit=null, $offset=null) {
		$this->db->select("TRUCK_NUM,COMMODITY,DEST_FROM,DEST_TO,SOLD_TO,VOLUME,DRIVER,DR_NUM,REMARKS");
		$this->db->where("DELETE_FLAG", 0);
		$this->db->limit($limit, $offset);
		$query = $this->db->get("tbl_truck");
		return $query->result();
	}
	
	function totalTruck() {
		return $this->db->count_all_results('tbl_truck');
	}

}

?>