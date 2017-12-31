<?php
session_start();
$datos = $_SESSION['data'];
$codi = $_SESSION['codigo'];
$dat = $_SESSION['da'];
$datosimage = $_SESSION['datosimage'];
?>
<html>
    <head>
        <title></title>
    </head>
    <body>

        <script>

            function ocultar_imagen() {
                img = document.getElementById("img");
                $('#img').css({'width': '0px', 'height': '0px'});
                img.style.visibility = "hidden";
            }</script>


        <div class="container animated zoomIn" style="max-width: 500px;width: 100%;background-color: white;border-radius: 7px">
            <div class="row titulocontenedor" >
                <div class="col-lg-12 text-center" >
                    <h3>MODIFICAR LUGAR</h3>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <form name="form" enctype="multipart/form-data" id="enviarimagenes"method="POST"><br>

                        <div class="mens">
                            <?php
                            if (isset($_SESSION['mensaje'])) {
                                $mensaje = $_SESSION['mensaje'];
                                ?>                       
                                <div class="alert alert-success animated bounceInRight" >
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <strong ><?php echo $mensaje ?></strong>

                                </div> 
                            <?php } ?>
                        </div>
                        <?php foreach ($datos as $reg) { ?>
                            <div class="row control-group">

                                <div class="form-group col-xs-12 floating-label-form-group controls">
                                    <label>ID</label>
                                    <input maxlength="20" type="text" readonly="readonly" class="form-control" name="idlugar" id="idlugar" value="<?php echo $reg['idlugar'] ?>" placeholder="&#128273; Usuario" required>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="row control-group">
                                <div class="form-group col-xs-12 floating-label-form-group controls">
                                    <label>NOMBRE</label>
                                    <input maxlength="20" type="text" class="form-control" name="nombre" id="nombre" value="<?php echo $reg['nombre_lugar'] ?>" placeholder="NOMBRE"required>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <br>
                            <div class="row control-group">
                                <div class="form-group col-xs-12 floating-label-form-group controls">
                                    <label>IMAGEN</label>
                                    <input  type="file" class="form-control" name="imagen" id="imagen" accept="image/*" placeholder="IMAGEN" required>
                                    <p class="help-block text-danger"></p>

                                </div>
                                <center>  <img  height="150px" width="200" class="img-circle" id="img" src="data:image/jpg;base64,<?php echo base64_encode($reg['imagen_lugar']); ?>">
                                </center><center><output  id="list"></output></center>
                            </div>

                            <div class="row control-group">
                                <div class="form-group col-xs-12 floating-label-form-group controls">
                                    <label>DESCRIPCION</label>
                                    <input maxlength="20" type="text" class="form-control" name="descripcion" id="descripcion" value="<?php echo $reg['descripcion_lugar'] ?>"placeholder="DESCRIPCION" required>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>

                            <div class="row control-group">
                                <div class="form-group col-xs-12 floating-label-form-group controls">
                                    <select name="imagenvr" id="imagenvr" required class="form-control">
                                        <option value="<?php echo $reg['tipo_viaje_id_tipo'] ?>"><?php echo $reg['nombrevr'] ?></option>
                                        <option value="0">--seleccione--</option>
                                        <?php foreach ($datosimage as $regg) { ?>
                                            <option value="<?php echo $regg['idimage_vr'] ?>"><?php echo $regg['nombrevr'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row control-group">
                                <div class="form-group col-xs-12 floating-label-form-group controls">
                                    <label>ITINERARIO</label>
                                    <input maxlength="20" type="text" class="form-control"name="itinerario" id="itinerario" value="<?php echo $reg['itinerario_lugar'] ?>" placeholder="ITINERARIO" required>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>


                            <div class="row control-group">
                                <div class="form-group col-xs-12 floating-label-form-group controls">
                                    <label >idadmin</label>
                                    <input maxlength="20" type="text" class="form-control" name="idadmin" id="idadmin" value="<?php echo $reg['Admin_idadmin'] ?>" placeholder="&#128273; Usuario" required>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div>
                                <label >Tipo de viaje</label>
                                <select name="tipo" id="tipo" required class="form-control">
                                    <option value="<?php echo $reg['tipo_viaje_id_tipo'] ?>" selected><?php echo $reg['nombre'] ?></option>
                                    <option value="0">--seleccione--</option>
                                    <?php foreach ($dat as $reg) { ?>
                                        <option value="<?php echo $reg['id_tipo'] ?>"><?php echo $reg['nombre'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>


                            <br>
                            <div id="success"></div>
                            <center>
                                <div class="row">
                                    <div class="form-group col-xs-12">
                                        <input type="submit" onclick="ModificarLugar()" value="modificar"  style="background-color: #FB8C00" class="btn btn-success btn-lg">
                                    </div>

                                </div>
                            <?php } ?>
                            <div class="row">
                                <div class="form-group col-xs-12">
                                    <input onclick="salir('../Controlador', 'Lugar', 1, 'cod=' +<?php echo $codi ?>)" type="button"value="salir"  style="background-color: #FB8C00"class="btn btn-success btn-lg">
                                </div>

                            </div> 

                        </center>



                        <script>

                            function archivo(evt) {
                                var files = evt.target.files; // FileList object

                                // Obtenemos la imagen del campo "file".
                                for (var i = 0, f; f = files[i]; i++) {
                                    //Solo admitimos imágenes.
                                    if (!f.type.match('image.*')) {
                                        continue;
                                    }

                                    var reader = new FileReader();

                                    reader.onload = (function (theFile) {
                                        return function (e) {
                                            ocultar_imagen();

                                            // Insertamos la imagen
                                            document.getElementById("list").innerHTML = [' <img height="150px" width="200" class="img-circle"  src="', e.target.result, '" title="', escape(theFile.name), '"/>'].join('');
                                        };
                                    })(f);

                                    reader.readAsDataURL(f);
                                }
                            }

                            document.getElementById('imagen').addEventListener('change', archivo, false);
                        </script>

                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
