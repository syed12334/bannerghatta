<?php

namespace App\Controllers;

class Home extends BaseController
{
	public $data;
	public function __construct() {
        $this->master_db = model('Master_db');
        $this->db = \Config\Database::connect();
        $this->data['master'] = $this->master_db;
        $this->data['db'] =   $this->db;
    }
    public function index()
    {
    	$this->data['package'] = $this->master_db->getRecords('levels',['status'=>0],'id,level_names as package_name');
        return view('index',$this->data);
    }
}
