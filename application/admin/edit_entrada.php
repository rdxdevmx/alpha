<!--<link href="<?=base_url()?>mini-upload-form/css/uploadfile.css" rel="stylesheet">
<script src="<?=base_url()?>mini-upload-form/js/jquery.uploadfile.js"></script>-->


<!--upload file plugin--> 

<!--
<link href="<?=base_url()?>mini-upload-form/css/style.css" rel="stylesheet" />


<script src="<?=base_url()?>mini-upload-form/js/jquery.knob.js"></script>-->


<!-- jQuery File Upload Dependencies -->


<!--<script src="<?=base_url()?>mini-upload-form/js/jquery.ui.widget.js"></script>


<script src="<?=base_url()?>mini-upload-form/js/jquery.iframe-transport.js"></script>


<script src="<?=base_url()?>mini-upload-form/js/jquery.fileupload.js"></script-->>


<!-- Our main JS file -->


<!--<script src="<?=base_url()?>mini-upload-form/js/script.js"></script>-->


<!--upload file plugin--> 





<div id="page-wrapper">


    <div class="row">


        <div class="col-lg-12">


            <h1 class="page-header">Editar concurso</h1>


        </div>


        


        <div class="col-lg-12">


            <div class="panel panel-default">


                <div class="panel-heading">


                    Editar  concurso


                </div>


                <?=$m?>


           <div class="panel-body">


                    


                    <div class="tab-content">


                        <div class="tab-pane fade in active" id="home">


                            <div class="col-lg-12">





                                <form method="post" action="<?=site_url('admin/update_entrada')?>" enctype="multipart/form-data">


                                    <input type="hidden" name="id_entrada" value="<?=$entrada->id_entrada?>"> 


                                    <input type="hidden" name="galeria" value="<?=$entrada->galeria?>">    


                                    <div class="form-group">


                                        <label>Título:</label>


                                        <input name="titulo" class="form-control" value="<?=$entrada->titulo?>" required>


                                    </div>





                                    <div class="form-group" style="display: -webkit-box;">


                                        <div class="col-lg-6">


                                            <label>Imagen principal:</label>


                                           <input type="file" name="foto">


                                           <?php


                                           	if($entrada->foto!=''):


                                           ?>		


                                           		<img class="img-thumbnail" style="max-width:150px; margin-top:10px;" src="<?=site_url('files/'.$entrada->galeria.'/'.$entrada->foto.'')?>">


                                           	<?php


                                           	endif;	


                                           ?>


                                        </div>
  





                                    </div>  
                                    
                                    <div class="form-group">
                                        <label>Vigencia</label>
                                        <div class="input-group date col-xs-6"  >
                                            <input type="text" value="<?=$entrada->vigencia?>" name="vigencia" class="form-control vigencia"><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                        </div>
                                    </div>





                                     <div class="form-group">


                                        <label>Contenido:</label>


                                        <textarea id="contenido" name="contenido" class="form-control" rows="3">


                                        	<?=$entrada->contenido?>


                                        </textarea>


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


         //   $(function(){
//
//
//                
//
//
//                var uploadObj = $("#fileuploader").uploadFile({
//
//
//                    url:"<?=base_url()?>admin/upload_image?foto=<?=$entrada->galeria?>",
//
//
//                    fileName:"myfile",
//
//
//                    multiple:true,
//
//
//                    autoSubmit:true,
//
//
//                    maxFileSize:4190*1000,
//
//
//                    maxFileCount:5,
//
//
//                    showStatusAfterSuccess:true,
//
//
//                    dragDropStr: "<br class='visible-xs'><span><b>Agregue aquí sus imágenes.</b></span>",
//
//
//                    abortStr:"Abandonar",
//
//
//                    cancelStr:"Cancelar",
//
//
//                    //doneStr:"Ok",
//
//
//                    multiDragErrorStr: "Varios archivos de arrastrar y soltar no están permitidos.",
//
//
//                    extErrorStr:"No está permitido. Extensiones permitidas :",
//
//
//                    sizeErrorStr:"No está permitido. Permitido el tamaño máximo :",
//
//
//                    uploadErrorStr:"No se permite",
//
//
//                    afterUploadAll:function(obj){
//
//
//                        $(".ajax-file-upload-green").show();
//
//
//                        $(".ajax-file-upload-green").html("Completado");
//
//
//                        console.log(obj);
//
//
//            //			console.log(obj);
//
//
//            //			alert('finalizado');
//
//
//            //			$("#upload").html('<h3>Tus mensaje se mando satisfactoriamente.</h3><a href="javascript:void(0);" id="reload">Mandar otro mensaje</a>');
//
//
//            //			$("#eventsmessage").html($("#eventsmessage").html()+"<br/>All files are uploaded");
//
//
//                    }
//
//
//                });
//
//
//                





            });


        </script>


    <!--ckeditor-->


    


    <script>


    /*CKEDITOR.replace( 'contenido', {


        language: 'es'


    });*/
        tinymce.init({
  selector: 'textarea',
  language: 'es',
  height: 400,
  menubar: false,
  plugins: [
    'advlist autolink lists link image  imagetools charmap print preview anchor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table contextmenu paste code jbimages'
  ],
  toolbar: ' insertfileundo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link jbimages',

  content_css: '//www.tinymce.com/css/codepen.min.css',
  menubar: "edit",
   relative_urls: false,
paste_data_images: true,
images_upload_credentials: true
});


    </script>
<script>

    $('.vigencia').datepicker({

        language: 'es',

        format:'yyyy/mm/dd'

}); 

</script>
