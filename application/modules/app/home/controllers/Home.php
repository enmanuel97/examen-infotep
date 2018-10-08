<?php

class Home extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->title    = "Bienvenido";
        $this->load->model('services/services_model');
        $this->load->model('turns/turns_model');
        $this->services = $this->services_model->get(FALSE, array('hidden' => 0));
        $this->count = $this->turns_model->count_by_status();
    }

    public function index()
    {
        $date = date("H:i:s");
        $new_date = strtotime("-6 hours", strtotime($date));

        if($this->count > 0 && $this->count < 5)
        {
            $new_date = strtotime("+20 minute", $new_date);
        }else if($this->count > 5 && $this->count < 10){
            $new_date = strtotime("+40 minute", $new_date);
        }else if($this->count > 10)
        {
            $new_date = strtotime("+60 minute", $new_date);
        }else
        {
            $new_date = strtotime("+5 minute", $new_date);
        }
        $new_date = date("H:i:s", $new_date);

        //$where = array('hidden' => 0, 'statusId' => 1);
        $data['hora_available'] = $new_date;
//        $data['turns'] = $this->turns_model->get(TRUE, $where);
        $data['turns'] = $this->turns_model->get(TRUE, array('hidden' => 0, 'statusId' => 1), FALSE, "ai_turns_transaction_view");

        $this->load->view("home/home_view", $data);
    }

    public function table()
    {
        $data['turns'] = $this->turns_model->get(TRUE, array('hidden' => 0, 'statusId' => 1), FALSE, "ai_turns_transaction_view");
        echo json_encode(array('result' => $this->load->view('home/table_view', $data, TRUE)));
    }
}