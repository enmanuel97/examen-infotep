<?php
/**
 * Created by PhpStorm.
 * User: CCNA
 * Date: 06/10/2018
 * Time: 11:29
 */

class Reports extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->title = "Reportes";
        $this->securities->is_logged_in($this->session->userdata('is_logged_in'));
        $this->securities->is_superviser($this->session->userdata('typeId'));
        $this->load->model("turns/turns_model");
        $this->load->model('users/users_model');
        $this->load->model('services/services_model');
        $this->services = $this->services_model->get_assoc_list(array('serviceId AS id', 'name'),array('hidden' => 0));
        $this->users = $this->users_model->get_assoc_list(array('userId AS id', 'CONCAT(name," ",last_name) AS name'), array('hidden' => 0, 'typeId' => 2));
    }

    public function turno_en_cola()
    {
        $data['content'] ="reports/turno_en_cola_view";
        $this->load->view('includes/template',$data);
    }

    public function turno_en_cola_report($output = FALSE)
    {
        $where = array('hidden' => 0, 'statusId' => 3);

        $data['turns'] = $this->turns_model->get(TRUE, $where);
        if($output == FALSE)
        {
            echo json_encode(array('result' => 1, 'view' => $this->load->view("reports/turno_en_cola_view_report", $data, TRUE)));
        }
        else
        {
            $this->load->view('reports/turno_en_cola_view_print', $data);
        }
    }
/////////////////////////////////////////////////////////////////////////////////////////

    public function turno_atendidos()
    {
        $data['content'] ="reports/turno_atendidos_view";
        $this->load->view('includes/template',$data);
    }

    public function turno_atendidos_report($output = FALSE)
    {
        $where = array('hidden' => 0, 'statusId' => 2);
        $data['turns'] = $this->turns_model->get(TRUE, $where, FALSE, "ai_turns_transaction_view");
        if($output == FALSE)
        {
            echo json_encode(array('result' => 1, 'view' => $this->load->view("reports/turno_atendidos_view_report", $data, TRUE)));
        }
        else
        {
            $this->load->view('reports/turno_atendidos_view_print', $data);
        }
    }
/////////////////////////////////////////////////////////////////////////////////////////

    public function turno_atendidos_por_servicio()
    {
        $data['content'] ="reports/turno_atendidos_por_servicio_view";
        $this->load->view('includes/template',$data);
    }

    public function turno_atendidos_por_servicio_report($output = FALSE, $serviceId = FALSE)
    {
        if($output == FALSE)
        {
            $this->form_validation->set_rules("serviceId","Tipo de Servicio","required|is_natural_no_zero");
            $serviceId = $this->input->post('serviceId');

            if($this->form_validation->run() == FALSE)
            {
                echo json_encode(array('result' => 0, 'error' => display_error(validation_errors())));
            }
            else
            {
                $where = array('hidden' => 0, 'statusId' => 2, 'serviceId' => $serviceId);

                $data['turns'] = $this->turns_model->get(TRUE, $where, FALSE, "ai_turns_transaction_view");
                $data['serviceId'] = $serviceId;
                echo json_encode(array('result' => 1, 'view' => $this->load->view("reports/turno_atendidos_por_servicio_view_report", $data, TRUE)));
            }
        }
        else
        {
            $where = array('hidden' => 0, 'statusId' => 2, 'serviceId' => $serviceId);

            $data['turns'] = $this->turns_model->get(TRUE, $where, FALSE, "ai_turns_transaction_view");
            $this->load->view('reports/turno_atendidos_por_servicio_view_print', $data);
        }
    }

///////////////////////////////////////////////////////////////////////////////////////

    public function turno_atendidos_por_ejecutivo()
    {
        $data['content'] ="reports/turno_atendidos_por_ejecutivo_view";
        $this->load->view('includes/template',$data);
    }

    public function turno_atendidos_por_ejecutivo_report($output = FALSE, $userId = FALSE)
    {
        if($output == FALSE)
        {
            $this->form_validation->set_rules("userId","Ejecutivo","required|is_natural_no_zero");
            $userId = $this->input->post('userId');

            if($this->form_validation->run() == FALSE)
            {
                echo json_encode(array('result' => 0, 'error' => display_error(validation_errors())));
            }
            else
            {
                $where = array('hidden' => 0, 'statusId' => 2, 'userId' => $userId);

                $data['turns'] = $this->turns_model->get(TRUE, $where, FALSE, "ai_turns_transaction_view");
                $data['userId'] = $userId;
                echo json_encode(array('result' => 1, 'view' => $this->load->view("reports/turno_atendidos_por_ejecutivo_view_report", $data, TRUE)));
            }
        }
        else
        {
            $where = array('hidden' => 0, 'statusId' => 2, 'userId' => $userId);
            $data['turns'] = $this->turns_model->get(TRUE, $where, FALSE, "ai_turns_transaction_view");
            $this->load->view('reports/turno_atendidos_por_ejecutivo_view_print', $data);
        }
    }
}