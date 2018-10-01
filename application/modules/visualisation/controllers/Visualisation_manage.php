<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Visualisation_manage extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('logged') == NULL) {
			header("Location:" . site_url('manage/auth/login') . "?location=" . urlencode($_SERVER['REQUEST_URI']));
		}
		$this->load->model('visualisation/Visualisation_model');
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
		$data['visualisation'] = $this->Visualisation_model->get($params);

		$config['per_page'] = 5;
		$config['uri_segment'] = 4;
		$config['base_url'] = site_url('manage/visualisation/index');
		$config['suffix'] = '?' . http_build_query($_GET, '', "&");
		$config['total_rows'] = count($this->Visualisation_model->get($paramsPage));
		$this->pagination->initialize($config);

		$data['title'] = 'Visualisation';
		$data['main'] = 'visualisation/visualisation_list';
		$this->load->view('manage/layout', $data);
	}

    // Add User and Update
	public function add($id = NULL) {
		$this->load->library('form_validation');

		$this->form_validation->set_rules('visualisation_link', 'Link', 'trim|required');

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger"><button position="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>');
		$data['operation'] = is_null($id) ? 'Add' : 'Edit';

		if ($_POST AND $this->form_validation->run() == TRUE) {

			if ($this->input->post('visualisation_id')) {
				$params['visualisation_id'] = $id;
				$params['visualisation_last_update'] = date('Y-m-d H:i:s');
			} else {
				$params['visualisation_input_date'] = date('Y-m-d H:i:s');
			}
			$params['visualisation_name'] = $this->input->post('visualisation_name');
			$params['visualisation_desc'] = $this->input->post('visualisation_desc');
			$params['visualisation_dataset'] = $this->input->post('visualisation_dataset');
			$params['visualisation_source'] = $this->input->post('visualisation_source');
			$params['visualisation_link'] = $this->input->post('visualisation_link');
			$params['user_user_id'] = $this->session->userdata('uid');

			$status = $this->Visualisation_model->add($params);
			$generate = date('Ymdhis');
			if (!empty($_FILES['visualisation_image']['name'])) {
				$paramsupdate['visualisation_image'] = $this->do_upload($name = 'visualisation_image', $fileName=$generate );
			}

			$paramsupdate['visualisation_id'] = $status;
			$this->Visualisation_model->add($paramsupdate);

			$this->session->set_flashdata('success', $data['operation'] . ' Visualisation success');
			redirect('manage/visualisation');
		} else {
			if ($this->input->post('visualisation_id')) {
				redirect('manage/visualisation/edit/' . $this->input->post('visualisation_id'));
			}

            // Edit mode
			if (!is_null($id)) {
				$object = $this->Visualisation_model->get(array('id' => $id));
				if ($object == NULL) {
					redirect('manage/visualisation');
				} else {
					$data['visualisation'] = $object;
				}
			}

			$data['title'] = $data['operation'] . ' Visualisation';
			$data['main'] = 'visualisation/visualisation_add';
			$this->load->view('manage/layout', $data);
		}
	}

    // View data detail
	public function view($id = NULL) {
		$data['visualisation'] = $this->Visualisation_model->get(array('id' => $id));
		$data['title'] = 'Visualisation Detail';
		$data['main'] = 'visualisation/visualisation_view';
		$this->load->view('manage/layout', $data);
	}

	// Setting Upload File Requied
	function do_upload($name=NULL, $fileName=NULL) {
		$this->load->library('upload');

		$config['upload_path'] = FCPATH . 'uploads/visualisation/';

		/* create directory if not exist */
		if (!is_dir($config['upload_path'])) {
			mkdir($config['upload_path'], 0777, TRUE);
		}

		$config['allowed_types'] = 'gif|jpg|jpeg|png';
		$config['max_size'] = '32000';
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
		$this->Visualisation_model->delete($id);
		$this->session->set_flashdata('success', 'visualisation success');
		redirect('manage/visualisation');
		
	}

}

/* End of file Visualisation_manage.php */
/* Location: ./application/modules/visualisation/controllers/Visualisation_manage.php */