
/* server side datatables */

	function dTableParam(idTable, urlApi, total)
    {

        if (idTable) idTable = idTable;
        if (urlApi) urlApi = urlApi;
        
        var data ="";
        var hasil ;
        setTimeout(function(){ 

            for (i = 0; i<=total; i++){
                data = data+'{"bSortable": true},';
                // console.log(data);
            }
            var i;
            $('#'+idTable).dataTable({

                "bProcessing": true,
                "bServerSide": true,
                "sAjaxSource": appdomain+"services/"+urlApi,
                "fnServerData": function ( sSource, aoData, fnCallback, oSettings ) {
			      oSettings.jqXHR = $.ajax( {
			        "dataType": 'json',
			        "type": "GET",
			        "url": sSource,
			        "data": aoData,
			        "success": fnCallback,
			        "contentType": "application/json; charset=utf-8"
			      } );
			    }

            });
            
        }, 1000);

    }

    function setParamdataTables(controller, paramFunc, limitData, idTable)
    {
    	var param = controller+"/handleRequest/?function="+paramFunc;
	    dTableParam(idTable, param, limitData);
    }
	