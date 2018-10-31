<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recruitment extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('recruitment/Recruitment_model');
	}

	public function index($offset = NULL)
	{
		$this->load->library('pagination');
		$f = $this->input->get(NULL, TRUE);

		$data['f'] = $f;

		$params = array();
        // Nip
		if (isset($f['n']) && !empty($f['n']) && $f['n'] != '') {
			$params['search'] = $f['n'];
		}

		$params['publish'] = TRUE;
		$paramsPage = $params;
		$params['limit'] = 5;
		$params['offset'] = $offset;

		$config['per_page'] = 5;
		$config['uri_segment'] = 3;
		$config['base_url'] = site_url('recruitment/index');
		$config['suffix'] = '?' . http_build_query($_GET, '', "&");
		$config['total_rows'] = count($this->Recruitment_model->get($paramsPage));
		$this->pagination->initialize($config);

		$data['recruitment'] = $this->Recruitment_model->get($params);
		$data['title'] = 'Carrer';
		$data['main'] = 'recruitment/recruitment';
		$this->load->view('frontend/layout', $data);	
	}

}

/* End of file Recruitment.php */
/* Location: ./application/modules/recruitment/controllers/Recruitment.php */