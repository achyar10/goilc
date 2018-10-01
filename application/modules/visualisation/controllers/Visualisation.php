<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Visualisation extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('visualisation/Visualisation_model');
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
		$data['visualisation'] = $this->Visualisation_model->get($params);

		$config['per_page'] = 5;
		$config['uri_segment'] = 3;
		$config['base_url'] = site_url('visualisation/index');
		$config['suffix'] = '?' . http_build_query($_GET, '', "&");
		$config['total_rows'] = count($this->Visualisation_model->get($paramsPage));
		$this->pagination->initialize($config);

		$data['title'] = 'Visualisasi';
		$data['main'] = 'visualisation/visualisation_list_front';
		$this->load->view('frontend/layout', $data);	
	}

	  // View data detail
	public function detail($id = NULL) {
		$data['visualisation'] = $this->Visualisation_model->get(array('id' => $id));
		$data['title'] = 'Visualisasi';
		$data['main'] = 'visualisation/visualisation_detail_front';
		$this->load->view('frontend/layout', $data);
	}

}

/* End of file Visualisation.php */
/* Location: ./application/modules/visualisation/controllers/Visualisation.php */