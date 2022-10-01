<?php 

class Transaction extends CI_Controller{
	
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
			$transaction = $this->db->select('*')->from('transaction a')->join('product b', 'a.product_id = b.product_id', 'left')->join('designer c', 'b.designer_id = c.designer_id', 'left')->join('category d', 'b.category_id = d.category_id', 'left')->get()->result();
			$data=array('transaction' => $transaction, 'admin' => $admin);
			
			$this->load->view("template/header", $data);
			$this->load->view("transaction_view", $data);
			$this->load->view("template/footer");
		}else{
			$this->load->view('login_view');
		}
	}

	public function addtransaction(){
		if($this->session->userdata('auth_login') == true){
            $admin_id = $this->session->userdata('admin_id');
			$admin = $this->Base_model->getDataBy('admin', array('admin_id' => $admin_id))->row_array();
			$product = $this->Base_model->getDataBy('product', array('is_active' => 1))->result();
			$data=array('admin' => $admin, 'product' => $product);
			
			$this->load->view("template/header", $data);
			$this->load->view("transaction_add_view", $data);
			$this->load->view("template/footer");
		}else{
			$this->load->view('login_view');
		}
	}

	public function detailtransaction($id){
		if($this->session->userdata('auth_login') == true){
            $admin_id = $this->session->userdata('admin_id');
			$admin = $this->Base_model->getDataBy('admin', array('admin_id' => $admin_id))->row_array();
			$product = $this->Base_model->getDataBy('product', array('is_active' => 1))->result();
			$transaction = $this->db->select('*')->from('transaction a')->join('product b', 'a.product_id = b.product_id', 'left')->join('designer c', 'b.designer_id = c.designer_id', 'left')->join('category d', 'b.category_id = d.category_id', 'left')->where(array('a.transaction_invoice_no' => $id))->get()->row_array();
			$data=array('admin' => $admin, 'transaction' => $transaction, 'product' => $product);
			
			$this->load->view("template/header", $data);
			$this->load->view("transaction_detail_view", $data);
			$this->load->view("template/footer");
		}else{
			$this->load->view('login_view');
		}
	}

	public function updatetransaction(){
		date_default_timezone_set('Asia/Jakarta');
		$id = $this->input->post('id');
		$name = $this->input->post('name');
		$email = $this->input->post('email');
		$phone_number = $this->input->post('phone_number');
		$product = $this->input->post('product');
		$paid_status = $this->input->post('paid_status');
		$item_status = $this->input->post('item_status');
		$admin_id = $this->session->userdata('admin_id');

		$data = array(
			'name' => $name,
			'email' => $email,
			'phone_number' => $phone_number,
			'product_id' => $product,
			'paid_status' => $paid_status,
			'transaction_status' => $item_status,
			'created_by' => $admin_id,
			'updated_by' => $admin_id
		);
		$update = $this->Base_model->updateData('transaction', $data, array('transaction_invoice_no' => $id));
		if($update){
			$alert = array(
				'message' => 'Successfully update data',
				'title' => 'Success',
				'type' => 'success'
			);
			$this->session->set_flashdata($alert);
			redirect('transaction/index');
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
	
	public function savetransaction(){
		date_default_timezone_set('Asia/Jakarta');
		$name = $this->input->post('name');
		$email = $this->input->post('email');
		$phone_number = $this->input->post('phone_number');
		$product = $this->input->post('product');
		$paid_status = $this->input->post('paid_status');
		$item_status = $this->input->post('item_status');
		$admin_id = $this->session->userdata('admin_id');

		$data = array(
			'transaction_invoice_no' => "SVR-".date("YmdHis"),
			'name' => $name,
			'email' => $email,
			'phone_number' => $phone_number,
			'product_id' => $product,
			'paid_status' => $paid_status,
			'transaction_status' => $item_status,
			'created_by' => $admin_id,
			'updated_by' => $admin_id
		);
		$insert = $this->Base_model->insertData('transaction', $data);
		if($insert){
			$alert = array(
				'message' => 'Successfully save data',
				'title' => 'Success',
				'type' => 'success'
			);
			$this->session->set_flashdata($alert);
			redirect('transaction/index');
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

	public function deletetransaction($id){
		$delete=$this->Base_model->deleteData('transaction', array('transaction_id' => $id));
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