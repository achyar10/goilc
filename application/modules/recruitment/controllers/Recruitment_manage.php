<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recruitment_manage extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('logged') == NULL) {
			header("Location:" . site_url('manage/auth/login') . "?location=" . urlencode($_SERVER['REQUEST_URI']));
		}
		$this->load->model(array('recruitment/Recruitment_model', 'subscriber/Subscriber_model'));
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
		$data['recruitment'] = $this->Recruitment_model->get($params);

		$config['per_page'] = 5;
		$config['uri_segment'] = 4;
		$config['base_url'] = site_url('manage/recruitment/index');
		$config['suffix'] = '?' . http_build_query($_GET, '', "&");
		$config['total_rows'] = count($this->Recruitment_model->get($paramsPage));
		$this->pagination->initialize($config);

		$data['title'] = 'Karir';
		$data['main'] = 'recruitment/recruitment_list';
		$this->load->view('manage/layout', $data);
	}

    // Add User and Update
	public function add($id = NULL) {
		$this->load->library('form_validation');

		$this->form_validation->set_rules('recruitment_title', 'Judul', 'trim|xss_clean|required');

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger"><button position="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>');
		$data['operation'] = is_null($id) ? 'Tambah' : 'Edit';

		if ($_POST AND $this->form_validation->run() == TRUE) {

			if ($this->input->post('recruitment_id')) {
				$params['recruitment_id'] = $id;
				$params['recruitment_last_update'] = date('Y-m-d H:i:s');
			} 
			else {
				$params['recruitment_input_date'] = date('Y-m-d H:i:s');
			}
			$params['recruitment_title'] = $this->input->post('recruitment_title');
			$params['recruitment_letter'] = $this->input->post('recruitment_letter');
			$params['recruitment_status'] = $this->input->post('recruitment_status');
			$params['user_id'] = $this->session->userdata('uid');
			

			$status = $this->Recruitment_model->add($params);

			$this->session->set_flashdata('success', $data['operation'] . ' Karir success');
			redirect('manage/recruitment');
		} else {
			if ($this->input->post('recruitment_id')) {
				redirect('manage/recruitment/edit/' . $this->input->post('recruitment_id'));
			}

            // Edit mode
			if (!is_null($id)) {
				$object = $this->Recruitment_model->get(array('id' => $id));
				if ($object == NULL) {
					redirect('manage/recruitment');
				} else {
					$data['recruitment'] = $object;
				}
			}

			$data['title'] = $data['operation'] . ' Karir';
			$data['main'] = 'recruitment/recruitment_add';
			$this->load->view('manage/layout', $data);
		}
	}

    // View data detail
	public function view($id = NULL) {
		$data['recruitment'] = $this->Recruitment_model->get(array('id' => $id));
		$data['title'] = 'Karir Detail';
		$data['main'] = 'recruitment/recruitment_view';
		$this->load->view('manage/layout', $data);
	}

	public function delete($id = NULL) {
		$this->Recruitment_model->delete($id);
		$this->session->set_flashdata('success', 'delete Karir success');
		redirect('manage/recruitment');
	}

}

/* End of file Recruitment_manage.php */
/* Location: ./application/modules/recruitment/controllers/Recruitment_manage.php */