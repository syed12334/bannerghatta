<?php
namespace App\Models;
use CodeIgniter\Model;

class ProductsModal extends Model {

    public function __construct() {
    	$this->newdata = \Config\Database::connect();
    }
	public function getData() {
		
	}
	public function getRecords() {
		$getre = $this->newdata->query('select * from users');
		return $getre->getResult();


	}
}