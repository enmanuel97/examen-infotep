<?php

class Transactions extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('transactions/transactions_model');
        $this->load->model('users/users_model');
        $this->load->model('turns/turns_model');
    }

    public function set_id($turnId, $serviceId = FALSE)
    {
        $count_tickets = $this->turns_model->count_data($serviceId, 1);

        if($count_tickets == 0)
        {
            $user_data = $this->users_model->get(FALSE, array('serviceId' => $serviceId, 'statusId' => 1), TRUE);
//            $user_data = $this->users_model->get(FALSE, array('serviceId' => $serviceId, 'statusId' => 1), TRUE);
            if($user_data != null || $user_data != "")
            {
                $count_trans = $this->transactions_model->count_data($user_data->userId, 1);
                if($count_trans == 0)
                {
                    $data = array(
                        'turnId' => $turnId,
                        'userId' => $user_data->userId,
                        'statusId' => 1
                    );

                    $this->execute($data);
                    $date       = date("Y-m-d H:i:s");
                    $new_date   = strtotime("-6 hours", strtotime($date));
                    $new_date   = date("Y-m-d H:i:s", $new_date);

                    $this->turns_model->save(array('statusId' => 1, 'date_entry' => $new_date), $turnId);
                }
            }
        }
        else
        {
            $users = $this->users_model->get(FALSE, array('userId !=' => $this->userId, 'typeId' => 2, 'statusId' => 1));

            foreach ($users AS $user)
            {
                $count_trans = $this->transactions_model->count_data($user->userId, 1);

                if($count_trans == 0)
                {
                    $data = array(
                        'turnId' => $turnId,
                        'userId' => $user->userId,
                        'statusId' => 1
                    );

                    $this->execute($data);
                    $date       = date("Y-m-d H:i:s");
                    $new_date   = strtotime("-6 hours", strtotime($date));
                    $new_date   = date("Y-m-d H:i:s", $new_date);

                    $this->turns_model->save(array('statusId' => 1, 'date_entry' => $new_date), $turnId);
                }
            }
        }
    }

    public function execute($data)
    {
        $data_transaction = array(
            'turnId' => $data['turnId'],
            'userId' => $data['userId'],
            'statusId' => $data['statusId'],
        );

       $this->transactions_model->save($data_transaction);
    }

    public function another_ticket()
    {
        $user_data = $this->users_model->get(FALSE, array('userId' => $this->userId), TRUE);
        $count_tickets = $this->turns_model->count_data($user_data->serviceId, 3);

        if($count_tickets > 0)
        {
            $next_ticket = $this->turns_model->get_next_ticket($user_data->serviceId);

            if($next_ticket != null || count($next_ticket) > 0)
            {
                $data_transaction = array(
                    'turnId' => $next_ticket->turnId,
                    'userId' => $this->userId,
                    'statusId' => 1,
                );

                $this->transactions_model->save($data_transaction);
                $date       = date("Y-m-d H:i:s");
                $new_date   = strtotime("-6 hours", strtotime($date));
                $new_date   = date("Y-m-d H:i:s", $new_date);
                $this->turns_model->save(array('statusId' => 1, 'date_entry' => $new_date), $next_ticket->turnId);
            }
        }
        else
        {
            $next_ticket = $this->turns_model->get_next_ticket();

            if($next_ticket != null || count($next_ticket) > 0)
            {
                $data_transaction = array(
                    'turnId' => $next_ticket->turnId,
                    'userId' => $this->userId,
                    'statusId' => 1,
                );

                $this->transactions_model->save($data_transaction);
                $date       = date("Y-m-d H:i:s");
                $new_date   = strtotime("-6 hours", strtotime($date));
                $new_date   = date("Y-m-d H:i:s", $new_date);
                $this->turns_model->save(array('statusId' => 1, 'date_entry' => $new_date), $next_ticket->turnId);
            }
        }
    }

//    public function another_ticket()
//    {
//        $user_data = $this->users_model->get(FALSE, array('userId' => $this->userId), TRUE);
//        $next_ticket = $this->turns_model->get_next_ticket($user_data->serviceId);
//
//        if($next_ticket != null || count($next_ticket) > 0)
//        {
//            $data_transaction = array(
//                'turnId' => $next_ticket->turnId,
//                'userId' => $this->userId,
//                'statusId' => 1,
//            );
//
//            $this->transactions_model->save($data_transaction);
//            $date       = date("Y-m-d H:i:s");
//            $new_date   = strtotime("-6 hours", strtotime($date));
//            $new_date   = date("Y-m-d H:i:s", $new_date);
//            $this->turns_model->save(array('statusId' => 1, 'date_entry' => $new_date), $next_ticket->turnId);
//        }
//
//    }
}