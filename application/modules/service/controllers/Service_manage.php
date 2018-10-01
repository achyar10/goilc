<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service_manage extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('logged') == NULL) {
			header("Location:" . site_url('manage/auth/login') . "?location=" . urlencode($_SERVER['REQUEST_URI']));
		}
		$this->load->model('service/Service_model');
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
		$data['service'] = $this->Service_model->get($params);

		$config['per_page'] = 5;
		$config['uri_segment'] = 4;
		$config['base_url'] = site_url('manage/service/index');
		$config['suffix'] = '?' . http_build_query($_GET, '', "&");
		$config['total_rows'] = count($this->Service_model->get($paramsPage));
		$this->pagination->initialize($config);

		$data['title'] = 'Pelayanan';
		$data['main'] = 'service/service_list';
		$this->load->view('manage/layout', $data);
	}

    // Add User and Update
	public function add($id = NULL) {
		$this->load->library('form_validation');

		$this->form_validation->set_rules('service_name', 'Nama', 'trim|xss_clean|required');

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger"><button position="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>');
		$data['operation'] = is_null($id) ? 'Tambah' : 'Edit';

		if ($_POST AND $this->form_validation->run() == TRUE) {

			if ($this->input->post('service_id')) {
				$params['service_id'] = $id;
			} 
			$params['service_name'] = $this->input->post('service_name');

			$status = $this->Service_model->add($params);

			$this->session->set_flashdata('success', $data['operation'] . ' service success');
			redirect('manage/service');
		} else {
			if ($this->input->post('service_id')) {
				redirect('manage/service/edit/' . $this->input->post('service_id'));
			}

            // Edit mode
			if (!is_null($id)) {
				$object = $this->Service_model->get(array('id' => $id));
				if ($object == NULL) {
					redirect('manage/service');
				} else {
					$data['service'] = $object;
				}
			}

			$data['title'] = $data['operation'] . ' Pelayanan';
			$data['main'] = 'service/service_add';
			$this->load->view('manage/layout', $data);
		}
	}

    // View data detail
	public function view($id = NULL) {
		$data['service'] = $this->Service_model->get(array('id' => $id));
		$data['title'] = 'service Detail';
		$data['main'] = 'service/service_view';
		$this->load->view('manage/layout', $data);
	}


    // Delete to database
	public function delete($id = NULL) {
		if ($this->session->userdata('uroleid')!= SUPERADMIN){
			redirect('manage');
		}
			$this->Service_model->delete($id);
			$this->session->set_flashdata('success', 'delete User success');
			redirect('manage/service');
	}

}

/* End of file Service_manage.php */
/* Location: ./application/modules/service/controllers/Service_manage.php */