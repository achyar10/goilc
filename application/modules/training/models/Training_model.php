<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Training_model extends CI_Model {

	// Get From Databases
    function get($params = array()) {

        if (isset($params['id'])) {
            $this->db->where('trainings.training_id', $params['id']);
        }
        
        if (isset($params['user_id'])) {
            $this->db->where('user_id', $params['user_id']);
        }

        if(isset($params['search']))
        {
            $this->db->like('training_name', $params['search']);
        }

        if (isset($params['category_id'])) {
            $this->db->where('category_id', $params['category_id']);
        }

        if (isset($params['status'])) {
            $this->db->where('training_status', $params['status']);
        }

        if (isset($params['service_id'])) {
            $this->db->where('service_id', $params['service_id']);
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
            $this->db->order_by('training_input_date', 'desc');
        }

        $this->db->select('*');

        $this->db->join('users', 'users.user_id = trainings.user_id','left');
        $this->db->join('categories', 'categories.category_id = trainings.category_id','left');
        $this->db->join('services', 'services.service_id = trainings.service_id','left');

        $res = $this->db->get('trainings');

        if (isset($params['id'])) {
            return $res->row_array();
        } else {
            return $res->result_array();
        }
    }

    function add($data = array()) {

        if (isset($data['training_id'])) {
            $this->db->set('training_id', $data['training_id']);
        }

        if (isset($data['training_name'])) {
            $this->db->set('training_name', $data['training_name']);
        }

        if (isset($data['training_place'])) {
            $this->db->set('training_place', $data['training_place']);
        }

        if (isset($data['training_date_start'])) {
            $this->db->set('training_date_start', $data['training_date_start']);
        }

        if (isset($data['training_date_end'])) {
            $this->db->set('training_date_end', $data['training_date_end']);
        }

        if (isset($data['training_time'])) {
            $this->db->set('training_time', $data['training_time']);
        }

        if (isset($data['training_price'])) {
            $this->db->set('training_price', $data['training_price']);
        }

        if (isset($data['training_brocure'])) {
            $this->db->set('training_brocure', $data['training_brocure']);
        }

        if (isset($data['training_cover_letter'])) {
            $this->db->set('training_cover_letter', $data['training_cover_letter']);
        }

        if (isset($data['training_silabus'])) {
            $this->db->set('training_silabus', $data['training_silabus']);
        }

        if (isset($data['training_status'])) {
            $this->db->set('training_status', $data['training_status']);
        }

        if (isset($data['category_id'])) {
            $this->db->set('category_id', $data['category_id']);
        }

        if (isset($data['service_id'])) {
            $this->db->set('service_id', $data['service_id']);
        }

        if (isset($data['user_id'])) {
            $this->db->set('user_id', $data['user_id']);
        }

        if (isset($data['training_input_date'])) {
            $this->db->set('training_input_date', $data['training_input_date']);
        }

        if (isset($data['training_last_update'])) {
            $this->db->set('training_last_update', $data['training_last_update']);
        }

        if (isset($data['training_id'])) {
            $this->db->where('training_id', $data['training_id']);
            $this->db->update('trainings');
            $id = $data['training_id'];
        } else {
            $this->db->insert('trainings');
            $id = $this->db->insert_id();
        }

        $status = $this->db->affected_rows();
        return ($status == 0) ? FALSE : $id;
    }

    function delete($id) {
        $this->db->where('training_id', $id);
        $this->db->delete('trainings');
    }
	

}

/* End of file Training_model.php */
/* Location: ./application/modules/training/models/Training_model.php */