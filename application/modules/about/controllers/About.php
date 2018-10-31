<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index() {

		$config['base_url'] = site_url('about/index');
		$config['suffix'] = '?' . http_build_query($_GET, '', "&");
		$data['title'] = 'About Us';
		$data['main'] = 'about/about';
		$this->load->view('frontend/layout', $data);
	}

}

/* End of file About.php */
/* Location: ./application/modules/about/controllers/About.php */