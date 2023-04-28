
<?php


Class Paginacion{

  private $base;
  public $empezar_desde;
  public $tam_paginas;
  public $num_paginas;
  public $pag_actual;
  private $personas;

  public function __construct($nom_tabla, $reg_pagina){
    
    require_once("conectar.php");

    $this->base=Conectar::conexion();

    $this->personas=array();

    $consulta="SELECT * FROM $nom_tabla";

    $num_registros=$this->base->query($consulta)->rowCount();

    $this->tam_paginas= $reg_pagina;

    $this->empezar_desde=0;

    $this->pag_actual=1;

    $this->num_paginas=ceil($num_registros/$this->tam_paginas);

  }

  
  function mostrar_resultados($nom_tabla,$pagina){

    $this->pag_actual=$pagina;

    $this->empezar_desde=($this->pag_actual-1)*$this->tam_paginas;

    try{

        $consulta=$this->base->query("SELECT * FROM $nom_tabla ORDER BY ID ASC LIMIT $this->empezar_desde,$this->tam_paginas");

        while ($filas=$consulta->fetch(PDO::FETCH_ASSOC)){

            $this->personas[]=$filas;       
        }

        $consulta->closeCursor();

        return $this->personas;

        } catch (Exception $e) {

             die("Error " . $e->getMessage());
            echo "Linea del error " . $e->getline();
        }
    }

    function mostrar_links(){

        $links=array();

        for ($i=1; $i<=$this->num_paginas ; $i++){ 

            $links[]="<a class='enlaces' href='index.php?enlace=si&&tam=" . $this->tam_paginas . "&&pag=" . $i . "'>" . $i . "</a>";         
        }

        return $links;

     }

}

?>