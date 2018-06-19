<?php



?>

<!DOCTYPE HTML>

<html lang="es"> 
	<head>
		<title>Intranet - Satel Importadores</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/login.css" />
		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
		<link rel="icon" href="favicon.ico" type="image/x-icon">
	</head>
	<body>

		<!-- Page Wrapper -->
			<div id="page-wrapper">

				<!-- Header -->
					<header id="header" class="alt">
						

					</header>


					<section id="banner">
						<div class="inner">
			
							<div class="login">
  <div class="heading">
    <h2>Inicio de Sesión</h2>
    <form action="php/login.php" method="post">

      <div class="input-group input-group-lg">
        <span class="input-group-addon"><i class="fa fa-user"></i></span>
        <input type="text" class="form-control" id="username" placeholder="Username or email" name="username" required>
          </div>

        <div class="input-group input-group-lg">
          <span class="input-group-addon"><i class="fa fa-lock"></i></span>
          <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
        </div>

       <div class="input-group input-group-lg">
			<p> </p>
	         <span class="6u" id="error_capslock">Mayuscula esta activado</span>
        </div>

<!-- 	  <div class="input-group input-group-lg">
		<p> </p>
         <div class="6u"><a href="#">¿Olvidaste tu contraseña?</a> </div>
         
        </div> -->




        <div class="input-group input-group-lg">

 		<div class="6u"><a href="http://www.satelimportadores.com/pdfs/Manual%20de%20Tratamiento%20de%20Datos%20Personales%20v%202013.pdf" target="blank"><input type="checkbox" checked="checked"> He leído y estoy de acuerdo con los
		términos y condiciones y aviso de privacidad</a> </div>
        	
        </div>
			
        <button type="submit" class="float">Login</button>
       </form>
 		</div>
 </div>
						
					</section>

				


			</div>

		<!-- Scripts -->
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/jquery.min.js"></script>
			<script src="js/index.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>