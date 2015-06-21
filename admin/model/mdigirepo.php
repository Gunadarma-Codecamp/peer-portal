<?php
class mdigirepo extends Database {
	
    var $prefix = "floraINA";
    /**
     * @todo insert a record to database
     * 
     * @param $table = table name
     * @param $data = array data to insert
     * @param $db2 = boolean using second database or not
     * 
     * @return lastid = id of inserted data
     * @return status = boolean status of data
     * 
     * */
	function insertData($table=false, $data=array(), $db2=false)
	{
        global $CONFIG, $basedomain;
		if (!$table and empty($data)) return false;

		$return = array();
		$return['n_status'] = false;
        
        if(!empty($data['created_date'])) $data['created_date'] = date("Y-m-d H:i:s",strtotime($data['created_date']));
        if(!empty($data['expired_date'])) $data['expired_date'] = date("Y-m-d H:i:s",strtotime($data['expired_date']));
		
		foreach ($data as $key=>$val){
            if(!empty($val)){
                
                $sanitize = str_replace(array('\'', '"'), '', $val);
                
                $tmpfield[] = "`$key`";
                $tmpvalue[] = "'{$sanitize}'";
            }
		}
		
		$field = implode (',',$tmpfield);
		$value = implode (',',$tmpvalue);
		
		$sql = "INSERT INTO {$this->prefix}_{$table} ({$field}) VALUES ({$value})";
        
        if($db2){
            $res = $this->query($sql,1);
        }else{
            $res = $this->query($sql);
        }
        
		if ($res){
			$return['lastid'] = $this->insert_id();
			$return['n_status'] = true;
		}
		return $return;
	}
    
    function repoInp($table,$data)
	{
		
		$date = date('Y-m-d H:i:s');
		$datetime = array();
        
		if(!empty($data['created_date'])) $data['created_date'] = date("Y-m-d H:i:s",strtotime($data['created_date']));
        if(!empty($data['expired_date'])) $data['expired_date'] = date("Y-m-d H:i:s",strtotime($data['expired_date']));
        else $data['expired_date'] = '0000-00-00';
        
        $data['title'] = addslashes($data['title']);
        $data['source'] = addslashes($data['source']);

		if($data['action'] == 'insert'){
			
			$query = "INSERT INTO  
						{$this->prefix}_{$table} (
                            otherid, title, category, source,
                            authorid, realname,
                            created_date, n_status, files,
                            filename, filesize, content, icon,
                            file_icon
                        )
					VALUES
						('".$data['otherid']."','".$data['title']."','".$data['category']."','".$data['source']."'
                        ,'".$data['authorid']."','".$data['realname']."'
                        ,'".$data['created_date']."','".$data['n_status']."','".$data['files']."'
                        ,'".$data['filename']."','".$data['filesize']."','".$data['content']."','".$data['icon']."'
                        ,'".$data['file_icon']."')";
                        //pr($query);exit;

		} else {
			$query = "UPDATE {$this->prefix}_{$table}
						SET 
							title = '{$data['title']}',
							source = '{$data['source']}',
							content = '{$data['content']}',
                            
							authorid = '{$data['authorid']}',
							files = '{$data['files']}',
                            filename = '{$data['filename']}',
                            filesize = '{$data['filesize']}',
                            realname = '{$data['realname']}',
                            
                            icon = '{$data['icon']}',
                            file_icon = '{$data['file_icon']}',
                            
                            created_date = '{$data['created_date']}',
							n_status = {$data['n_status']}
						WHERE
							id = '{$data['id']}'";

            //pr($query);exit;
		}
		$result = $this->query($query);
		
		return $result;
	}
    
    function get_repo($category, $id)
	{
		if($id){
			$whereid = "AND otherid = '".$id."'";
		}
		else{
			$whereid = '';
		}
		$query = "SELECT * FROM {$this->prefix}_digirepo WHERE n_status != '2' AND category = '".$category."' ".$whereid." ORDER BY created_date DESC";
		
		$result = $this->fetch($query,1);
        
 		foreach ($result as $key => $value) {
 			$query = "SELECT username FROM admin_member WHERE id={$value['authorid']} LIMIT 1";
 
 			$username = $this->fetch($query,0);
 
 			$result[$key]['username'] = $username['username'];
 		}
		
		return $result;
	}
    
    function get_repo_id($id)
	{
		$query = "SELECT * FROM {$this->prefix}_digirepo WHERE id= {$id}";
		
		$result = $this->fetch($query,0);

		//if($result['posted_date'] != '') $result['posted_date'] = dateFormat($result['posted_date'],'dd-mm-yyyy');
		($result['n_status'] == 1) ? $result['n_status'] = 'checked' : $result['n_status'] = '';

		return $result;
	}
    
    function file_del($id)
	{
		//pr($id);
		foreach ($id as $key => $value) {
			
			$query = "DELETE FROM {$this->prefix}_digirepo WHERE id = '{$value}'";
		
			$result = $this->query($query);
		
		}

		return true;
	}

	function get_links($categoryid=null,$type=1)
	{
		$query = "SELECT * FROM {$this->prefix}_news_content WHERE n_status = '1' AND categoryid = '{$categoryid}' OR n_status = '0' AND categoryid = '{$categoryid}' ORDER BY created_date DESC";
		
		$result = $this->fetch($query,1);

		foreach ($result as $key => $value) {
			$query = "SELECT username FROM admin_member WHERE id={$value['authorid']} LIMIT 1";

			$username = $this->fetch($query,0);

			$result[$key]['username'] = $username['username'];
		}
		
		return $result;
	}

	function get_link_id($data)
	{
		$query = "SELECT * FROM {$this->prefix}_news_content WHERE id= {$data} LIMIT 1";
		
		$result = $this->fetch($query,0);

		//if($result['posted_date'] != '') $result['posted_date'] = dateFormat($result['posted_date'],'dd-mm-yyyy');
		($result['n_status'] == 1) ? $result['n_status'] = 'checked' : $result['n_status'] = '';

		return $result;
	}

	function link_del($id)
	{
		//pr($id);
		foreach ($id as $key => $value) {
			
			$query = "DELETE FROM {$this->prefix}_news_content WHERE id = '{$value}'";
		
			$result = $this->query($query);
		
		}

		return true;		
	}

	function get_events()
	{
		$query = "SELECT * FROM {$this->prefix}_digirepo_events WHERE n_status != '2' ORDER BY created_date DESC";
		
		$result = $this->fetch($query,1);

		foreach ($result as $key => $value) {
			$query = "SELECT username FROM admin_member WHERE id={$value['authorid']} LIMIT 1";

			$username = $this->fetch($query,0);

			$result[$key]['username'] = $username['username'];
		}
		
		return $result;
	}

	function get_event_id($id)
	{
		$query = "SELECT * FROM {$this->prefix}_digirepo_events WHERE id= {$id}";
		
		$result = $this->fetch($query,0);

		//if($result['posted_date'] != '') $result['posted_date'] = dateFormat($result['posted_date'],'dd-mm-yyyy');
		($result['n_status'] == 1) ? $result['n_status'] = 'checked' : $result['n_status'] = '';

		return $result;
	}

	function eventInp($table,$data)
	{
        
		$data['title'] = addslashes($data['title']);
        $data['place'] = addslashes($data['place']);
        $data['start_date'] = date("Y-m-d H:i:s",strtotime($data['start_date']));
        $data['end_date'] = date("Y-m-d H:i:s",strtotime($data['end_date']));
        $data['postdate'] = date("Y-m-d H:i:s",strtotime($data['postdate']));

		if($data['action'] == 'insert'){
			
			$query = "INSERT INTO  
						{$this->prefix}_{$table} (
                            title, place, authorid,
                            start_date, end_date, created_date, 
                            n_status
                        )
					VALUES
						('".$data['title']."','".$data['place']."','".$data['authorid']."',
						'".$data['start_date']."','".$data['end_date']."','".$data['postdate']."',
                        '".$data['n_status']."')";
                        //pr($query);exit;

		} else {
			$query = "UPDATE {$this->prefix}_{$table}
						SET 
							title = '{$data['title']}',
							place = '{$data['place']}',
							authorid = '{$data['authorid']}',

							start_date = '{$data['start_date']}',
							end_date = '{$data['end_date']}',
							created_date = '{$data['postdate']}',
							n_status = {$data['n_status']}
						WHERE
							id = '{$data['id']}'";

            //pr($query);exit;
		}
		$result = $this->query($query);
		
		return $result;
	}

	function get_event_content($data)
	{
		$query = "SELECT * FROM {$this->prefix}_digirepo WHERE otherid= {$data}";
		
		$result = $this->fetch($query,0);

		//if($result['posted_date'] != '') $result['posted_date'] = dateFormat($result['posted_date'],'dd-mm-yyyy');
		($result['n_status'] == 1) ? $result['n_status'] = 'checked' : $result['n_status'] = '';

		return $result;
	}

	function file_event_del($id)
	{
		//pr($id);
		foreach ($id as $key => $value) {
			
			//delete file from db
			$query = "DELETE FROM {$this->prefix}_digirepo WHERE otherid = '{$value}'";
			$result = $this->query($query);

			//delete event from db
			$query2 = "DELETE FROM {$this->prefix}_digirepo_events WHERE id = '{$value}'";
			$result2 = $this->query($query2);
		
		}

		return true;
	}
}
?>