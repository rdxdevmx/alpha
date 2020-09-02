<!--Productos-->   

<div class="bodi off">

        <div class="localizacion_pag">

            <div class="container">

                <div class="row">

                    <?=$m?>    

                    <div class="col-xs-12">

                        <a href="<?=site_url()?>"><img src="<?=site_url()?>assets/assets/tribu-bazar-boton-home.png" alt="tribu bazar boton home">Home</a>

                        <span>></span>

                        <a href="<?=site_url('view_entry/'.url_title(convert_accented_characters($entrada->titulo)).'_'.$entrada->id_entrada)?>"><?=$entrada->titulo?></a>

                    </div>

                </div>

            </div>

        </div>
        
       <section class="pg1 productos_categorias">

            <div class="container">

                <div class="row">
                    
        			<h2><?=$entrada->titulo?></h2>
                    
                    <img src="<?=site_url('files/'.$entrada->galeria.'/'.$entrada->foto)?>" class="img-responsive"  />
                                	
                    <div id="contest_contenido">
                        <?=$entrada->contenido?>
                    </div>
                    
                    <div>
                        <div id="resultado">
                        </div>
            <?php if($entrada->vigencia >= date('Y-m-d')):?>  
            
            <form class="bx_formulario1" id="formuconcurso" action="<?=site_url('home/send_concursos')?>" method="post">
                <input type="hidden" name="concurso" id="concurso" value="<?=$entrada->id_entrada?>"  />

     		<div class="form-group">

                <label>Nombre:</label>

                <input type="text" name="nombre" class="form-control" required="required" />

            </div>    

     		

     		<div class="form-group">

                <label>Correo:</label>

                <input type="email" name="email" id="correo" class="form-control" class="form-control" placeholder="" required="" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}">

            </div>

            

            <div class="form-group">

                <label>Facebook:</label>

                <input type="text" name="fb" class="form-control" required="required" />

            </div> 

            

            <div class="form-group">

                <label>Telefono:</label>

                <input type="text" name="telefono" class="form-control" required="required" />

            </div> 

            <div class="form-group">

            	<input type="submit" value="Enviar">   
                <!-- <button type="submit" class="bt op-" value="SEND">Enviar</button> -->

            </div>

        </form>
                        
                        <?php else: ?>
                        <h3>Este concurso ha finalizado</h3>
                        <?php endif;?>
                    </div>
                    
        		</div>

                    
            </div>
            
       </section>         

</div>

