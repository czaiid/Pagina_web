
function login(usuario,password){
    $.post("login.php", { txtusuario:usuario, txtpassword:password }, function(response){
        var acceso = response.data.login;
        if(acceso == true){
            //var usuario = response.data.usuario;
            //sessionStorage.userid = usuario.id;
            //sessionStorage.username = usuario.username;
            //sessionStorage.nombre = usuario.nombre;
            //sessionStorage.apellidos = usuario.apellidos;
            //sessionStorage.email = usuario.email;
            //console.log(usuario);
        }else if (acceso == false){
            $('#login-form-msg').html('Usuario o contraseña incorrecta');
            $('#login-form-msg').removeClass('oculto');
            $('#txtpassword').val('');
        }else{
            $('#login-form-msg').html('Error en la conexion a la base de datos');
            $('#login-form-msg').removeClass('oculto');
        }
    });
}

$(document).ready(function(){
    $.post("login.php", function(response){
        //verificar sesion
        if(typeof response.data.token !== 'undefined' ){
            windows.location.href='perfil.html';
        }
    });
    $('#login-button').click(function(event){
        event.preventDefault();
        var usuario = $('#txtusuario').val();
        var password = $('#txtpassword').val();
        if (usuario ==''){
            //quitar la clase oculto del div de error de txtusuario
            $('#txtusuario+div').removeClass('oculto');
        }else{
            $('#txtusuario+div').addClass('oculto');
        }
        if (password==''){
            //quitar la clase oculto del div de error de txtpassword
            $('#txtpassword+div').removeClass('oculto');
        }else{
            $('#txtpassword+div').addClass('oculto');
        }
        if(usuario != '' && password !=''){
            login(usuario,password);
        }
    });
});
