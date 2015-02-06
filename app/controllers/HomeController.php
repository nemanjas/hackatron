<?php

class HomeController extends BaseController {

    public function Testme() {

        $rules = array(
            'data' => 'required',
            'email' => 'required|email',
            'status' => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            echo Response::json(array('error'=>true,$validator->messages()));
        }else{
            $input = Input::all();
            $prijaveModel = new Prijave;
            $prijaveModel->status = $input['status'];
            $prijaveModel->data = $input['data'];
            $prijaveModel->email = $input['email'];
            $prijaveModel->client_id = Authorizer::getResourceOwnerId();
            var_dump($prijaveModel->save());
        }
    }

}
