<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Training_manage extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('logged') == NULL) {
			header("Location:" . site_url('manage/auth/login') . "?location=" . urlencode($_SERVER['REQUEST_URI']));
		}
		$this->load->model(array('training/Training_model', 'category/Category_model', 'service/Service_model'));
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
		$data['training'] = $this->Training_model->get($params);

		$config['per_page'] = 5;
		$config['uri_segment'] = 4;
		$config['base_url'] = site_url('manage/training/index');
		$config['suffix'] = '?' . http_build_query($_GET, '', "&");
		$config['total_rows'] = count($this->Training_model->get($paramsPage));
		$this->pagination->initialize($config);

		$data['title'] = 'Jadwal Pelatihan';
		$data['main'] = 'training/training_list';
		$this->load->view('manage/layout', $data);
	}

    // Add User and Update
	public function add($id = NULL) {
		$this->load->library('form_validation');

		$this->form_validation->set_rules('training_name', 'Title', 'trim|xss_clean|required');
		$this->form_validation->set_rules('category_id', 'Kategori', 'trim|xss_clean|required');
		$this->form_validation->set_rules('service_id', 'Pelayanan', 'trim|xss_clean|required');
		$this->form_validation->set_rules('training_price', 'Pelayanan', 'trim|xss_clean|required');
		$this->form_validation->set_rules('training_place', 'Pelayanan', 'trim|xss_clean|required');

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger"><button position="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>');
		$data['operation'] = is_null($id) ? 'Tambah' : 'Edit';

		if ($_POST AND $this->form_validation->run() == TRUE) {

			if ($this->input->post('training_id')) {
				$params['training_id'] = $id;
				$params['training_last_update'] = date('Y-m-d H:i:s');
			} else {
				$params['training_input_date'] = date('Y-m-d H:i:s');
			}
			$params['training_name'] = $this->input->post('training_name');
			$params['training_place'] = $this->input->post('training_place');
			$params['training_date_start'] = $this->input->post('training_date_start');
			$params['training_date_end'] = $this->input->post('training_date_end');
			$params['training_time'] = $this->input->post('training_time');
			$params['training_price'] = $this->input->post('training_price');
			$params['training_cover_letter'] = $this->input->post('training_cover_letter');
			$params['training_status'] = $this->input->post('training_status');
			$params['category_id'] = $this->input->post('category_id');
			$params['service_id'] = $this->input->post('service_id');
			$params['user_id'] = $this->session->userdata('uid');

			$status = $this->Training_model->add($params);
			$generate = date('Ymdhis');
			if (!empty($_FILES['training_brocure']['name'])) {
				$paramsupdate['training_brocure'] = $this->do_upload($name = 'training_brocure', $fileName=$generate );
			}

			$paramsupdate['training_id'] = $status;
			$this->Training_model->add($paramsupdate);

			$this->session->set_flashdata('success', $data['operation'] . ' training success');
			redirect('manage/training');
		} else {
			if ($this->input->post('training_id')) {
				redirect('manage/training/edit/' . $this->input->post('training_id'));
			}

            // Edit mode
			if (!is_null($id)) {
				$object = $this->Training_model->get(array('id' => $id));
				if ($object == NULL) {
					redirect('manage/training');
				} else {
					$data['training'] = $object;
				}
			}

			$data['category'] = $this->Category_model->get();
			$data['service'] = $this->Service_model->get();
			$data['title'] = $data['operation'] . ' Pelatihan';
			$data['main'] = 'training/training_add';
			$this->load->view('manage/layout', $data);
		}
	}

    // View data detail
	public function view($id = NULL) {
		$data['training'] = $this->Training_model->get(array('id' => $id));
		$data['title'] = 'Pelatihan Detail';
		$data['main'] = 'training/training_view';
		$this->load->view('manage/layout', $data);
	}

	// Setting Upload File Requied
	function do_upload($name=NULL, $fileName=NULL) {
		$this->load->library('upload');

		$config['upload_path'] = FCPATH . 'uploads/training/';

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
			$this->Training_model->delete($id);
			$this->session->set_flashdata('success', 'delete User success');
			redirect('manage/training');
	}

}

/* End of file Training_manage.php */
/* Location: ./application/modules/training/controllers/Training_manage.php */