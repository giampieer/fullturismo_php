//REUTILIZABLES CON JQUERY

function Ajax(tipoparametro,ruta,servlet,op,parametros,div){

    $.ajax(
        {   type:tipoparametro,
            dataType:"html",
            url:ruta+"/"+servlet+"Control.php",
            data:"op="+op+"&"+parametros,
            success:function(datos)
            {
                $(div).html(datos);
            }
        }); 
}


function grabar1(ruta, tabla, op, parametros)
{
    Ajax("GET",ruta,tabla,op,parametros,"#contenido1");
}



function eliminar(ruta, tabla, op, parametros)
{
  
    Ajax("POST",ruta,tabla,op,parametros,"#contenido1");  
    
}

//salir de un formulario
function salir(ruta,servlet,op,parametros)
{
    Ajax("GET",ruta,servlet,op,parametros,"#contenido1");
}

function modificar(ruta, tabla, op, parametros)
{
 Ajax("GET",ruta,tabla,op,parametros,"#contenido1");  
}


function cargar(ruta, tabla, op, parametros)
{
  Ajax("GET",ruta,tabla,op,parametros,"#contenido1");
}

function Menu(ruta,servlet,op,parametros)
{
    Ajax("POST",ruta,servlet,op,parametros,"#contenido1");
    
}
function Cerrar(ruta,servlet,op,parametros)
{
    Ajax("POST",ruta,servlet,op,parametros,"#contenido1");
    
}

function Acceso(ruta){
    var RutaTotal,usuario,clave;
    RutaTotal=ruta+"/AdminControl.php?op=1";
    usuario=document.form.usuario.value;
    clave=document.form.clave.value;
    
    if(usuario==''){
        alert("Ingrese usuario");
        return;
    }else if(clave==''){
        alert("Ingrese Contraseña");
        return;
    }else{
        document.form.action=RutaTotal;
        document.form.method="POST";
        document.form.submit();
    }
}

function grabarTipo(ruta){
    var id,nombre;
    id=document.getElementById('id').value;
    nombre=document.getElementById('nombre').value;
    var parametros="id="+id+"&";
    parametros +="nombre="+nombre;
    
    
    if(id==''){
        alert("Ingrese codigo");
        return;
    }else if(nombre=='0'){
        alert('Seleccione viaje');
        return;
    }else
    {
        grabar1(ruta,'Tipo',3, parametros);
    }
}

function grabarPrecio(ruta){
    var id,precio,moneda,dias,idlugar;
    id=document.getElementById('id').value;
    precio=document.getElementById('precio').value;
    moneda=document.getElementById('moneda').value;
    dias=document.getElementById('dias').value;
    idlugar=document.getElementById('lugar').value;
    
    var parametros="id="+id+"&";
    parametros +="precio="+precio+"&";
    parametros +="moneda="+moneda+"&";
    parametros +="dias="+dias+"&";
    parametros +="lugar="+idlugar;
    
    if(id==''){
        alert("ingrese id");
        return;
    }else if(precio==''){
        alert("ingrese precio");
        return;
    }else if(moneda==''){
        alert("ingrese moneda");
        return;
    }else if(dias==''){
        alert("ingrese dias");
        return;
    }else if(idlugar=='0'){
        alert("Seleccione lugar");
        return;
    }else{
        grabar1(ruta,'Precio',3,parametros);
    }
}
//login
//login
function GrabaLugar(){
    var id,nombre,dscripcion,imagen,itinerario,idadmin,tipo,imagenvr;
    id=document.form.idlugar.value;
    nombre=document.form.nombre.value;
    dscripcion=document.form.descripcion.value;
    imagen=document.form.imagen.value;
    itinerario=document.form.itinerario.value;
    idadmin=document.form.idadmin.value;
    tipo=document.form.tipo.value;
    imagenvr=document.form.imagenvr.value;
    var parametros="idlugar="+id+"&";
    parametros +="nombre="+nombre+"&";
    parametros +="descripcion="+dscripcion+"&";
    parametros +="imagen="+imagen+"&";
    parametros +="itinerario="+itinerario+"&";
    parametros +="idadmin="+idadmin+"&";
    parametros +="tipo="+tipo+"&";
    parametros +="imagenvr="+imagenvr;

    
    if(id==''){
        alert("Ingrese id");
        return;
    }else if(nombre==''){
        alert("Ingrese Nombre");
        return;
    }else if(dscripcion==''){
        alert("Ingrese Descripcion");
        return;
    }else if(imagen==''){
        alert("Ingrese Imagen");
        return;
    }else if(imagenvr=='0'){
        alert("seleccione nombre de la imagen vr");
        return;
    }else if(itinerario==''){
        alert("Ingrese Itinerario");
        return;
    }else if(idadmin==''){
        alert("Ingrese id del Administrador");
        return;
    }else if(tipo=='0'){
        alert("Ingrese el tipo de viaje");
        return;
    }else{
      $("#enviarimagenes").on("submit", function(e){
       e.preventDefault();
       var formData = new FormData(document.getElementById("enviarimagenes"));
       $.ajax({
          url: "../Controlador/LugarControl.php?op=3",
          type: "POST",
          dataType: "HTML",
          data: formData,
          cache: false,
          contentType: false,
          processData: false
      }).done(function(echo){
          $("#contenido1").html(echo);
      });
  });
  }
}

function Grabarimagenvr(){
    var id,nombre,imagen;
    id=document.form.idlugar.value;
    nombre=document.form.nombre.value;
    imagen=document.form.imagen.value;
    var parametros="idlugar="+id+"&";
    parametros +="nombre="+nombre+"&";
    parametros +="imagen="+imagen;

    
    if(id==''){
        alert("Ingrese id");
        return;
    }else if(nombre==''){
        alert("Ingrese Nombre");
        return;
    }else if(imagen==''){
        alert("Ingrese Imagen");
        return;
    }else{
      $("#enviarimagenes").on("submit", function(e){
       e.preventDefault();
       var formData = new FormData(document.getElementById("enviarimagenes"));
       $.ajax({
          url: "../Controlador/imagenvrControl.php?op=3",
          type: "POST",
          dataType: "HTML",
          data: formData,
          cache: false,
          contentType: false,
          processData: false
      }).done(function(echo){
          $("#contenido1").html(echo);
      });
  });
  }
}

function GrabarAdmin(ruta){
    var id,nom,usu,clave;
    
    id=document.getElementById('id').value;
    nom=document.getElementById('nombre').value;
    usu=document.getElementById('usuario').value;
    clave=document.getElementById('contraseña').value;
    var parametros="id="+id+"&";
    parametros+="nombre="+nom+"&";
    parametros+="usuario="+usu+"&";
    parametros+="contraseña="+clave;

    if(id==""){
        alert("Ingrese id");
        return;
    }else if(nom==''){
        alert("ingrese nombre");
        return;
    }else if(usu==''){
        alert("ingrese usuario");
        return;
    }else if(clave==''){
        alert("ingrese clave");
        return;
    }else{
        grabar1(ruta,'Admin',4,parametros);
    }
}
function grabarTipoViaje(ruta){
    var id,nombre,tipoviaje;
    id=document.getElementById('id').value;
    nombre=document.getElementById('nombre').value;
    tipoviaje=document.getElementById('tipoviaje').value;
    
    var parametros="id="+id+"&";
    parametros +="nombre="+nombre+"&";
    parametros +="tipoviaje="+tipoviaje;
    if(id==''){
        alert("ingrese codigo");
        return;
    }else if(nombre=='0'){
        alert("seleccione Viaje");
        return;
    }else if(tipoviaje=='0'){
        alert("seleccione Tipo de Viaje");
        return;
    }else{
        grabar1(ruta,'TipoViaje',3,parametros);
    }
}

function ModificarAdmin(ruta){
    var id,nom,usu,clave;
    
    id=document.getElementById('id').value;
    nom=document.getElementById('nombre').value;
    usu=document.getElementById('usuario').value;
    clave=document.getElementById('contraseña').value;
    var parametros="id="+id+"&";
    parametros+="nombre="+nom+"&";
    parametros+="usuario="+usu+"&";
    parametros+="contraseña="+clave;

    if(id==""){
        alert("Ingrese id");
        return;
    }else if(nom==''){
        alert("ingrese nombre");
        return;
    }else if(usu==''){
        alert("ingrese usuario");
        return;
    }else if(clave==''){
        alert("ingrese clave");
        return;
    }else{
        grabar1(ruta,'Admin',7,parametros);
    }    
}
function ModificarTipo(ruta){
    var id,nombre;
    id=document.getElementById('id').value;
    nombre=document.getElementById('nombre').value;
    var parametros="id="+id+"&";
    parametros +="nombre="+nombre;
    
    
    if(id==''){
        alert("Ingrese codigo");
        return;
    }else if(nombre==''){
        alert('Ingrese nombre');
        return;
    }else
    {
        grabar1(ruta,'Tipo',6, parametros);
    }
}
function ModificarTipoViaje(ruta){
    var id,nombre,tipoviaje;
    id=document.getElementById('id').value;
    nombre=document.getElementById('nombre').value;
    tipoviaje=document.getElementById('tipoviaje').value;
    
    var parametros="id="+id+"&";
    parametros +="nombre="+nombre+"&";
    parametros +="tipoviaje="+tipoviaje;
    if(id==''){
        alert("ingrese codigo");
        return;
    }else if(nombre=='0'){
        alert("seleccione Viaje");
        return;
    }else if(tipoviaje=='0'){
        alert("seleccione Tipo de Viaje");
        return;
    }else{
        grabar1(ruta,'TipoViaje',5,parametros);
    }
}
function ModificarPrecio(ruta){
    var id,precio,moneda,dias,idlugar;
    id=document.getElementById('id').value;
    precio=document.getElementById('precio').value;
    moneda=document.getElementById('moneda').value;
    dias=document.getElementById('dias').value;
    idlugar=document.getElementById('lugar').value;
    
    var parametros="id="+id+"&";
    parametros +="precio="+precio+"&";
    parametros +="moneda="+moneda+"&";
    parametros +="dias="+dias+"&";
    parametros +="lugar="+idlugar;
    if(id==''){
        alert("ingrese id");
        return;
    }else if(precio==''){
        alert("ingrese precio");
        return;
    }else if(moneda==''){
        alert("ingrese moneda");
        return;
    }else if(dias==''){
        alert("ingrese dias");
        return;
    }else if(idlugar=='0'){
        alert("Seleccione lugar");
        return;
    }else{
        grabar1(ruta,'Precio',6,parametros);
    }
}

function ModificarLugar(){
    var id,nombre,dscripcion,imagen,itinerario,idadmin,tipo,imagenvr;
    id=document.form.idlugar.value;
    nombre=document.form.nombre.value;
    dscripcion=document.form.descripcion.value;
    imagen=document.form.imagen.value;
    itinerario=document.form.itinerario.value;
    idadmin=document.form.idadmin.value;
    tipo=document.form.tipo.value;
    imagenvr=document.form.imagenvr.value;
    var parametros="idlugar="+id+"&";
    parametros +="nombre="+nombre+"&";
    parametros +="descripcion="+dscripcion+"&";
    parametros +="imagen="+imagen+"&";
    parametros +="itinerario="+itinerario+"&";
    parametros +="idadmin="+idadmin+"&";
    parametros +="tipo="+tipo+"&";
    parametros +="imagenvr="+imagenvr;
    
    if(id==''){
        alert("Ingrese id");
        return;
    }else if(nombre==''){
        alert("Ingrese Nombre");
        return;
    }else if(dscripcion==''){
        alert("Ingrese Descripcion");
        return;
    }else if(imagen==''){
        alert("Ingrese Imagen");
        return;
    }else if(imagenvr=='0'){
        alert("Selecciones nombre de imagen vr");
        return;
    }else if(itinerario==''){
        alert("Ingrese Itinerario");
        return;
    }else if(idadmin==''){
        alert("Ingrese id del Administrador");
        return;
    }else if(tipo=='0'){
        alert("Ingrese el tipo de viaje");
        return;
    }else{
      $("#enviarimagenes").on("submit", function(e){
       e.preventDefault();
       var formData = new FormData(document.getElementById("enviarimagenes"));
       $.ajax({
          url: "../Controlador/LugarControl.php?op=6",
          type: "POST",
          dataType: "HTML",
          data: formData,
          cache: false,
          contentType: false,
          processData: false
      }).done(function(echo){
          $("#contenido1").html(echo);
      });
  });
  }
}

function Modificarimagenvr(){
    var id,nombre,imagen;
    id=document.form.idlugar.value;
    nombre=document.form.nombre.value;
    imagen=document.form.imagen.value;
    var parametros="idlugar="+id+"&";
    parametros +="nombre="+nombre+"&";
    parametros +="imagen="+imagen;

    
    if(id==''){
        alert("Ingrese id");
        return;
    }else if(nombre==''){
        alert("Ingrese Nombre");
        return;
    }else if(imagen==''){
        alert("Ingrese Imagen");
        return;
    }else{
      $("#enviarimagenes").on("submit", function(e){
       e.preventDefault();
       var formData = new FormData(document.getElementById("enviarimagenes"));
       $.ajax({
          url: "../Controlador/imagenvrControl.php?op=5",
          type: "POST",
          dataType: "HTML",
          data: formData,
          cache: false,
          contentType: false,
          processData: false
      }).done(function(echo){
          $("#contenido1").html(echo);
      });
  });
  }
}



