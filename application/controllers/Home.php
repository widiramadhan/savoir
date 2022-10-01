<?php 

class Home extends CI_Controller{
	
	function __construct(){
		parent::__construct();	
		$this->load->helper('url');     
		$this->load->model('Base_model');
	}

	public function index(){
		$category = $this->Base_model->getDataBy('category', array('is_active' => 1))->result();
		$designer = $this->Base_model->getDataBy('designer', array('is_active' => 1))->result();
		$product = $this->Base_model->getDataBy('product', array('is_active' => 1));
		$data = array('category' => $category, 'designer' => $designer, 'product' => $product);
			
		$this->load->view("template/header", $data);
		$this->load->view("home_view", $data);
		$this->load->view("template/footer");
	}

	public function about(){
		$category = $this->Base_model->getDataBy('category', array('is_active' => 1))->result();
		$designer = $this->Base_model->getDataBy('designer', array('is_active' => 1))->result();
		$data = array('category' => $category, 'designer' => $designer);
			
		$this->load->view("template/header", $data);
		$this->load->view("about_view", $data);
		$this->load->view("template/footer");
	}

	public function contact(){
		$category = $this->Base_model->getDataBy('category', array('is_active' => 1))->result();
		$designer = $this->Base_model->getDataBy('designer', array('is_active' => 1))->result();
		$data = array('category' => $category, 'designer' => $designer);
			
		$this->load->view("template/header", $data);
		$this->load->view("contact_view", $data);
		$this->load->view("template/footer");
	}

	public function consign(){
		$category = $this->Base_model->getDataBy('category', array('is_active' => 1))->result();
		$designer = $this->Base_model->getDataBy('designer', array('is_active' => 1))->result();
		$data = array('category' => $category, 'designer' => $designer);
			
		$this->load->view("template/header", $data);
		$this->load->view("consign_view", $data);
		$this->load->view("template/footer");
	}
	
	public function savecontact(){
		$name = $this->input->post('name');
		$email = $this->input->post('email');
		$message = $this->input->post('message');
		$data = array(
			'message_name' => $name,
			'message_email' => $email,
			'message_value' => $message
		);

		
		$insert = $this->Base_model->insertData('message', $data);
		if($insert){
			$alert = array(
				'message' => 'Successfully send your message',
				'title' => 'Success',
				'type' => 'success'
			);
			$this->session->set_flashdata($alert);
			redirect($_SERVER['HTTP_REFERER']);
		}else{
			$alert = array(
				'message' => 'Opps.. something went wrong',
				'title' => 'Error',
				'type' => 'error'
			);
			$this->session->set_flashdata($alert);
			redirect($_SERVER['HTTP_REFERER']);
		}
	}
}
?>