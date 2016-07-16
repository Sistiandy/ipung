<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Testimoni controllers class
 *
 * @package     SYSCMS
 * @subpackage  Controllers
 * @category    Controllers
 * @author      Sistiandy Syahbana nugraha <sistiandy.web.id>
 */
class Testimoni extends CI_Controller {

    public function __construct() {
        parent::__construct(TRUE);
        if ($this->session->userdata('logged') == NULL) {
            header("Location:" . site_url('admin/auth/login') . "?location=" . urlencode($_SERVER['REQUEST_URI']));
        }
        $this->load->model(array('Testimoni_model', 'Activity_log_model'));
        $this->load->library('upload');
    }

    // Testimoni view in list
    public function index($offset = NULL) {
        $this->load->library('pagination');
        $data['testimoni'] = $this->Testimoni_model->get(array('limit' => 10, 'offset' => $offset, 'status' => TRUE));
        $config['base_url'] = site_url('admin/testimoni/index');
        $config['total_rows'] = count($this->Testimoni_model->get(array('status' => TRUE)));
        $this->pagination->initialize($config);

        $data['title'] = 'Testimoni';
        $data['main'] = 'admin/testimoni/testimoni_list';
        $this->load->view('admin/layout', $data);
    }

    function detail($id = NULL) {
        if ($this->Testimoni_model->get(array('id' => $id)) == NULL) {
            redirect('admin/testimoni');
        }
        $data['testimoni'] = $this->Testimoni_model->get(array('id' => $id));
        $data['title'] = 'Detail Testimoni';
        $data['main'] = 'admin/testimoni/testimoni_view';
        $this->load->view('admin/layout', $data);
    }
    
    // Add Testimoni and Update
    public function add($id = NULL) {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('testimoni_user_name', 'Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('testimoni_user_job', 'Job', 'trim|required|xss_clean');
        $this->form_validation->set_rules('testimoni_user_email', 'Email', 'trim|required|xss_clean');
        $this->form_validation->set_rules('testimoni_user_address', 'Address', 'trim|required|xss_clean');
        $this->form_validation->set_rules('testimoni_user_comment', 'Comment', 'trim|required|xss_clean');
        $this->form_validation->set_rules('testimoni_is_published', 'Publish Status', 'trim|required|xss_clean');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>');
        $data['operation'] = is_null($id) ? 'Tambah' : 'Sunting';

        if ($_POST AND $this->form_validation->run() == TRUE) {
            if ($this->input->post('inputGambarCurrent')) {
                $params['testimoni_image'] = $this->input->post('inputGambarCurrent');
            } 

            if ($this->input->post('testimoni_id')) {
                $params['testimoni_id'] = $this->input->post('testimoni_id');
            } else {
                $params['testimoni_input_date'] = date('Y-m-d H:i:s');
            }

            $params['testimoni_last_update'] = date('Y-m-d H:i:s');
            $params['testimoni_user_name'] = $this->input->post('testimoni_title');
            $params['testimoni_user_job'] = $this->input->post('testimoni_job');
            $params['testimoni_user_email'] = $this->input->post('testimoni_email');
            $params['testimoni_user_address'] = $this->input->post('testimoni_user_address');
            $params['testimoni_user_comment'] = $this->input->post('testimoni_user_comment');
            $params['testimoni_is_published'] = $this->input->post('testimoni_is_published');
            $status = $this->Testimoni_model->add($params);


            // activity log
            $this->Activity_log_model->add(
                    array(
                        'log_date' => date('Y-m-d H:i:s'),
                        'user_id' => $this->session->userdata('user_id'),
                        'log_module' => 'Testimoni',
                        'log_action' => $data['operation'],
                        'log_info' => 'ID:null;Title:' . $params['testimoni_title']
                    )
            );

            $this->session->set_flashdata('success', $data['operation'] . ' Testimoni berhasil');
            redirect('admin/testimoni');
        } else {
            if ($this->input->post('testimoni_id')) {
                redirect('admin/testimoni/edit/' . $this->input->post('testimoni_id'));
            }

            // Edit mode
            if (!is_null($id)) {
                $data['testimoni'] = $this->Testimoni_model->get(array('id' => $id));
            }
            $data['title'] = $data['operation'] . ' Testimoni';
            $data['main'] = 'admin/testimoni/testimoni_add';
            $this->load->view('admin/layout', $data);
        }
    }

    // Delete Testimoni
    public function delete($id = NULL) {
        if ($_POST) {
            $this->Testimoni_model->delete($this->input->post('del_id'));
            // activity log
            $this->Activity_log_model->add(
                    array(
                        'log_date' => date('Y-m-d H:i:s'),
                        'user_id' => $this->session->userdata('user_id'),
                        'log_module' => 'Testimoni',
                        'log_action' => 'Hapus',
                        'log_info' => 'ID:' . $this->input->post('del_id') . ';Title:' . $this->input->post('del_name')
                    )
            );
            $this->session->set_flashdata('success', 'Hapus Testimoni berhasil');
            redirect('admin/testimoni');
        } elseif (!$_POST) {
            $this->session->set_flashdata('delete', 'Delete');
            redirect('admin/testimoni/edit/' . $id);
        }
    }
    
}

/* End of file testimoni.php */
/* Location: ./application/controllers/admin/testimoni.php */
