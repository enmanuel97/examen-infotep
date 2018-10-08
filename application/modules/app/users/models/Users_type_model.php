<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class Users_type_model extends MY_Model
{
    public function __construct()
    {
        $this->table_name  = "ai_users_types";
        $this->view_name   = "ai_users_types";
        $this->primary_key = "typeId";
        $this->order_by    = "typeId DESC";
    }
}