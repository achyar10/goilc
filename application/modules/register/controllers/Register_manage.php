<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register_manage extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('logged') == NULL) {
			header("Location:" . site_url('manage/auth/login') . "?location=" . urlencode($_SERVER['REQUEST_URI']));
		}
		$this->load->model(array('register/Register_model', 'training/Training_model'));
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

		// $params['group'] = TRUE;

		$paramsPage = $params;
		$params['limit'] = 5;
		$params['offset'] = $offset;

		$config['per_page'] = 5;
		$config['uri_segment'] = 4;
		$config['base_url'] = site_url('manage/register/index');
		$config['suffix'] = '?' . http_build_query($_GET, '', "&");
		$config['total_rows'] = count($this->Register_model->get_reg($paramsPage));
		$this->pagination->initialize($config);

		$data['register'] = $this->Register_model->get_reg($params);
		$data['title'] = 'Pendaftaran Peserta';
		$data['main'] = 'register/register_list';
		$this->load->view('manage/layout', $data);
	}

	function view($id = NULL) {

		$data['register'] = $this->Register_model->get_reg(array('id' => $id));
		$data['member'] = $this->Register_model->get_member(array('register_id'=>$id));
		$data['title'] = 'Detail Pendaftaran';
		$data['main'] = 'register/register_view';
		$this->load->view('manage/layout', $data);
	}

	function print_reg($id = NULL) {
		$data['register'] = $this->Register_model->get(array('id'=>$id));
		$data['member'] = $this->Register_model->get_member(array('register_id'=>$id));

		$this->load->helper('dompdf');
		$html = $this->load->view('register/register_pdf', $data, true);
		$data = pdf_create($html, $data['register']['register_corporate'].'_'.$data['register']['register_no'], 'A4');
	}

	function approve($id = NULL) {
		$this->Register_model->add(array(
			'register_id' => $id,
			'register_status' =>1
		));

		$this->session->set_flashdata('success', 'Approval success');
			redirect('manage/register/view/'.$id);
	}

	function reject($id = NULL) {
		$this->Register_model->add(array(
			'register_id' => $id,
			'register_status' =>2
		));

		$this->session->set_flashdata('success', 'Reject success');
			redirect('manage/register/view/'.$id);
	}

}

/* End of file Register_manage.php */
/* Location: ./application/modules/register/controllers/Register_manage.php */