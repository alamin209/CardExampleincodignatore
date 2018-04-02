<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("cartm");
        $this->load->model('Items');
       $this->load->model('billing_model');
    }

    public function index()
    {

        $data['product'] = $this->cartm->allproducts();
        $this->load->view('home', $data);
    }


    public function viewproduct()
    {

        $this->load->view('addProduct');
    }

    public function addcart()
    {

        $this->load->library("cart");


        $data = array(
            'id' => $_POST['product_id'],
            'name' => $_POST['product_name'],
            'qty' => $_POST['quantity'],
            'price' => $_POST['product_price']
        );
        $this->cart->insert($data);
//        echo $this->view();
        echo $this->view();
//        $this->load->view('cartView',$data);

    }

    public function addproducts()

    {
        $data=array(
            'product_name' => $this->input->post('productname'),
             'product_price'=>$this->input->post('productprice'),
            'product_description' =>$this->input->post('details')

        );
        $this->data['error'] = $this->Items->insertItem($data);

        if (empty($this->data['error'])) {

            $this->session->set_flashdata('successMessage','Product  Added Successfully');
            redirect('Home');

        } else {

            $this->session->set_flashdata('errorMessage','Some thing Went Wrong !! Please Try Again!!');
            redirect('Home');

        }


    }

    function view()
    {
        $this->load->library("cart");
        $output = '';
        $output .= '
  <h3>Shopping Cart</h3><br />
  <div class="table-responsive">
   <div align="right">
    <button type="button" id="clear_cart" class="btn btn-warning">Clear Cart</button>
   </div>
   <br />
   <table class="table table-bordered">
    <tr>
     <th >Name</th>
     <th >Quantity</th>
     <th >Price</th>
     <th >Total</th>
     <th>Action</th>
    </tr>

  ';
        $count = 0;
        foreach($this->cart->contents() as $items)
        {
            $count++;
            $output .= '
   <tr> 
    <td>'.$items["name"].'</td>
    <td>'.$items["qty"].'</td>
    <td>'.$items["price"].'</td>
    <td>'.$items["subtotal"].'</td>
    <td><button type="button" name="remove" class="btn btn-danger btn-xs remove_inventory" id="'.$items["rowid"].'">Remove</button></td>
   </tr>
   ';
        }
        $output .= '
   <tr>
    <td colspan="4" align="right">Total</td>
    <td>'.$this->cart->total().'</td>
    </tr>
    <tr>
        <td><button type="button" name="total" class="btn btn-warning btn-xs total" id="'.$this->cart->total().'">Save</button></td>

  
    
   </tr>
  </table>

  </div>
  ';

        if($count == 0)
        {
            $output = '<h3 align="center">Cart is Empty</h3>';
        }
        return $output;
    }

    public function viewCartDetails()
    {
        echo $this->view();

    }

    public function remove()
    {
        $this->load->library("cart");

        $id=$_POST['id'];
        $data=array(
            'rowid' =>$id,
            'qty' =>0
        );
        $this->cart->update($data);
       echo  $this->view();
    }

    public function clearalldata()
    {

        $this->cart->destroy();
        echo $this->view();
    }
    public function total()
    {


        $this->load->view("billing_view");

    }

    public  function save_order()
    {
        $order = array(
            'date' => date("Y-m-d H:i:s")
        );

        $ord_id = $this->billing_model->insert_order($order);
        if ($cart = $this->cart->contents()):
            foreach ($cart as $item):
                $order_detail = array(
                    'orderid' => $ord_id,
                    'productid' => $item['id'],
                    'quantity' => $item['qty'],
                    'price' => $item['price']
                );

         $this->billing_model->insert_order_detail($order_detail);
            endforeach;
        endif;

        $this->load->view('billing_success');
    }

}
