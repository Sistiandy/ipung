<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/** 
* Base controllers class
 *
 * @package     SYSCMS
 * @subpackage  Controllers
 * @category    Controllers
 * @author      Sistiandy Syahbana nugraha <sistiandy.web.id>
 */

class Base extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    // Base View
    public function index()
    {
        $this->load->helper('text');
        $this->load->model('Slide_model');
        $this->load->model('Testimoni_model');
        $this->load->model('Catalog_model');
        
        $data['slide'] = $this->Slide_model->get(array('status' => TRUE, 'limit' => 3));
        $data['testimoni'] = $this->Testimoni_model->get(array('status' => TRUE, 'limit' => 4));
        $data['catalog'] = $this->Catalog_model->get(array('status' => TRUE, 'limit' => 30));
        $data['cat_has_category'] = $this->Catalog_model->get_catalog_has_category();
        $data['categories'] = $this->Catalog_model->get_category(array('limit' => 5));
        $data['title'] = 'Ipung Cosmetics';
        $data['main'] = 'frontend/base';
        $this->load->view('frontend/layout', $data);
    }

}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */
