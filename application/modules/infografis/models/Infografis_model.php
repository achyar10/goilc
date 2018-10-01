<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Infografis_model extends CI_Model {

	function __construct() {
        parent::__construct();
    }

    // Get From Databases
    function get($params = array()) {

        if (isset($params['id'])) {
            $this->db->where('infografis.infografis_id', $params['id']);
        }
        
        if (isset($params['user_id'])) {
            $this->db->where('user_user_id', $params['user_id']);
        }

        if (isset($params['search'])) {
            $this->db->where('infografis_name', $params['search']);
            $this->db->or_like('infografis_desc', $params['search']);
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
            $this->db->order_by('infografis_input_date', 'desc');
        }

        $this->db->select('infografis.infografis_id, infografis_name, infografis_desc, infografis_source, infografis_image,  infografis_input_date, infografis_last_update');
         $this->db->select('user_user_id, user_full_name');

        $this->db->join('users', 'users.user_id = infografis.user_user_id', 'left');

        $res = $this->db->get('infografis');

        if (isset($params['id'])) {
            return $res->row_array();
        } else {
            return $res->result_array();
        }
    }

    function add($data = array()) {

        if (isset($data['infografis_id'])) {
            $this->db->set('infografis_id', $data['infografis_id']);
        }

        if (isset($data['infografis_name'])) {
            $this->db->set('infografis_name', $data['infografis_name']);
        }

        if (isset($data['infografis_desc'])) {
            $this->db->set('infografis_desc', $data['infografis_desc']);
        }

        if (isset($data['infografis_source'])) {
            $this->db->set('infografis_source', $data['infografis_source']);
        }

        if (isset($data['infografis_image'])) {
            $this->db->set('infografis_image', $data['infografis_image']);
        }

        if (isset($data['user_user_id'])) {
            $this->db->set('user_user_id', $data['user_user_id']);
        }

        if (isset($data['infografis_input_date'])) {
            $this->db->set('infografis_input_date', $data['infografis_input_date']);
        }

        if (isset($data['infografis_last_update'])) {
            $this->db->set('infografis_last_update', $data['infografis_last_update']);
        }

        if (isset($data['infografis_id'])) {
            $this->db->where('infografis_id', $data['infografis_id']);
            $this->db->update('infografis');
            $id = $data['infografis_id'];
        } else {
            $this->db->insert('infografis');
            $id = $this->db->insert_id();
        }

        $status = $this->db->affected_rows();
        return ($status == 0) ? FALSE : $id;
    }

    function delete($id) {
        $this->db->where('infografis_id', $id);
        $this->db->delete('infografis');
    }
	

}

/* End of file Infografis_model.php */
/* Location: ./application/modules/infografis/models/Infografis_model.php */