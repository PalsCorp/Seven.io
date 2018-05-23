<?php
	$ipPlayer = $_SERVER["REMOTE_ADDR"];
	include("connections.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Seven - BI</title>
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
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(images/bg-01.jpg);">
					<span class="login100-form-title-1">
						Seven - BI
					</span>
				</div>
				
				<form class="login100-form validate-form" action="index.php?pag=checkLogin" method="POST">
					<div class="wrap-input100 validate-input m-b-26" data-validate="Usuario é Obrigatorio">
						<span class="label-input100">Usuario</span>
						<input class="input100" type="text" name="username" placeholder="Digite o Usuario">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Senha é Obrigatorio">
						<span class="label-input100">Senha</span>
						<input class="input100" type="password" name="pass" placeholder="Digite a Senha">
						<span class="focus-input100"></span>
					</div>

					<div class="flex-sb-m w-full p-b-30">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								Lembrar-me
							</label>
						</div>

						<div>
					
						</div>
					
				
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					
					</div>
				</form>
			
			</div>
		</div>
	</div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
<?php	
	if(isset($_GET["pag"])) {
		$user = $_POST["username"];
		$pass = $_POST["pass"];
		if($user == "" OR $pass == "") {
			echo "<script> alert('Preencha todos os campos'); location.href='index.php'</script>";
		}
		$check = mysql_query("SELECT * FROM usuarios WHERE nome='$user' AND senha='$pass'") or die (mysql_error());
		$row   = mysql_num_rows($check);
		if($row > 0) {
			$check2 = mysql_query("SELECT permissao FROM usuarios WHERE nome='$user'");
			$row2   = mysql_num_rows($check2);
			if($row2) {
				$dadosUsuario = mysql_fetch_array($check2);
				if($dadosUsuario["permissao"] == 1) {
					echo "<script> alert('Bem vindo ao Painel de Controle!'); location.href='portal.php'</script>";
				} else {
					echo "<script> alert('Você não tem permissão!'); location.href='index.php'</script>";
				}
			}
		} else {
			echo "<script> alert('Usuário ou Senha incorretos!'); location.href='index.php'</script>";
		}
	}
?>