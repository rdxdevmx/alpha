<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Editar cliente</h1>
        </div>


        <div class="col-lg-12">
			<?=$m?>  
            <div class="panel panel-default">

                <div class="panel-heading">
                    Editar cliente
                </div>
                <div class="panel-body">

                	<form method="post" action="<?=base_url('admin/update_cliente')?>">

                	<input type="hidden" name="id_usuario" value="<?=$cliente->id_usuario?>">

                	<div class="col-xs-12">
                		<label>Nombre</label>
                		<input class="form-control" name="nombre" value="<?=$cliente->nombre?>">
                	</div>
                	<div class="col-xs-12">
                		<label>Email</label>
                		<input class="form-control" name="email" value="<?=$cliente->email?>">
                	</div>
                	<div class="col-xs-12">
                		<label>Contraseña</label>
                		<input class="form-control" type="password" name="password">
                	</div>
                	<div class="col-xs-12">
                		<label>Repite Contraseña</label>
                		<input class="form-control" type="password">
                	</div>

                	<div class="col-xs-12">
                		<label>Teléfono</label>
                		<input class="form-control" name="telefono" value="<?=$cliente->telefono?>">
                	</div>
                	<div class="col-xs-12">
                		<label>País</label>
                		<select class="form-control">
                			<?php 
                				foreach ($countries->result() as $v) :
                					$s = ($v->id == $cliente->pais)?' selected ':'';
                			?>
	                			<option <?=$s?> value="<?=$v->id?>"><?=$v->name?></option>
                			<?php
                				endforeach;
                			?>
                		</select>
                	</div>
                	<div class="col-xs-12">
                		<label>Estado</label>
                		<select class="form-control">
                			<?php 
                				foreach ($states->result() as $v) :
                					$s = ($v->id == $cliente->estado)?' selected ':'';
                			?>
	                			<option <?=$s?> value="<?=$v->id?>"><?=$v->name?></option>
                			<?php
                				endforeach;
                			?>
                		</select>
                	</div>
                	<div class="col-xs-12">
                		<label>Colonia</label>
                		<input class="form-control" name="colonia" value="<?=$cliente->colonia?>">
                		
                	</div>
                	<div class="col-xs-12">
                		<label>Municipio</label>
                		<input class="form-control" name="municipio" value="<?=$cliente->municipio?>">
                	</div>
                	<div class="col-xs-12">
                		<label>Calle</label>
                		<input class="form-control" name="calle" value="<?=$cliente->calle?>">
                	</div>
                	<div class="col-xs-12">
                		<label>CP</label>
                		<input class="form-control" name="cp" value="<?=$cliente->cp?>">
                	</div>
                	<div class="col-xs-12">
                		<label>Referencia</label>
                		<input class="form-control" name="referencia" value="<?=$cliente->referencia?>">
                	</div>

                	<div class="col-xs-12">
                		<br>
                		<button type="submit" class="btn btn-success">Guardar</button>
                	</div>

                	</form>

                </div>

            </div>    
        </div>     

    </div>
</div>