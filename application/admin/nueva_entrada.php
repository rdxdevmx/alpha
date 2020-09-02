<!--<link href="<?=base_url()?>mini-upload-form/css/uploadfile.css" rel="stylesheet">


<script src="<?=base_url()?>mini-upload-form/js/jquery.uploadfile.js"></script>-->





<!--upload file plugin--> 


<!--<link href="<?=base_url()?>mini-upload-form/css/style.css" rel="stylesheet" />


<script src="<?=base_url()?>mini-upload-form/js/jquery.knob.js"></script>
-->

<!-- jQuery File Upload Dependencies -->

<!--
<script src="<?=base_url()?>mini-upload-form/js/jquery.ui.widget.js"></script>


<script src="<?=base_url()?>mini-upload-form/js/jquery.iframe-transport.js"></script>


<script src="<?=base_url()?>mini-upload-form/js/jquery.fileupload.js"></script>-->


<!-- Our main JS file -->

<!--
<script src="<?=base_url()?>mini-upload-form/js/script.js"></script>-->


<!--upload file plugin--> 





<div id="page-wrapper">


    <div class="row">


        <div class="col-lg-12">


            <h1 class="page-header">Nuevo Concurso</h1>


        </div>


        


        <div class="col-lg-12">


            <div class="panel panel-default">


                <div class="panel-heading">


                    Agrega un entrada


                </div>





                <?=$m?>


                


                <div class="panel-body">


                    


                    <div class="tab-content">


                        <div class="tab-pane fade in active" id="home">


                            <div class="col-lg-12">





                                <form method="post" action="<?=site_url('admin/insert_entrada')?>" enctype="multipart/form-data">


                                    <input type="hidden" name="galeria" value="<?=$foto?>">    


                                    <div class="form-group">


                                        <label>Título:</label>


                                        <input name="titulo" class="form-control" required>


                                    </div>





                                    <div class="form-group" style="display: -webkit-box;">


                                        <div class="col-lg-6">


                                            <label>Imagen principal:</label>


                                           <input type="file" name="foto">


                                        </div>


                                    </div>  
                                    
                                    <div class="form-group">
                                        <label>Vigencia</label>
                                        <div class="input-group date col-xs-6 date"  >
                                            <input type="text" name="vigencia" class="form-control vigencia" required><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                        </div>
                                    </div>





                                     <div class="form-group">


                                        <label>Contenido:</label>


                                        <textarea id="contenido" name="contenido" class="form-control" rows="3"></textarea>


                                    </div>  



                                    <div class="form-group">


                                        <input class="btn btn-primary" type="submit" value="Guardar">


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


<!--ckeditor-->
<script type="text/javascript">
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
    $('.date').datepicker({



    format: 'yyyy-mm-dd',
    language: 'es',



});
</script>