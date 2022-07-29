<?php include "comum/header.php";
include "verifica_login.php";

$sql = "SELECT nome,id FROM usuario WHERE usuario = '" . $_SESSION['usuario'] . "'";
$result = mysqli_query($conect,$sql);
$row = mysqli_fetch_array($result);
$nome=$row['nome'];
$idd=$row['id'];
?>

<h2>Olá, <?php echo $row['nome']; ?>!</h2>
<h2>Perfis</h2>

<div style="text-align:center;">
  <?php 
    $resultadoLista = array();
    $queryStr="SELECT * FROM perfil where usuario_id = '".$idd."'";
    $resultado=mysqli_query($conect,$queryStr);
    while($row = mysqli_fetch_row($resultado)){
      $resultadoLista[] = $row; 
      $pid=$row['0'];
      $pnome=$row['1'];
      ?>
      <div>
        <form action="entrasaida.php" method="post">
          <button class="btn btn-primary perfis"><?= $row['1']; ?></button>
          <input type="hidden" name="pid" value="<?= $pid ?>">
          <input type="hidden" name="pnome" value="<?= $pnome ?>">   
          <td><a href="delete_perfil.php?pid=<?=$pid;?>" class="text-danger"><i class="fa fa-trash"></i></a></td>
        </form>
        <!--<a href='delete_perfil.php?'>x</a>-->
      </div>
  <?php }; ?>
</div>

<div style="text-align:center;" class="enviar">
	<button id="myBtn" class="btn btn-success" href="#">Novo grupo de gastos</button>
</div>

<div id="myModal" class="modal">
<!-- Modal content -->
<div class="modal-content">
  <span class="close">&times;</span>

    <div class="login">
      <h2>Novo grupo de gastos</h2>
      <form action="inserir_perfil.php" method="post">
        <div class="">
          <label class="label"></label>
          <input type="text" placeholder="Nome de Perfil" class="form-group" name="nome" required>
        </div>            
        <div>
          <input type="submit" value="Adicionar" class="btn btn-primary py-66 px-4">
        </div>
      </form>
    </div>

</div>
</div>

<?php include "comum/footer.php"; ?>