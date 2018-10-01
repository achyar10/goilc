<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index() {

		$config['base_url'] = site_url('home/index');
		$config['suffix'] = '?' . http_build_query($_GET, '', "&");
		$data['title'] = 'Home';
		$data['main'] = 'home/home';
		$this->load->view('frontend/layout', $data);
	}

}

/* End of file Home.php */
/* Location: ./application/modules/home/controllers/Home.php */