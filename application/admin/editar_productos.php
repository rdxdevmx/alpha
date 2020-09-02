<div id="page-wrapper">


	<div class="row">


    	<div class="col-lg-12">


        	<h1 class="page-header">Editar Productos</h1>


       	</div>


        <!-- /.col-lg-12 -->


	</div>


    <?=$m?>


    <div id="product_message"></div>


    <div class="row">


    	<div class="col-lg-12">


        	<div class="panel panel-default">


            	


                <div class="panel-heading">


                	Editar a Productos


                </div>


                <div class="panel-body">


                	<div class="row"> 


                    	<div class="col-lg-12">


                        


                        <!--controles de los tabs-->


                        <ul class="nav nav-tabs">


                            <li id="prod-tab1" class="active"><a href="#tab1" data-toggle="tab">Editar producto</a></li>


                            <li id="prod-tab2"><a  href="#tab2" data-toggle="tab">Editar Stock</a></li>


                        </ul>


                        <!--controles de los tabs-->


                        


                        <div class="tab-content">


    						<div class="tab-pane active" id="tab1">


                            <h2>Editar el producto</h2>


                        	<!--tab-1-->


                        	<form id="update_producto" role="form">


                            	<input type="hidden" id="id_producto" name="id_producto" value="<?=$id_producto?>" />


                            	<input type="hidden" id="tienda" name="id_tienda" value="<?=$producto->id_tienda?>" />


                                <input type="hidden" name="galeria" value="<?=$producto->galeria?>">


                            	<div class="form-group">


                                	<div class="col-lg-8">


                                    


                                        <div class="col-lg-12">


                                            <label>Título de producto</label>


                                            <input type="text" id="titulo" name="titulo" class="form-control" value="<?=$producto->titulo?>" required>


                                        </div>


                                        


                                        <div class="col-lg-6">


                                            <label>Precio</label>


                                            <input type="text" id="precio" name="precio" class="form-control" value="<?=$producto->precio?>" required>


                                        </div>


                                        


                                        <div class="col-lg-6">


                                            <label>Tienda</label>


                                            <input type="text" id="tiendas-auto" class="form-control" value="<?=$producto->tienda?>"   required="required" />


                                            <!--<input type="text" class="typeahead tt-query form-control" autocomplete="off" spellcheck="false" required>-->


                                        </div>


                                        


                                        <div class="col-xs-12 col-lg-6">


                                        	<?php


                                            	foreach($fotos->result() as $f):





													if($f->marcador != 0):


														


														if($f->marcador == 1):


															$selected = 'checked="checked" ';


														else: 


															$selected = '';


														endif;





                                            ?>


                                                    <div class="col-xs-4 col-lg-3 box-edit-image">


                                                        <div class="thumbnail_gall">


                                                            <img src="<?=site_url('files/'.$producto->galeria.'/'.$f->foto)?>" />


                                                        </div> 


                                                        <input <?=$selected?>  type="radio" name="marcador" onchange="get_marcador(<?=$f->id_galeria?>)" />


                                                        <a href="<?=site_url('admin/delete_photo/?id_galeria='.$f->id_galeria.'&foto='.$f->foto.'&key_foto='.$producto->galeria)?>"><i class="fa fa-trash fa-2x" aria-hidden="true"></i></a>


                                                    </div>


                                            <?php


													endif;


                                            	endforeach;


											?>


                                        </div>


                                        


                                        <div class="col-xs-12 col-lg-6">


                                        	<?php


                                            	foreach($fotos->result() as $f):


													if($f->marcador == 0):


                                            ?>


                                                    <div class="col-xs-4 col-lg-3 box-edit-image">


                                                        <div class="thumbnail_gall">


                                                            <img src="<?=site_url('files/'.$producto->galeria.'/'.$f->foto)?>" />


                                                            


                                                        </div>


                                                        <a href="<?=site_url('admin/delete_photo/?id_galeria='.$f->id_galeria.'&foto='.$f->foto.'&key_foto='.$producto->galeria)?>"><i class="fa fa-trash fa-2x" aria-hidden="true"></i></a>


                                                    </div>


                                            <?php


													endif;


                                            	endforeach;


											?>


                                        </div>


                                        


                                        <div class="col-xs-12">


    


                                            <div class="col-xs-12 col-lg-6">


                                                <label>Imágenes Principales</label>


                                                <!--upload file plugin--> 


                                                <div id="upload">


                                                    <div id="main-images">Subir</div>


                                                </div>


                                                <!--upload file plugin--> 


                                                <div id="extrabutton" class="ajax-file-upload-green"><i class="fa fa-upload" aria-hidden="true"></i> Subir imágenes</div>


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


                                    


                                    </div>


                                    


                                    <div class="col-lg-4">


                                        <label>Categoría</label>


                                        <select data-onload="select_option('#parent_category1',<?=$cat_prod[0]?>,'#parent_category2',<?=$id_producto?>)"  id="parent_category1" name="parent[]" class="parent form-control" required>
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
									


                                        <select data-onload="select_option('#parent_category2',<?=(isset($cat_prod[2]))?$cat_prod[2]:0?>,'#parent_category3',<?=$id_producto?>)" id="parent_category2" name="parent[]" class="parent form-control parent_new uno"></select>


                                        <select data-onload="select_option('#parent_category3',<?=(isset($cat_prod[3]))?$cat_prod[3]:0?>,'#parent_category4',<?=$id_producto?>)" id="parent_category3" name="parent[]" class="parent form-control parent_new uno"></select>


                                        <select data-onload="select_option('#parent_category4',<?=(isset($cat_prod[4]))?$cat_prod[4]:0?>,'')" id="parent_category4" name="parent[]" class="parent form-control parent_new uno"></select>
                                        
                                        


                                        
                                        <label>Categoría</label>                                        
                                        
                                        <select data-onload="select_option('#parent_category5',<?=(isset($cat_prod[1]))?$cat_prod[1]:0?>,'#parent_category6',<?=$id_producto?>)" id="parent_category5" name="parent[]" class="parent form-control " required>
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
                                        
                                        <select data-onload="select_option('#parent_category6',<?=(isset($cat_prod[5]))?$cat_prod[5]:0?>,'#parent_category7',<?=$id_producto?>)" id="parent_category6" name="parent[]" class="parent form-control parent_new dos"></select>
                                        
                                        <select data-onload="select_option('#parent_category7',<?=(isset($cat_prod[6]))?$cat_prod[6]:0?>,'#parent_category8',<?=$id_producto?>)" id="parent_category7" name="parent[]" class="parent form-control parent_new dos"></select>
                                        
                                        <select data-onload="select_option('#parent_category8',<?=(isset($cat_prod[7]))?$cat_prod[7]:0?>,'#parent_category9',<?=$id_producto?>)" id="parent_category8" name="parent[]" class="parent form-control parent_new dos"></select>
                                        

                                    </div>


                                    


                            	</div>


                                


                               	<div class="form-group">


                                	<div class="col-lg-12">


                                		<label>Contenido:</label>


                                        <textarea id="contenido" name="descripcion" class="form-control" rows="3"><?=$producto->descripcion?></textarea>


                                    </div>


                                </div>

                                <div class="form-group">
                                    <div class="col-xs-12 col-sm-3">
                                        <label>Ancho cm:</label>
                                        <input id="width" name="width" type="number" class="form-control" value="<?=$producto->width?>" required>
                                    </div>
                                    <div class="col-xs-12 col-sm-3">
                                        <label>Altura cm:</label>
                                        <input id="height" name="height" type="number" class="form-control" value="<?=$producto->height?>" required>
                                    </div>
                                    <div class="col-xs-12 col-sm-3">
                                        <label>longitud cm</label>
                                        <input id="length" name="length" type="number" class="form-control" value="<?=$producto->length?>" required>
                                    </div>
                                    <div class="col-xs-12 col-sm-3">
                                        <label>Peso kg</label>
                                        <input id="weight" name="weight" type="number" class="form-control" value="<?=$producto->weight?>" required>
                                    </div>
                                </div>

                                
<!--                                 <div class="form-group">


                                	<div class="col-lg-12">


                                		<label>Tabla de medidas:</label>

                                        <textarea id="medidas" name="medidas" class="form-control" rows="3">
                                            <?php if ($producto->medidas!=''):?>
                                                <?=$producto->medidas?>
                                                <?php endif;?>
                                        </textarea>


                                    </div>


                                </div> -->


                                


						  		<div class="col-lg-12">


                                	<a onclick="update_producto()"  class="btn btn-success" href="javascript:void(0);">Editar</a>


                                	</form>


                                </div>





                              


                            </div>


                            <!--tab2-->                            


                            <div class="tab-pane" id="tab2">


                            


                            	<div id="prod_message"></div>


                                


                                <!--<div id="current_stock"></div>-->





                            


                            	<h2>Editar Stock</h2>


                                <div class="panel panel-default">


                                    <div class="panel-heading">Editar a Productos</div>


                                    <div class="panel-body">


                                        <div class="row">                                 


                                            <div class="col-lg-12">


                                                <table class="table table-striped">


                                                    <thead>


                                                    <tr>


                                                        <th>Atributos</th>


                                                        <th>Cantidad</th>


                                                        <th>Acciones</th>


                                                    </tr>


                                                    </thead>


                                                    <tbody id="current_stock">


                                                    <?php


                                                        foreach($stock->result() as $s):


                                                    ?>


                                                        <tr>


                                                            <td><?=$s->resumen?></td>


                                                            <td><?=$s->stock?></td>


                                                            <td> 


                                                                <a href="javascript:void(0);" onclick="editar_stock(<?=$s->id_caracteristica?>,<?=$s->stock?>)"  class="col-lg-2">


                                                                    <i class="fa fa-pencil-square-o fa-2x"></i>


                                                                </a>


                                                                <a href="javascript:void(0);" onclick="delete_caracteristica(<?=$s->id_caracteristica?>)" class="col-lg-2">


                                                                    <i class="fa fa-times fa-2x"></i>


                                                                </a>


                                                            </td>


                                                        </tr>


                                                    <?php


                                                        endforeach;


                                                    ?>


                                                    </tbody>


                                                </table>


                                            </div>


                                        </div>


                                    </div>


                                </div>


                                <div class="panel panel-default">


                                    <div class="panel-heading">Agregar Stock</div>


                                    <div class="panel-body">


                                        <div class="row">                                     


                							<div class="col-lg-12">


                                                <form id="form_stock" role="form" method="post">


                                            	   <input type="hidden" id="id_producto" name="id_producto" value="<?=$id_producto?>" />


                                                    <?php


                                                    	foreach($atributo->result() as $att):


                    								?>       	


                                                        <div class="col-xs-12 col-sm-2">


                                                        	<label><?=$att->atributo?>:</label>


                                                        	<select name="resumen[]" class="form-control">


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


                                                


                                                    <div class="add-stock">                                 


                                                        <div class="col-xs-3 ">


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





                            <!--tab-1 -- formulario-->


                        </div>


                            


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


	


	function select_option(id, value, next_select,producto){


		getCategoriesE(value , next_select , id, producto );


		$(id).val(value);


	}





	function get_marcador(id_galeria){


				


		$.ajax({


            url:"<?=base_url()?>admin/change_marcador_image/?galeria=<?=$producto->galeria?>",


            data: { id_galeria:id_galeria },       


            type: 'POST',


            success: function(data){


				$("#product_message").html(data);              


            }


        });  


	}





	function update_producto(){

		
		var contenido = $("#contenido").val(CKEDITOR.instances.contenido.getData());
        //var medidas = $("#medidas").val(CKEDITOR.instances.medidas.getData());
		
		var param = $("#update_producto").serializeArray();

        $.ajax({


            url:"<?=base_url()?>admin/update_producto",


            data: param,       


            type: 'POST',


            success: function(data){


				$("#product_message").html(data);              


            }


        });  


	}


	


	function delete_caracteristica(id){


		


		var next = confirm("¿Desea eliminar la característica?");


		


		if(next){


			$.ajax({


				url:"<?=base_url()?>admin/delete_caracteristica",


				data: { id: id},         


				type: 'POST',


				success: function(data){


					getStock(<?=$id_producto?>)                        


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


				getStock(<?=$id_producto?>)                        


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


