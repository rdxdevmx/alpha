<div id="page-wrapper">
	
	<div class="row">
 	   
 	   <div class="col-lg-12">
       	<h4 class="page-header">Llenar formato cotización</h4>
       </div>
       
       <div id="bread_crumb">
       	
	   <!-- <a href="<?=site_url('admin/panel')?>">Inicio</a> / <a href="<?=site_url('admin/cuentas')?>">Cuentas </a> / <a href="<?=site_url('admin/servicios/?id='.$_GET['id_cuenta'])?>">Servicios </a> / <a href="<?=site_url('admin/ver_acciones/?id_servicio='.$id.'&id_cuenta='.$_GET['id_cuenta'])?>">Acciones </a> /  <a href="<?=site_url('admin/crear_accion/?id='.$_GET['id'].'&id_cuenta='.$_GET['id_cuenta'])?>">Crear acción </a> / -->
    	</div>

	</div>
	
	<div class="row">

		<div class="col-xs-12">
			<div class="panel panel-default">
				<div class="panel-heading">
			      <h4 class="panel-title">TIPO DE SERVICIO REGISTRADOS</h4>
				</div>

				<!--  SEGURO DE CARGA INT.   CROSSDOCK  DISTRIBUCIÓN   PAQUETERÍA  -->
				<div id="select-servicio" class="panel-body">

					<?php 

						$servicios_array = array(); 

						foreach ($servicios->result() as $r):
							$servicios_array[] = $r->tipo_servicio;
						endforeach;

					?>
					
					<div class="col-xs-12">

						<?php //if(in_array(1 , $servicios_array) ): ?>
						<div class="col-xs-3">
							<h3><input type="checkbox"  class="ckss maritimo" data-servicio="maritimo" value="1"> Marítimo</h3>
						</div>
						<?php //endif; ?>
						
						<?php //if(in_array(2, $servicios_array) ): ?>
						<div class="col-xs-3">
							<h3><input type="checkbox" class="ckss terrestre" data-servicio="terrestre" value="2"> Terrestre</h3>
							<div class="col-xs-6 no-padding">
								<p><input type="checkbox" class="ckss terrestre" data-servicio="terrestre" disabled> <strong>Nac.</strong></p>
							</div>
							<div class="col-xs-6 no-padding">
								<p><input type="checkbox" class="ckss terrestre" data-servicio="terrestre" disabled> <strong>Int.</strong></p>
							</div>
						</div>
						<?php //endif; ?>

						<?php //if(in_array(3 , $servicios_array) ): ?>
						<div class="col-xs-3">
							<h3><input type="checkbox" class="ckss aereo" data-servicio="aereo" value="3"> Aéreo</h3>
						</div>
						<?php //endif; ?>

						<?php //if(in_array(4 , $servicios_array) ): ?>
						<div class="col-xs-3">
							<h3><input type="checkbox" class="ckss intermodal" data-servicio="intermodal" value="4"> Intermodal</h3>
						</div>
						<?php //endif; ?>
					</div>

					<div class="col-xs-12">

						<?php //if(in_array(5, $servicios_array) ): ?>
						<div class="col-xs-3">
							<h3><input type="checkbox" class="ckss agente " data-servicio="agente" value="5"> Agente aduanal</h3>
						</div>
						<?php //endif; ?>

						<?php //if(in_array(6 , $servicios_array) ): ?>
						<div class="col-xs-3">
							<h3><input type="checkbox" class="ckss seguro " data-servicio="seguro" value="6"> Seguro</h3>
							<div class="col-xs-6 no-padding">
								<p><input type="checkbox" class="ckss seguro" data-servicio="seguro" disabled> <strong>Nac.</strong></p>
							</div>
							<div class="col-xs-6 no-padding">
								<p><input type="checkbox" class="ckss seguro" data-servicio="seguro" disabled> <strong>Int.</strong></p>
							</div>
						</div>
						<?php //endif; ?>

						<?php //if(in_array(7 , $servicios_array) ): ?>
						<div class="col-xs-3">
							<h3><input type="checkbox" class="ckss almacenamiento " data-servicio="almacenamiento" value="7"> Almacenamiento</h3>
						</div>
						<?php //endif; ?>

						<?php //if(in_array(8 , $servicios_array) ): ?>
						<div class="col-xs-3">
							<h3><input type="checkbox" class="ckss mensajeria" data-servicio="mensajeria" value="8"> Mensajería</h3>
						</div>
						<?php //endif; ?>
					</div>

				</div>

			</div>
		</div>

    	<div class="col-xs-12">
    		
    		<div id="message"></div>

			<div class="panel-group" id="accordion-formato">
			  
			  <div id="terrestre" class="panel panel-default panel-titulo">
			    
			    <div class="panel-heading panel-cabecera">
			      <h4 class="panel-title">
			        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1"></a>
			          INFORMACIÓN FLETE TERRESTRE
			      </h4>
			    </div>


			    <div id="collapse1" class="panel-collapse collapse in">
			      
			      <!-- <form action="<?=base_url('admin/insert_formato')?>" method="post"> -->
			      <form id="form1"  method="post">
				      <input type="hidden" name="tipo_formato" value="1">
				      <input type="hidden" name="id_accion" value="<?=$id_accion?>">

				  <div class="panel-body">
				  	<div class="row">
				  		<div class="col-xs-12 col-sm-4">

				  			<div class="panel panel-default show">
                        		<div class="panel-heading">
				  					<h4><input type="checkbox" name="seco" value="1"><b>SECO</b></h4><br>
				  				</div>
				  			<div class="panel-body">

							<div class="col-sm-6">	
								<p class=""><input type="checkbox" name="ftl" value="1"><strong>FTL</strong></p>
								<hr>
								<p class=""><input  type="checkbox" name="ftl_1" value="53’">53’</p><br>
								<p class=""><input class="pad_left" type="checkbox" name="ftl_2" value="48’">48’</p><br>
								<p class=""><input class="pad_left" type="checkbox" name="ftl_3" value="TH">TH </p><br>
								<p class=""><input class="pad_left" type="checkbox" name="ftl_4" value="3.5">3.5 </p><br>
								<p class=""><input class="pad_left" type="checkbox" name="ftl_5" value="1.5">1.5 </p><br>
								<p class=""><strong>TIPO EMBALAJE:</strong><p> 
								<p class=""><input type="checkbox" name="embalaje_1" value="ENTARIMADO">ENTARIMADO </p><br>
								<p class=""><input type="checkbox" name="embalaje_2" value="A PISO">A PISO </p><br>
								<p class=""><input type="checkbox" name="embalaje_3" value="AMBOS">AMBOS </p><br>

							</div>

							<div class="col-sm-6">	
								<p><input type="checkbox" name="ltl" value="1"><strong>LTL</strong></p>
								<hr>
								<p><strong>TIPO EMPAQUE:</strong></p> 

								<p class=""><input type="checkbox" name="empaque_1" value="ENTARIMADO"> ENTARIMADO </p><br>
								<p class=""><input type="checkbox" name="empaque_2" value="CAJAS SUELTAS"> CAJAS SUELTAS </p><br>
								<p class=""><input type="checkbox" name="empaque_3" value="OTRO"> OTRO <input name="empaque_3_val" class="form-control">  </p><br>

									<div class="form-group">
										<input type="checkbox" name="dimension"> <strong>DIMENSIONES Y PESOS</strong><br> 								
									</div>
									
									<div class="form-group row">

										<label class="col-xs-1 col-form-label">1.</label>
										<div class="col-xs-11">
									 		<input type="text" class="form-control" name="dimension_1"> 
										</div>

										<label class="col-xs-1 col-form-label">2.</label>
										<div class="col-xs-11">
									 		<input type="text" class="form-control" name="dimension_2"> 
										</div>

										<label class="col-xs-1 col-form-label">3.</label>
										<div class="col-xs-11">
									 		<input type="text" class="form-control" name="dimension_3"> 
										</div>

										<label class="col-xs-1 col-form-label">4.</label>
										<div class="col-xs-11">
									 		<input type="text" class="form-control" name="dimension_4"> 
										</div>

										<label class="col-xs-1 col-form-label">5.</label>
										<div class="col-xs-11">
									 		<input type="text" class="form-control" name="dimension_5"> 
										</div>
									</div>

							</div>

				  		</div></div></div>


			





				  		<div class="col-xs-12 col-sm-4">
				  			<div class="panel panel-default show ">
                        		<div class="panel-heading">                        		
				  					<h4><input type="checkbox" name="temp_ctrl" value="1"> <b>TEMPERATURA CONTROLADA </b></h4><br>
				  				</div>
				  				<div class="panel-body">
							<p class="pad_left"><input type="checkbox" name="temp_ctrl_1" value="53’"> 53’ </p><br>
							<p class="pad_left"><input type="checkbox" name="temp_ctrl_2" value="48’"> 48’ </p><br>
							<p class="pad_left"><input type="checkbox" name="temp_ctrl_3" value="TH"> TH </p><br>
							<p class="pad_left"><input type="checkbox" name="temp_ctrl_4" value="3.5"> 3.5 </p><br>
							<p class="pad_left"><input type="checkbox" name="temp_ctrl_5" value="1.5"> 1.5 </p><br> 

							<div class=" form-group">
								<label class="pad_left">
								<input type="checkbox" name="ref_temp" value="1"> <strong>REFRIGERADO</strong>	
								TEMP. <input class="form-control" type="number" step="0.01" name="ref_temp_val" placeholder="°C">					
								</label>
							</div>

							<div class=" form-group">
								<label class="pad_left">
								<input type="checkbox" name="cons_temp" value="1"> <strong>CONSERVACIÓN </strong>
								TEMP. <input class="form-control" type="number" step="0.01" name="cons_temp_val" placeholder="°C">
								</label>
							</div>

							<div class=" form-group">
								<label class="pad_left">
									<input type="checkbox" name="cong_temp" value="1"> <strong>CONGELADO</strong>
									TEMP. <input class="form-control" type="number" step="0.01" name="cong_temp_val" placeholder="°C">
								</label>
							</div>

				  		</div></div></div>


				  		<div class="col-xs-12 col-sm-4">
				  			<div class="panel panel-default show">
                        		<div class="panel-heading">    
				  					<h4><input type="checkbox" name="equipo_req" value="1"> <b>EQUIPO REQUERIDO</b></h4><br>
				  				</div>
				  				<div class="panel-body">
							<p class="pad_left"><input type="checkbox" name="equipo_req_1" value="ALL TRUCK"> ALL TRUCK </p><br>
							<p class="pad_left"><input type="checkbox" name="equipo_req_2" value="RAIL TRUCK"> RAIL TRUCK </p><br>
							<p class="pad_left"><input type="checkbox" name="equipo_req_3" value="ALL RAIL"> ALL RAIL </p><br>
							<p class="pad_left"><input type="checkbox" name="equipo_req_4" value="HOT SHOT">HOT SHOT </p><br>
							<p class="pad_left"><input type="checkbox" name="equipo_req_5" value="PLATAFORMA"> PLATAFORMA </p><br>
							<p class="pad_left"><input type="checkbox" name="equipo_req_6" value="LOWBOY"> LOWBOY </p><br>
							<p class="pad_left"><input type="checkbox" name="equipo_req_7" value="FULL"> FULL </p><br>
							<p class="pad_left"><input type="checkbox" name="equipo_req_8" value="PIPA"> PIPA </p><br>
							<p class="pad_left"><input type="checkbox" name="equipo_req_9" value="HAZMAT"> HAZMAT Nota: solicitar MSDS y Arancel  </p>
				  		</div></div></div>


					</div>	
					<br>


					<div class="panel panel-default show">
                        		<div class="panel-heading">  
                        			<h4>INFORMACION ADICIONAL</h4>
                        		</div>  
                        	<div class="panel-body">
					<div class="row">

						<div class="col-xs-12 col-sm-3">
							<label>FECHA DE CARGA:</label>
							<input type="text" class="form-control datepicker1" name="fecha_carga">  
						</div>

						<div class="col-xs-12 col-sm-3">
							<label>HORARIO DE CARGA:</label>
							<input type="time" class="form-control" name="horario_carga" value="12:00">
						</div>

						<div class="col-xs-12 col-sm-3">
							<label>TIPO DE PRODUCTO:</label>
							 <input type="text" name="tipo_producto" class="form-control">  
						</div>

						<div class="col-xs-12 col-sm-3">
							<label>PESO TOTAL DE LA CARGA:</label>						
							 <input type="text" name="peso_total" class="form-control" placeholder="KGS">   						
						</div>
						
						<div class="col-xs-12 col-sm-6">

							<div class="row form-group">
								<p><label class="col-sm-3 col-form-label">SERVICIO:</label>	</p> <br>
								<p class="pad_left"><input type="checkbox" name="normal" value="1">NORMAL</p>
								<p class="pad_left"><input type="checkbox" name="urgente" value="1"> URGENTE</p>
								<p class="pad_left"><input type="checkbox" name="comparativo" value="1">  SOLO COMPARATIVO</p>
							</div>

						</div>			

					</div>

					<div class="col-xs-12 col-sm-6">
						<hr>		

						<div class=" form-group col-xs-12 col-sm-6">
							<label>ORIGEN:</label> <input type="text" class="form-control" name="origen"> 
						</div>		
						<div class="form-group col-xs-12 col-sm-6">
							<label>INCOTERM:</label> <input type="text" class="form-control" name="inconterm"> 
						</div>


						<div class="form-group col-xs-12">
							<label class="col-xs-1 col-form-label">1.</label>
							<div class="col-xs-11">
						 		<input type="text" class="form-control" name="origen_1">
							</div>
							<label class="col-xs-1 col-form-label">2.</label>
							<div class="col-xs-11">
						 		<input type="text" class="form-control" name="origen_2"> 
							</div>
							<label class="col-xs-1 col-form-label">3.</label>
							<div class="col-xs-11">
						 		<input type="text" class="form-control" name="origen_3"> 
							</div>
							<label class="col-xs-1 col-form-label">4.</label>
							<div class="col-xs-11">
						 		<input type="text" class="form-control" name="origen_4"> 
							</div>
							<label class="col-xs-1 col-form-label">5.</label>
							<div class="col-xs-11">
						 		<input type="text" class="form-control" name="origen_5"> 
							</div>
						</div>	
				
					</div>

					<div class="col-xs-12 col-sm-6">					
						<hr>

						<div class="form-group col-xs-12 col-sm-6">
							<label>DESTINO:</label> <input type="text" class="form-control" name="destino">
						</div>		

						<div class="form-group col-xs-12 col-sm-6">
							<label># FLETES AL MES: </label><input type="text" class="form-control" name="fletes_mes">
						</div>

						<div class="form-group col-xs-12">
							<label class="col-xs-1 col-form-label">1.</label>
							<div class="col-xs-11">
						 		<input type="text" class="form-control" name="destino_1">
							</div>
							<label class="col-xs-1 col-form-label">2.</label>
							<div class="col-xs-11">
						 		<input type="text" class="form-control" name="destino_2"> 
							</div>
							<label class="col-xs-1 col-form-label">3.</label>
							<div class="col-xs-11">
						 		<input type="text" class="form-control" name="destino_3"> 
							</div>
							<label class="col-xs-1 col-form-label">4.</label>
							<div class="col-xs-11">
						 		<input type="text" class="form-control" name="destino_4"> 
							</div>
							<label class="col-xs-1 col-form-label">5.</label>
							<div class="col-xs-11">
						 		<input type="text" class="form-control" name="destino_5"> 
							</div>
						</div>						
					</div>

					<div class="col-xs-12">
						<hr>

						<div class="col-sm-6">
							<label>ADUANA DE DESPACHO:</label><input type="text" class="form-control" name="aduana"> 
						</div>
						<div class="col-sm-6">
							<label>TARGET:</label><input type="text" class="form-control" name="target">
						</div>
						<div class="col-sm-12">
							<label>COMENTARIOS:</label>
							<textarea type="textarea" class="form-control" name="comentarios"></textarea>
						</div>
						<div class="col-sm-12 text-center">
							<br>
							<button id="submit" type="button" data-form="form1" data-panel="terrestre" data-form="form1" class="btn btn-primary"><i class="fa fa-upload"></i> Guardar</button>
						</div>
					</div>


					</div></div>

				</div>
				
			  	</form>

			    </div>
			  </div>
			  <div id="aereo" class="panel panel-default panel-titulo">
			    <div class="panel-heading panel-cabecera">
			      <h4 class="panel-title">
			        <!-- <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">         </a> -->
			         INFORMACIÓN FLETE AEREO
			      </h4>
			    </div>
			    <div id="collapse2" class="panel-collapse collapse in">
			      	
			      <form id="form2"  method="post">
				      <input type="hidden" name="tipo_formato" value="2">
				      <input type="hidden" name="id_accion" value="<?=$id_accion?>">
			      <div class="panel-body">
			      	<div class="row">

					<div class="col-xs-12 col-sm-4">
			      		<div class="panel panel-default show">
							<div class="panel-heading">
							</div>
							<div class="panel-body">			      				 
					      			<p class=""><input type="checkbox" name="servicio_directo" value="1"><strong>SERVICIO DIRECTO </strong></p>
					      			<p class=""><input type="checkbox" name="servicio_conexion" value="1"><strong>SERVICIO CON CONEXIÓN  </strong></p>
							</div>
						</div>
					</div>
			      	<div class="col-xs-12 col-sm-4">
			      		<div class="panel panel-default show">
							<div class="panel-heading">
							</div>
							<div class="panel-body">
				      			<p class=""><input type="checkbox" name="carga_seca" value="1"><strong>CARGA SECA</strong></p>
				      			<p class=""><input type="checkbox" name="carga_refrigerada" value="1"><strong>CARGA REFRIGERADA</strong></p>
				      			<p class=""><input type="checkbox" name="HAZMAT" value="1"><strong>HAZMAT  Nota: solicitar MSDS y Arancel </strong></p>

				      			<div class=" form-group">
									<label class="pad_left">
									<input type="checkbox" name="ref_temp" value="1"> <strong>REFRIGERADO</strong>	
									TEMP. <input class="form-control" type="number" step="0.01" name="ref_temp_val" placeholder="°C">					
									</label>
								</div>

								<div class=" form-group">
									<label class="pad_left">
									<input type="checkbox" name="cons_temp" value="1"> <strong>CONSERVACIÓN </strong>
									TEMP. <input class="form-control" type="number" step="0.01" name="cons_temp_val" placeholder="°C">
									</label>
								</div>

								<div class=" form-group">
									<label class="pad_left">
										<input type="checkbox" name="cong_temp" value="1"> <strong>CONGELADO</strong>
										TEMP. <input class="form-control" type="number" step="0.01" name="cong_temp_val" placeholder="°C">
									</label>
								</div>
							</div>
						</div>

					 </div>

			      	<div class="col-xs-12 col-sm-4">
			      		<div class="panel panel-default show">
							<div class="panel-heading">
							</div>
							<div class="panel-body">
				      			<p class=""><input type="checkbox" name="servicio_directo" value="1"><strong>SOBREDIMENSIONADO  </strong></p>
				      			<p class=""><strong>TIPO EMBALAJE:</strong></p>
				      			<p class=""><input type="checkbox" name="embalaje_1" value="ENTARIMADO">ENTARIMADO </p><br>
								<p class=""><input type="checkbox" name="empaque_2" value="CAJAS SUELTAS"> CAJAS SUELTAS </p>
								<p class=""><input type="checkbox" name="empaque_3" value="OTRO"> OTRO <input name="empaque_3_val" class="form-control"></p>

								<div class="form-group">
									<input type="checkbox" name="dimension"> <strong>DIMENSIONES Y PESOS</strong><br> 								
								</div>

								<div class="form-group row">
									<label class="col-xs-1 col-form-label">1.</label>
									<div class="col-xs-11">
										<input type="text" class="form-control" name="dimension_1"> 
									</div>

									<label class="col-xs-1 col-form-label">2.</label>
									<div class="col-xs-11">
										<input type="text" class="form-control" name="dimension_2"> 
									</div>

									<label class="col-xs-1 col-form-label">3.</label>
									<div class="col-xs-11">
								 		<input type="text" class="form-control" name="dimension_3"> 
									</div>

									<label class="col-xs-1 col-form-label">4.</label>
									<div class="col-xs-11">
								 		<input type="text" class="form-control" name="dimension_4"> 
									</div>

									<label class="col-xs-1 col-form-label">5.</label>
									<div class="col-xs-11">
								 		<input type="text" class="form-control" name="dimension_5"> 
									</div>
								</div>
							</div>
						</div>

					</div>

			      	</div>
			      	<br>
			      	<div class="panel panel-default show">
							<div class="panel-heading"> <h4>INFORMACION ADICIONAL</h4>
							</div>
							<div class="panel-body">
					<div class="row">
						
						<div class="col-xs-12 col-sm-3">
							<label>FECHA DE CARGA:</label>
							<input type="text" class="form-control datepicker1" name="fecha_carga">  
						</div>

						<div class="col-xs-12 col-sm-3">
							<label>HORARIO DE CARGA:</label>
							<input type="time" class="form-control" name="horario_carga" value="12:00">
						</div>

						<div class="col-xs-12 col-sm-3">
							<label>TIPO DE PRODUCTO:</label>
							 <input type="text" name="tipo_producto" class="form-control">  
						</div>

						<div class="col-xs-12 col-sm-3">
							<label>PESO TOTAL DE LA CARGA:</label>						
							 <input type="text" name="peso_total" class="form-control" placeholder="KGS">   						
						</div>
						
						<div class="col-xs-12 col-sm-6">

							<div class="row form-group">
								<p><label class="col-sm-3 col-form-label">SERVICIO:</label>	</p> <br>
								<p class="pad_left"><input type="checkbox" name="normal" value="1">NORMAL</p>
								<p class="pad_left"><input type="checkbox" name="urgente" value="1"> URGENTE</p>
								<p class="pad_left"><input type="checkbox" name="comparativo" value="1">  SOLO COMPARATIVO</p>
							</div>

						</div>			

					</div>

					<div class="col-xs-12 col-sm-6">
						<hr>		

						<div class=" form-group col-xs-12 col-sm-6">
							<label>ORIGEN:</label> <input type="text" class="form-control" name="origen"> 
						</div>		
						<div class="form-group col-xs-12 col-sm-6">
							<label>INCOTERM:</label> <input type="text" class="form-control" name="inconterm"> 
						</div>


						<div class="form-group col-xs-12">
							<label class="col-xs-1 col-form-label">1.</label>
							<div class="col-xs-11">
						 		<input type="text" class="form-control" name="origen_1">
							</div>
							<label class="col-xs-1 col-form-label">2.</label>
							<div class="col-xs-11">
						 		<input type="text" class="form-control" name="origen_2"> 
							</div>
							<label class="col-xs-1 col-form-label">3.</label>
							<div class="col-xs-11">
						 		<input type="text" class="form-control" name="origen_3"> 
							</div>
							<label class="col-xs-1 col-form-label">4.</label>
							<div class="col-xs-11">
						 		<input type="text" class="form-control" name="origen_4"> 
							</div>
							<label class="col-xs-1 col-form-label">5.</label>
							<div class="col-xs-11">
						 		<input type="text" class="form-control" name="origen_5"> 
							</div>
						</div>	
				
					</div>

					<div class="col-xs-12 col-sm-6">					
						<hr>

						<div class="form-group col-xs-12 col-sm-6">
							<label>DESTINO:</label> <input type="text" class="form-control" name="destino">
						</div>		

						<div class="form-group col-xs-12 col-sm-6">
							<label># FLETES AL MES: </label><input type="text" class="form-control" name="fletes_mes">
						</div>

						<div class="form-group col-xs-12">
							<label class="col-xs-1 col-form-label">1.</label>
							<div class="col-xs-11">
						 		<input type="text" class="form-control" name="destino_1">
							</div>
							<label class="col-xs-1 col-form-label">2.</label>
							<div class="col-xs-11">
						 		<input type="text" class="form-control" name="destino_2"> 
							</div>
							<label class="col-xs-1 col-form-label">3.</label>
							<div class="col-xs-11">
						 		<input type="text" class="form-control" name="destino_3"> 
							</div>
							<label class="col-xs-1 col-form-label">4.</label>
							<div class="col-xs-11">
						 		<input type="text" class="form-control" name="destino_4"> 
							</div>
							<label class="col-xs-1 col-form-label">5.</label>
							<div class="col-xs-11">
						 		<input type="text" class="form-control" name="destino_5"> 
							</div>
						</div>						
					</div>

					<div class="col-xs-12">
						<hr>

						<div class="col-sm-6">
							<label>ADUANA DE DESPACHO:</label><input type="text" class="form-control" name="aduana"> 
						</div>
						<div class="col-sm-6">
							<label>TARGET:</label><input type="text" class="form-control" name="target">
						</div>
						<div class="col-sm-12">
							<label>COMENTARIOS:</label>
							<textarea type="textarea" class="form-control" name="comentarios"></textarea>
						</div>
						<div class="col-sm-12 text-center">
							<br>
							<button id="submit" type="button" data-form="form2"  data-panel="aereo" class="btn btn-primary"><i class="fa fa-upload"></i> Guardar</button>
						</div>
					</div>
				</div>
			</div>


			      	</form>

			      </div>
			    </div>
			  </div>
			  <div id="maritimo" class="panel panel-default panel-titulo">
			    <div class="panel-heading panel-cabecera">
			      <h4 class="panel-title">
			        <!-- <a data-toggle="collapse" data-parent="#accordion" href="#collapse3"></a> -->
			        INFORMACIÓN FLETE MARITIMO
			      </h4>
			    </div>
			    <div id="collapse3" class="panel-collapse collapse in">
			      <!-- <form action="<?=base_url('admin/insert_formato')?>" method="post"> -->
			      <form id="form3"  method="post">
				      <input type="hidden" name="tipo_formato" value="3">
				      <input type="hidden" name="id_accion" value="<?=$id_accion?>">

				  <div class="panel-body">
				  	<div class="row">

				  		<div class="col-xs-12 col-sm-4">
				  			<div class="panel panel-default show">
								<div class="panel-heading">
				  					<h4><input type="checkbox" name="seco" value="1"><b>SECO</b></h4>
				  				</div>
				  				<div class="panel-body">


								<div class="col-sm-6">	
									<p class=""><input type="checkbox" name="ftl" value="FCL"><strong>FCL</strong></p>
									<hr>
									<p class=""><input  type="checkbox" name="ftl_1" value="20’DC">20’DC</p><br>
									<p class=""><input class="pad_left" type="checkbox" name="fcl_2" value="20’HC">20’HC</p><br>
									<p class=""><input class="pad_left" type="checkbox" name="fcl_3" value="40’DC">40’DC </p><br>
									<p class=""><input class="pad_left" type="checkbox" name="fcl_4" value="OPEN TOP">OPEN TOP </p><br>
									<p class=""><input class="pad_left" type="checkbox" name="fcl_5" value="TANQUE CISTERNA">TANQUE CISTERNA </p><br>
									<p class=""><input class="pad_left" type="checkbox" name="fcl_6" value="OPEN SIDE">OPEN SIDE </p><br>
									<p class=""><input class="pad_left" type="checkbox" name="fcl_7" value="FLAT RACK">FLAT RACK </p><br>
									<p class=""><strong>TIPO EMBALAJE:</strong><p> 
									<p class=""><input type="checkbox" name="embalaje_1" value="ENTARIMADO">ENTARIMADO </p><br>
									<p class=""><input type="checkbox" name="embalaje_2" value="A PISO">A PISO </p><br>
									<p class=""><input type="checkbox" name="embalaje_3" value="AMBOS">AMBOS </p><br>

								</div>

								<div class="col-sm-6">	
									<p><input type="checkbox" name="lcl" value="1"><strong>LCL</strong></p>
									<hr>
									<p><strong>TIPO EMPAQUE:</strong></p> 

									<p class=""><input type="checkbox" name="empaque_1" value="ENTARIMADO"> ENTARIMADO </p><br>
									<p class=""><input type="checkbox" name="empaque_2" value="CAJAS SUELTAS"> CAJAS SUELTAS </p><br>
									<p class=""><input type="checkbox" name="empaque_3" value="OTRO"> OTRO <input name="empaque_3_val" class="form-control">  </p><br>

										<div class="form-group">
											<input type="checkbox" name="dimension"> <strong>DIMENSIONES Y PESOS</strong><br> 								
										</div>
										
										<div class="form-group row">

											<label class="col-xs-1 col-form-label">1.</label>
											<div class="col-xs-11">
										 		<input type="text" class="form-control" name="dimension_1"> 
											</div>

											<label class="col-xs-1 col-form-label">2.</label>
											<div class="col-xs-11">
										 		<input type="text" class="form-control" name="dimension_2"> 
											</div>

											<label class="col-xs-1 col-form-label">3.</label>
											<div class="col-xs-11">
										 		<input type="text" class="form-control" name="dimension_3"> 
											</div>

											<label class="col-xs-1 col-form-label">4.</label>
											<div class="col-xs-11">
										 		<input type="text" class="form-control" name="dimension_4"> 
											</div>

											<label class="col-xs-1 col-form-label">5.</label>
											<div class="col-xs-11">
										 		<input type="text" class="form-control" name="dimension_5"> 
											</div>
										</div>

								</div>
							</div>
						</div>

				  		</div>

				  		<div class="col-xs-12 col-sm-4">
				  			<div class="panel panel-default show">
								<div class="panel-heading">
						  			<h4><input type="checkbox" name="temp_ctrl" value="1"> <b>TEMPERATURA CONTROLADA </b></h4>
						  		</div>
						  		<div class="panel-body">

									<p class="pad_left"><input type="checkbox" name="temp_ctrl_1" value="20’DC"> 20’DC </p><br>
									<p class="pad_left"><input type="checkbox" name="temp_ctrl_2" value="20’HC"> 20’HC </p><br>
									<p class="pad_left"><input type="checkbox" name="temp_ctrl_3" value="40’DC"> 40’DC </p><br>
									<p class="pad_left"><input type="checkbox" name="temp_ctrl_4" value="ISOTANQUE"> ISOTANQUE </p><br>

									<div class=" form-group">
										<label class="pad_left">
										<input type="checkbox" name="ref_temp" value="1"> <strong>REFRIGERADO</strong>	
										TEMP. <input class="form-control" type="number" step="0.01" name="ref_temp_val" placeholder="°C">					
										</label>
									</div>

									<div class=" form-group">
										<label class="pad_left">
										<input type="checkbox" name="cons_temp" value="1"> <strong>CONSERVACIÓN </strong>
										TEMP. <input class="form-control" type="number" step="0.01" name="cons_temp_val" placeholder="°C">
										</label>
									</div>

									<div class=" form-group">
										<label class="pad_left">
											<input type="checkbox" name="cong_temp" value="1"> <strong>CONGELADO</strong>
											TEMP. <input class="form-control" type="number" step="0.01" name="cong_temp_val" placeholder="°C">
										</label>
									</div>
								</div>
							</div>

				  		</div>

				  		<div class="col-xs-12 col-sm-4">
				  			<div class="panel panel-default show">
								<div class="panel-heading">
				  					<h4><input type="checkbox" name="servicio_comp" value="1"> <b>SERVICIO COMPLEMENTARIO </b></h4>
				  				</div>
				  				<div class="panel-body">
									<p class="pad_left"><input type="checkbox" name="servicio_comp_1" value="ALL TRUCK"> ALL TRUCK </p><br>
									<p class="pad_left"><input type="checkbox" name="servicio_comp_2" value="RAIL TRUCK"> RAIL TRUCK </p><br>
									<p class="pad_left"><input type="checkbox" name="servicio_comp_3" value="ALL RAIL"> ALL RAIL </p><br>
									<p class="pad_left"><input type="checkbox" name="servicio_comp_4" value="HOT SHOT">HOT SHOT </p><br>
									<p class="pad_left"><input type="checkbox" name="servicio_comp_5" value="PLATAFORMA"> PLATAFORMA </p><br>
									<p class="pad_left"><input type="checkbox" name="servicio_comp_6" value="LOWBOY"> LOWBOY </p><br>
									<p class="pad_left"><input type="checkbox" name="servicio_comp_7" value="FULL"> FULL </p><br>
									<p class="pad_left"><input type="checkbox" name="servicio_comp_8" value="PIPA"> PIPA </p><br>
									<p class="pad_left"><input type="checkbox" name="servicio_comp_9" value="HAZMAT"> HAZMAT Nota: solicitar MSDS y Arancel  </p>
								</div>
							</div>
				  		</div>

					</div>	 
					<br>

			<div class="panel panel-default show">
				<div class="panel-heading"> <h4>INFORMACIÓN ADICIONAL</h4>
				</div>
				<div class="panel-body">
					<div class="row">
						
						<div class="col-xs-12 col-sm-3">
							<label>FECHA DE CARGA:</label>
							<input type="text" class="form-control datepicker1" name="fecha_carga">  
						</div>

						<div class="col-xs-12 col-sm-3">
							<label>HORARIO DE CARGA:</label>
							<input type="time" class="form-control" name="horario_carga" value="12:00">
						</div>

						<div class="col-xs-12 col-sm-3">
							<label>TIPO DE PRODUCTO:</label>
							 <input type="text" name="tipo_producto" class="form-control">  
						</div>

						<div class="col-xs-12 col-sm-3">
							<label>PESO TOTAL DE LA CARGA:</label>						
							 <input type="number" step="0.01" name="peso_total" class="form-control" placeholder="KGS">   						
						</div>
						

						<div class="col-xs-12 col-sm-6">

							<div class="row form-group">
								<p><label class="col-sm-3 col-form-label">SERVICIO:</label>	</p> <br>
								<p class="pad_left"><input type="checkbox" name="servicio" value="NORMAL">NORMAL</p>
								<p class="pad_left"><input type="checkbox" name="servicio" value="URGENTE"> URGENTE</p>
								<p class="pad_left"><input type="checkbox" name="servicio" value="SOLO COMPARATIVO">  SOLO COMPARATIVO</p>
							</div>

						</div>			

					</div>

					<div class="col-xs-12 col-sm-6">
						<hr>		

						<div class=" form-group col-xs-12 col-sm-6">
							<label>ORIGEN:</label> <input type="text" class="form-control" name="origen"> 
						</div>		
						<div class="form-group col-xs-12 col-sm-6">
							<label>INCOTERM:</label> <input type="text" class="form-control" name="inconterm"> 
						</div>


						<div class="form-group col-xs-12">
							<label class="col-xs-1 col-form-label">1.</label>
							<div class="col-xs-11">
						 		<input type="text" class="form-control" name="origen_1">
							</div>
							<label class="col-xs-1 col-form-label">2.</label>
							<div class="col-xs-11">
						 		<input type="text" class="form-control" name="origen_2"> 
							</div>
							<label class="col-xs-1 col-form-label">3.</label>
							<div class="col-xs-11">
						 		<input type="text" class="form-control" name="origen_3"> 
							</div>
							<label class="col-xs-1 col-form-label">4.</label>
							<div class="col-xs-11">
						 		<input type="text" class="form-control" name="origen_4"> 
							</div>
							<label class="col-xs-1 col-form-label">5.</label>
							<div class="col-xs-11">
						 		<input type="text" class="form-control" name="origen_5"> 
							</div>
						</div>	
				
					</div>

					<div class="col-xs-12 col-sm-6">					
						<hr>

						<div class="form-group col-xs-12 col-sm-6">
							<label>DESTINO:</label> <input type="text" class="form-control" name="destino">
						</div>		

						<div class="form-group col-xs-12 col-sm-6">
							<label># FLETES AL MES: </label><input type="text" class="form-control" name="fletes_mes">
						</div>

						<div class="form-group col-xs-12">
							<label class="col-xs-1 col-form-label">1.</label>
							<div class="col-xs-11">
						 		<input type="text" class="form-control" name="destino_1">
							</div>
							<label class="col-xs-1 col-form-label">2.</label>
							<div class="col-xs-11">
						 		<input type="text" class="form-control" name="destino_2"> 
							</div>
							<label class="col-xs-1 col-form-label">3.</label>
							<div class="col-xs-11">
						 		<input type="text" class="form-control" name="destino_3"> 
							</div>
							<label class="col-xs-1 col-form-label">4.</label>
							<div class="col-xs-11">
						 		<input type="text" class="form-control" name="destino_4"> 
							</div>
							<label class="col-xs-1 col-form-label">5.</label>
							<div class="col-xs-11">
						 		<input type="text" class="form-control" name="destino_5"> 
							</div>
						</div>						
					</div>

					<div class="col-xs-12">
						<hr>

						<div class="col-sm-6">
							<label>PUERTO DE DESPACHO:</label><input type="text" class="form-control" name="puerto"> 
						</div>
						<div class="col-sm-6">
							<label>TARGET:</label><input type="text" class="form-control" name="target">
						</div>
						<div class="col-sm-12">
							<label>COMENTARIOS:</label>
							<textarea type="textarea" class="form-control" name="comentarios"></textarea>
						</div>
						<div class="col-sm-12 text-center">
							<br>
							<button id="submit" type="button" data-form="form3" data-panel="maritimo" class="btn btn-primary"><i class="fa fa-upload"></i> Guardar</button>
						</div>
					</div>

				</div>
				
			  	</form>
			  </div> </div>

			    </div>
			  </div>
			  <div id="despacho" class="panel panel-default panel-titulo">
			    <div class="panel-heading panel-cabecera">
			      <h4 class="panel-title">
			        <!-- <a data-toggle="collapse" data-parent="#accordion" href="#collapse4"> -->
			        <!-- </a> -->
			      	DESPACHO ADUANAL
			      </h4>

			    </div>
			    <div id="collapse4" class="panel-collapse collapse in">

			      	
			      <form id="form4"  method="post">
				      <input type="hidden" name="tipo_formato" value="4">
				      <input type="hidden" name="id_accion" value="<?=$id_accion?>">

			    <div class="panel-body">
			      	<div class="row">
						
						<div class="col-xs-12 col-sm-4">
							<div class="panel panel-default show">
								<div class="panel-heading"> <h4>IMPORTACIÓN/EXPORTACIÓN</h4>
								</div>
								<div class="panel-body">
									<p><input type="checkbox" name="importacion" value="1"><strong>IMPORTACIÓN</strong></p>
									<p><input type="checkbox" name="exportacion" value="1"><strong>EXPORTACIÓN</strong></p>  
								</div>
							</div>
						</div>

						<div class="col-xs-12 col-sm-4">
							<div class="panel panel-default show">
								<div class="panel-heading"><h4>ESTATUS DEL CLIENTE </h4>	</div>
								<div class="panel-body">
									
									<p class=""><input type="checkbox" name="estatus_nuevo" value="NUEVO">NUEVO </p>
									<p class=""><input type="checkbox" name="estatus_activo" value="ACTIVO">ACTIVO </p>
									<p class=""><input type="checkbox" name="estatus_react" value="REACTIVANDO">REACTIVANDO </p>
								</div>	
							</div>					
						</div>

						<div class="col-xs-12 col-sm-4">
							<div class="panel panel-default show">
								<div class="panel-heading"><h4>TIPO DE CARGA  </h4> </div>
								<div class="panel-body">
									       
									<p class=""><input type="checkbox" name="embalaje_1" value="GENERAL">GENERAL </p>
									<p class=""><input type="checkbox" name="embalaje_1" value="HAZMAT">HAZMAT </p>
									<p class=""><input type="checkbox" name="embalaje_1" value="SOBREDIMENSIONADO">SOBREDIMENSIONADO </p>
									<p class=""><input type="checkbox" name="embalaje_1" value="QUIMICO_NO_HM">QUIMICO NO HM </p>	
								</div>
							</div>				   
						</div> 
					</div>
					<br>
					<div class="row">

						<div class="col-xs-12 col-sm-4">
							<div class="panel panel-default show">
								<div class="panel-heading"> <h4>PRODUCTO </h4> </div>
								<div class="panel-body">
									<input class="form-control" type="text" name="prod1"> 
									<input class="form-control" type="text" name="prod2"> 
									<input class="form-control" type="text" name="prod3"> 
									<input class="form-control" type="text" name="prod4"> 
									<input class="form-control" type="text" name="prod5"> 
								</div>

							</div>
						</div>

						<div class="col-xs-12 col-sm-4">
							<div class="panel panel-default show">
								<div class="panel-heading"> <h4>ARANCEL / HS CODE</h4></div>
								<div class="panel-body">
									<input class="form-control" type="text" name="arancel_code1">
									<input class="form-control" type="text" name="arancel_code2">
									<input class="form-control" type="text" name="arancel_code3">
									<input class="form-control" type="text" name="arancel_code4">
									<input class="form-control" type="text" name="arancel_code5"> 
								</div>
							</div>
						</div>

					
						<div class="col-xs-12 col-sm-4">
							<div class="panel panel-default show">
								<div class="panel-heading"> <h4>CAS NUMBER (Solo Químicos)</h4> </div>
								<div class="panel-body">
									<input class="form-control" type="text" name="cas_number1">
									<input class="form-control" type="text" name="cas_number2">
									<input class="form-control" type="text" name="cas_number3">
									<input class="form-control" type="text" name="cas_number4">
									<input class="form-control" type="text" name="cas_number5"> 									
								</div>
							</div>
						</div>
					</div>
					<br>


						<div class="panel panel-default show">
							<div class="panel-heading"> <h4 class="">VALOR FACTURAS:</h4> </div>
							<div class="panel-body">
									
						
													
								<div class="col-xs-12 col-sm-8">
									<label>FACTURA 1 DEL PRODUCTO:</label>
									<input class="form-control" type="text" name="fact_prod1"> 
									<label>FACTURA 2 DEL PRODUCTO:</label>
									<input class="form-control" type="text" name="fact_prod2"> 
									<label>FACTURA 3 DEL PRODUCTO:</label>
									<input class="form-control" type="text" name="fact_prod3"> 
									<label>FACTURA 4 DEL PRODUCTO:</label>
									<input class="form-control" type="text" name="fact_prod4"> 
									<label>FACTURA 5 DEL PRODUCTO:</label>
									<input class="form-control" type="text" name="fact_prod5"> 
								</div>
								<div class="col-xs-12 col-sm-4">
									<label>MONEDA:</label>
									<select class="form-control" name="mon_prod1">
										<option value="">--SELECCIONE UNA OPCIÓN--</option>
										<option value="MXN">MXN</option>
										<option value="USD">USD</option>
										<option value="EURO">EURO</option>
									</select>

									<!-- <input class="form-control" type="text" name="mon_prod1">  -->
									<label>MONEDA:</label>
									<select class="form-control" name="mon_prod2">
										<option value="">--SELECCIONE UNA OPCIÓN--</option>
										<option value="MXN">MXN</option>
										<option value="USD">USD</option>
										<option value="EURO">EURO</option>
									</select>
									<!-- <input class="form-control" type="text" name="mon_prod2">  -->
									<label>MONEDA:</label>
									<select class="form-control" name="mon_prod3">
										<option value="">--SELECCIONE UNA OPCIÓN--</option>
										<option value="MXN">MXN</option>
										<option value="USD">USD</option>
										<option value="EURO">EURO</option>
									</select>
									<!-- <input class="form-control" type="text" name="mon_prod3">  -->
									<label>MONEDA:</label>
									<select class="form-control" name="mon_prod4">
										<option value="">--SELECCIONE UNA OPCIÓN--</option>
										<option value="MXN">MXN</option>
										<option value="USD">USD</option>
										<option value="EURO">EURO</option>
									</select>
									<!-- <input class="form-control" type="text" name="mon_prod4">  -->
									<label>MONEDA:</label>
									<select class="form-control" name="mon_prod5">
										<option value="">--SELECCIONE UNA OPCIÓN--</option>
										<option value="MXN">MXN</option>
										<option value="USD">USD</option>
										<option value="EURO">EURO</option>
									</select>
									<!-- <input class="form-control" type="text" name="mon_prod5"> --> 
								</div>

								<div class="col-sm-12">
									<label>COMENTARIOS:</label>
									<textarea type="textarea" class="form-control" name="comentarios"></textarea>
								</div>

								<div class="col-sm-12 text-center">
									<br>
									<button id="submit" type="button" data-form="form4" data-panel="despacho" class="btn btn-primary"><i class="fa fa-upload"></i> Guardar</button>
								</div>
							</div>
						</div>
			    </div>
			  	</form>


			    </div>
			  </div>

			  <div id="seguro" class="panel panel-default panel-titulo">
			    <div class="panel-heading panel-cabecera">
			      <h4 class="panel-title">
			        <!-- <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">        </a> -->
			        SEGURO DE CARGA
			      </h4>
			    </div>
			    <div id="collapse5" class="panel-collapse collapse in">		      
			      	
			      <form id="form5"  method="post">
				      <input type="hidden" name="tipo_formato" value="5">
				      <input type="hidden" name="id_accion" value="<?=$id_accion?>">

			      <div class="panel-body">
			      	<div class="row">
			      		<div class="panel panel-default show">
							<div class="panel-heading"></div>
							<div class="panel-body">
								
							
					      		<div class="col-xs-12">
					      			<label>BENEFICIARIO DE LA POLIZA:</label>
					      			<input class="form-control" type="text" name="beneficiario"> 
					      			<label>DOMICILIO FISCAL:</label>
					      			<input class="form-control" type="text" name="domicilio_fiscal"> 
					      		</div>
					      		
					      		<div class="col-xs-12 col-sm-4">	
									<label>ETD (FECHA DE SALIDA DE PRODUCTO):</label>
									<input class="form-control datepicker1" type="text" name="fecha_salida_prod"> 
								</div>
								<div class="col-xs-12 col-sm-4">	
									<label>VALOR TOTAL DEL EMBRQUE:</label>
									<input class="form-control" type="text" name="valor_total_embarque"> 
								</div>
								<div class="col-xs-12 col-sm-4">	
									<label>MONEDA:</label>
									<select class="form-control" name="moneda">
										<option value="">--SELECCIONE UNA OPCIÓN--</option>
										<option value="MXN">MXN</option>
										<option value="USD">USD</option>
										<option value="EURO">EURO</option>
									</select>
									<!-- <input class="form-control" type="text" name="moneda">  -->
								</div>
								
								<div class="col-xs-12">	
									<label>No. FACTURA 1 DEL EMBARQUE:</label> 
									<input class="form-control" type="text" name="fact_emb1"> 
									<label>No. FACTURA 2 DEL EMBARQUE: </label>
									<input class="form-control" type="text" name="fact_emb2"> 
									<label>No. FACTURA 3 DEL EMBARQUE: </label>
									<input class="form-control" type="text" name="fact_emb3"> 
									<label>No. FACTURA 4 DEL EMBARQUE: </label>
									<input class="form-control" type="text" name="fact_emb4"> 
									<label>No. FACTURA 5 DEL EMBARQUE: </label>
									<input class="form-control" type="text" name="fact_emb5"> 
					      		</div>
					      	</div>
					    </div>
					 </div>
					    <br>
					<div class="row">
						
						<div class="col-xs-12 col-sm-4">
							<div class="panel panel-default show">
								<div class="panel-heading"><h4>TIPO DE EMBARQUE </h4></div>
								<div class="panel-body">						
									<p class=""><input type="checkbox" name="tipo_embarque" value="NACIONAL">NACIONAL </p>
									<p class=""><input type="checkbox" name="tipo_embarque" value="INTERNACIONAL">INTERNACIONAL </p> 
								</div>
							</div>
						</div>

						<div class="col-xs-12 col-sm-4">
							<div class="panel panel-default show">
								<div class="panel-heading"> <h4>MODALIDAD DEL EMBARQUE  </h4></div>
								<div class="panel-body">
									<p class=""><input type="checkbox" name="mod_embarque" value="MARITIMO">MARITIMO </p>
									<p class=""><input type="checkbox" name="mod_embarque" value="AÉREO">AÉREO </p>
									<p class=""><input type="checkbox" name="mod_embarque" value="TERRESTRE CAMIÓN">TERRESTRE CAMIÓN  </p>
									<p class=""><input type="checkbox" name="mod_embarque" value="TERRESTRE FERROVIARIO">TERRESTRE FERROVIARIO </p>
								</div>
							</div>
						</div>
						
						<div class="col-xs-12 col-sm-4">
							<div class="panel panel-default show">
								<div class="panel-heading"> <h4>TIPO DE CARGA  </h4></div>
								<div class="panel-body">
									<p class=""><input type="checkbox" name="tipo_carga" value="GENERAL">GENERAL </p>
									<p class=""><input type="checkbox" name="tipo_carga" value="HAZMAT">HAZMAT </p>
									<p class=""><input type="checkbox" name="tipo_carga" value="SOBREDIMENSIONADO">SOBREDIMENSIONADO </p>
									<p class=""><input type="checkbox" name="tipo_carga" value="VALORES">VALORES </p>
								</div>
							</div>									
						</div>
					</div>
					<br>
					<div class="row">
						<div class="panel panel-default show">
							<div class="panel-heading"></div>
								<div class="panel-body">

									<div class="col-xs-12">
										<label>NOMBRE DEL BUQUE Y No. VIAJE:</label>
										<input class="form-control" type="text" name="nombre_buque"> 

										<label>NOMBRE DE LA LINEA FERROVIARIA Y No. VIAJE:</label>
										<input class="form-control" type="text" name="nombre_ferro"> 

										<label> NOMBRE DE LINEA TRANSPORTISTA, PLACAS DE LA UNIDAD Y REMOLQUE (SI APLICA):</label>
										<input class="form-control" type="text" name="linea_transportista"> 

										<label>ORIGEN DEL EMBARQUE (CIUDAD Y C.P., PUERTO Y/O AEREOPUERTO):</label>
										<input class="form-control" type="text" name="origen_embarque"> 

										<label>PUERTO Y/O AEREOPUERTO DE CARGA:</label>
										<input class="form-control" type="text" name="puerto_carga"> 

										<label>PUERTO Y/O AEREOPUERTOS DE DESCARGA:</label>
										<input class="form-control" type="text" name="puerto_descarga"> 

										<label>RAMPA ORIGEN Y RAMPA DESTINO:</label>
										<input class="form-control" type="text" name="rampa_origen_destino"> 

										<label>DESTINO FINAL DEL EMBARQUE (CIUDAD Y C.P., PUERTO Y/O AEREOPUERTO): </label>
										<input class="form-control" type="text" name="destino_final"> 

										<label>DESCRIPCIÓN DE LA MERCANCÍA:  </label>
										<textarea class="form-control" name="descripcion"></textarea>
										
										<label>LA PÓLIZA ES CONTINUIDAD DE TRÁNSITO:</label>
										<p class=""><input type="checkbox" name="poliza_transito" value="SI">SI </p>
										<p class=""><input type="checkbox" name="poliza_transito" value="NO">NO </p>

										<label>COMENTARIOS:  </label>
										<textarea class="form-control" name="comentarios"></textarea>

						      		</div>

									<div class="col-sm-12 text-center">
										<br>
										<button id="submit" type="button" data-form="form5" data-panel="seguro" class="btn btn-primary"><i class="fa fa-upload"></i> Guardar</button>
									</div>
								</div>
							</div>

			      	</div>

			      </div>

			  	</form>

			    </div>
			  </div>

			  <div id="almacenaje" class="panel panel-default panel-titulo">
			    <div class="panel-heading panel-cabecera">
			      <h4 class="panel-title">
			        <!-- <a data-toggle="collapse" data-parent="#accordion" href="#collapse6">	         </a> -->
			        ALMACENAJE / CROSSDOCK
			      </h4>
			    </div>
			    <div id="collapse6" class="panel-collapse collapse in">

			      <form id="form6"  method="post">
				      <input type="hidden" name="tipo_formato" value="6">
				      <input type="hidden" name="id_accion" value="<?=$id_accion?>">

			      <div class="panel-body">
			      	<div class="row">
					
				      	<div class="col-sm-6">
				      		<div class="panel panel-default show">
								<div class="panel-heading"><h4>TIPO DE PRODUCTO</h4></div>
								<div class="panel-body">
				      				<input type="text" class="form-control" name="tipo_producto"> 									
								</div>				      	
							</div>
				      	</div>

				      	<div class="col-sm-6">
				      		<div class="panel panel-default show">
								<div class="panel-heading"><h4>LUGAR DE ALMACENAJE:</h4></div>
								<div class="panel-body">
				      				<input type="text" class="form-control" name="lugar_almacenaje"> 									
								</div>
							</div>
				      	</div>
				     </div>
				     <br>
						
			      		<div class="col-xs-12 col-sm-4">
			      			<div class="panel panel-default show">
								<div class="panel-heading"> <h4><input type="checkbox" name="seco" value="1"><b>SECO</b></h4></div>
								<div class="panel-body">
									
								

					      			<p class=""><strong>TIPO EMBALAJE:</strong></p>
					      			<p class=""><input type="checkbox" name="embalaje_1" value="ENTARIMADO">ENTARIMADO </p>
					      			<p class=""><input type="checkbox" name="embalaje_1" value="A PISO">A PISO </p>
					      			<p class=""><input type="checkbox" name="embalaje_1" value="AMBOS">AMBOS </p>

							        <p class=""><strong>DIMENSIONES Y PESOS </strong></p>
											
									<div class="form-group row">

										<label class="col-xs-1 col-form-label">1.</label>
										<div class="col-xs-11">
									 		<input type="text" class="form-control" name="dimension_seco_1"> 
										</div>

										<label class="col-xs-1 col-form-label">2.</label>
										<div class="col-xs-11">
											<input type="text" class="form-control" name="dimension_seco_2"> 
										</div>

										<label class="col-xs-1 col-form-label">3.</label>
										<div class="col-xs-11">
									 		<input type="text" class="form-control" name="dimension_seco_3"> 
										</div>

										<label class="col-xs-1 col-form-label">4.</label>
										<div class="col-xs-11">
									 		<input type="text" class="form-control" name="dimension_seco_4"> 
										</div>

										<label class="col-xs-1 col-form-label">5.</label>
										<div class="col-xs-11">
									 		<input type="text" class="form-control" name="dimension_seco_5"> 
										</div>
									</div>
							        
							        <div class="col-xs-12">
							        	<label>No. de pallet x mes:</label>
							        	<input type="text" class="form-control" name="pallet_mes1">
							    	</div>
							    	<div class="col-xs-12">
							        	<label>No. de recibos por semana y tipo de unidad:</label>
							        	<input type="text" class="form-control" name="recibos_semana1">
							    	</div>

									<div class="col-xs-12">
										<label>Requiere servicios adicionales:</label>
										<p class=""><input type="checkbox" name="servicios_adicionales_seco_1" value="Etiquetado">Etiquetado </p>
										<p class=""><input type="checkbox" name="servicios_adicionales_seco_2" value="Pick & Pack">Pick & Pack </p>
										<p class=""><input type="checkbox" name="servicios_adicionales_seco_3" value="Logística Inversa">Logística Inversa </p>
										<p class=""><input type="checkbox" name="servicios_adicionales_seco_4" value="OTRO"> OTRO <input name="servicios_adicionales4_val" class="form-control">  </p>
									</div>
					      		</div>
					      	</div>
					     </div>

			      
			      		<div class="col-xs-12 col-sm-4">
			      			<div class="panel panel-default show">
								<div class="panel-heading"><h4><input type="checkbox" name="temp_ctrl" value="1"><b>TEMPERATURA CONTROLADA</b></h4></div>
								<div class="panel-body">																					
									<div class=" form-group">
										<label class="pad_left">
										<input type="checkbox" name="ref_temp" value="1"> <strong>REFRIGERADO</strong>	
										TEMP. <input class="form-control" type="number" step="0.01" name="ref_temp_val" placeholder="°C">					
										</label>
									</div>

									<div class=" form-group">
										<label class="pad_left">
										<input type="checkbox" name="cons_temp" value="1"> <strong>CONSERVACIÓN </strong>
										TEMP. <input class="form-control" type="number" step="0.01" name="cons_temp_val" placeholder="°C">
										</label>
									</div>

									<div class=" form-group">
										<label class="pad_left">
											<input type="checkbox" name="cong_temp" value="1"> <strong>CONGELADO</strong>
											TEMP. <input class="form-control" type="number" step="0.01" name="cong_temp_val" placeholder="°C">
										</label>
									</div>

					      			<p class=""><strong>TIPO EMBALAJE:</strong></p>
					      			<p class=""><input type="checkbox" name="embalaje_1" value="ENTARIMADO">ENTARIMADO </p>
					      			<p class=""><input type="checkbox" name="embalaje_1" value="A PISO">A PISO </p>
					      			<p class=""><input type="checkbox" name="embalaje_1" value="AMBOS">AMBOS </p>

							        <p class=""><strong>DIMENSIONES Y PESOS </strong></p>
											
									<div class="form-group row">

										<label class="col-xs-1 col-form-label">1.</label>
										<div class="col-xs-11">
									 		<input type="text" class="form-control" name="dimension_1"> 
										</div>

										<label class="col-xs-1 col-form-label">2.</label>
										<div class="col-xs-11">
											<input type="text" class="form-control" name="dimension_2"> 
										</div>

										<label class="col-xs-1 col-form-label">3.</label>
										<div class="col-xs-11">
									 		<input type="text" class="form-control" name="dimension_3"> 
										</div>

										<label class="col-xs-1 col-form-label">4.</label>
										<div class="col-xs-11">
									 		<input type="text" class="form-control" name="dimension_4"> 
										</div>

										<label class="col-xs-1 col-form-label">5.</label>
										<div class="col-xs-11">
									 		<input type="text" class="form-control" name="dimension_5"> 
										</div>
									</div>

									<div class="col-xs-12">
										<label>No. de pallet x mes: </label>
										<input type="text" class="form-control" name="pallet_mes"> 
									    <label>No. de recibos por semana y tipo de unidad:</label>
									    <input type="text" class="form-control" name="recibos_semana"> 
									</div>

									<div class="col-xs-12">
										<label>Requiere servicios adicionales:</label>
										<p class=""><input type="checkbox" name="servicios_adicionales1" value="Etiquetado">Etiquetado </p>
										<p class=""><input type="checkbox" name="servicios_adicionales2" value="Pick & Pack">Pick & Pack </p>
										<p class=""><input type="checkbox" name="servicios_adicionales3" value="Logística Inversa">Logística Inversa </p>
										<p class=""><input type="checkbox" name="servicios_adicionales4" value="OTRO"> OTRO <input name="servicios_adicionales4_val" class="form-control">  </p>
									</div>
								</div>
							</div>							        							
			      		</div>
						<div class="row">
			      		<div class="col-xs-12 col-sm-4">
			      			<div class="panel panel-default show">
								<div class="panel-heading"><h4><input type="checkbox" name="deposito_fiscal" value="1"><b>DEPÓSITO FISCAL </b></h4></div>
								<div class="panel-body">
									
								
									<p class=""><input type="checkbox" name="dep_fiscal1" value="SECO">SECO </p>
									<p class=""><input type="checkbox" name="dep_fiscal2" value="TEMPERATURA CONTROLADA">TEMPERATURA CONTROLADA </p>
									
									<div class=" form-group">
										<label class="pad_left">
										<input type="checkbox" name="ref_temp" value="1"> <strong>REFRIGERADO</strong>	
										TEMP. <input class="form-control" type="number" step="0.01" name="ref_temp_val" placeholder="°C">					
										</label>
									</div>
									<div class=" form-group">
										<label class="pad_left">
										<input type="checkbox" name="cons_temp" value="1"> <strong>CONSERVACIÓN</strong>	
										TEMP. <input class="form-control" type="number" step="0.01" name="ref_temp_val" placeholder="°C">					
										</label>
									</div>
									<div class=" form-group">
										<label class="pad_left">
										<input type="checkbox" name="cong_temp" value="1"> <strong>CONGELADO </strong>	
										TEMP. <input class="form-control" type="number" step="0.01" name="ref_temp_val" placeholder="°C">					
										</label>
									</div>
										<p class=""><strong>TIPO EMBALAJE:</strong><p> 
										<p class=""><input type="checkbox" name="embalaje_1" value="ENTARIMADO">ENTARIMADO </p><br>
										<p class=""><input type="checkbox" name="embalaje_2" value="A PISO">A PISO </p><br>
										<p class=""><input type="checkbox" name="embalaje_3" value="AMBOS">AMBOS </p><br>

		 							<p class=""><strong>DIMENSIONES Y PESOS </strong></p>
											
									<div class="form-group row">

										<label class="col-xs-1 col-form-label">1.</label>
										<div class="col-xs-11">
									 		<input type="text" class="form-control" name="dimension_1"> 
										</div>

										<label class="col-xs-1 col-form-label">2.</label>
										<div class="col-xs-11">
											<input type="text" class="form-control" name="dimension_2"> 
										</div>

										<label class="col-xs-1 col-form-label">3.</label>
										<div class="col-xs-11">
									 		<input type="text" class="form-control" name="dimension_3"> 
										</div>

										<label class="col-xs-1 col-form-label">4.</label>
										<div class="col-xs-11">
									 		<input type="text" class="form-control" name="dimension_4"> 
										</div>

										<label class="col-xs-1 col-form-label">5.</label>
										<div class="col-xs-11">
									 		<input type="text" class="form-control" name="dimension_5"> 
										</div>
									</div>
								</div>
							</div>
						</div>
						</div>
						<br>
						<div class="row">
						<div class="panel panel-default show">
							<div class="panel-heading"></div>
							<div class="panel-body">
								<div class="col-xs-12">	
									<label>No. FACTURA 1 DEL EMBARQUE:</label> 
									<input class="form-control" type="text" name="fac_embarque1"> 
									<label>No. FACTURA 2 DEL EMBARQUE: </label>
									<input class="form-control" type="text" name="fac_embarque2"> 
									<label>No. FACTURA 3 DEL EMBARQUE: </label>
									<input class="form-control" type="text" name="fac_embarque3"> 
									<label>No. FACTURA 4 DEL EMBARQUE: </label>
									<input class="form-control" type="text" name="fac_embarque4"> 
									<label>No. FACTURA 5 DEL EMBARQUE: </label>
									<input class="form-control" type="text" name="fac_embarque5"> 
					      		</div>

								<div class="col-xs-12 col-sm-6">	
									<label>VALOR TOTAL DEL EMBRQUE:</label>
									<input class="form-control" type="number" step="0.01" name="valor_total_embarque"> 
								</div>
								<div class="col-xs-12 col-sm-6">	
									<label>MONEDA:</label>
									<select class="form-control" name="moneda">
										<option value="">--SELECCIONE UNA OPCIÓN--</option>
										<option value="MXN">MXN</option>
										<option value="USD">USD</option>
										<option value="EURO">EURO</option>
									</select>
									<!-- <input class="form-control" type="text" name="moneda">  -->
								</div>

								<div class="col-xs-12">
									<label>Requiere servicios adicionales:</label>
									<p class=""><input type="checkbox" name="servicios_adicionales_1" value="Etiquetado">Etiquetado </p>
									<p class=""><input type="checkbox" name="servicios_adicionales_2" value="Pick & Pack">Pick & Pack </p>
									<p class=""><input type="checkbox" name="servicios_adicionales_3" value="Logística Inversa">Logística Inversa </p>
								</div>

								<div class="col-xs-12 col-sm-6">
									<label>No. de pallet x mes: </label>
									<input type="number" class="form-control" name="pallet_mes2"> 
								</div>	
								<div class="col-xs-12 col-sm-6">
								    <label>No. de recibos por semana y tipo de unidad:</label>
								    <input type="number" class="form-control" name="recibos_semana2"> 
								</div>

									
								<div class="col-sm-12">	
									<label>COMENTARIOS:  </label>
									<textarea class="form-control" name="comentarios"></textarea>
								</div>

								<div class="col-sm-12 text-center">
									<br>
									<button id="submit" type="button" data-form="form6" data-panel="almacenaje" class="btn btn-primary"><i class="fa fa-upload"></i> Guardar</button>
								</div>								
							</div>
						</div>
					</div>

			      	</div>

			      </div>

			  	</form>

			    </div>

		  
			  <div id="distribucion" class="panel panel-default panel-titulo">
			    <div class="panel-heading panel-cabecera">
			      <h4 class="panel-title">
			        <!-- <a data-toggle="collapse" data-parent="#accordion" href="#collapse7"></a> -->
			        	DISTRIBUCIÓN / PAQUETERÍA
			      </h4>
			    </div>

			    <div id="collapse7" class="panel-collapse collapse in">

			      <form id="form7"  method="post">
				      <input type="hidden" name="tipo_formato" value="7">
				      <input type="hidden" name="id_accion" value="<?=$id_accion?>">

			      	<div class="panel-body">
			      		<div class="row">
			      			<div class="panel panel-default show">
								<div class="panel-heading">	 </div>
								<div class="panel-body">	      						 
						      		<div class="col-sm-8">
						      			<label>TIPO DE PRODUCTO:</label>
						      			<input type="text" class="form-control" name="tipo_producto">
						      		</div>
						      		<div class="col-sm-4">
						      			<label>PESO TOT.:</label>
						      			<input type="text" class="form-control" name="peso_total">
						      		</div>

						      		<div class="col-sm-6">
						      			<label>DIRECCIÓN DE RECOLECCIÓN:</label>
						      			<input type="text" class="form-control" name="direccion_recoleccion">
						      		</div>

						      		<div class="col-sm-6">
						      			<label>DIRECCIÓN DE ENTREGA:</label>
						      			<input type="text" class="form-control" name="direccion_entrega">
						      		</div>

						      		<div class="col-sm-12">	

										<label>REQUIERE REPARTOS EN RUTA:</label>
										<p class=""><input type="checkbox" name="reparto_ruta1" value="GENERAL">SI </p>
										<p class=""><input type="checkbox" name="reparto_ruta2" value="GENERAL">NO </p>

										<label>DIRECCIÓN DE REPARTO 1:</label> 
										<input type="text" class="form-control" name="direccion_reparto1"> 
										<label>DIRECCIÓN DE REPARTO 2:</label> 
										<input type="text" class="form-control" name="direccion_reparto2">
										<label>DIRECCIÓN DE REPARTO 3:</label>  
										<input type="text" class="form-control" name="direccion_reparto3">
										<label>DIRECCIÓN DE REPARTO 4:</label> 
										<input type="text" class="form-control" name="direccion_reparto4">
										<label>DIRECCIÓN DE REPARTO 5:</label>   
										<input type="text" class="form-control" name="direccion_reparto5">
						      		</div>						      									
								</div>	
							</div>
			      		</div>
			      		<br>
						<div class="row">

				      		<div class="col-sm-3">
				      			<div class="panel panel-default show">
									<div class="panel-heading"><h4>TIPO SERVICIO:</h4></div>
									<div class="panel-body">			      			
						      			<p class=""><input type="checkbox" name="tipo_servicio1" value="SECO">SECO </p><br>
						      			<p class=""><input type="checkbox" name="tipo_servicio2" value="REFRIGERADO">REFRIGERADO </p><br>
						      			<p class=""><input type="checkbox" name="tipo_servicio3" value="SOBREDIMENSIONADO">SOBREDIMENSIONADO </p><br>
						      			<p class=""><input type="checkbox" name="tipo_servicio4" value="PROYECTO ESPECIAL">PROYECTO ESPECIAL </p><br>
						      		</div>
						      	</div>
				      		</div>

				      		<div class="col-sm-5">
								<div class="panel panel-default show">
									<div class="panel-heading"><h4>TIPO UNIDAD</h4></div>
				      				<div class="panel-body">
						      			<div class="col-xs-6">
							      			<p class=""><input type="checkbox" name="tipo_unidad1" value="TR53’">TR53’</p><br>
							      			<p class=""><input type="checkbox" name="tipo_unidad2" value="TR48’">TR48’  </p><br>
							      			<p class=""><input type="checkbox" name="tipo_unidad3" value="PORTACONTENEDORES">PORTACONTENEDORES  </p><br>
							      			<p class=""><input type="checkbox" name="tipo_unidad4" value="PLATAFORMA 48’"> PLATAFORMA 48’  </p><br>
							      			<p class=""><input type="checkbox" name="tipo_unidad5" value="PLATAFORMA 40’">PLATAFORMA 40’ </p><br>
						      			</div>
						      			<div class="col-xs-6">
							      			<p class=""><input type="checkbox" name="tipo_unidad6" value="TH">TH </p><br>
							      			<p class=""><input type="checkbox" name="tipo_unidad7" value="RABON">RABON</p><br>
							      			<p class=""><input type="checkbox" name="tipo_unidad8" value="3.5 TON">3.5 TON</p><br>
							      			<p class=""><input type="checkbox" name="tipo_unidad9" value="1.5 TON">1.5 TON</p><br>
							      			<p class=""><input type="checkbox" name="tipo_unidad10" value="PAQUETERIA">PAQUETERIA</p><br>
						      			</div>
						      		</div>
						      	</div>
				      		</div>

				      		<div class="col-sm-4">
								<div class="panel panel-default show">
									<div class="panel-heading">	<h4 >TIPO EMBALAJE:</h4> </div>
									<div class="panel-body">

										<p class=""><input type="checkbox" name="embalaje_1" value="ENTARIMADO">ENTARIMADO </p><br>
										<p class=""><input type="checkbox" name="embalaje_2" value="A PISO">A PISO </p><br>
										<p class=""><input type="checkbox" name="embalaje_3" value="AMBOS">AMBOS </p><br>
										<p class=""><input type="checkbox" name="embalaje_4" value="BULTOS">BULTOS (SOLO APLICA EN PAQUETERIA)</p><br>
									</div>
								</div>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="panel panel-default show">
								<div class="panel-heading">	<h4 >DIMENSIONES Y PESOS</h4></div>
								<div class="panel-body">									
			  							<label>DIMENSIONES Y PESOS 1  (PAQUETERIA):</label>        
			  							<input type="text" class="form-control" name="dimensiones_pesos1">
			  							<label>DIMENSIONES Y PESOS 2  (PAQUETERIA): </label>        
			  							<input type="text" class="form-control" name="dimensiones_pesos2">
			  							<label>DIMENSIONES Y PESOS 3  (PAQUETERIA): </label>         
			  							<input type="text" class="form-control" name="dimensiones_pesos3">
			  							<label>DIMENSIONES Y PESOS 4  (PAQUETERIA): </label>         
			  							<input type="text" class="form-control" name="dimensiones_pesos4">
			  							<label>DIMENSIONES Y PESOS 5  (PAQUETERIA): </label>  
			  							<input type="text" class="form-control" name="dimensiones_pesos5">											
										<label>COMENTARIOS:  </label>
										<textarea class="form-control" name="comentarios"></textarea>							
										<div class="text-center">
											<br>
											<button id="submit" type="button" data-form="form7" data-panel="distribucion" class="btn btn-primary"><i class="fa fa-upload"></i> Guardar</button>
										</div>
								</div>						
							</div>															
						</div>
			      	</div>
			    </div>
			  		</form>
			    </div>
			  </div>
		  </div>
	  </div>
</div>


<script type="text/javascript">

	function bloquear1(clase, id){ 

    	if( $(clase).is(':checked') ){	
    		$(id).addClass('show').removeClass('hidden');	        
    		$(".ckss").prop( "disabled", true ); 
    		$(clase).prop( "disabled", false ); 
    		$(".seguro,.almacenamiento,.agente").prop( "disabled", false ); 
		}else{
			$(id).removeClass('show').addClass('hidden');
			$(".ckss").prop( "disabled", false ); 
		    $(".ckss").prop( "checked", false ); 
		}

	}

	function bloquear2(clase,id){ 

    	if( $(clase).is(':checked') ){	
    		$(id).addClass('show').removeClass('hidden');	       	        
    		$(".ckss").prop( "disabled", true ); 
    		$(clase).prop( "disabled", false ); 
    		$(".seguro").prop( "disabled", false );
		} else {
			$(id).removeClass('show').addClass('hidden');
		    // $(".ckss").prop( "disabled", false ); 
		}


		$('.ckss:checked').each(function() {
        	 $(this).prop( "disabled", false ); 
			 val = $(this)[0].classList[1];
			 console.log(val);
        	 if (val == "maritimo" || val == "terrestre" || val == "aereo" || val == "intermodal") {
        	 	bloquear1("."+val+"");
        	 }
        	 if(val == "agente"){
        	 	// $(".almacenamiento").prop( "disabled", true );
        	 }

    	});

	}

		function bloquear3(clase,id){ 

    	if( $(clase).is(':checked') ){	
    		$(id).addClass('show').removeClass('hidden');
    		$(".ckss").prop( "disabled", true ); 
    		$(clase).prop( "disabled", false ); 
    		$(".seguro,.terrestre").prop( "disabled", false );
		} else {
			$(id).removeClass('show').addClass('hidden');
		    // $(".ckss").prop( "disabled", false ); 
		}


		$('.ckss:checked').each(function() {
        	 $(this).prop( "disabled", false ); 
			 val = $(this)[0].classList[1];
			 console.log(val);
        	 if (val == "maritimo" || val == "terrestre" || val == "aereo" || val == "intermodal") {
        	 	bloquear1("."+val+"");
        	 }


    	});

	}

	$('.ckss').click(function(){

		var value = $(this).val();

		if (value == 1) {
			bloquear1(".maritimo", "#maritimo");
		}

		if (value == 2) {
			bloquear1(".terrestre", "#terrestre");
		}
		if (value == 3) {
			bloquear1(".aereo", "#aereo");
		}

		if (value == 4) {
			bloquear1(".intermodal");
		}

		if (value == 5) {
			bloquear2(".agente","#despacho");
		}

		if (value == 6) {
			bloquear2(".seguro","#seguro");
		}

		if (value == 7) {
			bloquear3(".almacenamiento","#almacenaje");
		}
		if (value == 8) {
			bloquear2(".mensajeria");
		}	

		if(!$(".ckss").is(':checked') ){		        
    		$(".ckss").prop( "disabled", false ); 
    		$("#almacenaje,#seguro,#despacho,#aereo,#terrestre,#maritimo ").removeClass('show').addClass('hidden');
		}											

});

</script>



<script type="text/javascript">

	$('#select-servicio input[type="checkbox"]').click(function(){

		// var value = $(this).val();
		// var servicio = $(this).data('servicio');

		// $('#select-servicio input[type="checkbox"]').each(function () {
		// 	$(this).prop( "disabled", true ); 
		// });

		// $("." + servicio).prop( "disabled", false ); 

		// }else if(value == 2){

		// 	$(".terrestre , .agente, .seguro, .almacenamiento").prop( "disabled", false ); 

		// }else if(value == 3){
			
		// 	$(".terrestre , .agente, .seguro, .almacenamiento").prop( "disabled", false ); 

		// }else if(value == 4){
			
		// 	$(".terrestre , .agente, .seguro, .almacenamiento").prop( "disabled", false ); 

		// }else if(value == 5){
			
		// 	$(".agente, .seguro, .almacenamiento").prop( "disabled", false ); 

		// }else if(value == 6){
			
		// 	$(".terrestre , .agente, .seguro, .almacenamiento").prop( "disabled", false ); 

		// }else if(value == 7){
			
		// 	$(".terrestre , .agente, .seguro, .almacenamiento").prop( "disabled", false ); 

		// }else if(value == 8){

		// 	$(".terrestre , .agente, .seguro, .almacenamiento").prop( "disabled", false ); 

		// }



		// var servicio = $(this).data('servicio');

		// console.log(servicio);

		// if($(this).is(':checked')) {
		// 	$('#select-servicio input[type="checkbox"]').each(function () {

		// 		$(this).prop( "disabled", true );

		// 		$("." + servicio).prop( "disabled", false );
					   
		// 	});
		// }



		// if (typeof $(this).data('servicio') !== 'undefined') {
		// 	var servicio = $(this).data('servicio');
		// }else{
		// 	var servicio = '';
		// }


		// if($(this).is(':checked')) {
		// 	$('#select-servicio input[type="checkbox"]').each(function () {
		// 		$(this).prop( "disabled", true );   
		// 	});

		// 	var val = $(this).val();
		// 	console.log(val);

		// }else{

		// 	if(servicio=='' || $(this).hasClass( "main" )){
		// 		$('#select-servicio input[type="checkbox"]').each(function () {
		// 			$(this).prop( "disabled", false );   
		// 		});
		// 	}

		// }

		// if (typeof $(this).data('servicio') !== 'undefined') {
			
		// 	var servicio = $(this).data('servicio');
		// 	$('.' + servicio).prop( "disabled", false );

		// }else{
		// 	console.log("no data ");
		// }
		
		// $(this).prop( "disabled", false );

	});
	
	$("form button").click(function(e){

		form = $(this).data('form');
		panel = $(this).data('panel');
		array = new Array(); 
		hidden = new Array(); 

		$('#'+form+' :input').each(function(i, o){

				if($(o).attr("type")=="hidden"){
					hidden.push($(o).val());
				}

				if(typeof $(o).attr("name") !== "undefined" && $(o).attr("type")!=="hidden" ){
					var valueToPush = new Array(); 
					var value = "";

					if($(o).attr("type") == "checkbox" ){

						if($(o).is(':checked')) { value = $(o).val();  }else{ value = ""; }

					}else{

						value = $(o).val();
					}

					if (value !== '') {

						array.push({ "name":$(o).attr("name"),"type":$(o).attr("type"),"value":value });
					}

				}
		});

		console.log(array);
		console.log(hidden);

	    $.ajax({

	        type: "post",
	        url: "<?=base_url('admin/insert_formato')?>",
	        data: {array,hidden}, 
	        async: true,
	        success: function(data){	        
	        	var json = JSON.parse(data);
	        	$("#message").html(json.message);
				$('#'+panel+' .panel-collapse').removeClass("in");
	      	}

	    });	


	});



</script>

<style>

	.pad_left{
		padding-left: 50px;
		margin:0;
	}

	.no-p{
		padding:0;
	}

	.m-t{
		margin-top:80px;
	}

</style>

<style>
	.panel-titulo{
		border: unset;
	}
	.panel-titulo .panel-cabecera{
		background-color: #FFF;
		color:#000;
	}
	.panel-titulo .panel-cabecera h4{
		font-weight: 700;
		text-align: center;
		font-size: 25px;
		margin: 30px 0;
	}
</style>