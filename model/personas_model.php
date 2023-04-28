

<?php

// require "paginacion.php";


Class Personas_model{

  private $base;

  private $personas; 

  private $id;
  private $nombre;
  private $apellido1;
  private $apellido2;
  private $provincia;

  public function __construct(){

    require_once("conectar.php");//require_once-> se requiere UNA VEZ

    $this->base=Conectar::conexion();

    $this->personas=array();
  }


  public function get_id(){
    return $this->id;
  }
  public function get_nombre(){
    return $this->nombre;
  }
  public function get_apellido1(){
    return $this->apellido1;
  }
  public function get_apellido2(){
    return $this->apellido2;
  }
  public function get_provincia(){
    return $this->provincia;
  }


  public function get_personas(){

    try{


      $consulta=$this->base->query("SELECT * FROM datos_usuarios ORDER BY ID ASC");

      while($filas=$consulta->fetch(PDO::FETCH_ASSOC)){//se guarda la consulta en $fila

        $this->personas[]=$filas;//guardamos en el array productos la consulta de filas
      }

      $consulta->closeCursor();//cuando haces el return sales de la funcion, asi que cerramos con el closeCursor antes de que salga

      return $this->personas; //$this es igual a $objeto1=new Productos_model; ES ESE OBJETO CREADO

    }catch(Exception $e){
      
      die ("Se ha producido el error: " . $e->getMessage());
      echo "Línea del error: " . $e->getLine();
    }
  }

  public function get_usuario(){

    try{

      $consulta=$this->base->query("SELECT * FROM datos_usuarios WHERE ID=$this->id");

      while($filas=$consulta->fetch(PDO::FETCH_ASSOC)){
        $this->personas[]=$filas;
      }

      $consulta->closeCursor();
      return $this->personas; 

    }catch(Exception $e){
      die ("Se ha producido el error: " . $e->getMessage());
      echo "Línea del error: " . $e->getLine();
    }
  }



  public function set_id($param_id){
    $this->id=$param_id;
  }
  public function set_nombre($param_nombre){
    $this->nombre=$param_nombre;
  }
  public function set_apellido1($param_apellido1){
    $this->apellido1=$param_apellido1;
  }
  public function set_apellido2($param_apellido2){
    $this->apellido2=$param_apellido2;
  }
  public function set_provincia($param_provincia){
    $this->provincia=$param_provincia;
  }


  public function borrar_personas(){//parecido a un SETTER

    try{

      $consulta=$this->base->query("DELETE FROM datos_usuarios WHERE ID=$this->id");

      $consulta->closeCursor();

    }catch(Exception $e){

      die ("Se ha producido el error: " . $e->getMessage());
      echo "Línea del error: " . $e->getLine();
    }
  }

  public function insertar_personas(){

    try{

      $consulta="INSERT INTO datos_usuarios (NOMBRE, APELLIDO1, APELLIDO2, PROVINCIA) VALUES (:nombre, :apellido1, :apellido2, :provincia)";

      $resultados=$this->base->prepare($consulta);
      
      //$resultados directamente execute porque ya es un objeto
      $resultados->execute(array(":nombre"=>$this->nombre, ":apellido1"=>$this->apellido1, ":apellido2"=>$this->apellido2, ":provincia"=>$this->provincia));

      $resultados->closeCursor();//cerramos resultados porque es el objeto que contiene el array

    }catch(Exception $e){
      die ("Se ha producido el error: " . $e->getMessage());
      echo "Línea del error: " . $e->getLine();
    }
  }

  public function actualizar_personas(){

    try{

      $consulta="UPDATE datos_usuarios SET NOMBRE=:nombre, APELLIDO1=:apellido1, APELLIDO2=:apellido2, 
      PROVINCIA=:provincia
      where ID=$this->id";
    
    $resultados=$this->base->prepare($consulta);
    
    $resultados->execute(array(":nombre"=>$this->nombre, ":apellido1"=>$this->apellido1, ":apellido2"=>$this->apellido2, ":provincia"=>$this->provincia));

    $resultados->closeCursor();

    }catch(Exception $e){
      die ("Se ha producido el error: " . $e->getMessage());
      echo "Línea del error: " . $e->getLine();
    }
  }



}

?>