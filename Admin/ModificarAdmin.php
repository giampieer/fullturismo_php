 <?php session_start();$id=$_SESSION['id'];
$nom=$_SESSION['nom'];
$usu=$_SESSION['usu'];
$clave=$_SESSION['contra'];
?>
<html>
<head>
   <title>
       Mantenimiento Administrador
   </title>
  
   
</head>

<body>
 
   
   <div class="container animated zoomIn" style="max-width: 500px;width: 100%;background-color: white;border-radius: 7px">
    <div class="row titulocontenedor" >
        <div class="col-lg-12 text-center" >
            <h3>MODIFICAR  ADMINISTRADOR</h3>
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
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <strong ><?php echo  $mensaje?></strong>

                  </div> 
                  <?php  }   ?>
              </div>
              
              <div class="row control-group">
                
                <div class="form-group col-xs-12 floating-label-form-group controls">
                    <label>ID</label>
                    <input type="number" readonly="readonly" name="id" id="id" value="<?php echo $id; ?>" placeholder="ID"required>
                    <p class="help-block text-danger"></p>
                </div>
            </div>
            <div class="row control-group">
                <div class="form-group col-xs-12 floating-label-form-group controls">
                 <label>NOMBRE:</label>
                 <input type="text" name="nombre" id="nombre" value="<?php echo $nom; ?>" placeholder="NOMBRE"required >
                 <p class="help-block text-danger"></p>
             </div>
         </div>
         <br>
         
         <div class="row control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
             <label>USUARIO:</label>
             <input type="text" name="usuario" id="usuario" value="<?php echo $usu; ?>" placeholder="USUARIO"required>
             <p class="help-block text-danger"></p>
         </div>
     </div>
     <div class="row control-group">
        <div class="form-group col-xs-12 floating-label-form-group controls">
           <label>CONTRASEÑA:</label>
           <input type="text" name="contraseña" id="contraseña" value="<?php echo $clave; ?>" placeholder="CONTRASEÑA"required>
           <p class="help-block text-danger"></p>
       </div>
   </div>
   
   
   
   <br>
   <div id="success"></div>
   <center>
    <div class="row">
        <div class="form-group col-xs-12">
            <input type="button" onclick="ModificarAdmin('../Controlador')" style="background-color: #FB8C00" value="modificar" class="btn btn-success btn-lg">
        </div>
        
        <div class="row">
            <div class="form-group col-xs-12">
                <input type="button" onclick="salir('../Controlador','Admin',2,'')" style="background-color: #FB8C00"value="salir" class="btn btn-success btn-lg">
            </div>
            
        </div> 
    </center>
</form>
</div>
</div>
</div>
</body>
</html>

