<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setting_manage extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    if ($this->session->userdata('logged') == NULL) {
      header("Location:" . site_url('manage/auth/login') . "?location=" . urlencode($_SERVER['REQUEST_URI']));
    }
  }

  public function index() {
    $this->load->model('setting/Setting_model');
    $this->load->library('form_validation');
    $this->form_validation->set_rules('setting_pt', 'Nama Perusahaan', 'trim|required|xss_clean');
    $this->form_validation->set_rules('setting_address', 'Alamat', 'trim|required|xss_clean');
    $this->form_validation->set_rules('setting_phone', 'Nomor Telephone', 'trim|required|xss_clean');
    $this->form_validation->set_rules('setting_fax', 'Nama Kecamatan', 'trim|required|xss_clean');
    $this->form_validation->set_rules('setting_email', 'Email', 'trim|required|xss_clean');
    $this->form_validation->set_rules('setting_linkedin', 'Linkedin', 'trim|required|xss_clean');
    $this->form_validation->set_rules('setting_fb', 'Facebook', 'trim|required|xss_clean');
    $this->form_validation->set_rules('setting_twitter', 'Twitter', 'trim|required|xss_clean');
    $this->form_validation->set_rules('setting_instagram', 'Instagram', 'trim|required|xss_clean');

    if ($_POST AND $this->form_validation->run() == TRUE) {

      $param['setting_pt'] = $this->input->post('setting_pt');
      $param['setting_address'] = $this->input->post('setting_address');
      $param['setting_phone'] = $this->input->post('setting_phone');
      $param['setting_fax'] = $this->input->post('setting_fax');
      $param['setting_email'] = $this->input->post('setting_email');
      $param['setting_linkedin'] = $this->input->post('setting_linkedin');
      $param['setting_fb'] = $this->input->post('setting_fb');
      $param['setting_twitter'] = $this->input->post('setting_twitter');
      $param['setting_instagram'] = $this->input->post('setting_instagram');

      $this->Setting_model->save($param);

      $this->session->set_flashdata('success', ' Sunting pengaturan berhasil');
      redirect('manage/setting');

    } else {
      $data['title'] = 'Pengaturan';
      $data['setting_pt'] = $this->Setting_model->get(array('id' => 1));
      $data['setting_address'] = $this->Setting_model->get(array('id' => 2));
      $data['setting_phone'] = $this->Setting_model->get(array('id' => 3));
      $data['setting_fax'] = $this->Setting_model->get(array('id' => 4));
      $data['setting_email'] = $this->Setting_model->get(array('id' => 5));
      $data['setting_linkedin'] = $this->Setting_model->get(array('id' => 6));
      $data['setting_fb'] = $this->Setting_model->get(array('id' => 7));
      $data['setting_twitter'] = $this->Setting_model->get(array('id' => 8));
      $data['setting_instagram'] = $this->Setting_model->get(array('id' => 9));

      $data['main'] = 'setting/setting_list';
      $this->load->view('manage/layout', $data);
    }
  }



}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */
