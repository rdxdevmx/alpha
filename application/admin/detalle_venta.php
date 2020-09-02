<!--Detalle de Venta-->    
<?php 
    $len = strlen($venta->id_venta);
    $zero = '';

    while($len<4){
        $zero=$zero.'0';
        $len ++ ;
    }

    $id_venta = "TB-".$zero.$venta->id_venta;
    $sub = $venta->monto - $venta->precio_envio;
?>       

<div id="page-wrapper">
	<div class="row">
    	<div class="col-xs-12">
        	<h1 class="page-header">Detalle de venta <?=$id_venta?></h1>
       	</div>
	</div>
    <?=$m?>    
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Datos de Usuario</div>                
                <div class="panel-body">
                    <div class="row"> 
                        <div class="col-xs-12">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tbody>
                                    <?php foreach($user->row_array() as $key => $value):?>
                                        <?php if($value):?>
                                            <tr>
                                                <?php if($key!='id_usuario'):?>
                                                    <td><?=ucfirst($key)?></td>
                                                    <td><?=$value?></td>
                                                <?php endif;?>    
                                            </tr>
                                        <?php endif;?> 
                                    <?php endforeach;?>    
                                    </tbody>                                
                                </table>
                            </div>
                        </div>
                    </div>
                </div>            
            </div>    
        </div>
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Detalle de venta</div>                
                <div class="panel-body">
                    <div class="row">                                        
                        <div class='col-xs-12 no-padding' style='margin-bottom:20px;'>
                            <div class='col-xs-3 rt'>Id Venta:</div><div class='col-xs-8'><?=$id_venta?></div>
                            <div class='col-xs-3 rt'>Fecha:</div><div class='col-xs-8'><?=$venta->fecha?></div>
                            <div class='col-xs-3 rt'>Estatus:</div><div class='col-xs-8'><?=$venta->estatus?></div>
                            <div class='col-xs-3 rt'>Subtotal:</div><div class='col-xs-8'>$ <?=number_format($sub, 2, '.', ',')?> MXN</div>
                            <div class='col-xs-3 rt'>Envio:</div><div class='col-xs-8'><?=$venta->txt_envio?></div>
                        </div>
                        <div class="col-xs-12">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Producto</th>
                                        <th>Cantidad</th>
                                        <th>Detalles</th>
                                        <th>Tienda</th>
                                        <th>Subtotal</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php 

                                        $raiting_array = array();

                                        foreach($buy->result() as $row): //print_r($row); 

                                        $raiting_array[$row->id_tienda]['id_raiting'] = $row->id_raiting;
                                        $raiting_array[$row->id_tienda]['tienda'] = $row->tienda;

                                    ?>
                                    <?php
                                        $len = strlen($row->id_producto);
                                        $zero = '';
                                        while($len<4){
                                            $zero=$zero.'0';
                                            $len ++ ;
                                        }
                                        $id_producto = "PD-".$zero.$row->id_producto;                                    
                                    ?>    
                                        <tr class='sold'>
                                            <td><?=$id_producto?></td>
                                            <td><?=$row->titulo?></td>
                                            <td><?=$row->cantidad?></td>
                                            <td><?=$row->resumen?></td>
                                            <td><?=$row->tienda?></td>
                                            <td>$<?=number_format($row->subtotal, 2, '.', ',')?> MXN</td>
                                        </tr>
                                    <?php endforeach;?>                                                                       
                                    </tbody>
                                    <tbody>

                                    <?php foreach($raiting_array as $k=>$v): ?>    
                                        <tr>
                                            <td colspan='4' class='right'><strong>Envio</strong></td>
                                            <td><?=$v['tienda']?></td>
                                            <td>
                                                <?php if($v['id_raiting'] == 0): ?>
                                                    $ 0 MXN
                                                    <?php else: ?>

                                                        <?php 
                                                            $raiting = $this->db->get_where('raiting', array('id_rating'=>$v['id_raiting']) );

                                                            foreach ($raiting->result() as $value) :
                                                                echo $value->carrier.'<br>';
                                                                echo '$ '.$value->total_amount.' MXN';
                                                            endforeach;

                                                        ?> 
                                                <?php endif; ?>   
                                            </td>
                                        </tr>    
                                     <?php endforeach;?>      

                                            <tr>
                                                <td colspan='5' class='right'><strong>Total</strong></td>
                                                <td>$<?=number_format($venta->monto, 2, '.', ',')?> MXN</td>
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
<style type="text/css">
    @media print{
        button{
            display: none !important;
        }     
    }      
</style>
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