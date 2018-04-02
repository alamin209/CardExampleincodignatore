
<!--$data['content'] = 'cart/products'; -->
<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('insertm');

    }

    public function index()
    {

    }


    public  function  products()
    {

    }

    function show_cart(){
        $this->load->view('cart/cart');
    }
}