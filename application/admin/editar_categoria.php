<style type="text/css">

    .no-padding{

        padding-right: 0px;

        padding-left: 0px;

    }

</style>



<div id="page-wrapper">

	<div class="row">

    	<div class="col-lg-12">

        	<h1 class="page-header">Editar categoría</h1>

       	</div>

    <!-- /.col-lg-12 -->

	</div>

    <?=$m?>

    <div class="row">

    	<div class="col-lg-12">

        	<div class="panel panel-default">

            	<div class="panel-heading">

                	Editar a categorías

                </div>

                <div class="panel-body">

                	<div class="row"> 

                    	<div class="col-lg-12">

                        		<!--inicia el form para filtrar todas las subcategorías-->

                                <form id="filtro_categorias" method="get">

                                

                                    <div class="col-xs-12 no-padding" >

                                        <div class="col-xs-6 no-padding">

                                            <div class="form-group">

                                                <select id="parent_category1" name="cat1"  class="parent form-control"> 

                                                    <option value="0">--Categorías Principales --</option>

                                                    <?php

    													foreach($categorias->result() as $cat):

    												?>

    													<option value="<?=$cat->id_categoria?>"><?=$cat->categoria?></option>

    												<?php		

    													endforeach;	

    												?>

                                                </select>

                                                

                                                <select id="parent_category2" name="cat2" class="parent form-control parent_new"></select>

                                                <select id="parent_category3" name="cat3" class="parent form-control parent_new"></select>

                                                <select id="parent_category4" name="cat4" class="parent form-control parent_new"></select>                                        

                                            </div>

                                        </div>                                                

                                        <div class="col-xs-6">

                                        	<input type="submit" class="btn btn-primary" value="Filtrar">

                                        </div>

                                    </div>                                        

                                </form>  

                                <!--inicia el form para filtrar todas las subcategorías-->

                                

                            </div>  

                            

                            <div class="col-lg-12">                    	

                        	<!--contenido de la tabla-->

                            <div class="table-responsive">

                                    <table class="table table-striped table-bordered table-hover">

                                        <thead>

                                            <tr>

                                                <th>Categoría</th>

                                                <th>Acciones</th>

                                            </tr>

                                        </thead>

                                        <tbody>

                                        <?php

                                        	foreach($results as $row):

										?>     

                                            <tr>

                                                <td><?=$row->categoria?></td>

                                                <td>

                                                	<a href="#" class="col-lg-2">

                                                        <i class="fa fa-pencil-square-o fa-2x"></i>

                                                    </a>

                                                    <a href="<?=base_url('admin/delete_categoria/?id_categoria='.$row->id_categoria)?>" title="¿Desea eliminar la categoría?" class="col-lg-2 confirmar">

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

                                <!--contenido de la tabla-->

                        </div>

                    	

                    </div>

                    <!---paginacion ---->

                    <div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate">

                        <ul class="pagination">

                            <?=$links?>

                        </ul>

                    </div>

            		<!---paginacion ---->

                    

                </div>    

        </div>

    </div> 

</div>      