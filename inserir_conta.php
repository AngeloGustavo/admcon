<?php 
	include "comum/header.php";
	$pid=$_POST['pid'];

	  $sql = "SELECT idperfil FROM perfil WHERE usuario = '" . $_SESSION['usuario'] . "'";
	  $result = mysqli_query($conect,$sql);
	  $row = mysqli_fetch_array($result);
	
	$nome = mysqli_real_escape_string($conect, $_REQUEST['nome']);
	$valor = mysqli_real_escape_string($conect, $_REQUEST['valor']);
	$data = mysqli_real_escape_string($conect, $_REQUEST['data']);
	$tipo = mysqli_real_escape_string($conect, $_REQUEST['tipo']);

    $sql = "INSERT INTO entrasaida (nome,valor,data,tipo,perfil_idperfil) VALUES ('$nome','$valor','$data','$tipo','$pid')";
	if(mysqli_query($conect, $sql)){
		header("Location: entrasaida.php?pid=$pid");
	    echo "Records added successfully.";
	} else{
	    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conect);
	}
	mysqli_close($conect);
?>