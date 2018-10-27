<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting_model extends CI_Model {

	public function get($param = array()) {

		if (isset($param['id'])) {
			$this->db->where('setting_id', $param['id']);
		}


		if (isset($param['id'])) {
			return $this->db->get('settings')->row_array();
		} else {
			return $this->db->get('settings')->result_array();
		}
	}

	public function get_value($params = array()) {
		$setting = $this->get($params);

		if (!empty($setting['setting_value']))
			return $setting['setting_value'];
		else
			return '';
	}

	public function save($param = array()) {
		if (isset($param['setting_pt'])) {
			$this->db->set('setting_value', $param['setting_pt']);
			$this->db->where('setting_id', 1);
			$this->db->update('settings');
		}

		if (isset($param['setting_address'])) {
			$this->db->set('setting_value', $param['setting_address']);
			$this->db->where('setting_id', 2);
			$this->db->update('settings');
		}

		if (isset($param['setting_phone'])) {
			$this->db->set('setting_value', $param['setting_phone']);
			$this->db->where('setting_id', 3);
			$this->db->update('settings');
		}

		if (isset($param['setting_fax'])) {
			$this->db->set('setting_value', $param['setting_fax']);
			$this->db->where('setting_id', 4);
			$this->db->update('settings');
		}

		if (isset($param['setting_email'])) {
			$this->db->set('setting_value', $param['setting_email']);
			$this->db->where('setting_id', 5);
			$this->db->update('settings');
		}

		if (isset($param['setting_linkedin'])) {
			$this->db->set('setting_value', $param['setting_linkedin']);
			$this->db->where('setting_id', 6);
			$this->db->update('settings');
		}

		if (isset($param['setting_fb'])) {
			$this->db->set('setting_value', $param['setting_fb']);
			$this->db->where('setting_id', 7);
			$this->db->update('settings');
		}

		if (isset($param['setting_twitter'])) {
			$this->db->set('setting_value', $param['setting_twitter']);
			$this->db->where('setting_id', 8);
			$this->db->update('settings');
		}

		if (isset($param['setting_instagram'])) {
			$this->db->set('setting_value', $param['setting_instagram']);
			$this->db->where('setting_id', 9);
			$this->db->update('settings');
		}
		

	}


}

/* End of file Setting_model.php */
/* Location: ./application/modules/setting/models/Setting_model.php */