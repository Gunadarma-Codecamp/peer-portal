<?php

class news extends Controller {
	
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
		//Get data feature
		$whereFeature = "categoryid = '1' AND highlight = '1' AND n_status = '1'";
		$dataFeature = $this->models->getData(TRUE,'*','floraINA_news_content',$whereFeature);
		$this->view->assign('dataFeature',$dataFeature);

		//Get data news
		$whereNews = "categoryid = '1' AND articleType = '0' AND n_status = '1'";
		$dataNews = $this->models->getDataLimit(TRUE,'*','floraINA_news_content',$whereNews,'3');
		if($dataNews){
			foreach ($dataNews as $key => $value) {
				$dataNews[$key]['posted_date'] = dateFormat($value['posted_date'],'article');
			}
			
			$this->view->assign('dataNews',$dataNews);
		}

		//Get data announcement
		$whereAnnouncement = "categoryid = '1' AND articleType = '1' AND n_status = '1'";
		$dataAnnouncement = $this->models->getDataLimit(TRUE,'*','floraINA_news_content',$whereAnnouncement,'3');
		if($dataAnnouncement){
			foreach ($dataAnnouncement as $key => $value) {
				$dataAnnouncement[$key]['posted_date'] = dateFormat($value['posted_date'],'article');
			}
			
			$this->view->assign('dataAnnouncement',$dataAnnouncement);
		}

    	return $this->loadView('news/index');
    }

    function list_news(){
    	$articleType = $_GET['cat'];
    	//Get all news
		$where = "categoryid = '1' AND articleType = '".$articleType."' AND n_status = '1'";
		$data = $this->models->getData(TRUE,'*','floraINA_news_content',$where);
		if($data){
			foreach ($data as $key => $value) {
				$data[$key]['posted_date'] = dateFormat($value['posted_date'],'article');
			}
			
			$this->view->assign('data',$data);
		}

        return $this->loadView('news/list_news');
    }
    
    function view(){
    	$id = $_GET['id'];
    	//Get all news
		$where = "id = '".$id."' AND n_status = '1'";
		$data = $this->models->getData(TRUE,'*','floraINA_news_content',$where);
		if($data){
			foreach ($data as $key => $value) {
				$data[$key]['content'] = html_entity_decode($value['content'],ENT_QUOTES, 'UTF-8');
				$data[$key]['posted_date'] = dateFormat($value['posted_date'],'article');
			}
			
			$this->view->assign('data',$data);
		}

        return $this->loadView('news/post_view');
    }
}

?>
