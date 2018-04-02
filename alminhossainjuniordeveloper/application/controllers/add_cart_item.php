

<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Add_cart_item extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('insertm');
        $this->load->model('invoiceCreatem');


    }

    public function index()

    {
//        $this->data['itemsname'] = $this->invoiceCreatem->itemsname();
        $data['products'] = $this->invoiceCreatem->retrieve_products(); // Retrieve an array with all products

        $this->load->view('invoiceCreate.php',$data);
    }


}