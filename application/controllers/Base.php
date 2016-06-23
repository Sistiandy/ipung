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
        $data['title'] = 'Ipung Cosmetics';
        $data['main'] = 'frontend/base';
        $this->load->view('frontend/layout', $data);
    }

}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */
