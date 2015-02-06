<?php

class HomeController extends BaseController {

    public function Insert() {

        $rules = array(
            'data' => 'required',
            'email' => 'required|email',
            'status' => 'required'
        );
       

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Response::json(array('success'=>false,'data'=>$validator->messages()));
        }else{
            $input = Input::all();
            $prijaveModel = new Prijave;
            $prijaveModel->status = (int)$input['status'];
            $prijaveModel->data = $input['data'];
            $prijaveModel->email = $input['email'];
            $prijaveModel->client_id = Authorizer::getResourceOwnerId();
            if($prijaveModel->save()){
                return Response::json(array('success'=>true,'id'=>$prijaveModel->id));
            }
        }
    }
    
    public function GetData(){
        
        $input = Input::all();
        
        if(isset($input['id'])){
            return Response::json(array('success'=>true,'data'=>Prijave::find((int)$input['id'])));
        }else if(isset($input['all'])){
            return Response::json(array('success'=>true,'data'=>Prijave::where('client_id', '=', Authorizer::getResourceOwnerId())->get()));
        }
        
        
    }
    
    
    public function Update(){
        $input = Input::all();
        
        if(isset($input['id'])){
            $prijava = Prijave::find((int)$input['id']);
            if($prijava == null){
                return Response::json(array('success'=>false,'data'=>'ID not found'));
                exit;
            }
            if(isset($input['data'])){
                $prijava->data = $input['data'];
            }
            if(isset($input['status'])){
                $prijava->status = (int)$input['status'];
            }
            
            if($prijava->save()){
                return Response::json(array('success'=>true,'data'=>$prijava));
            }else{
                return Response::json(array('success'=>false,'data'=>'Unable to Update'));
            }
        }else{
            return Response::json(array('success'=>false,'data'=>'Please send ID'));
        }
    }

}
