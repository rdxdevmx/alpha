<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/js/bootstrap-datepicker.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/css/bootstrap-datepicker.css" rel="stylesheet">

<!--Agregar Atributos-->    
<div id="page-wrapper">
	<div class="row">
    	<div class="col-lg-12">
        	<h1 class="page-header">Reporte por Categoría</h1>
       	</div>
	</div>
    <?=$m?>    
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Ver Categorías</div>                
                <div class="panel-body">
                    <div class="row"> 
                        <div class="col-xs-12">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>
                                            Categoría <span class='glyphicon glyphicon-triangle-bottom pointer' onclick='filter("prd")'></span>
                                        </th>
                                        <th class='center'>
                                            <span class='glyphicon glyphicon-triangle-top pointer' onclick='order("ventas","DESC")'></span>                    
                                            Ventas 
                                            <span class='glyphicon glyphicon-triangle-bottom pointer' onclick='order("ventas","ASC")'></span>                   
                                        </th>
                                        <th class='left'>
                                            Total <span class='glyphicon glyphicon-triangle-bottom pointer' onclick='filter("total")'></span>
                                        </th>                                       
                                        <th class='left'>
                                            Periodo <span class='glyphicon glyphicon-triangle-bottom pointer' onclick='filter("fecha")'></span>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $ventas_total = $total = 0; 
                                        foreach($ventas as $row):
                                        $len = strlen($row->id_categoria);
                                        $zero = '';
                                        while($len<4){
                                            $zero=$zero.'0';
                                            $len ++ ;
                                        }
                                        $idp = "CT-".$zero.$row->id_categoria;

                                        if($row->ventas)
                                            $ventas = $row->ventas;
                                        else 
                                            $ventas = 0;  

                                        if(isset($_GET['fecha1']) && isset($_GET['fecha2'])):
                                            $date1= date("M-Y", strtotime($_GET['fecha1']));
                                            $date2= date("M-Y", strtotime($_GET['fecha2']));
                                            $date = $date1.' '.$date2;
                                        else:
                                            $date = date("M-Y");
                                        endif;    
                                    ?>                                           
                                        <tr class='sold' onclick='categoryDetail(<?=$row->id_categoria?>)'>
                                            <td><?=$idp?></td>
                                            <td><?=$row->categoria?></td>
                                            <td class='center'><?=$ventas?></td>
                                            <td class='left'>$<?=number_format($row->total, 2, '.', ',')?> mxn</td>
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
<div id="prd" class="modal fade" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header add-product">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Buscar Producto</h4>
            </div>
            <div class="modal-body">
                <div class='row'>
                    <div class='col-xs-12 form-group'>
                        <input type='text' class='form-control' id='producto' placeholder="Ingresa producto">
                    </div>
                    <div class="col-xs-12 right">
                        <button class='btn btn-info' onclick='search("producto")'>Buscar</button>                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Modal-->
<!--Modal-->    
<?php
    $get = 0;  
    if(isset($_GET['categoria']))
        $get = $_GET['categoria'];
?>
<div id="tnd" class="modal fade" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header add-product">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Buscar por Tienda</h4>
            </div>
            <div class="modal-body">
                <div class='row'>
                    <div class='col-xs-12 form-group'>
                        <input type='text' class='form-control' data-cat='<?=$get?>' id='cats' placeholder="Ingresa categoria">
                    </div>
                    <div class="col-xs-12 right">
                        <button class='btn btn-info' onclick='search("tienda")'>Buscar</button>                    
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
    function filter(id){
        $('#'+id).modal('show');
    }
    function sendDates(){
        var cat = $('#cats').data('cat');
        if($('#fecha1').val() && $('#fecha2').val()){
            if(cat != 0)
                location.href='<?=site_url()?>admin/reporte_tienda?categoria='+cat+'&fecha1='+$('#fecha1').val()+'&fecha2='+$('#fecha2').val();
            else
                location.href='<?=site_url()?>admin/reporte_tienda?fecha1='+$('#fecha1').val()+'&fecha2='+$('#fecha2').val();               
        }
    }    
    function categoryDetail(id){
        if($('#fecha1').data('pick')!=0 && $('#fecha2').data('pick')!=0)
            location.href="<?=site_url()?>admin/detalle_categoria?categoria="+id+"&fecha1="+$('#fecha1').data('pick')+"&fecha2="+$('#fecha2').data('pick');
        else                
            location.href="<?=site_url()?>admin/detalle_categoria?categoria="+id;            
    }
    function search(key){
        var param = $('#'+key).val();
        if(param.length >3)
            location.href='<?=site_url()?>admin/reporte_producto?'+key+'='+param;
    }
    function order(by,dir){
        location.href='<?=site_url()?>admin/reporte_producto?'+by+'='+dir;
    }
</script>