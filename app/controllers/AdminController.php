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
            die();
        }
    }
    
    
}