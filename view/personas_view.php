<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <style>

  *{
    margin:0;
    padding:0;
    box-sizing: border-box;
    
  }
  table{
    width:80%;
    margin: 0 auto;
    border: 2px solid blue;
    margin-top: 4rem;
  }
  tbody tr{
    background-color: rgb(150,210,210);
    border-top-left-radius: 15px;
    border-top-right-radius: 15px;
  }
  tbody tr:last-child{
    background-color: rgb(150,210,210);
    border-top-left-radius: 15px;
    border-top-right-radius: 15px;
  }
  tbody tr:nth-child(odd){
    background-color: rgb(26,163,103);
  }
  td{
    padding: 5px;
    text-align: center;
  }
  #codigo{
    color: rgb(100,19,19);
    font-weight: bold;
  }
  thead{
    background-color: rgb(4,49,60);
    color: white;
    font-size: 20px;
  }
  #form_actualizar{
    width: 90%;
    margin: 0 auto;
    background-color: rgb(32,139,149);
    margin-top: 2rem;
    color: white; 
    font-size: 20px;
    width: 200px;
  }
  #form_insertar{
    width: 90%;
    margin: 0 auto;
    background-color: rgb(4,89,60);
    margin-top: 2rem;
    color: white; 
    font-size: 20px;
    width: 200px;
  }
  #form_actualizar label{
    margin-bottom: 20px;
  }
  #form_insertar label{
    margin-bottom: 20px;
  }
  div input[type="submit"]{
    padding: 10px;
    position: relative;
    /* top: 30px;
    left: 200px; */

  }
  div input[type="reset"]{
    padding: 10px;
    /* top: 30px;
    left: 200px; */
    
  } 
  #enlace{
            /* margin-left:46%; */
            width:100%;
            clear: left;
      display: inline-block;
      text-align: center;
      text-decoration: none;
      margin: 0 auto;
      font-size: 18px;
      font-weight: bold;
      padding: 0.2em 0.5em;
      color: navy;
      margin-top: 2rem;

        }
   

  </style>


</head>
<body>





<?php 

  if(isset($_GET["actualizar"])){
    include "view/form_actualizar.php";
  }else{
    include "view/form_insertar.php";
  }

?>

<form action="<?php $_SERVER['PHP_SELF']?>" method="GET">
    <select name="paginacion" id="paginacion">
        <option value="3">Selecciona</option>
        <option value="5">5</option>
        <option value="7">7</option>
        <option value="10">10</option>
    </select>
    <input type="submit" value="Seleccionar" name="seleccionar">
</form>





  <table>

    <thead>
      <tr>
        <td>ID</td>
        <td>Nombre</td>
        <td>Primer Apellido</td>
        <td>Segundo Apellido</td>
        <td>Provincia</td>
        <td></td>
      </tr>
    </thead>
 
    <tbody>
      <?php foreach($registros as $referencia){?>
      <tr>
        <td id="codigo"><?php echo $referencia['ID']?></td>
        <td><?php echo $referencia['NOMBRE']?></td>
        <td><?php echo $referencia['APELLIDO1']?></td>
        <td><?php echo $referencia['APELLIDO2']?></td>
        <td><?php echo $referencia['PROVINCIA']?></td>
        <td>
 
          <a href="<?php $_SERVER['PHP_SELF']?>?borrar=si&&param_ID=<?php echo $referencia["ID"]?>"><input type="button" value="Borrar"></a>

          <a href="<?php $_SERVER['PHP_SELF']?>?actualizar=si&&param_ID=<?php echo $referencia["ID"]?>"><input type="button" value="Actualizar"></a>

       
        </td>
      </tr> 

      <?php
      }
      ?>
    </tbody>


  </table>


  <div id="enlace">

<?php

for ($i=0; $i<count($array_links); $i++) { 
        
        echo $array_links[$i] . " ";
    }

  ?>

</div>



</body>
</html>