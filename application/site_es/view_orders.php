<!--Shopping Bag-->
    <div class="bodi off">
        <div class="localizacion_pag">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <a href="<?=site_url()?>"><img src="<?=site_url()?>assets/assets/tribu-bazar-boton-home.png" alt="tribu bazar boton home">Home</a>
                        <span>></span>
                        <a href="<?=site_url('view_orders')?>">Costumer Orders</a>
                    </div>
                </div>
            </div>
        </div>
       <section class="pg1 bx_gen_compras">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <h2>Listado de Compras</h2>
                    </div>
                    <div class="col-xs-12">
                        <table class="table">                        
                            <tr class="op- ">
                                <td class="w--">Id Compra</td>
                                <td class="w--">Fecha</td>
                                <td>Estatus</td>
                                <td>Monto</td>
                                <td></td>
                            </tr>
                            <?php if(isset($buy)):?>
                                <?php foreach($buy->result() as $row): //print_r($row); ?>                                
                                    <?php 
                                        $len = strlen($row->id_venta);
                                        $zero = '';
                                        while($len<4){
                                            $zero=$zero.'0';
                                            $len ++ ;
                                        }
                                        $id_venta = "TB-".$zero.$row->id_venta;

                                        $id = $this->Encryption->encode($row->id_venta);
                                    ?>
                                    <!--<tr class='buy' onclick='buyDetail(<?=$row->id_venta?>,"<?=$row->fecha?>","<?=$row->estatus?>",<?=$row->monto?>,"<?=$id_venta?>")'>-->
                                    <!-- <tr class='buy' onclick='javascript:location.href="<?=site_url()?>detail?order=<?=$id?>"'> -->
                                    <tr>    
                                        <td><?=$id_venta?></td>
                                        <td><?=$row->fecha?></td>
                                        <td><?=$row->estatus?></td>
                                        <td>$<?=number_format(($row->monto), 2, '.', ',')?> MXN</td>
                                        <td>
                                            <a class="bt-devolver" href="<?=site_url()?>detail?order=<?=$id?>">Ver compra</a>
                                        </td>   
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
<div id="buy" class="modal fade printable" role="dialog">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="row tribu-logo">
                 <div class='col-xs-12'>
                    <div class="panel panel-default">
                        <div class="panel-heading center">          
                            <img src="<?=site_url()?>assets/assets/tribu-bazar-logotipo.png"  alt="tribu bazar logotipo" height='60px'>
                        </div>    
                    </div>    
                 </div>
            </div>        
            <div class="modal-header modal-head">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 style='margin-bottom:0px'>Buy Detail <img src="<?=site_url()?>assets/assets/tribu-bazar-compras.png" alt="tribu bazar compras" width="20px" style="margin-left:20px;"> 
                </h3>                  
            </div>
            <div class="modal-body">
                <div class='row'>
                    <div class='col-xs-12 details bottom-20'>
                        <div class='col-xs-4 rt'>Id Buy</div><div class='col-xs-8'><span id='venta'></span></div>
                        <div class='col-xs-4 rt'>Date</div><div class='col-xs-8'><span id='date'></span></div>
                        <div class='col-xs-4 rt'>Status</div><div class='col-xs-8'><span id='status'></span></div>
                        <div class='col-xs-4 rt'>Subtotal</div><div class='col-xs-8'><span id='amount'></span></div>
                    </div>
                    <div class='col-xs-12'>
                        <table class="table">                        
                            <tr class="op- modal-tr" id='modal-tr' height='40px'>
                                <td >Id Product</td>
                                <td >Product</td>
                                <td>Quantity</td>
                                <td>Amount</td>
                            </tr>
                            <tr>
                                <td class='right rt' colspan='3'>+Shipping</td>
                                <td><span id='shipping'></span></td>
                            </tr> 
                            <tr>
                                <td class='right rt' colspan='3'>Total</td>
                                <td><span id='total'></span></td>
                            </tr>                             
                        </table>
                    </div>
                    <div class='col-xs-6 bx_formulario'>
                        <button type="button" class="btn btn-info bt op-" onclick='javascript:window.print();'>Print</button>
                    </div>
                    <div class='col-xs-6 bx_formulario hidden' id='pay'>
                   	<!--boton de  paypal de pruebas -->
                        <!--<button type="button" class="btn btn-info bt op-">Pay</button>-->
                        <form target="_blank" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
                            <input type="hidden" name="cmd" value="_xclick">
                            <input type="hidden" name="business" value="richo_shmc-facilitator@yahoo.com.mx">
                            <input type="hidden" name="return" value="<?=site_url('home/success')?>">
                            <input type="hidden" name="cancel_return" value="<?=site_url('home/cancel')?>">
                            <input type="hidden" name="notify_url" value="<?=site_url('home/procces_pay')?>">
                            <input type="hidden" name="lc" value="MX">
                            <input type="hidden" name="item_number" value="">
                            <input type="hidden" name="item_name" value="">
                            <input type="hidden" name="amount" value="">
                            <input type="hidden" name="currency_code" value="MXN">
                            <input type="hidden" name="button_subtype" value="services">
                            <input type="hidden" name="no_note" value="0">
                            <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynowCC_LG.gif:NonHostedGuest">
                            <!--<input type="image" src="https://www.paypalobjects.com/es_XC/MX/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal, la forma más segura y rápida de pagar en línea.">
                            <img alt="" border="0" src="https://www.paypalobjects.com/es_XC/i/scr/pixel.gif" width="1" height="1">-->
                            <input type="submit" value="Pay with Paypal" name="submit" title="PayPal - The safer, easier way to pay online!" class="paypal_btn">
                        </form>
                    <!--boton de  paypal de pruebas -->
                    </div>                      
                </div>         
            </div>
        </div>
    </div>
</div>
<!--Modal-->
<style type="text/css">
	.paypal_btn{
		display: inline-block;
		font-family: 'caviar_dreams_B';
		font-size: 14px;
		color: rgba(255,255,255,.7);
		text-align: center;
		text-transform: uppercase;
		text-decoration: none;
		border-radius: 3px;
		width: 100%;
		padding: 10px 0px;
		margin-top: 1em;
		margin-bottom: 1em;
		border: 0px;
		border-radius: 0;
		background-color: #f27a71;
		transition-duration: .2s;
	}
	.paypal_btn:hover{	
		color: rgba(255,255,255,1);
		transition-duration:.2s;
	}
    @media print {
        .pg1,.localizacion_pag,.breadcrumbs,.header,.footer.paypal_btn,h2,button{ display: none !important;}
        #buy,.tribu-logo{ display: block !important;}    
    }
    .tribu-logo{
        display: none;
    }
    .buy:hover{
        cursor: pointer;
        background-color: #eaeaea;
    }
    .pointer{
        cursor: pointer;
    }
    .right{
        text-align: right;
    }
    .center{
        text-align: center;
    }
    .modal-head{
        background-color: #F5F5F5;
    }
    .h2{
        font-family: 'caviar_dreams_B', Helvetica, sans-serif;
        font-size: 15px;
    }
    .rt,.modal-tr{
        font-family: 'caviar_dreams_B', Helvetica, sans-serif;
    }   
    .modal-tr{
        background-color: #f5f5f5;
    } 
    .well{
        margin-bottom: 0px;
    }
    .bx_gen_compras table tr {
        position: relative;
        height: 40px;
        border: 1px solid #ccc;
    }    
    .bottom-20{
        margin-bottom: 20px;
    }
</style>
<script type="text/javascript">
    function buyDetail(venta,fecha,estatus,monto,sku){
        $.ajax({
            url:"<?=base_url()?>home/get_buy",
            data: { venta:venta},       
            method: 'POST',
            dataType: 'json',
            success: function(data){
                console.log(data);
                $('.modal-td').remove();
                if(estatus == 'Pendiente')
                    $('#pay').removeClass('hidden');
                $('#venta').text(sku);
				//formulario de paypal item_number
				$("input[name$='item_number']").val(sku);
				//formulario de paypal item_name
				$("input[name$='item_name']").val("Purchase order " + sku);
                $('#date').text(fecha);
                $('#status').text(estatus);
                var subtotal = monto - parseInt(data.shipping);
                subtotal = parseFloat(subtotal, 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString();                
                monto = parseFloat(monto, 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString();
                var ship = parseFloat(data.shipping, 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString();
                $('#amount').text('$ '+subtotal+' MXN');
                $('#shipping').text('$ '+ship+' MXN');
                $('#total').text('$ '+monto+' MXN');
				//boton de paypal amount
				$("input[name$='amount']").val(monto);
                $(data.html).insertAfter('#modal-tr');
                $('#buy').modal('show');            
            }
        });        
    }
</script>