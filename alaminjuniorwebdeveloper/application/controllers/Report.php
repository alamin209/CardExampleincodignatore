<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("cartm");
        $this->load->model('Items');
        $this->load->model('billing_model');
        $this->load->model('Reportm');

    }


    public function index()
    {
        $data['orders'] = $this->Reportm->getlldailyReport();
        $this->load->view('daily_Report', $data);
    }

    public  function search()
    {
        $startdate=$this->input->post('startdate');
        $enddate=$this->input->post('enddate');
        $data['allreport']= $this->Reportm->viewAllReportBydate($startdate, $enddate);
        $this->load->view('ReportByDateSearch.php', $data);

    }



    public function monthly()
    {
        $data['ordersss'] = $this->Reportm->getllmonthlyReport();
        $this->load->view('ReportByMonth', $data);
    }
    public  function monthlySearch()
    {
        $startdate=$this->input->post('startdate');
        $enddate=$this->input->post('enddate');

        $data['montltAllreport']= $this->Reportm->viewAllReportByMonth($startdate, $enddate);
        $this->load->view('ReportByMonthSearch', $data);

    }
}
