<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Billing_model extends CI_Model
{
    public function insert_order($data)
    {
        $this->db->insert('orders', $data);
        $id = $this->db->insert_id();
        return (isset($id)) ? $id : FALSE;
    }

// Insert ordered product detail in "order_detail" table in database.
    public function insert_order_detail($data)
    {
        $this->db->insert('order_detail', $data);
    }
}