<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Insertmodel extends CI_MOdel {

public function insert($data)
{

	$this->db->insert('catagory',$data);
	return $this->db->insert_id();
}
public function postinsert($data1)
{
	$this->db->insert('post',$data1);
}

public function insertuser($data)
{
	$this->db->insert('user',$data);
	return $this->db->insert_id();
}

}