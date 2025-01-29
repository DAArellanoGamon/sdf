<?php
    class usernameModel{
        private $PDO;
        public function __construct()
        {
            require_once("c://xampp/htdocs/proyecto/config/db.php");
            $con = new db();
            $this->PDO = $con->conexion();
        }
        public function insertar($nombre, $apellido_p, $apellido_m, $telefono, $calle, $colonia, $cp, $genero ){
            $stament = $this->PDO->prepare("INSERT INTO username VALUES(null,:nombre,:apellido_p,:apellido_m,:telefono,:calle,:colonia,:cp,:genero)");
            $stament->bindParam(":nombre",$nombre);
            $stament->bindParam(":apellido_p",$apellido_p);
            $stament->bindParam(":apellido_m",$apellido_m);
            $stament->bindParam(":telefono",$telefono);
            $stament->bindParam(":calle",$calle);
            $stament->bindParam(":colonia",$colonia);
            $stament->bindParam(":cp",$cp);
            $stament->bindParam(":genero",$genero);
            return ($stament->execute()) ? $this->PDO->lastInsertId() : false ;
        }
        public function show($id){
            $stament = $this->PDO->prepare("SELECT * FROM username where id = :id limit 1");
            $stament->bindParam(":id",$id);
            return ($stament->execute()) ? $stament->fetch() : false ;
        }
        public function index(){
            $stament = $this->PDO->prepare("SELECT * FROM username");
            return ($stament->execute()) ? $stament->fetchAll() : false;
        }
        public function update($id,$nombre){
            $stament = $this->PDO->prepare("UPDATE username SET nombre = :nombre WHERE id = :id");
            $stament->bindParam(":nombre",$nombre);
            $stament->bindParam(":id",$id);
            return ($stament->execute()) ? $id : false;
        }
        public function delete($id){
            $stament = $this->PDO->prepare("DELETE FROM username WHERE id = :id");
            $stament->bindParam(":id",$id);
            return ($stament->execute()) ? true : false;
        }
    }

?>