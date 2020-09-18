<!DOCTYPE html>

<html lang="es">

<head>

    <link rel="shortcut icon" href="<?=base_url()?>favicon.ico" />

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">



    <meta http-equiv="CONTENT-LANGUAGE" CONTENT="es-MX">

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <meta name="author" content="Equilibrio Visual" />

    

    <meta name="Description" content="Centro Especializado de Vacunación aplicamos vacunas, organizamos programas de vacunación y se fomentamos la vacunación en todas las edades."/>

    <meta name="Title" content="Vacunacion Centro Especializado IDISA"/>

    <meta name="Keywords" content="Vacunas, vacunación, vacuna, centro de vacunación, inmunización, inmunizaciones, Papiloma, influenza, varicela, fiebre amarilla,  vacunación en México, centro de vacunación en México, vacunación en México, IDISA, Instituto para el Desarrollo Integral de la Salud, vacunas en México, vacunas para niños, vacunación en niños, vacunación pediátrica, vacunación infantil, vacunas pediátrica, vacunación en adultos, vacunas para adultos, vacunas para viajeros, medicina del viajero, inmunización, inmunizaciones, vacunas para adolescentes, vacunas para mujeres, vacunación en mujeres, Virus del Papiloma Humano, Papiloma, CACU, cáncer cérvico uterino, Verrugas, verrugas genitales, condilomas, condilomas acuminados, virus de papiloma, gardasil, cervarix, Neumococo conjugada, neumococo, Rotavirus, Influenza virus A y B, influenza, gripe, gripa, vacuna influenza, vacuna de la influenza, virus de influenza, virus de la influenza, Neumococo adultos, Hepatitis B Adulto, Hepatitis B Infantil, hepatitis B, Hepatitis A, Hepatitis A Adulto, Hepatitis A infantil, Varicela, Haemophilus influenzae, Poliomielitis activada, Meningococo, Fiebre Tifoidea, Fiebre amarilla, Cólera, Rabia, vacuna antirabica, boostrix, engerix b, fluarix, havrix, infanrix ipv, infanrix ipv+hib, infanrix hexa, hexavalente, vacuna hexavalente, vacuna pentavalente, vacuna tetravalente, priorix, tritanrix h-b, rotarix, twinrix, varilrix, prevenar, comvax, h.b. vax, h.b. vax ii, mmr, mmr ii, pulmovax, pedvax, varivax, vaqta, gardasil, rotateq, actacel, fluzone, verorab, hibets, neumo 23, imovax-neumo, ducoral, okavax, quadracel, quadracel/hibest, td, tetanovac, stamarill, triacel, tubersol, trimovax, avaxim, typhim vi, b.c.g., BCG, tuberculosis, d.p.t., polio, td, sabin, toxoide tetánico, toroide difterico, Tétanos, Difteria, Sarampión, Rubeola, Paperas, Parotiditis, triple viral, DPaT, DPT, DPaT y polio, DPaT, Polio, H. influenzae B, DPaT, H. Influenzae tipo B, Hep. B y polio, DPaT y H. Influenzae tipo B, DPaT, H. Influenzae tipo B y Hep. B, Hepatitis A y B infantil y adulto, Difteria y Tétanos, pertussis, DPT acelular, Tos ferina, vacuna antitosferina" />

    <meta name="robots" content="index,follow" />

    

    <title>Centro Especializado de Vacunacion | Vacunas</title>

    

    <link rel="stylesheet" type="text/css" href="<?=base_url()?>css/reset.css" />

    <link rel="stylesheet" type="text/css" href="<?=base_url()?>css/bootstrap.min.css" />



    <!--royal-slider-->

    <link rel="stylesheet" href="<?=base_url()?>royalslider/royalslider.css">



    <!-- -->

    <link rel="stylesheet" href="<?=base_url()?>jquery/development-bundle/themes/base/jquery.ui.all.css" />



    <link rel="stylesheet" type="text/css" href="<?=base_url()?>css/css1.css" />



    <script>

      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){

      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),

      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)

      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-60934614-2', 'auto');

      ga('send', 'pageview');

    </script>



</head>

<body>



    <?php include('header.php'); ?>



    <?php  

        if (empty($pedido)==1){

            $compras = 0;   

        } else{

            $compras = count($pedido);

        }

        

        $count = 1;

    ?>

    

    <div class="bodi">

        <div class="btheader"></div>



        <div class="inf6 vacunas">

            <div class="container">

                <div class="row">

                    <div class="col-xs-12">

                        <h1>Vacunas</h1>

                    </div>

                </div>

            </div>

        </div>



        <section class="w inf5">

            <div class="container">

                <div class="row">

                    <div class="col-xs-12">

                        <h2>Seleccione las vacunas de su preferencia</h2>

                        <?php if($user!=''){ 

                                $d = 5;

                                $txt = 'el laboratorio';

                            }else{

                                $d = 6;

                                $txt = 'las vacunas';

                            }

                            $d = 5;

                        ?>

                        <h3>*Pago en efectivo <?=$d?>% de descuento en cualquier vacuna.</h3>



<!--                             <div id="user-data">

                                <div id="mensaje"><?php echo $m;?></div>

                                <div class="bx2">

                                    <img src="<?=base_url();?>img/carrito.png"/>

                                    <span>(<?php echo $compras;  ?>)</span>

                                    <a id="comprar" class="<?php echo $compras;?>" href="#column_left">Ver carrito</a>

                                </div>

                                <div style="text-align:right; width:100%;"><?php echo $user; ?></div>

                            </div> -->



                        <p>* La aplicación de vacunas es con cita previa Tel: (0155) 5584.0843 ó info@idisalud.com</p>

                        <p>De click en <?=$txt?> para mayor información</p>



                        <?php if($user!=''){ ?> 

                        <table id="tabla_vacunas" width="100%">

                            <tr>

                                <?php

                                    foreach ($laboratorio->result() as $row){

                                        echo'<th><a title="De click en la vacuna para mayor información" id="'.$row->id_lab.'" class="gv" href="#contenido">'.$row->nombre_lab.'</a></th>'; 

                                    }

                                ?>

                            </tr>                        

                        </table>



                        <div id="vacunas_distribuidores"></div>



                        <?php }else{?> 



                        <div id="tabla_vacunas" class="table-responsive">

                            <table class="table table-responsive table-striped table-bordered">

                                <thead>

                                    <tr>

                                        <th>Vacuna</th>

                                        <th>Costo</th>

                                        <th>Comprar</th>

                                        <th>Vacuna</th>

                                        <th>Costo</th>

                                        <th>Comprar</th>

                                    </tr>

                                </thead>

                                <tbody>



                                    <?php 

                                            }

                                        foreach ($vacunas->result() as $row){

                                            

                                            if($user==''){

                                                if($count%7 == 0 && $count%7 !=0){

                                                    echo '<tr>';

                                                }

                                                echo '<!-- class vacuna   hrefvacunas#column_left-->

													  <td><a title="De click en la vacuna para mayor información" href="'.base_url('vacunas/ver_vacuna/'.$row->id_vac).'" class="" id="'.$row->id_vac.'">'.$row->nombre_vac.'</a></td>

                                                      <td> 
                                                        <span>Efectivo</span> $ '.number_format($row->precio,2).'<br>
                                                        <span>En línea</span> $ '.number_format($row->precio_dist,2).'
                                                      </td>

                                                      <td><div class="bt3"><a href="'.base_url('vacunas/ver_vacuna/'.$row->id_vac.'-'.urlencode($row->nombre_vac)).'">Ver más</a></div></td>

                                                      <!--<td><button class="vacuna" id="'.$row->id_vac.'" name="'.$row->nombre_vac.'" title="'.$row->precio.'">Comprar</button></td>-->';

                                                if($count%2 == 0){

                                                    echo '</tr>';

                                                }

                                            }

                                            $count ++;  

                                        }   

                                   ?>



                                </tbody>

                            </table>



                            <div id="result" title="Descripción de vacunas"></div>

                            

                        </div>



                    </div>

                </div>

            </div>

        </section>



        <div id="get_compra" title="Ver carrito de compras"></div>



        <?php include('logos.php'); ?>



        <?php include('promo.php'); ?>

        

    </div>



    <?php include('footer2.php'); ?>



    <script src="<?=base_url()?>jquery/js/jquery.min.js"></script>

    <script src="<?=base_url()?>jquery/js/jquery-ui-1.10.0.custom.min.js"></script>

    <script type="text/javascript" src="<?=base_url()?>js/bootstrap.min.js" ></script>

    <script type="text/javascript" src="<?=base_url()?>js/custom.js" ></script>



    <?php include('footer_script.php'); ?>



    <?php include('slide2.php'); ?>



    <div id="form3" title="Carrito de compras."></div>  

    <script>

        $(document).ready(function(e) {

            var ventana_ancho = $(window).width();

            var width_fix = (ventana_ancho * 24 ) / 100;

            

            var custom_width = ventana_ancho * 0.7;

            

            $(".vacuna").click(function(){

                console.log("asdasd");

            });

            

            $('#result').dialog({

             position: { my: "center bottom" },

              autoOpen: false,

              modal: true,

              width:custom_width,

              resizable: false

            });

            

            $( '#form3' ).dialog({

                              width: '350',

                              autoOpen: false,

                              modal: true

                            });

            $('.add').click(function(){ 

                var name = $(this).attr('name');

                var precio = $(this).attr('title');

                $.post('vacunas/compras/',{name:name,precio:precio},function(data){

                    $( '#form3' ).html(data);

                });             

                $( '#form3' ).dialog( 'open' );

            });

            

            $('.gv').click(function(){

                var id= $(this).attr('id');

                $.post('vacunas/vac_lab',{id : id},function(data){

                    $("#vacunas_distribuidores").html(data);

                });

                

            }); 

            $( "#get_compra" ).dialog({

              width:width_fix,

              position: { my: "center bottom" },

              autoOpen: false,

              modal: true,

              width:custom_width,

              resizable: false

            });

            

            $('.code').click(function(){

                var id_code = $(this).attr('id');

                alert(id_code);

            });

            

            $('.vacuna').click(function(){

                

                var id = $(this).attr('id');

                $.post('vacunas/get_vac/',{id:id},function(data){

                    $('#result').html(data);

                });

                

                $( "#result" ).dialog( "open","moveToTop" );

                        

            });

            $('#comprar').click(function(){

                var num =  $(this).attr('class');

                if(num>0){

                    $.post('vacunas/view_cart/',function(data){

                        $('#get_compra').html(data);

                    });

                }else{

                    $('#get_compra').html('<p>El carrito se encuentra actualmente vacío.</p>');

                } 

                    

                $( "#get_compra" ).dialog( "open" );    

            });

             

        });

    </script>



</body>

</html>