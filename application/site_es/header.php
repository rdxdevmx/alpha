<?php 
    // echo '<pre>';
    // print_r($this->session->all_userdata());
    // echo '</pre>';
?>
<!DOCTYPE html>

<html lang="en">

  <head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="<?=site_url()?>assets/assets/favicon.ico" />

    <meta http-equiv="CONTENT-LANGUAGE" CONTENT="es-MX">

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <meta name="author" content="TRIBU BAZAR STORE" />

    

    <meta name="Description" content="<?=(isset($desc_tag) && $desc_tag!='')?$desc_tag:'Tribu Bazar Store es un grupo de emprendedores con visión flexible sobre el cambio de cultura y consumo hacia lo bien hecho en México. Con calidad de exportación #somostribu Tribu bazar Store. Experiencias y emociones hechas talento'?>"/>

    <meta name="Title" content="Tribu bazar Store<?=(isset($title_tag) && $title_tag!='')?' | '.$title_tag:''?>"/>

    <meta name="Keywords" content="" />

    <meta name="robots" content="index,follow" />

    <title>Tribu bazar Store<?=(isset($title_tag) && $title_tag!='')?' | '.$title_tag:''?></title>

    <meta property="og:image" content="<?=site_url()?>assets/assets/logo-tribubazar-nuevo.jpg"/>

	<meta property="og:image:secure_url" content="<?=site_url()?>assets/assets/logo-tribubazar-nuevo.jpg" />

    <link rel="image_src" href="<?=site_url()?>assets/assets/logo-tribubazar-nuevo.jpg"/>

    <link rel="stylesheet" type="text/css" href="<?=site_url()?>assets/css/reset.css">  

    <link rel="stylesheet" type="text/css" href="<?=site_url()?>assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="<?=site_url()?>assets/js/royalslider/royalslider.css">

    <link rel="stylesheet" type="text/css" href="<?=site_url()?>assets/css/css1.css" />   

    <link href="<?=base_url()?>assets/admin/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- Facebook Pixel Code -->

<script>

!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?

n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;

n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;

t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,

document,'script','https://connect.facebook.net/en_US/fbevents.js');



fbq('init', '1084968624879629');

fbq('track', "PageView");</script>

<noscript><img height="1" width="1" style="display:none"

src="https://www.facebook.com/tr?id=1084968624879629&ev=PageView&noscript=1"

/></noscript>

<!-- End Facebook Pixel Code -->



<script>

// ViewContent

// Track key page views (ex: product page, landing page or article)

fbq('track', 'ViewContent');





// Search

// Track searches on your website (ex. product searches)

fbq('track', 'Search');





// AddToCart

// Track when items are added to a shopping cart (ex. click/landing page on Add to Cart button)

fbq('track', 'AddToCart');





// AddToWishlist

// Track when items are added to a wishlist (ex. click/landing page on Add to Wishlist button)

fbq('track', 'AddToWishlist');





// InitiateCheckout

// Track when people enter the checkout flow (ex. click/landing page on checkout button)

fbq('track', 'InitiateCheckout');





// AddPaymentInfo

// Track when payment information is added in the checkout flow (ex. click/landing page on billing info)

fbq('track', 'AddPaymentInfo');





// Purchase

// Track purchases or checkout flow completions (ex. landing on "Thank You" or confirmation page)

fbq('track', 'Purchase', {value: '1.00', currency: 'USD'});





// Lead

// Track when a user expresses interest in your offering (ex. form submission, sign up for trial, landing on pricing page)

fbq('track', 'Lead');





// CompleteRegistration

// Track when a registration form is completed (ex. complete subscription, sign up for a service)

fbq('track', 'CompleteRegistration');

</script>



    <script>

        function send_search(){

            if (event.which == 13) {

                event.preventDefault();

                $("#search_form").submit();

            }

        }  

	function popup(mylink, windowname) { 

		if (! window.focus)return true;

		var href;

		if (typeof(mylink) == 'string') href=mylink;

		else href=mylink.href; 

		window.open(href, windowname, 'width=500,height=400,scrollbars=yes'); 

		return false; 

	  }     

	  

	function remove_active(){

        $(".fnd_menu , .menu_principal_tribu").toggleClass("active");	 

	}

    </script>

  	<script> (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){ (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o), m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m) })(window,document,'script','//www.google-analytics.com/analytics.js','ga'); ga('create', 'UA-83401709-2', 'auto'); ga('send', 'pageview'); </script>

  </head>

<body>


<!--Header-->

    <div class="fnd_menu" onClick="remove_active()"></div>

    <header class="header">


        <div id="msj-top-envio">
            <p>Envio gratis en compras igual o mayor <span>$1000</span> pesos</p>
        </div>

        <div class="container pos_r">

            <form id="search_form" action="<?=site_url('search')?>" method="get" class="form_busqueda" onKeyPress="send_search()">

                <input type="text" name="search" value="<?=(isset($_GET['search'])) ? $_GET['search'] :""?>" placeholder="Buscar">

                <button type="submit" ></button>

                <a class="bt_busqueda bx"><p>x</p></a>

            </form>

            <div class="row">

                <div class="col-xs-2 col-sm-4 col-md-4">

                    <div class="bx_idioma">

                        <p><a href="<?=site_url()?>home/session?language=en">EN</a> | <a id="select_lang" href="<?=site_url()?>home/session?language=es">ES</a></p>

                    </div>

                    <a class="btn_colapse active">

                        <span></span><span></span><span></span>

                    </a>

                </div>

                <div class="col-xs-6 col-sm-4 col-md-4 hidden-xs">

                    <div class="bx_logo">

                        <a href="<?=site_url()?>">
                            <img src="<?=site_url()?>assets/assets/logo-tribubazar-nuevo.jpg" alt="tribu bazar logotipo">
                        </a>

                        <h1>Tribu Bazar</h1>

                    </div>                    

                </div>

                <div class="col-xs-7 visible-xs" style="padding:0;">

                    <div class="col-xs-12 no-padding bx_logo" style='text-align: right; padding:0; '>	

                        <a href="<?=site_url()?>">

                            <img  src="<?=site_url()?>assets/assets/logo-tribubazar-nuevo.jpg" alt="tribu bazar logotipo">

                        </a>

                    </div>

                    

                </div>   

                <div class="col-xs-3 col-sm-4 col-md-4">

                    <div class="pos_r">

                    <?php

                        $logged_in = $this->session->userdata('logged_in');

                        if($logged_in): 

                        

                    ?>

                        <div class="cuenta">    

    

                                <p><a class="log_link" href="<?=site_url('account/log_out')?>">Salir</a></p>

   

                                <img src="<?=site_url()?>assets/assets/tribu-bazar-flecha.png" alt="tribu bazar flecha">

                                

                                <?php

                                	$user = explode(" ", $this->session->userdata('username'));

								?>

                                

                                <p><a class="log_link" href="<?=site_url('account')?>">Hola, <?=$user[0]?></a></p>

                        </div>

                    <?php

                        else:   

                    ?>

					<div class="cuenta">	

                        

                        <p><a class="log_link" data-toggle="modal" data-target="#sign_in" href="javascript:void(0);">ACCEDER</a></p>

<!--                        <a href="<?=site_url()?>create-account" class="cuenta">

                            <p>ACCEDER</p>-->

                            <img src="<?=site_url()?>assets/assets/tribu-bazar-flecha.png" alt="tribu bazar flecha">

						

                        <p><a class="log_link" href="<?=site_url('create-account')?>">CREAR CUENTA</a></p>

                        

<!--                            <p>CREAR CUENTA</p>

                        </a>

-->                        

					</div>

                    <?php

                        endif;

                    ?>

                        <div class="bx_icon">

                            <a class="bt_busqueda"><img src="<?=site_url()?>assets/assets/tribu-bazar-busqueda.png" alt="tribu bazar busqueda"></a>

                            <?php

                            	

								$bag_count = $this->session->userdata('bag');

								

								if($bag_count==''):

									$count_bag = '0';

								else:	

									$count_bag = count($bag_count);

								endif;

								

							?>

                            <a id="count_bag" href="<?=site_url()?>shopping_bag">

                            	<?=$count_bag?>

                                <!--<img src="<?=site_url()?>assets/assets/tribu-bazar-compras.png" alt="tribu bazar compras">-->

                            </a>

                            <!--Botones de idioma-->

                            <div class='col-xs-12 no-padding bx_idiomas visible-xs'>

                                <a id="" href="<?=site_url()?>home/session?language=en">EN</a>

                                <a id="select_lang" href="<?=site_url()?>home/session?language=es">ES</a>

                            </div>

                            <!--Botones de idioma-->

                        </div>

                    </div>

                </div>

            </div>

        </div>

<!--         element.style {
    margin: 0 auto;
    display: table;
} -->

        <nav class="menu_principal_tribu">

            <ul class="nav navbar-nav">

                <li class="bi-"><a href="<?=site_url()?>">Inicio</a></li>

                <li><a href="<?=site_url('home/registro_tienda')?>">Abre tu tienda</a></li>

                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Categorías <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    
                    <?php 

                        $categoria_menu = $this->db->get_where('categoria', array('padre'=>0,'id_tienda'=>0) );

                        foreach ($categoria_menu->result() as $v) : 

                            $cat = strtoupper($v->categoria);

                            $link_cat = urlencode($cat).'_'.$v->id_categoria
                    ?>
                    
                        <li><a href="<?=site_url('category/'.$link_cat)?>"><?=$v->categoria?></a></li>
                    
                    <?php endforeach; ?>                   

                  </ul>
                </li>

                <li><a href="<?=site_url('brands')?>">Tiendas</a></li>

                <?php if(!$this->session->userdata('username')):?> 
                <li class="visible-xs"><a href="<?=site_url('create-account')?>">CREAR CUENTA</a></li>
                <?php endif;?>

<!--                 <li><a href="<?=site_url('category/clothing_2')?>">Ropa</a></li>

                <li><a href="<?=site_url('category/design-illustration_3')?>">Diseño-Ilustración</a></li>

                <li><a href="<?=site_url('category/bags_4')?>">Bolsos</a></li>

                <li><a href="<?=site_url('category/footwear_19')?>">Calzado</a></li>

                <li><a href="<?=site_url('category/accessories_5')?>">Accesorios</a></li>

                <li><a href="<?=site_url('category/jewellery_6')?>">Joyería</a></li>

                <li><a href="<?=site_url('category/kids_7')?>">Niños</a></li>

                <li><a href="<?=site_url('category/decor_14')?>">DECORACIÓn</a></li>

                <li><a href="<?=site_url('category/sale-and-offers_9')?>">Rebajas</a></li>
 -->
                <li><a href="<?=site_url('blog')?>">Blog</a></li>

                <p class="hidden-md hidden-lg">Mi cuenta</p>

                <?php if($this->session->userdata('username')):?>                

                    <li class="op- bi- visible-xs"><a class="log_link" href="<?=site_url('account')?>">Hola, <?=$user[0]?></a></li>

                    <li class="op- bi- visible-xs"><a class="log_link" href="<?=site_url('account/log_out')?>">Salir</a></li>

                <?php else:?>

                    <li class="op- bi- visible-xs"><a href="<?=site_url('create-account')?>">Acceder</a></li>

                <?php endif;?>

                <li><a href="<?=site_url('contest')?>">Concursos</a></li>

                <!--<li><a href="javascript:void(0);" data-toggle="modal" data-target="#concursos">Concursos</a></li>-->

            </ul>

        </nav>

    </header>

<!--Header-->

<style type="text/css">

    .bx_idiomas{

		margin-top:10px;

        text-align: center;

    }

    .bx_idiomas a{

        text-align: center;

        font-family: 'caviar_dreams_B' !important;

        color: #222 !important;

    }

    .bx_idiomas p{

        margin-bottom: 0px;

        padding:10px;

        padding-bottom: 0px;

        text-align: center !important;

    }


</style>