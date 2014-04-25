<?php

class APIController extends Controller {

    private $time = 3;
    private $time_units = 'minutes';

    protected function response(array $data = array(), $status = true, $msg = 'OK')
    {
        return Response::json(array(
            'status' => $status,
            'msg' => $msg,
            'data' => array(
                'accounts' => $data,
                'time_to_solve' => $this->time.' '.$this->time_units,
                'end_time' => date('Y-m-d h:i:s', strtotime('+'.$this->time.' '.$this->time_units))
            )
        ));
    }

}