 <?php session_start();    require_once '../Dao/AdminDAO.php';
    $obj= new AdminDAO();
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
                <h3>REGISTRAR  ADMINISTRADOR</h3>
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
                    <?php 
                    $i=$obj->GenerarCodigo();
                    if($i==0){
                       $i=1;
                   }else{
                       $i=$obj->GenerarCodigo();
                   }
                   ?>
                   <div class="form-group col-xs-12 floating-label-form-group controls">
                    <label>ID</label>
                    <input type="number" readonly="readonly" name="id" placeholder="ID" id="id" value="<?php echo $i ?>" placeholder="ID">
                    <p class="help-block text-danger"></p>
                </div>
            </div>
            <div class="row control-group">
                <div class="form-group col-xs-12 floating-label-form-group controls">
                 <label>NOMBRE:</label>
                 <input type="text" name="nombre" placeholder="Nombre" id="nombre" placeholder="NOMBRE"required>
                 <p class="help-block text-danger"></p>
             </div>
         </div>
         <br>
         
         <div class="row control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
             <label>USUARIO:</label>
             <input type="text" name="usuario" placeholder="Usuario"id="usuario" placeholder="USUARIO"required>
             <p class="help-block text-danger"></p>
         </div>
     </div>
     <div class="row control-group">
        <div class="form-group col-xs-12 floating-label-form-group controls">
           <label>CONTRASEÑA:</label>
           <input type="text" name="contraseña"placeholder="Contraseña" id="contraseña" placeholder="CONTRASEÑA"required>
           <p class="help-block text-danger"></p>
       </div>
   </div>
   
   
   
   <br>
   <div id="success"></div>
   <center>
    <div class="row">
        <div class="form-group col-xs-12">
            <input type="button" onclick="GrabarAdmin('../Controlador')" value="grabar"  style="background-color: #FB8C00"class="btn btn-success btn-lg">
        </div>
        
    </div>
    <div class="row">
        <div class="form-group col-xs-12">
            <input type="button" onclick="salir('../Controlador','Admin',2,'')" value="salir"  style="background-color: #FB8C00"class="btn btn-success btn-lg">
        </div>
        
    </div> 
</center>
</form>
</div>
</div>
</div>
</body>
</html>

