<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class MY_Controller extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->hour_entry = "08:00:00";
        $this->hour_exit  = "19:20:00";
        $this->userId   = $this->session->userdata('userId');
        $this->email   = $this->session->userdata('email');
    }

    public function time($hour)
    {
        if($hour < 5)
        {
            $num = 10;
        }
        else if($hour < 10)
        {
            $num = 20;
        }
        else if($hour < 20)
        {
            $num = 40;
        }

        return $num;
    }
}