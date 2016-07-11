<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $res = array('message' => 'Nothing here');

        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($res));
    }

    public function get_catalog_category($id = NULL) {
        $this->load->model('Catalog_model');
        if ($id == NULL) {

            $category = $this->Catalog_model->get_category();
            foreach ($category as $key) {
                $res[] = array(
                    'category_id' => $key['category_id'],
                    'category_name' => $key['category_name'],
                );
            }
        } else {
            $categoryAct = $this->Catalog_model->get_catalog_category(array('catalog_id' => $id));
            $category = $this->Catalog_model->get_category();

            $res_CategoryAct = array();
            foreach ($categoryAct as $row) {
                $res_CategoryAct[] = $row['category_category_id'];
            }

            foreach ($category as $key) {
                $res[] = array(
                    'category_id' => $key['category_id'],
                    'category_name' => $key['category_name'],
                    'ticked' => (in_array($key['category_id'], $res_CategoryAct)) ? true : false
                );
            }
        }
        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($res));
    }

}

