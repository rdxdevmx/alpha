<div id="page-wrapper">
    <div class="row">
        
        <div class="col-lg-12">
            <h1 class="page-header">Productos vendidos</h1>
        </div>

        <div class="col-lg-12">
            <div class="panel panel-default">
                <?=$m?>
                <div class="panel-heading">
                    Búsqueda
                </div>

                <div class="panel-body"> 
                    
                    <form method="get">

                    <div class="col-xs-12 col-sm-2">
                        <label>Producto</label>
                        <input class="form-control" name="p" value="<?=(isset($_GET['p']) && $_GET['p']!='')?$_GET['p']:''?>">
                    </div>
                    <div class="col-xs-12 col-sm-2">
                        <label>Fecha 1</label>
                        <input class="form-control datepicker" name="f1" value="<?=(isset($_GET['f1']) && $_GET['f1']!='')?$_GET['f1']:''?>">
                    </div>
                    <div class="col-xs-12 col-sm-2">
                        <label>Fecha 2</label>
                        <input class="form-control datepicker" name="f2" value="<?=(isset($_GET['f2']) && $_GET['f2']!='')?$_GET['f2']:''?>">
                    </div>
                    <div class="col-xs-12 col-sm-2">
                        <label>Status orden</label>
                        <select class="form-control" name="so">
                            <option value="">--Seleccione una opción --</option>
                            <?php 
                                foreach ($status_order as $key => $value) :
                                    $s = (isset($_GET['so']) && $_GET['so']==$value)?' selected ':'';
                            ?>
                                <option <?=$s?> value="<?=$value?>"><?=$value?></option>

                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-xs-12 col-sm-2">
                        <label>Status envío</label>
                        <select class="form-control" name="se">
                            <option value="">--Seleccione una opción --</option>
                            <?php 
                                foreach ($status_envio as $key => $value) :
                                    $s = (isset($_GET['se']) && $_GET['se']==$value)?' selected ':'';
                            ?>
                                <option <?=$s?> value="<?=$value?>"><?=$value?></option>

                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-xs-12 col-sm-2">
                        <br>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i> Buscar</button>
                    </div>

                    </form>

                </div>

            </div>

        </div>

        <div class="col-lg-12">

            <div class="panel panel-default">

                <div class="panel-heading">
                    Listado de productos vendidos
                </div>

                <div class="panel-body"> 

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>

                                <tr>
                                    <th>Producto</th>
                                    <th>Venta</th>
                                    <th>Precio</th>
                                    <th>Envío</th>
                                    <th>Fecha</th>
                                    <th>Cantidad</th>
                                    <th>Status pedido</th>
                                    <th>Status envío</th>
                                    <!-- <th>Pago a tienda</th> 
                                    <th>Cliente</th>
                                    <th>Acciones</th>-->
                                </tr>

                            </thead>

                            <tbody>
                            	<?php 
                                    foreach ($results as $value): //print_r($value); 

                                    $id_venta = $this->Encryption->encode($value->id_venta);

                                    $id_envio_tienda = $this->Tribubazar->get_envio($value->id_caracteristica, $value->id_venta);

                                    $id_caracteristica = $this->Encryption->encode($value->id_caracteristica);
                                    
                                    $tipo_envio = $this->Tribubazar->get_envio_price($value->id_envio);


                                ?>
                            	<tr>
                            		<td><?=$value->titulo?></td>
                                    <td>
                                        <a href="<?=base_url('admin/detalle_venta?venta='.$id_venta)?>"><?=$value->id_venta?></a>
                                    </td>
                            		<td>$ <?=number_format($value->precio,2)?></td>
                                    <td>$ <?=number_format($tipo_envio->precio_envio,2)?></td>
                            		<td><?=$value->fecha?></td>
                            		<td><?=$value->cantidad?></td>
                                    <td><?=$value->estatus?></td>
                                    <td><?=$value->status?></td>
                                    <!--<td><?=($value->aprob_cliente==1)?'<i class="fa fa-check-circle" aria-hidden="true"></i>':'<i class="fa fa-exclamation-triangle" aria-hidden="true"></i>'?></td> -->
                                    <!-- <td> -->
                                        <?php if($value->status == 'Pendiente' && $value->estatus == 'Pagado') :?>
                                        <!-- <a href="<?=base_url('admin/crear_envio/?id='.$id_venta)?>" class="btn btn-primary btn-xs"><i class="fa fa-truck" aria-hidden="true"></i> Enviar</a>
                                         -->
                                        <?php elseif($value->status == 'Enviado'): ?>
                                        
                                        <!-- <a href="<?=base_url('admin/envio_producto/?id='.$id_envio_tienda.'&vta='.$id_venta)?>" class="btn btn-primary btn-xs"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i> Ver envío </a>
 -->
                                        <?php //elseif($value->status == 'Entregado' && $value->aprob_tienda == 0): ?>

                                        <!-- <a href="<?=base_url('admin/aprobar_producto/?id='.$id_venta.'&id_caracteristica='.$id_caracteristica)?>" class="btn btn-primary btn-xs confirm"><i class="fa fa-check-circle" aria-hidden="true"></i> Aprobar compra </a>
 -->
                                        <?php endif; ?>
                                    <!-- </td>  -->                                 
                            	</tr>
                            	<?php endforeach; ?>
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
