<?php
class mgallery extends Database {
	
	var $prefix = "floraINA";
	function gallery_inp($data)
	{
		
		$date = date('Y-m-d H:i:s');
		$datetime = array();
        
		if(!empty($data['postdate'])) $data['postdate'] = date("Y-m-d H:i:s",strtotime($data['postdate']));
        if(!empty($data['expired_date'])) $data['expired_date'] = date("Y-m-d H:i:s",strtotime($data['expired_date']));
        
		if($data['action'] == 'insert'){
			
			$query = "INSERT INTO  
						{$this->prefix}_news_content_repo
						(title,brief,content
						,typealbum,gallerytype,files
						,thumbnail,fromwho,otherid
						,userid,created_date,n_status)
					VALUES
						('".$data['title']."','".$data['brief']."','".$data['image']."'
						,'".$data['typealbum']."','".$data['gallerytype']."','".$data['image_url']."'
						,'".$data['thumbnail']."','".$data['fromwho']."','".$data['otherid']."'
						,'".$data['authorid']."','".$date."','".$data['n_status']."')";
                        //pr($query);exit;

		} else {
            if($data['categoryid']=='1' && $data['articletype']=='2') $date = $data['postdate'];
			$query = "UPDATE {$this->prefix}_news_content_repo
						SET 
							title = '{$data['title']}',
							brief = '{$data['brief']}',
							content = '{$data['image']}',
							typealbum = '{$data['typealbum']}',
							gallerytype = '{$data['gallerytype']}',
							files = '{$data['image_url']}',
                            thumbnail = '{$data['thumbnail']}',
                            fromwho = '{$data['fromwho']}',
							otherid = '{$data['otherid']}',
							userid = '{$data['authorid']}',
							created_date = '".$date."',
							n_status = {$data['n_status']}
						WHERE
							id = '{$data['id']}'";
		}
		$result = $this->query($query);
		
		return $result;
	}

	function get_album($id){
        $query = "SELECT * FROM {$this->prefix}_news_content WHERE id = '{$id}'";
		
		$result = $this->fetch($query,0);
        return $result;
    }
	
	function get_images($albumid=null,$type=1)
	{
		$query = "SELECT * FROM {$this->prefix}_news_content_repo WHERE n_status != '2' AND otherid = '{$albumid}' AND typealbum = '2' ORDER BY created_date DESC";
		
		$result = $this->fetch($query,1);

		foreach ($result as $key => $value) {
			$query = "SELECT username FROM admin_member WHERE id={$value['userid']} LIMIT 1";

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
	
	function get_article_slide()
	{
		$query = "SELECT nc.*, cc.category, ct.type FROM cdc_news_content nc LEFT JOIN cdc_news_content_category cc 
					ON nc.categoryid = cc.id LEFT JOIN cdc_news_content_type ct ON nc.articletype = ct.id 
					WHERE nc.n_status < 2 AND nc.articletype > 0  ORDER BY nc.createdate DESC";
		
		$result = $this->fetch($query,1);
		
		return $result;
	}
	
	function get_article_trash($categoryid=null)
	{
		$query = "SELECT * FROM {$this->prefix}_news_content WHERE n_status = '2' AND categoryid = '{$categoryid}' ORDER BY created_date DESC";
		
		$result = $this->fetch($query,1);

		foreach ($result as $key => $value) {
			$query = "SELECT username FROM admin_member WHERE id={$value['authorid']} LIMIT 1";

			$username = $this->fetch($query,0);

			$result[$key]['username'] = $username['username'];
		}
		
		return $result;
	}
	function article_del($id)
	{
		foreach ($id as $key => $value) {
			
			$query = "UPDATE {$this->prefix}_news_content SET n_status = '2' WHERE id = '{$value}'";
		
			$result = $this->query($query);
		
		}

		return true;
		
	}

	function get_image_otherid($otherid)
	{
		$query = "SELECT * FROM {$this->prefix}_news_content_repo WHERE otherid= {$otherid}";
		
		$result = $this->fetch($query,1);

		//if($result['posted_date'] != '') $result['posted_date'] = dateFormat($result['posted_date'],'dd-mm-yyyy');
		($result['n_status'] == 1) ? $result['n_status'] = 'checked' : $result['n_status'] = '';

		return $result;
	}

	function gallery_del($id)
	{
		global $CONFIG;
		foreach ($id as $key => $value) {
			//Delete db images
			$queryImg = "DELETE FROM {$this->prefix}_news_content_repo WHERE otherid = '{$value}'";
			$resultImg = $this->query($queryImg);

			//Delete album
			$data = "SELECT `image`,`categoryid` FROM {$this->prefix}_news_content WHERE id = '{$value}'";
				$getData = $this->fetch($data,0);
				//print_r($getData);
				if(!empty($getData['image'])){
					if($getData['categoryid'] == '9'){$path = 'gallery/images';}
					
					//Delete Image
        			unlink($CONFIG['admin']['upload_path'].$path.'/'.$getData['image']);
					//echo $CONFIG['admin']['upload_path'].'/public_assets/'.$path.'/'.$getData['0']['image'];
				}
			$queryAlbum = "DELETE FROM {$this->prefix}_news_content WHERE id = '{$value}'";
			$resultAlbum = $this->query($queryAlbum);
		
		}

		return true;
		
	}

	function get_image_id($id)
	{
		$query = "SELECT * FROM {$this->prefix}_news_content_repo WHERE id= {$id}";
		
		$result = $this->fetch($query,0);

		//if($result['posted_date'] != '') $result['posted_date'] = dateFormat($result['posted_date'],'dd-mm-yyyy');
		($result['n_status'] == 1) ? $result['n_status'] = 'checked' : $result['n_status'] = '';

		return $result;
	}

	function image_del($id)
	{
		//pr($id);
		foreach ($id as $key => $value) {
			
			$query = "DELETE FROM {$this->prefix}_news_content_repo WHERE id = '{$value}'";
		
			$result = $this->query($query);
		
		}

		return true;
		
	}
}
?>