<?php
namespace App\Controllers;
class Dashboard extends BaseController
{
	protected $data;
	public function __construct() {
        $this->db = \Config\Database::connect();
        helper('Commonfunction');
    }
    public function index() {
    	$this->data['title'] = 'Users profile';
    	return view('index',$this->data);
    }
     public function demo()  {
    	$data ="dataS";
    	echo bannerEncrypt($data);
    }
}