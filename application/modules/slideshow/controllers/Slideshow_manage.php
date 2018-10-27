<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slideshow_manage extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('logged') == NULL) {
			header("Location:" . site_url('manage/auth/login') . "?location=" . urlencode($_SERVER['REQUEST_URI']));
		}
		$this->load->model(array('slideshow/Slideshow_model'));
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
		$data['slideshow'] = $this->Slideshow_model->get($params);

		$config['per_page'] = 5;
		$config['uri_segment'] = 4;
		$config['base_url'] = site_url('manage/slideshow/index');
		$config['suffix'] = '?' . http_build_query($_GET, '', "&");
		$config['total_rows'] = count($this->Slideshow_model->get($paramsPage));
		$this->pagination->initialize($config);

		$data['title'] = 'Slideshow';
		$data['main'] = 'slideshow/slideshow_list';
		$this->load->view('manage/layout', $data);
	}

    // Add User and Update
	public function add($id = NULL) {
		$this->load->library('form_validation');

		$this->form_validation->set_rules('slideshow_name', 'Judul', 'trim|xss_clean|required');

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger"><button position="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>');
		$data['operation'] = is_null($id) ? 'Tambah' : 'Edit';

		if ($_POST AND $this->form_validation->run() == TRUE) {

			if ($this->input->post('slideshow_id')) {
				$params['slideshow_id'] = $id;
				$params['slideshow_last_update'] = date('Y-m-d H:i:s');
			} 
			else {
				$params['slideshow_input_date'] = date('Y-m-d H:i:s');
			}
			$params['slideshow_name'] = $this->input->post('slideshow_name');
			$params['slideshow_status'] = $this->input->post('slideshow_status');
			$params['user_id'] = $this->session->userdata('uid');
			

			$status = $this->Slideshow_model->add($params);
			$generate = date('Ymdhis');
			if (!empty($_FILES['slideshow_image']['name'])) {
				$paramsupdate['slideshow_image'] = $this->do_upload($name = 'slideshow_image', $fileName=$generate );
			}

			$paramsupdate['slideshow_id'] = $status;
			$this->Slideshow_model->add($paramsupdate);

			$this->session->set_flashdata('success', $data['operation'] . ' Slideshow success');
			redirect('manage/slideshow');
		} else {
			if ($this->input->post('slideshow_id')) {
				redirect('manage/slideshow/edit/' . $this->input->post('slideshow_id'));
			}

            // Edit mode
			if (!is_null($id)) {
				$object = $this->Slideshow_model->get(array('id' => $id));
				if ($object == NULL) {
					redirect('manage/slideshow');
				} else {
					$data['slideshow'] = $object;
				}
			}

			$data['title'] = $data['operation'] . ' Slideshow';
			$data['main'] = 'slideshow/slideshow_add';
			$this->load->view('manage/layout', $data);
		}
	}

    // View data detail
	public function view($id = NULL) {
		$data['slideshow'] = $this->Slideshow_model->get(array('id' => $id));
		$data['title'] = 'Slideshow Detail';
		$data['main'] = 'slideshow/slideshow_view';
		$this->load->view('manage/layout', $data);
	}

	public function delete($id = NULL) {
		$this->Slideshow_model->delete($id);
		$this->session->set_flashdata('success', 'delete Slideshow success');
		redirect('manage/slideshow');
	}

	function do_upload($name=NULL, $fileName=NULL) {
		$this->load->library('upload');

		$config['upload_path'] = FCPATH . 'uploads/slideshow/';

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

}

/* End of file Slideshow_manage.php */
/* Location: ./application/modules/slideshow/controllers/Slideshow_manage.php */