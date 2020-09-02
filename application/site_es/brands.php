<!--Productos-->   

    <div class="bodi off">



        <div class="localizacion_pag">

            <div class="container">

                <div class="row">

                    <div class="col-xs-12">

                        <a href="<?=site_url()?>"><img src="<?=site_url()?>assets/assets/tribu-bazar-boton-home.png" alt="tribu bazar boton home">Home</a>

                        <span>></span>

                        <a href="<?=site_url('brands')?>">Brands</a>

                    </div>

                </div>

            </div>

        </div>


        <section class="pg1 productos_categorias">

            <div class="container">

                <div class="row">



                    <div class="col-xs-12 col-md-12">

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

<!--                                     <div class="bx_select">

                                        <p>Sort By:</p>

                                        <form id="form_sort" method="get">

                                            <select id="sort" name="sort" class="form-control" onchange="send_sort()"> 
												<?php
                                                	foreach($categoria->result() as $cat):
												?>
                                                <option value="<?=$cat->id_categoria?>"><?=$cat->categoria?></option>
												<?php
                                                	endforeach;
												?>
                                            </select>

                                        </form>

                                    </div> -->

                                </div>

                            </div>

                        </div>



                        <div class="bx_categorias">

                            <div class="row">
								<?php
                                	foreach($results as $row): 
								?>
                                <div class="bx_producto col-xs-6 col-sm-4">

                                    <a href="<?=site_url($row->url_tienda)?>">

                                        <div class="bx_img">
                                           	<img src="<?=site_url('files/logo/'.$row->logo)?>" alt="<?=$row->tienda?>">
                                        </div>

                                        <p><b><?=$row->tienda?></b></p>

                                    </a>

                                </div>
                                <?php
                                	endforeach;
								?>
                                
                                <p id="pagination"><?=$links?></p>

                            </div>



                        </div>



                    </div>



                </div>

            </div>

        </section>



    </div>



    <footer class="footer">

        

        <div class="footer_top">

            <div class="container">

                <div class="row pos_r">

                    <div class="col-xs-4">

                        <a href=""><img src="<?=site_url()?>assets/assets/tribu-bazar-contacto.png" alt="tribu bazar contacto">Contact Us</a>

                    </div>

                    <div class="col-xs-4">

                        <a href="compras.html"><img src="<?=site_url()?>assets/assets/tribu-bazar-tu-orden.png" alt="tribu bazar tu orden">Your order</a>

                    </div>

                    <div class="col-xs-4">

                        <a href=""><img src="<?=site_url()?>assets/assets/tribu-bazar-nosotros.png" alt="tribu bazar nosotros">About Us</a>

                    </div>

                    <a class="bt"><img src="<?=site_url()?>assets/assets/tribu-bazar-boton-plus.png" alt="tribu bazar boton plus"></a>

                </div>

            </div>

        </div>

    </footer>

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

