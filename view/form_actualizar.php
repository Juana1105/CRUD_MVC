
<?php

foreach($usuario as $valor){

?>
    <div id="form_actualizar">
    <form action="<?php $_SERVER['PHP_SELF']?>" method="GET">


        <input type="hidden" name="id" value="<?php echo $valor['ID'] ?>">

        <label for="nombre">Nombre:</label>
          <input type="text" name="nombre" value="<?php echo $valor['NOMBRE'] ?>">
        <label for="apellido1">Primer apellido:</label>
          <input type="text" name="apellido1" value="<?php echo $valor['APELLIDO1'] ?>">
        <label for="apellido2">Segundo apellido:</label>
         <input type="text" name="apellido2" value="<?php echo $valor['APELLIDO2'] ?>">
        <label for="provincia">Provincia:</label>
          <input type="text" name="provincia" value="<?php echo $valor['PROVINCIA'] ?>">

        <input type="submit" name="guardar" value="Guardar">
        <input type="submit" name="cancelar" value="Cancelar">

    </form>
    </div>


<?php
}
?>


