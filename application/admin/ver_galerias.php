<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Galerías</h1>
        </div>


                <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Listado de galerias
                </div>
                
                <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Título</th>
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
                                                <a href="<?=site_url('admin/edit_galeria/?id_entrada='.$row->id_galeria.'&galeria='.$row->foto)?>" class="col-lg-2">
                                                    <i class="fa fa-pencil-square-o fa-2x"></i>
                                                </a>
                                                <a href="<?=site_url('admin/delete_galeria/?id_entrada='.$row->id_galeria.'&galeria='.$row->foto)?>" class="col-lg-2">
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