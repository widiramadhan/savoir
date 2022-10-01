<?php 

class Subscriber extends CI_Controller{
	
	function __construct(){
		parent::__construct();
	
		$this->load->helper('url');     
		$this->load->model('Base_model');
		$this->load->library('upload');		
	}

	public function savesubscriber(){
		$name = $this->input->post('name');
		$email = $this->input->post('email');
		$phone = $this->input->post('phone');
		$data = array(
			'subscriber_name' => $name,
			'subscriber_email' => $email,
			'subscriber_phone_number' => $phone
		);

		$check = $this->Base_model->getDataBy("subscriber", array('subscriber_email' => $email));
		if($check->num_rows() < 0){
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

			$message = 'Thank you for subscribe. You get a IDR 250,000 voucher to be used in purchasing goods. We will contact you soon.';
			$this->load->library('email', $config);
			$this->email->set_newline("\r\n");
			$this->email->from('info@savoir.id');
			$this->email->to($email);
			$this->email->subject('Thanks for subscribe Savoir');
			$this->email->message($message);
			if($this->email->send()) {
				$insert = $this->Base_model->insertData('subscriber', $data);
				if($insert){
					$alert = array(
						'message' => 'Successfully subscribe. Check your inbox or spam',
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
			$alert = array(
				'message' => 'You have already subscribed to this',
				'title' => 'Error',
				'type' => 'error'
			);
			$this->session->set_flashdata($alert);
			redirect($_SERVER['HTTP_REFERER']);
		}
	}
}
?>