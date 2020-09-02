<div id="page-wrapper">


    <div class="row">


        <div class="col-lg-12">


            <h1 class="page-header">Envíos</h1>


        </div>


	


		<div class="col-lg-12">


        <?=$m?>


            <div class="panel panel-default">


                <div class="panel-heading">


                    Agregar opción de envío


                </div>


                <div class="panel-body">
			
                    <form method="post" action="<?=site_url('admin/insert_envio')?>"> 

                        <div class="col-xs-12 col-sm-4">
                            <label>Descripción del envío</label>
                            <input type="text" name="txt_envio" class="form-control" required>                            
                        </div>

                        <div class="col-xs-12 col-sm-4">
                            <label>Precio del envío</label>
                            <input type="text" name="precio_envio" class="form-control" required>
                        </div>

                        <div class="col-xs-12 col-sm-4">
                            <br>
                            <input type="submit" class="btn btn-primary" value="Guardar">
                        </div>                      

                    </form>

                </div>


            </div>


		</div>





         <div class="col-lg-12">


            <div class="panel panel-default">


                <div class="panel-heading">


                    Listado de envíos


                </div>


                


                <div class="panel-body">


                            <div class="table-responsive">


                                <table class="table table-striped">


                                    <thead>


                                        <tr>


                                            <th>Título</th>


                                            <th>Precio</th>


                                            <th>Acciones</th>


                                        </tr>


                                    </thead>


                                    <tbody>


                                    <?php


                                        foreach($envios->result() as $row):        


                                    ?>


                                        <tr>


                                            <td><?=$row->txt_envio?></td>


                                            <td>$ <?=$row->precio_envio?></td>


                                            <td>


                                                <a href="<?=site_url('admin/edit_envio/?id_envio='.$row->id_envio)?>" class="col-lg-2">


                                                    <i class="fa fa-pencil-square-o fa-2x"></i>


                                                </a>


                                                <a href="<?=site_url('admin/delete_envio/?id_envio='.$row->id_envio)?>" class="col-lg-2">


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


    


    </div>


</div>        