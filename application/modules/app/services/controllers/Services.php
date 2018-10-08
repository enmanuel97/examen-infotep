<?php

class Services extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->title    = "Servicios";
        $this->securities->is_logged_in($this->session->userdata('is_logged_in'));
    }
}