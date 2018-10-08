<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class Services_model extends MY_Model
{
    public function __construct()
    {
        $this->table_name  = "ai_services";
        $this->view_name   = "ai_services";
        $this->primary_key = "serviceId";
        $this->order_by    = "serviceId DESC";
    }
}