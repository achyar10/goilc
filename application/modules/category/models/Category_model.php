<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends CI_Model {

	// Get From Databases
    function get($params = array()) {

        if (isset($params['id'])) {
            $this->db->where('categories.category_id', $params['id']);
        }
        
        if (isset($params['user_id'])) {
            $this->db->where('user_user_id', $params['user_id']);
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
            $this->db->order_by('category_id', 'desc');
        }

        $this->db->select('*');

        $res = $this->db->get('categories');

        if (isset($params['id'])) {
            return $res->row_array();
        } else {
            return $res->result_array();
        }
    }

    function add($data = array()) {

        if (isset($data['category_id'])) {
            $this->db->set('category_id', $data['category_id']);
        }

        if (isset($data['category_name'])) {
            $this->db->set('category_name', $data['category_name']);
        }

        if (isset($data['category_id'])) {
            $this->db->where('category_id', $data['category_id']);
            $this->db->update('categories');
            $id = $data['category_id'];
        } else {
            $this->db->insert('categories');
            $id = $this->db->insert_id();
        }

        $status = $this->db->affected_rows();
        return ($status == 0) ? FALSE : $id;
    }

    function delete($id) {
        $this->db->where('category_id', $id);
        $this->db->delete('categories');
    }

	

}

/* End of file Category_model.php */
/* Location: ./application/modules/category/models/Category_model.php */