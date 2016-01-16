<?php

class poster extends Controller {
	
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

	function buka_poster()
	{
		echo "Terbuka";
		return $this->loadView('picture_book/cover');
	}
	

}

?>
