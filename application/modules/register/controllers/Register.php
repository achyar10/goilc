<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('register/Register_model', 'training/Training_model'));
	}

	public function index() {

		$this->load->library('form_validation');

		$this->form_validation->set_rules('register_corporate', 'Perusahaan', 'trim|xss_clean|required');
		$this->form_validation->set_rules('register_pic_name', 'Nama', 'trim|xss_clean|required');
		$this->form_validation->set_rules('register_pic_email', 'Email', 'trim|xss_clean|required');
		$this->form_validation->set_rules('register_pic_phone', 'Telepon', 'trim|xss_clean|required');
		$this->form_validation->set_rules('training_id', 'Pelatihan', 'trim|xss_clean|required');

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger"><button position="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>');

		if ($_POST AND $this->form_validation->run() == TRUE) {

			$data['training'] = $this->Training_model->get();
			$noreg = date('Ymdhis') . random_string('numeric', 4);

			if ($this->input->post('register_id')) {
				$params['register_id'] = $id;
			} 
			$params['register_no'] = $noreg;
			$params['register_corporate'] = $this->input->post('register_corporate');
			$params['register_pic_name'] = $this->input->post('register_pic_name');
			$params['register_pic_email'] = $this->input->post('register_pic_email');
			$params['register_pic_phone'] = $this->input->post('register_pic_phone');
			$params['register_pic_jab'] = $this->input->post('register_pic_jab');
			$params['register_pic_tlp'] = $this->input->post('register_pic_tlp');
			$params['register_pic_fax'] = $this->input->post('register_pic_fax');
			$params['register_pay_name'] = $this->input->post('register_pay_name');
			$params['register_pay_jab'] = $this->input->post('register_pay_jab');
			$params['register_pay_tlp'] = $this->input->post('register_pay_tlp');
			$params['register_pay_fax'] = $this->input->post('register_pay_fax');
			$params['register_pay_phone'] = $this->input->post('register_pay_phone');
			$params['register_add_inv'] = $this->input->post('register_add_inv');
			$params['training_id'] = $this->input->post('training_id');
			$params['register_input_date'] = date('Y-m-d H:i:s');
			$params['register_last_update'] = date('Y-m-d H:i:s');

			$status = $this->Register_model->add($params);

			$name = $_POST['member_name'];
			$cpt = count($_POST['member_name']);
			for ($i = 0; $i < $cpt; $i++) {
				$param['member_name'] = $name[$i];
				$param['member_jab'] = $_POST['member_jab'][$i];
				$param['member_phone'] = $_POST['member_phone'][$i];
				$param['member_email'] = $_POST['member_email'][$i];
				$param['register_id'] = $status;

				$this->Register_model->add_member($param);
			}

			$this->session->set_flashdata('success', 'Register success');
			redirect('register');

		} else {

			$data['training'] = $this->Training_model->get();
			$config['base_url'] = site_url('register/index');
			$config['suffix'] = '?' . http_build_query($_GET, '', "&");
			$data['title'] = 'Pendaftaran';
			$data['main'] = 'register/register';
			$this->load->view('frontend/layout', $data);
		}
	}

	function regtraining($id = NULL) {
		$this->load->library('form_validation');

		$this->form_validation->set_rules('register_corporate', 'Perusahaan', 'trim|xss_clean|required');
		$this->form_validation->set_rules('register_pic_name', 'Nama', 'trim|xss_clean|required');
		$this->form_validation->set_rules('register_pic_email', 'Email', 'trim|xss_clean|required');
		$this->form_validation->set_rules('register_pic_phone', 'Telepon', 'trim|xss_clean|required');

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger"><button position="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>');

		if ($_POST AND $this->form_validation->run() == TRUE) {
			$noreg = date('Ymdhis') . random_string('numeric', 4);
 
			$params['register_no'] = $noreg;
			$params['register_corporate'] = $this->input->post('register_corporate');
			$params['register_pic_name'] = $this->input->post('register_pic_name');
			$params['register_pic_email'] = $this->input->post('register_pic_email');
			$params['register_pic_phone'] = $this->input->post('register_pic_phone');
			$params['register_pic_jab'] = $this->input->post('register_pic_jab');
			$params['register_pic_tlp'] = $this->input->post('register_pic_tlp');
			$params['register_pic_fax'] = $this->input->post('register_pic_fax');
			$params['register_pay_name'] = $this->input->post('register_pay_name');
			$params['register_pay_jab'] = $this->input->post('register_pay_jab');
			$params['register_pay_tlp'] = $this->input->post('register_pay_tlp');
			$params['register_pay_fax'] = $this->input->post('register_pay_fax');
			$params['register_pay_phone'] = $this->input->post('register_pay_phone');
			$params['register_add_inv'] = $this->input->post('register_add_inv');
			$params['training_id'] = $id;
			$params['register_input_date'] = date('Y-m-d H:i:s');
			$params['register_last_update'] = date('Y-m-d H:i:s');

			$status = $this->Register_model->add($params);

			$name = $_POST['member_name'];
			$cpt = count($_POST['member_name']);
			for ($i = 0; $i < $cpt; $i++) {
				$param['member_name'] = $name[$i];
				$param['member_jab'] = $_POST['member_jab'][$i];
				$param['member_phone'] = $_POST['member_phone'][$i];
				$param['member_email'] = $_POST['member_email'][$i];
				$param['register_id'] = $status;

				$this->Register_model->add_member($param);
			}

			$this->session->set_flashdata('success', 'Register success');
			redirect('register/reg_success/'.$status);

		} else {

			$data['training'] = $this->Training_model->get(array('id'=>$id));
			$data['title'] = 'Pendaftaran Training';
			$data['main'] = 'register/register_training';
			$this->load->view('frontend/layout', $data);
		}
	}

	function reg_success($id = NULL) {
		
		$data['register'] = $this->Register_model->get(array('id'=>$id));
		$data['title'] = 'Pendaftaran';
		$data['main'] = 'register/register_success';
		$this->load->view('frontend/layout', $data);
	}

	function print_reg($id = NULL) {
		$data['register'] = $this->Register_model->get(array('id'=>$id));
		$data['member'] = $this->Register_model->get_member(array('register_id'=>$id));

		$this->load->helper('dompdf');
		$html = $this->load->view('register/register_pdf', $data, true);
		$data = pdf_create($html, 'Form Pendaftaran', 'A4');
	}

}

/* End of file Register.php */
/* Location: ./application/modules/register/controllers/Register.php */