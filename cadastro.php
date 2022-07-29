<?php 
	include "comum/header.php";
	$nome = mysqli_real_escape_string($conect, $_REQUEST['nome']);
	$usuario = mysqli_real_escape_string($conect, $_REQUEST['usuario']);
	$senha = mysqli_real_escape_string($conect, $_REQUEST['senha']);
	$c_senha = mysqli_real_escape_string($conect, $_REQUEST['c_senha']);
	
		$cadastro = "INSERT INTO usuario (nome,usuario,senha) VALUES ('$nome','$usuario','$senha')";
		if(mysqli_query($conect, $cadastro)){
			header('Location: index.php');
		    alert("Records added successfully.");
		} else{
			$_SESSION['nao_autenticado'] = true;
		    alert("ERROR: Could not able to execute conect. ");
		}
		mysqli_close($conect);

?>