<?php session_start(); ?>
    <div class="bodi off">
        <div class="localizacion_pag">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <a href="<?=site_url()?>"><img src="<?=site_url()?>assets/assets/tribu-bazar-boton-home.png" alt="tribu bazar boton home">Home</a>
                        <span>></span>
                        <a href="<?=site_url('account')?>">Mi Cuenta</a>
                        <?php
                        	$username = explode(" ",$this->session->userdata('username'));
						?>
                        
                    </div>
                </div>
            </div>
        </div>
		
        <section class="pg1">
            <div class="container">
            <h3>Hola ,<?=$username[0]?></h3>

                <?php if($usuario->pais=='' || $usuario->estado =='' || $usuario->municipio =='' || $usuario->colonia =='' || $usuario->calle =='' || $usuario->telefono =='' || $usuario->cp ==''): ?>
                <div class="alert alert-warning">
                  <strong>Atención</strong> Debes de agregar la dirección para poder comenzar a comprar.
                </div>
                <?php endif; ?>

                <div class="row">
							<?=$m?>
                    <div class="col-xs-12 col-sm-6">
                        <div class="row">
                            <div class="col-xs-12 col-md-7">
								<div class="bx_formulario">
                                	<h3>Mi Cuenta</h3>
                                    <button type="button" class="btn btn-info btn-lg bt op-" data-toggle="modal" data-target="#edit-account">Editar Cuenta</button>
                                    <button onclick="load_states()" type="button" class="btn btn-info btn-lg bt op-" data-toggle="modal" data-target="#edit-address">Editar Dirección</button>
                                    <?php if($this->session->userdata('fb')!=TRUE):?>                                    
                                        <button type="button" class="btn btn-info btn-lg bt op-" data-toggle="modal" data-target="#edit-password">Editar Contraseña</button>
                                    <?php endif;?>
                                </div>
                                	
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <div class="row">
                            <div class="col-xs-12 col-md-7">
                            	<div class="bx_formulario">
									<h3>Compras</h3>
                                    <a class="bt op-" href="<?=site_url()?>view_orders">Ver Compras</a>
								</div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    
     <!-- Modal -->
  <div class="modal fade" id="edit-account" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar Cuenta</h4>
        </div>
        <div class="modal-body">
        	
            <form class="bx_formulario" action="<?=site_url('account/edit_account')?>" method="post">
            	<input type="hidden" name="id_usuario" value="<?=$id_usuario?>">
                <div class="form-group">
                	<label>Nombre:</label>
                    <input type="text" name="nombre" class="form-control" value="<?=$usuario->nombre?>"   required>
                </div>
                <!--<div class="form-group">
                	<label>Surname:</label>
                    <input type="text" name="surname" class="form-control"   required>
                </div>-->
                <?php if($this->session->userdata('fb')!=TRUE):?>
                    <div class="form-group">
                        <label>Email:</label>
                        <input type="email" name="email" class="form-control" value="<?=$usuario->email?>"  required pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}">
                    </div>
                <?php endif;?>
                <div class="form-group">
                	<label>Teléfono:</label>
                    <input type="text" name="telefono" value="<?=$usuario->telefono?>" class="form-control"   required>
                </div> 
                <div class="form-group">
                	<button type="submit" class="bt" value="SEND">Editar</button>
                </div>
                
        	</form>
            
        </div>
      </div>
      
    </div>
  </div>
     <!-- Modal -->
  <div class="modal fade" id="edit-address" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar Dirección</h4>
        </div>
        <div class="modal-body">
        	
            <form class="bx_formulario" action="<?=site_url('account/edit_address')?>" method="post">
                <div class="form-group">
                	<label>País:</label>
                    <select class="form-control" id="pais" name="pais" onchange="get_states()">
                    	<option value="0">--Seleccion país--</option>
                        <?php
                        	foreach($countries->result() as $country):
								if($usuario->pais==$country->id):
									$selected = ' selected="selected" ';
								else:
									$selected = '';	
								endif;
						?>	
                        	<option <?=$selected?> value="<?=$country->id?>"><?=$country->name?></option>
                        <?php
                        	endforeach;
						?>
                    </select>
                </div>
                <div class="form-group">
                	<label>Estado / Provincia /Región:</label>
                    <select data-onload="load_states()" selected_value="<?=$usuario->estado?>" class="form-control" id="estado" name="estado"></select>
                </div>
                
                <div class="form-group">
                	<label>Municipio / Ciudad :</label>
                    <input type="text" name="municipio" class="form-control" value="<?=$usuario->municipio?>"   required>
                </div>

                <div class="form-group">
                    <label>Colonia:</label>
                    <input type="text" name="colonia" class="form-control" value="<?=$usuario->colonia?>"   required>
                </div>

                
                <div class="form-group">
                	<label>Dirección:</label>
                    <input type="text" name="calle" class="form-control" value="<?=$usuario->calle?>"   required>
                </div>
                
                <div class="form-group">
                    <label>Teléfono:</label>
                    <input type="text" pattern=".{10,}" minlength="10" title="El teléfono debe de tener mínimo 10 números" name="telefono" class="form-control" value="<?=$usuario->telefono?>"   required>
                </div>

                <div class="form-group">
                	<label>Código Postal:</label>
                    <input type="text" name="cp" class="form-control" value="<?=$usuario->cp?>"   required>
                </div>
                
                <div class="form-group">
                	<label>Información Adicional:</label>
                    <textarea id="referencia" name="referencia" class="form-control"><?=$usuario->referencia?></textarea>
                </div>
                
                <div class="form-group">
                	<button type="submit" class="bt" value="SEND">Editar</button>
                </div>
                
        	</form>
            
        </div>
      </div>
      
    </div>
  </div>
     <!-- Modal -->
  <div class="modal fade" id="edit-password" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar Contraseña</h4>
        </div>
        <div class="modal-body">
        	
            <form class="bx_formulario" action="<?=site_url('account/change_password')?>" method="post">
            	<input type="hidden" name="id_usuario" value="<?=$id_usuario?>">
                <div class="form-group">
                	<label>Contraseña:</label>
                    <input type="password" name="password" class="form-control"  required>
                </div>
                <div class="form-group">
                	<label>Confirmar Contraseña:</label>
                    <input type="password" name="password2" class="form-control"  required>
                </div>
                
                <div class="form-group">
                	<button type="submit" class="bt" value="SEND">Editar</button>
                </div>
                
        	</form>
            
        </div>

      </div>
      
    </div>
  </div>
<!--Crear-Cuenta-->
<script>
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
</script>                