// JavaScript Document



// validacion formulario contacto

    $(document).ready(function(){

        $('#afiliacion').submit(function() {

            var nombres = $('#nombres').val();

            var apellido_paterno = $('#apellido_paterno').val();

            var apellido_materno = $('#apellido_materno').val();

            var fch_nacimiento = $('#fch_nacimiento').val();

            var correo = $('#correo').val();



            var licenciatura = $('#licenciatura').val();

            var posgrado = $('#posgrado').val();

            var publico = $('#publico').val();

            var privado = $('#privado').val();

            var tel_fijo = $('#tel_fijo').val();

            var celular = $('#celular').val();



            var calle = $('#calle').val();

            var num_ext = $('#num_ext').val();

            var num_int = $('#num_int').val();

            var colonia = $('#colonia').val();

            var delegacion = $('#delegacion').val();

            var ciudad = $('#ciudad').val();

            var estado = $('#estado').val();

            var codigo_postal = $('#codigo_postal').val();

            var fch = $('#fch').val();



            if(nombres == '' || apellido_paterno == '' || apellido_materno == '' || fch_nacimiento == '' || correo == '' || licenciatura == '' || posgrado == '' || publico == '' || privado == '' || tel_fijo == '' || celular == '' || calle == '' || num_ext == '' || num_int == '' || colonia == '' || delegacion == '' || ciudad == '' || estado == '' || codigo_postal == '' || fch == ''){

                alert('Todos los campos son obligatorios');

                return false;               

            }else{ 

                alert('Hemos recibido su mensaje. Gracias por escribir.');

                return true;
				}

        }); 



    });



// validacion formulario contacto

   $(document).ready(function(){

        $('#target').submit(function() {

            var nombre = $('#nombre').val();

            var email = $('#email').val();

            var telefono = $('#telefono').val();

            var mensaje = $('#mensaje').val();

            var txt = /^[0-9]+$/;



            if(nombre =='' || email =='' || telefono =='' || mensaje ==''){

                alert('Favor de llenar todos los campos');

                return false;



            }else{ alert('Agradecemos tu mensaje, en breve te daremos respuesta'); 

            return true;}

        }); 

    });



















