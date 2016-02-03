<?php 

/* Class Name = Database
 * Variabel Input : query, result, connect, numRec
 * Variabel Input Type : Protected
 * Created By : Ovan Cop
 * Class Desc : Kumpulan fungsi database (db helper)
 */

class Database
{
	protected $var_query = null;
	protected $var_result = null;
	protected $var_connect = null;
	protected $var_numRec = null;
	protected $config = array();
	protected $dbConfig = array();
	protected $keyconfig = null;
	var $link = false;
	var $isPDO = false;
	
	public function __construct() {
		
		/* nothing here */
	}
	
	function setAppKey()
	{
		global $CONFIG;
		if (array_key_exists('default',$CONFIG)) $keyconfig = 'default';
		if (array_key_exists('admin',$CONFIG)) $keyconfig = 'admin';
		if (array_key_exists('dashboard',$CONFIG)) $keyconfig = 'dashboard';
		if (array_key_exists('services',$CONFIG))$keyconfig = 'services';
		
		return $keyconfig;
	}
	
	function setDbConfig()
	{
		global $dbConfig;
		
	}
	
	public function open_connection($dbuse) {
		
		global $dbConfig, $CONFIG;
		
		$this->keyconfig = $this->setAppKey();
		
		if ((is_array($dbConfig)) and ($dbConfig !=''))
		{
			
			if ($dbConfig[$dbuse]['server'] !=''){
				$db_status = 1;
			}else{
				$this->db_error('Server not defined');
				exit;
			}
			
			switch ($dbConfig[$dbuse]['server'])
			{
				case 'mysql':
				{
					
					if ($CONFIG[$this->keyconfig]['app_status'] == 'Production'){
						if ($this->isPDO){
							$connect = new PDO("mysql:host={$dbConfig[$dbuse]['host']};dbname={$dbConfig[$dbuse]['name']}", "{$dbConfig[$dbuse]['user']}", "{$dbConfig[$dbuse]['pass']}");
						}else{
							$connect = @mysqli_connect(trim($dbConfig[$dbuse]['host']), $dbConfig[$dbuse]['user'], $dbConfig[$dbuse]['pass']) or die ($this->db_error('Connection error'));
						
						}
						
					}else{
						if ($this->isPDO){
							$connect = new PDO("mysql:host={$dbConfig[$dbuse]['host']};dbname={$dbConfig[$dbuse]['name']}", "{$dbConfig[$dbuse]['user']}", "{$dbConfig[$dbuse]['pass']}");
						}else{
							$connect = mysqli_connect(trim($dbConfig[$dbuse]['host']), $dbConfig[$dbuse]['user'], $dbConfig[$dbuse]['pass']) or die ($this->db_error('Connection error'));
						
						}
					}
					
					if ($this->isPDO){
						return $connect;
					}else{

						if ($connect){
					
							if ($CONFIG[$this->keyconfig]['app_status'] == 'Production'){
								@mysqli_select_db($connect, trim($dbConfig[$dbuse]['name'])) or die ($this->db_error('No Database Selected'));	
							
							}else{
								mysqli_select_db($connect, trim($dbConfig[$dbuse]['name'])) or die ($this->db_error('No Database Selected'));
								
								// mysql_select_db('florakalbar', $connect) or die ($this->db_error('No Database Selected'));
								
							}
							
							$this->link = $connect;
							return $connect;
						
						}else{
						
							return false;
						}
					}
					
				}
				break;
				
				default :
				{
					$this->db_error('Database not configure, please check database server configure');
				}
				break;
			}
		}
	}
	
        
	/*
		fungsi query digunakan untuk menjalankan query seperti insert, 
		update atau query yang tidak diperlukan nilai kembalian dalam bentuk data
	 */
	public function query($data, $dbuse=0)
	{
		global $dbConfig, $CONFIG;
		$this->keyconfig = $this->setAppKey();
		
		$connect = $this->open_connection($dbuse);
                // cek server database yang dipakai
		switch ($dbConfig[$dbuse]['server'])
		{
			case 'mysql':
				if ($CONFIG[$this->keyconfig]['app_status'] == 'Production'){
						// if ($this->dbConfig[''])
						$this->var_query = @mysqli_query($data);

				}else{
						$this->var_query = mysqli_query($connect, $data) or die ($this->error($data,$dbuse));
				}
				break;
			
		}
		// $this->close_connection();
		
		return $this->var_query;
	}
	

	
	public function fetch($data=false, $loop=false, $dbuse=0)
	{
		/* $dbuse [0] = config default database */
		// pr($dbuse);
		global $dbConfig, $CONFIG;
		
		if (!$data) return false;
		
		$dataArray = array();
		$this->keyconfig = $this->setAppKey();
		
		switch ($dbConfig[$dbuse]['server'])
		{
			case 'mysql':
				$this->open_connection($dbuse);
				$this->var_result = $this->query($data,$dbuse) or die ($this->error($data,$dbuse));
				if ($loop){
					if ($this->num_rows($data,$dbuse)){

						while ($data = mysqli_fetch_assoc($this->var_result)){
								$dataArray[] = $data;
						}
						
						return $dataArray;
					}else{
						return false;
					}
				}else{
					
					$dataArray = mysqli_fetch_assoc($this->var_result);
					
					return $dataArray;
				}
				$this->close_connection();
			break;
                    
		}
		
		
		
	}

	function escape_string($data)
	{
		return mysqli_real_escape_string($data);
	}
        
        /* fungsi yang digunakan untuk execute query pada oracle secara otomatis akan di commit
         * jika fungsi ini dijalankan maka data yang di input tidak akan bisa di rollback kembali
         * ini sudah ketentuan dari API oracle-nya 
         */
	
	
	public function fetch_field($data)
	{
		$this->var_result = $data;
		
		return mysqli_fetch_field($this->var_result);
	}
	
	public function num_rows($data=false,$dbuse)
	{
		if (!$data) return false;
		$result = $this->query($data,$dbuse) or die ($this->error($data));
		$numRec = mysqli_num_rows($result);
		return $result;
	}
	
	public function insert_id()
	{
		$res['lastID'] = 0;
		$sql = "SELECT LAST_INSERT_ID() AS lastID";
		$res = $this->fetch($sql);
		
		if ($res['lastID']>0)return $res['lastID'];
		return false;
	}
	
	public function close_connection()
	{
		
		global $dbConfig;
		$this->keyconfig = $this->setAppKey();
		
		switch ($dbConfig[0]['server'])
		{
			case 'mysql':
				return mysqli_close($this->link);
				break;
		   
		}
		
	}
	
	public function free_result($result)
	{
		return mysqli_free_result($result);
	}
	
	public function real_escape_string($data)
	{
		return mysqli_real_escape_string($data);
	}
	
	public function error($data,$dbuse)
	{
		
		global $dbConfig, $CONFIG;
		$this->keyconfig = $this->setAppKey();
		
		if ($CONFIG[$this->keyconfig]['app_status'] == 'Production'){
			$message = 'Your query error, please check again';
			return $message;
		}else{
			
			switch ($dbConfig[$dbuse]['server'])
			{
				case 'mysql':
					return mysqli_error($this->link);
					break;
				
			}
			
		}
		
	}
	
	function db_error($mesg)
	{
		
		if ($mesg !='') {
			$mesg = $mesg;
			
		}else{
			$mesg = "Message error not defined";
		}
		
		print ($mesg);
		return false;
		
	}
	
	function autocommit($val=0,$dbuse=0)
	{
		$command = "SET autocommit={$val};";
		$result = $this->query($command) or die ($this->error('autocommit failed'));
		// if (!$this->link){
			// $this->link = $this->open_connection(0);
		// }
		
		// return mysqli_autocommit($this->link, false);
		
	}
	
	function commit($dbuse=0)
	{
		$command = "COMMIT;";
		$result = $this->query($command) or die ($this->error('commit failed'));
		// mysql_commit();
	}
	
	function rollback($dbuse=0)
	{
		$command = "ROLLBACK;";
		$result = $this->query($command) or die ($this->error('rollback failed'));
		// if (!$this->link){
			// $this->link = $this->open_connection(0);
		// }
		
		// pr($this->link);
		// mysql_rollback($this->link);
		
	}
	
	function begin($dbuse=0)
	{
		
		$this->autocommit();
		$command = "START TRANSACTION;";
		$result = $this->query($command) or die ($this->error('commit failed'));
		// if (!$this->link){
			// $this->link = $this->open_connection(0);
			
		// }
		// mysql_
		// $res = mysql_begin_transaction($this->link);
		if ($result) return true;
		return false;
	}
}


?>