<?php

class picture_book extends Controller {
	
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

	function index()
	{
		
    }
	
	function template_cover()
	{
		return $this->loadView('picture_book/cover');
    }

    function template_content(){
		return $this->loadView('picture_book/content');
    }

    function template_poster(){
		return $this->loadView('picture_book/poster');
    }

    function list_picture(){
    	return $this->loadView('picture_book/list_picture');
    }
}

?>
