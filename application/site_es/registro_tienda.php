<!--<link rel="stylesheet" type="text/css" href="<?=site_url("css/css1.css")?>" />

<script type="text/javascript" src="<?=site_url("jqueryvalidate/dist/jquery.validate.js")?>" ></script>-->



<div class="bodi off">

	<!--<div class="bxtitulo nosotros"></div>-->



        <div class="localizacion_pag">



            <div class="container">



                <div class="row">



                    <div class="col-xs-12">



                        <a href="<?=base_url()?>"><img src="<?=base_url('assets/assets/tribu-bazar-boton-home.png')?>" alt="tribu bazar boton home">Inicio</a>



                        <span>&gt;</span>



                        <a href="<?=base_url('home/registro_tienda')?>">Registro tienda</a>



                    </div>



                </div>



            </div>



        </div>



        <section class="w sregistro">

        	<div class="container">

                <div class="row">



                    <div class="info1">                    	

                        <!--contenido del html-->

                        <?=$m?>

                        

                            <div class="panel-body">

                                <div class="tab-content">

                                    <div class="tab-pane fade in active" id="tab1default">

                                   		<div class="">



                                            <div class="panel-green ">

                                             <div class=' bx_formulario txt-registro-tienda'>

                                                <p>Gracias por darte la oportunidad de vender en todo el mundo con <strong>Tribu bazar</strong> abre tu tienda sin rentas mensuales, puedes subir todos los productos que quieras desde hoy mismo!.</p>
                                                <p>La comisión es del 15% que se distribuye de esta forma:<br>
                                                3.5% por transición en la pasarela de pago (paypal, openpay, stripe) 5 % por venta dentro de <strong>tribu bazar</strong>
                                                6.5% Publicidad para tu tienda mediante una excelente segmentación de mercado en nuestras redes.</p>
                                                
                                                <p>En Cdmx y Edo. mex tenemos recolección y entrega a un bajo costo.</p>
                                                
                                                <p>Los envíos mayores de $1,000 pesos los cubre <strong>Tribu bazar</strong>
                                                Para envíos a todo el mundo contamos con guías pre-pagadas Los envíos menores a mil pesos los paga el cliente.
                                                A ti como marca te depositamos a los 7 días de tu venta.</p>
                                                
                                                <p>En tribu bazar buscamos que tu cliente y tu tengan la mejor experiencia a bajo costo y con un gran beneficio.</p>
                                                
                                                <p>Vender con <strong>Tribu bazar</strong> genera confianza.</p>



<!--                                                 <p><strong>¿Cuánto me cuesta tener una tienda?</strong></p>
                                                <p>Es totalmente gratis.  No hay costos anuales ni mensuales. Puedes subir todo tu stock sin problema. La comisión de Tribu bazar por venta es del 15%</p>
                                                
                                                <p><strong>¿Cuánto tiempo me tardo en crear una tienda?</strong></p>
                                                <p>Ya con tus fotos listas a lo mucho 1 hora</p>
                                                
                                                <p><strong>¿Qué reportes puedo obtener?</strong></p>
                                                <p>En tu tablero puedes obtener reportes de cuánto has vendido, tus productos más vendidos y buscados, estatus de cada una de tus órdenes, así como de pagos.</p>

 -->
												<form id="form-registro" class='form-group' method='post' action='<?=site_url('home/insert_tienda')?>' enctype="multipart/form-data">	<div class='col-xs-12 col-sm-12' id="resultado"></div>

                                                    <div class='col-xs-12 col-sm-4 form-group '>

                                                        <label>Nombre de la tienda</label>
                                                        <input id='nombre_tienda' name='tienda[tienda]' type='text' value='' class='input-buy form-control'  autocomplete="off" required>

                                                    </div>

                                                    <div class='col-xs-12 col-sm-3 form-group '>
                                                        <label>Categoría de la tienda</label>
                                                        <select name="id_categoria" class="input-buy form-control" required>
                                                            <option value="">--Seleccione categoría--</option>
                                                            <?php foreach ($categorias_gral->result() as $value): ?>
                                                            <option value="<?=$value->id_categoria?>"><?=strtoupper($value->categoria)?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>  

                                                    <div class='col-xs-12 col-sm-3 form-group '>                       

                                                        <label>Logo tienda</label>
                                                        <input id='logo' name='logo' type='file' value='' class='input-buy form-control' required>

                                                    </div>

                                                    <div class='col-xs-12 col-sm-2 form-group '> 
                                                        <label>Teléfono</label>
                                                        <input class='input-buy form-control' type="text"  pattern=".{10,}" minlength="10" title="El teléfono debe de tener mínimo 10 números" name="tienda[telefono_contacto]" required>
                                                    </div>


                                                    <div class='col-xs-12 col-sm-4  form-group '>
                        
                                                        <label>Nombre contacto</label>
                                                        <input id='nombre_contacto' name='tienda[nombre_contacto]' type='text' value='' class='input-buy form-control'  autocomplete="off" required>

                                                    </div>

                                                    <div class='col-xs-12 col-sm-4 form-group '>
                                                        <label>Apellido contacto</label>
                                                        <input id="apellido_contacto" name="tienda[apellido_contacto]" class='input-buy form-control'  autocomplete="off" required>
                                                    </div>


                                                    <div class='col-xs-12 col-sm-4 form-group '>

                        

                                                        <label>Correo contacto</label>

                                                        <input id='correo' name='usuarios[user]' type='email' value='' class='input-buy form-control'  autocomplete="off" required>

                        

                                                    </div>



                                                    <div class='col-xs-12 col-sm-6 form-group '>

                        

                                                        <label>Contraseña contacto</label>

                                                        <input id='password' name='usuarios[pass]' type='password' value='' class='input-buy form-control'  autocomplete="off" required>

                        

                                                    </div>



                                                    <div class='col-xs-12 col-sm-6 form-group '>

                                                        <label>Confirma Contraseña</label>

                                                        <input id='password'  type='password' value='' class='input-buy form-control'  autocomplete="off" required>

                                                    </div>

                                                    <div class='col-xs-12 form-group '>

                                                        <label>Dirección </label>

                                                        <hr>

                                                    </div>

                                                    <div class="col-xs-12 col-sm-6 form-group">

                                                        <label>Calle:</label>

                                                        <input type="text" name='tienda[calle]' class='input-buy form-control' required>

                                                    </div>

                                                    <div class="col-xs-12 col-sm-3 form-group">

                                                        <label>Num ext:</label>

                                                        <input type="text" name='tienda[num_ext]' class='input-buy form-control' required>

                                                    </div>

                                                    <div class="col-xs-12 col-sm-3 form-group">

                                                        <label>Num int:</label>

                                                        <input type="text" name='tienda[num_int]' class='input-buy form-control'>

                                                    </div>

                                                    <div class="col-xs-12 col-sm-5 form-group">

                                                        <label>Colonia:</label>

                                                        <input type="text" name='tienda[colonia]' class='input-buy form-control' required>

                                                    </div>

                                                    <div class="col-xs-12 col-sm-2 form-group">
                                                        <label>C.P.</label>
                                                        <input type="text" name="tienda[cp]" class='input-buy form-control' required>
                                                    </div>   	    

                                                    <div class="col-xs-12 col-sm-5 form-group">

                                                        <label>Estado:</label>

                                                        <select name='tienda[estado]' class='input-buy form-control' required>

                                                            <option value="">--Seleccione opción--</option>

                                                            <?php 

                                                                foreach ($estados->result() as $estado) :

                                                            ?>

                                                            <option value="<?=$estado->id?>"><?=$estado->name?></option>

                                                            <?php

                                                                endforeach;

                                                            ?>

                                                        </select>

                                                    </div>



                                                     <div class=" col-xs-12  form-group">

                                                      <label><input type="checkbox" required> Acepta los términos y condiciones de privacidad <a target="_blank" href="<?=site_url()?>privacidad.pdf">aquí</a> descritos</label>

                                                    </div>

                                                     

<!--                                                      <div class="form-group col-xs-12 col-sm-6 text-center ">

                                                        <div class="g-recaptcha" data-sitekey="6Ld4hT0UAAAAAB1TNhpoO5_nL4d-ydQhXBSqWQfQ"></div>

                                                    </div> -->

                                                 

                                                    <div class='col-xs-12 col-sm-6 text-center'>

                                                        <button type="submit" class="bt" id="grd-btn">Registrar</button>

                                                    </div>		

                                                    </form>    

                                                        				

                                              </div>	

                                             

                                             

                                        </div>

                                    </div>



                                    </div>

                                </div>

                            </div>

                        </div>



                        </div>

                      

                    </div>

                </div>

            </div>

        </section>

    </div>

</div>                        





<script type="text/javascript">



// function check_user_tienda(correo){



//     $.ajaxSetup({async: false});



//     $.post( "<?=base_url('home/check_mail_tienda')?>",{ correo: correo}, function( data ) {        

//          //console.log(data);

//          result=data;         

//     }); 



//     return result;

// }



// $(function(){

    // $("#form-registro").submit(function(){

    //     var correo = check_user_tienda($("#correo").val());

    //     console.log(correo);

    //     if (correo!="") {

    //         $("#resultado").html('<div class="alert alert-danger" >Correo ya registrado</div>');

    //         //alert("correo registrado");

    //         //return false;

    //     }else{

    //         $("#resultado").html("");               

    //         //return true;

    //     }



    //     return false;

        

    // });



   /* $("#correo").change(function(){



        var correo = $("#correo").val()  





        $.post( "<?=base_url('home/check_mail')?>",{ correo: correo}, function( data ) {

            $("#resultado").html(data);

            console.log(data);

        });      

    });*/



// });





function contras() {

    var p = $("#password").val();

    var p2 = $("#password2").val();

    if(p==p2){

      $("#contras").html(''); 

      $( "#grd-btn" ).prop( "disabled", false );

    }

    else{

     $("#contras").html('<div class="alert alert-danger" >Ingrese la misma contraseña que el campo anterior</div>'); 

        $( "#grd-btn" ).prop( "disabled", true );

    }

    

}





// $("input[name=moto]").click(function() {

//     if ($('#simoto').is(':checked'))

//      {$("#si_moto").show();

//       $("#no_moto").hide();

//       $("#kilometraje").css('display','block');

//      }

//     else

//      {$("#si_moto").hide(); $("#no_moto").show();}

     



// });

    

// $("input[name=compramoto]").click(function() {

//     if ($('#sicompramoto').is(':checked'))

//      {$("#si_moto").show();$("#kilometraje").css('display','none'); }

//     else

//      {{$("#si_moto").hide();}}

     



// });    



function soloNumeros(e)

{

var keynum = window.event ? window.event.keyCode : e.which;

if ((keynum == 8) || (keynum == 46))

return true;

return /\d/.test(String.fromCharCode(keynum));

}

    

function digitos() {

    var d= $("#telefono").val();        

    if(d.length=10)

    {

      $("#digis").html(''); 

      $( "#grd-btn" ).prop( "disabled", false );

    }

    else{

     $("#digis").html('<div class="alert alert-danger" >El número debe de ser de 10 dígitos</div>'); 

        $( "#grd-btn" ).prop( "disabled", true );

    }

    

}

    





</script>

