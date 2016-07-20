<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/** 
* Base controllers class
 *
 * @package     SYSCMS
 * @subpackage  Controllers
 * @category    Controllers
 * @author      Sistiandy Syahbana nugraha <sistiandy.web.id>
 */

class Catalog extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('Catalog_model');
    }

    // Base View
    public function index($offset = NULL)
    {
        $this->load->library('pagination');
        $this->load->helper('text');
        
        $data['catalog'] = $this->Catalog_model->get(array('status' => TRUE, 'limit' => 20, 'offset' => $offset ));
        $data['cat_has_category'] = $this->Catalog_model->get_catalog_has_category();
        $data['categories'] = $this->Catalog_model->get_category(array('limit' => 5));
        $config['base_url'] = site_url('catalog/index');
        $config['per_page'] = 20;
        $config['total_rows'] = count($this->Catalog_model->get(array('status' => TRUE)));
        $this->pagination->initialize($config);
        
        $data['title'] = 'Catalogs';
        $data['main'] = 'frontend/catalog/list';
        $this->load->view('frontend/layout', $data);
    }

    // Detail View
    public function detail($id=NULL)
    {
        $this->load->helper('text');
        
        $data['catalog'] = $this->Catalog_model->get(array('id' => $id));
        $data['catalogs'] = $this->Catalog_model->get(array('status' => TRUE, 'limit' => 6));
        $data['cat_has_category'] = $this->Catalog_model->get_catalog_has_category(array('catalog_id' => $id));
        $data['cat_has_categories'] = $this->Catalog_model->get_catalog_has_category();
        $data['categories'] = $this->Catalog_model->get_category(array('limit' => 7));
        
        $data['title'] = 'Catalogs';
        $data['main'] = 'frontend/catalog/detail';
        $this->load->view('frontend/layout', $data);
    }

    // List Category
    public function category($id=NULL, $offset = NULL)
    {
        $this->load->library('pagination');
        $this->load->helper('text');
        
        $data['catalog'] = $this->Catalog_model->get_catalog_has_category(array('category_id' => $id));
        $data['cat_has_category'] = $this->Catalog_model->get_catalog_has_category();
        $data['categories'] = $this->Catalog_model->get_category(array('limit' => 5));
        $config['base_url'] = site_url('catalog/category/'.$id);
        $config['per_page'] = 20;
        $config['total_rows'] = count($this->Catalog_model->get_catalog_has_category(array('category_id' => $id)));
        $this->pagination->initialize($config);
        
        $data['title'] = 'Catalogs';
        $data['main'] = 'frontend/catalog/category_list';
        $this->load->view('frontend/layout', $data);
    }

}

/* End of file catalog.php */
/* Location: ./application/controllers/catalog.php */
