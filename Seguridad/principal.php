 <?php session_start();
 $id=$_SESSION['id'];
?>
<html>
<head>
<script src="../js/jquery.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
	<link rel="stylesheet" href="../assets/css/main.css" />
	<script src="../js/ajax1111.js"></script><!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
</head>
<body>

	<!-- Header -->
	<section id="header">
		<header>
			<span class="image avatar"><img src="../img/fondo.jpg" alt="" /></span>
			<h1 id="logo"><a href="#">Willis Corto</a></h1>
			<p>I got reprogrammed by a rogue AI<br />
				and now I'm totally cray</p>
			</header>
			<nav id="nav">
				<ul>
					<li><a href="javascript:Menu('../Controlador','Admin',2,'')"class="active">ADMINISTRADOR</a></li>
					<li><a href="javascript:Menu('../Controlador','Tipo',1,'')">TIPOS DE VIAJE</a></li>
					<li><a href="javascript:Menu('../Controlador','Lugar',1,'cod='+<?php echo $id?>)">LUGARES</a></li>
					<li><a href="javascript:Menu('../Controlador','Precio',1,'')">PRECIO LUGAR</a></li>
					<li><a href="javascript:Menu('../Controlador','Precio',1,'')">Contact</a></li>
					
				</ul>
			</nav>
			<footer>
				<ul class="icons">
					<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
					<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
					<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
					<li><a href="#" class="icon fa-github"><span class="label">Github</span></a></li>
					<li><a href="#" class="icon fa-envelope"><span class="label">Email</span></a></li>
				</ul>
			</footer>
		</section>

		<!-- Wrapper -->
		<div id="wrapper">

			<!-- Main -->
			<div id="main">

				<!-- One -->
				<section id="one">
					<div class="container" id="contenido1">
					</div>
				</section>

				<!-- Two -->
				

			</div>

			<!-- Footer -->
			<section id="footer">
				<div class="container">
					<ul class="copyright">
						<li>&copy; Untitled. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
					</ul>
				</div>
			</section>

		</div>

		<!-- Scripts -->
		<script src="../assets/js/jquery.min.js"></script>
		<script src="../assets/js/jquery.scrollzer.min.js"></script>
		<script src="../assets/js/jquery.scrolly.min.js"></script>
		<script src="../assets/js/skel.min.js"></script>
		<script src="../assets/js/util.js"></script>
		<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
		<script src="../assets/js/main.js"></script>

	</body>
	</html>