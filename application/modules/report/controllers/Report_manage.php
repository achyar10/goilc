<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Report_manage extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('logged') == NULL) {
			header("Location:" . site_url('manage/auth/login') . "?location=" . urlencode($_SERVER['REQUEST_URI']));
		}
		$this->load->model(array('register/Register_model'));
	}

	public function index() {

	}

	function reportRegister($offset = NULL) {
		$this->load->library('pagination');
		$f = $this->input->get(NULL, TRUE);

		$data['f'] = $f;

		$params = array();

		if (isset($f['ds']) && !empty($f['ds']) && $f['ds'] != '') {
			$params['date_start'] = $f['ds'];
		}

		if (isset($f['ds']) && !empty($f['ds']) && $f['ds'] != '') {
			$params['date_end'] = $f['ds'];
		}

		$paramsPage = $params;
		$data['register'] = $this->Register_model->get($params);

		$config['base_url'] = site_url('manage/report/reportRegister/index');
		$config['suffix'] = '?' . http_build_query($_GET, '', "&");
		$this->pagination->initialize($config);

		$data['title'] = 'Laporan Pendaftaran';
		$data['main'] = 'report/report_register';
		$this->load->view('manage/layout', $data);
	}

	function reg_export() {
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'Hello World !');

		$writer = new Xlsx($spreadsheet);



		$filename = 'Laporan_'.date('Ymdhis');
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
		header('Cache-Control: max-age=0');

		$writer->save('php://output');
	}

}

/* End of file Report_manage.php */
/* Location: ./application/modules/report/controllers/Report_manage.php */