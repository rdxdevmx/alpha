    <div class="bodi off" >

       <div class="pg1 bx_gen_compras">

            <div class="container">

                <div class='row'>

                	<div class="panel panel-default">
                        <div class="panel-heading">
                        	<h3 style='margin-bottom: 0'>Modificar orden </h3>
                        	<a href="<?=base_url('detail?order='.$_GET['order'])?>" class="btn btn-danger btn-xs pull-right"><span class="glyphicon glyphicon-chevron-left"></span> Regresar a la orden </a>
                        </div>
	                    <div class="panel-body">  
	                        <div class="col-xs-12 table-responsive">
	                        	<table class="table">
	                        		<tbody>
										<tr class="op- modal-tr" id="modal-tr" height="40px">
	                                        <td>Id Productos</td>
	                                        <td>Producto</td>
	                                        <td class="center">Cantidad</td>
	                                        <td>Monto</td>
	                                        <td>Acciones</td>
	                                    </tr>
	                                    <?php
	                                    	
	                                    	$len = strlen($producto->id_producto);

                							$zero = '';

							                while($len<4){

							                    $zero=$zero.'0';

							                    $len ++ ;

							                 }

	                                    	$id_producto = "PD-".$zero.$producto->id_producto;
	                                   		//print_r($producto);
	                                   		$precio_final = $producto->cantidad * $producto->precio;
	                                    ?>
	                                    <tr>
	                                    	<td><?=$id_producto?></td>
	                                    	<td><?=$producto->titulo?></td>
	                                    	<td><input type="number" id="cantidad-producto" value="<?=$producto->cantidad?>"></td>
	                                    	<td>$ <?=number_format($precio_final,2)?></td>
	                                    	<td>
	                                    		
	                                    		<?php if($producto->status!='Pendiente'): ?>
	                                    		<a title="Devolver" href="#" class="btn bt-devolver"><span class="glyphicon glyphicon-arrow-left"></span> Devolver</a>
	    										<?php else: ?>                                		
	  	                                  		<a title="Cambiar" href="#" data-old-cantidad="<?=$producto->cantidad?>" class="btn bt-devolver actualizar"><span class="glyphicon glyphicon-refresh"></a>
	                                      		<a title="Eliminar" href="#" class="btn bt-devolver"><span class="glyphicon glyphicon-trash"></span> Eliminar</a>
	                                    		<?php endif; ?>

	                                    	</td>
	                                    </tr>
	                        		</tbody>
	                        	</table>
	                        </div>
	                    </div>
	                </div>
                </div>

                </div>

            </div>

        </div>
