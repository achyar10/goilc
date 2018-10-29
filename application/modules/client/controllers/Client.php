<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('client/Client_model');
	}

	public function index()
	{
		$data['client'] = $this->Client_model->get();
		$data['title'] = 'Client';
		$data['main'] = 'client/client';
		$this->load->view('frontend/layout', $data);	
	}

}

/* End of file Client.php */
/* Location: ./application/modules/client/controllers/Client.php */