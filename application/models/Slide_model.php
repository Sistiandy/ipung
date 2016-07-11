<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/** 
* Slide Model Class
 *
 * @package     SYSCMS
 * @subpackage  Models
 * @category    Models
 * @author      Sistiandy Syahbana nugraha <sistiandy.web.id>
 */

class Slide_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    // Get From Databases
    function get($params = array())
    {
        if(isset($params['id']))
        {
            $this->db->where('slide.slide_id', $params['id']);
        }

        if(isset($params['limit']))
        {
            if(!isset($params['offset']))
            {
                $params['offset'] = NULL;
            }

            $this->db->limit($params['limit'], $params['offset']);
        }

        if(isset($params['order_by']))
        {
            $this->db->order_by($params['order_by'], 'desc');
        }
        else
        {
            $this->db->order_by('slide_last_update', 'desc');
        }

        $this->db->select('slide.slide_id, slide_title, slide_url, slide_image, slide_description, slide_is_published,
            slide_input_date, slide_last_update');
        $this->db->select('user_user_id, user_full_name');
        
        $this->db->join('user', 'user.user_id = slide.user_user_id', 'left');
        $res = $this->db->get('slide');

        if(isset($params['id']))
        {
            return $res->row_array();
        }
        else
        {
            return $res->result_array();
        }
    }

    // Add and update to database
    function add($data = array()) {
        
         if(isset($data['slide_id'])) {
            $this->db->set('slide_id', $data['slide_id']);
        }
        
         if(isset($data['slide_title'])) {
            $this->db->set('slide_title', $data['slide_title']);
        }
        
         if(isset($data['slide_url'])) {
            $this->db->set('slide_url', $data['slide_url']);
        }
        
         if(isset($data['slide_image'])) {
            $this->db->set('slide_image', $data['slide_image']);
        }
        
         if(isset($data['slide_description'])) {
            $this->db->set('slide_description', $data['slide_description']);
        }
        
         if(isset($data['slide_is_published'])) {
            $this->db->set('slide_is_published', $data['slide_is_published']);
        }
        
         if(isset($data['slide_input_date'])) {
            $this->db->set('slide_input_date', $data['slide_input_date']);
        }
        
         if(isset($data['slide_last_update'])) {
            $this->db->set('slide_last_update', $data['slide_last_update']);
        }
        
         if(isset($data['user_id'])) {
            $this->db->set('user_user_id', $data['user_id']);
        }
        
        if (isset($data['slide_id'])) {
            $this->db->where('slide_id', $data['slide_id']);
            $this->db->update('slide');
            $id = $data['slide_id'];
        } else {
            $this->db->insert('slide');
            $id = $this->db->insert_id();
        }

        $status = $this->db->affected_rows();
        return ($status == 0) ? FALSE : $id;
    }
    
    // Delete to database
    function delete($id) {
        $this->db->where('slide_id', $id);
        $this->db->delete('slide');
    }
    
}
