<?php

class repo extends Controller {
	
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
        //$this->models = $this->loadModel('frontend');
	}
	
	function index(){
    	//return $this->loadView('about');
    }
    
    function reference(){
        return $this->loadView('repo/reference');
    }
    
    function referencesDetail(){
        return $this->loadView('repo/reference_detail');
    }
    
    function workshop(){
        return $this->loadView('repo/workshop');
    }
    
    function workshopDetail(){
        return $this->loadView('repo/workshop_detail');
    }
}

?>
