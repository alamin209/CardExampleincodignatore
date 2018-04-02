<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class insertm extends CI_Model
{



    public function insert($data)
    {
        $this->security->xss_clean($data);
        $error=$this->db->insert('productentry', $data);

        if (empty($error))
        {
            return $this->db->error();
        }
        else {

            return $error = null;
        }
    }

}