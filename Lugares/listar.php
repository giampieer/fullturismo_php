

 <?php session_start();
 
 $lista=$_SESSION['lista'];
$id=$_SESSION['codigo'];

?>
<html>
<head>


</head>
<body>

  
  <div class=" animated zoomIn" >
    <div class="panel ">
      <div class="panel-heading titulocontenedor">
        <h3 ><strong><center>Relacion de los Lugares</center></strong></h3>  
        <hr class="star-primary">
      </div>
      <div class="btntabla">
          <input class="btn btn-success btn-lg" type="button" style="background-color: #FB8C00"value="Nuevo"onclick="Menu('../Controlador','Lugar',2,'cod='+<?php echo $id?>)" >              
      </div>
      <div class="container-fluid">
        <div class="panel-body">                      
          <div class="form-group text-center">
            <div class="table-responsive ">
             <?php
             if(isset($_SESSION['mensaje'])){
               $mensaje=$_SESSION['mensaje'];
               
               ?>
               <div class="alert alert-success animated bounceInRight" >
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong ><?php echo  $mensaje?></strong>

              </div> 
              <?php  }   ?>
              <?php
              foreach ($lista as $reg ){
               ?>
               <div class="container-a4">
                <ul class="caption-style-4">
                  <li>
                    <img height="300px" width="400"src="data:image/jpg;base64,<?php echo base64_encode( $reg['imagen_lugar'] );?>">
                    <div class="caption">
                     <div class="blur"></div>
                     <div class="caption-text">
                      <h1>LUGAR :<?php echo $reg['nombre_lugar']  ;?></h1>
                      <p>DESCRIPCION :<?php echo $reg['descripcion_lugar'] ; ?></p>
                      <input  class="animated infinite pulse"type="image" width="30px" src="../img/write.png" name="elegir" onclick="eliminar('../Controlador','Lugar',5,'cod='+<?php echo $reg['idlugar']; ?>)">
                      <input  class="animated infinite pulse"type="image" width="30px" src="../img/delete1.png"  onclick="eliminar('../Controlador','Lugar',4,'cod='+<?php echo $reg['idlugar']; ?>+'&codadmin='+<?php echo $id?>)">
                    </div>
                  </div>
                </li>    
              </ul>
            </div>
            <?php    }   ?>             </div>
          </div></div></div></div>
        </div>
      </body>
      </html>