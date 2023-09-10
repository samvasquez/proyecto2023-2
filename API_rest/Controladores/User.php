<?php

require_once 'Datos/ConectDB.php';

class User

{

public $respuesta =null;

function __construct($peticion){

    switch ($peticion[0]) {
        case 'Mostrar':
           return self :: Mostrar ($this);
           break;
        case 'Registrar':
            return self ::Registrar($this);
            break;
        case 'Actualizar':
            return self:: Actualizar ($this);

            break;
        case 'Logear':
            return self::Logear($this);
            break;


        default:
            $this ->respuesta =array(
                
                
                'mensaje'=>'no se reconoce la peticion'
            );
        
    }
}

private static function mostrar ($obj){

    $pdo = ConectDB::obtenerInstancia()->obtenerDB();
    
    $sql ="SELECT
          users_credential. ID_user as usuario,
          users_credential.password_user_2 as clave 2,
          users_credential.password as clave 1,
          users_credential.name_user2 as nombre_cliente2
          FROM
          users_credential";
    $sentencia =$pdo ->preparre($sql);
    
    if ($sentencia->execute()){
        $resultado =$sentencia->fecthAll (PDO::FECTH_ASSOC);
        if ($resultado){
            $obj->respuesta =array(
                'estado'=> 1,
                "user_credential"=> $resultado
            );

        }else {
            $obj->respuesta =array (
                'estado'=>2,
                'mensaje'=>'unkwonm'
            );
        }
    }
    }
    
    private static function Registrar ($obj)
    {
        $usuario =$_POST['datos'];

        $pdo=conectDB::obtenerInstancia()->obtenerDB();

        $validar ="SELECT
        u. ID_user,
        u.password,
        u.email
        FROM
        user
        WHERE
        u.ID_user'" .$usuario['username']."' and 
        u.password= '" . $usuario['password'] ."' and 
        u.email= '" . $usuario['email'] ;



        $sentenciaVerificarUsuario=$pdo->prepare($validar);

        if ($sentenciaVerificarUsuario->execute()){
            $respuestaVerificarUsuario=$sentenciaVerificarUsuario->fetch(PDO::FECTH_OBJ);
            if ($respuestaVerificarUsuario){
                $obj->respuesta =array(
                    'estado'=>2,
                    'mensaje'=>'registro existente'
                );
            }else{
                $registro="INSERT INTO
                user(user.ID_user,user.password,user.email)
                VALUES(?,?,?)";

                $sentencia=$pdo->prepare($registro);
                $sentencia->bindparam(1,$usuario['ID_user']);
                $sentencia->bindparam(1,$usuario['password']);
                $sentencia->bindparam(1,$usuario['email']);

                $resultado=$sentencia->execute();
               if ($resultado){
                  $obj->resultado=array(
                'estado'=>1,
                'mensaje'=>'usuario registrado'
                   );
               }
    
              
            }


        }else {

            $obj->respuesta =array (
                'estado'=>2,
                'mensaje'=>'ERROR'
            );
        }

    }
    private static function Actualizar ($obj)
    {
        $usuario=$_POST['datos'];
        $pdo = conectDB::obtenerInstancia()-> obtenerDB();

        $sqlUpdate="UPDATE
                    user_credential
                    SET
                    users_credential.password  =? ,
                    users_credential.name_user2=?
                    WHERE
                    user_credential.ID_user =?";
        
        $sentencia=$pdo->prepare($sqlUpdate);
        $sentencia->bindparam(1,$usuario['name_user2']);
        $sentencia->bindparam(1,$usuario['password']);

        $resultado=$sentencia->execute();
        if ($resultado){
           $obj->resultado=array(
         'estado'=>1,
         'mensaje'=>'usuario actualizado'
            );
        }else{
            $obj->respuesta = array (
                'estado' => 2,
                'mensaje' => "Error Inesperado."
            );

        }
    }

    private static function Logear($obj) {
        $usuario = $_POST['datos'];
        
        $pdo = ConexionDB::obtenerInstancia()->obtenerDB();
        $sql = "SELECT 
                u.ID_user, 
                u.password, 
                FROM 
                user as u 
                WHERE 
                u.ID_user = '" . $usuario['username'] . "' and 
                u.password= '" . $usuario['password'] ;

        $sentencia = $pdo->prepare($sql);

        if ($sentencia->execute()) {
            $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            if ($resultado) {
                $obj->respuesta = array (
                    
                    'mensaje' => 'Bienvenidos',
                    'usuarios' => $resultado
                );
              } else {
                $obj->respuesta = array (
                    
                    'mensaje' => "Error de autenticación, usuario o contraseña incorrecta."
                );
            }
          } else {
            $obj->respuesta = "sin respuesta";
        }
    }

}

?>


       
     



    






?>