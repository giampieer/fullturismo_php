 <?php session_start();
 $id=$_SESSION['id'];
?>
<body>
  <div id="menu-cards " >
    <h2 style="color: #ffffff; text-align: center">MANTENIMIENTOS</h2>
    <div class="menu-card shake-slow ">
      <a href="javascript:Menu('../Controlador','Admin',2,'')">
        <img src="../img/admins1.png" alt="drinks"  style="height: 220px">
      </a>
      <h3 style="text-align: center">ADMINISTRADOR</h3>
    </div>
    
    <div class="menu-card menu-card shake-slow ">
     <a href="javascript:Menu('../Controlador','Tipo',1,'')">
       <img src="../img/tipos.jpg" alt="drinks" style="height: 220px">
     </a>
     <h3 style="text-align: center">VIAJE</h3>
   </div>
    
    <div class="menu-card shake-slow ">
      <a href="javascript:Menu('../Controlador','TipoViaje',1,'')">
        <img src="../img/TiposViajes.jpg" alt="drinks"  style="height: 220px">
      </a>
        <h3 style="text-align: center">Tipos de Viajes</h3>
    </div>
   
    <div class="menu-card shake-slow ">
      <a href="javascript:Menu('../Controlador','imagenvr',1,'')">
        <img src="../img/vr.jpg" alt="drinks"  style="height: 220px">
      </a>
        <h3 style="text-align: center">Imagen VR</h3>
    </div>
   
   <div class="menu-card menu-card shake-slow ">
     <a href="javascript:Menu('../Controlador','Lugar',1,'cod='+<?php echo $id?>)">
       <img src="../img/lugares.jpg" alt="drinks" style="height: 220px"  >
     </a>
     <h3 style="text-align: center">LUGARES</h3>
   </div>
   <div class="menu-card menu-card shake-slow ">
    <a href="javascript:Menu('../Controlador','Precio',1,'')">
      <img src="../img/precios.png" alt="drinks" style="height: 220px" >
    </a>
    <h3 style="text-align: center">PRECIO LUGAR</h3>
  </div>
  <div class="menu-card  shake-slow ">
      <a href="../index.php">
      <img src="../img/salir.png" alt="drinks" style="height: 60px;width: 80px" >
    </a>
  </div>
</div>
</body>