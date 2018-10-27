<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blasting_manage extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('logged') == NULL) {
			header("Location:" . site_url('manage/auth/login') . "?location=" . urlencode($_SERVER['REQUEST_URI']));
		}
		$this->load->model(array('blasting/Blasting_model', 'subscriber/Subscriber_model'));
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
		$data['blasting'] = $this->Blasting_model->get($params);

		$config['per_page'] = 5;
		$config['uri_segment'] = 4;
		$config['base_url'] = site_url('manage/blasting/index');
		$config['suffix'] = '?' . http_build_query($_GET, '', "&");
		$config['total_rows'] = count($this->Blasting_model->get($paramsPage));
		$this->pagination->initialize($config);

		$data['title'] = 'Blasting';
		$data['main'] = 'blasting/blasting_list';
		$this->load->view('manage/layout', $data);
	}

    // Add User and Update
	public function add($id = NULL) {
		$this->load->library('form_validation');

		$this->form_validation->set_rules('blasting_title', 'Judul', 'trim|xss_clean|required');

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger"><button position="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>');
		$data['operation'] = is_null($id) ? 'Tambah' : 'Edit';

		if ($_POST AND $this->form_validation->run() == TRUE) {

			if ($this->input->post('blasting_id')) {
				$params['blasting_id'] = $id;
				$params['blasting_last_update'] = date('Y-m-d H:i:s');
			} 
			else {
				$params['blasting_input_date'] = date('Y-m-d H:i:s');
			}
			$params['blasting_title'] = $this->input->post('blasting_title');
			$params['blasting_letter'] = $this->input->post('blasting_letter');
			$params['user_id'] = $this->session->userdata('uid');
			

			$status = $this->Blasting_model->add($params);

			$this->session->set_flashdata('success', $data['operation'] . ' blasting success');
			redirect('manage/blasting');
		} else {
			if ($this->input->post('blasting_id')) {
				redirect('manage/blasting/edit/' . $this->input->post('blasting_id'));
			}

            // Edit mode
			if (!is_null($id)) {
				$object = $this->Blasting_model->get(array('id' => $id));
				if ($object == NULL) {
					redirect('manage/blasting');
				} else {
					$data['blasting'] = $object;
				}
			}

			$data['title'] = $data['operation'] . ' Blasting';
			$data['main'] = 'blasting/blasting_add';
			$this->load->view('manage/layout', $data);
		}
	}

    // View data detail
	public function view($id = NULL) {
		$data['blasting'] = $this->Blasting_model->get(array('id' => $id));
		$data['title'] = 'blasting Detail';
		$data['main'] = 'blasting/blasting_view';
		$this->load->view('manage/layout', $data);
	}

	function send_blasting($id = NULL) {
		$this->load->config('email'); 
		$this->load->library('email');
		$this->Blasting_model->add(array(
			'blasting_id' => $id,
			'blasting_status' => 1
		));
		$data['blasting'] = $this->Blasting_model->get(array('id' => $id));
		if($this->config->item('email'))
		{   

			$subscribe = $this->Subscriber_model->get();
			$i = 0;
			foreach ($subscribe as $key) {
				$email_subscribe[$i] = $key['subscriber_email'];
				$i++;
			}

			$this->email->from($this->config->item('from'), $this->config->item('from_name'));
			$this->email->bcc($email_subscribe); 
			$this->email->subject($data['blasting']['blasting_title']);
			$message = $this->load->view('email/blasting_email', $data, TRUE);
			$this->email->message($message);
			$this->email->send();
		}
		$this->session->set_flashdata('success', 'blasting success');
			redirect('manage/blasting');
	}


    // Delete to database
	public function delete($id = NULL) {
		$this->Blasting_model->delete($id);
		$this->session->set_flashdata('success', 'delete User success');
		redirect('manage/blasting');
	}

}

/* End of file Blasting_manage.php */
/* Location: ./application/modules/blasting/controllers/Blasting_manage.php */