<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Infografis extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('infografis/Infografis_model');
		$this->load->helper('text');
	}

	public function index($offset = NULL) {

		$this->load->library('pagination');
		$f = $this->input->get(NULL, TRUE);

		$data['f'] = $f;

		$params = array();
        // Nip
		if (isset($f['n']) && !empty($f['n']) && $f['n'] != '') {
			$params['search'] = $f['n'];
		}

		$paramsPage = $params;
		$params['limit'] = 5;
		$params['offset'] = $offset;
		$config['per_page'] = 5;
		$config['uri_segment'] = 3;

		$config['base_url'] = site_url('infografis/index');
		$config['suffix'] = '?' . http_build_query($_GET, '', "&");
		$config['total_rows'] = count($this->Infografis_model->get($paramsPage));
		$this->pagination->initialize($config);
		$data['infografis'] = $this->Infografis_model->get($params);

		$data['title'] = 'Infografis';
		$data['main'] = 'infografis/infografis_list_front';
		$this->load->view('frontend/layout', $data);	
	}


}

/* End of file Infografis.php */
/* Location: ./application/modules/infografis/controllers/Infografis.php */