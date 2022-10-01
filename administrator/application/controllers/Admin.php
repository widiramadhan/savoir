<?php 

class Admin extends CI_Controller{
	
	function __construct(){
		parent::__construct();
	
		$this->load->helper('url');     
		$this->load->model('Base_model');
		$this->load->library('upload');		
	}

	public function index(){
		if($this->session->userdata('auth_login') == true){
            $admin_id = $this->session->userdata('admin_id');
			$admin = $this->Base_model->getDataBy('admin', array('admin_id' => $admin_id))->row_array();
			$admin_list = $this->Base_model->getData('admin')->result();
			$data=array('admin' => $admin, 'admin_list' => $admin_list);
			
			$this->load->view("template/header", $data);
			$this->load->view("admin_view", $data);
			$this->load->view("template/footer");
		}else{
			$this->load->view('login_view');
		}
	}


	public function addAdmin(){
		if($this->session->userdata('auth_login') == true){
            $admin_id = $this->session->userdata('admin_id');
			$admin = $this->Base_model->getDataBy('admin', array('admin_id' => $admin_id))->row_array();
			$data=array('admin' => $admin);
			
			$this->load->view("template/header", $data);
			$this->load->view("admin_add_view", $data);
			$this->load->view("template/footer");
		}else{
			$this->load->view('login_view');
		}
	}


	public function saveAdmin(){
		date_default_timezone_set('Asia/Jakarta');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$name = $this->input->post('name');
		$email = $this->input->post('email');
		$phone = $this->input->post('phone_number');
		$role = $this->input->post('role');
		$admin_id = $this->session->userdata('admin_id');

		$data = array(
			'admin_username' => $username,
			'admin_password' => md5($password),
			'admin_name' => $name,
			'admin_email' => $email,
			'admin_phone_number' => $phone,
			'admin_role' => $role,
			'is_active' => 1,
			'created_date' => date('Y-m-d H:i:s'),
			'created_by' => $admin_id,
			'updated_date' => date('Y-m-d H:i:s'),
			'updated_by' => $admin_id
		);
		$insert = $this->Base_model->insertData('admin', $data);
		if($insert){
			$alert = array(
				'message' => 'Successfully save data',
				'title' => 'Success',
				'type' => 'success'
			);
			$this->session->set_flashdata($alert);
			redirect('admin');
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

	public function deleteGuru($id){
		$delete=$this->Base_model->deleteData('admin', array('admin_id' => $id));
		if($delete){
			$alert = array(
				'message' => 'Successfully delete data',
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