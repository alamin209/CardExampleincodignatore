<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class cartm extends CI_Model
{


    public  function allproducts()
    {
        $this->db->from('products');
        $query=$this->db->get();
        return $query->result();

    }


}