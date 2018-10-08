<?php

class Securities
{
    var $CI;

    public function __construct()
    {
        $this->CI =& get_instance();
    }

    public function is_logged_in($is_logged_in)
    {
        if($is_logged_in != 1)
        {
            return redirect(base_url('login'));
        }
    }

    public function is_enable($statusId)
    {
        if($statusId == 0)
        {
            return redirect(base_url('session/blocked'));
        }
    }

    public function is_superviser($typeId)
    {
        if($typeId != 1)
        {
            return redirect(base_url('turns/turns_admin'));
        }
    }

}