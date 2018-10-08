<?php

class Session extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('session/session_model');
        $this->load->model('users/users_model');
    }

    public function index()
    {
        $this->load->view('session/session_view');
    }

    public function auth()
    {
        $this->form_validation->set_rules("email","Email/Usuario","required");
        $this->form_validation->set_rules("password","Contraseña","required");

        if($this->form_validation->run() == FALSE)
        {
            echo json_encode(array('result' => 0, 'error' => display_error(validation_errors())));
        }
        else
        {
            $username = $this->input->post('email');
            $password = $this->input->post('password');

            $row = $this->session_model->auth($username, md5($password));

            if($row)
            {
                $data = array(
                    'userId' => $row->userId,
                    'name'   => $row->name,
                    'last_name' => $row->last_name,
                    'email' => $row->email,
                    'is_logged_in' => 1,
                    'typeId' => $row->typeId,
                    'serviceId' => ($row->typeId == 2) ? $row->serviceId : 0
                );

                $this->session->set_userdata($data);
                $this->users_model->save(array('statusId' => 1), $row->userId);
                $returnUrl = ($row->typeId == 1) ? base_url('dashboard') : base_url('turns/turns_admin');
                echo json_encode(array('result' => 1, 'url' => $returnUrl));
            }
            else
            {
                echo json_encode(array('result' => 0, 'error' => display_error("<li>Usuario o Contraseña incorrecta</li>")));
            }
        }
    }

    public function blocked()
    {
        $this->load->view('session/session_blocked_view');
    }

    public function logout()
    {
        $this->users_model->save(array('statusId' => 0), $this->userId);
        session_destroy();
        return redirect(base_url('login'));
    }
}