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
                                    	<th>Tienda</th>
                                    	<th>Productos vendidos</th>
                                        <th>Monto vendido</th>
                                    	<th>Pagado</th>
                                    	<th>Pendiente</th>
                                    	<th>Detalle</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	<?php 
                                        foreach ($venta as $row) : 
                                            $venta_data = $this->Tribubazar->get_ventas($row->id_tienda);
                                            $pagado =  $this->Tribubazar->get_pagado($row->id_tienda);

                                            $pendiente = $venta_data['monto_vendido'] - $pagado;

                                            $id_tienda =  $this->Encryption->encode($row->id_tienda);

                                            //$tipo_envio = $this->Tribubazar->get_envio_price($venta_data['id_envio']);
                                    ?>
                                	<tr>
                                		<td><?=$row->tienda?></td>
                                		<td><?=$venta_data['cantidad']?></td>
                                		<td>$ <?=number_format($venta_data['monto_vendido'],2)?></td>
                                        <td>$ <?=number_format($pagado,2)?></td>
                                		<td>$ <?=number_format($pendiente,2)?></td>
                                		<td>
                                            <!-- <a href="<?=base_url('admin/productos_vendidos/?id='.$row->id_tienda)?>" class="btn btn-primary">Ver productos</a> -->
                                            <a href="<?=base_url('admin/vta_detalle_tienda/?id='.$id_tienda)?>" class="btn btn-primary btn-xs">Ver detalle</a>
                                            <a href="<?=base_url('admin/pago_tiendas/?id='.$id_tienda)?>" class="btn btn-primary btn-xs"><i class="fa fa-plus-circle" aria-hidden="true"></i> Pagos</a>
                                        </td>
                                	</tr>
                                	<?php endforeach; ?>
                                </tbody>
                        	</table>
                        </div>	

	                </div>
	            </div>    
	        </div>
	        
            <div class='col-xs-12'>
                <div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate">
                    <ul class="pagination">
                        <?=$links?>
                    </ul>
                </div>                                
            </div>  


	    </div>    
	</div>

</div>