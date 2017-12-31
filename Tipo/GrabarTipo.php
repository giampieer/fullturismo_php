 <?php session_start();require_once '../Dao/tipoDao.php';
$objdao=new tipoDao();
?>

<html>
<head>
   
</head>
<body>
    
    
    <div class="container animated zoomIn" style="max-width: 500px;width: 100%;background-color: white;border-radius: 7px">
        <div class="row titulocontenedor" >
            <div class="col-lg-12 text-center" >
                <h3>REGISTRAR  TIPO DE VIAJE</h3>
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
                      <?php $i=$objdao->GenerarCodigo();
                      if($i==0){
                        $i=1;
                    }else{
                        $i=$objdao->GenerarCodigo();
                    }
                    
                    ?>
                    <div class="form-group col-xs-12 floating-label-form-group controls">
                       <label>ID</label>
                       <input type="number" readonly="readonly" name="id" id="id" value="<?php echo $i?>">
                       <p class="help-block text-danger"></p>
                   </div>
               </div>
               <div class="row control-group">
                <div class="form-group col-xs-12 floating-label-form-group controls">
                 <select name="nombre" id="nombre" class="form-control"required>
                     <option value="0">seleccione</option>
                     <option value="nacional">nacional</option>
                     <option value="internacional">internacional</option>
                 </select>
             </div>
         </div>
         <br>
         
         
         
         <br>
         <div id="success"></div>
         <center>
            <div class="row">
                <div class="form-group col-xs-12">
                    <input type="button" onclick="grabarTipo('../Controlador')"  style="background-color: #FB8C00"value="grabar" class="btn btn-success btn-lg">
                </div>
                
            </div>
            <div class="row">
                <div class="form-group col-xs-12">
                    <input type="button" onclick="salir('../Controlador','Tipo',1,'')"  style="background-color: #FB8C00"value="salir" class="btn btn-success btn-lg">
                </div>
                
            </div> 
        </center>
    </form>
</div>
</div>
</div>
</body>
</html>


