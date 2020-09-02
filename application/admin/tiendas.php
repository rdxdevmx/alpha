<div id="page-wrapper">

    <div class="row">

        <div class="col-lg-12">

            <h1 class="page-header">Tiendas</h1>

        </div>

    	<?=$m?>

        <div class="col-lg-12">

            <div class="panel panel-default">

                <div class="panel-heading">

                    Listado de tiendas: <?=$total_rows?>

                </div>

                

                <div class="panel-body">

                            <div class="table-responsive">

                                <table class="table table-striped">

                                    <thead>

                                        <tr>

                                            <th>Tienda</th>

                                            <th>Acciones</th>

                                        </tr>

                                    </thead>

                                    <tbody>

                                    <?php

                                        foreach($results as $row):        

                                    ?>

                                        <tr>

                                            <td><?=$row->tienda?></td>

                                            <td>

                                                <a href="<?=site_url('admin/editar_tienda/'.$row->id_tienda)?>" class="col-lg-2">

                                                    <i class="fa fa-pencil-square-o fa-2x"></i>

                                                </a>

                                                <a href="<?=site_url('admin/delete_tienda/?id_tienda='.$row->id_tienda.'&logo='.$row->logo)?>" title="¿Desea eliminar la tienda?" class="col-lg-2 confirmar">

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