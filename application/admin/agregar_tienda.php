<div id="page-wrapper">
	<div class="row">
    	<div class="col-lg-12">
        	<h1 class="page-header">Agregar tienda</h1>
       	</div>
        <!-- /.col-lg-12 -->
	</div>
    <?=$m?>
    <div class="row">
    	<div class="col-lg-12">
        	<div class="panel panel-default">
            	
                <div class="panel-heading">
                	Agregar a tiendas
                </div>
                <div class="panel-body">
                	<div class="row"> 
                    	<div class="col-lg-12">
                        	<form role="form" method="post" action="<?=site_url('admin/insert_tienda')?>" enctype="multipart/form-data">
                            	<div class="form-group">
                                	<div class="col-lg-6">
                                        <label>Nombre de la tienda</label>
                                        <input type="text" name="tienda" class="form-control" required>
                                        <br />
                                        <label>Logo de la tienda:</label>
                                        <input type="file" name="logo"  />                                        
                                    </div>

                                	<div class="col-lg-6">
                                        <label>Categorías</label>
                                        <select  multiple="multiple" id="parent_category1" name="parent[]" class="parent form-control" required>
                                            <option value="0">--Seleccione categoría--</option>
                                            <?php
                                                foreach($categorias->result() as $cat):
                                            ?>
                                                <option value="<?=$cat->id_categoria?>"><?=$cat->categoria?></option>
                                            <?php		
                                                endforeach;	
                                            ?>
                                        </select>
                                        <select  multiple="multiple" id="parent_category2" class="parent form-control parent_new"></select>
                                        <select  multiple="multiple" id="parent_category3" class="parent form-control parent_new"></select>
                                        <select  multiple="multiple" id="parent_category4" class="parent form-control parent_new"></select>
                                    </div>                                  
                                    
                            	</div>

                                
                                <div class="form-group">
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