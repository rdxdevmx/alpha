<!--Productos-->   

<div class="bodi off">

        <div class="localizacion_pag">

            <div class="container">

                <div class="row">

                    <div class="col-xs-12">

                        <a href="<?=site_url()?>"><img src="<?=site_url()?>assets/assets/tribu-bazar-boton-home.png" alt="tribu bazar boton home">Inicio</a>

                        <span>></span>

                        <a href="<?=site_url('contest')?>">Concursos</a>

                    </div>

                </div>

            </div>

        </div>
        
       <section class="pg1 productos_categorias">

            <div id="home_blog" class="container">

                <div class="row">
                
                	<?php
                    	foreach($results as $row):
														
							$contenido = strip_tags($row->contenido);
							$contenido = substr($contenido,0,160).'...';
					?>
                    <div class="col-xs-12 col-sm-4 portada">
                        <h2><?=$row->titulo?></h2>
                        
                        <a href="<?=site_url('view_entry/'.url_title(convert_accented_characters($row->titulo_en)).'_'.$row->id_entrada)?>">
                        	<img src="<?=site_url('files/'.$row->galeria.'/'.$row->foto)?>" class="img-responsive"  />
                        </a>
                                        
                        <!--<div class="contenido">
                            <?=$contenido?>
                        </div>-->
                         <!--<a class="ver_mas" href="<?=site_url('view_entry/'.url_title(convert_accented_characters($row->titulo)).'_'.$row->id_entrada)?>">Ver</a>  -->
                    </div>
                    
                    <?php
                    	endforeach;
					?>
                    
        		</div>
                
                <div id="pagination_blog" class="col-xs-12">
                	<?=$links?>
                </div>

                    
            </div>
            
       </section>         

</div>