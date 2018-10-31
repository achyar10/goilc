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

		$f = $this->input->get(NULL, TRUE);
		$data['f'] = $f;
		$params = array();

		if (isset($f['ds']) && !empty($f['ds']) && $f['ds'] != '') {
			$params['date_start'] = $f['ds'];
		}

		if (isset($f['de']) && !empty($f['de']) && $f['de'] != '') {
			$params['date_end'] = $f['de'];
		}

		$data['register'] = $this->Register_model->get($params);

		// echo "<pre>";
		// print_r ($data['register']);
		// echo "</pre>";
		// die();

		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();          
		$cell     = 6;        
		$no       = 1;

		$sheet->setCellValue('A1', 'Laporan Pendaftaran Peserta');
		$sheet->setCellValue('A2', 'PT. Inovasi Lentera Cipta Kreasi');
		$sheet->setCellValue('A3', 'Tanggal Laporan: '.pretty_date($f['ds'],'d F Y',false).' s/d '.pretty_date($f['de'],'d F Y',false));
		$sheet->setCellValue('A4', 'Tanggal Unduh: '.pretty_date(date('Y-m-d h:i:s'),'d F Y, h:i',false));
		$sheet->setCellValue('C4', 'Pengunduh: '.$this->session->userdata('ufullname'));
		

		$sheet->setCellValue('A5', 'NO');
		$sheet->setCellValue('B5', 'NAMA PERUSAHAAN');
		$sheet->setCellValue('C5', 'PELATIHAN');
		$sheet->setCellValue('D5', 'NAMA PESERTA');
		$sheet->setCellValue('E5', 'JABATAN PESERTA');
		$sheet->setCellValue('F5', 'EMAIL PESERTA');
		$sheet->setCellValue('G5', 'NO. TELEPON PESERTA');
		$sheet->setCellValue('H5', 'TANGGAL DAFTAR');
		$sheet->setCellValue('I5', 'KETERANGAN');

		foreach ($data['register'] as $row) {
			$sheet->setCellValue('A'.$cell, $no);
			$sheet->setCellValue('B'.$cell, $row['register_corporate']);
			$sheet->setCellValue('C'.$cell, $row['training_name']);
			$sheet->setCellValue('D'.$cell, $row['member_name']);
			$sheet->setCellValue('E'.$cell, $row['member_jab']);
			$sheet->setCellValue('F'.$cell, $row['member_email']);
			$sheet->setCellValue('G'.$cell, $row['member_phone']);
			$sheet->setCellValue('H'.$cell, pretty_date($row['register_input_date'],'d-m-Y',false));
			$sheet->setCellValue('I'.$cell, ($row['register_status']==1) ? 'Disetujui' : (($row['register_status']==2) ? 'Ditolak' : 'Belum Proses') );
			$cell++;
			$no++; 
		}


		$spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(5);
		$spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(20);
		$spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(20);

		foreach(range('D', 'Z') as $alphabet)
		{
			$spreadsheet->getActiveSheet()->getColumnDimension($alphabet)->setWidth(20);
		}

		$spreadsheet->getActiveSheet()->getColumnDimension('N')->setWidth(20);

		$font = array('font' => array( 'bold' => true, 'color' => array(
			'rgb'  => 'FFFFFF')));
		$spreadsheet->getActiveSheet()
		->getStyle('A5:I5')
		->applyFromArray($font);

		$spreadsheet->getActiveSheet()
		->getStyle('A5:I5')
		->getFill()
		->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
		->getStartColor()
		->setARGB('000');
		$spreadsheet->getActiveSheet()->getStyle('A1')->getFont()->setBold( true );

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