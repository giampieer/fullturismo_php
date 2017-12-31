<?php
session_start();
$id = $_SESSION['id'];
$nombre = $_SESSION['nombre'];
$descripcion = $_SESSION['descripcion'];
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
                    <h3>MODIFICAR IMAGEN VR</h3>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <form name="form" enctype="multipart/form-data" id="enviarimagenes"method="POST"><br>
                        <div class="row control-group">

                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>ID</label>
                                <input maxlength="20" type="text" readonly="readonly" class="form-control" name="idlugar" id="idlugar" value="<?php echo $id ?>" placeholder="&#128273; Usuario" required>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>NOMBRE</label>
                                <input maxlength="20" type="text" class="form-control" name="nombre" id="nombre" value="<?php echo $nombre ?>" placeholder="NOMBRE"required>
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
                            <center>  <img  height="150px" width="200" class="img-circle" id="img" src="data:image/jpg;base64,<?php echo base64_encode($descripcion); ?>">
                            </center><center><output  id="list"></output></center>
                        </div>

                        <br>
                        <div id="success"></div>
                        <center>
                            <div class="row">
                                <div class="form-group col-xs-12">
                                    <input type="submit" onclick="Modificarimagenvr()" value="modificar"  style="background-color: #FB8C00" class="btn btn-success btn-lg">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-xs-12">
                                    <input onclick="salir('../Controlador', 'imagenvr', 1, '')" type="button"value="salir"  style="background-color: #FB8C00"class="btn btn-success btn-lg">
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
