<?php

namespace App\Controllers;
use App\Libraries\Newlib;
class Products extends BaseController
{
    public function __construct() {
        $this->newdata = \Config\Database::connect();
    }
	 
    public function index()
    {
    	$pr = model('ProductsModal');
        $pr->getRecords();
        echo $this->newdata->getLastQuery();exit;
    	echo "<pre>";print_r($pr->getRecords());

        return view('welcome_message');
    }
    public function setsession() {
    	$this->session->set('newdata','new knife');
    }
    public function getsession() {
    	echo session('newdata');
    }
    public function removesession() {
    	$this->session->remove('newdata');
    }
    public function getLibdata() {
    	$lib = new Newlib();
    	$data = $lib->getNew();
    	echo $data;
    }
    public function about() {
        return view('about');
    }
    public function save() {
       echo "<pre>";print_r($_FILES);exit;
    }
    public function price() {
        $max = 14000;
        $min = 6450;
        $total = $max - $min;
        $total  = round($total /4);
        $count =4;
        $data = [];
        for($i =0;$i <=4; $i++) {
            if($i ==0) {
                $new[] = $min." to ".$min + $total;
            }
            if($i ==1) {
                $new[] = $min+$total." to ".$min+$total * 2;
            }
             if($i ==2) {
                $new[] = $min+$total*2 ." to ". $min+$total * 3;
            }
             if($i ==3) {
                $new[] = $min+$total*3 ." to ". $max;
            }
            
        }
        array_push($data, $new);
        foreach ($data[0] as $key => $value) {
            echo $value."<br />";
        }
    }

}
