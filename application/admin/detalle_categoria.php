<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/js/bootstrap-datepicker.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/css/bootstrap-datepicker.css" rel="stylesheet">
<!--Detalle de Venta-->    
<div id="page-wrapper">
    <div class="row">
        <div class="col-xs-12">
            <h1 class="page-header">Detalle de categoria <?=$categoria->categoria?></h1>
        </div>
    </div>
    <?=$m?>    
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">Detalle de categoria</div>                
                <div class="panel-body">
                    <div class="row">
                        <?php   $len = strlen($_GET['categoria']);
                                $zero = '';
                                while($len<4){
                                    $zero=$zero.'0';
                                    $len ++ ;
                                }
                                $id_cat = "CT-".$zero.$_GET['categoria'];      

                                if(isset($_GET['fecha1']) && isset($_GET['fecha2'])):
                                    $date1= date("M-Y", strtotime($_GET['fecha1']));
                                    $date2= date("M-Y", strtotime($_GET['fecha2']));
                                    $date = $date1.' '.$date2;
                                else:
                                    $date = date("M-Y");
                                endif; 
                        ?>                    
                        <div class='col-xs-12' style='margin-bottom:20px'>
                            <div class='col-xs-3'>Id Categoria</div><div class='col-xs-8'><?=$id_cat?></div>
                            <div class='col-xs-3'>Categoria</div><div class='col-xs-8'><?=$categoria->categoria?></div>
                            <div class='col-xs-3'>Periodo</div><div class='col-xs-8'><?=$date?></div>
                        </div>
                        <div class="col-xs-12">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Producto</th>
                                        <th>Tienda</th>                                        
                                        <th class="center">Ventas</th>
                                        <th>Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $ventas_total = $total = 0;?>
                                    <?php foreach($productos->result() as $row):
                                            
                                            $len = strlen($row->id_producto);
                                            $zero = '';
                                            while($len<4){
                                                $zero=$zero.'0';
                                                $len ++ ;
                                            }
                                            $id_producto = "PD-".$zero.$row->id_producto;   
                                            
                                        if($row->ventas):
                                            $ventas = $row->ventas;
                                    ?>
                                        <tr class='sold'>
                                            <td><?=$id_producto?></td>
                                            <td><?=$row->titulo?></td>
                                            <td><?=$row->tienda?></td>
                                            <td class='center'><?=$ventas?></td>
                                            <td>$ <?=number_format($row->total, 2, '.', ',')?> MXN</td>
                                        </tr>
                                    <?php
                                        else:
                                            $ventas = 0;            
                                        endif;     

                                        $ventas_total = $ventas_total + $ventas;
                                        $total = $total+$row->total; 
                                    ?>    
                                    <?php endforeach;?> 
                                    <?php if($ventas_total == 0):?>
                                            <td colspan='5' class='center'>No hay ventas</td>   
                                    <?php endif;?>
                                    </tbody>    
                                    <tbody>                                 
                                        <tr>
                                            <td colspan='3' class='right'><strong>Total</strong></td>
                                            <td class='center'><?=$ventas_total?></td>
                                            <td>$ <?=number_format($total, 2, '.', ',')?> MXN</td>
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