
<div id="page-wrapper">

	<div class="row">
    	<div class="col-lg-12">
        	<h1 class="page-header">Ventas por tienda</h1>
       	</div>
	</div>
	<div class="row">
        <div class="col-lg-12">
	        <div class="panel panel-default">
                <div class="panel-heading">Ventas por tienda</div>                
	                <div class="panel-body">
	                	
                        <div class="table-responsive">
                        	<table class="table table-striped">
								<thead>
                                    <tr>
                                    	<th>Orden</th>
                                    	<th>Fecha</th>
                                    	<th>Monto</th>
                                    	<th>Status</th>
                                    	<th></th>
                                    </tr>
                                </thead>
								<tbody>
                            	<?php foreach ($results as $value): ?>
                            	<tr>
                            		<td><?=$value->id_venta?></td>
                            		<td><?=$value->fecha?></td>
                            		<td>$ <?=number_format($value->monto,2)?></td>
                            		<td><?=$value->estatus?></td>
                            		<td>
                            		  <a href="<?=base_url('admin/detalle_venta?venta='.$this->Encryption->encode($value->id_venta))?>" class="btn btn-primary btn-xs">Ver <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                            		  <a href="#" data-toggle="modal" data-target="#modal-envio" class="btn btn-primary btn-xs"><i class="fa fa-truck" aria-hidden="true"></i> Enviar</a>      
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

