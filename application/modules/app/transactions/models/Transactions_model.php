<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class Transactions_model extends MY_Model
{
    public function __construct()
    {
        $this->table_name  = "ai_transactions";
        $this->view_name   = "ai_transactions";
        $this->primary_key = "transactionId";
        $this->order_by    = "transactionId DESC";
    }

    public function count_data($userId, $statusId = FALSE)
    {
        $where = ($statusId == FALSE) ? "" : " AND statusId = $statusId";
        $query =  $this->db->query("SELECT COUNT(*) AS count FROM ai_transactions WHERE userId = $userId $where")->row();
        return (count($query) > 0) ? $query->count : 0;
    }
}