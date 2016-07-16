<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/** 
* Testimoni Model Class
 *
 * @package     SYSCMS
 * @subpackage  Models
 * @category    Models
 * @author      Sistiandy Syahbana nugraha <sistiandy.web.id>
 */

class Testimoni_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    // Get From Databases
    function get($params = array())
    {
        if(isset($params['id']))
        {
            $this->db->where('testimoni.testimoni_id', $params['id']);
        }
        
        if(isset($params['date_start']) AND isset($params['date_end']))
        {
            $this->db->where('testimoni_input_date', $params['date_start']);
            $this->db->or_where('testimoni_input_date', $params['date_end']);
        }

        if(isset($params['status']))
        {
            $this->db->where('testimoni_is_published', $params['status']);
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
            $this->db->order_by('testimoni_last_update', 'desc');
        }

        $this->db->select('testimoni.testimoni_id, testimoni_user_name, testimoni_user_job,
            testimoni_user_email, testimoni_user_address, testimoni_user_image,
            testimoni_user_comment, testimoni_is_published, testimoni_input_date,
            testimoni_last_update');
        $res = $this->db->get('testimoni');

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
        
         if(isset($data['testimoni_id'])) {
            $this->db->set('testimoni_id', $data['testimoni_id']);
        }
        
         if(isset($data['testimoni_user_name'])) {
            $this->db->set('testimoni_user_name', $data['testimoni_user_name']);
        }
        
         if(isset($data['testimoni_user_job'])) {
            $this->db->set('testimoni_user_job', $data['testimoni_job']);
        }
        
         if(isset($data['testimoni_user_email'])) {
            $this->db->set('testimoni_user_email', $data['testimoni_user_email']);
        }
        
         if(isset($data['testimoni_user_address'])) {
            $this->db->set('testimoni_user_address', $data['testimoni_user_address']);
        }
        
         if(isset($data['testimoni_user_image'])) {
            $this->db->set('testimoni_user_image', $data['testimoni_user_image']);
        }
        
         if(isset($data['testimoni_user_comment'])) {
            $this->db->set('testimoni_user_comment', $data['testimoni_user_comment']);
        }
        
         if(isset($data['testimoni_input_date'])) {
            $this->db->set('testimoni_input_date', $data['testimoni_input_date']);
        }
        
         if(isset($data['testimoni_last_update'])) {
            $this->db->set('testimoni_last_update', $data['testimoni_last_update']);
        }
        
         if(isset($data['testimoni_is_published'])) {
            $this->db->set('testimoni_is_published', $data['testimoni_is_published']);
        }
        
        if (isset($data['testimoni_id'])) {
            $this->db->where('testimoni_id', $data['testimoni_id']);
            $this->db->update('testimoni');
            $id = $data['testimoni_id'];
        } else {
            $this->db->insert('testimoni');
            $id = $this->db->insert_id();
        }

        $status = $this->db->affected_rows();
        return ($status == 0) ? FALSE : $id;
    }
    
    // Delete to database
    function delete($id) {
        $this->db->where('testimoni_id', $id);
        $this->db->delete('testimoni');
    }
}
