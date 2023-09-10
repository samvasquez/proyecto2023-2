<?php

require_once '../API_rest/Controladores/User.php';

header('content-type:Application/json;charset=utf-8');
header('Access-Control-Allow-origin :*');
header('Access-Control-Allor-Methods:POST');

$respuesta;
$instancia;

if (isset($_GET['PATH_INFO'])){

    $peticion=explode('/',$_GET['PATH_INFO']);
    $recurso=array_shift($peticion);

    $recursosExistentes =array (
        'User',
        'Setup_User',
        'Driver',
        'Store_Network'
    );
    if (in_arrray($recurso,$recursosExistentes)){

        $metodo =strtlower ($_SERVER['REQUEST_METHOD']);

        if ($metodo == 'post'){
            switch ($recurso) {
                case 'User':
                    $instancia=new User($peticion);
                    break;
                case'Setup_User':
                    $instancia =new Setup_User($peticion);
                    break;
                case 'Driver':
                    $instancia =new Driver ($peticion);
                    break;
                case 'Store_Network':
                    $instancia =new Store_Network ($peticion);
                    break;

                
            }
            $respuesta =$instancia->respuesta;
        }else{
            $respuesta =array (
                'estado'=>1,
                'mensaje'=>'no se reconoce el metodo'
            );

        }


    }else {
        $respuesta = array (
            'estado'  => 2,
            'mensaje' => 'No se reconocio el recurso'
        );
    }

}else {
    $respuesta = array(
        'estado'  => 2,
        'mensaje' => 'No se reconocio la petición'
    );
}

print(json_encode($respuesta));



?>