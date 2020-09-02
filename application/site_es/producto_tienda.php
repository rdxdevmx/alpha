<!--Productos-->   

    <div class="bodi off">

        <?php 
            $background = '';

            if(isset($tienda->active) && $tienda->active == 1): 
                if(isset($tienda->banner) && $tienda->banner !=''): 
                    $background = "background-image:linear-gradient(1deg,rgba(255,255,255,0.7) 100%,rgba(255,255,255,0) 100%), url('".base_url('files/logo/fa5e4c7f392279969bef7cac0926c121.jpg')."'); 
                                   background-size: cover; background-position: center center;";    
                endif;  
            endif; 

        ?>

        <div class="localizacion_pag" style="<?=$background?>">

            <div class="container">

                <div class="row">

                    <div class="col-xs-12">

                        <?php if(isset($tienda->active) && $tienda->active == 1): ?>

                        <img id="logo-theme-tienda" src="<?=base_url('files/logo/'.$tienda->logo)?>">

                        <?php endif; ?>

                        <a href="<?=site_url()?>"><img src="<?=site_url()?>assets/assets/tribu-bazar-boton-home.png" alt="tribu bazar boton home">Home</a>

                        <span>></span>

                        <a href="<?=site_url(uri_string())?>"><?=$title_section?></a>

                        <?php if(isset($tienda->active) && $tienda->active == 1): ?>
                        <p id="tienda_descripcion"><?=$tienda->descripcion?></p>
                        <?php endif; ?>

                    </div>

                   <!--  <div class="col-xs-12 col-sm-4"></div> -->

                </div>

            </div>

        </div>

        <!-- <section class="pg1 head_producto">

            <div class="container">

                <div class="row">

                    

                    <div class="bx_info">

                        <div class="col-xs-12 col-sm-3">

                            <div class="bx_img">

                                <img src="<?=site_url()?>assets/assets/img-prueba-2.png" alt="">

                            </div>

                        </div>

                        <div class="col-xs-12 col-sm-9">

                            <h1>New Arrivals</h1>

                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam eligendi repellat dolore, nesciunt deserunt possimus obcaecati accusantium nihil repellendus perspiciatis nulla atque ut. Necessitatibus illo, eum nesciunt quod provident nihil.</p>

                        </div>

                    </div>

                </div>

            </div>

        </section> -->

        <section class="pg1 productos_categorias">

            <div class="container">

                <div class="row">

                    

                    <?php if(isset($tienda->active) && $tienda->active == 1): ?>

                    <div class="col-xs-12 ">

                        <div class="bx_menu">

                            <div class="row">

                                <div class="col-xs-6 col-sm-3">

                                    <div class="bx_icon">

                                        <a class="bt1">

                                            <img class="hidden-xs" src="<?=site_url()?>assets/assets/tribu-bazar-boton-listado.png" alt="tribu bazar boton listado">

                                            <img class="visible-xs" src="<?=site_url()?>assets/assets/tribu-bazar-boton-listado---.png" alt="tribu bazar boton listado">

                                        </a>

                                        <a class="bt2 active">

                                            <img class="hidden-xs" src="<?=site_url()?>assets/assets/tribu-bazar-boton-listado-.png" alt="tribu bazar boton listado">

                                            <img class="visible-xs" src="<?=site_url()?>assets/assets/tribu-bazar-boton-listado.png" alt="tribu bazar boton listado">

                                        </a>

                                        <a class="bt3 hidden-xs">

                                            <img src="<?=site_url()?>assets/assets/tribu-bazar-boton-listado--.png" alt="tribu bazar boton listado">

                                        </a>

                                    </div>

                                </div>

                                <div class="col-xs-6 col-sm-3 col-sm-push-6">

                                    <div class="bx_resultado">

                                        <p><?=$total_rows?> resultados</p>

                                    </div>

                                </div>

                                <div class="col-xs-12 col-sm-6 col-sm-pull-3">

                                    <div class="bx_select">

                                        <p>Ordenar por:</p>

                                        <form id="form_sort" method="get">

                                            <select id="sort" name="sort" class="form-control" onchange="send_sort()"> 

                                                <option <?=(isset($sort) && $sort==1)? ' selected="selected" ':''?> value="1">Mejores</option>

                                                <option <?=(isset($sort) && $sort==2)? ' selected="selected" ':''?> value="2">Nuevos</option>

                                                <option <?=(isset($sort) && $sort==3)? ' selected="selected" ':''?> value="3">Precio - Bajo a Alto</option>

                                                <option <?=(isset($sort) && $sort==4)? ' selected="selected" ':''?> value="4">Precio - Alto a Bajo</option>

                                                <!--<option value="5">Rating - Descending</option>-->

                                            </select>

                                        </form>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="bx_categorias">

                            <div class="row">

                                <?php if(isset($tienda->active) && $tienda->active == 1): ?>
                                <div class="col-xs-12 col-sm-2">
                                    
                                    <h3>Categorías</h3>
                                    <hr>

                                    <ul id="categorias_tienda">
                                    <?php foreach($categorias->result() as $cat): ?>
                                        <li><a href="<?=site_url(uri_string().'/'.$cat->id_categoria)?>"><?=$cat->categoria?></a></li> 
                                    <?php endforeach;?>
                                    </ul>
                                </div>
                                <?php endif; ?>

                                <?php if(isset($tienda->active) && $tienda->active == 1): ?> <div class="col-xs-12 col-sm-10"> <?php endif; ?>
								<?php

                                	foreach($results as $row): 

								?>

                                <div class="bx_producto col-xs-6 col-sm-4">

                                    <a href="<?=site_url('view_product/'.url_title(convert_accented_characters($row->titulo)).'_'.$row->id_producto)?>">

                                        <div class="bx_img">

                                        	<?php

                                            	$fotos = $this->db->query('SELECT * FROM  galeria WHERE marcador <>"" AND key_foto="'.$row->galeria.'" ORDER BY marcador ASC ');

												foreach($fotos->result() as $f):

											?>

                                            	<img class="img<?=$f->marcador?>" src="<?=site_url('files/'.$row->galeria.'/'.$f->foto)?>" alt="<?=$row->titulo?>">

                                            <?php

                                            	endforeach;

											?>

                                        </div>

                                        <p><b><?=$row->titulo?></b></p>

                                        <p>$<?=number_format($row->precio,2)?></p>

                                    </a>

                                </div>

                                <?php endforeach;?>   

                                <?php if(isset($tienda->active) && $tienda->active == 1): ?> </div> <?php endif; ?>                            

                                <p id="pagination"><?=$links?></p>

                            </div>

                        </div>

                    </div>

                    <?php elseif (isset($category_view) && $category_view): ?>

                    <div class="col-xs-12 ">

                        <div class="bx_menu">

                            <div class="row">

                                <div class="col-xs-6 col-sm-3">

                                    <div class="bx_icon">

                                        <a class="bt1">

                                            <img class="hidden-xs" src="<?=site_url()?>assets/assets/tribu-bazar-boton-listado.png" alt="tribu bazar boton listado">

                                            <img class="visible-xs" src="<?=site_url()?>assets/assets/tribu-bazar-boton-listado---.png" alt="tribu bazar boton listado">

                                        </a>

                                        <a class="bt2 active">

                                            <img class="hidden-xs" src="<?=site_url()?>assets/assets/tribu-bazar-boton-listado-.png" alt="tribu bazar boton listado">

                                            <img class="visible-xs" src="<?=site_url()?>assets/assets/tribu-bazar-boton-listado.png" alt="tribu bazar boton listado">

                                        </a>

                                        <a class="bt3 hidden-xs">

                                            <img src="<?=site_url()?>assets/assets/tribu-bazar-boton-listado--.png" alt="tribu bazar boton listado">

                                        </a>

                                    </div>

                                </div>

                                <div class="col-xs-6 col-sm-3 col-sm-push-6">

                                    <div class="bx_resultado">

                                        <p><?=$total_rows?> resultados</p>

                                    </div>

                                </div>

                                <div class="col-xs-12 col-sm-6 col-sm-pull-3">

                                    <div class="bx_select">

                                        <p>Ordenar por:</p>

                                        <form id="form_sort" method="get">

                                            <select id="sort" name="sort" class="form-control" onchange="send_sort()"> 

                                                <option <?=(isset($sort) && $sort==1)? ' selected="selected" ':''?> value="1">Mejores</option>

                                                <option <?=(isset($sort) && $sort==2)? ' selected="selected" ':''?> value="2">Nuevos</option>

                                                <option <?=(isset($sort) && $sort==3)? ' selected="selected" ':''?> value="3">Precio - Bajo a Alto</option>

                                                <option <?=(isset($sort) && $sort==4)? ' selected="selected" ':''?> value="4">Precio - Alto a Bajo</option>

                                                <!--<option value="5">Rating - Descending</option>-->

                                            </select>

                                        </form>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="bx_categorias">

                            <div class="row">

                                <?php

                                    foreach($results as $row): 

                                ?>

                                <div class="bx_producto col-xs-6 col-sm-4">

                                    <a href="<?=site_url('view_product/'.url_title(convert_accented_characters($row->titulo)).'_'.$row->id_producto)?>">

                                        <div class="bx_img">

                                            <?php

                                                $fotos = $this->db->query('SELECT * FROM  galeria WHERE marcador <>"" AND key_foto="'.$row->galeria.'" ORDER BY marcador ASC ');

                                                foreach($fotos->result() as $f):

                                            ?>

                                                <img class="img<?=$f->marcador?>" src="<?=site_url('files/'.$row->galeria.'/'.$f->foto)?>" alt="<?=$row->titulo?>">

                                            <?php

                                                endforeach;

                                            ?>

                                        </div>

                                        <p><b><?=$row->titulo?></b></p>

                                        <p>$<?=number_format($row->precio,2)?></p>

                                    </a>

                                </div>

                                <?php endforeach;?>                                

                                <p id="pagination"><?=$links?></p>

                            </div>

                        </div>

                    </div>
                    <?php else: ?>

                        <h2>La tienda esta desactivada.</h2>

                    <?php endif; ?>



                </div>

            </div>

        </section>

    </div>

   <!-- <footer class="footer">

        

        <div class="footer_top">

            <div class="container">

                <div class="row pos_r">

                    <div class="col-xs-4">

                        <a href=""><img src="<?=site_url()?>assets/assets/tribu-bazar-contacto.png" alt="tribu bazar contacto">Contáctano</a>

                    </div>

                    <div class="col-xs-4">

                        <a href="compras.html"><img src="<?=site_url()?>assets/assets/tribu-bazar-tu-orden.png" alt="tribu bazar tu orden">Tu orden</a>

                    </div>

                    <div class="col-xs-4">

                        <a href=""><img src="<?=site_url()?>assets/assets/tribu-bazar-nosotros.png" alt="tribu bazar nosotros">Nosotros</a>

                    </div>

                    <a class="bt"><img src="<?=site_url()?>assets/assets/tribu-bazar-boton-plus.png" alt="tribu bazar boton plus"></a>

                </div>

            </div>

        </div>-->

<!--Productos-->

<script>

	function send_sort(){

		var key = 'sort';

		var value = $('#sort').val();		

		

		key = encodeURIComponent(key); 

		value = encodeURIComponent(value);

	

		var s = document.location.search;

		var kvp = key+"="+value;

	

		var r = new RegExp("(&|\\?)"+key+"=[^\&]*");

	

		s = s.replace(r,"$1"+kvp);

	

		if(!RegExp.$1) {s += (s.length>0 ? '&' : '?') + kvp;};

		window.location.replace("<?=current_url()?>" + s);		

		

		

	}

</script>

