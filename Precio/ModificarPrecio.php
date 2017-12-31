 <?php session_start();
$datos=$_SESSION['dat'];
$datoslu=$_SESSION['datalu'];
?>
<html>
<head>
   
</head>
<body>

    
 <div class="container animated zoomIn" style="max-width: 500px;width: 100%;background-color: white;border-radius: 7px">
    <div class="row titulocontenedor" >
        <div class="col-lg-12 text-center" >
            <h3>MODIFICAR  PRECIO</h3>
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
                      <button type="button" class="close" data-dismiss="alert"  aria-hidden="true">&times;</button>
                      <strong ><?php echo  $mensaje?></strong>

                  </div> 
                  <?php  }  ?>
              </div>
              <?php foreach ($datos as $reg){?>
              <div class="row control-group">
                
                <div class="form-group col-xs-12 floating-label-form-group controls">
                    <label>ID</label>
                    <input type="number" readonly="readonly" name="id" id="id" placeholder="ID"value="<?php echo $reg['idprecio']?>"required>
                    <p class="help-block text-danger"></p>
                </div>
            </div>
            <div class="row control-group">
                <div class="form-group col-xs-12 floating-label-form-group controls">
                    <label>PRECIO</label>
                    <input type="number" name="precio" placeholder="PRECIO"id="precio" value="<?php echo $reg['precio']?>"required>
                    <p class="help-block text-danger"></p>
                </div>
            </div>
            <br>
            
            <div class="row control-group">
                <div class="form-group col-xs-12 floating-label-form-group controls">
                    <label>MONEDA</label>
                    <input type="text" name="moneda" id="moneda" placeholder="MONEDA" value="<?php echo $reg['tipo_moneda']?>"required>
                    <p class="help-block text-danger"></p>
                </div>
            </div>
            <div class="row control-group">
                <div class="form-group col-xs-12 floating-label-form-group controls">
                    <label>DIAS</label>
                    <input type="text" name="dias" id="dias" placeholder="DIAS" value="<?php echo $reg['dias']?>"required>
                    <p class="help-block text-danger"></p>
                </div>
            </div>
            <div class="row control-group">
                <div class="form-group col-xs-12 floating-label-form-group controls">
                  
                    <select name="lugar" id="lugar" class="form-control"required> 
                        <option value="<?php echo $reg['lugar_idlugar']?>"selected=><?php echo $reg['nombre_lugar']?></option>
                        <option value="0">---Seleccione lugar---</option>
                        <?php foreach ($datoslu as $rege){?>
                        <option value="<?php echo $rege['idlugar']?>"><?php echo $rege['nombre_lugar']?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            
            
            <br>
            <div id="success"></div>
            <center>
                <div class="row">
                    <div class="form-group col-xs-12">
                        <input type="button" onclick="ModificarPrecio('../Controlador')"  style="background-color: #FB8C00"value="modificar" class="btn btn-success btn-lg">
                    </div>
                    
                </div>
                <?php } ?>
                <div class="row">
                    <div class="form-group col-xs-12">
                        <input type="button" onclick="salir('../Controlador','Precio',1,'')"  style="background-color: #FB8C00"value="salir" class="btn btn-success btn-lg">
                    </div>
                    
                </div> 
            </center>
        </form>
    </div>
</div>
</div>
</body>
</html>

