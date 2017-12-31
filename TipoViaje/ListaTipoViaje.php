<?php
session_start();
$lista = $_SESSION['list'];
?>

<html>
    <head>
        <title>Mantenimiento Tipo de Viaje</title>
    </head>
    <body>

        <div class=" animated zoomIn" >
            <div class="panel ">
                <div class="panel-heading titulocontenedor">
                    <h3 ><strong><center>Relacion de los Tipos de Viaje</center></strong></h3>  
                    <hr class="star-primary">
                </div>
                <div class="btntabla">
                    <input class="btn btn-success btn-lg" type="button"  style="background-color: #FB8C00" value="Nuevo" onclick="Menu('../Controlador', 'TipoViaje', 2, '')">              
                </div> <div class="container-fluid">
                    <div class="panel-body">                      
                        <div class="form-group text-center">
                            <div class="table-responsive ">
                                <?php
                                if (isset($_SESSION['mensaje'])) {
                                    $mensaje = $_SESSION['mensaje'];
                                    ?>
                                    <div class="alert alert-success animated bounceInRight" >
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <strong ><?php echo $mensaje ?></strong>

                                    </div> 
                                <?php } ?>
                                <table class="table table-hover" id="tabla"cellspacing="0" width="100%" >                 
                                    <thead >
                                        <tr >
                                            <th>ID</th>
                                            <th>Viaje</th>
                                            <th>Tipo de viaje</th>
                                            <th></th>
                                            <th></th>

                                        </tr>
                                    </thead>
                                    <tbody >
                                        <?php foreach ($lista as $re) { ?>
                                            <tr>
                                                <td><?php echo $re['idtipo_viaje']; ?></td>
                                                <td><?php echo $re['nombre']; ?></td>
                                                <td><?php echo $re['nombretipo'] ?></td>
                                                <td align="center"><input  class="animated infinite pulse" type="image" width="30px" src="../img/write.png" name="elegir"  onclick="cargar('../Controlador', 'TipoViaje', 4, 'cod=' +<?php echo $re['idtipo_viaje']; ?>)"></td>                 
                                                <td align="center"><input  class="animated infinite pulse" type="image" width="30px" src="../img/delete1.png" name="elegir"   onclick="eliminar('../Controlador', 'TipoViaje', 6, 'cod=' +<?php echo $re['idtipo_viaje']; ?>)"></td>                 


                                            <?php } ?>   
                                        </tr>
                                    </tbody>
                                </table>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

