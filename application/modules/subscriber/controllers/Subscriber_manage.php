<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subscriber_manage extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('logged') == NULL) {
			header("Location:" . site_url('manage/auth/login') . "?location=" . urlencode($_SERVER['REQUEST_URI']));
		}
		$this->load->model('subscriber/Subscriber_model');
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
		$data['subscriber'] = $this->Subscriber_model->get($params);

		$config['per_page'] = 5;
		$config['uri_segment'] = 4;
		$config['base_url'] = site_url('manage/subscriber/index');
		$config['suffix'] = '?' . http_build_query($_GET, '', "&");
		$config['total_rows'] = count($this->Subscriber_model->get($paramsPage));
		$this->pagination->initialize($config);

		$data['title'] = 'Subscribers';
		$data['main'] = 'subscriber/subscriber_list';
		$this->load->view('manage/layout', $data);
	}

	public function view($id = NULL) {
		$data['subscriber'] = $this->Subscriber_model->get(array('id' => $id));
		$data['title'] = 'Subscriber Detail';
		$data['main'] = 'subscriber/subscriber_view';
		$this->load->view('manage/layout', $data);
	}

	public function import() {
		if ($_POST) {
			$rows= explode("\n", $this->input->post('rows'));
			$success = 0;
			$failled = 0;
			$exist = 0;
			foreach($rows as $row) {
				$exp = explode("\t", $row);
				if (count($exp) != 1) continue;
				$arr = [
					'subscriber_email' => trim($exp[0]),
					'subscriber_input_date' => date('Y-m-d H:i:s'),
					'subscriber_last_update' => date('Y-m-d H:i:s')
				];
				$check = $this->db
				->where('subscriber_email', trim($exp[0]))
				->count_all_results('subscribers');
				if ($check == 0) {
					if ($this->db->insert('subscribers', $arr)) {
						$success++;
					} else {
						$failled++;
					}
				} else {
					$exist++;
				}
			}
			$msg = 'Sukses : ' . $success. ' baris, Gagal : '. $failled .', Duplikat : ' . $exist;
			$this->session->set_flashdata('success', $msg);
			redirect('manage/subscriber/import');
		} else {
			$data['title'] = 'Import Data Subscriber';
			$data['main'] = 'subscriber/subscriber_upload';
			$data['action'] = site_url(uri_string());
			$this->load->view('manage/layout', $data);
		}
	}

	public function download() {
		$data = file_get_contents("./media/template_excel/Template_Data_Subscriber.xlsx");
		$name = 'Template_Data_Subscriber.xlsx';
		$this->load->helper('download');
		force_download($name, $data);
	}

}

/* End of file Subscriber_manage.php */
/* Location: ./application/modules/subscriber/controllers/Subscriber_manage.php */