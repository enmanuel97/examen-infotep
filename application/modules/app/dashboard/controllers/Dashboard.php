<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class Dashboard extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->title    = "Dashboard";
        $this->securities->is_logged_in($this->session->userdata('is_logged_in'));
        $this->securities->is_superviser($this->session->userdata('typeId'));

        $this->load->model('turns/turns_model');
    }

    public function index()
    {
        $data['grafico'] = $this->get_data();
        $data['content'] = "dashboard/dashboard_view";
        $this->load->view('includes/template',$data);
    }

    public function get_data()
    {
        $result = array();
        $hora = "08";
        for($i = 0; $i < 11; $i++)
        {
            $date = date("Y-m-d");
            if($i==0)
            {
                $hour = $hora;
            }
            else if($i==1)
            {
                $hour = "09";
            }
            else
            {
                $hour = $hora+$i;
            }

            $date_entry = $date." ".$hour.":00:00";
            $date_entry2 = $date." ".$hour.":59:59";
            $response = $this->turns_model->get_stadistic_data($date_entry, $date_entry2);
            $result[$i] = $response;
        }

        return $result;
    }
}