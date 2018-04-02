<?php defined('BASEPATH') OR exit('No direct script access allowed');

class InsertItem extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('insertm');

    }

    public function index()
    {

    }


    public function insertIitems()
    {

        $name = $this->input->post('productname');
        $product_price = $this->input->post('productprice');
        $product_des = $this->input->post('product_des');

        $data = array(

            'name' => $name,
            'product_price' => $product_price,
            'product_des' => $product_des
        );
        $this->insertm->insert($data);
        $this->session->set_userdata($data);


    }











}
