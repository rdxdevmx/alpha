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
                    <div class="col-xs-12">
                        <h2>CARRITO DE COMPRAS</h2>
                    </div>
                    <div id="product_table" class="col-xs-12">
                        <table class="table">                        
                            <tr class="op- hidden-xs">
                                <td class="w-">Descripción</td>
                                <td class="w--">Tus Opciones</td>
                                <td>Precio</td>
                            </tr>
                            <?php $total=0; if(isset($results)):?>
                                <?php foreach($results->result() as $row):
                                        $qty = $bag[$row->id_caracteristica]['cantidad'];
                                        $total = $total + ($qty*$row->precio);
                                ?>                                
                                    <tr>
                                        <td>
                                            <div class="bx_img">
                                                <img src="<?=site_url('files/'.$row->galeria.'/'.$row->foto)?>" alt="<?=$row->titulo?>">
                                            </div>
                                            <div class="bx_info">
                                                <p><?=$row->titulo?></p>
                                                <p class="visible-xs">Cantidad: <?=$bag[$row->id_caracteristica]['cantidad']?></p>
                                                <p class="visible-xs">Precio: $<?=number_format(($qty*$row->precio), 2, '.', ',')?> MXN</p>
                                                <a class="op-" href="javascript:void(0);" onclick='removeBag(<?=$row->id_caracteristica?>)'>Quitar</a>
                                                <a class="visible-xs" href="javascript:void(0);" onclick='editBag(<?=$row->id_caracteristica?>,<?=$qty?>,<?=$row->stock?>,<?=$row->precio?>)'>Editar Cantidad</a>
                                            </div>
                                            <div class="clearfix"></div>
                                        </td>
                                        <td class="hidden-xs">
                                            <p>Cantidad: <?=$qty?></p>
                                            <a href="javascript:void(0);" onclick='editBag(<?=$row->id_caracteristica?>,<?=$qty?>,<?=$row->stock?>,<?=$row->precio?>)'>Editar Cantidad</a>
                                        </td>
                                        <td class="hidden-xs">
                                            <p>Price $<?=number_format(($qty*$row->precio), 2, '.', ',')?> MXN</p>
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
                                
                                <p style='color:#888; font-size:13px;'>* Compras en México llega de 7 a 14 días Habiles<br>
																		* Compras en Europa, Estados Unidos y Canada 25 días habiles</p>                                                          
                                <a href="javascript:void(0);" onclick='selectShip()'>Seguir comprando</a>
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
                        <div class='col-xs-12 well-it'>
                            <div class='col-xs-4 center'><span class='glyphicon glyphicon-plus pointer' onclick='add()'></span></div>
                            <div class='col-xs-4 center how' data-qty='0' data-id='0' data-price='0'><span class='qtty'></span></div>
                            <div class='col-xs-4 center'><span class='glyphicon glyphicon-minus pointer' onclick='minus()'></span></div>
                        </div>
                    </div>
                    <div class='col-xs-12 bx_formulario'>
                        <button type="button" class="btn btn-info bt op-" onclick='saveEdit()'>Aceptar</button>
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
                            <select class="form-control" id="pais" name="pais" onchange="get_states()">        
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
                            <select data-onload="load_states()" selected_value="<?=$usuario->estado?>" class="form-control" id="estado" name="estado"></select>
                        </div>
        
                        <div class="col-xs-6 form-group no-left">       
                            <label>Municipio / Ciudad :</label>
                            <input type="text" id="municipio" name="municipio" class="form-control" value="<?=$usuario->municipio?>" required>        
                        </div>
                        
                        <div class="col-xs-6 form-group no-right">
                            <label>CP:</label>
                            <input type="text" id="cp" name="cp" class="form-control" value="<?=$usuario->cp?>"   required>
                        </div>                      
        
                        <div class="form-group">        
                            <label>Dirección:</label>        
                            <input type="text" id="calle" name="calle" class="form-control" value="<?=$usuario->calle?>"   required>        
                        </div>        
                        <div class="form-group">
                            <label>Información Adicional:</label>
                            <textarea id="referencia" name="referencia" class="form-control"><?=$usuario->referencia?></textarea>
                        </div>
                      	<h3>Información de Envío</h3>
                        <select id='shipment' class='form-control'> 
                            <?php foreach($shipping->result() as $ship):?>
                                <option value='<?=$ship->id_envio?>'><?=$ship->txt_envio?>  $<?=number_format(($ship->precio_envio), 2, '.', ',')?> MXN</option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class='col-xs-12 bx_formulario'>
                        <button type="button" class="btn btn-info bt op-" id='btn-buy' onclick="buy()">Continuar</button>
                        <button type="button" class="btn btn-info bt op-  hidden" id='btn-false'>Continuar</button>
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

        $( "#btn-buy" ).addClass('hidden');
        $( "#btn-false" ).removeClass('hidden');
        var envio = $('#shipment').val();
        var monto = $('#total').data('total');
		
		var product_table = $("#product_table").html();

		if(validate_address() ){
			$.ajax({
				url:"<?=site_url()?>home/buy_bag",
				data: {monto: monto, envio: envio , product_table:product_table},       
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
    }    
    function removeBag(id){
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
    function editBag(id,qty,stock,price){
        var html = '<span class="qtty">'+qty+'</span>';
        $('.qtty').remove();
        $('.how').append(html);
        $('.how').data('qty',qty);        
        $('.how').data('id',id);        
        $('.how').data('stock',stock);
        $('.how').data('price',price);
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