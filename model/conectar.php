
<?php
//Atributos=las variables
//los metodos=funciones
//protected->los q heredan pueden usar los metodos; private-> solo pueden usar los metodos dentro de la clase

Class Conectar{

      public static function conexion(){//static para llamar directamente a la clase xq es un metodo de la clase__ej: Conectar::conexion ____no hace falta objeto para llamar a la clase, se puede llamar a la clase y acceder al metodo a partir de los dos punto ::

        try{

          $conexion=new PDO("mysql:host=localhost; dbname=pruebas", "root", "iusenma");
          $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $conexion->exec("SET CHARACTER SET utf8");;
          

        }catch(Exception $e){
          die ("Se ha producido el error: " . $e->getMessage());
          echo "Línea del error: " . $e->getLine();
        }

        return $conexion;
      }

}



?>