<?php 

class Category extends CI_Controller{
	
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
			$category = $this->Base_model->getData('category')->result();
			$data=array('category' => $category, 'admin' => $admin);
			
			$this->load->view("template/header", $data);
			$this->load->view("category_view", $data);
			$this->load->view("template/footer");
		}else{
			$this->load->view('login_view');
		}
	}

	public function addCategory(){
		if($this->session->userdata('auth_login') == true){
            $admin_id = $this->session->userdata('admin_id');
			$admin = $this->Base_model->getDataBy('admin', array('admin_id' => $admin_id))->row_array();
			$data=array('admin' => $admin);
			
			$this->load->view("template/header", $data);
			$this->load->view("category_add_view", $data);
			$this->load->view("template/footer");
		}else{
			$this->load->view('login_view');
		}
	}

	public function editCategory($id){
		if($this->session->userdata('auth_login') == true){
            $admin_id = $this->session->userdata('admin_id');
			$admin = $this->Base_model->getDataBy('admin', array('admin_id' => $admin_id))->row_array();
			$category = $this->Base_model->getDataBy('category', array('category_id' => $id))->row_array();
			$data=array('admin' => $admin, 'category' => $category);
			
			$this->load->view("template/header", $data);
			$this->load->view("category_edit_view", $data);
			$this->load->view("template/footer");
		}else{
			$this->load->view('login_view');
		}
	}

	public function updateCategory(){
		date_default_timezone_set('Asia/Jakarta');
		$id = $this->input->post('id');
		$title = $this->input->post('title');
		$desc = $this->input->post('desc');
		$slug = url_title($title, 'dash', true);
		$admin_id = $this->session->userdata('admin_id');

		if(!empty($_FILES['images']['name'])){
			$config['upload_path'] = '../assets/images/category/';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size'] = '2048';  //2MB max
			$config['max_width'] = '4480'; // pixel
			$config['max_height'] = '4480'; // pixel
			$config['file_name'] = $_FILES['images']['name'];

			//Load upload library and initialize configuration
            $this->load->library('upload',$config);
            $this->upload->initialize($config);

			if ($this->upload->do_upload('images')) {
				$img = $this->upload->data();
				$data = array(
					'category_name' => $title,
					'category_description' => $desc,
					'category_slug' => $slug,
					'category_images' => $img['file_name'],
					'updated_by' => $admin_id,
					'updated_date' => date('Y-m-d H:i:s'),
				);
				$update = $this->Base_model->updateData('category', $data, array('category_id' => $id));
				if($update){
					$alert = array(
						'message' => 'Successfully update data',
						'title' => 'Success',
						'type' => 'success'
					);
					$this->session->set_flashdata($alert);
					redirect('category/index');
				}else{
					$alert = array(
						'message' => 'Opps.. something went wrong',
						'title' => 'Error',
						'type' => 'error'
					);
					$this->session->set_flashdata($alert);
					redirect($_SERVER['HTTP_REFERER']);
				}
			} else {
				$alert = array(
					'message' => 'Opps.. something went wrong',
					'title' => 'Error',
					'type' => 'error'
				);
				$this->session->set_flashdata($alert);
				redirect($_SERVER['HTTP_REFERER']);
			}
		} else {
			$data = array(
				'category_name' => $title,
				'category_description' => $desc,
				'category_slug' => $slug,
				'updated_by' => $admin_id,
				'updated_date' => date('Y-m-d H:i:s'),
			);
			$update = $this->Base_model->updateData('category', $data, array('category_id' => $id));
			if($update){
				$alert = array(
					'message' => 'Successfully update data',
					'title' => 'Success',
					'type' => 'success'
				);
				$this->session->set_flashdata($alert);
				redirect('category/index');
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
	
	public function saveCategory(){
		$title = $this->input->post('title');
		$desc = $this->input->post('desc');
		$slug = url_title($title, 'dash', true);
		$admin_id = $this->session->userdata('admin_id');

		if(!empty($_FILES['images']['name'])){
			$config['upload_path'] = '../assets/images/category/';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size'] = '2048';  //2MB max
			$config['max_width'] = '4480'; // pixel
			$config['max_height'] = '4480'; // pixel
			$config['file_name'] = $_FILES['images']['name'];

			//Load upload library and initialize configuration
            $this->load->library('upload',$config);
            $this->upload->initialize($config);

			if ($this->upload->do_upload('images')) {
				$img = $this->upload->data();
				$data = array(
					'category_name' => $title,
					'category_description' => $desc,
					'category_slug' => $slug,
					'category_images' => $img['file_name'],
					'created_by' => $admin_id,
					'updated_by' => $admin_id
				);
				$insert = $this->Base_model->insertData('category', $data);
				if($insert){
					$alert = array(
						'message' => 'Successfully save data',
						'title' => 'Success',
						'type' => 'success'
					);
					$this->session->set_flashdata($alert);
					redirect('category/index');
				}else{
					$alert = array(
						'message' => 'Opps.. something went wrong',
						'title' => 'Error',
						'type' => 'error'
					);
					$this->session->set_flashdata($alert);
					redirect($_SERVER['HTTP_REFERER']);
				}
			} else {
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

	public function deleteCategory($id){
		$delete=$this->Base_model->deleteData('category', array('category_id' => $id));
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