 <?php session_start();require_once '../Dao/PrecioDao.php';
$objdao=new PrecioDao();
$datos=$_SESSION['data'];
?>

<html>

<body>

    
    
    
 <div class="container animated zoomIn" style="max-width: 500px;width: 100%;background-color: white;border-radius: 7px">
    <div class="row titulocontenedor" >
        <div class="col-lg-12 text-center" >
            <h3>REGISTRAR  PRECIO</h3>
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
                    <input type="number" readonly="readonly" placeholder="ID"name="id" id="id" value="<?php echo $i?>"required>
                    <p class="help-block text-danger"></p>
                </div>
            </div>
            <div class="row control-group">
                <div class="form-group col-xs-12 floating-label-form-group controls">
                    <label>PRECIO</label>
                    <input type="number" name="precio" id="precio" placeholder="PRECIO"required>
                    <p class="help-block text-danger"></p>
                </div>
            </div>
            <br>
            
            <div class="row control-group">
                <div class="form-group col-xs-12 floating-label-form-group controls">
                    <label>MONEDA</label>
                    <input type="text" name="moneda" id="moneda" placeholder="MONEDA"required>
                    <p class="help-block text-danger"></p>
                </div>
            </div>
            <div class="row control-group">
                <div class="form-group col-xs-12 floating-label-form-group controls">
                    <label>DIAS</label>
                    <input type="text" name="dias" id="dias" placeholder="Dias"required>
                    <p class="help-block text-danger"></p>
                </div>
            </div>
            <div class="row control-group">
                <div class="form-group col-xs-12 floating-label-form-group controls">
                  
                  <select name="lugar" id="lugar" class="form-control"required>
                    <option value="0">Seleccione Lugar</option>
                    <?php foreach ($datos as $reg){?>
                    <option value="<?php echo $reg['idlugar']?>"><?php echo $reg['nombre_lugar']?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        
        
        <br>
        <div id="success"></div>
        <center>
            <div class="row">
                <div class="form-group col-xs-12">
                    <input type="button" onclick="grabarPrecio('../Controlador')" value="grabar"  style="background-color: #FB8C00" class="btn btn-success btn-lg">
                </div>
                
            </div>
            <div class="row">
                <div class="form-group col-xs-12">
                    <input type="button" onclick="salir('../Controlador','Precio',1,'')" value="salir"  style="background-color: #FB8C00" class="btn btn-success btn-lg">
                </div>
                
            </div> 
        </center>
    </form>
</div>
</div>
</div>
</body>
</html>



