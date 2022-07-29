<?php 
	session_start();
	include "comum/header.php";

	  $sql = "SELECT id FROM usuario WHERE usuario = '" . $_SESSION['usuario'] . "'";
	  $result = mysqli_query($conect,$sql);
	  $row = mysqli_fetch_array($result);
	  $idd=$row['id'];
	
	$nome = mysqli_real_escape_string($conect, $_REQUEST['nome']);
    $sql = "INSERT INTO perfil (nome,usuario_id) VALUES ('$nome','$idd')";
	if(mysqli_query($conect, $sql)){
		header('Location: painel.php');
	    echo "Records added successfully.";
	} else{
	    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conect);
	}
	mysqli_close($conect);
?>