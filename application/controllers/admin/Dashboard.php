<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/** 
* Dashboard controllers class
 *
 * @package     SYSCMS
 * @subpackage  Controllers
 * @category    Controllers
 * @author      Sistiandy Syahbana nugraha <sistiandy.web.id>
 */

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logged') == NULL) {
            header("Location:" . site_url('admin/auth/login') . "?location=" . urlencode($_SERVER['REQUEST_URI']));
        }
    }

    // Dashboard View
    public function index()
    {
        $this->load->model('Slide_model');
        $this->load->model('Catalog_model');
        $this->load->model('Testimoni_model');
        $this->load->model('Posts_model');
        
        $data['slide'] = count($this->Slide_model->get());
        $data['catalog'] = count($this->Catalog_model->get());
        $data['testimoni'] = count($this->Testimoni_model->get());
        $data['posting'] = count($this->Posts_model->get());
        $data['title'] = 'Dashboard';
        $data['main'] = 'admin/dashboard/dashboard';
        $this->load->view('admin/layout', $data);
    }

}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */
