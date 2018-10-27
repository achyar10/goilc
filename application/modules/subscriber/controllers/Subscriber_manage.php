<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subscriber_manage extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('logged') == NULL) {
			header("Location:" . site_url('manage/auth/login') . "?location=" . urlencode($_SERVER['REQUEST_URI']));
		}
		$this->load->model('subscriber/Subscriber_model');
		$this->load->helper(array('form', 'url'));
	}

	public function index($offset = NULL) {
		$this->load->library('pagination');
		$f = $this->input->get(NULL, TRUE);

		$data['f'] = $f;

		$params = array();
        // Nip
		if (isset($f['n']) && !empty($f['n']) && $f['n'] != '') {
			$params['name'] = $f['n'];
		}

		$paramsPage = $params;
		$params['limit'] = 5;
		$params['offset'] = $offset;
		$data['subscriber'] = $this->Subscriber_model->get($params);

		$config['per_page'] = 5;
		$config['uri_segment'] = 4;
		$config['base_url'] = site_url('manage/subscriber/index');
		$config['suffix'] = '?' . http_build_query($_GET, '', "&");
		$config['total_rows'] = count($this->Subscriber_model->get($paramsPage));
		$this->pagination->initialize($config);

		$data['title'] = 'Subscribers';
		$data['main'] = 'subscriber/subscriber_list';
		$this->load->view('manage/layout', $data);
	}

	public function view($id = NULL) {
		$data['subscriber'] = $this->Subscriber_model->get(array('id' => $id));
		$data['title'] = 'Subscriber Detail';
		$data['main'] = 'subscriber/subscriber_view';
		$this->load->view('manage/layout', $data);
	}

}

/* End of file Subscriber_manage.php */
/* Location: ./application/modules/subscriber/controllers/Subscriber_manage.php */