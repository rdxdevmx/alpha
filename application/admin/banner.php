<?=$m?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Banner</h1>
        </div>
    
        <form method="post" action="<?=site_url('admin/update_banner')?>" enctype="multipart/form-data">
        <div class="col-lg-12">
        	<div class="banner">
        		<label>Banner 7</label>
        		<input type="file" name="file_7">
                <input type="text" name="url_7" placeholder="Escriba la url" value="<?=$banner[7]['url']?>"> 
                <?php
                    if($banner[7]['banner']!=''):
                        echo '<img class="img-responsive" src="'.site_url('files/banners/'.$banner[7]['banner']).'">';
                    endif;    
                ?>
        	</div>
        </div>
        <div class="col-lg-4">
        	<div class="banner">
        		<label>Banner 1</label>
        		<input type="file" name="file_1">
                <input type="text" name="url_1" placeholder="Escriba la url" value="<?=$banner[1]['url']?>"> 
                <?php
                    if($banner[1]['banner']!=''):
                        echo '<img class="img-responsive" src="'.site_url('files/banners/'.$banner[1]['banner']).'">';
                    endif;    
                ?>

        	</div>
        	<div class="banner">
        		<label>Banner 2</label>
        		<input type="file" name="file_2">
                <input type="text" name="url_2" placeholder="Escriba la url" value="<?=$banner[2]['url']?>"> 
                <?php
                    if($banner[2]['banner']!=''):
                        echo '<img class="img-responsive" src="'.site_url('files/banners/'.$banner[2]['banner']).'">';
                    endif;    
                ?>
        	</div>
        	<div class="banner">
        		<label>Banner 3</label>
        		<input type="file" name="file_3">
                <input type="text" name="url_3" placeholder="Escriba la url" value="<?=$banner[3]['url']?>"> 
                <?php
                    if($banner[3]['banner']!=''):
                        echo '<img class="img-responsive" src="'.site_url('files/banners/'.$banner[3]['banner']).'">';
                    endif;    
                ?>
        	</div>
        </div>
        <div class="col-lg-4">

        </div>
        <div class="col-lg-4">
        	<div class="banner">
        		<label>Banner 4</label>
        		<input type="file" name="file_4">
                <input type="text" name="url_4" placeholder="Escriba la url" value="<?=$banner[4]['url']?>"> 
                <?php
                    if($banner[4]['banner']!=''):
                        echo '<img class="img-responsive" src="'.site_url('files/banners/'.$banner[4]['banner']).'">';
                    endif;    
                ?>
        	</div>
        	<div class="banner">
        		<label>Banner 5</label>
        		<input type="file" name="file_5">
                <input type="text" name="url_5" placeholder="Escriba la url" value="<?=$banner[5]['url']?>"> 
                <?php
                    if($banner[5]['banner']!=''):
                        echo '<img class="img-responsive" src="'.site_url('files/banners/'.$banner[5]['banner']).'">';
                    endif;    
                ?>
        	</div>
        	<div class="banner">
        		<label>Banner 6</label>
        		<input type="file" name="file_6">
                <input type="text" name="url_6" placeholder="Escriba la url" value="<?=$banner[6]['url']?>"> 
                <?php
                    if($banner[6]['banner']!=''):
                        echo '<img class="img-responsive" src="'.site_url('files/banners/'.$banner[6]['banner']).'">';
                    endif;    
                ?>
        	</div>
        </div>
        <div class="col-lg-12">
        	<div class="banner">
        		<input type="submit" class="btn btn-primary center-block" value="Actualizar">
        	</div>
        </div>
    	</form>
    
    </div>
</div>        