<?php

class about extends Controller {
	
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
		$where = "categoryid = '2' AND articleType = '0'";
		$data = $this->models->getData(TRUE,'*','floraINA_news_content',$where);
		//pr($data);
		foreach ($data as $key => $value) {
			$data[$key]['content'] = html_entity_decode($value['content'],ENT_QUOTES, 'UTF-8');
		}
		
		$this->view->assign('data',$data);
    	return $this->loadView('about');
    }
}

?>
