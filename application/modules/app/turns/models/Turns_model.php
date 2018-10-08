<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class Turns_model extends MY_Model
{
    public function __construct()
    {
        $this->table_name  = "ai_turns";
        $this->view_name   = "ai_turns_view";
        $this->primary_key = "turnId";
        $this->order_by    = "turnId DESC";
    }

    public function count_data($serviceId, $statusId = FALSE)
    {
        $where = ($statusId == FALSE) ? "" : " AND statusId = $statusId";
        $query =  $this->db->query("SELECT COUNT(*) AS count FROM ai_turns WHERE serviceId = $serviceId $where")->row();
        return (count($query) > 0) ? $query->count : 0;
    }

    public function get_next_ticket($serviceId = FALSE)
    {
        $where = ($serviceId == FALSE) ? "" : " AND serviceId = $serviceId";
        $query = $this->db->query("SELECT * FROM ai_turns WHERE statusId = 3 $where ORDER BY turnId ASC LIMIT 1")->row();
        return $query;
    }

    public function get_last_ticket($serviceId)
    {
        return $this->db->query("SELECT * FROM ai_turns WHERE serviceId = $serviceId ORDER BY turnId DESC LIMIT 1")->row();
    }

    public function count_by_status($statusId = "1,3")
    {
        $query =  $this->db->query("SELECT COUNT(*) AS count FROM ai_turns WHERE statusId IN($statusId)")->row();
        return (count($query) > 0) ? $query->count : 0;
    }

    public function get_stadistic_data($date_entry, $date_entry2)
    {
        $query = $this->db->query("SELECT COUNT(*) as count FROM ai_turns WHERE date_entry >= '$date_entry' AND date_entry <= '$date_entry2'")->row();
        return (count($query) > 0) ? $query->count : 0;
    }
}