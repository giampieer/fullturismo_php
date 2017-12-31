 <?php session_start();
 require_once '../Dao/tipoDao.php';
$datos=$_SESSION['data'];
?>
<html>
<head>
    <meta charset="UTF-8">
    <link type="text/css" href="" rel="stylesheet">
</head>
<body>

    <div class="container animated zoomIn" style="max-width: 500px;width: 100%;background-color: white;border-radius: 7px">
        <div class="row titulocontenedor" >
            <div class="col-lg-12 text-center" >
                <h3>MODIFICAR TIPO DE VIAJE</h3>
                <hr class="star-primary">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <form name="form" ><br>
                   
                  <div class="mens">
                    <?php
                    if(isset($_SESSION['mensaje'])){
                       $mensaje=$_SESSION['mensaje'];
                       
                       ?>
                       

                       <div class="alert alert-success animated bounceInRight" >
                          <button type="button"   style="background-color: #FB8C00"class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <strong ><?php echo  $mensaje?></strong>

                      </div> 
                      <?php  }  ?>
                  </div>
                  <?php foreach ($datos as $reg){?>
                  <div class="row control-group">
                      
                    <div class="form-group col-xs-12 floating-label-form-group controls">
                       <label>ID</label>
                       <input type="number" readonly="readonly" name="id" id="id" placeholder="ID" value="<?php echo $reg['id_tipo']?>"required>
                       <p class="help-block text-danger"></p>
                   </div>
               </div>
               <div class="row control-group">
                <div class="form-group col-xs-12 floating-label-form-group controls">
                 <label>NOMBRE</label>
                 <input type="text" name="nombre" id="nombre" placeholder="NOMBRE"value="<?php echo $reg['nombre']?>"required>
                 <p class="help-block text-danger"></p>
             </div>
         </div>
         <br>
         
         
         
         <br>
         <div id="success"></div>
         <center>
            <div class="row">
                <div class="form-group col-xs-12">
                    <input type="button" onclick="ModificarTipo('../Controlador')"  style="background-color: #FB8C00" value="modificar" class="btn btn-success btn-lg">
                </div>
                
            </div>
            <?php }?>
            
            <div class="row">
                <div class="form-group col-xs-12">
                    <input type="button" onclick="salir('../Controlador','Tipo',1,'')"  style="background-color: #FB8C00" value="salir" class="btn btn-success btn-lg">
                </div>
                
            </div> 
        </center>
    </form>
</div>
</div>
</div>
</body>
</html>

