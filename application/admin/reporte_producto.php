<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/js/bootstrap-datepicker.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/css/bootstrap-datepicker.css" rel="stylesheet">

<!--Agregar Atributos-->    
<div id="page-wrapper">
	<div class="row">
    	<div class="col-lg-12">
        	<h1 class="page-header">Reporte por Productos</h1>
       	</div>
	</div>
    <?=$m?>    
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Ver Productos</div>                
                <div class="panel-body">
                    <div class="row"> 
                        <div class="col-xs-12">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>
                                            Producto <span class='glyphicon glyphicon-triangle-bottom pointer' onclick='filter("prd")'></span>
                                        </th>
                                        <th class='left'>
                                            <span class='glyphicon glyphicon-triangle-top pointer' onclick='order("precio","DESC")'></span>                    
                                            Precio 
                                            <span class='glyphicon glyphicon-triangle-bottom pointer' onclick='order("precio","ASC")'></span> 
                                        </th>  
                                        <th class='left'>Tienda <span class='glyphicon glyphicon-triangle-bottom pointer' onclick='filter("tnd")'></span></th>
                                        <th class='center'>
                                            <span class='glyphicon glyphicon-triangle-top pointer' onclick='order("ventas","DESC")'></span>                    
                                            Ventas 
                                            <span class='glyphicon glyphicon-triangle-bottom pointer' onclick='order("ventas","ASC")'></span>                   
                                        </th>
                                        <th class='left'>Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($ventas as $row):
                                        $len = strlen($row->id_producto);
                                        $zero = '';
                                        while($len<4){
                                            $zero=$zero.'0';
                                            $len ++ ;
                                        }
                                        $idp = "PD-".$zero.$row->id_producto;

                                        if($row->ventas)
                                            $ventas = $row->ventas;
                                        else 
                                            $ventas = 0;            
                                    ?>                                           
                                        <tr class='sold'>
                                            <td><?=$idp?></td>
                                            <td><?=$row->titulo?></td>
                                            <td class='left'>$<?=number_format($row->precio, 2, '.', ',')?> mxn</td>
                                            <td class='left'><?=$row->tienda?></td>
                                            <td class='center'><?=$ventas?></td>
                                            <td class='left'>$<?=number_format($row->total, 2, '.', ',')?> mxn</td>
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
                        <input type='text' class='form-control' id='tienda' placeholder="Ingresa Tienda">
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

<script type="text/javascript">
    function filter(id){
        $('#'+id).modal('show');
    }
    function productDetail(id){              
        location.href="<?=site_url()?>admin/detalle_producto?producto="+id;            
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