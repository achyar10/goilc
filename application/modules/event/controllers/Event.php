<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('gallery/Gallery_model');
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

		$paramsPage = $params;
		$params['limit'] = 5;
		$params['offset'] = $offset;

		$config['per_page'] = 5;
		$config['uri_segment'] = 3;
		$config['base_url'] = site_url('event/index');
		$config['suffix'] = '?' . http_build_query($_GET, '', "&");
		$config['total_rows'] = count($this->Gallery_model->get($paramsPage));
		$this->pagination->initialize($config);

		$data['event'] = $this->Gallery_model->get();
		$data['title'] = 'Events';
		$data['main'] = 'event/event';
		$this->load->view('frontend/layout', $data);	
	}

	function detail($id = NULL) {
		$data['event'] = $this->Gallery_model->get(array('id'=>$id));
		$data['title'] = 'Events Detail';
		$data['main'] = 'event/event_detail';
		$this->load->view('frontend/layout', $data);	
	}

}

/* End of file Event.php */
/* Location: ./application/modules/event/controllers/Event.php */