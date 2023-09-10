var usuarioActual = JSON.parse(sessionStorage.getItem('User'));



$('#IniciarSesion').click(function(e) {
    e.preventDefault();
    alerta = '';
    data = {
        username : $('#luser').val(),
        clave    : $('#lpass').val()
    };

    
        console.log('ingresamos');
        console.log(data);
        alert(JSON.stringify(data));
    

    $.post('../../../../API_rest/Controladores/User.php/Logear',
    {datos: data},
    function (res) {
        if( res.estado == 1 ) {
            alerta  = '<div class="alert alert-success alert-dismissible" role="alert"';
            alerta += '<button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>';
            alerta += res.mensaje + '</div>';
            sessionStorage.setItem('user',JSON.stringify(res.usuarios));
            Recargar('PanelControl');
         } else {
            alerta  = '<div class="alert alert-danger alert-dismissible" role="alert"';
            alerta += '<button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>';
            alerta += res.mensaje + '</div>';
        }
        $('#alertas').html('');
        $('#alertas').append(alerta);
        
    });
    

});

$('#Registro').click(function(e) {
    e.preventDefault();
    if (!($('#nUser').val() == '' || $('#nPass').val() == '')) {
        alerta = '';
        data = {
            username : $('#nUser').val(),
            clave    : $('#nPass').val(),
            email : $('#nemail') .val()  
        }

        console.log('registrado');
        console.log(data);
        alert(JSON.stringify(data))

        console.log(data);
        $.post('API_rest/Controladores/User.php/Registrar',
        {datos: data},
        function(res){
            if( res.estado == 1 ) {
                alerta  = '<div class="alert alert-success alert-dismissible" role="alert"';
                alerta += '<button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>';
                alerta += res.mensaje + '</div>';
             } else {
                alerta  = '<div class="alert alert-danger alert-dismissible" role="alert"';
                alerta += '<button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>';
                alerta += res.mensaje + '</div>';
            }
            $('#alertass').html('');
            $('#alertass').append(alerta);            
        });
        return false;
    }
});