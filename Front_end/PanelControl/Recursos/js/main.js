if (sessionStorage.getItem('user') != null) {
    var UsuarioActual = jQuery.parseJSON(sessionStorage.getItem('user'));
    if (UsuarioActual[0]) {
        $('#contenido').load('../../Pagina/user.html');
    } else {
        $('#contenido').load('../../Pagina/setup.html');
    }
} else {
    $('#contenido').load('../../../../Front_end/PanelControl/Pagina/Login.html');
}

function Recargar(url) {
    location.href = url;
}