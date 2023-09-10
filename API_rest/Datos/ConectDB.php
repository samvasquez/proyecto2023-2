<?php

require_once '../Datos/Settings.php';

class ConectDB 
{
 private static $db =null;

 private static  $pdo;
 final private function __construct()
 { try {
    self ::obtenerDB();
 } catch (PDOException $e) {

 }


 }

 public static function obtenerInstancia (){

    if (self::$db == null){
        self ::$db =new self();
    }
    return self :: $db;

 }
 public function obternerDB(){
    self ::$pdo=new PDO(
        'mysqldbname=' . BASE_DE_DATOS.
        ';host='.NOMBRE_HOST.';',
        USUARIO,
        CONTRASEÑA,
        array(PDO::MYSQL_ATTR_INIT_COMAND=>"SET NAMES utf8"));

        self :: $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return self::$pdo;

 }
final protected function __clone(){

}
function __destructor (){
    self ::$pdo =null;
}
}

?>