<?php

use Symfony\Component\HttpFoundation\JsonResponse;

class AdminController extends BaseController {

    
    public function authenticate()
    {
       
         $user = array(
            'username' => Input::get('username'),
            'password' => Input::get('password')
        );
        
        if (Auth::attempt($user))
        {
            echo 'true';
        }else{
            echo 'false';
        }
    }
    
    public function index(){
        if(Auth::user()->id > 0){
            return View::make('admin');
        }else{
           return Redirect::to('/');
        }
        
    }
    
    function getall(){
        if(Auth::user()->id > 0){
            $data = Prijave::where('client_id', '=', Auth::user()->customer_id)->get()->toArray();
                foreach($data as &$entry){
                    if(isset($entry['data'])){
                    $entry['data'] = json_decode($entry['data'], true);
                }
            }
            return new JsonResponse(array('success'=>true,'data'=>$data));
        }else{
            return Redirect::to('/');
        }
    }
    
    function update(){
          if(Auth::user()->id > 0){
             $input = Input::all();
               $prijava = Prijave::find((int)$input['id']);
                if($prijava == null){
                    return Response::json(array('success'=>false,'data'=>'ID not found'));
                    exit;
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
            return Redirect::to('/');
        }
    }
    
    function delete(){
        if(Auth::user()->id > 0){
             $input = Input::all();
               $prijava = Prijave::find((int)$input['id']);
                if($prijava == null){
                    return Response::json(array('success'=>false,'data'=>'ID not found'));
                    exit;
                }
               echo $prijava->delete();
              
        }else{
            return Redirect::to('/');    
        }
        
    }
    
    function podesavanja(){
         if(Auth::user()->id > 0){
            return View::make('podesavanja');
        }else{
           return Redirect::to('/');
        }
    }
    
    function getpodesavanja(){
        if(Auth::user()->id > 0){
            $data = Podesavanja::where('client_id', '=', Auth::user()->customer_id)->get()->toArray();
                foreach($data as &$entry){
                    if(isset($entry['categories'])){
                    $entry['categories'] = json_decode($entry['categories'], true);
                }
            }
            return new JsonResponse(array('success'=>true,'data'=>$data));
        }else{
            return Redirect::to('/');
        }
    }
    
    
}