<?phpclass Truck extends CI_Controller {	var $data;		function __construct() {		parent::__construct();				$this->load->model("truck_model", "truck");		$this->load->library("form_validation");						$this->data['truckNum'] = null;		$this->data['commodity'] = null;		$this->data['origin'] = null;		$this->data['destination'] = null;		$this->data['soldTo'] = null;		$this->data['volume'] = null;		$this->data['driver'] = null;		$this->data['drNum'] = null;		$this->data['remarks'] = null;		$this->data['alert'] = null;		$this->data['header'] = null;		$this->data['button'] = null;		$this->data['message'] = null;		$this->data['title'] = 'Track My Truck';		$this->data['copyright'] = '© KKKGKC';		$this->data['truckData'] = null;	}		public function index() {		$this->load->view('list', $this->data);	}		public function register() {		$this->data['drNum'] = $this->truck->getDR();		$this->load->view('input', $this->data);	}		public function validateForm() {		$this->data['truckNum'] = $this->input->post("truckNum");		$this->data['commodity'] = $this->input->post("commodity");		$this->data['origin'] = $this->input->post("startDest");		$this->data['destination'] = $this->input->post("endDest");		$this->data['soldTo'] = $this->input->post("soldTo");		$this->data['volume'] = $this->input->post("volume");		$this->data['driver'] = $this->input->post("driver");		$this->data['drNum'] = $this->input->post("drNum");		$this->data['remarks'] = $this->input->post("remarks");			$this->form_validation->set_error_delimiters("", "");		$this->form_validation->set_rules("truckNum","Truck Plate No", "required");		$this->form_validation->set_rules("commodity","Load / Commodity", "required");		$this->form_validation->set_rules("startDest","Destination", "required");		$this->form_validation->set_rules("endDest","Destination", "required");		$this->form_validation->set_rules("soldTo","Sold To", "required");		$this->form_validation->set_rules("volume","Volume", "required|numeric");		$this->form_validation->set_rules("driver","Driver", "required");		$this->form_validation->set_rules("drNum","DR No", "required");				return $this->form_validation->run();	}		public function create() {		if ($this->validateForm()):			if ($this->truck->add()):				$this->data['truckNum'] = null;				$this->data['commodity'] = null;				$this->data['soldTo'] = null;				$this->data['driver'] = null;				$this->data['drNum'] = null;								$this->data['message'] = "Item added successfully.";				$this->data['alert'] = "alert-success";				$this->load->view("list", $this ->data);			else:				$this->data['message'] = "Item not added.";				$this->data['alert'] = "alert-danger";				$this->load->view("list", $this ->data);			endif;		else:			$this->load->view("input", $this->data);		endif;	}		public function edit_DR($drNum) {		$this->form_validation->set_error_delimiters("", "");		$this->form_validation->set_rules("drNum","DR No", "required|numeric");				if ($this->form_validation->run()):			if ($this->truck->updateDR($drNum)):				echo "true";			else:				echo "exist";			endif;		else:			echo "false";		endif;	}		public function edit($drNum) {		$this->data['truckData'] = $this->truck->get($drNum);				$this->data['header'] = "Update Truck Information";		$this->data['button'] = "Update";				$this->load->view("input", $this->data);	}		public function update() {		if ($this->validateForm()):			if ($this->truck->update()):				$this->data['truckNum'] = null;				$this->data['commodity'] = null;				$this->data['soldTo'] = null;				$this->data['driver'] = null;				$this->data['drNum'] = null;								$this->data['message'] = "Item updated successfully.";				$this->data['alert'] = "alert-success";				$this->load->view("list", $this ->data);			else:				$this->data['message'] = "Item not updated.";				$this->data['alert'] = "alert-danger";				$this->load->view("list", $this ->data);			endif;		else:						$this->data['header'] = "Update Truck Information";			$this->data['button'] = "Update";			$this->load->view("input", $this->data);		endif;	}	public function delete($drNum) {		if ($this->truck->delete($drNum)):			$this->data['truckNum'] = null;			$this->data['commodity'] = null;			$this->data['soldTo'] = null;			$this->data['driver'] = null;			$this->data['drNum'] = null;							$this->data['message'] = "Item deleted successfully.";			$this->data['alert'] = "alert-success";			$this->load->view("list", $this ->data);		else:			$this->data['message'] = "Item not deleted.";			$this->data['alert'] = "alert-danger";			$this->load->view("list", $this ->data);		endif;	}		public function search($offset = 0) {		$this->data['truckNum'] = $this->input->post("search-truckNum");		$this->data['commodity'] = $this->input->post("search-commodity");		$this->data['soldTo'] = $this->input->post("search-soldTo");		$this->data['driver'] = $this->input->post("search-driver");		$this->data['drNum'] = $this->input->post("search-drNum");			$config['base_url'] = base_url()."index.php/truck/search";		$config['per_page'] = 10;		$config['uri_segment'] = '3';		$config['full_tag_open'] = '<ul class="pagination">';		$config['full_tag_close'] = '</ul>';		$config['first_link'] = '« First';		$config['first_tag_open'] = '<li class="prev page">';		$config['first_tag_close'] = '</li>';		$config['last_link'] = 'Last »';		$config['last_tag_open'] = '<li class="next page">';		$config['last_tag_close'] = '</li>';		$config['next_link'] = 'Next';		$config['next_tag_open'] = '<li class="next page">';		$config['next_tag_close'] = '</li>';		$config['prev_link'] = 'Previous';		$config['prev_tag_open'] = '<li class="prev page">';		$config['prev_tag_close'] = '</li>';		$config['cur_tag_open'] = '<li class="active"><a href="">';		$config['cur_tag_close'] = '</a></li>';		$config['num_tag_open'] = '<li class="page">';		$config['num_tag_close'] = '</li>';		$truckNum = $this->input->post("search-truckNum");		$commodity = $this->input->post("search-commodity");		$soldTo = $this->input->post("search-soldTo");		$driver = $this->input->post("search-driver");		$drNum = $this->input->post("search-drNum");						$this->data['truckData'] = null;				if ($truckNum == "" && $commodity == "" && $soldTo == "" && $driver == "" && $drNum == ""):			$query = $this->truck->getAll(10,$this->uri->segment(3));						$config['total_rows'] = $this->truck->totalTruck();						if($query):				$this->data['truckData'] =  $query;			else:				$this->data['message'] = "Database is empty.";				$this->data['alert'] = "alert-danger";			endif;		else:			$query = $this->truck->getSearch(10,$this->uri->segment(3));						$config['total_rows'] = $this->truck->countTruck();						if($query):				$this->data['truckData'] =  $query;			else:				$this->data['message'] = "Item does not exist in database.";				$this->data['alert'] = "alert-danger";			endif;		endif;		$this->pagination->initialize($config);				$this->load->view('list', $this->data);	}	}?>