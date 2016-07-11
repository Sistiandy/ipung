<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Slide controllers class
 *
 * @package     SYSCMS
 * @subpackage  Controllers
 * @category    Controllers
 * @author      Sistiandy Syahbana nugraha <sistiandy.web.id>
 */
class Slide extends CI_Controller {

    public function __construct() {
        parent::__construct(TRUE);
        if ($this->session->userdata('logged') == NULL) {
            header("Location:" . site_url('admin/auth/login') . "?location=" . urlencode($_SERVER['REQUEST_URI']));
        }
        $this->load->model(array('Slide_model', 'Activity_log_model'));
        $this->load->helper('string');
    }

    // Slide view in list
    public function index($offset = NULL) {
        $this->load->library('pagination');
        $data['slide'] = $this->Slide_model->get(array('limit' => 10, 'offset' => $offset));
        $config['base_url'] = site_url('admin/slide/index');
        $config['total_rows'] = count($this->Slide_model->get(array('status' => TRUE)));
        $this->pagination->initialize($config);

        $data['title'] = 'Slide';
        $data['main'] = 'admin/slide/slide_list';
        $this->load->view('admin/layout', $data);
    }

    function detail($id = NULL) {
        if ($this->Slide_model->get(array('id' => $id)) == NULL) {
            redirect('admin/slide');
        }
        $data['slide'] = $this->Slide_model->get(array('id' => $id));
        $data['title'] = 'Detail Slide';
        $data['main'] = 'admin/slide/slide_view';
        $this->load->view('admin/layout', $data);
    }

    // Add Slide and Update
    public function add($id = NULL) {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('slide_title', 'Title', 'trim|required|xss_clean'); 
        $this->form_validation->set_rules('slide_url', 'Url', 'trim|required|prep_url|callback_url_checking');        
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>');
        $data['operation'] = is_null($id) ? 'Tambah' : 'Sunting';

        if ($_POST AND $this->form_validation->run() == TRUE) {
            if ($this->input->post('inputGambarCurrent')) {
                $params['slide_image'] = $this->input->post('inputGambarCurrent');
            } 

            if ($this->input->post('slide_id')) {
                $params['slide_id'] = $this->input->post('slide_id');
            } else {
                $params['slide_input_date'] = date('Y-m-d H:i:s');
            }

            $params['slide_last_update'] = date('Y-m-d H:i:s');
            $params['slide_title'] = $this->input->post('slide_title');            
            $params['slide_url'] = $this->input->post('slide_url');            
            $params['slide_description'] = $this->input->post('slide_description');            
            $params['slide_is_published'] = $this->input->post('slide_is_published');            
            $params['user_id'] = $this->session->userdata('user_id');            
            $status = $this->Slide_model->add($params);

            // activity log
            $this->Activity_log_model->add(
                array(
                    'log_date' => date('Y-m-d H:i:s'),
                    'user_id' => $this->session->userdata('user_id'),
                    'log_module' => 'Slide',
                    'log_action' => $data['operation'],
                    'log_info' => 'ID:'.$status.';Title:' . $params['slide_title']
                    )
                );

            $this->session->set_flashdata('success', $data['operation'] . ' Slide berhasil');
            redirect('admin/slide');
        } else {
            if ($this->input->post('slide_id')) {
                redirect('admin/slide/edit/' . $this->input->post('slide_id'));
            }

            // Edit mode
            if (!is_null($id)) {
                $data['slide'] = $this->Slide_model->get(array('id' => $id));
            }
            $data['title'] = $data['operation'] . ' Slide';
            $data['main'] = 'admin/slide/slide_add';
            $this->load->view('admin/layout', $data);
        }
    }

    // Delete Slide
    public function delete($id = NULL) {
        if ($_POST) {
            $this->Slide_model->delete($this->input->post('del_id'));
            // activity log
            $this->Activity_log_model->add(
                array(
                    'log_date' => date('Y-m-d H:i:s'),
                    'user_id' => $this->session->userdata('user_id'),
                    'log_module' => 'Slide',
                    'log_action' => 'Hapus',
                    'log_info' => 'ID:' . $this->input->post('del_id') . ';Title:' . $this->input->post('del_name')
                    )
                );
            $this->session->set_flashdata('success', 'Hapus Slide berhasil');
            redirect('admin/slide');
        } elseif (!$_POST) {
            $this->session->set_flashdata('delete', 'Delete');
            redirect('admin/slide/edit/' . $id);
        }
    }

    // Validating Url
    public function url_checking($str) {

        $pattern = "/^(http|https|ftp):\/\/([A-Z0-9][A-Z0-9_-]*(?:\.[A-Z0-9][A-Z0-9_-]*)+):?(\d+)?\/?/i";
        if (!preg_match($pattern, $str)) {
            $this->form_validation->set_message('url_checking', 'The url invalid');
            return FALSE;
        } else {
            return TRUE;
        }
    }

}

/* End of file slide.php */
/* Location: ./application/controllers/admin/slide.php */
