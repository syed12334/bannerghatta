<?php

namespace App\Controllers;
class Users extends BaseController
{
	protected $data;
	public function index() {
		$this->data['title'] = 'Users profile';
		 // Get the Request object from the service container
       // $request = service('request');
        
        // Retrieve the client's IP address
        //$clientIP = $request->getIPAddress();

        // Now you can use $clientIP as needed
        //echo "Client IP: " . $clientIP;
        $this->request->getIPAddress();
		return view('index',$this->data);
	}
	public function saveUsers() {
		$validate = [
			'name' =>'required|max_length[10]',
			'email' =>'required|valid_email',
			'phone'=>'required|exact_length[10]'
		];
		$message = [
			'name' =>[
				'required'=>'Name is required',
				'max_length'=>'Maximum 10 charaters are allowed'
			],
			'email' =>[
				'required'=>'Email is required',
				'valid_email'=>'Enter valid email id'
			],
			'phone' =>[
				'required'=>'Phone numn=ber is required',
				'exact_length'=>'Phone number is exactly 10'
			],
		];
		if(!$this->validate($validate,$message)) {
			$getErrors = $this->validator->getErrors();
			echo "<pre>";print_r($getErrors);exit;
			$getErrorlist = json_decode($getErrors,true);
			echo json_encode(['formerror'=>false,'getErrors'=>$getErrorlist]);
		}else {
			echo json_encode(['status'=>true,'msg'=>'Inserted successfully']);
		}
	}
}