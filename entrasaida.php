<?php include "comum/header.php"; 
include "verifica_login.php";
$pid=$_POST['pid'];
$pnome=$_POST['pnome'];
if(isset($pid)==null){
    $pid=$_GET['pid'];;
};?>

<div class="table-responsive">
		<table class="table table-hover progress-table text-center">
            <thead class="text-uppercase">
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Data</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
			<?php
                $resultadoLista = array();
                $queryStr="SELECT * FROM entrasaida where perfil_idperfil = '".$pid."' ";
                $resultado=mysqli_query($conect,$queryStr);
                  
                while($row = mysqli_fetch_row($resultado)){
                  $resultadoLista[] = $row;
                  ?>
                <?php 
                  $cor="";
                  if ($row['4']=="Entrada") {
                    $cor="background-color: rgb(128,200,131);";
                  };
                ?>

                <tr style="<?php echo $cor ?>">
                    <td><b><?= $row['0']; ?> - </b><?= $row['1']; if($row['4']=='Entrada'){echo('<strong> (+)</strong>');}; ?></td>
                    <td>R$<?= $row['2']; ?></td>
                    <td><?= date("d-m-Y", strtotime($row['3'])); ?></td>
                    <td><a href="delete_conta.php?cid=<?=$row['0'];?>&pid=<?=$row['5'];?>" class="text-danger"><i class="fa fa-trash"></i></a></td>
                </tr>
			      <?php 
                $cont2+=$row['2'];
            } ?>
            </tbody>
            <h4 id="pnome"><?php echo $pnome;?></h4>            <h5 style="color:white; background-color:red; display: table; margin: 0px auto 0px auto; margin-bottom: 5px; padding:5px;"><?php echo 'Gasto total: R$'.number_format($cont2, 2);?></h5>
        </table>
            <div style="text-align:center;" class="enviar">
                <button id="myBtn" class="btn btn-success" href="#">Nova conta</button>
            </div>

            <div id="myModal" class="modal">
            <!-- Modal content -->
            <div class="modal-content">
              <span class="close">&times;</span>

                <div class="login">
                  <h2>Nova conta</h2>
                  <form action="inserir_conta.php" method="post">
                    <div class="">
                      <label class="label"></label>
                      <input type="text" placeholder="Nome" class="form-group" name="nome" required>
                      <input type="number" placeholder="Valor" step="0.01" class="form-group" name="valor" required>
                      <input type="date" placeholder="Data" class="form-group" name="data" required>
                      <br>
                      <select class="form-group" name="tipo" required>
                            <option value="Saida">Saida</option>
                            <option value="Entrada">Entrada</option>
                      </select>
                      <input type="hidden" name="pid" value="<?= $pid ?>">
                    </div>            
                    <div>
                      <input type="submit" value="Adicionar" class="btn btn-primary py-66 px-4 conta">
                    </div>
                  </form>
                </div>
            </div>
            </div>

        
    </div>
</div>

<?php include "comum/footer.php"; ?>