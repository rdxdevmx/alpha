<?php 
	$tipo = $this->session->userdata('tipo');
?>
<div id="page-wrapper">
	<div class="row">
    	<div class="col-lg-12">
    		<h1 class="page-header">Pago a tiendas</h1>
    	</div>
    </div>

    <?=$m?>

    <div class="row">
        <div class="col-lg-12">
	        <div class="panel panel-default">
                <div class="panel-heading">Búsqueda</div>                
	                <div class="panel-body">
                    
                    <form method="get">
                      <input type="hidden" id="tienda" name="id_tienda" value="<?=(isset($_GET['id_tienda']) && $_GET['id_tienda']!='')?$_GET['id_tienda']:''?>" />

                      <?php if(isset($tipo) && $tipo==0): ?>
                      <div class="col-xs-12 col-sm-3">
                        <label>Tienda</label>
                        <input id="tiendas-auto" class="form-control" value="<?=$nom_tienda?>" />
                      </div>
                      <?php endif; ?>

                      <div class="col-xs-12 col-sm-3">
                        <label>Fecha 1</label>
                        <input class="form-control datepicker" name="f1" value="<?=(isset($_GET['f1']) && $_GET['f1']!='')?$_GET['f1']:''?>">
                      </div>
                      <div class="col-xs-12 col-sm-3">
                        <label>Fecha 2</label>
                        <input class="form-control datepicker" name="f2" value="<?=(isset($_GET['f2']) && $_GET['f2']!='')?$_GET['f2']:''?>">
                      </div>
                      <div class="col-xs-12 col-sm-3">
                        <br>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i> Buscar</button>
                        
                        <?php $link = (isset($_GET['id']) && $_GET['id']!='')?base_url('admin/pago_tiendas/?id='.$_GET['id']):base_url('admin/pago_tiendas'); ?>
                        <a href="<?=$link?>" class="btn btn-primary"><i class="fa fa-refresh" aria-hidden="true"></i></a>
                      </div>


                    </form>

	                </div>
	            </div>
	        </div>
    </div>


	<div class="row">
        <div class="col-lg-12">
	        <div class="panel panel-default">
                <div class="panel-heading">
                	Listado de Pagos a tiendas

                	<?php if(isset($tipo) && $tipo==0): ?>
                	<a href="#" data-toggle="modal" data-target="#modal-pago" class="btn btn-primary btn-xs pull-right"><span class="glyphicon glyphicon-plus-sign"></span> Agregar pago</a>
                	<?php endif; ?>
                </div>                

	                <div class="panel-body">

                        <div class="table-responsive">
                        	<table class="table table-striped">
								<thead>
                                    <tr>
                                    	<th>Tienda</th>
                                    	<th>Monto</th>
                                        <th>Fecha</th> 
                                        <th>Comprobante</th>                                 
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	<?php foreach ($results as $v) : ?>
                                	<tr>
                                		<td><?=$v->tienda?></td>
                                		<td>$ <?=number_format($v->monto,2)?></td>
                                		<td><?=$v->fecha?></td>
                                		<td>
                                			<a href="<?=base_url('files/'.$v->id_tienda.'/'.$v->comprobante)?>" class="btn btn-primary btn-xs"><i class="fa fa-file-text-o" aria-hidden="true"></i> Comprobante</a>
                                		</td>
                                		<td>
                                			<?php if(isset($tipo) && $tipo==0): ?>
                                			<a download class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></a>
                                			<?php endif; ?>
                                		</td>
                                	</tr>
                                	<?php endforeach; ?>
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
<div id="modal-pago" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Pagos a tiendas</h4>
      </div>
      <div class="modal-body">
      	<div class="row">
      		<form method="post" action="<?=base_url('admin/insert_pago_tienda/')?>" enctype="multipart/form-data">
      			
      			<input type="hidden" id="tienda" name="id_tienda" value="<?=$id_tienda?>" />

	      		<div class="col-xs-12 col-sm-4">
	      			<label>Tienda</label>
					<input type="text" id="tiendas-auto" class="form-control ui-autocomplete-input" value="<?=$nombre_tienda?>" <?=($nombre_tienda=='')?'':'readonly'?>  required="required" autocomplete="off">
	      		</div>
	      		<div class="col-xs-12 col-sm-2">
	      			<label>Monto</label>
	      			<input class="form-control" name="monto">
	      		</div>
	      		<div class="col-xs-12 col-sm-2">
	      			<label>Fecha</label>
	      			<input class="form-control datepicker" name="fecha">
	      		</div>
	      		<div class="col-xs-12 col-sm-2">
	      			<label>Comprobante</label>
	      			<input type="file" name="comprobante">
	      		</div>
	      		<div class="col-xs-12 col-sm-2">
	      			<br>
	      			<button class="btn btn-primary">Agregar pago</button>
	      		</div>

      		</form>
      	</div>
      </div>
      <div class="modal-footer"></div>
    </div>

  </div>
</div>

<script type="text/javascript">
	 // $.datepicker.regional['es'] = {
	 // closeText: 'Cerrar',
	 // prevText: '< Ant',
	 // nextText: 'Sig >',
	 // currentText: 'Hoy',
	 // monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
	 // monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
	 // dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
	 // dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
	 // dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
	 // weekHeader: 'Sm',
	 // dateFormat: 'dd/mm/yy',
	 // firstDay: 1,
	 // isRTL: false,
	 // showMonthAfterYear: false,
	 // yearSuffix: ''
	 // };
	 // $.datepicker.setDefaults($.datepicker.regional['es']);

	// $('.datepicker').datepicker({
	//     format: 'yyyy-mm-dd'
	// });
</script>