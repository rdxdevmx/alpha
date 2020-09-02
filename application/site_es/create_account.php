<script>
window.fbAsyncInit = function() {
    FB.init({
      appId      : '1747695018776743',
      xfbml      : true,
      version    : 'v2.6'
    });
  };
  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script> 
    <div class="bodi off">
        <div class="localizacion_pag">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <a href="index.html"><img src="<?=site_url()?>assets/assets/tribu-bazar-boton-home.png" alt="tribu bazar boton home">Inicio</a>
                        <span></span>
                        <a href="crear-cuenta.html">Acceder</a>
                    </div>
                </div>
            </div>
        </div>
        <section class="pg1">

            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-6">
                        <div class="row">
                            <div class="col-xs-12 col-md-7">
                                <form onsubmit="return validate_mail()" class="bx_formulario" action="<?=site_url('home/register')?>" method="post">
                                    <h3>Nuevos Clientes</h3>
                                    <div class="form-group">
                                        <label>Nombre:</label>
                                        <input type="text" name="first_name" class="form-control"  placeholder="" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Apellido:</label>
                                        <input type="text" name="surname" class="form-control"  placeholder="" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Email:</label>
                                        <input id="email" type="email" name="email" validate="" class="form-control" placeholder="" required pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}">
                                    </div>
                                    <div class="form-group">
                                        <label>Contraseña:</label>
                                        <input type="password" id="password" name="password" class="form-control"  placeholder="" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Confirmar contraseña:</label>
                                        <input type="password" id="password2" name="password2" class="form-control"  placeholder="" required>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="bt" value="SEND">Registrarse</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <div class="row">
                            <div class="col-xs-12 col-md-7">
                                <form class="bx_formulario" action="<?=site_url('home/sign_in')?>" method="post">
                                    <h3>Clientes</h3>
                                    <div class="form-group">
                                        <label>Email:</label>
                                        <input type="email" name="email" class="form-control" placeholder="" required pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}">
                                    </div>
                                    <div class="form-group">
                                        <label>Contraseña:</label>
                                        <input type="password" name="password" class="form-control"  placeholder="" required>
                                    </div>                                    
                                    <div class="form-group">
                                        <button type="submit" class="bt op-" value="SEND">Acceder</button>
                                    </div>
<!--                                    <div class="col-xs-12 form-group" style='margin-top: 15px;'>
                                        <div class="fb-login-button" data-login_text="Acceder con FB" data-max-rows="1" data-size="large" onlogin='register_facebook()' data-show-faces="false" data-auto-logout-link="false"></div>    
                                    </div>   -->                                       
                                </form>
                                <div class="text-center" style='text-align: center;'>
                                    <a class="collapsed" data-toggle="collapse" href="#colapse_contrasena">Olvidaste tu contraseña?</a>
                                </div>
                                <div class="collapse" id="colapse_contrasena">
                                    <form class="bx_formulario" action="<?=site_url('home/forgotten_password')?>">
                                        <p class="op-">Ingresa tu email y da click en "Enviar". Te enviaremos un link para crear una nueva contraseña.</p>
                                        <div class="form-group">
                                            <label>Email:</label>
                                            <input type="email" name="email" class="form-control" placeholder="" required pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}">
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="bt op-" value="SEND">Enviar</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                            <div class="col-xs-12 col-md-7"> 
                                <a class="log_link" data-toggle="modal" data-target="#sign_in" href="javascript:void(0);"><img class="fb-login img-responsive" src="<?php echo base_url('assets/assets/facebook/BotonSesionFacebook.png') ?>"></a>
                            </div>




                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<!--Crear-Cuenta-->
<style type="text/css">
    .center{
        text-align: center;
    }   
</style>
<script>
var result = '';
function get_mail(mail){	
	
	$.ajaxSetup({async: false});
	
	$.post( "<?=base_url()?>home/search_mail",{mail:mail} ,function( data ) {
		 result = data;
	}); 
	
	return result;
}
function validate_mail(){
	
	var mail = $("#email").val();
	var password = $("#password").val();
	var password2 = $("#password2").val();
	
	res = get_mail(mail);
	
	if(res > 0){	
		alert("The e-mail already exists");
		return 	false;	
	}else if(password != password2){
		alert("Passwords Don't Match");
		return 	false;	
	}else{
		console.log("enviado!!");
		return true;
	}
}
function register_facebook() {
    FB.getLoginStatus(login_status_cb);
}
function login_status_cb(response) {
    FB.api('/me', { fields: 'name, email, id' }, function(data) {
      register_fb_ajax(data);
    });

}
function register_fb_ajax(data) {
    var fbid = data.id;
    var email = data.email;
    var name = data.name;
    $.ajax({
        type: "POST",
        url: "<?=site_url()?>home/register_fb",
        data:{
          fb: fbid,
          name: name,
          email: email
      },
      async: true,
      dataType: 'json'
    }).done(function(data){
      if (data.data == true) {
            location.href='<?=site_url()?>account';
      }
    });
}
	
</script>
        