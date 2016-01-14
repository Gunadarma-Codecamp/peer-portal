<?php

class api extends Controller {
	
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
        $this->models = $this->loadModel('contentHelper');
	}
	
	function index(){
		global $CONFIG;
        //Get all data taxon
        print $CONFIG['default']['peerkalbar_url'].'services/taxon/dataIndivLimit';
        exit;
    }

    function auth()
    {

    	$username = _p('email');
    	$password = _p('password');
    	$fromRepo = _p('repo');

    	echo 'ada';
    	switch ($fromRepo) {
    		case 'kalbar':
    			# code...
    			break;
    		
    		default:
    			# code...
    			break;
    	}

    	
    }

    function mpdf()
    {
    	$html = "<h1>testing</h1>";
    	mpdf($html);
    }
}

?>
