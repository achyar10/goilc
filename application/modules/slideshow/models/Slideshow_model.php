<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slideshow_model extends CI_Model {

	function get($params = array()) {

		if (isset($params['id'])) {
			$this->db->where('slideshows.slideshow_id', $params['id']);
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
			$this->db->order_by('slideshow_input_date', 'desc');
		}

		$this->db->select('*');
		$this->db->join('users', 'users.user_id = slideshows.user_id','left');

		$res = $this->db->get('slideshows');

		if (isset($params['id'])) {
			return $res->row_array();
		} else {
			return $res->result_array();
		}
	}

	function add($data = array()) {

		if (isset($data['slideshow_id'])) {
			$this->db->set('slideshow_id', $data['slideshow_id']);
		}

		if (isset($data['slideshow_name'])) {
			$this->db->set('slideshow_name', $data['slideshow_name']);
		}

		if (isset($data['slideshow_image'])) {
			$this->db->set('slideshow_image', $data['slideshow_image']);
		}

		if (isset($data['slideshow_status'])) {
			$this->db->set('slideshow_status', $data['slideshow_status']);
		}

		if (isset($data['user_id'])) {
			$this->db->set('user_id', $data['user_id']);
		}

		if (isset($data['slideshow_input_date'])) {
			$this->db->set('slideshow_input_date', $data['slideshow_input_date']);
		}

		if (isset($data['slideshow_last_update'])) {
			$this->db->set('slideshow_last_update', $data['slideshow_last_update']);
		}

		if (isset($data['slideshow_id'])) {
			$this->db->where('slideshow_id', $data['slideshow_id']);
			$this->db->update('slideshows');
			$id = $data['slideshow_id'];
		} else {
			$this->db->insert('slideshows');
			$id = $this->db->insert_id();
		}

		$status = $this->db->affected_rows();
		return ($status == 0) ? FALSE : $id;
	}

	function delete($id) {
		$this->db->where('slideshow_id', $id);
		$this->db->delete('slideshows');
	}	

}

/* End of file Slideshow_model.php */
/* Location: ./application/modules/slideshow/models/Slideshow_model.php */