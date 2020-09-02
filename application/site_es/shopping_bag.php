
<!--Shopping Bag-->
    <div class="bodi off">
        <div class="localizacion_pag">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <a href="<?=site_url()?>"><img src="<?=site_url()?>assets/assets/tribu-bazar-boton-home.png" alt="tribu bazar boton home">Home</a>
                        <span>></span>
                        <a href="<?=site_url('shopping_bag')?>">Carrito de Compras</a>
                    </div>
                </div>
            </div>
        </div>
       <section class="pg1 bx_gen_compras">
            <div class="container">
                <div class="row">


                    <?php if($desc>0): ?>
                        <div class="alert alert-success">
                            Se aplicará un  <strong><?=$desc?>% de descuento</strong> en la compra.
                        </div>
                    <?php endif;?>

                    <div class="col-xs-12">
                        <h2>CARRITO DE COMPRAS</h2>
                    </div>

                    <div id="product_table" class="col-xs-12">
                        <?=$m?>
                        <table class="table">                        
                            <tr class="op- hidden-xs">
                                <td class="w-" colspan="2">Descripción</td>
                                <td class="w--">Tus Opciones</td>
                                <td>Precio</td>
                            </tr>
                            <?php 

                                $total=0; 

                                $d = $desc;

                                $desc = ($desc>0)?(100-$desc)/100:1; 

                                if(isset($results)):

                                ?>
                               
                                <?php 

                                    foreach($results->result() as $row):
                                        $qty = $bag[$row->id_caracteristica]['cantidad'];
                                        $total = $total + ($qty*$row->precio*$desc);                                        
                                ?>                                
                                    <tr>
                                        <td colspan="2">
                                            <div class="bx_img">
                                                <img src="<?=site_url('files/'.$row->galeria.'/'.$row->foto)?>" alt="<?=$row->titulo?>">
                                            </div>
                                            <div class="bx_info">
                                                <p><?=$row->titulo?></p>
                                                <p class="visible-xs">Cantidad: <?=$bag[$row->id_caracteristica]['cantidad']?></p>
                                                <p class="visible-xs">Precio: $<?=number_format(($qty*$row->precio*$desc), 2, '.', ',')?> MXN</p>
                                                <a class="op-" href="javascript:void(0);" onclick='removeBag(<?=$row->id_caracteristica?>,<?=$row->id_tienda?>)'>Quitar</a>
                                                <a class="visible-xs" href="javascript:void(0);" onclick='editBag(<?=$row->id_caracteristica?>,<?=$qty?>,<?=$row->stock?>,<?=$row->precio?>)'>Editar Cantidad</a>
                                            </div>
                                            <div class="clearfix"></div>
                                        </td>
                                        <td class="hidden-xs">
                                            <p>Cantidad: <?=$qty?></p>
                                            <a href="javascript:void(0);" onclick='editBag(<?=$row->id_producto?>,<?=$qty?>,<?=$row->stock?>,<?=$row->precio?>,<?=$row->id_caracteristica?>)'>Editar Cantidad</a>
                                        </td>
                                        <td class="hidden-xs">
                                            <p>Price $<?=number_format(($qty*$row->precio*$desc), 2, '.', ',')?> MXN</p>
                                        </td>
                                    </tr>

                                <?php endforeach;?>
                            <?php endif;?>
                        </table>
                    </div>
                    <?php if(isset($results)):?>
                        <div class="col-xs-12 col-sm-6 col-sm-push-6">
                            <div class="bx_total">
                                
                                <h3>Total antes de envío <span id='total' data-total='<?=$total?>'>$<?=number_format(($total), 2, '.', ',')?> MXN</span></h3>
                                <!--<h4 style='color:#888'>Listo para enviar de 3 a 5 días hábiles</h4>    -->   
                                
<!--                                 <p style='color:#888; font-size:13px;'>* Compras en México llega de 7 a 14 días Habiles<br>
																		* Compras en Europa, Estados Unidos y Canada 25 días habiles</p>                                                          
                                 -->

                                <p style='color:#888; font-size:13px;'> * Envíos a Ciudad de México de 1-3 días.<br>

                                    * Envíos al resto de la República Mexicana de 2-4 días.<br>

                                    * Envíos al resto del mundo 7-10 días.</p>

                               <?php $complete_address = 1; ?>

                                <?php if($usuario->pais=='' || $usuario->estado=='' || $usuario->municipio=='' || $usuario->calle=='' || $usuario->colonia  =='' || $usuario->cp=='' || $usuario->telefono==''): ?>    
                                
                                <a href="<?=base_url('account')?>">Completar registro dirección</a>
                                
                                <?php $complete_address = 0; ?>    

                                <?php else: ?>
                                <a href="javascript:void(0);" onclick='selectShip()'>Seguir comprando</a>
                                <?php endif; ?>

                            </div>
                        </div>
                    <?php endif;?>
                </div>
            </div>
        </section>
    </div>
<!--Shopping Bag-->
<!--Modal-->    
<div id="edit" class="modal fade" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header modal-head">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 style='margin-bottom:0px'>Editar Cantidad
                    <img src="<?=base_url()?>assets/assets/tribu-bazar-compras.png" alt="tribu bazar compras" width="20px" style="margin-left:20px; "> </h3>                  
            </div>
            <div class="modal-body">
                <div class='row'>
                    <div class='col-xs-12'>
                        <form method="post" action="<?=base_url('home/update_bag')?>">
                            <input type="hidden" name="id_caracteristica" value="">
                            <label>Número de productos</label>
                            <input type="number" class="form-control" name="cantidad" value="">
<!--                         <div class='col-xs-12 well-it'>
                            <div class='col-xs-4 center'><span class='glyphicon glyphicon-plus pointer' onclick='add()'></span></div>
                            <div class='col-xs-4 center how' data-qty='0' data-id='0' data-price='0'><span class='qtty'></span></div>
                            <div class='col-xs-4 center'><span class='glyphicon glyphicon-minus pointer' onclick='minus()'></span></div>
                        </div> -->
                    </div>
                    <div class='col-xs-12 bx_formulario'>
                        <button type="submit" class="btn btn-info bt op-">Actualizar</button>
                        </form>
                    </div>           
                </div>
            </div>
        </div>
    </div>
</div>
<!--Modal-->
<!--Modal-->    
<div id="ship" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-head">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 style='margin-bottom:0px'>Tipo de Envio
                    <img src="<?=base_url()?>assets/assets/tribu-bazar-compras.png" alt="tribu bazar compras" width="20px" style="margin-left:20px; "> 
                </h3>
            </div>
            <div class="modal-body">
                <div class='row'>
                    <div class='col-xs-12 form-group'>                                            
                        <h3>Información de Envío</h3>                    
                        <div class="form-group">        
                            <label>País:</label>        
                            <select class="form-control" id="pais" name="pais" readonly onchange="get_states(),select_envio()">        
                            <option value="0">--Select country--</option>        
                            <?php
                                foreach($countries->result() as $country):
                                    if($usuario->pais==$country->id):
                                        $selected = ' selected="selected" ';
                                    else:
                                        $selected = '';	
                                    endif;
                            ?>	
                            <option <?=$selected?> value="<?=$country->id?>"><?=$country->name?></option>   
                            <?php endforeach;?>
                            </select>
                        </div>
                        <div class="form-group">        
                            <label>Estado / Provincia / Región:</label>
                            <select readonly data-onload="load_states()" selected_value="<?=$usuario->estado?>" class="form-control" id="estado" name="estado" onchange="select_envio()"></select>
                        </div>
        
                        <div class="col-xs-6 form-group no-left">       
                            <label>Municipio / Ciudad :</label>
                            <input readonly type="text" id="municipio" name="municipio" class="form-control" value="<?=$usuario->municipio?>" required>        
                        </div>
                        
                        <div class="col-xs-6 form-group no-right">
                            <label>CP:</label>
                            <input readonly type="text" id="cp" name="cp" class="form-control" value="<?=$usuario->cp?>"   required>
                        </div>                      
        
                        <div class="form-group">        
                            <label>Dirección:</label>        
                            <input readonly type="text" id="calle" name="calle" class="form-control" value="<?=$usuario->calle?>"   required>        
                        </div>        
                        <div class="form-group">
                            <label>Información Adicional:</label>
                            <textarea readonly id="referencia" name="referencia" class="form-control"><?=$usuario->referencia?></textarea>
                        </div>

                        <?php 
                            $current_parcels = $this->Tribubazar->get_current_parcels();
                        ?>

                        <?php if($total <= 1000): ?>

                      	<h3>Información de Envío</h3>

                        <p>El envío se genera por la cantidad de tiendas que están involucradas.</p>

                            <?php   

                                $data['cp_destino']= $usuario->cp;

                                $response_array = array(); 

                                foreach ($current_parcels as $key => $value): //print_r($value); 

                                    $data['parcels'] =  $value;
                                    $data['cp_origen'] = $this->Tribubazar->get_cp_destino($key);
                                    // echo '<pre>';
                                    // print_r($data);

                                    $id_tienda = $key;

                                   
                                    $response_array = $this->Envio->cotizar_envio($data);

                                    //print_r($data);

                                    //$response_array= ['free'=>['total_amount'=>0]];

                                    //print_r($response_array);

                                    //echo '</pre>';
                            ?>
                            
                            <div class="table-responsive">                     
                            <table id="table-envio" class="table">
                                <thead>
                                   <tr>
                                    <th></th>
                                    <th>Mensajería</th>
                                    <th>Costo</th>
                                    <th>Entrega estimada</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                <?php 

                                    foreach (array_keys($response_array) as $key => $value):
                                    
                                        if(!empty($response_array[$value])):
                                    
                                        foreach ($response_array[$value] as $v):
                                            echo '<div id="'.$v->rate_id.'">';
                                            echo '<input type="hidden" id="carrier" value="'.$v->carrier.'">';
                                            echo '<input type="hidden" id="total_amount" value="'.$v->total_amount.'">';
                                            echo '<input type="hidden" id="carrier_service_code" value="'.$v->carrier_service_code.'">';
                                            echo '<input type="hidden" id="estimated_delivery" value="'.date("Y-m-d", strtotime($v->estimated_delivery)).'">';
                                            echo '</div>';
                                            echo '<tr>';
                                            echo '<td><input onclick="get_rate('.$v->rate_id.','.$id_tienda.')" name="envio-'.$id_tienda.'" type="radio" value="'.$v->rate_id.'" class="envio_option"><img src="'.$v->carrier_logo_url.'" width="80" /></td>';
                                            echo '<td>'.$v->dynamic_service_name.'</td>';
                                            echo '<td>'.$v->total_amount.' '.$v->currency.'</td>';
                                            echo '<td>'.date("Y-m-d", strtotime($v->estimated_delivery)).'</td>';
                                            echo '</tr>';
                                                        
                                                              //echo '<p><stong>id envio: </strong>'.$v->shipment_id.'</p>';
                                                              // echo '<input type="hidden" class="'.$v->rate_id.'" name="carrier" value="'.$v->carrier.'">';
                                                              // echo '<input type="hidden" class="'.$v->rate_id.'" name="carrier_service_name" value="'.$v->carrier_service_name.'">';
                                                              // echo '<input type="hidden" class="'.$v->rate_id.'" name="carrier_service_code" value="'.$v->carrier_service_code.'">';
                                                              // echo '<input type="hidden" class="'.$v->rate_id.'" name="estimated_delivery" value="'.$v->estimated_delivery.'">';
                                                              // echo '<input type="hidden" class="'.$v->rate_id.'" name="total_amount" value="'.$v->total_amount.'">';
                                                              // echo '<input onclick="get_rate('.$v->rate_id.')" name="envio" type="radio" class="envio_option"><img src="'.$v->carrier_logo_url.'" width="80" />';
                                                              // echo '<p><stong>Tipo de envío: </strong>'.$v->dynamic_service_name.'<br>';
                                                              // echo '<stong>Paquetería: </strong>'.$v->carrier_service_name.'<br>';
                                                              // echo '<stong>Fecha de entrega estimada: </strong>'.$v->estimated_delivery.'<br>';
                                                              // echo '<stong>Precio envío: </strong>'.$v->total_amount.' '.$v->currency.'</p>';

                                                              // echo '<hr>';
                                            endforeach;   

                                        endif;

                                    endforeach;

                                 ?>
                                
                                </tbody>
                            </table>  
                            </div>

                            <?php endforeach; ?> 

                        <?php else: ?>
                            
                            <h3>Envío gratuito</h3>
                            <div id="table-envio"></div>

                        <?php endif; ?>

                        <?php 
                            //print_r($usuario);

                            // if($usuario->pais == 142):

                            //     if($usuario->estado == 2435):
                            //         $current_envio = 1;
                            //     else:
                            //         $current_envio = 2;
                            //     endif;

                            // else:
                            //     $current_envio = 3;
                            // endif;    

                        ?>
<!--                         <select id='shipment' class='form-control' readonly> 
                            <?php foreach($shipping->result() as $ship): $s = ($ship->id_envio == $current_envio)?' selected ':''; ?>
                                <option <?=$s?> value='<?=$ship->id_envio?>'><?=$ship->txt_envio?>  $<?=number_format(($ship->precio_envio * $total_tiendas), 2, '.', ',')?> MXN</option>
                            <?php endforeach;?>
                        </select> -->
                    </div>
                    <div class='col-xs-12 bx_formulario'>
                        <button type="button" class="btn btn-info bt op-" id='btn-buy' onclick="buy()">Continuar</button>
                        <!-- <button type="button" class="btn btn-info bt op-  hidden" id='btn-false'>Continuar</button> -->
                    </div>           
                </div>
            </div>
        </div>
    </div>
</div>
<!--Modal-->
<style type="text/css">
    .well-it{
        padding: 10px;
        background-color: #f5f5f5;
        border: 1px solid #e3e3e3;
        border-radius: 4px;        
    }
    label{
        font-size:13px;
    }
    .no-left{
        padding-left: 0px;
    }
    .no-right{
        padding-right: 0px;
    }
    .pointer{
        cursor: pointer;
    }
    .center{
        text-align: center;
    }
    .modal-head{
        background-color: #F5F5F5;
    }
    .h2{
        font-family: 'caviar_dreams_B', Helvetica, sans-serif;
        font-size: 15px;
    }
    .well{
        margin-bottom: 0px;
    }
    textarea{
        resize: vertical !important;
        overflow: hidden;
    }
</style>

<script type="text/javascript"> 

    function get_rate(rate_id, id_tienda){
        
        //console.log(rate_id);

        var id_envio = rate_id;

        var envio = {
            "carrier": $("#"+id_envio+" #carrier").val(),
            "carrier_service_code": $("#"+id_envio+" #carrier_service_code").val(),
            //"carrier_service_name": $("#"+id_envio+" #estimated_delivery").val(),
            "estimated_delivery": $("#"+id_envio+" #estimated_delivery").val(),
            //"rate_id": id_envio,
            "total_amount": $("#"+id_envio+" #total_amount").val()
        };


        $.post( "<?=base_url('home/save_envio')?>",{id_tienda:id_tienda,envio:envio}, function( data ) {
            console.log(data);
        });

    }

    function select_envio(){

        var pais = $("#pais").val();
        var estado = $("#estado").val();

        if(pais == 142){

            if(estado == 2435){
                $("#shipment").val(1);
            }else{
                $("#shipment").val(2);
            }

        }else{
            $("#shipment").val(3);
        }

    }

	function load_function(){
		$('[data-onload]').each(function(){
			eval($(this).data('onload'));
		});
	}	
	function load_states(){
		get_states();
	}
	function get_states(){		
		var  country_id = $("#pais").val();
		var selected_value = $("#estado").attr("selected_value");
		$.ajax({
			   url:"<?=base_url()?>account/get_states",
			   data: {country_id:country_id, selected_value:selected_value},       
			   type: 'POST',
			   success: function(data){
					$("#estado").html(data);                     
			   }
		});	
	}
	function update_address(data){		
		$.ajax({			
			url:"<?=site_url('account/edit_address')?>",	
			data: data,       	
			method: 'POST',	
			dataType: 'json'			
		});	
	}	
	function validate_address(){		
		var pais = $("#pais").val();
		var estado = $("#estado").val();
		var municipio = $("#municipio").val();
		var calle = $("#calle").val();
		var cp = $("#cp").val();
		var referencia = $("#referencia").val();
		
        var data = {pais:pais,estado:estado,municipio:municipio,calle:calle,cp:cp,referencia:referencia};
		
		if(pais==0){
			alert('You must select a country');
			return false;
		}else if(estado==0){
			alert('You must select a State / Province /Region');
			return false;
		}else if(municipio==''){
			alert('You must fill in the field Municipality / City');
			return false;
		}else if(calle==''){
			alert('You must fill in the field Address');
			return false;
		}else if(cp ==''){
			alert('You must fill in the field ZIP');
			return false;
		}else{
			update_address(data);
			return true;
		}	
	}
    
    function buy(){

        // $( "#btn-buy" ).addClass('hidden');
        // $( "#btn-false" ).removeClass('hidden');
        
        var envio = $('#shipment').val();
        var monto = $('#total').data('total');
		
		var product_table = $("#product_table").html();
        var envio_table = $("#table-envio").html();

		if(validate_address() ){
			$.ajax({
				url:"<?=site_url()?>home/buy_bag",
				data: {monto: monto, envio: envio , product_table:product_table, envio_table:envio_table},       
				method: 'POST',
				dataType: 'json',
				success: function(data){
                   resultado = data;          
				   console.log(data);
				   if(data.order){
                        id = data.order;
						location.href='<?=site_url()?>detail?order='+id;
				   }
				},
                complete : function(xhr){
                    console.log(resultado);
                    //location.href='<?=site_url()?>detail?order='+id;
                },
                error: function(data){
                    console.log(data);
                },
                async: false
			});		
		}
    }   

    function selectShip(){		
		get_states();	
        $('#ship').modal('show');
    }

    function saveEdit(){
        var qty = $('.how').data('qty');        
        var id = $('.how').data('id');  
        var sub = $('.how').data('price') * qty;  
        $.ajax({
            url:"<?=base_url()?>home/save_bag",
            data: { id: id, cantidad: qty, subtotal:sub},       
            method: 'POST',
            dataType: 'json',
            success: function(data){
                location.reload();

            }
        });

        $('#edit').modal("hide")
    }    
    function removeBag(id,id_tienda){

        $.ajax({
            url:"<?=base_url()?>home/delete_bag",
            data: { borrar: id},       
            method: 'POST',
            dataType: 'json',
            success: function(data){
                location.reload();
            }
        });
    }

    function editBag(id,qty,stock,price,id_caracteristica){
        
        //var html = '<span class="qtty">'+qty+'</span>';

        $('#edit .modal-body input[type=hidden]').val(id_caracteristica);
        $('#edit .modal-body input[type=number]').val(qty);

        // $('.qtty').remove();
        // $('.how').append(html);
        // $('.how').data('qty',qty);        
        // $('.how').data('id',id);        
        // $('.how').data('stock',stock);
        // $('.how').data('price',price);
        $('#edit').modal('show');        
    }

    function add(){
        var qty = $('.how').data('qty');        
        var stock = $('.how').data('stock');  
        qty = qty + 1;
        if(qty<=stock){
            var html = '<span class="qtty">'+qty+'</span>';
            $('.qtty').remove();
            $('.how').append(html);
            $('.how').data('qty',qty);        
        }
    }
    function minus(){
        var qty = $('.how').data('qty');        
        var stock = $('.how').data('stock');  
        qty = qty - 1;
        if(qty>0){
            var html = '<span class="qtty">'+qty+'</span>';
            $('.qtty').remove();
            $('.how').append(html);
            $('.how').data('qty',qty);        
        }
    }    
	
</script>