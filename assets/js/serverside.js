
/* server side datatables */

	function dTableParam(idTable, urlApi, total)
    {

        
        if (idTable) idTable = idTable;
        if (urlApi) urlApi = urlApi;
        //if (numCol) numCol = true;
        
        // var total = 9;
        var data ="";
        var hasil ;
        setTimeout(function(){ 

            for (i = 0; i<=total; i++){
                data = data+'{"bSortable": true},';
                // console.log(data);
            }
            var i;
            $('#dataTaxon').dataTable({

                "bProcessing": true,
                "bServerSide": true,
                "sAjaxSource": appdomain+"services/"+urlApi

            });
            
        }, 500);

    }

    function setParamdataTables(controller)
    {
    	var param = controller+"/handleRequest/?page=1";
	    dTableParam("dataTaxon", param, 10);
    }
	