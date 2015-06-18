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

				if($val['status'] == '1') {
					$data[$key]['status'] = 'Publish';
					$data[$key]['status_color'] = 'green';
				} else {
					$data[$key]['status'] = 'Unpublish';
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
        
        if(isset($_POST['status'])){
			if($_POST['status']=='on') $_POST['status']=1;
		} else {
			$_POST['status']=0;
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
                        
					}
                    
                    if($_FILES['file_icon']['error']==0){
                                
                        $path = 'digirepo';

                        if($x['action'] == 'update') deleteFile($x['icon'],$path.'/icon');
                        
						$icon = uploadFile('file_icon',$path.'/icon','image');
                        
						$x['file_icon'] = $CONFIG['admin']['app_url'].$icon['folder_name'].$icon['full_name'];
						$x['icon'] = $icon['full_name'];
					}
                    //pr($x);exit;
					$data = $this->mdigirepo->repoInp('repo',$x);
					
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
    
}

?>
