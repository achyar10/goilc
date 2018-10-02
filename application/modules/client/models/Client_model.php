<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class client_model extends CI_Model {

	function get($params = array()) {

        if (isset($params['id'])) {
            $this->db->where('clients.client_id', $params['id']);
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
            $this->db->order_by('client_id', 'desc');
        }

        $this->db->select('*');

        $res = $this->db->get('clients');

        if (isset($params['id'])) {
            return $res->row_array();
        } else {
            return $res->result_array();
        }
    }

    function add($data = array()) {

        if (isset($data['client_id'])) {
            $this->db->set('client_id', $data['client_id']);
        }

        if (isset($data['client_name'])) {
            $this->db->set('client_name', $data['client_name']);
        }

        if (isset($data['client_image'])) {
            $this->db->set('client_image', $data['client_image']);
        }

        if (isset($data['client_id'])) {
            $this->db->where('client_id', $data['client_id']);
            $this->db->update('clients');
            $id = $data['client_id'];
        } else {
            $this->db->insert('clients');
            $id = $this->db->insert_id();
        }

        $status = $this->db->affected_rows();
        return ($status == 0) ? FALSE : $id;
    }

    function delete($id) {
        $this->db->where('client_id', $id);
        $this->db->delete('clients');
    }
	

}

/* End of file client_model.php */
/* Location: ./application/modules/client/models/client_model.php */