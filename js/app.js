
function login(usuario,password){
    $.post("../login.php", { txtusuario:usuario, txtpassword:password }, function(data){
        return data;
    });
}

$(document).ready(function(){
    $('#login-button').click(function(event){
        event.preventDefault();
        var usuario = $('#txtusuario').val();
        var password = $('#txtpassword').val();
        login(usuario,password);
    });
});
