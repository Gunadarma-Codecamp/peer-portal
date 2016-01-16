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
        $this->models = $this->loadModel('browseHelper');
	}

	function index()
	{
		
    }
	
	function template_cover()
	{
		//return $this->loadView('picture_book/cover');
		$html= $this->loadView('picture_book/cover');
		mpdf($html,'A4');
    }

    function template_content(){

		$html = $this->loadView('picture_book/content');
		mpdf($html,'A4-L');
    }	

    function template_poster(){




		return $this->loadView('picture_book/poster');
		// return $this->loadView('picture_bpicture_book/poster');ook/poster');
		// mpdf($html,'A4');
    }

    function list_picture(){

  //   	$data = $this->models->ambildataImg;
		// $this->view->assign('list_picture',$data);
  //   	return $this->loadView('picture_book/list_picture');
    	if ($_POST){
    		pr($_POST);
    	}

    	$getid = explode('/', key($_GET));
    	global $peerkalbar_domain;
    	$getData = json_decode(file_get_contents($peerkalbar_domain . 'services/taxon/getImgTaxon/' . $getid[3]));
    	// pr($getData);

    	$this->view->assign('data', $getData);

    	return $this->loadView('picture_book/list_picture');

    }


}

?>
