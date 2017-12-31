 <?php session_start();
 $lista=$_SESSION['lista'];
?>

<html>
<head>
  <title>Mantenimiento de Precios</title>
</head>
<body>
 <div class=" animated zoomIn" >
  <div class="panel ">
    <div class="panel-heading titulocontenedor">
      <h3 ><strong><center>Relacion de los Precios</center></strong></h3>  
      <hr class="star-primary">
    </div>
    <div class="btntabla">
      <input class="btn btn-success btn-lg" type="button" value="Nuevo"  style="background-color: #FB8C00" onclick="Menu('../Controlador','Precio',2,'')" >              
    </div>         <div class="container-fluid">
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
          <table class="table table-hover" id="tabla"cellspacing="0" width="100%" >                 
            <thead >
              <tr >
               <th>ID</th>
               <th>PRECIO</th>
               <th>MONEDA</th>
               <th>DIAS</th>
               <th>LUGAR</th>
               <th>modificar</th>
               <th>eliminar</th>
               
             </tr>
           </thead>
           <tbody >
             <?php foreach ($lista as $re){?>
             <tr>
              <td><?php echo $re['idprecio']; ?></td>
              <td><?php echo $re['precio']; ?></td>
              <td><?php echo $re['tipo_moneda']; ?></td>
              <td><?php echo $re['dias']; ?></td>
              <td><?php echo $re['nombre_lugar']; ?></td>
              
              <td align="center"><input  class="animated infinite pulse" type="image" width="30px" src="../img/write.png" name="elegir"  onclick="cargar('../Controlador','Precio',5,'cod='+<?php echo $re['idprecio']; ?>)"></td>                 
              <td align="center"><input  class="animated infinite pulse" type="image" width="30px" src="../img/delete1.png" name="elegir"   onclick="eliminar('../Controlador','Precio',4,'cod='+<?php echo $re['idprecio']; ?>)"></td>                 

              <?php }?>   
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div></div></div></div>
  </html>

