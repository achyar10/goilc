<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Training extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('training/Training_model', 'category/Category_model'));
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

		if (isset($f['c']) && !empty($f['c']) && $f['c'] != '') {
			$params['cat'] = $f['c'];
		}

		$params['status'] = TRUE;
		$paramsPage = $params;
		$params['limit'] = 9;
		$params['offset'] = $offset;

		$config['per_page'] = 9;
		$config['uri_segment'] = 3;
		$config['base_url'] = site_url('training/index');
		$config['suffix'] = '?' . http_build_query($_GET, '', "&");
		$config['total_rows'] = count($this->Training_model->get($paramsPage));
		$this->pagination->initialize($config);

		$data['training'] = $this->Training_model->get($params);
		$data['category'] = $this->Category_model->get();
		$data['title'] = 'Daftar Training';
		$data['main'] = 'training/training';
		$this->load->view('frontend/layout', $data);
	}

	function detail($id = NULL) {
		$data['training'] = $this->Training_model->get(array('id' => $id));
		$data['title'] = 'Detail Training';
		$data['main'] = 'training/training_detail';
		$this->load->view('frontend/layout', $data);
	}

}

/* End of file Training.php */
/* Location: ./application/modules/training/controllers/Training.php */