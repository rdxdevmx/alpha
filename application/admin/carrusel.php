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
                    <form method="post" action="<?=site_url('admin/insert_carrusel')?>" enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="col-lg-4">
                                <label>Agregar imagen</label>
                                <input type="file" name="imagen" required />
                            </div>
                            <div class="col-lg-8">
                                <label>Link:</label>
                                <input type="text" name="url" class="form-control" />
                            </div>
                        </div>
                        <input class="btn btn-primary" type="submit" value="Guardar" />
                    </form>
                </div>
            </div>
            
            <div class="panel panel-default">
            	<div class="panel-heading">
                	Imágenes del carrusel
                </div>
                <div class="panel-body">
                	<div class="table-responsive">
                    	<table class="table table-striped">
                        	<thead>
                                <tr>
                                    <th>Imágenes</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            	<?php
                                	foreach($carrusel->result() as $row):
								?>
                            	<tr>
                                	<td width="40%">
                                    	<img src="<?=site_url('files/carrusel/'.$row->imagen)?>" width="180">
                                    </td>
                                    <td class="acciones" valign="middle">
                                    	<a href="<?=site_url('admin/edit_carrusel/?id_carrusel='.$row->id_carrusel)?>"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a>
                                        <a class="confirma" href="<?=site_url('admin/delete_carrusel/?id_carrusel='.$row->id_carrusel.'&foto='.$row->imagen)?>"><i class="fa fa-trash fa-2x" aria-hidden="true"></i></a>
                                    </td>
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