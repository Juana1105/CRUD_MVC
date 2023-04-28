<?php

  require_once("model/personas_model.php");
  require_once("model/paginacion.php");

  $persona=new Personas_model();


  
   //----------BORRAR---------
    if(isset($_GET["borrar"])){//si pulsa el boton de borrar:
      $persona->set_id($_GET['param_ID']);//SET ID NECESITA UN PARAMETRO, y este va a ser el que se coja de la URL con el param_ID=$referencia["ID"]
      $persona->borrar_personas();

      // if($persona){//para que me redirija cuando haya dado a borrar
      //   header("Location:index.php");
      // }
    }
  //----------INSERTAR---------
    if(isset($_GET["insertar"])){
      $persona->set_nombre($_GET["nombre"]);
      $persona->set_apellido1($_GET["apellido1"]);
      $persona->set_apellido2($_GET["apellido2"]);
      $persona->set_provincia($_GET["provincia"]);

      $persona->insertar_personas();
      
      $pagina_final= new Paginacion("datos_usuarios",3);

      header("Location: index.php?enlace=si&&tam=3&&pag=" . $pagina_final->num_paginas);



      // if($_GET["insertar"]){
      //   header("Location:index.php");
      // }
    }

  //---------ACTUALIZAR  Y  GUARDAR--------
    if(isset($_GET["actualizar"])){

      $persona_actualizar= new Personas_model();
      $persona_actualizar->set_id($_GET['param_ID']);
      $usuario=$persona_actualizar->get_usuario();
    }
    if(isset($_GET["guardar"])){

      $persona_guardar= new Personas_model();
      $persona_guardar->set_id($_GET['id']);

      $persona_guardar->set_nombre($_GET["nombre"]);
      $persona_guardar->set_apellido1($_GET["apellido1"]);
      $persona_guardar->set_apellido2($_GET["apellido2"]);
      $persona_guardar->set_provincia($_GET["provincia"]);
      $persona_guardar->actualizar_personas();

      // if($_GET["guardar"]){
      //   header("Location:index.php");
      // }
    }

      if(isset($_GET["cancelar"])){
        header("Location:index.php");
      }

    
    
      if(isset($_GET["enlace"])){

        $paginacion=new Paginacion("datos_usuarios",$_GET["tam"]);
                    
        $registros=$paginacion->mostrar_resultados("datos_usuarios",$_GET["pag"]);

    }else{

        if(isset($_GET["seleccionar"])){

            $paginacion=new Paginacion("datos_usuarios",$_GET["paginacion"]);

            $registros=$paginacion->mostrar_resultados("datos_usuarios",1);

        } else {

            $paginacion=new Paginacion("datos_usuarios",3);

            $registros=$paginacion->mostrar_resultados("datos_usuarios",1);

        }


    }

$array_links=$paginacion->mostrar_links();

  require_once("view/personas_view.php");

?>