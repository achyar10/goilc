<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subscriber_model extends CI_Model {
 
	function get($params = array()) {

        if (isset($params['id'])) {
            $this->db->where('subscribers.subscriber_id', $params['id']);
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
            $this->db->order_by('subscriber_input_date', 'desc');
        }

        $this->db->select('*');

        $res = $this->db->get('subscribers');

        if (isset($params['id'])) {
            return $res->row_array();
        } else {
            return $res->result_array();
        }
    }

    function add($data = array()) {

        if (isset($data['subscriber_id'])) {
            $this->db->set('subscriber_id', $data['subscriber_id']);
        }

        if (isset($data['subscriber_email'])) {
            $this->db->set('subscriber_email', $data['subscriber_email']);
        }

        if (isset($data['subscriber_input_date'])) {
            $this->db->set('subscriber_input_date', $data['subscriber_input_date']);
        }

        if (isset($data['subscriber_last_update'])) {
            $this->db->set('subscriber_last_update', $data['subscriber_last_update']);
        }

        if (isset($data['subscriber_id'])) {
            $this->db->where('subscriber_id', $data['subscriber_id']);
            $this->db->update('subscribers');
            $id = $data['subscriber_id'];
        } else {
            $this->db->insert('subscribers');
            $id = $this->db->insert_id();
        }

        $status = $this->db->affected_rows();
        return ($status == 0) ? FALSE : $id;
    }

    function delete($id) {
        $this->db->where('subscriber_id', $id);
        $this->db->delete('subscribers');
    }

}

/* End of file subscriber_model.php */
/* Location: ./application/modules/subscriber/models/Subscriber_model.php */