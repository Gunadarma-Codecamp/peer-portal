<?php
// defined ('MICRODATA') or exit ( 'Forbidden Access' );

class site extends Controller {
	
	var $models = FALSE;
	
	public function __construct()
	{
		parent::__construct();
		$this->loadmodule();
		$this->view = $this->setSmarty();
		$sessionAdmin = new Session;
		$this->admin = $sessionAdmin->get_session();
		// $this->validatePage();
	}
	public function loadmodule()
	{
		$this->models = $this->loadModel('msite');
	}
	
	public function content(){
		$this->view->assign('active','active');

		if(isset($_GET['cat']) AND isset($_GET['type']))
		{
			$data = $this->models->get_article_site($_GET['cat'], $_GET['type']);
            if(!empty($data['created_date']) || !empty($data['posted_date']) || !empty($data['expired_date'])){
                $data['created_date'] = dateFormat($data['created_date'],'dd-mm-yyyy');
                $data['posted_date'] = dateFormat($data['posted_date'],'dd-mm-yyyy');
                $data['expired_date'] = dateFormat($data['expired_date'],'dd-mm-yyyy');
            }
            
			$this->view->assign('data',$data);
		} 

		$this->view->assign('admin',$this->admin['admin']);

		return $this->loadView('site/inputdata');

	}
    
	public function articleinp(){
		global $CONFIG;
		
		if(isset($_POST['n_status'])){
			if($_POST['n_status']=='on') $_POST['n_status']=1;
		} else {
			$_POST['n_status']=0;
		}
        
		if(isset($_POST['articletype'])){
			if($_POST['articletype']=='on') {
				if($_POST['articleid_old']!=0){
					$_POST['articletype'] = $_POST['articleid_old'];
				} else {
					$_POST['articletype']=1; 
				}
			}
		} else {
			$_POST['articletype']=0;
		}
 		
			if(isset($_POST)){
                // validasi value yang masuk
               $x = form_validation($_POST);
			   try
			   {
			   		if(isset($x) && count($x) != 0)
			   		{
						//update or insert
						$x['action'] = 'insert';
						if($x['id'] != ''){
							$x['action'] = 'update';
						}
                        
                        //pr($x);exit;
						//upload file
						if(!empty($_FILES)){
							if($_FILES['file_image']['name'] != ''){
							
								if($x['categoryid'] == '9'){
									$path_upload = 'gallery/images';
								}else{
									$path_upload = 'news';
								}
							
                                if($x['action'] == 'update') deleteFile($x['image'],$path_upload);
								//if($x['action'] == 'update') deleteFile($x['image']);
								$image = uploadFile('file_image',$path_upload,'image');
								
								$x['image_url'] = $CONFIG['admin']['app_url'].$image['folder_name'].$image['full_name'];
								$x['image'] = $image['full_name'];
							}
						}
						$data = $this->models->article_inp($x);
			   		}
				   	
			   }catch (Exception $e){}
            
            $redirect = $CONFIG['admin']['base_url'].'home';
            if(isset($x['categoryid'])){
                if($x['categoryid'] == '1'){
                    $redirect = $CONFIG['admin']['base_url'].'home';
                }elseif($x['categoryid']=='2'){
                    $redirect = $CONFIG['admin']['base_url'].'site/content/?cat=2';
                }elseif($x['categoryid']=='3'){
                    $redirect = $CONFIG['admin']['base_url'].'site/content/?cat=3&&type='.$_POST["articletype"];
                }elseif($x['categoryid']=='4'){
                    if($x['articletype']=='1'){
                        $redirect = $CONFIG['admin']['base_url'].'about/profile';
                    }elseif($x['articletype']=='2'){
                        $redirect = $CONFIG['admin']['base_url'].'about/struktur';
                    }
                }elseif($x['categoryid']=='9'){
					if($x['articletype']=='1'){
                        $redirect = $CONFIG['admin']['base_url'].'gallery';
                    }elseif($x['articletype']=='2'){
                        $redirect = $CONFIG['admin']['base_url'].'gallery';
                    }
				}elseif($x['categoryid']=='8'){
					$redirect = $CONFIG['admin']['base_url'].'direktori/listCategory';
				}
            }
            
            echo "<script>alert('Data berhasil di simpan');window.location.href='".$redirect."'</script>";
            }
	}

}

?>
