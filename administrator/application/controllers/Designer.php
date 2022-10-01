<?php 

class Designer extends CI_Controller{
	
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
			$designer = $this->Base_model->getData('designer')->result();
			$data=array('designer' => $designer, 'admin' => $admin);
			
			$this->load->view("template/header", $data);
			$this->load->view("designer_view", $data);
			$this->load->view("template/footer");
		}else{
			$this->load->view('login_view');
		}
	}

	public function adddesigner(){
		if($this->session->userdata('auth_login') == true){
            $admin_id = $this->session->userdata('admin_id');
			$admin = $this->Base_model->getDataBy('admin', array('admin_id' => $admin_id))->row_array();
			$data=array('admin' => $admin);
			
			$this->load->view("template/header", $data);
			$this->load->view("designer_add_view", $data);
			$this->load->view("template/footer");
		}else{
			$this->load->view('login_view');
		}
	}

	public function editDesigner($id){
		if($this->session->userdata('auth_login') == true){
            $admin_id = $this->session->userdata('admin_id');
			$admin = $this->Base_model->getDataBy('admin', array('admin_id' => $admin_id))->row_array();
			$designer = $this->Base_model->getDataBy('designer', array('designer_id' => $id))->row_array();
			$data=array('admin' => $admin, 'designer' => $designer);
			
			$this->load->view("template/header", $data);
			$this->load->view("designer_edit_view", $data);
			$this->load->view("template/footer");
		}else{
			$this->load->view('login_view');
		}
	}

	public function updateDesigner(){
		date_default_timezone_set('Asia/Jakarta');
		$id = $this->input->post('id');
		$title = $this->input->post('title');
		$desc = $this->input->post('desc');
		$slug = url_title($title, 'dash', true);
		$admin_id = $this->session->userdata('admin_id');
		$data = array(
			'designer_name' => $title,
			'designer_description' => $desc,
			'designer_slug' => $slug,
			'updated_by' => $admin_id,
			'updated_date' => date('Y-m-d H:i:s'),
		);
		$update = $this->Base_model->updateData('designer', $data, array('designer_id' => $id));
		if($update){
			$alert = array(
				'message' => 'Successfully update data',
				'title' => 'Success',
				'type' => 'success'
			);
			$this->session->set_flashdata($alert);
			redirect('designer/index');
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

	public function savedesigner(){
		$title = $this->input->post('title');
		$desc = $this->input->post('desc');
		$slug = url_title($title, 'dash', true);
		$admin_id = $this->session->userdata('admin_id');
		$data = array(
			'designer_name' => $title,
			'designer_description' => $desc,
			'designer_slug' => $slug,
			'created_by' => $admin_id,
			'updated_by' => $admin_id
		);
		$insert = $this->Base_model->insertData('designer', $data);
		if($insert){
			$alert = array(
				'message' => 'Successfully save data',
				'title' => 'Success',
				'type' => 'success'
			);
			$this->session->set_flashdata($alert);
			redirect('designer/index');
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

	public function deletedesigner($id){
		$delete=$this->Base_model->deleteData('designer', array('designer_id' => $id));
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