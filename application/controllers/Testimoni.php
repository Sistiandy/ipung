<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/** 
* Base controllers class
 *
 * @package     SYSCMS
 * @subpackage  Controllers
 * @category    Controllers
 * @author      Sistiandy Syahbana nugraha <sistiandy.web.id>
 */

class Testimoni extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('Testimoni_model');
    }

    // Base View
    public function index($offset = NULL)
    {
        $this->load->library('pagination');
        $this->load->helper('text');
        
        $data['testimoni'] = $this->Testimoni_model->get(array('status' => TRUE, 'limit' => 12, 'offset' => $offset ));
        $config['base_url'] = site_url('testimoni/index');
        $config['per_page'] = 12;
        $config['total_rows'] = count($this->Testimoni_model->get(array('status' => TRUE)));
        $this->pagination->initialize($config);
        
        $data['title'] = 'Testimoni';
        $data['main'] = 'frontend/testimoni/list';
        $this->load->view('frontend/layout', $data);
    }

    // Detail View
    public function detail($id=NULL)
    {
        $this->load->helper('text');
        
        $data['testimoni'] = $this->Testimoni_model->get(array('id' => $id));
        $data['testimonis'] = $this->Testimoni_model->get(array('status' => TRUE, 'limit' => 6));
        $data['cat_has_category'] = $this->Testimoni_model->get_testimoni_has_category(array('testimoni_id' => $id));
        $data['cat_has_categories'] = $this->Testimoni_model->get_testimoni_has_category();
        $data['categories'] = $this->Testimoni_model->get_category(array('limit' => 7));
        
        $data['title'] = 'Testimonis';
        $data['main'] = 'frontend/testimoni/detail';
        $this->load->view('frontend/layout', $data);
    }

}

/* End of file testimoni.php */
/* Location: ./application/controllers/testimoni.php */
