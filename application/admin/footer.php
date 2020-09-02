    <!-- jQuery -->
    <script src="<?=base_url()?>assets/js/jquery-1.12.0.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?=base_url()?>assets/admin/bower_components/metisMenu/dist/metisMenu.min.js"></script>
    <!-- Morris Charts JavaScript -->







    <script src="<?=base_url()?>assets/admin/bower_components/raphael/raphael-min.js"></script>







    <script src="<?=base_url()?>assets/admin/bower_components/morrisjs/morris.min.js"></script>







    <!-- Custom Theme JavaScript -->







    <script src="<?=base_url()?>assets/admin/dist/js/sb-admin-2.js"></script>







     







	<!-- Custom Theme JavaScript -->







    <script src="<?=base_url()?>assets/js/jquery.qubit.js"></script>







    <link href="<?=base_url()?>assets/css/jquery.bonsai.css" rel="stylesheet" type="text/css">







    <script src="<?=base_url()?>assets/js/jquery.bonsai.js"></script>







    







    












   <script src="<?=site_url('assets/jquery-ui-themes-1.11.4/jquery-ui.js')?>"></script>







	







	<!--Plugin upload file-->















    <!--Plugin upload file--><!--	<link href="<?=base_url()?>assets/mini-upload-form/css/uploadfile.css" rel="stylesheet">







    <script src="<?=base_url()?>assets/mini-upload-form/js/jquery.uploadfile.js"></script>-->







    







   <!--Plugin upload file-->







	<link href="<?=base_url()?>assets/jquery-upload-file-master/css/uploadfile.css" rel="stylesheet">







    <script src="<?=base_url()?>assets/jquery-upload-file-master/js/jquery.uploadfile.min.js"></script>







    <!--Plugin upload file-->







    







    







    







</body>







<script>















//función para cargar el evento data-onload en los elementos HTML	







function load_function(){







	$('[data-onload]').each(function(){







		eval($(this).data('onload'));







	});	







}























function getParameterByName(name, url) {







    if (!url) url = window.location.href;







    name = name.replace(/[\[\]]/g, "\\$&");







    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),







        results = regex.exec(url);







    if (!results) return null;







    if (!results[2]) return '';







 	return decodeURIComponent(results[2].replace(/\+/g, " "));







}















function getCategories(id, id_select , id_current){


	$.post('<?=base_url()?>admin/get_subcat',{id:id},function(data){

		if(data != ""){

			$(id_select).html(data);

			$(id_select).show();

			$(id_select).next().hide();

		}else if(data =="" && id_current == 'parent_category1'){

			$(".parent_new").hide();

			$(id_select).next().hide();


		}
        else if(data =="" && id_current == 'parent_category5'){

			$(".parent_new").hide();

			$(id_select).next().hide();


		}
        else{

			$(id_select).hide();

		}

	});	

}
    
function getCategoriesE(id, id_select , id_current,producto){


	$.post('<?=base_url()?>admin/get_subcat1',{id:id,producto:producto},function(data){
            
             if(data!=""){
                 $(id_select).html(data);
                 $(id_select).show();
                 $(id_select).next().hide();
             }
		/*if(data != ""){

			$(id_select).html(data);

			$(id_select).show();

			$(id_select).next().hide();

		}else if(data !="" && id_current == 'parent_category1'){

			$(".uno").show();
			
            $(id_select).html(data);

			$(id_select).show();

			$(id_select).next().hide();


		}
        else if(data !="" && id_current == 'parent_category5'){

			$(".dos").show();
			
            $(id_select).html(data);

			$(id_select).show();

			$(id_select).next().hide();


		}
        else{

			$(id_select).hide();

		}*/

	});	

}















function getStock(id_producto){







	$.ajax({







		type:"POST",







		url:"<?=site_url('admin/current_stock')?>",







		data:{id_producto:id_producto },







		success: function(response){







			$("#current_stock").html(response);







		}







	});







}























$(function(){







	







	







/*	$('#auto-checkboxes').bonsai({







	  expandAll: true,







	  checkboxes: true, // depends on jquery.qubit plugin







	  createCheckboxes: true // takes values from data-name and data-value, and data-name is inherited







	});*/







	







	







	/*controles para los tabs*/







/*	$('.btnNext').click(function(){ 	 	







		$('.nav-tabs > .active').next('li').find('a').trigger('click');







		$("#prod-tab1").addClass("active");	







	});*/







	//agregar prodcuto







	$("#send_producto").click(function(){

		var contenido = $("#contenido").val(CKEDITOR.instances.contenido.getData());
		//var medidas = $("#medidas").val(CKEDITOR.instances.medidas.getData());
									   
		var param = $("form").serializeArray();
        
         /*$.each(param, function(i, field){
            alert(field.name+" "+field.value);
            });*/
    
		var complete = 0;

		var titulo = $("#titulo").val();

		var parent_category1 = $("#parent_category1").val();

		var precio = $("#precio").val();

		var tienda = $("#tienda").val();

		var main_images = $("#main_images").val();

		var width = $("#width").val();
		var height = $("#height").val();
		var length = $("#length").val();
		var weight = $("#weight").val();


		if(titulo == ''){



			alert('Falta llenar el campo titulo.');



		}else if(parent_category1=='' || parent_category1==0 ){



			alert('Falta seleccionar una categoría.');	



		}else if(precio==''){



			alert('Falta llenar el campo precio.');		



		}else if(tienda==''){



			alert('Falta llenar el campo tienda.');	

			

		}else if(main_images==''){

			alert('Debe agregar imágenes principales .');	

			

		}else if(CKEDITOR.instances.contenido.getData() =='' ) {

			alert('Falta llenar el campo contenido.');

		}else if(width =='' ) {
			
			alert('Falta llenar el campo ancho.');		

		}else if(height =='' ) {
			
			alert('Falta llenar el campo altura.');		

		}else if(length =='' ) {
			
			alert('Falta llenar el campo longitud.');		

		}else if(weight =='' ) {
			
			alert('Falta llenar el campo peso.');		

		}else{

			var complete = 1;

		}



		if(complete == 1){

			//desbloquear el boton antes de validar 

			$("#prod-tab2 a").attr("data-toggle","tab");

			$('.nav-tabs > .active').next('li').find('a').trigger('click');

			$("#prod-tab1").addClass("active");	

			$.ajax({

				type:"POST",

				url:"<?=site_url('admin/insert_producto')?>",

				data:param,

                error:function(respuesta){ 
                	console.log(respuesta)
                },

				success: function(response){
					console.log(response);
                    //alert(response);

					$("#prod_message").html('<div class="alert alert-success">Se agregó correctamente el producto.</div>');

					$("#id_producto").val(response);

				}

			});
		}

	});







	







	







	$("#add_stock").click(function(){







		var param = $("#form_stock").serializeArray();







		var complete = 0;







		







		if(complete == 0){







		







			$.ajax({







				type:"POST",







				url:"<?=site_url('admin/insert_stock')?>",







				data:param,







				success: function(response){







					$("#prod_message").html(response);







					document.getElementById("form_stock").reset();







					getStock($("#id_producto").val());







				}







			});







		}







		















		







	});







	







	







	//filtrado de categorias para la edición 		







/*	$("#filtro_categorias select").change(function(){







		$("#filtro_categorias").submit();		







	});*/







							







    $("#tiendas-auto").autocomplete({



		 source: function( request, response ) {

	

			  $.getJSON( "<?=site_url('admin/get_tiendas')?>",{

	

				term: request.term 

	

			  }, response );

	

			},

	

		  select: function( event, ui ) {

	

			$( "#tienda" ).val( ui.item.key );

			//return false;

		  },

		  change: function (event, ui) {

				if (ui.item == null || ui.item == undefined) {

					$("#tiendas-auto").val("");

					$("#tiendas-auto").attr("disabled", false);

				} else {

					$("#tiendas-auto").attr("disabled", true);

				}

			} 



    });

	$("#filtro_categorias select").each(function() {


		var name = $(this).attr("name");

		var get = getParameterByName(name);

		var id_select = $(this).next().attr("id");

		var id_select = "#" + id_select;

		var id_current = $(this).attr('id')

		if(get && parseInt(get) != 0){


			getCategories(get,id_select,id_current );

			$(this).show();	

			$(this).val(parseInt(get));	

		}

	});







	







	







//	$(document).on("change",".parent_tienda",function() {







//		







//		//obtener el id de la categoria 







//		var item_selected = $(this).val();







//		var id = item_selected.pop();







//







//		







//		var id_select = $(this).attr("id");







//		var id_select = "#" + id_select;







//		var name = $(id_select + " option[value='"+id+"']").text();







//







//		$.post('<?=base_url()?>admin/get_subcat_tienda',{id:id,name:name},function(data){







//				$(id_select).after(data);







//		});







//						







//	});

	$(document).on("change",".parent",function() {

		//obtener el id de la categoria 
		var id = $(this).val();
		//obtener el id del select siguiente a llenar 
		var id_select = $(this).next().attr("id");
		var id_select = "#" + id_select;
		//obtener id change 		
		var id_current = $(this).attr('id') 
		$.post('<?=base_url()?>admin/get_subcat',{id:id},function(data){
			if(data != "" && id_current == 'parent_category1'){
				$(id_select).html(data);
				$(id_select).show();
				$(id_select).next().hide();
			}
            else if(data != "" && id_current == 'parent_category5'){
				$(id_select).html(data);
				$(id_select).show();
				$(id_select).next().hide();
			}
            /*else if(data =="" && id_current == 'parent_category1'){
				$(".parent_new").hide();
				$(id_select).next().hide();
			}*/            
            else{
				$(id_select).hide();
			}

		});

		//Eliminar los select que nos correspondan a la categoria 
//		$(".parent_new").each(function(index, value) {
//			//obtiene arreglo de categorias 
//			var str = $(this).attr('class');
//			var res = str.split(" ");
//			//obtiene la categoria parent
//			var current_class = res[res.length - 1];
//			
//			//Si el select no tiene la categoría parent actual lo elimina
//			if( current_class != "parent_" + parent_category ){
//				$(this).hide();
//			}			
//			
//		});

	});
    
 

    $(document).on("change",".parentdos",function() {

		//obtener el id de la categoria         
		var id = $(this).val();        
		//obtener el id del select siguiente a llenar 
		var id_select = $(this).next().attr("id");
		var id_select = "#" + id_select;
		//obtener id change 		
		var id_current = $(this).attr('id') 
		$.post('<?=base_url()?>admin/get_subcat',{id:id},function(data){
			if(data != "" && id_current == 'parent_category1'){
				$(id_select).html(data);
				$(id_select).show();
				$(id_select).next().hide();
			}
            
            else if(data =="" && id_current == 'parent_category1'){

				$(".parent_new").hide();

				$(id_select).next().hide();

			}else{

				$(id_select).hide();

			}

		});

		//Eliminar los select que nos correspondan a la categoria 
//		$(".parent_new").each(function(index, value) {
//			//obtiene arreglo de categorias 
//			var str = $(this).attr('class');
//			var res = str.split(" ");
//			//obtiene la categoria parent
//			var current_class = res[res.length - 1];
//			
//			//Si el select no tiene la categoría parent actual lo elimina
//			if( current_class != "parent_" + parent_category ){
//				$(this).hide();
//			}			
//			
//		});

	});







	







	







	var extraObj = 	$("#main-images").uploadFile({







			url:"<?=base_url()?>admin/upload_image?foto=<?=(isset($foto))?$foto:""?>",







			maxFileSize:4190*1000,







			fileName:"myfile",







			maxFileCount:2,







			dragDropStr: "<span>Agregue sus archivos.</span>",







			abortStr:"Abortar",







			cancelStr:"Cancelar",







//			doneStr:"fait",







//			multiDragErrorStr: "Arrastre sus archivos aquí",







//			extErrorStr:"n'est pas autorisé. Extensions autorisées:",







//			sizeErrorStr:"No está permitido. Permitido el tamaño máximo :",







//			uploadErrorStr:"Upload n'est pas autorisé",







			uploadStr:"Examinar",







			extraHTML:function(){







				var html =  "<div>";







					html += "<b>Imagen:</b>:<select name='principal'><option value='1'>Uno</option><option value='2'>Dos</option></select>";







					html += "</div>";







					return html;    		







			},

			

			//confirmar que se tengan imágenes principales 

			onSuccess:function(){



				$("#main_images").val("1");

	

			},







			autoSubmit:false







		});







		







		$("#extrabutton").click(function(){



			extraObj.startUpload();



		}); 















		$("#sec-images").uploadFile({







			url:"<?=base_url()?>admin/upload_image?foto=<?=(isset($foto))?$foto:""?>",







			maxFileSize:4190*1000,







			maxFileCount:10,







			fileName:"myfile",







			uploadStr:"Examinar",







			dragDropStr: "<span>Agregue sus archivos.</span>"







		}); 







	







/*			var uploadObj = $("#fileuploader").uploadFile({







                    url:"<?=base_url()?>admin/upload_image?foto=<?=(isset($foto))?$foto:""?>",







                    fileName:"myfile",







                    multiple:true,







                    autoSubmit:true,







                    maxFileSize:4190*1000,







                    maxFileCount:5,







                    showStatusAfterSuccess:true,







                    dragDropStr: "<br class='visible-xs'><span><b>Agregue aquí sus imágenes.</b></span>",







                    abortStr:"Abandonar",







                    cancelStr:"Cancelar",







                    //doneStr:"Ok",







                    multiDragErrorStr: "Varios archivos de arrastrar y soltar no están permitidos.",







                    extErrorStr:"No está permitido. Extensiones permitidas :",







                    sizeErrorStr:"No está permitido. Permitido el tamaño máximo :",







                    uploadErrorStr:"No se permite",







                    afterUploadAll:function(obj){







                        $(".ajax-file-upload-green").show();







                        $(".ajax-file-upload-green").html("Completado");







                    }







                });*/







				







	







});







</script>



    <script type="text/javascript">
    $(function(){

		$(".confirm").click(function(){

			var alt = $(this).attr("alt");

			console.log(alt);

			var confirma = confirm("¿Desea realizar esta acción?");
			
			if(confirma){
				return true;
			}else{
				return false;
			}
		});

		$("#actualizar-status").click(function(){

			var id = $(this).data("id");

			$("#modal-actualizar-status #id_envio_tienda").val(id);

		});
		
		$("#edit-envio").click(function(){

			var id = $(this).data("id");

			$("#modal-edit-envio #id_envio_tienda").val(id);

			$.post( "<?=base_url('admin/get_envio_tienda')?>",{id:id}, function( data ) {
				var json = JSON.parse(data);

				$( "#modal-edit-envio form input[name='fecha']" ).val(json.fecha);
				$( "#modal-edit-envio form input[name='guia']" ).val(json.guia);
				$( "#modal-edit-envio form input[name='fecha_entrega']" ).val(json.fecha_entrega);
				//$( ".result" ).html( data );
			});

		});

		

    });        
    </script>






</html>



<!-- Modal -->
<div id="modal-edit-envio" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Editar envío</h4>
      </div>
      <div class="modal-body">
      	<div class="row">
      		
      		<form method="post" action="<?=base_url('admin/update_envio_tienda')?>">
	      		<input id="id_envio_tienda" type="hidden" name="id_envio_tienda">
	      		<div class="col-xs-12 col-sm-3">
		        	<label>Fecha</label>
		        	<input class="form-control datepicker" name="fecha">
	      		</div>
	      		<div class="col-xs-12 col-sm-6">
		        	<label>Guía</label>
		        	<input class="form-control" name="guia">
	      		</div>
	      		<div class="col-xs-12 col-sm-3">
		        	<label>Fecha entrega</label>
		        	<input class="form-control datepicker" name="fecha_entrega">
	      		</div>
	      		<div class="col-xs-12">
		        	<br>
		        	<button type="submit" class="btn btn-primary">Editar</button>
		        </div>
	        </form>

      	</div>
      </div>
      <div class="modal-footer"></div>

    </div>

  </div>
</div>

<!-- Modal -->
<div id="modal-actualizar-status" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Actualizar status</h4>
      </div>
      <div class="modal-body">
      	<div class="row">
	        
	        <form action="<?=base_url('admin/update_status_envio')?>" method="post">
	        	<input id="id_envio_tienda" type="hidden" name="id_envio_tienda">
	        	<div class="col-xs-12 col-sm-6">
	        		<label>Status</label>
	        		<?php $array_status = $this->Tribubazar->get_status_envio(); ?>
	        		<select name="status" class="form-control">
	        			<option value="">--Seleccione status--</option>
	        			<?php foreach ($array_status as $key => $value): ?>
	        			<option value="<?=$value?>"><?=$value?></option>
	        			<?php endforeach; ?>
	        		</select>
	        	</div>
	        	<div class="col-xs-12 col-sm-6">
	        		<label>Fecha</label>
	        		<input name="fecha" type="text" value="<?=date('Y-m-d')?>" class="form-control datepicker">
	        	</div>
	        	<div class="col-xs-12">
	        		<label>Comentarios</label>
	        		<textarea name="comentarios" class="form-control"></textarea>
	        		<br>
	        		<button type="submit" class="btn btn-primary">Actualizar</button>
	        	</div>
	        </form>

    	</div>
      </div>
      <div class="modal-footer"></div>
    </div>

  </div>
</div>

<script type="text/javascript">
	$('.datepicker').datepicker({
	    dateFormat: 'yy-mm-dd',
	    monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
		monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
		dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
		dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá']
	});
</script>