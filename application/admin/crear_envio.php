<div id="page-wrapper">

    <div class="row">



        <div class="col-lg-12">

            <h1 class="page-header">Crear envío</h1>

        </div>



        <div class="col-lg-12">

        	<?=$m?>

            <div class="panel panel-default">

                <div class="panel-heading">

                    Datos de envío 

                </div>

                <div class="panel-body">

                	<?php 

                		//print_r($datos_envio);

                	?>



                	<div class="col-xs-12 col-sm-4">

                		<p><strong>Nombre:</strong> <?=$datos_envio->nombre?></p>

                	</div>

                	<div class="col-xs-12 col-sm-4">

                		<p><strong>Correo:</strong> <?=$datos_envio->email?></p>

                	</div>

                	<div class="col-xs-12 col-sm-4">

                		<p><strong>Teléfono:</strong> <?=$datos_envio->telefono?></p>

                	</div>



                	<div class="col-xs-12 col-sm-4">

                		<p><strong>Dirección:</strong> <?=$datos_envio->calle?></p>

<!--                 		<p><strong>Referencia:</strong> <?=$datos_envio->referencia?> </p>
 -->
                	</div>

                    <div class="col-xs-12 col-sm-3">

                        <p><strong>Municipio:</strong><?=$datos_envio->municipio?></p>

                    </div>
                    <div class="col-xs-12 col-sm-3">

                        <p><strong>Estado:</strong><?=$datos_envio->name?></p>

                    </div>
                    <div class="col-xs-12 col-sm-2">
                         <p><strong>CP:</strong><?=$datos_envio->cp?></p>
                    </div>


<!--                     <div class="col-xs-12 col-sm-3">
                        <p><strong>Mensajería:</strong>Redpack</p>
                    </div>
                    <div class="col-xs-12 col-sm-3">
                        <p><strong>Servicio:</strong>Express</p>
                    </div>
                    <div class="col-xs-12 col-sm-3">
                        <p><strong>Costo:</strong>$ 206.27 MXN</p>
                    </div>
                    <div class="col-xs-12 col-sm-3">
                        <p><strong>Fecha llegada:</strong>30-04-2020</p>
                    </div> -->


                </div>

            </div>

        </div>     



        <div class="col-lg-12">

            <div class="panel panel-default">

                <div class="panel-heading">

                    Productos para enviar 

                </div>

                <div class="panel-body">

                    

                    <form method="post" action="<?=base_url('admin/insert_envio_tienda')?>">

                        <input type="hidden" name="id_tienda" value="<?=$id_tienda?>">

                        <input type="hidden" name="destination_direction[company]" value="<?=$datos_envio->nombre?>">
                        <input type="hidden" name="destination_direction[country_code]" value="<?=$datos_envio->sortname?>">
                        <input type="hidden" name="destination_direction[postal_code]" value="<?=$datos_envio->cp?>">
                        <input type="hidden" name="destination_direction[direction_1]" value="<?=$datos_envio->calle?> <?=$datos_envio->municipio?>">
                        <input type="hidden" name="destination_direction[city]" value="<?=$datos_envio->name?>">
                        <input type="hidden" name="destination_direction[phone]" value="<?=$datos_envio->telefono?>">
                        <input type="hidden" name="destination_direction[state_code]" value="<?=$datos_envio->state_code?>">
                        <input type="hidden" name="destination_direction[neighborhood]" value="<?=$datos_envio->colonia?>">

                    <div class="table-responsive">

                        <table class="table table-striped">

                        	<thead>

	                            <tr>

                                <th></th>

                                <th>Producto</th>

                                <th>Tipo</th>

                                <th>Cantidad</th>

                            	</tr>

                            </thead>

                            <tbody>

                            	<?php 

                                    $i = 0;  $parcels = array();

                            		foreach ($productos->result() as $val): //print_r($val);

                                        $id_rating = $val->id_raiting;

                                        $parcels [] = array(
                                                        'quantity' => $val->cantidad,
                                                        'weight' => $val->weight,
                                                        'weight_unit' => 'kg',
                                                        'length' => $val->length,
                                                        'height' => $val->height,
                                                        'width' => $val->width,
                                                        'dimension_unit' => 'cm'
                                                    );

                            	?>

                            		<tr>

                            			<td>

                                            <input type="hidden" name="parcels[<?=$i?>][quantity]" value="<?=$val->cantidad?>">
                                            <input type="hidden" name="parcels[<?=$i?>][weight]" value="<?=$val->weight?>">
                                            <input type="hidden" name="parcels[<?=$i?>][length]" value="<?=$val->length?>">
                                            <input type="hidden" name="parcels[<?=$i?>][height]" value="<?=$val->height?>">
                                            <input type="hidden" name="parcels[<?=$i?>][width]" value="<?=$val->width?>">
                                            <input type="hidden" name="parcels[<?=$i?>][weight_unit]" value="kg">
 
                             				<input type="hidden" name="producto[<?=$val->id_caracteristica?>][id_caracteristica]" value="<?=$val->id_caracteristica?>">
                           				    <input type="hidden" name="producto[<?=$val->id_caracteristica?>][id_venta]" value="<?=$val->id_venta?>">

                            			</td>

                            			<td><?=$val->titulo?></td>

                            			<td><?=$val->resumen?></td>

                            			<td><?=$val->cantidad?></td>

                            		</tr>

                            	<?php 

                                    $i++; 

                            		endforeach;

                            	?>

                            </tbody>
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Mensajería</th>
                                    <th>Costo</th>
                                    <th>Fecha llegada</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 


                                    $raiting = $this->db->get_where('raiting', array('id_rating'=>$id_rating));
                                    
                                    foreach ($raiting->result() as $value) :
                                ?>
                                    <tr>
                                        <td>
                                            <input type="hidden" name="carrier" value="<?=$value->carrier?>">
                                            <input type="hidden" name="carrier_service_code" value="<?=$value->carrier_service_code?>">
                                        </td>
                                        <td><?=$value->carrier?></td>
                                        <td>$ <?=$value->total_amount?> MXN</td>
                                        <td><?=$value->estimated_delivery?></td>
                                    </tr>   
                                <?php
                                    endforeach;
                                ?>

                                <?php 

                                    if($raiting->num_rows()==0):

                                    $response_array = array(); 

                                    $data['cp_destino']= $datos_envio->cp;
                                    $data['cp_origen'] = $this->Tribubazar->get_cp_destino($id_tienda);
                                    $data['parcels'] =  $parcels;

                                    // echo '<pre>';
                                    // print_r($data);
                                    // echo '</pre>';

                                    $response_array = $this->Envio->cotizar_envio($data);

                                    // echo '<pre>';
                                    // print_r($response_array);
                                    // echo '</pre>';

                                    foreach (array_keys($response_array) as $key => $value):
                                    
                                        if(!empty($response_array[$value])):
                                    
                                        foreach ($response_array[$value] as $v):
                                            //echo '<form method="post" action="'.base_url('admin/insert_raiting').'">';
                                            echo '<div id="'.$v->rate_id.'">';
                                            echo '<input type="hidden" id="id_venta_raiting" value="'.$id_venta.'">';
                                            echo '<input type="hidden" id="carrier" value="'.$v->carrier.'">';
                                            echo '<input type="hidden" id="total_amount" value="'.$v->total_amount.'">';
                                            echo '<input type="hidden" id="carrier_service_code" value="'.$v->carrier_service_code.'">';
                                            echo '<input type="hidden" id="estimated_delivery" value="'.date("Y-m-d", strtotime($v->estimated_delivery)).'">';
                                            echo '</div>';
                                            echo '<tr>';
                                            echo '<td><input onclick="insert_raiting('.$v->rate_id.')" name="envio-'.$id_tienda.'" type="radio" value="'.$v->rate_id.'" class="envio_option"><img src="'.$v->carrier_logo_url.'" width="80" /></td>';
                                            echo '<td>'.$v->dynamic_service_name.'</td>';
                                            echo '<td>'.$v->total_amount.' '.$v->currency.'</td>';
                                            echo '<td>'.date("Y-m-d", strtotime($v->estimated_delivery)).'</td>';
                                            echo '</tr>';
                                            //echo '</form>';
                                                        
                                            endforeach;   

                                        endif;

                                    endforeach;

                                    endif;

                                 ?>


                            </tbody>
                        </table>

                    </div>

<!--                     <div class="col-xs-12 col-sm-3">

                    	<label>Guía</label>

                    	<input type="text" class="form-control" name="envio[guia]" required>

                    </div>

                    <div class="col-xs-12 col-sm-2">

                    	<label>Fecha de entrega</label>

                    	<input type="text" class="form-control datepicker" name="envio[fecha_entrega]" value="<?=date('Y-m-d')?>" required>

                    </div>

                    <div class="col-xs-12 col-sm-5">

                        <label>Comentarios</label>

                        <textarea name="comentarios" class="form-control">Su paquete va en camino.</textarea>

                    </div> -->

                    <div class="col-xs-12 col-sm-2">

                    	<br>

                    	<button <?=($raiting->num_rows()==0)?' disabled ':''?> type="submit" class="btn btn-primary">Generar Enviar</button>

                    </div>



                    </form>



                </div>

            </div>

        </div> 



    </div>

</div>

<script type="text/javascript">
    
    function insert_raiting(id_raiting){

        var id_envio = id_raiting;

        var id_venta = $("#" +id_envio+" #id_venta_raiting").val();
        var carrier = $("#" +id_envio+" #carrier").val();
        var carrier_service_code = $("#" +id_envio+" #carrier_service_code").val();
        var estimated_delivery = $("#" +id_envio+" #estimated_delivery").val();
        var total_amount = $("#" +id_envio+" #total_amount").val();

        $.post( "<?=base_url('admin/insert_raiting')?>",{id_venta:id_venta,carrier:carrier,carrier_service_code:carrier_service_code,estimated_delivery:estimated_delivery,total_amount:total_amount}, function( data ) {
            location.reload();
        });
    }

</script>