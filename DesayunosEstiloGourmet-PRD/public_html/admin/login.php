<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login panel de administración Desayuno Gourmet</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<!--<link rel="stylesheet" href="css/loader.css">-->
<!--===============================================================================================-->
<style>

/* Center the loader */
#loader {
  position: absolute;
  left: 50%;
  top: 50%;
  z-index: 1;
  width: 150px;
  height: 150px;
  margin: -75px 0 0 -75px;
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 1s linear infinite;
  animation: spin 1s linear infinite;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

/* Add animation to "page content" */
.animate-bottom {
  position: relative;
  -webkit-animation-name: animatebottom;
  -webkit-animation-duration: 1s;
  animation-name: animatebottom;
  animation-duration: 1s
}

@-webkit-keyframes animatebottom {
  from { bottom:-100px; opacity:0 } 
  to { bottom:0px; opacity:1 }
}

@keyframes animatebottom { 
  from{ bottom:-100px; opacity:0 } 
  to{ bottom:0; opacity:1 }
}

#contenido {
  visibility: hidden;
  text-align: center;
}

</style>

</head>
<body onload="cargarContenido();">

  <div id="loader"></div>

  <div id="contenido">
		<div class="limiter">
				<div class="container-login100" style="background-image: url('images/breakfast.jpg');">
					<div class="wrap-login100 p-t-70 p-b-30">
						<div class="contenedor_formulario">
							<form class="login100-form validate-form" method="POST" action="">
								<div class="login100-form-avatar">
									<img src="images/avatar.png" alt="AVATAR">
								</div>
		
								<span class="login100-form-title p-t-20 p-b-45">
									Panel de administración
								</span>
		
								<div class="wrap-input100 validate-input m-b-10">
									<input class="input100" type="text" name="usuario" id="usuario" placeholder="Usuario">
									<span class="focus-input100"></span>
									<span class="symbol-input100">
										<i class="fa fa-user"></i>
									</span>
								</div>
		
								<div class="wrap-input100 validate-input m-b-10">
									<input class="input100" type="password" name="clave" id="clave" placeholder="Contraseña">
									<span class="focus-input100"></span>
									<span class="symbol-input100">
										<i class="fa fa-lock"></i>
									</span>
								</div>
		
								<div class="container-login100-form-btn p-t-10">
									<button class="login100-form-btn" id="btn_login">
										Login
									</button>
								</div>
	
							</form>
					  </div>
					</div>
				</div>
			</div>

  </div>
	
	
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
<!--===============================================================================================-->
	<script src="js/login/login.js"></script>
<!--===============================================================================================-->	
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.33.1/dist/sweetalert2.all.min.js"></script>
	
	<script>
		var myVar;
		
		function cargarContenido() {
			myVar = setTimeout(mostrarPagina, 2000);
		}
		
		function mostrarPagina() {
			document.getElementById("loader").style.display = "none";
			document.getElementById("contenido").style.visibility = "visible";
		}
	</script>

</body>
</html>