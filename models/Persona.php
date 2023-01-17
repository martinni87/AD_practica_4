<?php
class Persona{
    private $id;
    private $dni;
    private $nombre;
    private $apellido1;
    private $apellido2;
    private $telefono;
    // private $sexo;
    private $user_id;

    //Constructor
    public function __construct($id = "", $dni = "", $nombre = "", $apellido1 = "", $apellido2 = "", $telefono = "", /*$sexo = "",*/ $user_id = ""){
        $this -> id = $id;
        $this -> dni = $dni;
        $this -> nombre = $nombre;
        $this -> apellido1 = $apellido1;
        $this -> apellido2 = $apellido2;
        $this -> telefono = $telefono;
        // $this -> sexo = $sexo;
        $this -> user_id = $user_id;
    }

    //Getters
    public function getId(){
        return $this -> id;
    }
    public function getDni(){
        return $this -> dni;
    }
    public function getNombre(){
        return $this -> nombre;
    }
    public function getApellido1(){
        return $this -> apellido1;
    }
    public function getApellido2(){
        return $this -> apellido2;
    }
    public function getTelefono(){
        return $this -> telefono;
    }
    // public function getSexo(){
    //     return $this -> sexo;
    // }
    public function getUser_id(){
        return $this -> user_id;
    }

    //Setters
    public function setId($id){
        $this -> id = $id;
    }
    public function setDni($dni){
        $this -> dni = $dni;
    }
    public function setNombre($nombre){
        $this -> nombre = $nombre;
    }
    public function setApellido1($apellido1){
        $this -> apellido1 = $apellido1;
    }
    public function setApellido2($apellido2){
        $this -> apellido2 = $apellido2;
    }
    public function setTelefono($telefono){
        $this -> telefono = $telefono;
    }
    // public function setSexo($sexo){
    //     $this -> sexo = $sexo;
    // }
    public function setUser_id($user_id){
        $this -> user_id = $user_id;
    }
}

?>