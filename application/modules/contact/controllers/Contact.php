<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mailbox/Mailbox_model');
	}

	public function index() {

		$this->load->library('form_validation');

		$this->form_validation->set_rules('mailbox_name', 'Nama', 'trim|xss_clean|required');
		$this->form_validation->set_rules('mailbox_corporate', 'Perusahaan', 'trim|xss_clean|required');
		$this->form_validation->set_rules('mailbox_email', 'Email', 'trim|xss_clean|required');
		$this->form_validation->set_rules('mailbox_phone', 'Telepon', 'trim|xss_clean|required');
		$this->form_validation->set_rules('mailbox_subject', 'Subjek', 'trim|xss_clean|required');
		$this->form_validation->set_rules('mailbox_desc', 'Pesan', 'trim|xss_clean|required');

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger"><button position="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>');

		if ($_POST AND $this->form_validation->run() == TRUE) {

			if ($this->input->post('mailbox_id')) {
				$params['mailbox_id'] = $id;
			} 
			$params['mailbox_name'] = $this->input->post('mailbox_name');
			$params['mailbox_corporate'] = $this->input->post('mailbox_corporate');
			$params['mailbox_email'] = $this->input->post('mailbox_email');
			$params['mailbox_phone'] = $this->input->post('mailbox_phone');
			$params['mailbox_subject'] = $this->input->post('mailbox_subject');
			$params['mailbox_desc'] = $this->input->post('mailbox_desc');
			$params['mailbox_input_date'] = date('Y-m-d H:i:s');
			$params['mailbox_last_update'] = date('Y-m-d H:i:s');

			$this->Mailbox_model->add($params);

			$this->session->set_flashdata('success', 'Pesan success');
			redirect('contact');

		} else {

			$config['base_url'] = site_url('contact/index');
			$config['suffix'] = '?' . http_build_query($_GET, '', "&");
			$data['title'] = 'Hubungi Kami';
			$data['main'] = 'contact/contact';
			$this->load->view('frontend/layout', $data);
		}
	}

}

/* End of file Contact.php */
/* Location: ./application/modules/contact/controllers/Contact.php */