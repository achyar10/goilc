<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register_model extends CI_Model {

	function get($params = array()) {

        if (isset($params['id'])) {
            $this->db->where('registers.register_id', $params['id']);
        }

        if (isset($params['training_id'])) {
            $this->db->where('registers.training_id', $params['training_id']);
        }

        if (isset($params['status'])) {
            $this->db->where('registers.register_status', $params['status']);
        }

        if(isset($params['date_start']) AND isset($params['date_end'])) {
            $this->db->where('register_input_date >=', $params['date_start'] . ' 00:00:00');
            $this->db->where('register_input_date <=', $params['date_end'] . ' 23:59:59');
        }

        if(isset($params['group'])){
            $this->db->group_by('registers.register_id');
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
            $this->db->order_by('register_input_date', 'desc');
        }

        $this->db->select('registers.register_id, register_no, register_corporate, register_pic_name, register_pic_jab, register_pic_tlp, register_pic_fax, register_pic_email, register_pic_phone, register_pay_name, register_pay_jab, register_pay_tlp, register_pay_fax, register_pay_phone, register_add_inv, register_status, register_input_date, register_last_update');
        $this->db->select('member_name, member_jab, member_phone, member_email');
        $this->db->select('registers.training_id, training_name, training_place, training_date_start, training_date_end');

        $this->db->join('members', 'members.register_id = registers.register_id','left');
        $this->db->join('trainings', 'trainings.training_id = registers.training_id','left');

        $res = $this->db->get('registers');

        if (isset($params['id'])) {
            return $res->row_array();
        } else {
            return $res->result_array();
        }
    }
    function get_reg($params = array()) {

        if (isset($params['id'])) {
            $this->db->where('registers.register_id', $params['id']);
        }

        if (isset($params['status'])) {
            $this->db->where('registers.register_status', $params['status']);
        }

        if(isset($params['search']))
        {
            $this->db->where('register_no', $params['search']);
            $this->db->or_like('register_corporate', $params['search']);
        }

        if(isset($params['date_start']) AND isset($params['date_end'])) {
            $this->db->where('register_input_date >=', $params['date_start'] . ' 00:00:00');
            $this->db->where('register_input_date <=', $params['date_end'] . ' 23:59:59');
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
            $this->db->order_by('register_input_date', 'desc');
        }

        $this->db->select('registers.register_id, register_no, register_corporate, register_pic_name, register_pic_jab, register_pic_tlp, register_pic_fax, register_pic_email, register_pic_phone, register_pay_name, register_pay_jab, register_pay_tlp, register_pay_fax, register_pay_phone, register_add_inv, register_status, register_input_date, register_last_update');
        $this->db->select('registers.training_id, training_name, training_place, training_date_start, training_date_end');

        $this->db->join('trainings', 'trainings.training_id = registers.training_id','left');

        $res = $this->db->get('registers');

        if (isset($params['id'])) {
            return $res->row_array();
        } else {
            return $res->result_array();
        }
    }

    function add($data = array()) {

        if (isset($data['register_id'])) {
            $this->db->set('register_id', $data['register_id']);
        }

        if (isset($data['register_no'])) {
            $this->db->set('register_no', $data['register_no']);
        }

        if (isset($data['register_corporate'])) {
            $this->db->set('register_corporate', $data['register_corporate']);
        }

        if (isset($data['register_pic_name'])) {
            $this->db->set('register_pic_name', $data['register_pic_name']);
        }

        if (isset($data['register_pic_jab'])) {
            $this->db->set('register_pic_jab', $data['register_pic_jab']);
        }

        if (isset($data['register_pic_tlp'])) {
            $this->db->set('register_pic_tlp', $data['register_pic_tlp']);
        }

        if (isset($data['register_pic_fax'])) {
            $this->db->set('register_pic_fax', $data['register_pic_fax']);
        }

        if (isset($data['register_pic_phone'])) {
            $this->db->set('register_pic_phone', $data['register_pic_phone']);
        }

        if (isset($data['register_pic_email'])) {
            $this->db->set('register_pic_email', $data['register_pic_email']);
        }

        if (isset($data['register_pay_name'])) {
            $this->db->set('register_pay_name', $data['register_pay_name']);
        }

        if (isset($data['register_pay_jab'])) {
            $this->db->set('register_pay_jab', $data['register_pay_jab']);
        }

        if (isset($data['register_pay_tlp'])) {
            $this->db->set('register_pay_tlp', $data['register_pay_tlp']);
        }

        if (isset($data['register_pay_fax'])) {
            $this->db->set('register_pay_fax', $data['register_pay_fax']);
        }

        if (isset($data['register_pay_phone'])) {
            $this->db->set('register_pay_phone', $data['register_pay_phone']);
        }

        if (isset($data['register_add_inv'])) {
            $this->db->set('register_add_inv', $data['register_add_inv']);
        }

        if (isset($data['training_id'])) {
            $this->db->set('training_id', $data['training_id']);
        }

        if (isset($data['register_status'])) {
            $this->db->set('register_status', $data['register_status']);
        }

        if (isset($data['register_input_date'])) {
            $this->db->set('register_input_date', $data['register_input_date']);
        }

        if (isset($data['register_last_update'])) {
            $this->db->set('register_last_update', $data['register_last_update']);
        }

        if (isset($data['register_id'])) {
            $this->db->where('register_id', $data['register_id']);
            $this->db->update('registers');
            $id = $data['register_id'];
        } else {
            $this->db->insert('registers');
            $id = $this->db->insert_id();
        }

        $status = $this->db->affected_rows();
        return ($status == 0) ? FALSE : $id;
    }

    function get_member($params = array()) {

        if (isset($params['id'])) {
            $this->db->where('members.member_id', $params['id']);
        }

        if (isset($params['register_id'])) {
            $this->db->where('members.register_id', $params['register_id']);
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
            $this->db->order_by('member_id', 'desc');
        }

        $this->db->select('*');
        $this->db->join('registers', 'members.register_id = registers.register_id','left');

        $res = $this->db->get('members');

        if (isset($params['id'])) {
            return $res->row_array();
        } else {
            return $res->result_array();
        }
    }

    function add_member($data = array()) {

        if (isset($data['member_id'])) {
            $this->db->set('member_id', $data['member_id']);
        }

        if (isset($data['member_name'])) {
            $this->db->set('member_name', $data['member_name']);
        }

        if (isset($data['member_jab'])) {
            $this->db->set('member_jab', $data['member_jab']);
        }

        if (isset($data['member_phone'])) {
            $this->db->set('member_phone', $data['member_phone']);
        }

        if (isset($data['member_email'])) {
            $this->db->set('member_email', $data['member_email']);
        }

        if (isset($data['register_id'])) {
            $this->db->set('register_id', $data['register_id']);
        }

        if (isset($data['member_id'])) {
            $this->db->where('member_id', $data['member_id']);
            $this->db->update('members');
            $id = $data['member_id'];
        } else {
            $this->db->insert('members');
            $id = $this->db->insert_id();
        }

        $status = $this->db->affected_rows();
        return ($status == 0) ? FALSE : $id;
    }

    function delete($id) {
        $this->db->where('register_id', $id);
        $this->db->delete('registers');
    }


}

/* End of file Register_model.php */
/* Location: ./application/modules/register/models/Register_model.php */