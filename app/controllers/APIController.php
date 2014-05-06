<?php

class APIController extends Controller {

    protected function response(array $data = array(), $status = true, $msg = 'OK')
    {
        return Response::json(array(
            'status' => $status,
            'msg' => $msg,
            'data' => $data
        ));
    }

}
