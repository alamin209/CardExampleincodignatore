

<?php defined('BASEPATH') OR exit('No direct script access allowed');

class InvoiceCreat extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('insertm');
        $this->load->model('invoiceCreatem');


    }

    public function index()

    {
        $data['products'] = $this->invoiceCreatem->retrieve_products(); // Retrieve an array with all products

        $this->load->view('invoiceCreate', $data);
    }




   public    function add_cart_item(){

        if($this->invoiceCreatem->validate_add_cart_item() == TRUE){
            if($this->input->post('ajax') != '1'){
                redirect('InvoiceCreat\index');
            }else{
                echo 'true';
            }
        }

    }


}