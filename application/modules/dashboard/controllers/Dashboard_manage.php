<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_manage extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    if ($this->session->userdata('logged') == NULL) {
        header("Location:" . site_url('manage/auth/login') . "?location=" . urlencode($_SERVER['REQUEST_URI']));
    }
    $this->load->model(array('users/Users_model', 'subscriber/Subscriber_model', 'training/Training_model', 'register/Register_model'));
}

public function index() {
    $id = $this->session->userdata('uid'); 
    $data['user'] = count($this->Users_model->get());
    $data['subscriber'] = count($this->Subscriber_model->get());
    $data['training'] = count($this->Training_model->get());
    $data['register'] = count($this->Register_model->get_reg());
    
    $data['title'] = 'Dashboard';
    $data['main'] = 'dashboard/dashboard';
    $this->load->view('manage/layout', $data);
}

}
