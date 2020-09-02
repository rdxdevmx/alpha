<?php

    $admin = $this->session->userdata('admin');

    $tipo = $this->session->userdata('tipo');

    $active = $this->session->userdata('active');

    if(!isset($tipo) || $tipo==''):

        redirect(site_url('admin'));

        die();

    endif;  

?>

<!DOCTYPE html>

<html lang="es">

<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">

    <meta name="author" content="">

    

    <title>Tribu Bazar | Panel de administración</title>

    <!-- Bootstrap Core CSS -->

    <link href="<?=base_url()?>assets/css/bootstrap.css" rel="stylesheet">

    <!-- MetisMenu CSS -->

    <link href="<?=base_url()?>assets/admin/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->

    <link href="<?=base_url()?>assets/admin/dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->

    <link href="<?=base_url()?>assets/admin/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->

    <link href="<?=base_url()?>assets/admin/bower_components/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->

    <link href="<?=base_url()?>assets/admin/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


    <link href="<?=base_url()?>assets/css/panel.css" rel="stylesheet" type="text/css">
    
    
    <!--ckeditor-->

    <script src="<?=base_url()?>assets/ckeditor/ckeditor.js"></script>
    
    <script src="<?=base_url()?>assets/js/jquery-1.12.0.min.js"></script>

    <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
    
    
    
    <link href="<?=base_url()?>datapicker/css/bootstrap-datepicker.css" rel="stylesheet" type="text/css">
    
    <script type="text/javascript" src="<?=site_url("datapicker/js/bootstrap-datepicker.js")?>" ></script>
    
    <script type="text/javascript" src="<?=site_url("datapicker/locales/bootstrap-datepicker.es.min.js")?>" ></script>
    
    <script src="<?=site_url("tinymce/tinymce.min.js")?>"></script>


   <link rel="stylesheet" href="<?=site_url('assets/jquery-ui-themes-1.11.4/themes/smoothness/jquery-ui.css')?>">
    
    <link href="<?=base_url()?>assets/css/admin.css" rel="stylesheet" type="text/css">

    

</head>

<body onLoad="load_function()">

    <div id="wrapper">

        <!-- Navigation -->

        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">

            <div class="navbar-header">

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">

                    <span class="sr-only">Toggle navigation</span>

                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>

                </button>

                <a class="navbar-brand" href="<?=site_url('admin/panel')?>">

                	<img src="<?=site_url('assets/assets/tribu-bazar-logotipo.png')?>" width="200">

                </a>

            </div>

            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">

                <!-- /.dropdown -->

                <li class="dropdown">

                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">

                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>

                    </a>

                    <ul class="dropdown-menu dropdown-user">

<!--                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a></li>-->
                        <?php if(isset($tipo) && $tipo==1): ?>
                            
                            <?php if(isset($active) && $active==1):?> 
                                <li><a href="<?=base_url('admin/active_tienda/0')?>" class="confirm" alt="¿Esta seguro de desactivar su tienda?"><i class="fa fa-toggle-on" aria-hidden="true"></i> Desactivar tienda</a></li>
                            <?php else: ?>
                                <li><a href="<?=base_url('admin/active_tienda/1')?>" class="confirm" alt="¿Esta seguro de activar su tienda?"><i class="fa fa-toggle-off" aria-hidden="true"></i> Activar tienda</a></li>
                            <?php endif; ?>

                        <?php endif; ?>
                        <li class="divider"></li>

                        <?php if(isset($tipo) && $tipo==1): ?>
                        <li><a href="#"><i class="fa fa-pencil-square-o fa-fw" aria-hidden="true"></i> Editar tienda</a></li>
                        <?php endif; ?>
                        <li><a href="<?=site_url('admin/logout')?>"><i class="fa fa-sign-out fa-fw"></i> Salir</a></li>

                    </ul>

                    <!-- /.dropdown-user -->

                </li>

                <!-- /.dropdown -->

            </ul>

            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">

                <div class="sidebar-nav navbar-collapse">

                    <ul class="nav" id="side-menu">

                        <li class="sidebar-search">

                            <div class="input-group custom-search-form">

                            </div>

                            <!-- /input-group -->

                        </li>
                       

                        <li>

                            <a href="#"><i class="fa fa-th fa-fw"></i> Categorías<span class="fa arrow"></span></a>

                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?=site_url('admin/agregar_categoria')?>">Agregar categoría</a>
                                </li>
                                <li>
                                    <a href="<?=site_url('admin/editar_categoria')?>">Editar categoría</a>
                                </li>
                            </ul>

                            <!-- /.nav-second-level -->

                        </li>

                       
                        <?php if(isset($admin) && $admin!=''): ?>                                                

                        <li>

                            <a href="forms.html"><i class="fa fa-shopping-basket fa-fw"></i> Tiendas<span class="fa arrow"></span></a>

                            <ul class="nav nav-second-level">

                                <li>
                                    <a href="<?=site_url('admin/agregar_tienda')?>">Agregar tienda</a>
                                </li>

                                <li>
                                    <a href="<?=site_url('admin/tiendas')?>">Tiendas</a>
                                </li>

                                <li>
                                    <a href="<?=site_url('admin/pago_tiendas')?>">Pago a tiendas</a>
                                </li>

                            </ul>         

                        </li>


                        <?php endif; ?>
                        

                        <li>

                            <a href="index.html"><i class="fa fa-shopping-bag fa-fw"></i> Productos<span class="fa arrow"></span></a>

                            <ul class="nav nav-second-level">

                                <li>

                                    <a href="<?=site_url('admin/agregar_productos')?>">Agregar Producto</a>

                                </li>

                                <li>

                                    <a href="<?=site_url('admin/productos')?>">Productos</a>

                                </li>
                                
                                <?php if(isset($tipo) && $tipo==1): ?>
                                <li>
                                    <a href="<?=site_url('admin/productos_vendidos')?>">Productos vendidos</a>
                                </li>
                                <?php endif; ?>

                            </ul>
                        </li>

                        
                        <?php if(isset($admin) && $admin!=''): ?> 
                        <li>
                            <a href="index.html"><i class="fa fa-list fa-fw"></i> Características<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?=site_url('admin/agregar_atributos')?>">Agregar Características</a>
                                </li>
                                <li>
                                    <a href="<?=site_url('admin/editar_atributos')?>">Editar Característica</a>
                                </li>
                            </ul>
                        </li>
                        <?php endif; ?>
                        
                        <?php if(isset($admin) && $admin!=''): ?> 
                        <li>

                            <a href="index.html"><i class="fa fa-cart-plus fa-fw"></i> Ventas<span class="fa arrow"></span></a>

                            <ul class="nav nav-second-level">

                                <li>
                                    <a href="<?=site_url('admin/ver_ventas')?>">Ver ventas</a>
                                </li>

                                <li>
                                    <a href="<?=site_url('admin/ventas_tienda')?>">Ventas totales por tienda</a>
                                </li>
                                
                                <li>
                                    <a href="<?=site_url('admin/productos_vendidos_total')?>">Productos vendidos</a>
                                </li>

                                <?php 
                                    // else: 
                                    
                                    // $id_tienda = $this->session->userdata('id_tienda');
                                    // $id_tienda = $this->Encryption->encode($id_tienda); 
                                ?>
<!--                                 <li>
                                    <a href="<?=site_url('admin/vta_detalle_tienda/?id='.$id_tienda)?>">Ver ventas</a> 
                                </li> -->
                                

                            </ul>
                            <?php endif; ?>
                            

                        </li>

                        <!--<li>

                            <a href="forms.html"><i class="fa fa-users fa-fw"></i> Usuarios<span class="fa arrow"></span></a>

                            <ul class="nav nav-second-level">

                                <li>

                                    <a href="#">Ver usuarios</a>

                                </li>

                            </ul>

                            

                        </li>-->

                        



                        
                        <?php if(isset($admin) && $admin!=''): ?> 
                        
                        <li><a href="<?=site_url('admin/envios')?>"><i class="fa fa-truck fa-fw"></i> Envíos</a></li>
						<li><a href="<?=site_url('admin/carrusel')?>"><i class="fa fa-picture-o fa-fw"></i> Carrusel</a></li>				
                        <!--<li><a href="<?=site_url('admin/blog')?>"><i class="fa fa-file-text fa-fw"></i> Blog</a></li>-->
                        <li><a href="<?=site_url('admin/concursos   ')?>"><i class="fa fa-star"></i> Concursos</a></li>
<!--                         <li><a href="<?=site_url('admin/excelin')?>"><i class="fa fa-file-text fa-fw"></i> Exportar Usuarios</a></li>
                         -->
                        <li><a href="<?=site_url('admin/clientes')?>"><i class="fa fa-user fa-fw"></i> Clientes</a></li>
                        
                        <!--
                        <li>
                            <a href="forms.html"><i class="fa fa-bar-chart fa-fw"></i> Reportes<span class="fa arrow"></span></a>

                            <ul class="nav nav-second-level">

                                <li>

                                    <a href="<?=site_url('admin/reporte_tienda')?>">Tiendas</a>

                                </li>

                                <li>

                                    <a href="<?=site_url('admin/reporte_producto')?>">SKU</a>

                                </li>

                                <li>

                                    <a href="<?=site_url('admin/reporte_categoria')?>">Categoría</a>

                                </li>

                            </ul>

                        </li>-->

                        <?php endif; ?>
                        

                    </ul>

                </div>

                <!-- /.sidebar-collapse -->

            </div>

            <!-- /.navbar-static-side -->

        </nav>
        
        <script>
$(document).ready(function(){
    $(".dropdown-toggle").dropdown();
});
</script>