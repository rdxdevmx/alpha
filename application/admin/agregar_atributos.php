<!--Agregar Atributos-->    
<div id="page-wrapper">
	<div class="row">
    	<div class="col-lg-12">
        	<h1 class="page-header">Agregar características</h1>
       	</div>
	</div>
    <?=$m?>    
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Agregar característica</div>                
                <div class="panel-body">
                    <div class="row"> 
                        <div class="col-lg-12">
                            <div class="col-xs-4">
                                <div class="col-xs-12 form-group">
                                    <label>Título de característica</label>
                                    <input type="text" name="atributo" id='atributo' class="form-control" autocomplete='off' placeholder='Ej. Talla, Color' required>
                                </div>                                   
                            </div>
                            <div class='col-xs-4 left display-table add-att pointer'>
                                <span class="glyphicon glyphicon-plus-sign" aria-hidden="true" onclick='agregarAtributo()'></span>                             
                            </div>                                  
                        </div>
                    </div>
                </div>            
            </div>    
        </div>
    </div>    
</div>
<!--Agregar Atributos-->    

<!--Modal-->    
<div id="attr" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header add-product">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Agrega los valores</h4>
            </div>
            <div class="modal-body">
                <div class='row'>
                    <form role="form" method="post" action="<?=site_url('admin/insert_valor')?>">                
                        <div class="col-xs-6">
                            <div class="col-xs-10 form-group">
                                <label>Valores separados por comas</label>
                                <input type="text" name="valor" id='valor' class="form-control" autocomplete='off' placeholder="Ej. Chica, Media, Grande" required>
                            </div>                                                         
                        </div>     
                        <div class="col-xs-12 right">
                            <button type="submit" class="btn btn-info">Guardar</button>
                        </div>              
                    </div>
                </form>    
            </div>
        </div>
    </div>
</div>
<!--Modal-->

<script type="text/javascript">
    function agregarAtributo(){
        var atributo = $('#atributo').val();   
        if( atributo.length>2){
            $.ajax({
                url:"<?=base_url()?>admin/insert_atributo",
                data: { atributo: atributo},       
                method: 'POST',
                dataType: 'json',
                success: function(data){
                    $('#attr').modal({ backdrop: 'static', keyboard: false });            
                    $(data.html).insertAfter('#valor');
                    console.log(data);
                }
            });            
        }
    }
</script>