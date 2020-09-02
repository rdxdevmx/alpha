<!--Agregar Atributos-->    

<div id="page-wrapper">

	<div class="row">

    	<div class="col-lg-12">

        	<h1 class="page-header">Editar Características</h1>

       	</div>

	</div>

    <?=$m?>    

    <div class="row">

        <div class="col-lg-12">

            <div class="panel panel-default">

                <div class="panel-heading">Editar Características</div>                

                <div class="panel-body">

                    <div class="row"> 

                        <div class="col-xs-12">

                            <div class="table-responsive">

                                <table class="table table-striped">

                                    <thead>
                                    	<tr>
                                    		<th>Valor</th>
                                    		<th>Acciones</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <?php foreach($results as $row): ?>

                                            <tr id='atributo-<?=$row->id_atributo?>'>

                                                <td><?=$row->atributo?></td>

                                                <td class='center' id="acciones">

                                                   <a title="Editar atributos" href="javascript:void(0);" class="col-lg-2 center"  onclick='editarAtributo(<?=$row->id_atributo?>,"<?=$row->atributo?>")'>

                                                        <i class="fa fa-pencil-square-o fa-2x"></i>

                                                    </a>

                                                   <a title="Eliminar característica"  href="javascript:void(0);" class="col-lg-2 center" onclick='deleteAtributo(<?=$row->id_atributo?>)'>

                                                        <i class="fa fa-times fa-2x"></i>

                                                    </a>

                                                </td>

                                            </tr>

                                        <?php endforeach; ?>

                                    </tbody>

                                </table>

                            </div>

                        </div>

                    </div>

                </div>            

            </div>    

        </div>

    </div>    

</div>

<!--Agregar Atributos-->    



<!--Modal-->    

<div id="attr" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header add-product">

                <button type="button" class="close" data-dismiss="modal">&times;</button>

                <h4 class="modal-title">Editar atributo</h4>

            </div>

            <div class="modal-body">

                <div class='row'>

                    <form role="form" id='edit_form' method="post" action="<?=site_url('admin/edit_valores')?>">                

                        <div class="col-xs-12">

                            <div class="table-responsive">
                            
                            	<table class="table table-striped">
                            		<thead>
                                    	<tr>
                                        	<th>Característica</th>	
                                            <th class='center'>Editar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<tr>
                                        	<td>
                                        		<input type="text" id="edit-atributo" class='form-control' name="" value="" />
                                            </td>
                                            <td class='center'>
                                            	<a href='javascript:void(0);' onclick='editarCaracteristica()'><i class="fa fa-pencil-square-o fa-2x"></i></a>
                                            </td>
                                        </tr>
                                    </tbody>
								</table>
                                
                                <table class="table table-striped">

                                    <thead id='t-head'><tr><th>Atributo</th><th class='center'>Eliminar</th></tr></thead>

                                    <tbody id='t-body'></tbody>

                                    <thead id='head'><tr rowspan='2'><th>Nuevo valor de atributo</th></thead>                                    

                                    <tbody id='t-new'>

                                        <tr>

                                            <td class='form-group'>

                                                <input type='text' id='add' data-parent='0' class='form-control' placeholder="Añadir nuevo valor"></input>

                                            </td>

                                            <td class='center pointer' >

                                                <a href='javascript:void(0);' onclick='agregarValor()'><i class="fa fa-plus fa-2x" aria-hidden="true"></i></a>

                                            </td>

                                        </td>

                                    </tbody>

                                </table>

                            </div>                                                                       

                        </div>     

                        <div class="col-xs-12 right">

                            <button type="button" class="btn btn-info" data-dismiss='modal' onClick="window.location.reload()">Guardar</button>

                        </div>              

                    </div>

                </form>    

            </div>

        </div>

    </div>

</div>

<!--Modal-->



<script type="text/javascript">

    function agregarValor(){

        var parent = $('#add').data('parent');

        var nombre = $('#add').val();



        if( nombre.length>2){

            $.ajax({

                url:"<?=base_url()?>admin/add_valor",

                data: { id_atributo: parent,

                        valor: nombre},       

                method: 'POST',

                dataType: 'json',

                success: function(data){

                    console.log(data);

                    $('#t-body').remove();

                    $(data.html).insertAfter('#t-head');

                    $('#add').val('');

                }

            });     

        }       

    }

    function editarValor(id){

        var parent = $('#input-'+id).data('parent');

        var nombre = $('#input-'+id).val();



        if( nombre.length>2){

            $.ajax({

                url:"<?=base_url()?>admin/edit_valor",

                data: { id_atributo: parent,

                        id_valor: id,

                        valor: nombre},       

                method: 'POST',

                dataType: 'json',

                success: function(data){

                    if(data.response == true)

                        alert('Campo Actualizado');

                }

            });     

        }             

    }

    function editarAtributo(id,atributo_text){
		
		$("#edit-atributo").val(atributo_text);

        $.ajax({

            url:"<?=base_url()?>admin/get_valores",

            data: { id_atributo: id},       

            method: 'POST',

            dataType: 'json',

            success: function(data){

                //console.log(data);

                $('#attr').modal({ backdrop: 'static', keyboard: false });                            

                $('#t-body').remove();

                $(data.html).insertAfter('#t-head');

                $('#add').data('parent',id);

            }

        });            

    }
	
	
	function editarCaracteristica(){
		
		var atributo_text = $("#edit-atributo").val();
		
		var id = $('#add').data('parent');
		
		
		console.log(id + " " + atributo_text);
		
        $.ajax({

            url:"<?=base_url('admin/update_atributo')?>",

            data: { id_atributo: id , atributo:atributo_text},       

            method: 'POST',

            dataType: 'json',

            success: function(data){
				$("#edit-atributo").val(data);
            }

        });    
	}

    function deleteAtributo(id) {

        var r = confirm("¿Desea realizar esta acción?");

        if (r == true) {        

            $.ajax({

                url:"<?=base_url()?>admin/delete_atributo",

                data: { id_atributo: id},       

                method: 'POST',

                dataType: 'json',

                success: function(data){

                    if(data.response == true)

                        $('#atributo-'+id).remove();

                }

            });  

        }       

    }

    function deleteValor(id) {

        var r = confirm("¿Desea realizar esta acción?");

        if (r == true) {         

            $.ajax({

                url:"<?=base_url()?>admin/delete_valor",

                data: { id_valor: id},       

                method: 'POST',

                dataType: 'json',

                success: function(data){

                    if(data.response == true)

                        $('#fila-'+id).remove();

                }

            }); 

        }        

    }

</script>