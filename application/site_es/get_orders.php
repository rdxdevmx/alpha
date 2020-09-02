<!--Shopping Bag-->
    <div class="bodi off">
        <div class="localizacion_pag">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <a href="index.html"><img src="<?=site_url()?>assets/assets/tribu-bazar-boton-home.png" alt="tribu bazar boton home">Home</a>
                        <span>></span>
                        <a href="compras.html">Costumer Orders</a>
                    </div>
                </div>
            </div>
        </div>

       <section class="pg1 bx_gen_compras">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <h2>ORDERS SUMMARY</h2>
                    </div>
                    <div class="col-xs-12">
                        <table class="table">                        
                            <tr class="op- hidden-xs">
                                <td class="w--">Id Buy</td>
                                <td class="w--">Date</td>
                                <td>Status</td>
                                <td>Amount</td>
                            </tr>

                            <?php if(isset($buy)):?>
                                <?php foreach($buy->result() as $row):?>                                
                                    <?php 
                                        $len = strlen($row->id_venta);
                                        $zero = '';

                                        while($len<4){
                                            $zero=$zero.'0';
                                            $len ++ ;
                                        }

                                        $id_venta = "TB-".$zero.$row->id_venta;
                                    ?>

                                    <tr class='buy' onclick='buyDetail(<?=$row->id_venta?>)'>
                                        <td><?=$id_venta?></td>
                                        <td><?=$row->fecha?></td>
                                        <td><?=$row->estatus?></td>
                                        <td>$<?=$row->monto?> MXN</td>
                                    </tr>
                                <?php endforeach;?>
                            <?php endif;?>

                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
<!--Shopping Bag-->

<!--Modal-->    
<div id="buy" class="modal fade" role="dialog">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header modal-head">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 style='margin-bottom:0px'>Buy Detail TB-0016
                    <img src="<?=site_url()?>assets/assets/tribu-bazar-compras.png" alt="tribu bazar compras" width="20px" style="margin-left:20px;"> 
                </h3>                  
            </div>
            <div class="modal-body">
                <div class='row'>
                    <div class='col-xs-12'>
                       <section class="pg1 bx_gen_compras">
                            <div class="container">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <table class="table">                        
                                            <tr class="op- hidden-xs" id='modal-tr'>
                                                <td >Id Product</td>
                                                <td >Product</td>
                                                <td>Quantity</td>
                                                <td>Amount</td>
                                            </tr> 
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </section>                                                               
                    </div>
                    <div class='col-xs-6 bx_formulario'>
                        <button type="button" class="btn btn-info bt op-" data-dismiss='modal'>Print</button>
                    </div>           
                </div>
            </div>
        </div>
    </div>
</div>
<!--Modal-->

<script type="text/javascript">
    function buyDetail(venta){
        $('#buy').modal('show');
        $.ajax({
            url:"<?=base_url()?>home/get_buy",
            data: { venta:venta},       
            method: 'POST',
            dataType: 'json',
            success: function(data){
            }
        });        
    }
</script>