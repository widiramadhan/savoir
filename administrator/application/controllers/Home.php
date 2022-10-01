<?php 

class Home extends CI_Controller{
	
	function __construct(){
		parent::__construct();	
		$this->load->helper('url');     
		$this->load->model('Base_model');
	}

	public function index(){
		if($this->session->userdata('auth_login') == true){
            $admin_id = $this->session->userdata('admin_id');
			$admin = $this->Base_model->getDataBy('admin', array('admin_id' => $admin_id))->row_array();
			$product = $this->Base_model->getDataBy('product', array('is_active' => 1));
			$category = $this->Base_model->getDataBy('category', array('is_active' => 1));
			$designer = $this->Base_model->getDataBy('designer', array('is_active' => 1));
			$transaction = $this->Base_model->getDataBy('transaction', array('is_active' => 1));
			$data = array('admin' => $admin, 'product' => $product, 'category' => $category, 'designer' => $designer, 'transaction' => $transaction);
			
			$this->load->view("template/header", $data);
			$this->load->view("home_view", $data);
			$this->load->view("template/footer");
		}else{
			$this->load->view('login_view');
		}
	}
	
}
?>