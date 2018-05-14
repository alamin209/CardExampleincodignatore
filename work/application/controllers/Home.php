<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

public function index()
{

	$this->load->view("insertproduct");
}
public function insert()
{ 

	$data=array(
  'name'=>$this->input->post('name'),
  'date'=>date('Y-m-d H:i:s',strtotime($this->input->post('date')))

	);
//print_r($data);
$this->load->model('insertmodel');
$this->insertmodel->insert($data);

$ad_id = $this->insertmodel->insert($data);
	$data1=array(
  'postTitle'=>$this->input->post('postt'),
    'postDetails'=>$this->input->post('postd'),
  'postDate'=>date('Y-m-d H:i:s', strtotime($this->input->post('postdate'))),
    'catagoryId'=>$ad_id);
//print_r($data1);
	
	$data=$this->insertmodel->postinsert($data1);
    //$data['bal']='data insert successfully';
	$this->load->view("insertproduct",$data);

}
public function  adduser()
{
	$this->load->view('login');
}


public function insertuser()

{
	
$data = array(
'name'=>$this->input->post('name'),
'username'=>$this->input->post('username'),
'password'=>$this->input->post('pass')

);

$this->load->model('insertmodel');

$data=$this->insertmodel->insertuser($data);

$this->load->view("good",$data);
// {
// redirect('home/index','refresh');
// }
// else
// {
// 	echo "no way ";
// }

}

}