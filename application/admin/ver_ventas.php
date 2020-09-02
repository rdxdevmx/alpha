<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/js/bootstrap-datepicker.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/css/bootstrap-datepicker.css" rel="stylesheet">
<!--Agregar Atributos-->    
<div id="page-wrapper">
	<div class="row">
    	<div class="col-lg-12">
        	<h1 class="page-header">Ver ventas</h1>
       	</div>
	</div>
    <?=$m?>    
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Ver ventas</div>                
                <div class="panel-body">
                    <div class="row"> 
                        <div class="col-xs-12">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>
                                            Cliente <span class='glyphicon glyphicon-triangle-bottom pointer' onclick='filter("cliente")'></span>
                                        </th>
                                        <th>
                                            Estatus <span class='glyphicon glyphicon-triangle-bottom pointer' onclick='filter("estatus")'></span>
                                        </th>
                                        <th>
                                            Fecha <span class='glyphicon glyphicon-triangle-bottom pointer' onclick='filter("fecha")'></span>
                                        </th>
                                        <th>
                                            Monto <span class='glyphicon glyphicon-triangle-bottom pointer'></span>
                                        </th>
                                        <th>
                                            Editar
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($buy as $row):?>
                                    <?php
                                        $len = strlen($row->id_venta);
                                        $zero = '';
                                        while($len<4){
                                            $zero=$zero.'0';
                                            $len ++ ;
                                        }
                                        $id_venta = "TB-".$zero.$row->id_venta;                                    
                                    ?>    
                                        <tr class='sold'>
                                            <td onclick='javascript:location.href="<?=site_url()?>admin/detalle_venta?venta=<?=$this->Encryption->encode($row->id_venta)?>"'>
                                                <?=$id_venta?>
                                            </td>
                                            <td onclick='javascript:location.href="<?=site_url()?>admin/detalle_venta?venta=<?=$this->Encryption->encode($row->id_venta)?>"'>
                                                <?=$row->nombre?>
                                            </td>
                                            <td onclick='javascript:location.href="<?=site_url()?>admin/detalle_venta?venta=<?=$this->Encryption->encode($row->id_venta)?>"'>
                                                <span id='st-<?=$row->id_venta?>'><?=$row->estatus?></span>
                                            </td>
                                            <td onclick='javascript:location.href="<?=site_url()?>admin/detalle_venta?venta=<?=$this->Encryption->encode($row->id_venta)?>"'>
                                                <?=$row->fecha?>
                                            </td>
                                            <td onclick='javascript:location.href="<?=site_url()?>admin/detalle_venta?venta=<?=$this->Encryption->encode($row->id_venta)?>"'>
                                                $<?=number_format($row->monto, 2, '.', ',')?> mxn
                                            </td>
                                            <td onclick='modalStatus(<?=$row->id_venta?>)'><span class='glyphicon glyphicon-pencil'></span></td>
                                        </tr>
                                    <?php endforeach;?>                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>            
            </div>
            <div class='col-xs-12'>
                <div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate">
                    <ul class="pagination">
                        <?=$links?>
                    </ul>
                </div>                                
            </div>   
        </div>
    </div>    
</div>
<!--Agregar Atributos-->    
<!--Modal-->    
<div id="cliente" class="modal fade" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header add-product">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Buscar Cliente</h4>
            </div>
            <div class="modal-body">
                <div class='row'>
                    <div class='col-xs-12 form-group'>
                        <input type='text' class='form-control' id='user' placeholder="Ingresa cliente">
                    </div>
                    <div class="col-xs-12 right">
                        <button class='btn btn-info' onclick='searchCliente()'>Buscar</button>                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Modal-->

<!--Modal-->    
<div id="cambiar-estatus" class="modal fade" role="dialog" data-venta='0'>
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header add-product">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Cambiar Estatus</h4>
            </div>
            <div class="modal-body">
                <div class='row'>
                    <div class='col-xs-12 form-group'>
                        <select class='form-control' id='change' onchange="changeStatus()">
                            <option value=''>Selecciona un estatus...</option>>
                            <?php foreach($estatus as $st):?>
                            <option value='<?=$st?>'><?=$st?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="col-xs-12 right">
                        <button class='btn btn-info'>Aceptar</button>                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Modal-->

<!--Modal-->    
<div id="estatus" class="modal fade" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header add-product">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Filtrar Estatus</h4>
            </div>
            <div class="modal-body">
                <div class='row'>
                    <div class='col-xs-12 form-group'>
                        <select class='form-control' id='status'>
                            <option value=''>Selecciona un estatus...</option>>
                            <?php foreach($estatus as $st):?>
                            <option value='<?=$st?>'><?=$st?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="col-xs-12 right">
                        <button class='btn btn-info' onclick="sendStatus()">Buscar</button>                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Modal-->
<!--Modal-->    
<div id="fecha" class="modal fade" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header add-product">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Filtrar Fechas</h4>
            </div>
            <div class="modal-body">
                <div class='row'>
                    <div class='col-xs-12'>
                        <div class='col-xs-12 no-padding mod-title'>Fecha 1: </div>
                        <div class='col-xs-12 no-padding form-group'>
                            <div class="input-group date" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                                <input type="text" class="form-control" id='fecha1' name='fecha1' required>
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </div>
                            </div>
                        </div>
                        <div class='col-xs-12 no-padding mod-title'>Fecha 2: </div>
                        <div class='col-xs-12 no-padding form-group'>
                            <div class="input-group date" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                                <input type="text" class="form-control" id='fecha2' name='fecha2' required>
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 right">
                        <button class='btn btn-info' onclick='sendDates()'>Buscar</button>                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Modal-->
<script type="text/javascript">
    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd'
    }); 
    function filter(id){
        $('#'+id).modal('show');
    }
    function sendDates(){
        if($('#fecha1').val() && $('#fecha2').val()){
            location.href='<?=site_url()?>admin/ver_ventas?fecha1='+$('#fecha1').val()+'&fecha2='+$('#fecha2').val();
        }
    }
    function sendStatus(){
        if($('#status').val()!=''){
            location.href='<?=site_url()?>admin/ver_ventas?estatus='+$('#status').val();
        }
    }
    function searchCliente(){
        if($('#user').val()!=''){
            location.href='<?=site_url()?>admin/ver_ventas?cliente='+$('#user').val();
        }
    }   
   function agregarValor(){
        var parent = $('#add').data('parent');
        var nombre = $('#add').val();
        if( nombre.length>2){
            $.ajax({
                url:"<?=base_url()?>admin/add_valor",
                data: { id_atributo: parent,
                        valor: nombre},       
                method: 'POST',
                dataType: 'json',
                success: function(data){
                    console.log(data);
                    $('#t-body').remove();
                    $(data.html).insertAfter('#t-head');
                    $('#add').val('');
                }
            });     
        }       
    }
    function modalStatus(id){
        $('#cambiar-estatus').modal('show');
        $('#cambiar-estatus').data('venta',id);
    }
    function changeStatus(){
        var change = $('#change').val();
        var venta = $('#cambiar-estatus').data('venta');      
          
        if(change){
            $.ajax({
                url:"<?=base_url()?>admin/change_status",
                data: { id: venta, estatus: change},       
                method: 'POST',
                dataType: 'json',
                success: function(data){
                    $('#st-'+venta).text(change);
                    $('#cambiar-estatus').modal('hide');
                }
            });     
        }               
    }    
</script>