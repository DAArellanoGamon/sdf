<?php
    require_once("c://xampp/htdocs/proyecto/controller/usernameController.php");
    $obj = new usernameController();
    $obj->update($_POST['id'],$_POST['nombre'],$_POST['apellido_p'],$_POST['apellido_m'],$_POST['telefono'],$_POST['calle'],$_POST['colonia'],$_POST['cp'],$_POST['genero']);

?>