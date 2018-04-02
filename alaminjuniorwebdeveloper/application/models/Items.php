<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class items extends CI_Model
{

   public function insertItem($data)
   {
       $this->security->xss_clean($data);
       $error = $this->db->insert('products', $data);

       if (empty($error)) {
           return $this->db->error();
       } else {

           return $error = null;
       }

   }
}