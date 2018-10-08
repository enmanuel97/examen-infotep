<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class MY_Model extends CI_Model
{
    public $table_name;
    public $view_name;
    public $primary_key = '';
    public $primaryFilter = 'intval';
    public $order_by = '';

    public function __construct()
    {
        parent::__construct();
    }

    public function save($data, $id = FALSE)
    {
        if ($id == FALSE)
        {
            // Insert Data
            $this->db->insert($this->table_name, $data);
        }
        else
        {
            // Update Data
            $filter = $this->primaryFilter;
            $this->db->where($this->primary_key, $filter($id))->update($this->table_name, $data);
        }

        // Return the ID
        return $id == FALSE ? $this->db->insert_id() : $id;
    }

    public function update($primary_key, $id, $data)
    {
        $filter = $this->primaryFilter;
        $this->db->where($primary_key, $filter($id))->update($this->table_name, $data);
        return $id;
    }

    public function get($module = FALSE, $where = FALSE, $single = FALSE, $another_view = FALSE)
    {
        if($module == FALSE)
        {
            $table = $this->table_name;
        }
        else
        {
            $table = ($another_view == FALSE) ? $this->view_name : $another_view;
        }

        if($where == FALSE)
        {
            if($single == FALSE)
            {
                return $this->db->get($table)->result();
            }
            else
            {
                return $this->db->get($table)->row();
            }
        }
        else
        {
            if($single == FALSE)
            {
                return $this->db->where($where)->get($table)->result();
            }
            else
            {
                return $this->db->where($where)->get($table)->row();
            }
        }
    }

    public function get_single($id)
    {
        return $this->db->where($this->primary_key,$id)->get($this->table_name)->row();
    }

    public function get_assoc_list($columns, $where = FALSE)
    {
        $this->db->select($columns);

        if($where != FALSE)
        {
            $this->db->where($where);
        }

        $query = $this->db->get($this->table_name)->result();

        $options = array();
        $options[0] = "Seleccione una Opción";

        foreach ($query AS $row)
        {
            $options[$row->id] = $row->name;
        }

        return $options;
    }
}