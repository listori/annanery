<?php
session_start();
require_once "config.php";


?><html>
<head>
	<meta http-equiv="Content-Type" content="text/html, charset=utf-8">
	<title>LOGIN</title>
<style>
			*{
				margin: 0;
				padding: 0;
				box-sizing: border-box;
			}
			body, html{
				width: 100%;
				height: 100%;
				font-family: sans-serif;
				font-size:22px;
				line-height: 1.3;
			}
			.bg_video{
				position: fixed; 
				right: 0; 
				bottom: 0;
				min-width: 100%; 
				min-height: 100%;
				width: auto; 
				height: auto; 
				z-index: -1000;
				background:file:///C:/Users/ALICE/Desktop/trabs/22471740_882211231930579_1772150128_n.png no-repeat;
				background-size: cover; 
			}
			#body{
				position:absolute;
				left:50%;
				top:50%;
				margin-left:-110px;
				margin-top:-100px;
				
			}
			form {

		font-family: sans-serif;

		font-size: 12pt;

		color: #FFFFFF;

		text-decoration: none;

		scrollbar-face-color:#4d99e5;

		scrollbar-shadow-color:#FFFFFF;

		scrollbar-highlight-color:#FFFFFF;

		scrollbar-3dlight-color:#FFFFFF;

		scrollbar-darkshadow-color:#FFFFFF;

		scrollbar-track-color:#FFFFFF;

		scrollbar-arrow-color:#FFFFFF;

		text-decoration: none;
		}

		</style>
	</head>
<body>
<video autoplay loop poster="polina.jpg" class="bg_video">
				<source src="video/League of Legends OMEGA SQUAD TEEMO Login Theme.mp4" type="video/mp4">
			</video>
<div id="body">
<CENTER>
	<form method="post" action="?go=logar">
	<fieldset>
		<legend>Entre invocador</legend><br><br>
		<table id="login_table">
			<label>Usuário:</label><input type="text" name="usuario" id="usuario" class="txt" maxlength="15" /><br><br>
			<label>Senha:</label><input type="password" name="senha" id="senha" class="txt" maxlength="15" /><br><br>
			<td colspan="2"><input type="submit" value="Entrar" class="btn" id="btnEntrar"> 
			<a href="cadastro.php"><input type="button" value="Cadastre-se" class="btn" id="btnCad"></a></td>
			
		</table>
	</form>
	</CENTER>
</div>

</body>
</html>

<?php
if(isset($_GET['go'])){
if($_GET['go'] == 'logar'){
	$user = $_POST['usuario'];
	$pwd = $_POST['senha'];
	$user = trim($user); 
			$pwd = trim($pwd); 
}
	if(empty($user)){
		echo "<script>alert('Preencha todos os campos para logar-se.'); history.back();</script>";
	}elseif(empty($pwd)){
		echo "<script>alert('Preencha todos os campos para logar-se.'); history.back();</script>";
	}else{
		$query1 =  mysqli_query($con, "SELECT * FROM USUARIO WHERE USUARIO = '$user' AND SENHA = '$pwd'");
		if($query1->num_rows == 1){ 
		$_SESSION['userSession'] = $user;
		$_SESSION['pwdSession'] = $pwd;
			echo "<meta http-equiv='refresh' content='0, url=./_painel/'>";
		}else{
			echo "<script>alert('Usuário e senha não correspondem.'); history.back();</script>";
		}
	}
}
?>