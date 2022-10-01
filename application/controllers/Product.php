<?php 

class Product extends CI_Controller{
	
	function __construct(){
		parent::__construct();	
		$this->load->helper('url');     
		$this->load->model('Base_model');
	}

	public function productbycatalog($slug){
		$category = $this->Base_model->getDataBy('category', array('is_active' => 1))->result();
		$designer = $this->Base_model->getDataBy('designer', array('is_active' => 1))->result();
		$catalog  =$this->Base_model->getDataBy('category', array('category_slug' => $slug))->row_array();
		$product = $this->db->select('*')->from('product a')->join('category b', 'a.category_id = b.category_id', 'left')->where(array('b.category_slug' => $slug))->get();		
		$data = array('category' => $category, 'designer' => $designer, 'product' => $product, 'catalog' => $catalog);
			
		$this->load->view("template/header", $data);
		$this->load->view("catalog_view", $data);
		$this->load->view("template/footer");
	}

	public function productbydesigner($slug){
		$category = $this->Base_model->getDataBy('category', array('is_active' => 1))->result();
		$designer = $this->Base_model->getDataBy('designer', array('is_active' => 1))->result();
		$catalog  =$this->Base_model->getDataBy('designer', array('designer_slug' => $slug))->row_array();
		$product = $this->db->select('*')->from('product a')->join('designer b', 'a.designer_id = b.designer_id', 'left')->where(array('b.designer_slug' => $slug))->get();		
		$data = array('category' => $category, 'designer' => $designer, 'product' => $product, 'catalog' => $catalog);
			
		$this->load->view("template/header", $data);
		$this->load->view("designer_view", $data);
		$this->load->view("template/footer");
	}

	public function detail($slug){
		$category = $this->Base_model->getDataBy('category', array('is_active' => 1))->result();
		$designer = $this->Base_model->getDataBy('designer', array('is_active' => 1))->result();
		$product = $this->db->select('*')->from('product a')->join('category b', 'a.category_id = b.category_id', 'left')->join('designer c', 'a.designer_id = c.designer_id', 'left')->where(array('a.product_slug' => $slug))->get()->row_array();			
		$data = array('category' => $category, 'designer' => $designer, 'product' => $product);
			
		$this->load->view("template/header", $data);
		$this->load->view("catalog_detail_view", $data);
		$this->load->view("template/footer");
	}

	public function buy(){
		date_default_timezone_set('Asia/Jakarta');
		$name = $this->input->post('name');
		$email = $this->input->post('email');
		$phone = $this->input->post('phone');
		$address = $this->input->post('address');
		$product = $this->input->post('id');

		$cek = $this->Base_model->getDataBy("product", array('product_id' => $product));

		$data = array(
			'transaction_invoice_no' => "SVR-".date("YmdHis"),
			'name' => $name,
			'email' => $email,
			'phone_number' => $phone,
			'address' => $address,
			'product_id' => $product,
			'paid_status' => "Unpaid",
			'transaction_status' => "Preparation"
		);

		$config = Array(
			'protocol' => 'smtp',
			'smtp_host' => 'mail.savoir.id',
			'smtp_port' => 465,
			'smtp_user' => '_mainaccount@savoir.id',
			'smtp_pass' => 'Twg3Hf73yvzV23',
			'mailtype' => 'html',
			'charset' => 'iso-8859-1',
			'wordwrap' => TRUE,
			'smtp_crypto' => 'ssl'
		);

		//message to customer
		$message = 'Thank you for your order request. Please be patient, our team will contact you a few minute';
		$message_to_admin = $cek->row()->product_name;
		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
		$this->email->from('info@savoir.id');
		$this->email->to($email);
		$this->email->subject('Thanks for your order');
		$this->email->message($message);
		if($this->email->send()) {
			//message to admin
			$message_to_admin = "Hello, there is a transaction waiting for you.<br>The following is the customer data that can be contacted:<br><br>Name : ".$name."<br>Email : ".$email."<br>Phone : ".$phone." ";
			$this->load->library('email', $config);
			$this->email->set_newline("\r\n");
			$this->email->from('info@savoir.id');
			$this->email->to("savoirjakarta@gmail.com"); //change your email admin
			$this->email->subject($cek->row()->product_name);
			$this->email->message($message_to_admin);
			if($this->email->send()) {
				$insert = $this->Base_model->insertData('transaction', $data);
				if($insert){
					$alert = array(
						'message' => 'Successfully order. Thanks for your order',
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
			} else {
				show_error($this->email->print_debugger());
				$alert = array(
					'message' => 'Opps.. something went wrong ',
					'title' => 'Error',
					'type' => 'error'
				);
				$this->session->set_flashdata($alert);
				redirect($_SERVER['HTTP_REFERER']);
			}
		} else {
			show_error($this->email->print_debugger());
			$alert = array(
				'message' => 'Opps.. something went wrong ',
				'title' => 'Error',
				'type' => 'error'
			);
			$this->session->set_flashdata($alert);
			redirect($_SERVER['HTTP_REFERER']);
		}
	}
}
?>