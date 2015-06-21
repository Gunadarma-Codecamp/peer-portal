<?php
// defined ('TATARUANG') or exit ( 'Forbidden Access' );

class digirepo extends Controller {
	
	var $models = FALSE;
	
	public function __construct()
	{
		parent::__construct();

		global $app_domain;
		$this->loadmodule();
		$this->view = $this->setSmarty();
		$sessionAdmin = new Session;
		$this->admin = $sessionAdmin->get_session();
		$this->view->assign('app_domain',$app_domain);
	}
	public function loadmodule()
	{
        $this->mdigirepo = $this->loadModel('mdigirepo');
	}
	
	public function index(){
		$data = $this->mdigirepo->get_repo();
        //pr($data);exit;

		if ($data){
			foreach ($data as $key => $val){

				$data[$key]['created_date'] = dateFormat($val['created_date'],'article');

				if($val['n_status'] == '1') {
					$data[$key]['n_status'] = 'Publish';
					$data[$key]['status_color'] = 'green';
				} else {
					$data[$key]['n_status'] = 'Unpublish';
					$data[$key]['status_color'] = 'red'; 
				}
			}
		}
		
		// pr($data);exit;
		$this->view->assign('data',$data);
        return $this->loadView('digirepo/repository');
	}
    
    public function addfiles(){
        if(isset($_GET['id']))
		{

			$data = $this->mdigirepo->get_repo_id($_GET['id']);
            
            if($data){
                $data['created_date'] = dateFormat($data['created_date'],'dd-mm-yyyy');
            }
            
			$this->view->assign('data',$data);
		}
        
        $this->view->assign('admin',$this->admin['admin']);
        return $this->loadView('digirepo/inputFile');
    }
    
    public function inpFile(){

		global $CONFIG;
        
        if(isset($_POST['n_status'])){
			if($_POST['n_status']=='on') $_POST['n_status']=1;
		} else {
			$_POST['n_status']=0;
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
                    
					//upload file
                    //pr($_FILES);exit;
					if($_FILES['file_image']['error']==0){
						
						$path_upload = 'digirepo';
						
                        if($x['action'] == 'update') deleteFile($x['filename'],$path_upload);
						$image = uploadFile('file_image',$path_upload);
						$x['files'] = $CONFIG['admin']['app_url'].$image['folder_name'].$image['full_name'];
                        $x['realname'] = $image['real_name'];
						$x['filename'] = $image['full_name'];
						$x['filesize'] = $_FILES['file_image']['size'];
                        
					}
                    
                    if($_FILES['file_icon']['error']==0){
                                
                        $path = 'digirepo';

                        if($x['action'] == 'update') deleteFile($x['icon'],$path.'/icon');
                        
						$icon = uploadFile('file_icon',$path.'/icon','image');
                        
						$x['file_icon'] = $CONFIG['admin']['app_url'].$icon['folder_name'].$icon['full_name'];
						$x['icon'] = $icon['full_name'];
					}
                    //pr($x);exit;
					$data = $this->mdigirepo->repoInp('digirepo',$x);
					
		   		}
			   	
		   }catch (Exception $e){}
        
        $redirect = $CONFIG['admin']['base_url'].'digirepo';
        
        echo "<script>alert('Data successfully saved');window.location.href='".$redirect."'</script>";
        }
	}
    
    function deleteFile(){
        global $CONFIG;
        $pathPDF = 'digirepo';
        $pathIcon = 'digirepo/icon';
        
        foreach($_POST['ids'] as $id){
            $getfile = $this->mdigirepo->get_repo_id($id);
            $delPDF[] = $getfile['filename'];
            $delIcon[] = $getfile['icon'];
        }
        
        foreach ($delPDF as $pdf){
            $deletePDF = deleteFile($pdf,$pathPDF);
        }

        foreach ($delIcon as $icon){
            $deleteIcon = deleteFile($icon,$pathIcon);
        }
        
		$data = $this->mdigirepo->file_del($_POST['ids']);
		
        $redirect = $CONFIG['admin']['base_url'].'digirepo';
        
		echo "<script>alert('Data successfully deleted');window.location.href='".$redirect."'</script>";
    }

    public function links(){
		$this->view->assign('active','active');
		$data = $this->mdigirepo->get_links(4);

		if ($data){
			foreach ($data as $key => $val){

				$data[$key]['created_date'] = dateFormat($val['created_date'],'article');

				$data[$key]['posted_date'] = dateFormat($val['posted_date'],'article');

				if($val['n_status'] == '1') {
					$data[$key]['n_status'] = 'Publish';
					$data[$key]['status_color'] = 'green';
				} else {
					$data[$key]['n_status'] = 'Unpublish';
					$data[$key]['status_color'] = 'red'; 
				}
			}
		}
		
		// pr($data);exit;
		$this->view->assign('data',$data);

		return $this->loadView('digirepo/links');
	}

	public function addlink(){
		
		$this->view->assign('active','active');

		if(isset($_GET['id']))
		{
			$data = $this->mdigirepo->get_link_id($_GET['id']);
            
            if($data){
                $data['created_date'] = dateFormat($data['created_date'],'dd-mm-yyyy');
                $data['posted_date'] = dateFormat($data['posted_date'],'dd-mm-yyyy');
                $data['expired_date'] = dateFormat($data['expired_date'],'dd-mm-yyyy');
            }
            
			$this->view->assign('data',$data);
		} 

		$this->view->assign('admin',$this->admin['admin']);
		return $this->loadView('digirepo/inputlink');
	}

	public function linkdel(){

		global $CONFIG;
        $path = 'digirepo/linksIcon';
        
        foreach($_POST['ids'] as $id){
            $getfile = $this->mdigirepo->get_link_id($id);
            $delImage[] = $getfile['image'];
        }
        
        foreach ($delImage as $image){
            deleteFile($image,$path);
        }              
        
		$data = $this->mdigirepo->link_del($_POST['ids']);
		
        $redirect = $CONFIG['admin']['base_url'].'digirepo/links';
        $message = 'Link has been deleted';
        
		echo "<script>alert('".$message."');window.location.href='".$redirect."'</script>";	
	}

	public function events(){
		$data = $this->mdigirepo->get_events();
        //pr($data);exit;

		if ($data){
			foreach ($data as $key => $val){

				$data[$key]['start_date'] = date('d M Y H:i',strtotime($val['start_date']));
				$data[$key]['end_date'] = date('d M Y H:i',strtotime($val['end_date']));

				if($val['n_status'] == '1') {
					$data[$key]['n_status'] = 'Publish';
					$data[$key]['status_color'] = 'green';
				} else {
					$data[$key]['n_status'] = 'Unpublish';
					$data[$key]['status_color'] = 'red'; 
				}
			}
		}
		
		//pr($data);exit;
		$this->view->assign('data',$data);
        return $this->loadView('digirepo/events');
	}

	public function addevents(){
        if(isset($_GET['id']))
		{

			$data = $this->mdigirepo->get_event_id($_GET['id']);
            
            if($data){
            	$data['start_date'] = date('d-m-Y H:i',strtotime($data['start_date']));
            	$data['end_date'] = date('d-m-Y H:i',strtotime($data['end_date']));
                $data['created_date'] = dateFormat($data['created_date'],'article');
            }
            
			$this->view->assign('data',$data);
		}
        
        $this->view->assign('admin',$this->admin['admin']);
        return $this->loadView('digirepo/inputEvent');
    }

    public function do_addEvent(){
    	global $CONFIG;
    	if(isset($_POST['n_status'])){
			if($_POST['n_status']=='on') $_POST['n_status']=1;
		} else {
			$_POST['n_status']=0;
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
					$data = $this->mdigirepo->eventInp('digirepo_events',$x);
					
					}
			   	
			}catch (Exception $e){}

			$redirect = $CONFIG['admin']['base_url'].'digirepo/events';
        
        	echo "<script>alert('Data successfully saved');window.location.href='".$redirect."'</script>";
        }
    }
    
}

?>
