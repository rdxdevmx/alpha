        <div id="page-wrapper">


            <div class="row">


                <div class="col-lg-12">


                    <h1 class="page-header">Dashboard</h1>


                </div>


                <!-- /.col-lg-12 -->


            </div>


            <!-- /.row -->


            <div class="row">

<!-- 
                <div class="col-lg-3 col-md-6">


                   <div class="panel panel-primary">


                        <div class="panel-heading">


                            <div class="row">


                                <div class="col-xs-3">


                                    <i class="fa fa-shopping-bag fa-4x"></i>


                                </div>


                                <div class="col-xs-9 text-right">


                                    <div class="huge"><i class="fa fa-arrow-circle-up" aria-hidden="true"></i></div>


                                    <div>Productos populares</div>


                                </div>


                            </div>


                        </div>


                        <a href="#">


                            <div class="panel-footer">


                                <span class="pull-left">Ver más</span>


                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>


                                <div class="clearfix"></div>


                            </div>


                        </a>


                    </div>


                </div>-->

                <?php 
                    $tipo = $this->session->userdata('tipo'); 
                ?>
                
                <?php if(isset($tipo) && $tipo==1): ?>

                <div class="col-lg-3 col-md-6">


                    <div class="panel panel-green">


                        <div class="panel-heading">


                            <div class="row">


                                <div class="col-xs-3">


                                    <i class="fa fa-cart-plus fa-4x"></i>


                                </div>


                                <div class="col-xs-9 text-right">


                                    <div class="huge"><i class="fa fa-arrow-circle-up" aria-hidden="true"></i></div>


                                    <div>Productos vendidos</div>


                                </div>


                            </div>


                        </div>


                        <a href="<?=base_url('admin/productos_vendidos')?>">


                            <div class="panel-footer">


                                <span class="pull-left">Ver más</span>


                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>


                                <div class="clearfix"></div>


                            </div>


                        </a>


                    </div>


                </div>

                <div class="col-lg-3 col-md-6">


                    <div class="panel panel-green">


                        <div class="panel-heading">


                            <div class="row">


                                <div class="col-xs-3">


                                    <i class="fa fa-usd fa-4x"></i>


                                </div>


                                <div class="col-xs-9 text-right">


                                    <div class="huge"><i class="fa fa-arrow-circle-up" aria-hidden="true"></i></div>


                                    <div>Pagos</div>


                                </div>


                            </div>


                        </div>

                        <?php 

                            $id_tienda = $this->session->userdata('id_tienda');  

                            $id_tienda = $this->Encryption->encode($id_tienda);

                        ?>
                        <a href="<?=base_url('admin/pago_tiendas/?id='.$id_tienda)?>">


                            <div class="panel-footer">


                                <span class="pull-left">Ver más</span>


                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>


                                <div class="clearfix"></div>


                            </div>


                        </a>

                    </div>

                </div>

                <?php endif; ?>

                <?php if(isset($tipo) && $tipo==0): ?>

                <div class="col-lg-3 col-md-6">


                    <div class="panel panel-green">


                        <div class="panel-heading">


                            <div class="row">


                                <div class="col-xs-3">


                                    <i class="fa fa-shopping-bag fa-4x"></i>


                                </div>


                                <div class="col-xs-9 text-right">


                                    <div class="huge"><i class="fa fa-arrow-circle-up" aria-hidden="true"></i></div>


                                    <div>Productos vendidos</div>


                                </div>


                            </div>


                        </div>


                        <a href="<?=base_url('admin/productos_vendidos_total')?>">


                            <div class="panel-footer">


                                <span class="pull-left">Ver más</span>


                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>


                                <div class="clearfix"></div>


                            </div>


                        </a>


                    </div>


                </div>


                <div class="col-lg-3 col-md-6">


                    <div class="panel panel-green">


                        <div class="panel-heading">


                            <div class="row">


                                <div class="col-xs-3">


                                    <i class="fa fa-shopping-basket fa-4x"></i>


                                </div>


                                <div class="col-xs-9 text-right">


                                    <div class="huge"><i class="fa fa-arrow-circle-up" aria-hidden="true"></i></div>


                                    <div>Ventas por tienda</div>


                                </div>


                            </div>


                        </div>


                        <a href="<?=base_url('admin/ventas_tienda')?>">


                            <div class="panel-footer">


                                <span class="pull-left">Ver más</span>


                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>


                                <div class="clearfix"></div>


                            </div>


                        </a>


                    </div>


                </div>


                <div class="col-lg-3 col-md-6">


                    <div class="panel panel-green">


                        <div class="panel-heading">


                            <div class="row">


                                <div class="col-xs-3">

                                    <i class="fa fa-usd fa-4x"></i>

                                </div>


                                <div class="col-xs-9 text-right">


                                    <div class="huge"><i class="fa fa-arrow-circle-up" aria-hidden="true"></i></div>


                                    <div>Pago a tienda</div>


                                </div>


                            </div>


                        </div>


                        <a href="<?=base_url('admin/pago_tiendas')?>">


                            <div class="panel-footer">


                                <span class="pull-left">Ver más</span>


                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>


                                <div class="clearfix"></div>


                            </div>


                        </a>


                    </div>


                </div>

                <?php endif; ?>

            </div>





        </div>


        <!-- /#page-wrapper -->


    </div>


    <!-- /#wrapper -->