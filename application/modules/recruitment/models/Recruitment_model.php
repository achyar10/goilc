<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recruitment_model extends CI_Model {

	function get($params = array()) {

		if (isset($params['id'])) {
			$this->db->where('recruitments.recruitment_id', $params['id']);
		}

		if (isset($params['publish'])) {
			$this->db->where('recruitments.recruitment_status', $params['publish']);
		}

		if (isset($params['limit'])) {
			if (!isset($params['offset'])) {
				$params['offset'] = NULL;
			}

			$this->db->limit($params['limit'], $params['offset']);
		}

		if (isset($params['order_by'])) {
			$this->db->order_by($params['order_by'], 'desc');
		} else {
			$this->db->order_by('recruitment_input_date', 'desc');
		}

		$this->db->select('*');
		$this->db->join('users', 'users.user_id = recruitments.user_id','left');

		$res = $this->db->get('recruitments');

		if (isset($params['id'])) {
			return $res->row_array();
		} else {
			return $res->result_array();
		}
	}

	function add($data = array()) {

		if (isset($data['recruitment_id'])) {
			$this->db->set('recruitment_id', $data['recruitment_id']);
		}

		if (isset($data['recruitment_title'])) {
			$this->db->set('recruitment_title', $data['recruitment_title']);
		}

		if (isset($data['recruitment_letter'])) {
			$this->db->set('recruitment_letter', $data['recruitment_letter']);
		}

		if (isset($data['recruitment_status'])) {
			$this->db->set('recruitment_status', $data['recruitment_status']);
		}

		if (isset($data['user_id'])) {
			$this->db->set('user_id', $data['user_id']);
		}

		if (isset($data['recruitment_input_date'])) {
			$this->db->set('recruitment_input_date', $data['recruitment_input_date']);
		}

		if (isset($data['recruitment_last_update'])) {
			$this->db->set('recruitment_last_update', $data['recruitment_last_update']);
		}

		if (isset($data['recruitment_id'])) {
			$this->db->where('recruitment_id', $data['recruitment_id']);
			$this->db->update('recruitments');
			$id = $data['recruitment_id'];
		} else {
			$this->db->insert('recruitments');
			$id = $this->db->insert_id();
		}

		$status = $this->db->affected_rows();
		return ($status == 0) ? FALSE : $id;
	}

	function delete($id) {
		$this->db->where('recruitment_id', $id);
		$this->db->delete('recruitments');
	}	

}

/* End of file Recruitment_model.php */
/* Location: ./application/modules/recruitment/models/Recruitment_model.php */