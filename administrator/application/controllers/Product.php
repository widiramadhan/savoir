<?php 

class Product extends CI_Controller{
	
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
			$product = $this->db->select('*')->from('product a')->join('category b', 'a.category_id = b.category_id', 'left')->join('designer c', 'a.designer_id = c.designer_id', 'left')->get()->result();
			$data=array('product' => $product, 'admin' => $admin);
			
			$this->load->view("template/header", $data);
			$this->load->view("product_view", $data);
			$this->load->view("template/footer");
		}else{
			$this->load->view('login_view');
		}
	}

	public function addProduct(){
		if($this->session->userdata('auth_login') == true){
            $admin_id = $this->session->userdata('admin_id');
			$admin = $this->Base_model->getDataBy('admin', array('admin_id' => $admin_id))->row_array();
			$category = $this->Base_model->getDataBy('category', array('is_active' => 1))->result();
			$designer = $this->Base_model->getDataBy('designer', array('is_active' => 1))->result();
			$data=array('admin' => $admin, 'category' => $category, 'designer' => $designer);
			
			$this->load->view("template/header", $data);
			$this->load->view("product_add_view", $data);
			$this->load->view("template/footer");
		}else{
			$this->load->view('login_view');
		}
	}

	public function editProduct($id){
		if($this->session->userdata('auth_login') == true){
            $admin_id = $this->session->userdata('admin_id');
			$admin = $this->Base_model->getDataBy('admin', array('admin_id' => $admin_id))->row_array();
			$product = $this->Base_model->getDataBy('product', array('product_id' => $id))->row_array();
			$category = $this->Base_model->getDataBy('category', array('is_active' => 1))->result();
			$designer = $this->Base_model->getDataBy('designer', array('is_active' => 1))->result();
			$data=array('admin' => $admin, 'product' => $product, 'category' => $category, 'designer' => $designer);
			
			$this->load->view("template/header", $data);
			$this->load->view("product_edit_view", $data);
			$this->load->view("template/footer");
		}else{
			$this->load->view('login_view');
		}
	}

	public function updateProduct(){
		date_default_timezone_set('Asia/Jakarta');
		$id = $this->input->post('id');
		$title = $this->input->post('title');
		$category = $this->input->post('category');
		$designer = $this->input->post('designer');
		$desc = $this->input->post('desc');
		$quotes = $this->input->post('quotes');
		$price = $this->input->post('price');
		$status = $this->input->post('status');
		$admin_id = $this->session->userdata('admin_id');
		$slug = url_title($title, 'dash', true);

		$images_1 = null;
		$images_2 = null;
		$images_3 = null;
		$images_4 = null;

		//images 1
		if(!empty($_FILES['images_1']['name'])){
			$config['upload_path'] = '../assets/images/product/';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size'] = '2048';  //2MB max
			$config['max_width'] = '4480'; // pixel
			$config['max_height'] = '4480'; // pixel
			$config['file_name'] = $_FILES['images_1']['name'];

			//Load upload library and initialize configuration
            $this->load->library('upload',$config);
            $this->upload->initialize($config);

			if ($this->upload->do_upload('images_1')) {
				$img1 = $this->upload->data();
				$images_1 = $img1['file_name'];
				$update_1 = $this->Base_model->updateData('product', array('product_images_1' => $images_1), array('product_id' => $id));
			}
		}

		//images 2
		if(!empty($_FILES['images_2']['name'])){
			$config['upload_path'] = '../assets/images/product/';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size'] = '2048';  //2MB max
			$config['max_width'] = '4480'; // pixel
			$config['max_height'] = '4480'; // pixel
			$config['file_name'] = $_FILES['images_2']['name'];

			//Load upload library and initialize configuration
            $this->load->library('upload',$config);
            $this->upload->initialize($config);

			if ($this->upload->do_upload('images_2')) {
				$img2 = $this->upload->data();
				$images_2 = $img2['file_name'];
				$update_2 = $this->Base_model->updateData('product', array('product_images_2' => $images_2), array('product_id' => $id));
			}
		}

		//images 3
		if(!empty($_FILES['images_3']['name'])){
			$config['upload_path'] = '../assets/images/product/';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size'] = '2048';  //2MB max
			$config['max_width'] = '4480'; // pixel
			$config['max_height'] = '4480'; // pixel
			$config['file_name'] = $_FILES['images_3']['name'];

			//Load upload library and initialize configuration
            $this->load->library('upload',$config);
            $this->upload->initialize($config);

			if ($this->upload->do_upload('images_3')) {
				$img3 = $this->upload->data();
				$images_3 = $img3['file_name'];
				$update_3 = $this->Base_model->updateData('product', array('product_images_3' => $images_3), array('product_id' => $id));
			}
		}

		//images 4
		if(!empty($_FILES['images_4']['name'])){
			$config['upload_path'] = '../assets/images/product/';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size'] = '2048';  //2MB max
			$config['max_width'] = '4480'; // pixel
			$config['max_height'] = '4480'; // pixel
			$config['file_name'] = $_FILES['images_4']['name'];

			//Load upload library and initialize configuration
            $this->load->library('upload',$config);
            $this->upload->initialize($config);

			if ($this->upload->do_upload('images_4')) {
				$img4 = $this->upload->data();
				$images_4 = $img4['file_name'];
				$update_4 = $this->Base_model->updateData('product', array('product_images_4' => $images_4), array('product_id' => $id));
			}
		}

		
		$data = array(
			'category_id' => $category,
			'designer_id' => $designer,
			'product_name' => $title,
			'product_description' => $desc,
			'product_quotes' => $quotes,
			'product_price' => $price,
			'product_stock' => $status,
			'product_slug' => $slug,
			'updated_date' => date("Y-m-d H:i:s"),
			'updated_by' => $admin_id
		);

		$update = $this->Base_model->updateData('product', $data, array('product_id' => $id));
		if($update){
			$alert = array(
				'message' => 'Successfully update data',
				'title' => 'Success',
				'type' => 'success'
			);
			$this->session->set_flashdata($alert);
			redirect('product/index');
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
	
	public function saveProduct(){
		$title = $this->input->post('title');
		$category = $this->input->post('category');
		$designer = $this->input->post('designer');
		$desc = $this->input->post('desc');
		$quotes = $this->input->post('quotes');
		$price = $this->input->post('price');
		$status = $this->input->post('status');
		$slug = url_title($title, 'dash', true);
		$admin_id = $this->session->userdata('admin_id');

		$images_1 = null;
		$images_2 = null;
		$images_3 = null;
		$images_4 = null;

		//images 1
		if(!empty($_FILES['images_1']['name'])){
			$config['upload_path'] = '../assets/images/product/';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size'] = '2048';  //2MB max
			$config['max_width'] = '4480'; // pixel
			$config['max_height'] = '4480'; // pixel
			$config['file_name'] = $_FILES['images_1']['name'];

			//Load upload library and initialize configuration
            $this->load->library('upload',$config);
            $this->upload->initialize($config);

			if ($this->upload->do_upload('images_1')) {
				$img1 = $this->upload->data();
				$images_1 = $img1['file_name'];
			}else{
				$images_1 = null;
			}
		}

		//images 2
		if(!empty($_FILES['images_2']['name'])){
			$config['upload_path'] = '../assets/images/product/';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size'] = '2048';  //2MB max
			$config['max_width'] = '4480'; // pixel
			$config['max_height'] = '4480'; // pixel
			$config['file_name'] = $_FILES['images_2']['name'];

			//Load upload library and initialize configuration
            $this->load->library('upload',$config);
            $this->upload->initialize($config);

			if ($this->upload->do_upload('images_2')) {
				$img2 = $this->upload->data();
				$images_2 = $img2['file_name'];
			}else{
				$images_2 = null;
			}
		}

		//images 3
		if(!empty($_FILES['images_3']['name'])){
			$config['upload_path'] = '../assets/images/product/';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size'] = '2048';  //2MB max
			$config['max_width'] = '4480'; // pixel
			$config['max_height'] = '4480'; // pixel
			$config['file_name'] = $_FILES['images_3']['name'];

			//Load upload library and initialize configuration
            $this->load->library('upload',$config);
            $this->upload->initialize($config);

			if ($this->upload->do_upload('images_3')) {
				$img3 = $this->upload->data();
				$images_3 = $img3['file_name'];
			}else{
				$images_3 = null;
			}
		}

		//images 4
		if(!empty($_FILES['images_4']['name'])){
			$config['upload_path'] = '../assets/images/product/';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size'] = '2048';  //2MB max
			$config['max_width'] = '4480'; // pixel
			$config['max_height'] = '4480'; // pixel
			$config['file_name'] = $_FILES['images_4']['name'];

			//Load upload library and initialize configuration
            $this->load->library('upload',$config);
            $this->upload->initialize($config);

			if ($this->upload->do_upload('images_4')) {
				$img4 = $this->upload->data();
				$images_4 = $img4['file_name'];
			}else{
				$images_4 = null;
			}
		}

		$data = array(
			'category_id' => $category,
			'designer_id' => $designer,
			'product_name' => $title,
			'product_description' => $desc,
			'product_quotes' => $quotes,
			'product_price' => $price,
			'product_discount' => 0,
			'product_stock' => $status,
			'product_slug' => $slug,
			'product_images_1' => $images_1,
			'product_images_2' => $images_2,
			'product_images_3' => $images_3,
			'product_images_4' => $images_4,
			'created_by' => $admin_id,
			'updated_by' => $admin_id
		);
		$insert = $this->Base_model->insertData('product', $data);
		if($insert){
			$alert = array(
				'message' => 'Successfully save data',
				'title' => 'Success',
				'type' => 'success'
			);
			$this->session->set_flashdata($alert);
			redirect('product/index');
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

	public function deleteProduct($id){
		$delete=$this->Base_model->deleteData('product', array('product_id' => $id));
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