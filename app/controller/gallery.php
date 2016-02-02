<?php

class gallery extends Controller {
	
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
		$where = "categoryid = '9' AND n_status = '1'";
		$data = $this->models->getData(TRUE,'*','floraINA_news_content',$where);
		//pr($data);

		if($data){
			foreach ($data as $key => $value) {
				//get Count
				$whereId = "otherid = '".$data[$key]['id']."'";
				$repo = $this->models->getData(TRUE,'*','floraINA_news_content_repo',$whereId);
				$data[$key]['countPhoto'] = count($repo);
			}

			$this->view->assign('data',$data);
		}
		
    	return $this->loadView('gallery/index');
    }
    
    function view(){
    	$id = $_GET['id'];

    	$where = "otherid = ".$id;
		$data = $this->models->getData(TRUE,'*','floraINA_news_content_repo',$where);

		if($data){
			foreach ($data as $key => $value) {
				//get Count
				$whereId = "id = '".$id."'";
				$title = $this->models->getData(TRUE,'title','floraINA_news_content',$whereId);
				$title = $title['0']['title'];
			}

			$this->view->assign('data',$data);
			$this->view->assign('title',$title);
		}

        return $this->loadView('gallery/image_view');
    }
}

?>
