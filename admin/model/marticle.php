<?php
class marticle extends Database {
	
	var $prefix = "floraINA";
	function article_inp($data)
	{
		
		$date = date('Y-m-d H:i:s');
		$datetime = array();
        
		if(!empty($data['postdate'])){
            $data['postdate'] = date("Y-m-d H:i:s",strtotime($data['postdate']));
		}else{
            $data['postdate'] = $date;
		}
        if(!empty($data['expired_date'])) $data['expired_date'] = date("Y-m-d H:i:s",strtotime($data['expired_date']));
        else $data['expired_date'] = '0000-00-00';
        
        $data['title'] = mysql_escape_string($data['title']);
        $data['brief'] = mysql_escape_string($data['brief']);
        $data['content'] = mysql_escape_string($data['content']);

		if($data['action'] == 'insert'){
			
			$query = "INSERT INTO  
						{$this->prefix}_news_content (title,brief,content,image,file,categoryid,articletype,
												created_date,posted_date,expired_date,authorid,n_status)
					VALUES
						('".$data['title']."','".$data['brief']."','".$data['content']."','".$data['image']."'
                        ,'".$data['image_url']."','".$data['categoryid']."','".$data['articletype']."','".$date."'
                        ,'".$data['postdate']."','".$data['expired_date']."','".$data['authorid']."','".$data['n_status']."')";
                        //pr($query);exit;

		} else {
            if($data['categoryid']=='1' && $data['articletype']=='2' || $data['categoryid']=='8') $date = $data['postdate'];
			$query = "UPDATE {$this->prefix}_news_content
						SET 
							title = '{$data['title']}',
							brief = '{$data['brief']}',
							content = '{$data['content']}',
							image = '{$data['image']}',
							file = '{$data['image_url']}',
                            articletype = '{$data['articletype']}',
							posted_date = '{$data['postdate']}',
                            expired_date = '{$data['expired_date']}',
							authorid = '{$data['authorid']}',
							n_status = {$data['n_status']}
						WHERE
							id = '{$data['id']}'";
		}
// pr($query);
		$result = $this->query($query);
		
		return $result;
	}
	
	function get_article($categoryid=null,$type=1)
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
    
    function get_article_filter($categoryid=null,$articletype=null,$type=1)
	{
		$query = "SELECT * FROM {$this->prefix}_news_content WHERE n_status = '1' AND categoryid = '{$categoryid}' AND articleType = '{$articletype}' OR n_status = '0' AND categoryid = '{$categoryid}' AND articleType = '{$articletype}' ORDER BY created_date DESC";
		
		$result = $this->fetch($query,0);
        
        if($result){
    		$query = "SELECT username FROM admin_member WHERE id={$result['authorid']} LIMIT 1";
    
    		$username = $this->fetch($query,0);
    
    		$result['username'] = $username['username'];
		}
		return $result;
	}
	
	function getData($categoryid=null,$articletype=null,$type=1, $id=false)
	{

		$filter = "";
		if ($id) $filter .= " AND id = {$id}";
		$query = "SELECT * FROM {$this->prefix}_news_content WHERE n_status = '1' AND categoryid = '{$categoryid}' AND articleType = '{$articletype}' OR n_status = '0' AND categoryid = '{$categoryid}' AND articleType = '{$articletype}' {$filter} ORDER BY created_date DESC";
		
		$result = $this->fetch($query,1);
        
        // pr($result);
        if($result){

        	foreach ($result as $key => $value) {

        		$query = "SELECT username FROM admin_member WHERE id={$value['authorid']} LIMIT 1";
    
	    		$username = $this->fetch($query,0);
	    
	    		$result[$key]['username'] = $username['username'];
        	}
    		
		}
		return $result;
	}

	function get_article_slide()
	{
		$query = "SELECT nc.*, cc.category, ct.type FROM cdc_news_content nc LEFT JOIN cdc_news_content_category cc 
					ON nc.categoryid = cc.id LEFT JOIN cdc_news_content_type ct ON nc.articletype = ct.id 
					WHERE nc.n_status < 2 AND nc.articletype > 0  ORDER BY nc.createdate DESC";
		
		$result = $this->fetch($query,1);
		
		return $result;
	}
	
	function article_del($id, $action=null)
	{
		global $CONFIG;
		foreach ($id as $key => $value) {
			if($action == 'delete'){
				$data = "SELECT `image`,`categoryid` FROM {$this->prefix}_news_content WHERE id = '{$value}'";
				$getData = $this->fetch($data,1);
				if(!empty($getData['0']['image'])){
					if($getData['0']['categoryid'] == '1'){$path = 'news';}
					
					//Delete Image
        			unlink($CONFIG['admin']['upload_path'].$path.'/'.$getData['0']['image']);
					//echo $CONFIG['admin']['upload_path'].'/public_assets/'.$path.'/'.$getData['0']['image'];
				}
				//pr($getData);exit;
                $query = "DELETE FROM {$this->prefix}_news_content WHERE id = '{$value}'";
			}else{
                $query = "UPDATE {$this->prefix}_news_content SET n_status = '2' WHERE id = '{$value}'";
            }
			$result = $this->query($query);
		
		}

		return true;
		
	}
	
	function get_article_id($data)
	{
		$query = "SELECT * FROM {$this->prefix}_news_content WHERE id= {$data} LIMIT 1";
		
		$result = $this->fetch($query,0);

		//if($result['posted_date'] != '') $result['posted_date'] = dateFormat($result['posted_date'],'dd-mm-yyyy');
		($result['n_status'] == 1) ? $result['n_status'] = 'checked' : $result['n_status'] = '';

		return $result;
	}

}
?>