<div id="page-wrapper">


    <div class="row">


        <div class="col-lg-12">


            <h1 class="page-header">Concursos</h1>


        </div>


<!--nueva entrada--> 


<!--nueva entrada--> 



        <div class="col-lg-12">
        
        	<a href="<?=site_url('admin/nuevo_concurso')?>" class="btn btn-success"><i class="fa fa-plus-circle" aria-hidden="true"></i> Agregar un Concurso</a>
       		
<!--            <div class="panel-body">
                <div class="panel panel-default">
    
                    <div class="panel-heading">
                        Listado de entradas
                    </div>
                    
                    <div class="panel-body">
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


                                        <label>Contenido:</label>


                                        <textarea id="contenido" name="contenido" class="form-control" rows="3"></textarea>


                                    </div>  



                                    <div class="form-group">


                                        <input class="btn btn-primary" type="submit" value="Guardar">


                                    </div>


                                    


                                </form>
                    </div>
                    
                </div>    
			</div>-->

                

<?=$m?>
                <div class="panel-body">
        
        
            
            <div class="panel panel-default">


                <div class="panel-heading">


                    Listado de concursos


                </div>


                


                <div class="panel-body">


                            <div class="table-responsive">


                                <table class="table table-striped">


                                    <thead>


                                        <tr>


                                            <th>Título</th>
                                            
                                            <th>Vigencia</th>
                                            
                                            <th>Participantes</th>

                                            <th>Acciones</th>


                                        </tr>


                                    </thead>


                                    <tbody>


                                    <?php


                                        foreach($results as $row):        


                                    ?>


                                        <tr>


                                            <td><?=$row->titulo?></td>
                                            
                                            <td>
                                                <?=$row->vigencia?>    
                                            </td>
                                            <td>
                                            <a href="<?=site_url('admin/excel_concurso?concurso='.$row->id_entrada)?>" class="btn btn-primary"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Exportar registros</a>
                                                
                                            </td>


                                            <td>


                                                <a href="<?=site_url('admin/edit_entrada/?id_entrada='.$row->id_entrada.'&galeria='.$row->galeria)?>" class="col-lg-5">


                                                    <i class="fa fa-pencil-square-o fa-2x"></i>


                                                </a style="margin-rigth:10px">


                                                <a class="confirm" href="<?=site_url('admin/delete_entrada/?id_entrada='.$row->id_entrada.'&galeria='.$row->galeria)?>" class="col-lg-5">


                                                    <i class="fa fa-times fa-2x"></i>


                                                </a>


                                            </td>


                                        </tr>


                                    <?php


                                        endforeach;    


                                    ?>


                                    </tbody>


                                </table>


                            </div>


                            <!-- /.table-responsive -->


                </div>


            


            </div>


                    


            <!---paginacion ---->


            <div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate">


                <ul class="pagination">


                    <?=$links?>


                </ul>


            </div>


            <!---paginacion ---->


    


    </div>


</div>        
<!--ckeditor-->
<script>
CKEDITOR.replace( 'contenido', {
	language: 'es'
});
</script>