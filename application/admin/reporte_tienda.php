<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/js/bootstrap-datepicker.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/css/bootstrap-datepicker.css" rel="stylesheet">

<!--Agregar Atributos-->    
<div id="page-wrapper">
	<div class="row">
    	<div class="col-lg-12">
        	<h1 class="page-header">Reporte de Tiendas</h1>
       	</div>
	</div>
    <?=$m?>    
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Ver Tiendas</div>                
                <div class="panel-body">
                    <div class="row"> 
                        <div class="col-xs-12">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>
                                            Tienda <span class='glyphicon glyphicon-triangle-bottom pointer' onclick='filter("cliente")'></span>
                                        </th>
                                        <th class='left'>
                                            Ventas <span class='glyphicon glyphicon-triangle-bottom pointer' onclick='orderSolds()'></span>
                                        </th>
                                        <th class='left'>
                                            Subtotal
                                        </th>                                        
                                        <th class='left'>
                                            Comisión
                                        </th>
                                        <th class='left'>
                                            Total</span>
                                        </th>
                                        <th class='left'>
                                            Periodo <span class='glyphicon glyphicon-triangle-bottom pointer' onclick='filter("fecha")'></span>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($ventas as $row):?>

                                    <?php 
                                        $comision = $row->total * .15;
                                        $monto = $row->total -($row->total*.15);
                                        $len = strlen($row->id_tienda);
                                        $zero = '';
                                        while($len<4){
                                            $zero=$zero.'0';
                                            $len ++ ;
                                        }
                                        $id_tienda = "TD-".$zero.$row->id_tienda;        

                                        if(isset($_GET['fecha1']) && isset($_GET['fecha2'])):
                                            $date1= date("M-Y", strtotime($_GET['fecha1']));
                                            $date2= date("M-Y", strtotime($_GET['fecha2']));
                                            $date = $date1.' '.$date2;
                                        else:
                                            $date = date("M-Y");
                                        endif;    

                                    ?>                                           
                                        <tr class='sold' onclick='soldDetail(<?=$row->id_tienda?>)'>
                                            <td><?=$id_tienda?></td>
                                            <td><?=$row->tienda?></td>
                                            <td class='left'><?=$row->ventas?></td>
                                            <td class='left'>$<?=number_format($row->total, 2, '.', ',')?> mxn</td>
                                            <td class='left'>$<?=number_format($comision, 2, '.', ',')?> mxn</td>
                                            <td class='left'>$<?=number_format($monto, 2, '.', ',')?> mxn</td>
                                            <td class="left"><?=$date;?></td>
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
<?php
    $get = 0;  
    if(isset($_GET['tienda']))
        $get = $_GET['tienda'];
?>
<div id="cliente" class="modal fade" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header add-product">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Buscar Tienda</h4>
            </div>
            <div class="modal-body">
                <div class='row'>
                    <div class='col-xs-12 form-group'>
                        <input type='text' class='form-control' data-tienda='<?=$get?>' id='tiendas' placeholder="Ingresa tienda">
                    </div>
                    <div class="col-xs-12 right">
                        <button class='btn btn-info' onclick='searchStore()'>Buscar</button>                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Modal-->
<!--Modal-->    
<?php
    $date1 = 0;  
    $date2 = 0;  
    if(isset($_GET['fecha1']) && isset($_GET['fecha2'])):
        $date1 = $_GET['fecha1'];
        $date2 = $_GET['fecha2'];
    endif;
?>
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
                                <input type="text" class="form-control" id='fecha1' data-pick="<?=$date1?>" name='fecha1' required>
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </div>
                            </div>
                        </div>
                        <div class='col-xs-12 no-padding mod-title'>Fecha 2: </div>
                        <div class='col-xs-12 no-padding form-group'>
                            <div class="input-group date" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                                <input type="text" class="form-control" id='fecha2' data-pick="<?=$date2?>" name='fecha2' required>
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
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
        minViewMode: 1
    }); 
    function filter(id){
        $('#'+id).modal('show');
    }
    function soldDetail(id){
        if($('#fecha1').data('pick')!=0 && $('#fecha2').data('pick')!=0)
            location.href="<?=site_url()?>admin/detalle_tienda?tienda="+id+"&fecha1="+$('#fecha1').data('pick')+"&fecha2="+$('#fecha2').data('pick');
        else                
            location.href="<?=site_url()?>admin/detalle_tienda?tienda="+id;            
    }
    function sendDates(){
        if($('#fecha1').val() && $('#fecha2').val()){
            if($('#tiendas').data('tienda') != 0)
                location.href='<?=site_url()?>admin/reporte_tienda?tienda='+$('#tiendas').data('tienda')+'&fecha1='+$('#fecha1').val()+'&fecha2='+$('#fecha2').val();
            else
                location.href='<?=site_url()?>admin/reporte_tienda?fecha1='+$('#fecha1').val()+'&fecha2='+$('#fecha2').val();               
        }
    }
    function orderSolds(){
        location.href='<?=site_url()?>admin/reporte_tienda?ventas=1';
    }
    function searchStore(){
        if($('#tiendas').val())
            location.href='<?=site_url()?>admin/reporte_tienda?tienda='+$('#tiendas').val();
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
</script>