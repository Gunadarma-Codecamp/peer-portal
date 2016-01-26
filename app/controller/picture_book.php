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




		// return $this->loadView('picture_book/poster');
		$html =  $this->loadView('picture_book/poster');
		mpdf($html,'A4');
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


    function tbhPoster()
    {
    	$this->models->tbhPoster();
    }

	function tbhPoster2()
	{
	    
	    	$arrayImg = $_POST['idImg'];
	    	$getid = explode('/', key($_GET));
	    	if(count($arrayImg)>10) {
	    		echo "Jumlah Specimen yang dapat dipilih maksimum 10 buah";
	    		return $this->loadView('browse/dataIndiv');
	    	}
	    	
	    	// pr($arrayImg);
	    	if($_POST["simpan_caption"]){
		    	$arrayImg = $_POST['idImg'];
		    	// pr($arrayImg);
		    	$this->models->tbhCaptionPoster($arrayImg);
		    	return $this->loadView('browse/dataIndiv');
	    	}
	    	else{    	
		    	$getData = $this->models->tbhPoster($arrayImg);
		    	$this->view->assign('dataku', $getData);
		    	$html = $this->loadView('picture_book/poster');
		    	ob_clean();
		    	ob_end_clean();
				mpdf($html,'A4');
		}
		
	}

	function tbhPicture()
	{
	    if($_POST["pilih_lagi"]) {
	    	$arrayImg = $_POST['idImg'];
	    	$this->models->tbhDataPic($arrayImg);
	    	return $this->loadView('browse/dataIndiv');
	    		
	    }
	    else if($_POST["simpan_caption"]){
	    	$arrayImg = $_POST['idImg'];
	    	// pr($arrayImg);
	    	$this->models->tbhCaptionPB($arrayImg);
	    	return $this->loadView('browse/dataIndiv');
	    }
	    else{
	  //   	$arrayImg = $_POST['idImg'];
			$getData = $this->models->tbhPicture($arrayImg);
	    	$this->view->assign('dataku', $getData);
	    	$html = $this->loadView('picture_book/content');
			mpdf($html,'A5');

			// pr($getData);
	    }
}

}

?>
