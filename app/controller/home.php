<?php

class home extends Controller {
	
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
		$where = "n_status = '1'";
		$data = $this->models->getData(TRUE,'*','floraINA_banner',$where);
		//pr($data);
		$this->view->assign('banner',$data);
		$this->view->assign('banner1','AAA');
    	return $this->loadView('home');
    }
}

?>
