<?php

use Symfony\Component\HttpFoundation\JsonResponse;
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
            $data = json_decode(Prijave::find((int)$input['id']), true);
            if(isset($data['data'])){
                $data['data'] = json_decode($data['data'], true);
            }
            return new JsonResponse(array('success'=>true,'data'=>$data));
        }else if(isset($input['all'])){
            $data = Prijave::where('client_id', '=', Authorizer::getResourceOwnerId())->get()->toArray();
            foreach($data as &$entry){
                if(isset($entry['data'])){
                $entry['data'] = json_decode($entry['data'], true);
            }
            }
            
            return new JsonResponse(array('success'=>true,'data'=>$data));
        }
        
        
    }
    
    
    public function Update(){
        $input = Input::all();
        var_dump($input);
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
