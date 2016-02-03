<?php
class contentHelper extends Database {
	
	function getData($condition,$select,$table,$where){
		if($condition == TRUE){
			$sql = "SELECT {$select} FROM {$table} WHERE {$where}";
		}
		else{
			$sql = "SELECT {$select} FROM {$table}";
		}
		//pr($sql);
		$res = $this->fetch($sql,1,0);
		if ($res) return $res;
		return false;
	}

	function getDataLimit($condition,$select,$table,$where,$limit){
		if($condition == TRUE){
			$sql = "SELECT {$select} FROM {$table} WHERE {$where} ORDER BY posted_date DESC LIMIT {$limit}";
		}
		else{
			$sql = "SELECT {$select} FROM {$table} ORDER BY posted_date DESC LIMIT {$limit}";
		}
		//pr($sql);
		$res = $this->fetch($sql,1,0);
		if ($res) return $res;
		return false;
	}
	
	
}
?>