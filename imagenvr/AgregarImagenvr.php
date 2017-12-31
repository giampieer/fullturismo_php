
<?php
session_start();
require_once '../Dao/imagenvrDao.php';
$objdao = new imagenvrDao();
?>
<html>
    <head>
        <title></title>
    </head>
    <body>
        <div class="container animated zoomIn" style="max-width: 500px;width: 100%;background-color: white;border-radius: 7px">
            <div class="row titulocontenedor" >
                <div class="col-lg-12 text-center" >
                    <h3>REGISTRAR IMAGEN VR</h3>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <form name="form" method="POST" enctype="multipart/form-data"id="enviarimagenes"><br>


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

                        <div class="row control-group">
                            <?php
                            $i = $objdao->generarCodigo();
                            if ($i == 0) {
                                $i = 1;
                            } else {
                                $i = $objdao->generarCodigo()+1;
                            }
                            ?>
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>USUARIO</label>
                                <input maxlength="20" type="text" readonly="readonly" class="form-control" placeholder="USUARIO" name="idlugar" id="idlugar" value="<?php echo $i ?>" placeholder="&#128273; Usuario" required>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>NOMBRE</label>
                                <input maxlength="20" type="text" class="form-control" name="nombre" id="nombre" placeholder="NOMBRE" required>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <br>

                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label >IMAGEN</label>
                                <input  type="file" class="form-control" name="imagen" id="imagen" accept="image/*" placeholder="IMAGEN" required>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <center><output  id="list"></output></center>
                        </div>

                        <br>
                        <div id="success"></div>
                        <center>
                            <div class="row">
                                <div class="form-group col-xs-12">
                                    <input type="submit" onclick="Grabarimagenvr()" style="background-color: #FB8C00"value="grabar" class="btn btn-success btn-lg">
                                </div>

                            </div>
                            <div class="row">
                                <div class="form-group col-xs-12">
                                    <input type="button"  style="background-color: #FB8C00"onclick="salir('../Controlador', 'imagenvr', 1, '')" value="salir" class="btn btn-success btn-lg">
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


