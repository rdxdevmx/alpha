<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Envíos</h1>
        </div>
	
		<div class="col-lg-12">
        	<?=$m?>
            
            <div id="breadcrumb">
            	<a href="<?=site_url('admin')?>">Home</a> <a href="<?=site_url('admin/envios')?>">Envíos</a>
            </div>
            
            <div class="panel panel-default">
                <div class="panel-heading">
                    Editar opción de envío
                </div>
                
                <div class="panel-body">
					
                    <form method="post" action="<?=site_url('admin/update_envio')?>"> 
                    	<input type="hidden" name="id_envio" value="<?=$envios->id_envio?>">
                    	<label>Descripción del envío</label>
                        <input type="text" name="txt_envio" class="form-control" value="<?=$envios->txt_envio?>" required>
                        <label>Precio del envío</label>
                        <input type="text" name="precio_envio" class="form-control" value="<?=$envios->precio_envio?>" required>
                        <input type="submit" class="btn btn-primary" value="Editar">
                        
                    </form>
                    
                </div>
            </div>
		</div>

</div>        