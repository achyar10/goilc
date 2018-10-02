<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery_model extends CI_Model {

	function get($params = array()) {

        if (isset($params['id'])) {
            $this->db->where('gallery.gallery_id', $params['id']);
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
            $this->db->order_by('gallery_date', 'desc');
        }

        $this->db->select('*');

        $res = $this->db->get('gallery');

        if (isset($params['id'])) {
            return $res->row_array();
        } else {
            return $res->result_array();
        }
    }

    function add($data = array()) {

        if (isset($data['gallery_id'])) {
            $this->db->set('gallery_id', $data['gallery_id']);
        }

        if (isset($data['gallery_name'])) {
            $this->db->set('gallery_name', $data['gallery_name']);
        }

        if (isset($data['gallery_image'])) {
            $this->db->set('gallery_image', $data['gallery_image']);
        }

        if (isset($data['gallery_place'])) {
            $this->db->set('gallery_place', $data['gallery_place']);
        }

        if (isset($data['gallery_desc'])) {
            $this->db->set('gallery_desc', $data['gallery_desc']);
        }

        if (isset($data['gallery_date'])) {
            $this->db->set('gallery_date', $data['gallery_date']);
        }

        if (isset($data['gallery_id'])) {
            $this->db->where('gallery_id', $data['gallery_id']);
            $this->db->update('gallery');
            $id = $data['gallery_id'];
        } else {
            $this->db->insert('gallery');
            $id = $this->db->insert_id();
        }

        $status = $this->db->affected_rows();
        return ($status == 0) ? FALSE : $id;
    }

    function delete($id) {
        $this->db->where('gallery_id', $id);
        $this->db->delete('gallery');
    }
	

}

/* End of file Gallery_model.php */
/* Location: ./application/modules/gallery/models/Gallery_model.php */