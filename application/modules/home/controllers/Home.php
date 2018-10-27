<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('subscriber/Subscriber_model'); 
	}

	public function index() {

		$this->load->library('form_validation');
		$this->form_validation->set_rules('subscriber_email', 'Email', 'trim|xss_clean|required');

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger"><button position="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>');

		if ($_POST AND $this->form_validation->run() == TRUE) {

			$params['subscriber_email'] = $this->input->post('subscriber_email');
			$params['subscriber_input_date'] = date('Y-m-d H:i:s');
			$params['subscriber_last_update'] = date('Y-m-d H:i:s');

			$this->Subscriber_model->add($params);

			$this->session->set_flashdata('success', 'Subscribe success');
			redirect('home');

		} else {

			$config['base_url'] = site_url('home/index');
			$config['suffix'] = '?' . http_build_query($_GET, '', "&");
			$data['title'] = 'Home';
			$data['main'] = 'home/home';
			$this->load->view('frontend/layout', $data);
		}
	}

}

/* End of file Home.php */
/* Location: ./application/modules/home/controllers/Home.php */