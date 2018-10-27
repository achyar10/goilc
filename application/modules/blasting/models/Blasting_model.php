<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blasting_model extends CI_Model {

	function get($params = array()) {

		if (isset($params['id'])) {
			$this->db->where('blastings.blasting_id', $params['id']);
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
			$this->db->order_by('blasting_input_date', 'desc');
		}

		$this->db->select('*');
		$this->db->join('users', 'users.user_id = blastings.user_id','left');

		$res = $this->db->get('blastings');

		if (isset($params['id'])) {
			return $res->row_array();
		} else {
			return $res->result_array();
		}
	}

	function add($data = array()) {

		if (isset($data['blasting_id'])) {
			$this->db->set('blasting_id', $data['blasting_id']);
		}

		if (isset($data['blasting_title'])) {
			$this->db->set('blasting_title', $data['blasting_title']);
		}

		if (isset($data['blasting_letter'])) {
			$this->db->set('blasting_letter', $data['blasting_letter']);
		}

		if (isset($data['blasting_status'])) {
			$this->db->set('blasting_status', $data['blasting_status']);
		}

		if (isset($data['user_id'])) {
			$this->db->set('user_id', $data['user_id']);
		}

		if (isset($data['blasting_input_date'])) {
			$this->db->set('blasting_input_date', $data['blasting_input_date']);
		}

		if (isset($data['blasting_last_update'])) {
			$this->db->set('blasting_last_update', $data['blasting_last_update']);
		}

		if (isset($data['blasting_id'])) {
			$this->db->where('blasting_id', $data['blasting_id']);
			$this->db->update('blastings');
			$id = $data['blasting_id'];
		} else {
			$this->db->insert('blastings');
			$id = $this->db->insert_id();
		}

		$status = $this->db->affected_rows();
		return ($status == 0) ? FALSE : $id;
	}

	function delete($id) {
		$this->db->where('blasting_id', $id);
		$this->db->delete('blastings');
	}

}

/* End of file Blasting_model.php */
/* Location: ./application/modules/blasting/models/Blasting_model.php */