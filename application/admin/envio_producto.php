<div id="page-wrapper">

    <div class="row">

        <div class="col-lg-12">

            <h1 class="page-header">Envío </h1>
        </div>



        <div class="col-lg-12">

        	<?=$m?>

            <div class="panel panel-default">

                <div class="panel-heading">

                    <strong>Guía:</strong><?=$envio->enviaya_shipment_number?>

                    <!-- <a href="#" class="btn-primary btn-xs pull-right" data-toggle="modal" data-target="#modal-pickup"><i class="fa fa-truck" aria-hidden="true"></i> Generar recolección</a> -->

<!--                     <a id="edit-envio" data-id="<?=$envio->id_envio_tienda?>" class="btn-primary btn-xs pull-right" data-toggle="modal" data-target="#modal-edit-envio"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar envío</a>

                    <a id="actualizar-status" data-id="<?=$envio->id_envio_tienda?>" class="btn-primary btn-xs pull-right" data-toggle="modal" data-target="#modal-actualizar-status"><i class="fa fa-refresh" aria-hidden="true"></i> Actualizar status</a> -->

                </div>

                <div class="panel-body">

                    <?php
                        
                        $response = $this->Envio->envio_status($envio->enviaya_shipment_number);
                        // echo '<pre>';
                        // print_r($response);
                        // echo '</pre>';

                        $track = $this->Envio->track($envio->enviaya_shipment_number, $envio->carrier);

                        //print_r($track);
                    ?>
                    
                    <div class="table-responsive">
                        <table class="table table-striped">

                            <thead>
                                <tr>
                                    <th>Mensajería</th>
                                    <th>Status</th>
                                    <th>Fecha de recolección</th>
                                    <th>Fecha estimada de entrega</th>
                                    <th>Etiqueta</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td><?=$response['shipment']->carrier?></td>
                                    <td><?=$response['shipment']->shipment_status?></td>
                                    <td><?=$track['pickup_date']?></td>
                                    <td><?=$track['estimated_delivery_date']?></td>
                                    <td>
                                        <a class="btn btn-primary btn-xs" href="<?=$response['shipment']->label_share_link?>"><i class="fa fa-file-text-o" aria-hidden="true"></i> Descarga etiqueta</a>
                                    </td>
                                </tr>
                            </tbody>

                        </table>
                    </div>

                </div>

            </div>

		</div>	



        <div class="col-lg-12">

            <div class="panel panel-default">

                <div class="panel-heading">

                    Datos de envío 

                </div>

                <div class="panel-body">

                	<div class="col-xs-12 col-sm-4">

                		<p><strong>Nombre:</strong> <?=$datos_envio->nombre?></p>

                	</div>

                	<div class="col-xs-12 col-sm-4">

                		<p><strong>Correo:</strong> <?=$datos_envio->email?></p>

                	</div>

                	<div class="col-xs-12 col-sm-4">

                		<p><strong>Teléfono:</strong> <?=$datos_envio->telefono?></p>

                	</div>



                	<div class="col-xs-12">

                		<p><strong>Dirección:</strong> <?=$datos_envio->calle?> <?=$datos_envio->municipio?> <strong>CP:</strong><?=$datos_envio->cp?></p>

                		<p><strong>Referencia:</strong> <?=$datos_envio->referencia?> </p>

                	</div>



                	<div class="col-xs-12">

	                    <div class="table-responsive">

	                        <table class="table table-striped">

	                        	<thead>

		                            <tr>

	                                <th>Producto</th>

	                                <th>Tipo</th>

	                                <th>Cantidad</th>

	                                <th>Status</th>

	                            	</tr>

	                            </thead>

								<tbody>

                            	<?php 

                            		foreach ($productos->result() as $val): //print_r($val);



                                    $prod_info = $this->Tribubazar->get_producto($val->id_caracteristica, $val->id_venta);



                                    //print_r($prod_info);

                            	?>

                            		<tr>

                                        <td><?=$prod_info->titulo?></td>

                                        <td><?=$prod_info->resumen?></td>

                                        <td><?=$prod_info->cantidad?></td>

                                        <td><?=$prod_info->status?></td>

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



        </div>       



    </div>

</div>    


<!-- Modal -->
<div id="modal-pickup" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Generar recolección</h4>
      </div>
      <div class="modal-body">

        <div class="row">

            <form method="post" action="<?=base_url('admin/add_pickup')?>">
                <input type="hidden" name="id_tienda" value="">
                <input type="hidden" name="pickup[enviaya_shipment_number]" value="<?=$envio->enviaya_shipment_number?>">
                <input type="hidden" name="pickup[carrier]" value="<?=$response['shipment']->carrier?>">
                <div class="col-xs-12 col-sm-3">
                    <label>Fecha</label> 
                    <input class="form-control datepicker" name="pickup[pickup_date]">
                </div>
                <div class="col-xs-12 col-sm-3">
                    <label>Entre Hora 1</label>
                    <input type="time" class="form-control" name="pickup[schedule_from]" placeholder="">
                </div>
                <div class="col-xs-12 col-sm-3">
                    <label>Hora 2</label>
                    <input type="time" class="form-control" name="pickup[schedule_to]" placeholder="">
                </div>
                <div class="col-xs-12 col-sm-3">
                    <br>
                    <button class="btn btn-primary" type="submit">Enviar</button>
                </div>
                
            </form>
        </div>

      </div>
      <div class="modal-footer"></div>
    </div>

  </div>
</div>




