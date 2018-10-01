<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Visualisation_model extends CI_Model {

	function __construct() {
        parent::__construct();
    }

    // Get From Databases
    function get($params = array()) {

        if (isset($params['id'])) {
            $this->db->where('visualisations.visualisation_id', $params['id']);
        }
        
        if (isset($params['user_id'])) {
            $this->db->where('user_user_id', $params['user_id']);
        }

        if (isset($params['search'])) {
            $this->db->where('visualisation_name', $params['search']);
            $this->db->or_like('visualisation_desc', $params['search']);
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
            $this->db->order_by('visualisation_last_update', 'desc');
        }

        $this->db->select('visualisations.visualisation_id, visualisation_name, visualisation_link, visualisation_desc, visualisation_dataset, visualisation_source, visualisation_image,  visualisation_input_date, visualisation_last_update');
         $this->db->select('user_user_id, user_full_name');

        $this->db->join('users', 'users.user_id = visualisations.user_user_id', 'left');

        $res = $this->db->get('visualisations');

        if (isset($params['id'])) {
            return $res->row_array();
        } else {
            return $res->result_array();
        }
    }

    function add($data = array()) {

        if (isset($data['visualisation_id'])) {
            $this->db->set('visualisation_id', $data['visualisation_id']);
        }

        if (isset($data['visualisation_name'])) {
            $this->db->set('visualisation_name', $data['visualisation_name']);
        }

        if (isset($data['visualisation_desc'])) {
            $this->db->set('visualisation_desc', $data['visualisation_desc']);
        }

        if (isset($data['visualisation_dataset'])) {
            $this->db->set('visualisation_dataset', $data['visualisation_dataset']);
        }

        if (isset($data['visualisation_source'])) {
            $this->db->set('visualisation_source', $data['visualisation_source']);
        }

        if (isset($data['visualisation_image'])) {
            $this->db->set('visualisation_image', $data['visualisation_image']);
        }

        if (isset($data['visualisation_link'])) {
            $this->db->set('visualisation_link', $data['visualisation_link']);
        }

        if (isset($data['user_user_id'])) {
            $this->db->set('user_user_id', $data['user_user_id']);
        }

        if (isset($data['visualisation_input_date'])) {
            $this->db->set('visualisation_input_date', $data['visualisation_input_date']);
        }

        if (isset($data['visualisation_last_update'])) {
            $this->db->set('visualisation_last_update', $data['visualisation_last_update']);
        }

        if (isset($data['visualisation_id'])) {
            $this->db->where('visualisation_id', $data['visualisation_id']);
            $this->db->update('visualisations');
            $id = $data['visualisation_id'];
        } else {
            $this->db->insert('visualisations');
            $id = $this->db->insert_id();
        }

        $status = $this->db->affected_rows();
        return ($status == 0) ? FALSE : $id;
    }

    function delete($id) {
        $this->db->where('visualisation_id', $id);
        $this->db->delete('visualisations');
    }

}

/* End of file Visualisation_model.php */
/* Location: ./application/modules/visualisation/models/Visualisation_model.php */