<div id="page-wrapper">

	<div class="row">

    	<div class="col-lg-12">

        	<h1 class="page-header">Agregar categoría</h1>

       	</div>

        <!-- /.col-lg-12 -->

	</div>

    <?=$m?>

    <div class="row">

    	<div class="col-lg-12">

        	<div class="panel panel-default">

            	

                <div class="panel-heading">

                	Agregar a categorías

                </div>

                <div class="panel-body">

                	<div class="row"> 

                    	<div class="col-lg-12">

                        	<form role="form" method="post" action="<?=site_url('admin/insert_categoria')?>">

                                <input type="hidden" name="id_tienda" value="<?=$id_tienda?>">      	

                                <div class="col-lg-4">

                                    <div class="form-group">

                                        <label>Título de categoría</label>

                                        <input type="text" name="categoria" class="form-control" required>

                                    </div>

                                </div>   

                                

                                <div class="col-lg-4">

                                	<div class="form-group">

                                        <label>Categoría padre</label>

                                        <select id="parent_category1" name="parent[]" class="parent form-control" required>

                                        	<option value="0">--Seleccione categoría--</option>

                                            <?php

                                            	foreach($categorias->result() as $cat):

											?>

                                            	<option value="<?=$cat->id_categoria?>"><?=$cat->categoria?></option>

                                            <?php		

                                            	endforeach;	

											?>

                                        </select>

										

                                        <select id="parent_category2" class="parent form-control parent_new"></select>

                                        <select id="parent_category3" class="parent form-control parent_new"></select>

                                        <select id="parent_category4" class="parent form-control parent_new"></select>

                                                                                

                                    </div>

                                </div>

                                



<!--                                <div class="col-lg-3">

                                	<div class="form-group">

                                        <label>&nbsp;</label>

                                        <select name="parent[]" class="form-control">

                                        	<option value="0">--Seleccione categoría--</option>

                                        </select>

                                    </div>	

                                </div>

-->                                                                                             

                                <div class="col-lg-12">

                                    <button type="submit" class="btn btn-primary">Guardar</button>

                                </div>                                



                                

                            </form>

                            <!--formulario-->

                        </div>

                    </div>

                </div>

                <!--panel body-->

            </div>

        </div>

    </div>

    

    

</div>