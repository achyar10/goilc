<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mailbox_model extends CI_Model {

	function get($params = array()) {

        if (isset($params['id'])) {
            $this->db->where('mailbox.mailbox_id', $params['id']);
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
            $this->db->order_by('mailbox_input_date', 'desc');
        }

        $this->db->select('*');

        $res = $this->db->get('mailbox');

        if (isset($params['id'])) {
            return $res->row_array();
        } else {
            return $res->result_array();
        }
    }

    function add($data = array()) {

        if (isset($data['mailbox_id'])) {
            $this->db->set('mailbox_id', $data['mailbox_id']);
        }

        if (isset($data['mailbox_name'])) {
            $this->db->set('mailbox_name', $data['mailbox_name']);
        }

        if (isset($data['mailbox_email'])) {
            $this->db->set('mailbox_email', $data['mailbox_email']);
        }

        if (isset($data['mailbox_phone'])) {
            $this->db->set('mailbox_phone', $data['mailbox_phone']);
        }

        if (isset($data['mailbox_corporate'])) {
            $this->db->set('mailbox_corporate', $data['mailbox_corporate']);
        }

        if (isset($data['mailbox_subject'])) {
            $this->db->set('mailbox_subject', $data['mailbox_subject']);
        }

        if (isset($data['mailbox_desc'])) {
            $this->db->set('mailbox_desc', $data['mailbox_desc']);
        }

        if (isset($data['mailbox_input_date'])) {
            $this->db->set('mailbox_input_date', $data['mailbox_input_date']);
        }

        if (isset($data['mailbox_last_update'])) {
            $this->db->set('mailbox_last_update', $data['mailbox_last_update']);
        }

        if (isset($data['mailbox_id'])) {
            $this->db->where('mailbox_id', $data['mailbox_id']);
            $this->db->update('mailbox');
            $id = $data['mailbox_id'];
        } else {
            $this->db->insert('mailbox');
            $id = $this->db->insert_id();
        }

        $status = $this->db->affected_rows();
        return ($status == 0) ? FALSE : $id;
    }

    function delete($id) {
        $this->db->where('mailbox_id', $id);
        $this->db->delete('mailbox');
    }

}

/* End of file Mailbox_model.php */
/* Location: ./application/modules/mailbox/models/Mailbox_model.php */