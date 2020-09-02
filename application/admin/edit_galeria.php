<link href="<?=base_url()?>mini-upload-form/css/uploadfile.css" rel="stylesheet">
<script src="<?=base_url()?>mini-upload-form/js/jquery.uploadfile.js"></script>

<!--upload file plugin--> 
<link href="<?=base_url()?>mini-upload-form/css/style.css" rel="stylesheet" />
<script src="<?=base_url()?>mini-upload-form/js/jquery.knob.js"></script>
<!-- jQuery File Upload Dependencies -->
<script src="<?=base_url()?>mini-upload-form/js/jquery.ui.widget.js"></script>
<script src="<?=base_url()?>mini-upload-form/js/jquery.iframe-transport.js"></script>
<script src="<?=base_url()?>mini-upload-form/js/jquery.fileupload.js"></script>
<!-- Our main JS file -->
<script src="<?=base_url()?>mini-upload-form/js/script.js"></script>
<!--upload file plugin--> 

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Editar entrada</h1>
        </div>
        
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Editar  entrada
                </div>
                <?=$m?>
           <div class="panel-body">
                    
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="home">
                            <div class="col-lg-12">

                                <form method="post" action="<?=site_url('admin/update_galeria')?>" enctype="multipart/form-data">
                                    <input type="hidden" name="id_galeria" value="<?=$galeria->id_galeria?>"> 
                                    <input type="hidden" name="foto" value="<?=$galeria->foto?>">    
                                    <div class="form-group">
                                        <label>Título:</label>
                                        <input name="titulo" class="form-control" value="<?=$galeria->titulo?>" required>
                                    </div>
                                    
                                    <div class="form-group" style="display:inline-block;">
                                    	<?php
                                    		foreach($fotos->result() as $row):
                                    	?>
                                    		<div class="col-lg-2">
                                    			<img class="img-thumbnail" src="<?=site_url('files/'.$row->key_foto.'/'.$row->foto)?>" />
                                    			<a class="text-center" href="<?=site_url('admin/delete_photo/?id_foto='.$row->id_foto.'&foto='.$row->foto.'&key_foto='.$row->key_foto)?>">Eliminar</a>
                                    		</div>
                                    	<?php		
                                    		endforeach;	
                                    	?>	
                                    </div>	

                                    <div class="form-group">
                                        <!--upload file plugin--> 
                                        <div id="upload">
                                            <div id="fileuploader">Subir</div>
                                        </div>
                                        <!--upload file plugin--> 
                                    </div> 
                                    
                                    <div class="form-group">
                                        <input class="btn btn-primary" type="submit" value="Editar">
                                    </div>
                                    
                                </form>
                                
                            </div>    
                        </div>

                        
                    </div>    
                        
                </div>    
            
            </div>    
        
        </div>
        <!--panel---->
        

        </div>
    </div>
    
</div> 


<script>
            $(function(){
                
                var uploadObj = $("#fileuploader").uploadFile({
                    url:"<?=base_url()?>admin/upload_image?foto=<?=$galeria->foto?>",
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
                        console.log(obj);
            //			console.log(obj);
            //			alert('finalizado');
            //			$("#upload").html('<h3>Tus mensaje se mando satisfactoriamente.</h3><a href="javascript:void(0);" id="reload">Mandar otro mensaje</a>');
            //			$("#eventsmessage").html($("#eventsmessage").html()+"<br/>All files are uploaded");
                    }
                });
                

            });
        </script>
    <!--ckeditor-->
