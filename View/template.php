<?php  

?>
<!DOCTYPE html>
<html lang="PT">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <title> Play List </title>
        
        <!-- Custom fonts for this template-->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

        <!-- Page level plugin CSS-->
        <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="css/sb-admin.css" rel="stylesheet">

            
    </head>
    <body>
   
    <?php
             
            $opcion = $_GET['opcion'];
           
            $home = $Consultar = $Adicionar = ' ';


            if(ctype_digit($opcion)){
                switch ($opcion) {
                    case 0: $page= './pages/home.php';
                        $home='active';
                        break;
                    case 1: $page= './pages/ConsultarPl.php';
                        $Consultar='active ';
                        
                        break;
                    case 2: $page= './pages/AdicionarM.php';
                        $Adicionar='active';
                        $subtitulo=' Adicionar Musica';
                        $textobtn='Adicionar';
                        break;
                    case 3: $page= './pages/AdicionarM.php';
                        $Adicionar='active';
                        $subtitulo=' Editar Dados';
                        $textobtn='Atualizar'; 
                        break;
                    case 4: $page= './pages/error.php';                        
                        break;
                    default: $page= './pages/error.php';
                        break;
                }
            }else{
                $page= './pages/error.php';
            }
    ?>


        <nav class="navbar navbar-dark bg-primary">
                <a class="navbar-brand" href="?opcion=0">My Play List</a> 
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    <span>Ver mais</span>
                </button>
               
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="?opcion=1">Play List full <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?opcion=2">Adicionar Musica</a>
                    </li>
                    </ul>
                </div>
         </nav>



 
            
            <?php
                include($page);
            ?>

                <?php
                if($opcion < 4 )
                    $dadossss =MostrarEstilos();
                ?>


                    <!-- Modal -->
                    <div class="modal fade" id="musicaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Nova Musica</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            
                            <form action="pages/conexao.php" method="POST" enctype="multipart/form-data">   
                                <div class="form-row">
                                    <div class="form-group col-md-8">
                                        <label for="titulo">Título da musica</label>
                                        <input type="text" class="form-control" id="titulo" name="titulo" value="" placeholder="Título" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="Cantor">Musica</label>
                                        <input type="file" class="form-control" id="caminho" name="caminho" value="" placeholder="Artista" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Cantor">Cantor</label>
                                    <input type="text" class="form-control" id="Cantor" name="cantor" value="" placeholder="Artista" required>
                                </div>
                                <div class="form-group">
                                    <label for="Cantor">Estilo</label>
                                    <select name="estilo_id" id="estilo" class="form-control" >
                                        <?php  foreach($dadossss as $estilo){ ?>
                                            <option value="<?php echo $estilo['id'] ?>"><?php echo $estilo['descricao'] ?></option>
                                        <?php } ?>
                                    </select>                                    
                                </div>
                                <input type="hidden"name="acao" value="Adicionar">
                               <!-- <button type="submit" name="enviar" value="enviar" class="btn btn-success">Salvar</button>
-->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="enviar" value="enviar" class="btn btn-success">Save changes</button>
                        </div>
                        </form>
                        </div>
                    </div>
</div>

        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Page level plugin JavaScript-->
        <script src="vendor/chart.js/Chart.min.js"></script>
        <script src="vendor/datatables/jquery.dataTables.js"></script>
        <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin.min.js"></script>

        <!-- Demo scripts for this page-->
        <script src="js/demo/datatables-demo.js"></script>
        <script src="js/demo/chart-area-demo.js"></script>

        
          
    </body>


</html>