<?php namespace App\Models;

use CodeIgniter\Model;

class Master_db extends Model
{
	protected $db;
    public function __construct() {
        $this->db = db_connect();
    }
	
	function getRecords($table, $where = array(), $select = "*", $ordercol = '', $group = '', $start='', $limit=''){
	    $where = esc($where);
		$builder = $this->db->table($table);
		$builder->select($select);
		$builder->where($where);
	    if(!empty($ordercol)){
	        $builder->orderBy($ordercol);
	    }
	    if($limit != '' && $start !=''){
	        $builder->limit($limit,$start);
	    }
	    if($group != ''){
	        $builder->groupBy($group);
	    }
	    $q = $builder->get();
	    return $q !== FALSE ? $q->getResult() : array();
	}
	
	function getRow($table,$where,$columns="*"){
		$where = esc($where);
		$builder = $this->db->table($table);
		$builder->select($columns);
		$builder->where($where);
		$query = $builder->get();
		return $query->getRow();
	}
	
	function getRes($table,$where,$columns="*",$orderby="",$limit=""){
		$where = esc($where);
		$builder = $this->db->table($table);
		$builder->select($columns);
		$builder->where($where);
		if(is_array($orderby) && count($orderby)==2){
			$builder->orderBy($orderby[0],$orderby[1]);
		}elseif($orderby!=""){
			$builder->orderby($orderby,"asc");
		}
		$query = $builder->get();
		return $query->getResult();
	}
	
	function rowRes($query){
		$query = $this->db->query($query);
		return $query->getRow();
	}
	
	function sqlExecute($query){
		$query = $this->db->query($query);
		return $query->getResult();
	}
	
	function insertRecord($table,$inData)
	{	
		$inData  = esc($inData);
		$builder = $this->db->table($table);
		$builder->insert($inData);
		return $this->db->insertID();
	}
	
	function updateRecord($table,$upData,$where)
	{
		$upData  = esc($upData);
		$where   = esc($where);
		$upData  = preg_replace("/\s+/", " ", $upData);
		$builder = $this->db->table($table);
		$builder->where($where);
		$builder->update($upData);
		return $this->db->affectedRows();
	}
	
	function rowsByPagination($query,$order_by,$order_by_arr,$db="default")
	{
        if(isset($_POST["order"]))
        {
			if($_POST['order']['0']['column']!="0")
			{
				$col_index = $_POST['order']['0']['column'];
				if(isset($order_by_arr[$col_index]))
				{
					$order_by = " order by ".$order_by_arr[$col_index]." ".$_POST['order']['0']['dir'];
				}
			}
			if($_POST['order']['0']['column']==0)
			{
				//$order_by = " order by ".$order_by_arr[$_POST['order']['0']['column']]." desc";
			}
        }
		
		$limit = "0,10";
		$limit = "";
        if($_POST["length"] != -1)
        {
            $limit = " limit {$_POST['length']}";
            if($_POST['start'] > 0){
                $limit = " limit {$_POST['start']}, {$_POST['length']}";
            }
        }
        $query = $this->db->query($query.$order_by.$limit);
		
        return $query->getResult();
	}	
}
