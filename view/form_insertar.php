
  
  <div id="form_insertar">

    <form action="<?php $_SERVER['PHP_SELF']?>" method="GET">
  
      <label for="nombre">Nombre:</label>
        <input type="text" name="nombre">
      <label for="apellido1">Primer apellido:</label>
        <input type="text" name="apellido1">
      <label for="apellido2">Segundo apellido:</label>
       <input type="text" name="apellido2">
      <label for="provincia">Provincia:</label>
       <input type="text" name="provincia">
      <input type="submit" name="insertar" value="Insertar">
      <input type="reset" name="cancelar" value="Cancelar">
  
    </form>
  
  </div>
