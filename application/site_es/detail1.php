<!--Shopping Bag-->

<?php

    $len = strlen($id_venta);

    $zero = '';

    while($len<4){

        $zero=$zero.'0';

        $len ++ ;

    }

    $tb = 'TB'.$zero.$id_venta;

?>

    <div class="bodi off" >

       <div class="pg1 bx_gen_compras">

            <div class="container">

                <div class='row'>

                    <div class="panel panel-default tribu-logo" style='margin-bottom: 5px;'>

                        <div class="panel-heading center">

                            <img src="<?=base_url()?>assets/assets/tribu-bazar-logotipo.png" alt="tribu bazar logotipo" height='80px;'>

                        </div>

                     </div>                   

                    <div class="panel panel-default" id='buy'>

                        <div class="panel-heading">
                            <h3>Orden <?=$tb?></h3> 
                            <?php if($estatus =='Pendiente'): ?>
                            <a id="cancelar-orden" data-id="<?=$id_venta?>" href="#" data-toggle="modal" data-target="#modal-cancelar" class="btn btn-danger btn-xs pull-right"><span class="glyphicon glyphicon-trash"></span> Cancelar orden</a>
                            <?php else: ?>
                            <span class="pull-right"><strong><?=$estatus?></strong></span>
                            <?php endif; ?>
                        
                        </div>

                        <div class="panel-body">                        

                            <div class='col-xs-12 details bottom-20'>

                                <div class='col-xs-4 rt'>Id Compra</div><div class='col-xs-8'><span id='venta'><?=$tb?></span></div>

                                <div class='col-xs-4 rt'>Fecha</div><div class='col-xs-8'><span id='date'></span><?=$date?></div>

                                <div class='col-xs-4 rt'>Estatus</div><div class='col-xs-8'><span id='status'><?=$estatus?></span></div>

                                <div class='col-xs-4 rt'>Subtotal</div>

                                <div class='col-xs-8'>

                                    <span id='amount'>

                                            $<?=number_format(($total-$shipping), 2, '.', ',')?> MXN                                                

                                    </span>

                                </div>

                                <div class='col-xs-12' style='height:15px;'></div>

                                <div class='col-xs-4 rt' >Banco</div><div class='col-xs-8'><span id='status'>Santander</span></div>

                                <div class='col-xs-4 rt'>Referencia</div><div class='col-xs-8'><span id='status'>Jacobo Vazquez Galvan</span></div>

                                <div class='col-xs-4 rt'>No. Cuenta</div><div class='col-xs-8'><span id='status'>56-63520869-6</span></div>

                                <div class='col-xs-4 rt'>Interbancaria </div><div class='col-xs-8'><span id='status'>0141-8060-5569-1005-29</span></div>  

                                <div class='col-xs-4 rt'>Vía OXXO. Num. de tarjeta</div><div class='col-xs-8'><span id='status'>5579 1000 7407 1091</span></div>                                

                            </div>

                            <div class='col-xs-12 table-responsive'>

                                <table class="table">                        

                                    <tr class="op- modal-tr" id='modal-tr' height='40px'>

                                        <td >Id Prod</td>

                                        <td>Tienda</td>

                                        <td >Producto</td>

                                        <td class='center'>Cantidad</td>

                                        <td>Monto</td>

                                        <td>Status</td>

                                        <td>Acciones</td>

                                    </tr>

                                    <?=$html?>                    

                                    <tr>

                                        <td class='right rt' colspan='5'>+Envio</td>

                                        <td><span id='shipping'> $<?=number_format(($shipping), 2, '.', ',')?> MXN</span></td>

                                        <td></td>

                                    </tr> 

                                    <tr>

                                        <td class='right rt' colspan='5'>Total</td>

                                        <td><span id='total'>$<?=number_format(($total), 2, '.', ',')?> MXN</span></td>
                                        
                                        <td></td>

                                    </tr>                             

                                </table>

                                <!--<p>*Listo para ser enviado de 3 a 5 días hábiles</p>-->

                                <p>	* Compras en México llega de 7 a 14 días Habiles<br>

									* Compras en Europa, Estados Unidos y Canada 25 días habiles</p>



                            </div>

                            <div class='col-xs-12 no-padding'>

                                <div class='col-xs-12 col-sm-6 col-sm-offset-6 right'>

                                    <img src='<?=site_url()?>assets/assets/oxxo.png' id='payimg' width='60'>

                                    <img src='<?=site_url()?>assets/assets/amex-logo.jpg' id='payimg' width='60'>

                                    <img src='<?=site_url()?>assets/assets/paypal.jpg' id='payimg' width='60'>

                                </div>

                            </div>                             

                            <div class='col-xs-6 bx_formulario'>

                                <button type="button" class="btn btn-info bt op-" onclick='javascript:window.print();'>Orden de compra</button>

                            </div>

                            <?php if($estatus =='Pendiente'): ?>
                            <div class='col-xs-6 bx_formulario' id='pay'>

                            <!--boton de  paypal de pruebas -->

                                <!--<button type="button" class="btn btn-info bt op-">Pay</button>-->

                                <form target="_blank" action="https://www.paypal.com/cgi-bin/webscr" method="post">

                                <!--<form target="_blank" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">-->

                                    <input type="hidden" name="cmd" value="_xclick">

                                    <!--<input type="hidden" name="business" value="aide.emprende@gmail.com">-->

                                    <input type="hidden" name="business" value="tribubazar@gmail.com">

                                    <input type="hidden" name="return" value="<?=site_url('home/success')?>">

                                    <input type="hidden" name="cancel_return" value="<?=site_url('home/cancel')?>">

                                    <input type="hidden" name="notify_url" value="<?=site_url('home/procces_pay')?>">

                                    <input type="hidden" name="lc" value="MX">

                                    <input type="hidden" name="item_number" value="<?=$tb?>">

                                    <input type="hidden" name="item_name" value="<?=$tb?>">

                                    <input type="hidden" name="amount" value="<?=$total?>">

                                    <input type="hidden" name="currency_code" value="MXN">

                                    <input type="hidden" name="button_subtype" value="services">

                                    <input type="hidden" name="no_note" value="0">

                                    <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynowCC_LG.gif:NonHostedGuest">

                                    <!--<input type="image" src="https://www.paypalobjects.com/es_XC/MX/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal, la forma más segura y rápida de pagar en línea.">

                                    <img alt="" border="0" src="https://www.paypalobjects.com/es_XC/i/scr/pixel.gif" width="1" height="1">-->

                                    <input type="submit" value="Pagar con Paypal" name="submit" title="PayPal - The safer, easier way to pay online!" class="paypal_btn">

                                </form>

                            <!--boton de  paypal de pruebas -->

                            </div>
                            <?php endif; ?>                      

                        </div>                      

                    </div>                      

                </div>                      

            </div>                

        </div>                

    </div>

    <!-- Modal -->

<div id="modal-cancelar" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <!-- Modal content-->

    <div class="modal-content">

      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <h4 class="modal-title">CANCELAR ORDEN</h4>

      </div>

      <div class="modal-body">

        <form class="bx_formulario" action="<?=site_url('home/cancelar_orden')?>" method="post">
            <input type="hidden" name="id_venta" value="<?=$id_venta?>">
            <div class="form-group">
                <label>Motivo:</label>
                <textarea class="form-control" required></textarea>
            </div>

            <div class="form-group">
                <button type="submit" class="bt op-" value="SEND">CANCELAR</button>
            </div>                             

        </form>

      </div>

      <div class="modal-footer">

        &nbsp;

      </div>

    </div>

  </div>

</div>



<!--Shopping Bag-->

<style type="text/css">

    @media print {

        #payimg,#pay,.localizacion_pag,.breadcrumbs,.header,.footer.paypal_btn,h2,button,footer,table{ display: none !important;}

        #buy,.tribu-logo{ display: block !important;}    

        .bodi{

            padding:0!important;

        }

    }        

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

    // $("#cancelar-orden.")click(function(){
    //     var id = $(this).data('id');

    //     $("#venta-modal").val(id);

    // });

    if(history.foward()){

        location.replace(history.foward());

    }

</script>