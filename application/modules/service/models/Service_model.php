<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service_model extends CI_Model {

	// Get From Databases
    function get($params = array()) {

        if (isset($params['id'])) {
            $this->db->where('service.service_id', $params['id']);
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
            $this->db->order_by('service_id', 'desc');
        }

        $this->db->select('*');

        $res = $this->db->get('services');

        if (isset($params['id'])) {
            return $res->row_array();
        } else {
            return $res->result_array();
        }
    }

    function add($data = array()) {

        if (isset($data['service_id'])) {
            $this->db->set('service_id', $data['service_id']);
        }

        if (isset($data['service_name'])) {
            $this->db->set('service_name', $data['service_name']);
        }

        if (isset($data['service_id'])) {
            $this->db->where('service_id', $data['service_id']);
            $this->db->update('services');
            $id = $data['service_id'];
        } else {
            $this->db->insert('services');
            $id = $this->db->insert_id();
        }

        $status = $this->db->affected_rows();
        return ($status == 0) ? FALSE : $id;
    }

    function delete($id) {
        $this->db->where('service_id', $id);
        $this->db->delete('services');
    }

	

}

/* End of file service_model.php */
/* Location: ./application/modules/service/models/service_model.php */