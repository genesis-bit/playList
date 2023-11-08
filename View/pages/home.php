
<div class="row">
  <div class="col-md-8">
 	     
  <?php
    include("conexao.php");
    $dados =MostrarMusicas();
    
    ?>

     
     <h5 class="text-center" >Play List Top 5</h5>
     <h6 class="text-center"><a href="./template.php?opcion=1">(Lista completa)</a></h6>
     <table class="table table-hover  table-striped">
        <thead class="thead-dark">
            <tr>
            <th scope="col">#</th>
            <th scope="col">Título</th>
            <th scope="col">Cantor</th>
            <th scope="col">Estilo</th>
            <th scope="col"></th>
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
                    <td><?php echo $Musicas['descricao'] ?></td>
                    <td>
                        <audio controls>
                            <source src="<?php echo $Musicas['caminho'] ?>" type="audio/mp3">
                        </audio>
                    </td>
                    <td>
                        <form action="pages/conexao.php" method="POST"> 
                            <input type="hidden" name="id" value="<?php echo $Musicas['id'] ?>">
                            <input type="hidden" name="acao" value="Apagar">
                            <button type="submit" name="enviar" value="enviar" class="btn btn-danger">
                                X
                            </button>
                        </form>
                        <a type="button" class="btn btn-primary" href="?opcion=3&id2=<?php echo $Musicas['id']?>">
                               V
                        </a>
                    </td>
                        </tr>
                    <?php if($n>=6) break; ?>
                    <?php }
             ?>



   
        </tbody>
    </table>
                <!--    <a type="button" class="btn btn-primary" href="?opcion=2">Adicionar11 Musica</a> -->

                <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#musicaModal">
                            Adicionar Musica
                    </button>
        </div>



        <div class="col-md-4">
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img class="d-block w-100" src="./imagens/imag1.JPG" alt="First slide">
                </div>
                <div class="carousel-item">
                <img class="d-block w-100" src="./imagens/imag2.JPG" alt="Second slide">
                </div>
                <div class="carousel-item">
                <img class="d-block w-100" src="./imagens/imag3.JPG" alt="Third slide">
                </div>
            </div>
        </div>
</div>
</div>
