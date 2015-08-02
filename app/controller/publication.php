<?php

class publication extends Controller {
	
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
	
	function index(){
    	$where = "category = '3' AND n_status = '1'";
		$data = $this->models->getData(TRUE,'*','floraINA_digirepo',$where);
		//pr($data);
		if($data){
			foreach ($data as $key => $value) {
				$data[$key]['created_date'] = dateFormat($value['created_date'],'article');
				$data[$key]['content'] = html_entity_decode($value['content'],ENT_QUOTES, 'UTF-8');
			}
			
			$this->view->assign('data',$data);
		}

		$this->view->assign('title','Publication');
        return $this->loadView('publication/all');
    }

    function detail(){
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
}

?>
