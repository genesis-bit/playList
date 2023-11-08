<?php
    include("conexao.php");
    $dados =MostrarMusicas();
  ?>

<h5 class="text-center">Play List Completa</h5>
  <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Título</th>
      <th scope="col">Cantor</th>
      <th scope="col">Duração(segundos)</th>
      <th scope="col">Opção</th>

    </tr>
  </thead>
  <tbody>
  <?php
  $n=1;
  foreach($dados as $Musicas){ ?>
  
   <tr>
      <th scope="row"><?php echo $n++; ?> </th>
      <td><?php echo $Musicas['titulo'] ?> </td>
      <td><?php echo $Musicas['cantor'] ?> </td>
      <td><?php echo $Musicas['duracao'] ?></td>
      <td><form action="pages/conexao.php" method="POST"> 
      <input type="hidden" name="id" value="<?php echo $Musicas['id'] ?>">
      <input type="hidden" name="acao" value="Apagar">
      <button type="submit" name="enviar" value="enviar" class="btn btn-danger">Excluir</button>
      </form>
      <a type="button" class="btn btn-link" href="?opcion=3&id2=<?php echo $Musicas['id']?>">Atualizar</a></td>
    </tr>
     <?php }
  ?>
   
  </tbody>
</table>