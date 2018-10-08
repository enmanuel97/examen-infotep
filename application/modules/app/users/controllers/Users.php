<?php
/**
 * Created by PhpStorm.
 * User: CCNA
 * Date: 05/10/2018
 * Time: 16:44
 */

class Users extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->title = "Usuarios";
        $this->securities->is_logged_in($this->session->userdata('is_logged_in'));
        $this->securities->is_superviser($this->session->userdata('typeId'));

        $this->load->model('users/users_model');
        $this->load->model('users/users_status_model');
        $this->load->model('users/users_type_model');
        $this->types    = $this->users_type_model->get_assoc_list(array('typeId AS id', 'name'));
    }

    public function index()
    {
        $data['users'] = $this->users_model->get(TRUE, array('hidden' => 0));
        $data['content'] = "users/users_view";
        $this->load->view('includes/template', $data);
    }

    public function add()
    {
        $data = array();
        echo json_encode(array('result' => $this->load->view('users/users_new_view', $data, TRUE)));
    }

    public function insert()
    {
        $this->form_validation->set_rules("name","Nombre","required");
        $this->form_validation->set_rules("last_name","Apellido","required");
        $this->form_validation->set_rules("email","Email/Usuario","required");
        $this->form_validation->set_rules("password","Contraseña","required");
        $this->form_validation->set_rules("typeId","Tipo","required|is_natural_no_zero");

        if($this->form_validation->run() == FALSE)
        {
            echo json_encode(array('result' => 0, 'error' => display_error(validation_errors())));
        }
        else
        {
            $data = array(
                'name' => $this->input->post('name'),
                'last_name' => $this->input->post('last_name'),
                'email' => $this->input->post('email'),
                'password' => md5($this->input->post('password')),
                'typeId' => $this->input->post('typeId'),
            );

            $this->users_model->save($data);

            echo json_encode(array('result' => 1));
        }
    }

    public function edit($userId)
    {
        $data['row'] = $this->users_model->get_single($userId);
        echo json_encode(array('result' => $this->load->view('users/users_edit_view', $data, TRUE)));
    }

    public function update($userId)
    {
        $this->form_validation->set_rules("name","Nombre","required");
        $this->form_validation->set_rules("last_name","Apellido","required");
        $this->form_validation->set_rules("email","Email/Usuario","required");
        $this->form_validation->set_rules("password","Contraseña","required");
        $this->form_validation->set_rules("typeId","Tipo","required|is_natural_no_zero");

        $data = array(
            'name' => $this->input->post('name'),
            'last_name' => $this->input->post('last_name'),
            'email' => $this->input->post('email'),
            'typeId' => $this->input->post('typeId'),
        );

        if($this->input->post('password') != null || $this->input->post('password') != "")
        {
            $data['password'] = md5($this->input->post('password'));
        }
        $this->users_model->save($data, $userId);

        echo json_encode(array('result' => 1));
    }

    public function delete($userId)
    {
        $this->users_model->save(array('hidden' => 1), $userId);

        echo json_encode(array('result' => 1));
    }
}