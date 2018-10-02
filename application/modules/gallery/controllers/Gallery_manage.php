<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery_manage extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('logged') == NULL) {
			header("Location:" . site_url('manage/auth/login') . "?location=" . urlencode($_SERVER['REQUEST_URI']));
		}
		$this->load->model(array('gallery/Gallery_model'));
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
		$data['gallery'] = $this->Gallery_model->get($params);

		$config['per_page'] = 5;
		$config['uri_segment'] = 4;
		$config['base_url'] = site_url('manage/gallery/index');
		$config['suffix'] = '?' . http_build_query($_GET, '', "&");
		$config['total_rows'] = count($this->Gallery_model->get($paramsPage));
		$this->pagination->initialize($config);

		$data['title'] = 'Gallery';
		$data['main'] = 'gallery/gallery_list';
		$this->load->view('manage/layout', $data);
	}

    // Add User and Update
	public function add($id = NULL) {
		$this->load->library('form_validation');

		$this->form_validation->set_rules('gallery_name', 'Title', 'trim|xss_clean|required');

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger"><button position="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>');
		$data['operation'] = is_null($id) ? 'Tambah' : 'Edit';

		if ($_POST AND $this->form_validation->run() == TRUE) {

			if ($this->input->post('gallery_id')) {
				$params['gallery_id'] = $id;
			} 
			$params['gallery_name'] = $this->input->post('gallery_name');
			$params['gallery_place'] = $this->input->post('gallery_place');
			$params['gallery_desc'] = $this->input->post('gallery_desc');

			$status = $this->Gallery_model->add($params);
			$generate = date('Ymdhis');
			if (!empty($_FILES['gallery_image']['name'])) {
				$paramsupdate['gallery_image'] = $this->do_upload($name = 'gallery_image', $fileName=$generate );
			}

			$paramsupdate['gallery_id'] = $status;
			$this->Gallery_model->add($paramsupdate);

			$this->session->set_flashdata('success', $data['operation'] . ' gallery success');
			redirect('manage/gallery');
		} else {
			if ($this->input->post('gallery_id')) {
				redirect('manage/gallery/edit/' . $this->input->post('gallery_id'));
			}

      // Edit mode
			if (!is_null($id)) {
				$object = $this->Gallery_model->get(array('id' => $id));
				if ($object == NULL) {
					redirect('manage/gallery');
				} else {
					$data['gallery'] = $object;
				}
			}

			$data['title'] = $data['operation'] . ' Gallery';
			$data['main'] = 'gallery/gallery_add';
			$this->load->view('manage/layout', $data);
		}
	}

    // View data detail
	public function view($id = NULL) {
		$data['gallery'] = $this->Gallery_model->get(array('id' => $id));
		$data['title'] = 'Gallery Detail';
		$data['main'] = 'gallery/gallery_view';
		$this->load->view('manage/layout', $data);
	}

	// Setting Upload File Requied
	function do_upload($name=NULL, $fileName=NULL) {
		$this->load->library('upload');

		$config['upload_path'] = FCPATH . 'uploads/gallery/';

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
			$this->Gallery_model->delete($id);
			$this->session->set_flashdata('success', 'delete User success');
			redirect('manage/gallery');
	}

}

/* End of file Gallery_manage.php */
/* Location: ./application/modules/gallery/controllers/Gallery_manage.php */