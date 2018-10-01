<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_manage extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('logged') == NULL) {
			header("Location:" . site_url('manage/auth/login') . "?location=" . urlencode($_SERVER['REQUEST_URI']));
		}
		$this->load->model('category/Category_model');
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
		$data['category'] = $this->Category_model->get($params);

		$config['per_page'] = 5;
		$config['uri_segment'] = 4;
		$config['base_url'] = site_url('manage/category/index');
		$config['suffix'] = '?' . http_build_query($_GET, '', "&");
		$config['total_rows'] = count($this->Category_model->get($paramsPage));
		$this->pagination->initialize($config);

		$data['title'] = 'Kategori';
		$data['main'] = 'category/category_list';
		$this->load->view('manage/layout', $data);
	}

    // Add User and Update
	public function add($id = NULL) {
		$this->load->library('form_validation');

		$this->form_validation->set_rules('category_name', 'Title', 'trim|xss_clean|required');

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger"><button position="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>');
		$data['operation'] = is_null($id) ? 'Add' : 'Edit';

		if ($_POST AND $this->form_validation->run() == TRUE) {

			if ($this->input->post('category_id')) {
				$params['category_id'] = $id;
			} 
			$params['category_name'] = $this->input->post('category_name');

			$status = $this->Category_model->add($params);

			$this->session->set_flashdata('success', $data['operation'] . ' category success');
			redirect('manage/category');
		} else {
			if ($this->input->post('category_id')) {
				redirect('manage/category/edit/' . $this->input->post('category_id'));
			}

            // Edit mode
			if (!is_null($id)) {
				$object = $this->Category_model->get(array('id' => $id));
				if ($object == NULL) {
					redirect('manage/category');
				} else {
					$data['category'] = $object;
				}
			}

			$data['title'] = $data['operation'] . ' category';
			$data['main'] = 'category/category_add';
			$this->load->view('manage/layout', $data);
		}
	}

    // View data detail
	public function view($id = NULL) {
		$data['category'] = $this->Category_model->get(array('id' => $id));
		$data['title'] = 'category Detail';
		$data['main'] = 'category/category_view';
		$this->load->view('manage/layout', $data);
	}


    // Delete to database
	public function delete($id = NULL) {
		if ($this->session->userdata('uroleid')!= SUPERADMIN){
			redirect('manage');
		}
			$this->Category_model->delete($id);
			$this->session->set_flashdata('success', 'delete User success');
			redirect('manage/category');
	}

}

/* End of file category_manage.php */
/* Location: ./application/modules/category/controllers/category_manage.php */