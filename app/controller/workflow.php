<?php

class workflow extends Controller {
	
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
	
	function batchUpload(){
		$where = "categoryid = '3' AND articleType = '1' AND n_status = '1'";
		$data = $this->models->getData(TRUE,'*','floraINA_news_content',$where);
		//pr($data);
		if($data){
			foreach ($data as $key => $value) {
				$data[$key]['content'] = html_entity_decode($value['content'],ENT_QUOTES, 'UTF-8');
			}
			
			$this->view->assign('data',$data);
		}

    	return $this->loadView('workflow');
    }

    function oneByOne(){
		$where = "categoryid = '3' AND articleType = '2' AND n_status = '1'";
		$data = $this->models->getData(TRUE,'*','floraINA_news_content',$where);
		//pr($data);
		if($data){
			foreach ($data as $key => $value) {
				$data[$key]['content'] = html_entity_decode($value['content'],ENT_QUOTES, 'UTF-8');
			}
			
			$this->view->assign('data',$data);
		}

    	return $this->loadView('workflow');
    }
}

?>
