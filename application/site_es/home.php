    <div id="btn_float">
        <a href="javascript: void(0)" class="close-float"><span class="glyphicon glyphicon-remove"></span></a>
        <a href="<?=base_url("home/registro_tienda")?>">
            <span class="glyphicon glyphicon-shopping-cart"></span><br>
            Registra tu<br class="visible-xs"> tienda
        </a>
    </div>

<!--Section--> 

    <div class="bodi off">        



        <section class="bx_gen_slide">



            <div class="bx_slide">

			<?php

               	foreach($carrusel->result() as $slide):

			?>

               	<a href="<?=$slide->url?>">

               		<div class="block " style=" background-image: url(<?=site_url('files/carrusel/'.$slide->imagen)?>);  "></div>

				</a>

			<?php

				endforeach;

			?>

            </div>

        </section>


        <!-- <section class="pg1 design"> -->
        <section class="pg1 new_arrivals bx_gen_slide-">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <h2 class="text-center">Productos Destacados</h2>
                    </div>

                    <div class="bx_slide">
                    <?php
                        foreach($new->result() as $n):
                    ?>


                            <div class="col-xs-12">

                                <div class="bx_info">

    

                                    <div class="bx_img">                                       

                                        <img src="<?=site_url('files/'.$n->galeria.'/'.$n->foto)?>" alt="<?=$n->titulo?>">

                                    </div>

                                    <div class="bx_txt">

                                        <a href="<?=site_url('view_product/'.url_title(convert_accented_characters($n->titulo)).'_'.$n->id_producto)?>"><?=$n->titulo?></a>

                                    </div>

    

                                </div>

                            </div>


<!--                         <div class="col-xs-12 col-sm-3">
                            <div class="prod-destacados">
                                <a href="<?=site_url('view_product/'.url_title(convert_accented_characters($n->titulo)).'_'.$n->id_producto)?>">
                                    <div class="contenedor">
                                        <img class="img-responsive" src="<?=site_url('files/'.$n->galeria.'/'.$n->foto)?>" alt="<?=$n->titulo?>">
                                    </div>
                                </a>
                                <a href="<?=site_url('view_product/'.url_title(convert_accented_characters($n->titulo)).'_'.$n->id_producto)?>"><span><?=$n->titulo?></span></a>
                            </div>
                        </div>   -->
                    <?php
                        endforeach; 
                    ?>

                    </div>

                </div>
            </div>    
        </section>


        <section class="pg1 design">

            <div class="container">

                <div class="row">
                 

<!--                     <div class="col-xs-12 col-sm-6">



                        <div class="bx_info">



                            <img src="<?=site_url()?>assets/assets/img-prueba-4.png" alt="">



                            <div class="bx_txt">

                                <h2>Ropa</h2>

                                <a href="<?=site_url('category/clothing_2')?>">Ver Ropa</a>

                            </div>



                        </div>



                    </div> -->



<!--                     <div class="col-xs-12 col-sm-6">



                        <div class="bx_info">



                            <img src="<?=site_url()?>assets/assets/img-prueba-7.png" alt="">

                            <div class="bx_txt">

                                <h2>Joyería</h2>
                                <a href="<?=site_url('category/jewellery_6')?>">Ver Joyería</a>
                            </div>



                        </div>



                    </div> -->



<!--                     <div class="col-xs-12">



                        <div class="bx_info op-">



                            <img src="<?=site_url()?>assets/assets/img-prueba-6.png" alt="">



                            <div class="bx_txt">



                                <h2>Diseño-Ilustración</h2>


                                <a href="<?=site_url('category/design-illustration_4')?>">Ver Diseño-Ilustración</a>



                            </div>



                        </div>



                    </div> -->

<!--                     <div class="col-xs-12">

                        <div class="bx_info op-">

                            <img src="<?=site_url()?>assets/assets/rebajas-2017.jpg" alt="">

                            <div class="bx_txt">

                                <h2>Rebajas</h2>

                                <a href="<?=site_url('category/sale-and-offers_9')?>">Ver Rebajas</a>

                            </div>

                        </div>

                    </div> -->


                </div>



            </div>



        </section>



        <section class="link_clr">



            <a  href="<?=site_url('category/sale-and-offers_9')?>">



                <div class="container">



                    <div class="row">



                        <div class="col-xs-12">



                            <!-- <h2>Rebajas F/W 2017 <img src="<?=site_url()?>assets/assets/tribu-bazar-flecha-.png" alt=""></h2> -->




                        </div>



                    </div>



                </div>



            </a>



        </section>



        <section class="sale_offers bx_gen_slide--">


<!-- 
            <div class="container">



                <div class="row">



                    <div class="col-xs-12">



                        <h2 class="text-center">Rebajas</h2>



                    </div> 



                    <div class="bx_slide">	-->					



                        <!--Sale and Offers-->



                        <?php



                        	//foreach($ofers->result() as $o):



						?>


<!-- 
							<div class="col-xs-12">



                            



                                <div class="bx_info">



    



                                    <h3><?=$o->titulo?></h3>



    



                                    <p>Lorem ipsum dolor sit amet.</p>



    



                                    <a href="<?=site_url('view_product/'.url_title(convert_accented_characters($o->titulo)).'_'.$o->id_producto)?>">ver rebaja</a>



    



                                </div>



                        	</div> -->



                        <?php



                        	//endforeach;



						?>



                    </div>



                </div>

				

                <!--blog-->

                <div id="home-tiendas" class="container">
                    
                    <div class="row">

                        <div class="col-xs-12">
                            <h2 id="titulo_blog_home" class="text-center"><a href="<?=site_url('brands')?>">Tiendas</a></h2>
                        </div>

                        <?php 

                            $categoria_menu = $this->db->get_where('categoria', array('padre'=>0,'id_tienda'=>0) );

                            foreach ($categoria_menu->result() as $v) : 

                                $cat = strtoupper($v->categoria);

                                $link_cat = urlencode($cat).'_'.$v->id_categoria
                        ?>
                            

                            <div class="col-xs-12 col-sm-3">
                                
                                <div class="box-categoria">
                                    <div class="overlay">
                                        <h3><a href="<?=site_url('category/'.$link_cat)?>"><?=$v->categoria?></a></h3>
                                    </div>
                                </div>
                                
                            </div>

                        <?php endforeach; ?>   

                    </div>
                </div>

                
                <!--blog-->

                

                

                

            </div>



        </section>



    </div>



<!--Section