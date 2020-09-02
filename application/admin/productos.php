<?php 
    $admin = $this->session->userdata('admin');
?>

<div id="page-wrapper">

    <div class="row">

        <div class="col-lg-12">

            <h1 class="page-header">Productos</h1>

        </div>

        

        <div class="col-xs-12" style="padding-left: 0px;">

            <?=$m?>                

            <form id="filter_prod" method="get">

                <input type="hidden" id="tienda" name="id_tienda" value="<?=$id_tienda?>" />
                
                <div class="col-lg-3">

                    <input name="titulo" class="form-control" placeholder="Titulo" value="<?=(isset($_GET['titulo']) && $_GET['titulo']!='')?$_GET['titulo']:''?>" />

                </div>
                
                <?php if(isset($admin) && $admin!=''): ?> 
                <div class="col-lg-3">                  

                    <input type="text" id="tiendas-auto" class="form-control" value="<?=$nom_tienda?>" placeholder="Tienda" <?=(isset($admin) && $admin=='')?' disabled ':''?> />

                </div>
                <?php endif; ?>

                <div class="col-lg-2">

                    <select name="categoria" class="form-control">

                        <option value="0">--Categor&iacute;a--</option> 

                        <?php

                            foreach($categorias->result() as $cat):

                        ?>

                            <option value="<?=$cat->id_categoria?>"><?=$cat->categoria?></option>

                        <?php

                            endforeach;

                        ?>

                    </select>

                </div>

                <div class="col-lg-2">
                    <?php if(isset($admin) && $admin!=''): ?> 
                    <input type="checkbox" name="des" value="1" <?=(isset($_GET['des'])&& $_GET['des']==1 )?' checked ':''?>>
                    <label>Destacados</label>
                    <?php endif; ?>
                </div>

                <div class="col-lg-2">

                    <button type="submit" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i> Buscar</button>
                        
                    <a href="<?=base_url('admin/productos')?>" class="btn btn-primary"><i class="fa fa-refresh" aria-hidden="true"></i></a>
                </div>

            </form>                        

        </div> 



        <div class="col-lg-12">

            <div class="panel panel-default">

                <div class="panel-heading">

                    Listado de productos: <?=$total_rows?>

                </div>

                <div class="panel-body">               

                    <div class="table-responsive">

                        <table class="table table-striped">

                            <thead>

                                <tr>

                                    <th>Id</th>

                                    <th>Producto</th>

                                    <th>Tienda</th>

                                    <th>Stock</th>

                                    <th>Visitas</th>

                                    <?php if(isset($admin) && $admin!=''): ?> 
                                    <th>Destacados Home</th>
                                    <?php endif; ?>

                                    <th>Acciones</th>

                                </tr>

                            </thead>

                            <tbody>

                            <?php

                                foreach($results as $row):  //print_r($row);      

                            ?>

                                <tr>

                                    <td><?=$row->id_producto?></td>
                                    
                                    <td><?=$row->titulo?></td>

                                    <td><?=$row->tienda?></td>

                                    <td><?=$this->Tribubazar->stock_producto($row->id_producto)?></td>

                                    <td><?=$row->visitas?></td>

                                    <?php if(isset($admin) && $admin!=''): ?> 

                                    <td>
                                        <?php if($row->destacado == 0): ?>
                                        <a href="<?=base_url('admin/prod_des/?id='.$row->id_producto.'&d=1')?>" class="btn-primary btn-xs confirm"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                        <?php else: ?>
                                        <a href="<?=base_url('admin/prod_des/?id='.$row->id_producto.'&d=0')?>" class="btn-primary btn-xs confirm"><i class="fa fa-star" aria-hidden="true"></i></a>
                                        <?php endif;  ?>
                                    </td>

                                    <?php endif; ?>

                                    <td>

                                        <a href="<?=site_url('admin/editar_producto/'.$row->galeria.'-'.$row->id_producto)?>" class="btn btn-primary btn-xs">

                                            <i class="fa fa-pencil-square-o"></i>

                                        </a>

                                        <a href="<?=site_url('admin/delete_producto/?id_producto='.$row->id_producto.'&galeria='.$row->galeria)?>" title="¿Desea eliminar el producto?" class="btn btn-danger btn-xs confirmar">

                                            <i class="fa fa-times"></i>

                                        </a>

                                    </td>

                                </tr>

                            <?php

                                endforeach;    

                            ?>

                            </tbody>

                        </table>

                    </div>

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