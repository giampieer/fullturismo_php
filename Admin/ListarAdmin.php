 <?php session_start();$lista=$_SESSION['lista'];
?>
<html>
<head>
    <title></title>

</head>
<body>

    
    
    
    <div class=" animated zoomIn" >
        <div class="panel ">
            <div class="panel-heading titulocontenedor">
                <h3 ><strong><center>Relacion de Administradores</center></strong></h3>  
                <hr class="star-primary">
            </div>
            <div class="btntabla">
                <input class="btn btn-success btn-lg" type="button" value="Nuevo" style="background-color: #FB8C00" onclick="Menu('../Controlador','Admin',3,'')" >              
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
                              <table class="table table-hover" id="tabla"cellspacing="0" width="100%" >                 
                                <thead >
                                    <tr >
                                       <th>ID</th>
                                       <th>NOMBRE</th>
                                       <th>USUARIO</th>
                                       <th>CONTRASEÑA</th>
                                       <th>modificar</th>
                                       <th>eliminar</th>
                                       
                                   </tr>
                               </thead>
                               <tbody >
                                 <?php
                                 foreach ($lista as $reg){
                                    
                                    ?>
                                    <tr>
                                        <td><?php echo $reg['idadmin']; ?></td>
                                        <td><?php echo $reg['nombre']; ?></td>
                                        <td><?php echo $reg['usuario_admin']; ?></td>
                                        <td><?php echo $reg['contra_admin']; ?></td>
                                        <td align="center"><input  class="animated infinite pulse" type="image" width="30px" src="../img/write.png" name="elegir"  onclick="cargar('../Controlador','Admin',6,'cod='+<?php echo $reg['idadmin'];?>)"></td>                 
                                        <td align="center"><input  class="animated infinite pulse" type="image" width="30px" src="../img/delete1.png" name="elegir"  onclick="eliminar('../Controlador','Admin',5,'cod='+<?php echo $reg['idadmin']; ?>)"></td>                 


                                        <?php } ?>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div></div></div></div>
                </div>
            </body>
            </html>

