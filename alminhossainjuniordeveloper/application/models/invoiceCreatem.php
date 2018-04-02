
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class invoiceCreatem extends CI_Model
{
//
//    public function itemsname()
//    {
//        $this->db->select('id,name','product_price');
//        $this->db->from('productentry');
//        $query = $this->db->get();
//        return $query->result();
//    }


    function retrieve_products(){
        $query = $this->db->get('products'); // Select the table products
        return $query->result_array(); // Return the results in a array.
    }
    public function validate_add_cart_item()
    {
        $id = $this->input->post('product_id');
        $cty = $this->input->post('quantity');

        $this->db->where('id', $id);
        $query = $this->db->get('products', 1);
        if ($query->num_rows > 0) {
            foreach ($query->result() as $row) {
                $data = array(
                    'id' => $id,
                    'qty' => $cty,
                    'price' => $row->price,
                    'name' => $row->name
                );

                $this->cart->insert($data);

                return TRUE;
            }

        } else {
            return FALSE;
        }
    }
}