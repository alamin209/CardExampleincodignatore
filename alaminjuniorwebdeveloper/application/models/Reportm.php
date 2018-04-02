<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Reportm extends CI_Model
{
    public function getlldailyReport()
    {

        $this->db->select('SUM(order_detail.price) as sums, sum(order_detail.quantity) as  quantites ,order_detail.id, orders.date  as date ');
        $this->db->join('orders', 'order_detail.orderid= orders.id', 'left');
        $this->db->from('order_detail');
        $this->db->group_by('orders.date');
        $query = $this->db->get();
        return $query->result();

    }

public function viewAllReportBydate($startdate, $enddate)
    {

        $this->db->select('SUM(order_detail.price) as sums, sum(order_detail.quantity) as  quantites ,order_detail.id, orders.date  as date ');
        $this->db->join('orders', 'order_detail.orderid= orders.id', 'left');
        $this->db->where(' orders.date  BETWEEN "'. date('Y-m-d', strtotime($startdate)). '" and "'. date('Y-m-d', strtotime($enddate)).'"');
        $this->db->from('order_detail');
        $this->db->group_by('orders.date');
        $query = $this->db->get();
        return $query->result();
    }

    public function getllmonthlyReport()
    {
        $this->db->select('MONTH(orders.date) as month, YEAR(orders.date) as year, SUM(order_detail.quantity) as qty,SUM(order_detail.price) as amount ,order_detail.*');
        $this->db->join('orders', 'order_detail.orderid= orders.id', 'left');
        $this->db->from('order_detail');
        $this->db->group_by('MONTH(orders.date), YEAR(orders.date)');
        $query = $this->db->get();
        return $query->result();

    }
    public  function viewAllReportByMonth( $startdate, $enddate)
    {
        $this->db->select('MONTH(orders.date) as month, YEAR(orders.date) as year, SUM(order_detail.quantity) as qty,SUM(order_detail.price) as amount ,order_detail.*');
        $this->db->join('orders', 'order_detail.orderid= orders.id', 'left');
        $this->db->where(' orders.date  BETWEEN "'. date('Y-m-d', strtotime($startdate)). '" and "'. date('Y-m-d', strtotime($enddate)).'"');
        $this->db->from('order_detail');
        $this->db->group_by('MONTH(orders.date), YEAR(orders.date)');
         $query = $this->db->get();
        return $query->result();
    }

}