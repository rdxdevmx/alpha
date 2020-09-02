<div id="page-wrapper">

	<div class="row">

    	<div class="col-lg-12">

        	<h1 class="page-header">Agregar Productos</h1>

       	</div>

        <!-- /.col-lg-12 -->

	</div>

    <?=$m?>

    <div class="row">

    	<div class="col-lg-12">

        	<div class="panel panel-default">

            	

                <div class="panel-heading">

                	Agregar a Productos

                </div>

                <div class="panel-body">

                	<div class="row"> 

                    	<div class="col-lg-12">

                        

                        <!--controles de los tabs-->

                        <ul class="nav nav-tabs">

                            <li id="prod-tab1" class="active"><a href="#tab1" data-toggle="tab">Paso 1</a></li>

                            <li id="prod-tab2"><a  href="#tab2">Paso 2</a></li>

                        </ul>

                        <!--controles de los tabs-->

                        

                        <div class="tab-content">

    						<div class="tab-pane active" id="tab1">

                            <h2>Características el producto</h2>

                        	<!--tab-1-->

                        	<form id="insert_producto" role="form" method="post">

                            	<input type="hidden" id="tienda" name="id_tienda" value="<?=$id_tienda?>" />

                                <input type="hidden" name="galeria" value="<?=$foto?>">
                                
                                <input type="hidden" id="main_images" value="" />

                            	<div class="form-group">

                                	<div class="col-lg-8">

                                    

                                        <div class="col-lg-12">

                                            <label>Título de producto</label>

                                            <input type="text" id="titulo" name="titulo" class="form-control" required>

                                        </div>

                                        <div class="col-lg-6">

                                            <label>Tienda</label>

                                            <input type="text" id="tiendas-auto" class="form-control" value="<?=$nom_tienda?>" required="required" <?=($nom_tienda!='')?' disabled ':''?> />

                                            <!--<input type="text" class="typeahead tt-query form-control" autocomplete="off" spellcheck="false" required>-->

                                        </div>
                                        

                                        <div class="col-lg-6">

                                            <label>Precio</label>

                                            <input type="text" id="precio" name="precio" class="form-control" required>

                                        </div>


                                        <div class="col-xs-12 col-lg-6">
      
                                        	<label>Imágenes principales</label>

                                            <!--upload file plugin--> 

                                            <div id="upload">

                                                <div id="main-images">Subir</div>

                                            </div>

                                            <!--upload file plugin--> 

                                            <div id="extrabutton" class="ajax-file-upload-green">Subir imágenes</div>

                                        </div>

                                        

                                        <div class="col-xs-12 col-lg-6">

                                        	<label>Imágenes secundarias</label>

                                            <!--upload file plugin--> 

                                            <div id="upload">

                                                <div id="sec-images">Subir</div>

                                            </div>

                                            <!--upload file plugin--> 

                                        </div>

                                    

                                    </div>

                                    

                                    <div class="col-lg-4">

                                        <label>Categoría </label>

                                        <select id="parent_category1" name="parent[]" class="parent form-control" required>

                                        	<option value="0">--Seleccione categoría--</option>

                                        <!--<select name="categoria" class="form-control" required>  -->

                                        <?php

                                        	foreach($categorias->result() as $cat):

										?>

                                        	<option value="<?=$cat->id_categoria?>"><?=$cat->categoria?></option>

                                        <?php

                                        	endforeach;

										?>

                                        </select>

                                        										

                                        <select id="parent_category2" name="parent[]" class="parent form-control parent_new"></select>

                                        <select id="parent_category3" name="parent[]" class="parent form-control parent_new"></select>

                                        <select id="parent_category4" name="parent[]" class="parent form-control parent_new"></select>

                                        <label>Categoría</label>
                                        
                                        <select id="parent_category5" name="parent[]" class="parent form-control" >

                                            <option value="0">--Seleccione categoría--</option>

                                        <!--<select name="categoria" class="form-control" required>  -->

                                        <?php

                                            foreach($categorias->result() as $cat):

                                        ?>

                                            <option value="<?=$cat->id_categoria?>"><?=$cat->categoria?></option>

                                        <?php

                                            endforeach;

                                        ?>

                                        </select>


                                        <select id="parent_category6" name="parent[]" class="parent form-control parent_new"></select>

                                        <select id="parent_category7" name="parent[]" class="parent form-control parent_new"></select>

                                        <select id="parent_category8" name="parent[]" class="parent form-control parent_new"></select>

                                        

                                    </div>

                                    

                            	</div>

                                

                               	<div class="form-group">

                                	<div class="col-lg-12">

                                		<label>Contenido:</label>

                                        <textarea id="contenido" name="descripcion" class="form-control" rows="3"></textarea>

                                    </div>

                                </div>

                                <div class="form-group">
                                    <div class="col-xs-12 col-sm-3">
                                        <label>Ancho cm:</label>
                                        <input id="width" name="width" type="number" class="form-control" required>
                                    </div>
                                    <div class="col-xs-12 col-sm-3">
                                        <label>Altura cm:</label>
                                        <input id="height" name="height" type="number" class="form-control" required>
                                    </div>
                                    <div class="col-xs-12 col-sm-3">
                                        <label>longitud cm</label>
                                        <input id="length" name="length" type="number" class="form-control" required>
                                    </div>
                                    <div class="col-xs-12 col-sm-3">
                                        <label>Peso kg</label>
                                        <input id="weight" name="weight" type="number" class="form-control" required>
                                    </div>
                                </div>

                                
<!--                                 <div class="form-group">

                                	<div class="col-lg-12">

                                		<label>Tabla de medidas</label>

                                        <textarea id="medidas" name="medidas" class="form-control" rows="3"></textarea>

                                    </div>

                                </div> -->

                                

						  	<!--<div class="col-lg-12">

                                	<button type="submit" class="btn btn-primary">Guardar</button>

                                </div>-->

                               <div class="ctrl-tab">

                               		<!--<button id="send_producto" class="btn btn-primary btnNext">Siguiente <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></button> -->	

                            		<a id="send_producto" class="btn btn-primary btnNext" >Siguiente <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a>

                                </div>

                                

                                

                            </form>

                              

                            </div>

                            <!--tab2-->                            

                            <div class="tab-pane" id="tab2">

                            

                            	<div id="prod_message"></div>

                                <div class="panel panel-default">

                                    <div class="panel-heading">Editar a Productos </div>

                                    <div class="panel-body">

                                        <div class="row">                                    

                                        <div class="col-xs-12">                                    

                                                <table class="table table-striped">

                                                	<thead>

                                                    	<tr>

                                                            <th>Atributos</th>

                                                            <th>Cantidad</th>

                                                            <th>Acciones</th>

                                                        </tr>

                                                     </thead>

                                                     <tbody id="current_stock">

                                                     </tbody>

                                                </table>

                                            </div>

                                        </div>         

                                    </div>         

                                </div>         

                            

                            	<h2>Agregar Stock</h2>

    							

                                <div class="panel panel-default">

                                    <div class="panel-heading">Listado de características <span class="pull-right"><input type="checkbox" onclick="add_car()">Agregar características </span></div>

                                    <div class="panel-body">

                                        <div class="row">                                    

                                            <form id="form_stock" role="form" method="post">

                                	       <input type="hidden" id="id_producto" name="id_producto" />

                                        <?php

                                        	foreach($atributo->result() as $att):

        								?>       	

                                        <div class="col-xs-12 col-sm-2">

                                        	<label><?=$att->atributo?>:</label>

                                        	<select name="resumen[]" class="form-control" <?=($att->id_atributo != 14)?' disabled ':''?> >

                                            	<option value="0">--Seleccione una opción--</option>

    											<?php

    												$valor = $this->db->get_where('atributo_valor',array('id_atributo'=>$att->id_atributo));

                                                	foreach($valor->result() as $v):

                                                        $s = ($att->id_atributo == 14)?' selected ':'';

    											?>	

                                                	<option <?=$s?> value="<?=$v->id_valor?>"><?=$v->valor?></option>

    											<?php

    												endforeach;	

    											?> 

                                            </select>

                                        </div>

                                    <?php

                                    	endforeach;	

    								?> 



                                    

                                        <div class="add-stock">                                 

                                            <div class="col-xs-3">

                                                <div class="input-group">

                                                  <input type="number" min="0" name="stock"  class="form-control">

                                                  <span class="input-group-btn">

                                                    <button id="add_stock" class="btn btn-success" type="button"><i class="fa fa-plus-circle" aria-hidden="true"></i> Agregar stock</button>

                                                  </span>

                                                </div>

                                            </div>

                                        </div>

                                    </form>

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <!--tab2-->



                            <!--tab-1 - formulario-->

                        </div>    

                            

                            

                            

                        </div>

                    </div>

                </div>

                <!--panel body-->

            </div>

        </div>

    </div>

    

</div>



<!--Modal-->    

<div id="attr" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header add-product">

                <button type="button" class="close" data-dismiss="modal">&times;</button>

                <h4 class="modal-title">Editar stock</h4>

            </div>

            <div class="modal-body">

                <div class='row'>

                 

                 <form id='edit_form_stock' method="post"> 

                 	<input type="hidden" id="id_caracteristica" name="id_caracteristica"  />               

                 <?php

                	foreach($atributo->result() as $att):

				?>       	

                 	<div class="col-xs-12">

                        <label><?=$att->atributo?>:</label>

                        <select name="resumen[<?=$att->id_atributo?>]" class="form-control edit_attr" id_atributo="<?=$att->id_atributo?>" >

                        	<option value="0">--Seleccione una opción--</option>

							<?php

								$valor = $this->db->get_where('atributo_valor',array('id_atributo'=>$att->id_atributo));

                                foreach($valor->result() as $v):

							?>	

                               	<option value="<?=$v->id_valor?>"><?=$v->valor?></option>

							<?php

								endforeach;	

							?> 

                    	</select>

                    </div>

                 <?php

                	endforeach;	

				?> 

                    <div class="col-xs-12">

                    	<label>Stock:</label>

                        <input id="edit_stock" class="form-control" type="number" min="0" name="stock1" />

                    	<br />    

                        <a onclick="update_stock()"  class="btn btn-success" href="javascript:void(0);">Editar</a>

                    </div>	

                    

                </form>

                    

            </div>

        </div>

    </div>

</div>

<!--Modal-->



<script>

CKEDITOR.replace( 'contenido', {

	language: 'es'

});

</script>
<script>

// CKEDITOR.replace( 'medidas', {

// 	language: 'es'

// });

</script>    

<script type="text/javascript">

    function add_car(){

        $("#form_stock select").prop('disabled', function(i, v) { return !v; });
    }

	function delete_caracteristica(id){

		

		var next = confirm("¿Desea eliminar la característica?");

		

		if(next){

			$.ajax({

				url:"<?=base_url()?>admin/delete_caracteristica",

				data: { id: id},         

				type: 'POST',

				success: function(data){

					var id_producto = $("#id_producto").val();

					getStock(id_producto)                        

				}

			});  

		}

	}



	function update_stock(){

		var param = $("#edit_form_stock").serializeArray();

		

		$.ajax({

            url:"<?=base_url()?>admin/update_stock",

            data: param,       

            type: 'POST',

            success: function(data){

				console.log(data);

				$('#attr').modal('toggle');      

				var id_producto = $("#id_producto").val();

				getStock(id_producto)                         

            }

        });  

	}

	

	

	function editar_stock(id,stock){

		$("#id_caracteristica").val(id);

		

        $.ajax({

            url:"<?=base_url()?>admin/get_stock",

            data: { id_atributo: id},       

            method: 'POST',

            dataType: 'json',

            success: function(data){

				console.log(data);

                $('#attr').modal({ backdrop: 'static', keyboard: false });

				$("#edit_stock").val(stock);

				

				$(".edit_attr").each( function( index, element ){

					var index = $(this).attr("id_atributo");			

					

					if( typeof(data[index]) == "string"  ){

						$(this).val(data[index]);

					}else{

						$(this).val(0);

					}

					

				});

				                            

            }

        });  

	}

	

	

</script>

