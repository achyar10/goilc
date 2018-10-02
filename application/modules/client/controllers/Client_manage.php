<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client_manage extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('logged') == NULL) {
			header("Location:" . site_url('manage/auth/login') . "?location=" . urlencode($_SERVER['REQUEST_URI']));
		}
		$this->load->model(array('client/Client_model'));
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
		$data['client'] = $this->Client_model->get($params);

		$config['per_page'] = 5;
		$config['uri_segment'] = 4;
		$config['base_url'] = site_url('manage/client/index');
		$config['suffix'] = '?' . http_build_query($_GET, '', "&");
		$config['total_rows'] = count($this->Client_model->get($paramsPage));
		$this->pagination->initialize($config);

		$data['title'] = 'Client';
		$data['main'] = 'client/client_list';
		$this->load->view('manage/layout', $data);
	}

    // Add User and Update
	public function add($id = NULL) {
		$this->load->library('form_validation');

		$this->form_validation->set_rules('client_name', 'Title', 'trim|xss_clean|required');

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger"><button position="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>');
		$data['operation'] = is_null($id) ? 'Tambah' : 'Edit';

		if ($_POST AND $this->form_validation->run() == TRUE) {

			if ($this->input->post('client_id')) {
				$params['client_id'] = $id;
			} 
			$params['client_name'] = $this->input->post('client_name');

			$status = $this->Client_model->add($params);
			$generate = date('Ymdhis');
			if (!empty($_FILES['client_image']['name'])) {
				$paramsupdate['client_image'] = $this->do_upload($name = 'client_image', $fileName=$generate );
			}

			$paramsupdate['client_id'] = $status;
			$this->Client_model->add($paramsupdate);

			$this->session->set_flashdata('success', $data['operation'] . ' client success');
			redirect('manage/client');
		} else {
			if ($this->input->post('client_id')) {
				redirect('manage/client/edit/' . $this->input->post('client_id'));
			}

      // Edit mode
			if (!is_null($id)) {
				$object = $this->Client_model->get(array('id' => $id));
				if ($object == NULL) {
					redirect('manage/client');
				} else {
					$data['client'] = $object;
				}
			}

			$data['title'] = $data['operation'] . ' Client';
			$data['main'] = 'client/client_add';
			$this->load->view('manage/layout', $data);
		}
	}

    // View data detail
	public function view($id = NULL) {
		$data['client'] = $this->Client_model->get(array('id' => $id));
		$data['title'] = 'Client Detail';
		$data['main'] = 'client/client_view';
		$this->load->view('manage/layout', $data);
	}

	// Setting Upload File Requied
	function do_upload($name=NULL, $fileName=NULL) {
		$this->load->library('upload');

		$config['upload_path'] = FCPATH . 'uploads/client/';

		/* create directory if not exist */
		if (!is_dir($config['upload_path'])) {
			mkdir($config['upload_path'], 0777, TRUE);
		}

		$config['allowed_types'] = 'gif|jpg|jpeg|png';
		$config['max_size'] = '54000';
		$config['file_name'] = $fileName;
		$this->upload->initialize($config);

		if (!$this->upload->do_upload($name)) {
			$this->session->set_flashdata('success', $this->upload->display_errors('', ''));
			redirect(uri_string());
		}

		$upload_data = $this->upload->data();

		return $upload_data['file_name'];
	}

    // Delete to database
	public function delete($id = NULL) {
		if ($this->session->userdata('uroleid')!= SUPERADMIN){
			redirect('manage');
		}
			$this->Client_model->delete($id);
			$this->session->set_flashdata('success', 'delete User success');
			redirect('manage/client');
	}

}

/* End of file Client_manage.php */
/* Location: ./application/modules/client/controllers/Client_manage.php */