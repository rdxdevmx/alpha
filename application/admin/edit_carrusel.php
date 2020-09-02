<div id="page-wrapper">

    <div class="row">

        <div class="col-lg-12">

            <h1 class="page-header">Carrusel</h1>
			<?=$m?>
        </div>
        
        <div class="col-lg-12">
        	<div class="panel panel-default">
            	<div class="panel-heading">
                	Subir imagen
                </div>
                <div class="panel-body">
                    <form method="post" action="<?=site_url('admin/update_carrusel')?>" enctype="multipart/form-data">
                    	<input type="hidden" name="id_carrusel" value="<?=$carrusel->id_carrusel?>">
                        <div class="form-group">
                            <div class="col-lg-4">
                            	<label>Imagen actual</label>
                            	<img src="<?=site_url('files/carrusel/'.$carrusel->imagen)?>" width="180">
                                <label>Cambiar imagen</label>
                                <input type="file" name="imagen"  />
                            </div>
                            <div class="col-lg-8">
                                <label>Link:</label>
                                <input type="text" name="url" class="form-control" value="<?=$carrusel->url?>" />
                            </div>
                        </div>
                        <input class="btn btn-primary" type="submit" value="Editar" />
                    </form>
                </div>
            </div>

                
        </div>
        
	</div>

</div>            