<?php
include("conexao.php");
$vtitulo=$vduracao=$vcantor='';
if($subtitulo==' Editar Dados'){
  $id1=$_GET['id2'];
  $muss=MostrarMusica($id1);
  $vtitulo=$muss['titulo'];
  $vcantor=$muss['cantor'];
  $vduracao=$muss['duracao'];
}
?>

<h5 class="text-center" style="color: blue;"><b><?php echo $subtitulo; ?> </b> </h5>

 <form action="pages/conexao.php" method="POST">   
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="titulo">Título da musica</label>
      <input type="text" class="form-control" id="titulo" name="titulo" value="<?php echo $vtitulo; ?>" placeholder="Título" required>
    </div>
    <div class="form-group col-md-6">
      <label for="duracao">Tempo de Duração</label>
      <input type="number" min="0" class="form-control" id="duracao" value="<?php echo $vduracao; ?>" name="duracao" placeholder="duração em segundos" required>
    </div>
  </div>
  <div class="form-group">
    <label for="Cantor">Cantor</label>
    <input type="text" class="form-control" id="Cantor" name="cantor" value="<?php echo $vcantor; ?>" placeholder="Artista" required>
  </div>
  <input type="hidden"name="acao" value="<?php echo $textobtn; ?>">
  <input type="hidden"name="id" value="<?php echo $id1; ?>">
   <button type="submit" name="enviar" value="enviar" class="btn btn-success"><?php echo $textobtn; ?></button>

</form>

