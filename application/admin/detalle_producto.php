<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/js/bootstrap-datepicker.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/css/bootstrap-datepicker.css" rel="stylesheet">
<!--Detalle de Venta-->    
<div id="page-wrapper">
    <div class="row">
        <div class="col-xs-12">
            <h1 class="page-header">Detalle de Producto <?=$producto->titulo?></h1>
        </div>
    </div>
    <?=$m?>    
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">Detalle de tienda</div>                
                <div class="panel-body">
                    <div class="row"> 
                        <div class='col-xs-12' style='margin-bottom:20px'>
                            <div class='col-xs-3'>Tienda</div><div class='col-xs-8'><?=$producto->tienda?></div>
                        </div>
                        <div class="col-xs-12">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Producto</th>
                                        <th class="center">Cantidad</th>
                                        <th>Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $len = strlen($producto->id_producto);
                                            $zero = '';
                                            while($len<4){
                                                $zero=$zero.'0';
                                                $len ++ ;
                                            }
                                            $id_producto = "PD-".$zero.$producto->id_producto;                                               
                                    ?>
                                        <tr class='sold'>
                                            <td><?=$id_producto?></td>
                                            <td><?=$producto->titulo?></td>
                                            <td class='center'><?=$producto->ventas?></td>
                                            <td>$ <?=number_format($producto->total, 2, '.', ',')?> MXN</td>
                                        </tr>
                                    </tbody>                                   
                                </table>
                            </div>
                        </div>
                    </div>
                </div>            
            </div>    
        </div>
    </div>   
    <div class='row'>
        <div class="col-xs-12 right">
            <button class='btn btn-info' onclick='javascript:window.print();'>Imprimir</button><br><br>
        </div>
    </div> 
</div>
<!--Detalle de Venta-->    
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
                        <input type='text' class='form-control' placeholder="Ingresa cliente">
                    </div>
                    <div class="col-xs-12 right">
                        <button class='btn btn-info'>Buscar</button>                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Modal-->
<script type="text/javascript">
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