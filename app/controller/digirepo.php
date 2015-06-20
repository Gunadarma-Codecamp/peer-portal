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
				$data[$key]['content'] = html_entity_decode($value['content'],ENT_QUOTES, 'UTF-8');
			}
			
			$this->view->assign('data',$data);
		}

        return $this->loadView('digirepo/reference');
    }
    
    function referencesDetail(){
    	$id = $_GET['id'];
    	$where = "category = '1' AND id = '".$id."' AND n_status = '1'";
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
        return $this->loadView('digirepo/workshop');
    }
    
    function workshopDetail(){
        return $this->loadView('digirepo/workshop_detail');
    }
}

?>
