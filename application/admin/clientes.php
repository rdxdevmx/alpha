<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Clientes</h1>
        </div>
        <div class="col-xs-12">
        	 <?=$m?>  
        	<form>

        	</form>
        </div>
        <div class="col-lg-12">

            <div class="panel panel-default">

                <div class="panel-heading">
                    Listado de clientes

                    <a href="<?=site_url('admin/excelin')?>" class="btn btn-xs btn-success pull-right"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Exportar usuarios</a>
                
                </div>
                <div class="panel-body">
                    
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Correo</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php
                                foreach($results as $row):        
                            ?>
                        		<tr>
                        			<td><?=$row->nombre?></td>
                        			<td><?=$row->email?></td>
                        			<td>
                        				<a href="<?=base_url('admin/editar_cliente/?id='.$row->id_usuario)?>" class="btn btn-primary btn-xs">
                        					<i class="fa fa-pencil-square-o"></i>
                        				</a>
                        				<a href="<?=base_url('admin/delete_cliente/?id='.$row->id_usuario)?>" class="btn btn-danger btn-xs confirm">
                        					<i class="fa fa-times"></i>
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