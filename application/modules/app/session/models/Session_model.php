<?php

class Session_model extends MY_Model
{
    public function auth($user, $password)
    {
        $query = $this->db->query("SELECT * FROM ai_users where email = '$user' AND password = '$password'")->row();

        return $query;
    }
}