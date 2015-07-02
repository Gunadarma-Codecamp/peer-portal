<?php

class browse extends Controller {
	
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
	
	function dataTaxon(){
    	global $CONFIG;
        $listAll = array();

        //Get all data taxon
        $taxon = jsDecode($CONFIG['default']['app_url'].'services/taxon/getDataTaxon');
        
        for($i=0;$i<count($taxon->result);$i++){
            //Get taxon's 'images
            $img = jsDecode($CONFIG['default']['app_url'].'services/taxon/getImgTaxon/?id='.$taxon->result[$i]->id);
            $listAll[]= array('taxon'=>$taxon->result[$i],'img'=>$img);
        }
        if(empty($listAll)){
            $this->view->assign('noData','empty');
        }
        else{
            $this->view->assign('noData','data existed');
        }
        $this->view->assign('data',$listAll);
        return $this->loadView('browse/dataTaxon');
    }

    function dataLocation(){
        global $CONFIG;
        //Get all data taxon
        $location = jsDecode($CONFIG['default']['app_url'].'services/taxon/getDataLocation');
        if(empty($location)){
            $this->view->assign('noData','empty');
        }
        else{
            $this->view->assign('noData','data existed');
        }
        $this->view->assign('data',$location->result);
        return $this->loadView('browse/dataLocation');
    }

    function dataPerson(){
        global $CONFIG;
        //Get all data taxon
        $person = jsDecode($CONFIG['default']['app_url'].'services/taxon/getDataPerson');
        if(empty($person)){
            $this->view->assign('noData','empty');
        }
        else{
            $this->view->assign('noData','data existed');
        }
        $this->view->assign('data',$person->result);
        return $this->loadView('browse/dataPerson');
    }
    
    function indiv(){
        global $CONFIG;
        $id = $_GET['id'];
        $action = $_GET['action'];
        
        if($action=='indivTaxon'){
            //get taxon name
            $title = jsDecode($CONFIG['default']['app_url'].'services/taxon/getTitle/?id='.$id);
            //get data indiv
            $getIndiv = jsDecode($CONFIG['default']['app_url'].'services/taxon/getIndivTaxon/?id='.$id);
            //pr($getIndiv);exit;
        }
        if($action=='indivLocn'){
            $title='';
            //get data indiv
            $getIndiv = jsDecode($CONFIG['default']['app_url'].'services/taxon/getIndivLocation/?id='.$id);
        }
        if($action=='indivPerson'){
            $title='';
            //get data indiv
            $getIndiv = jsDecode($CONFIG['default']['app_url'].'services/taxon/getIndivPerson/?id='.$id);
        }
        $listAll = array();
        for($i=0;$i<count($getIndiv->result);$i++){
            //Get indiv's 'images
            $img = jsDecode($CONFIG['default']['app_url'].'services/taxon/getImgIndiv/?id='.$getIndiv->result[$i]->indivID);
            $listAll[]= array('indiv'=>$getIndiv->result[$i],'img'=>$img);
        }
        
        if(empty($listAll)){
            $this->view->assign('noData','empty');
        }
        else{
            $this->view->assign('noData','data existed');
        }
        $this->view->assign('title',$title);
        $this->view->assign('data',$listAll);

    	return $this->loadView('browse/indiv');
    }
    
    function indivDetail(){
        global $CONFIG;
        $indivID = $_GET['id'];
        //get whole data indiv detail
        $indivDetail = jsDecode($CONFIG['default']['app_url'].'services/taxon/detailIndiv/?id='.$indivID);
        //get determinant from selected indiv
        $indivDeterminant = jsDecode($CONFIG['default']['app_url'].'services/taxon/dataDetIndiv/?id='.$indivID);
        //get all images from indiv selected
        $indivImages = jsDecode($CONFIG['default']['app_url'].'services/taxon/getAllImgIndiv/?id='.$indivID);
        //get all observations from indiv selected
        $indivObs = jsDecode($CONFIG['default']['app_url'].'services/taxon/dataObsIndiv/?id='.$indivID);
        
        /**
        //get list enum habit
        $habit_enum = $this->insertonebyone->get_enum('obs','habit');
        $this->view->assign('habit_enum', $habit_enum);
        
        //get list person
        $listPerson = $this->insertonebyone->list_person();
        $this->view->assign('person', $listPerson);
        
        //get list taxon
        $listTaxon = $this->insertonebyone->list_taxon();
        $this->view->assign('taxon', $listTaxon);
        
        //get list enum confid
        $confid_enum = $this->insertonebyone->get_enum('det','confid');
        $this->view->assign('confid_enum', $confid_enum);
        
        **/
        if(empty($indivDetail)){
            $this->view->assign('noData','empty');
        }
        else{
            $this->view->assign('noData','data existed');
        }
        
        $this->view->assign('indiv',$indivDetail);
        $this->view->assign('indivID',$indivID);
        $this->view->assign('det',$indivDeterminant);
        $this->view->assign('img',$indivImages);
        $this->view->assign('obs',$indivObs);
        $ses_user = $this->isUserOnline();
        $this->view->assign('user', $ses_user); 
    	return $this->loadView('browse/indivDetail');
    }
}

?>
