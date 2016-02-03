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
		global $CONFIG;
        //Get all data taxon
        $indivImages = jsDecode($CONFIG['default']['peerkalbar_url'].'services/taxon/dataIndivLimit');
        if(empty($indivImages)){
            $this->view->assign('noData','empty');
        }
        else{
            $this->view->assign('noData','data existed');
        }
        $this->view->assign('dataImage',$indivImages->result);
        //pr($indivImages->result);

    	return $this->loadView('home');
    }
}

?>
