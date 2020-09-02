<style type="text/css">
    .no-padding {
        padding-right: 0px;
        padding-left: 0px;
    }
</style>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Editar tienda</h1> </div>
    </div>
    <?=$m?>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading"> Editar Tienda </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form role="form" method="post" action="<?=site_url('admin/update_tienda')?>" enctype="multipart/form-data">
                                    <input type="hidden" name="id_tienda" value="<?=$this->uri->segment(3)?>">
                                    <div class="form-group">
                                        <div class="col-lg-6">
                                            <label>Nombre de la tienda</label>
                                            <input type="text" name="tienda" class="form-control" value="<?=$tienda->tienda?>" required>
                                            <br />

                                            
                                            <div class="col-lg-6 no-padding">
                                                <label>Logo actual:</label> <img src="<?=site_url('files/logo/'.$tienda->logo)?>" class="img-responsive"> 
                                                <label>Cambiar logo de la tienda:</label>
                                                <input type="file" name="logo" /> 
                                            </div>

                                        </div>
<!--                                         <div class="col-lg-6">
                                            <label>Categorías</label>
                                            <select multiple="multiple" id="parent_category1" name="parent[]" class="parent form-control" required>
                                                <option value="0">--Seleccione categoría--</option>
                                                <?php											                                                foreach($categorias->result() as $cat):                                            															if(in_array($cat->id_categoria, $cat_tienda)):														$s = ' selected ';													else:														$s = '';													endif;											?>
                                                    <option <?=$s?> value="
                                                        <?=$cat->id_categoria?>">
                                                            <?=$cat->categoria?>
                                                    </option>
                                                    <?php		                                                endforeach;	                                            ?>
                                            </select>
                                            <select multiple="multiple" id="parent_category2" class="parent form-control parent_new"></select>
                                            <select multiple="multiple" id="parent_category3" class="parent form-control parent_new"></select>
                                            <select multiple="multiple" id="parent_category4" class="parent form-control parent_new"></select>
                                        </div> -->
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <label>Calle:</label>
                                        <input type="text" name="calle" class="input-buy form-control" value="<?=$tienda->calle?>" required=""> </div>
                                    <div class="col-xs-12 col-sm-3">
                                        <label>Num ext:</label>
                                        <input type="text" name="num_ext" value="<?=$tienda->num_ext?>" class="input-buy form-control" required=""> </div>
                                    <div class="col-xs-12 col-sm-3">
                                        <label>Num int:</label>
                                        <input type="text" name="num_int" value="<?=$tienda->num_int?>" class="input-buy form-control"> </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <label>Colonia:</label>
                                        <input type="text" name="colonia" value="<?=$tienda->colonia?>" class="input-buy form-control" required=""> </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <label>Estado:</label>
                                        <select name="estado" class="input-buy form-control" required="">
                                            <option>--Seleccione opción--</option>
                                            <?php                                         foreach ($estados->result() as $value):                                             $s = ($value->id == $tienda->estado)?' selected ':'';                                    ?>
                                                <option <?=$s?> value="
                                                    <?=$value->id?>">
                                                        <?=$value->name?>
                                                </option>
                                                <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-xs-6 form-group">
                                        <button type="submit" class="btn btn-primary">Editar</button>
                                    </div>
                                </form>
                                <!--formulario-->
                            </div>
                        </div>
                    </div>
                    <!--panel body-->
                </div>
            </div>
        </div>
</div>