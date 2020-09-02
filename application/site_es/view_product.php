<!--Ver-Producto-->

    <div class="bodi off">

        <div class="localizacion_pag">

            <div class="container">

                <div class="row">

                    <div class="col-xs-12">

                        <a href="<?=site_url()?>"><img src="<?=site_url()?>assets/assets/tribu-bazar-boton-home.png" alt="tribu bazar boton home">Inicio</a>

                        <span>></span>

                        <a href="<?=site_url()?>">Nuevos Productos</a>

                        <span>></span>

                        <a href="<?=current_url()?>"><?=$product->titulo?></a>

                    </div>

                </div>

            </div>

        </div>

        <section class="pg1 bx_info_producto">

            <div class="container">

                <div class="row">            

                    <div class="col-xs-12 col-sm-6">

                        <div class="bx_img bx_slide">   

                            <?php foreach($galeria->result() as $gal):?>

                                <div class="bx_vc">

                                    <img src="<?=site_url('files/'.$product->galeria.'/'.$gal->foto)?>" alt="<?=$product->titulo?>" />

                                </div>

                            <?php endforeach;?>                            

                        </div>

                        

                        <ul id="prod-social-media">

                            <li><a onClick="return popup(this, 'notes')" href="http://www.facebook.com/sharer.php?u=<?=site_url(uri_string())?>"><i class="fa fa-facebook fa-2x" aria-hidden="true"></i></a></li>

                            <li><a onClick="return popup(this, 'notes')" href="http://twitter.com/share?url=<?=site_url(uri_string())?>"><i class="fa fa-twitter fa-2x" aria-hidden="true"></i></a></li>

                            <li><a onClick="return popup(this, 'notes')" href="https://plus.google.com/share?url=<?=site_url(uri_string())?>"><i class="fa fa-google-plus fa-2x" aria-hidden="true"></i></a></li>

                            <li><a target="_blank" href="javascript:void((function()%7Bvar%20e=document.createElement('script');e.setAttribute('type','text/javascript');e.setAttribute('charset','UTF-8');e.setAttribute('src','//assets.pinterest.com/js/pinmarklet.js?r='+Math.random()*99999999);document.body.appendChild(e)%7D)());"><i class="fa fa-pinterest-p fa-2x" aria-hidden="true"></i></a></li>

                            

                            <li>&nbsp;</li>

                            

                            <li>&nbsp;</li>

                            

                            

                            <li class="hidden-xs">

                                <button id="open_bxslider" type="button" class="btn btn-default btn-md" data-toggle="modal" data-target="#gallery01"><i class="fa fa-arrows-alt fa-2x" aria-hidden="true"></i></button>

                            </li>

                            

                        </ul>

                        

                    </div>

                    <div class="col-xs-12 col-sm-6">

                        <div class="bx_info">    

                            <h2><?=$product->titulo?></h2>

                            <p>$<?=number_format($product->precio,2)?></p>

                            <form action="">

                                <div class="row">
                                <?php 
                                    $stock_producto = $this->Tribubazar->stock_producto($product->id_producto);
                                ?>   

                                    <?php if($stock_producto == 0): ?>
                                        <div class="col-xs-12">
                                            <h3>Producto Agotado</h3>
                                        </div>
                                    <?php endif; ?>

                                    <div class="col-xs-12 col-sm-3">

                                        <?php if($stock_producto >0): ?>
                                            <?php $attr=$attributes->result()?>

                                            <?php if($attr[0]->id_atributo != 14): ?>

                                            <h3><?=$attr[0]->atributo;?></h3>

                                            <?php else: ?>

                                            <h3>Cantidad</h3>

                                            <?php endif; ?>

                                        <?php endif; ?>

                                    </div>

                                    <div class="co-xs-12 col-sm-9">

                                        <div class="row">

                                        <!--Compra sin atributos -->   

                                        <?php foreach($attributes->result() as $att): ?>

                                            <?php //print_r($att); ?>

                                            <?php if($att->id_atributo != 14): ?>

                                            <div class="radio col-xs-<?=($attributes->num_rows()>1)?'4':'12'?>">

                                                <label >

                                                <?php if($count != 1):?>

                                                    <input type="radio" name="optionsRadios" onclick='getAtts("<?=$att->id_valor?>",0,"<?=$att->id_caracteristica?>")'><span><?=$att->valor?></span>

                                                <?php else:?>

                                                    <input type="radio" name="optionsRadios" onclick='getStock("<?=$att->id_caracteristica?>")'>

                                                    <span><?=$att->valor?></span>

                                                <?php endif;?>                                                        

                                                </label>

                                            </div>

                                            <?php else: ?>

                                            <input id="caracteristica" type="hidden" value='<?=$att->id_caracteristica?>'>
                                            <select class="form-control" id="qty">
                                                <?php for($i=1; $i <= $stock_producto; $i++): ?>
                                                <option class="stock" value="<?=$i?>"><?=$i?></option>
                                                <?php endfor; ?>

                                            </select>
                                            
                                            <?php endif; ?>

                                        <?php endforeach;?>

                                        </div>

                                    </div>

                                    <input type='hidden' id='root' data-att='<?=$attr[0]->id_atributo;?>' data-times='0' data-key='1'>

                                    <div class="clearfix" id='0'></div>   

                                    <div class="col-xs-12 no-padding" id='leaf'></div>   

                                        <?php if($username):?>

                                        <div class="col-xs-12">
  <!--                                          <h3>Opciones de envío</h3>

                                            <div id="result-emvio">
                                                 <table id="table-envio" class="table">
                                                    <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th>Tipo de envío</th>
                                                        <th>Costo</th>
                                                        <th>Entrega estimada</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody> -->
                                                <?php  

                                                    //$parcels = $this->session->userdata('parcels');
                                                    
                                                    // $data['cp_origen'] = $product->cp;
                                                    // $data['cp_destino'] = $cp_destino;
                                                    // $data['parcels'] =  $parcels;

                                                    $response_array = array();


                                                    //echo '<pre>'; print_r($data);  echo '</pre>';

                                                    //$response_array = $this->Envio->cotizar_envio($data);

                                                    //print_r($response_array);

                                                    foreach (array_keys($response_array) as $key => $value):
                                                      if(!empty($response_array[$value])):
                                                        // echo $value;
                                                        // print_r($response_array[$value]);
                                                        foreach ($response_array[$value] as $v):
                                                            echo '<div id="'.$v->rate_id.'">';
                                                            echo '<input type="hidden" id="carrier" value="'.$v->carrier.'">';
                                                            echo '<input type="hidden" id="total_amount" value="'.$v->total_amount.'">';
                                                            echo '<input type="hidden" id="carrier_service_code" value="'.$v->carrier_service_code.'">';
                                                            echo '<input type="hidden" id="estimated_delivery" value="'.date("Y-m-d", strtotime($v->estimated_delivery)).'">';
                                                            echo '</div>';
                                                            echo '<tr>';
                                                            echo '<td><input name="envio" type="radio" value="'.$v->rate_id.'" class="envio_option"><img src="'.$v->carrier_logo_url.'" width="80" /></td>';
                                                            echo '<td>'.$v->dynamic_service_name.'</td>';
                                                            echo '<td>'.$v->total_amount.' '.$v->currency.'</td>';
                                                            echo '<td>'.date("Y-m-d", strtotime($v->estimated_delivery)).'</td>';
                                                            echo '</tr>';
                                                    
                                                          //echo '<p><stong>id envio: </strong>'.$v->shipment_id.'</p>';
                                                          // echo '<input type="hidden" class="'.$v->rate_id.'" name="carrier" value="'.$v->carrier.'">';
                                                          // echo '<input type="hidden" class="'.$v->rate_id.'" name="carrier_service_name" value="'.$v->carrier_service_name.'">';
                                                          // echo '<input type="hidden" class="'.$v->rate_id.'" name="carrier_service_code" value="'.$v->carrier_service_code.'">';
                                                          // echo '<input type="hidden" class="'.$v->rate_id.'" name="estimated_delivery" value="'.$v->estimated_delivery.'">';
                                                          // echo '<input type="hidden" class="'.$v->rate_id.'" name="total_amount" value="'.$v->total_amount.'">';
                                                          // echo '<input onclick="get_rate('.$v->rate_id.')" name="envio" type="radio" class="envio_option"><img src="'.$v->carrier_logo_url.'" width="80" />';
                                                          // echo '<p><stong>Tipo de envío: </strong>'.$v->dynamic_service_name.'<br>';
                                                          // echo '<stong>Paquetería: </strong>'.$v->carrier_service_name.'<br>';
                                                          // echo '<stong>Fecha de entrega estimada: </strong>'.$v->estimated_delivery.'<br>';
                                                          // echo '<stong>Precio envío: </strong>'.$v->total_amount.' '.$v->currency.'</p>';

                                                          // echo '<hr>';
                                                        endforeach;   

                                                      endif;
                                                    endforeach;

                                                ?>
<!--                                                     </tbody>
                                                </table>
                                            </div> -->

                                        </div>

                                    <?php //if($username):?>

                                        <div class="col-xs-12">

                                            <button type="button" onclick="addBag()">Agregar a carrito</button>

                                        </div>

                                    <?php else:?>

                                        <div class="col-xs-12">

                                            <button type="button" onclick="javascript:location.href='<?=site_url()?>create-account'">Agregar a carrito</button>

                                        </div>                                        

                                    <?php endif;?>

                                        <div class="col-xs-12">

                                            <div class="detalles">             

                                                <?=$product->descripcion?>
                                                
                                            </div>

                                        </div>

                                </div>

                            </form>

                        </div>

                    </div>
                    <?php if($product->medidas!=''): $visible=""; else: $visible="visible"; endif;?>
                    <div class="col-xs-12 <?=$visible?>">
                        <a onclick="showmedidas()" class="coral">Tabla de medidas <i class="fa fa-plus" aria-hidden="true"></i> </a>

                            <div id="demo" class="collapse">
                            <?=$product->medidas?>
                            </div> 

                    </div>

                    <hr class="linea_producto">

                </div>

            </div>

        </section>

        <section class="pg1 new_arrivals bx_gen_slide-">

            <div class="container">

                <div class="row">

                    <div class="col-xs-12">

                        <h2 class="text-center">Nuevos Productos</h2>

                    </div>

                   <div class="bx_slide">



						<!--new arrivals-->



                        <?php



                        	foreach($new->result() as $n):



						?>



                        	<div class="col-xs-12">



                                <div class="bx_info">



    



                                    <div class="bx_img">                                       



    									<a href="<?=site_url('view_product/'.url_title(convert_accented_characters($n->titulo)).'_'.$n->id_producto)?>"><img src="<?=site_url('files/'.$n->galeria.'/'.$n->foto)?>" alt="<?=$n->titulo?>"></a>



                                    </div>



                                    <div class="bx_txt">



                                        <a href="<?=site_url('view_product/'.url_title(convert_accented_characters($n->titulo)).'_'.$n->id_producto)?>"><?=$n->titulo?></a>



                                    </div>



    



                                </div>



                        	</div>



                        <?php



                        	endforeach;



						?>



                        <!--new arrivals-->

                    </div>

                </div>

            </div>

        </section>

</div>

    <div id="bag" class="modal fade" role="dialog">

        <div class="modal-dialog">

            <div class="modal-content">

                <div class="modal-header modal-head">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <h3 style='margin-bottom:0px'>Agregar a carrito

                    <img src="<?=base_url()?>assets/assets/tribu-bazar-compras.png" alt="tribu bazar compras" width="20px" style="margin-left:20px; "> </h3>                  

                </div>

                <div class="modal-body">

                    <div class='row'>

                        <div class='col-xs-12'>

                            <div class="table-responsive">

                                <table class="table">

                                    <tbody>

                                        <tr><td class='h2'>Producto:</td><td><?=$product->titulo?></td></tr>

                                        <tr><td class='h2'>Cantidad:<td id='qtty'></td></tr>                                        

                                        <tr><td class='h2'>Monto:</td><td id='price'></td></tr>

<!--                                         <tr>
                                            <td class='h2'>Envío:</td>
                                            <td id="envios_result"></td>
                                        </tr>  -->  

<!--                                         <tr>
                                            <td id="envios_result" colspan="2">
                                                <p><img src="<?=base_url('assets/js/royalslider/skins/preloaders/preloader.gif')?>">Cargando envíos</p>
                                            </td>
                                        </tr> -->

                                    </tbody>

                                </table>

                            </div>

                        </div>

                        <div class='col-xs-12'>

                            <div class='col-xs-6 bx_formulario'>

                                <button type="button" class="btn btn-info bt op-" data-dismiss="modal">Cancelar</button>

                            </div>

                                <div class='col-xs-6 bx_formulario'>

                                    <button type="button" class="btn btn-info bt op-" onclick='saveBag()'>Agregar Producto</button>

                                </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

               

<!--gallery 01-->                     

<!-- Modal -->

<div class="modal fade" id="gallery01" role="dialog">

    <div class="modal-dialog modal-tribu">

        <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal">&times;</button>

                <h2><?=$product->titulo?></h2>

            </div>

            <div class="modal-body">

                <!--slider-->

                                

                <div class="col-xs-12 col-sm-2">    

                    <div id="bx-pager">

                    <?php 

                        $index = 0;

                        foreach($galeria->result() as $gal):

                    ?>  

                            <a data-slide-index="<?=$index?>" href=""><img src="<?=site_url('files/'.$product->galeria.'/'.$gal->foto)?>"  class="img-responsive" /></a>

                    <?php 

                        

                        $index ++; 

                        endforeach;

                    ?>  

                    </div>

                </div>

                

                <div class="col-xs-12 col-sm-10">   

                    <ul class="bxslider">

                    <?php foreach($galeria->result() as $gal):?>

                         <li><img src="<?=site_url('files/'.$product->galeria.'/'.$gal->foto)?>" class="img-responsive" /></li>

                    <?php endforeach;?>    

                    </ul>

                </div>

                <!--slider-->

                

            </div>

            <div class="modal-footer">

            <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->

            </div>

        </div>

    </div>

</div>

<!--gallery 01-->  

<!--js royal-slider-->

<style type="text/css">

    #bx-pager a img{ margin-bottom:5px; max-height:120px; }

    .modal-content {overflow:hidden; }

    

    .bxslider li img{ margin: 0 auto; }

    .modal-header h2{ margin-bottom:0px; }

    

    .modal-footer{ display:flex; }

    

    body .modal-tribu {

        /* new custom width */

        width: 70%;

    }

    .modal-head{

        background-color: #F5F5F5;

    }

    .h2{

        font-family: 'caviar_dreams_B', Helvetica, sans-serif;

        font-size: 15px;

    }

    .control{

        margin-bottom: 5px;

    }

    .no-padding{

        padding-left: 0px;

        padding-right: 0px;

    }

    

    #gallery-2 {

  width: 100%;

  background: #151515;

  -webkit-user-select: none;

  -moz-user-select: none;  

  user-select: none;

}

</style>

<script src="<?=site_url()?>assets/js/jquery-1.12.3.min.js"></script>

<script src="<?=site_url()?>assets/royalslider/jquery.easing-1.3.js"></script>

<script src="<?=site_url()?>assets/royalslider/jquery.royalslider.min.js"></script>

<script src="<?=site_url()?>assets/js/jquery.zoom.min.js"></script>

<link href="<?=site_url()?>assets/jquery.bxslider/jquery.bxslider.css" rel="stylesheet">

<script src="<?=site_url()?>assets/jquery.bxslider/jquery.bxslider.js"></script>

<script>

var $j = jQuery.noConflict();    

//codigo para que cargue en el modal la galería

function quickView() {

    var slider = $j('.bxslider').bxSlider({pagerCustom: '#bx-pager', controls: true });

    setTimeout(function() { slider.reloadSlider();}, 200);

}

//codigo para que cargue en el modal la galería

jQuery(document).ready(function($) {



	if($(window).width()>768){

		$('.bx_vc').zoom();

	}

	

	

	var enable = true;

	

	if($(window).width() < 768){enable = false; };

    

    $("#open_bxslider").on("click", quickView);

    $(".bxslider li img").css("max-height",$(window).height()*0.7  );

    $("#qty").change(function(){

        // $("#result-emvio tbody").html('<p><img src="<?=base_url('assets/js/royalslider/skins/preloaders/preloader.gif')?>">Cargando envíos</p>');

        // var cant = $(this).val();
        // var width = <?=$product->width?>;
        // var height = <?=$product->height?>;
        // var length = <?=$product->length?>;
        // var weight = <?=$product->weight?>;
        // var id_tienda = <?=$product->id_tienda?>;

        // var origen = <?=$product->cp?>;
        // var destino = <?=$cp_destino?>;

        // var parcels = {quantity:cant,weight_unit:'kg', width:width, height:height,length:length,weight:weight,dimension_unit:'cm'};

        // $.post( "<?=base_url('home/envio_custom')?>",{id_tienda:id_tienda,origen:origen, destino:destino,parcels:parcels }, function( data ) {
        //   $("#result-emvio tbody").html( data );
        // });

    });

    $('.bx_info_producto .bx_slide').royalSlider({

        addActiveClass: true,

        arrowsNav: true,

        controlsInside: true,

        controlNavigation: false,

        globalCaption: false,

        navigateByClick: true,

        sliderDrag: true,

        fadeinLoadedSlide: true,

        allowCSS3: true,

        loop: true,

        transitionType:'move',

        randomizeSlides: false,

        slidesSpacing: 0,

        autoPlay: {

            enabled: true,

            delay:4000,

            pauseOnHover: true,

            stopAtAction: false,

        },

    });

});

function getAtts(valor,key,caracteristica){

    if(valor){

        var times = key+1;

        var att = $('#root').data('att');    

        var html = '<div class="col-xs-12 no-padding" id="leaf"></div>';   

        $.ajax({

            url:"<?=base_url()?>home/get_attributes",

            data: {caracteristica:caracteristica, valor:valor, times:times, producto:<?=$product->id_producto?>},       

            method: 'POST',

            dataType: 'json',

            success: function(data){

                if(key==0){

                    $('#leaf').remove();

                    $(html).insertAfter('#0');

                }

                else{

                    key = key+1;

                    $('#'+key).remove();

                    $('#stock').remove();

                }

                $('#leaf').append(data.html);                        

            }

        });   

    }

}

function getStock(caracteristica){

    if(caracteristica){ 

        $.ajax({

            url:"<?=base_url()?>home/get_stock",

            data: {id:caracteristica},       

            method: 'POST',

            dataType: 'json',

            success: function(data){

                $('#stock').remove();

                $('#leaf').append(data.qty);                                            

            }

        });   

    }

}

// function get_rate(rate_id){

//     var content = $("#"+rate_id).html();

//     $("#envios_result").html(content);

//     // //var arr = new Array();
//     // arr ["rate_id"] = rate_id;

//     // //var arr = ["rate_id"];
//     // //var arr ["rate_id"] = rate_id;

//     // $("." + rate_id).each(function () {

//     //     var name = $(this).attr('name');
//     //     var value = $(this).val();
//     //     arr[name] = value;
//     // });

//     // console.log(arr);

// }

//arr = new Array();

function saveBag(){

    var id = document.getElementById('caracteristica');                 

    var qty= $('#qty').val();

    var sub= $('#qty').val() * <?=$product->precio?>;

    var id_tienda = <?=$product->id_tienda?>;

    var id_envio = $('input:radio[name=envio]:checked').val();

    var width = <?=$product->id_tienda?>;
    var height = <?=$product->height?>;
    var length = <?=$product->length?>;
    var weight = <?=$product->weight?>;
    var envio = {
        "carrier": $("#"+id_envio+" #carrier").val(),
        "carrier_service_code": $("#"+id_envio+" #carrier_service_code").val(),
        //"carrier_service_name": $("#"+id_envio+" #estimated_delivery").val(),
        "estimated_delivery": $("#"+id_envio+" #estimated_delivery").val(),
        //"rate_id": id_envio,
        "total_amount": $("#"+id_envio+" #total_amount").val()
    };

    if(id.value){

        $.ajax({

            url:"<?=base_url()?>home/save_bag",

            //data: {id: id.value, cantidad: qty, subtotal:sub,id_tienda:id_tienda,width:width,height:height,length:length,weight:weight,envio:envio},       

            data: {id: id.value, cantidad: qty, subtotal:sub,id_tienda:id_tienda,envio:envio},       

            method: 'POST',

            dataType: 'json',

            success: function(data){

                //console.log(data);

                $('#bag').modal('hide');

                location.reload();

            }

        });

    }

}

function addBag(){

    var qty   = $('#qty').val();

    if(qty){

        html = '<span class="qtty">'+$('#qty').val()+'</span>';

        $('.qtty').remove();

        $('#qtty').append(html);    

        var precio = <?=$product->precio?> * $('#qty').val();

        html = '<span class="price">$ '+precio+' MXN</span>';

        $('.price').remove();

        $('#price').append(html);

        var id = $('input:radio[name=envio]:checked').val();

        var envio = $("#"+id+" #total_amount").val();

        //$('#envios_result').html('$ '+envio+' MXN');    

        $('#bag').modal('show');

        //console.log(id);

    }

}

// function addBag(origen,destino){

//     var qty   = $('#qty').val();

//     // var origen = $(this).data("origen");

//     // var destino = $(this).data("destino");

//     var id_tienda = <?=$product->id_tienda?>;

//     var width = <?=$product->width?>;
//     var height = <?=$product->height?>;
//     var length = <?=$product->length?>;
//     var weight = <?=$product->weight?>;
//     var parcels = {"quantity":$('#qty').val(),"width":width,"weight_unit":"kg", "height":height, "length":length, "weight":weight, "dimension_unit":"cm"};

//     if(qty){

//         //Manda a llamar las opciones de envío
//         $.post( "<?=base_url('home/envio_custom')?>",{id_tienda:id_tienda,origen:origen, destino:destino,parcels:parcels }, function( data ) {
//           $("#envios_result").html( data );
//         });


//         html = '<span class="qtty">'+$('#qty').val()+'</span>';

//         $('.qtty').remove();

//         $('#qtty').append(html);    

//         var precio = <?=$product->precio?> * $('#qty').val();

//         html = '<span class="price">$ '+precio+' mxn</span>';

//         $('.price').remove();

//         $('#price').append(html);    

//         $('#bag').modal('show');

//     }

// }

</script>
<script>
function showmedidas() {
    $("#demo").toggle(1000);
}
</script>
<style>
    .coral{
display: inline-block;
position: relative;
font-family: 'caviar_dreams_B';
color: rgba(255,255,255,.7);
text-transform: uppercase;
padding: 10px 30px;
border: 0;
background-color: #f27a71;
box-shadow: none;
transition-duration: .3s;}
    .coral:hover{color: white; text-decoration: none;}
    .visible{display: none;}
@media(min-width:769px){
    .coral{width: 40%;margin: 2em 30%;font-size: 1.5em;}
}
@media(max-width:769px){
    .coral{width: 90%;margin: 2em 5%;font-size: 1.2em;}
}
    
</style>
