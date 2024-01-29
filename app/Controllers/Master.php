<?php
	namespace App\Controllers;
class Master extends BaseController {
	protected $data;
	public function __construct() {
	}
	public function species() {
		$this->data['title'] = "Species";
		return view('masters/species/species',$this->data);
	}
}