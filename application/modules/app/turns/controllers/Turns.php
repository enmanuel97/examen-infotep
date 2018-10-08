<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class Turns extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->title = "Turnos";
        $this->load->model('services/services_model');
        $this->load->model('turns/turns_model');
        $this->load->model('transactions/transactions_model');
        $this->load->model('users/users_model');
        $this->load->module('transactions/controllers/transactions');
        $this->services = $this->services_model->get_assoc_list(array('serviceId AS id', 'name'),array('hidden' => 0));

    }

//    public function index()
//    {
//        $data['turns'] = $this->turns_model->get(FALSE, array('hidden' => 0));
//        $this->load->view('turns/turns_view', $data);
//    }

    public function show_factura($turnId)
    {
        $data['turn'] = $this->turns_model->get(TRUE, array('turnId' => $turnId), TRUE);
        $data['count'] = $this->turns_model->count_data($data['turn']->serviceId);
        $this->load->view('turns/show_factura_view', $data);
    }

    public function insert()
    {
        $this->form_validation->set_rules("serviceId","Tipo de Servicio","required|is_natural_no_zero");

        $serviceId = $this->input->post('serviceId');

        $code       = $this->turns_model->count_data($serviceId);
        $date       = date("Y-m-d H:i:s");
        $new_date   = strtotime("-6 hours", strtotime($date));
        $new_date   = date("Y-m-d H:i:s", $new_date);

        if($this->form_validation->run() == FALSE)
        {
            echo json_encode(array('result' => 0, 'error' => display_error(validation_errors())));
        }
        else
        {

            $data = array(
                'serviceId'     => $serviceId,
                'date_entry'    => $new_date,
                'code'          => $code+1,
                'statusId'      => 3
            );

            $id = $this->turns_model->save($data);
            $this->transactions->set_id($id, $serviceId);
            echo json_encode(array('result' => 1, 'url' => base_url('turns/show_factura/'.$id)));
        }
    }

    public function turns_admin()
    {
        if($this->session->userdata('serviceId') != 0)
        {
            $where = array('hidden' => 0, 'statusId' => 3, 'serviceId' => $this->session->userdata('serviceId'));
        }
        else
        {
            $where = array('hidden' => 0, 'statusId' => 3);
        }
        $data['turns'] = $this->turns_model->get(TRUE, $where);

        $data['content'] = "turns/turns_admin_view";
        $this->load->view('includes/template', $data);
    }

    public function turns_admin_proccess()
    {
        if($this->session->userdata('typeId') == 1)
        {
            $data['turns'] = $this->turns_model->get(TRUE, array('hidden' => 0, 'statusId' => 1), FALSE, "ai_turns_transaction_view");
//            $data['turns'] = $this->turns_model->get(TRUE, array('hidden' => 0, 'statusId' => 1));
        }
        else
        {
                $data['turns'] = $this->turns_model->get(TRUE, array('hidden' => 0, 'statusId' => 1, 'userId' => $this->userId), FALSE, "ai_turns_transaction_view");
        }

        $data['content'] = "turns/turns_admin_proccess_view";
        $this->load->view('includes/template', $data);
    }

    public function edit($turnId)
    {
        $data['row'] = $this->turns_model->get_single($turnId);
        echo json_encode(array('result' => $this->load->view('turns/turns_edit_view', $data, TRUE)));
    }

    public function update($turnId)
    {
        $serviceId = $this->input->post('serviceId');

        $this->form_validation->set_rules("serviceId","Tipo de Servicio","required|is_natural_no_zero");
        $code = $this->turns_model->count_data($serviceId);

        $date = date("Y-m-d H:i:s");
        $new_date = strtotime("-6 hours", strtotime($date));
        $new_date = date("Y-m-d H:i:s", $new_date);

        if($this->form_validation->run() == FALSE)
        {
            echo json_encode(array('result' => 0, 'error' => display_error(validation_errors())));
        }
        else
        {

            $this->turns_model->save(array('statusId' => 2, 'date_exit' => $new_date), $turnId);
            $this->transactions_model->update("turnId", $turnId, array('statusId' => 2));

            $data = array(
                'serviceId'     => $serviceId,
                'date_entry'    => $new_date,
                'code'          => $code+1,
                'statusId'      => 3
            );

            $id = $this->turns_model->save($data);
            $this->transactions->set_id($id, $serviceId);
            $this->transactions->another_ticket();

            echo json_encode(array('result' => 1, 'url' => base_url('turns/turns_admin_proccess')));
        }
    }

    public function complete($turnId)
    {
        $date = date("Y-m-d H:i:s");
        $new_date = strtotime("-6 hours", strtotime($date));
        $new_date = date("Y-m-d H:i:s", $new_date);

        if($this->turns_model->save(array('statusId' => 2, 'date_exit' => $new_date), $turnId))
        {
            $this->transactions_model->update("turnId", $turnId, array('statusId' => 2));
            $this->transactions->another_ticket();
        }

        echo json_encode(array('result' => 1));
    }
}