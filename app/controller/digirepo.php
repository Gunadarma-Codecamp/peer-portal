<?php

class digirepo extends Controller {
	
	var $models = FALSE;
	var $view;

	
	function __construct()
	{
		global $basedomain;
		$this->loadmodule();
		$this->view = $this->setSmarty();
		$this->view->assign('basedomain',$basedomain);
    }
	
	function loadmodule()
	{
        $this->models = $this->loadModel('contentHelper');
	}
	
	function index(){}
    
    function reference(){
    	$where = "category = '1' AND n_status = '1'";
		$data = $this->models->getData(TRUE,'*','floraINA_digirepo',$where);
		//pr($data);
		if($data){
			foreach ($data as $key => $value) {
				$data[$key]['created_date'] = dateFormat($value['created_date'],'article');
				$data[$key]['content'] = html_entity_decode($value['content'],ENT_QUOTES, 'UTF-8');
			}
			
			$this->view->assign('data',$data);
		}

		$this->view->assign('title','Reference');
        return $this->loadView('digirepo/reference');
    }
    
    function repositoryDetail(){
    	$id = $_GET['id'];
    	$where = "id = '".$id."' AND n_status = '1'";
		$data = $this->models->getData(TRUE,'*','floraINA_digirepo',$where);
		//pr($data);
		if($data){
			foreach ($data as $key => $value) {
				$data[$key]['content'] = html_entity_decode($value['content'],ENT_QUOTES, 'UTF-8');
				$data[$key]['filesize'] = formatSizeUnits($value['filesize']);
			}
			
			$this->view->assign('data',$data);
		}
		
        return $this->loadView('digirepo/reference_detail');
    }
    
    function workshop(){
    	$where = "n_status = '1'";
		$data = $this->models->getData(TRUE,'*','floraINA_digirepo_events',$where);
		//pr($data);
		if($data){
			foreach ($data as $key => $value) {
				$data[$key]['start_date'] = dateFormat($value['start_date'],'article');
				$data[$key]['end_date'] = dateFormat($value['end_date'],'article');
				$data[$key]['created_date'] = dateFormat($value['created_date'],'article');
				$data[$key]['content'] = html_entity_decode($value['content'],ENT_QUOTES, 'UTF-8');
			}
			
			$this->view->assign('data',$data);
		}

        return $this->loadView('digirepo/workshop');
    }
    
    function workshopDetail(){
    	$id = $_GET['id'];
    	$where = "category = '2' AND otherid = '".$id."' AND n_status = '1'";
		$data = $this->models->getData(TRUE,'*','floraINA_digirepo',$where);
		//pr($data);
		if($data){
			foreach ($data as $key => $value) {
				$data[$key]['created_date'] = dateFormat($value['created_date'],'article');
				$data[$key]['content'] = html_entity_decode($value['content'],ENT_QUOTES, 'UTF-8');
			}
			
			$this->view->assign('data',$data);
		}

		$this->view->assign('title','Workshop Material');
        return $this->loadView('digirepo/reference');
        //return $this->loadView('digirepo/workshop_detail');
    }
}

?>
