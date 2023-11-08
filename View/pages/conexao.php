<?php

if(isset($_POST["enviar"])){
    if($_POST["acao"]=="Adicionar")
    AdicionarMusica();
    if($_POST["acao"]=="Atualizar")
    AtualizarMusica();
    if($_POST["acao"]=="Apagar")
    ApagarMusica();
}
 
function db_conect(){
    $servername = "Localhost" ;
    $username = "root" ;
    $password = "" ;
    $dbname = "playlist" ;   
    $connect = mysqli_connect( $servername, $username, $password, $dbname) ;
    return $connect;
}

    function AdicionarMusica(){
        $banco=db_conect();
        $titulo= mysqli_escape_string($banco,$_POST['titulo']);
        $cantor= mysqli_escape_string($banco,$_POST['cantor']);
        $estilo= mysqli_escape_string($banco,$_POST['estilo_id']);

        $arquivo = $_FILES['caminho'];
        //$arq = explode('.', $arquivo['name']);
        $dir = 'musicas/'.$arquivo['name'];

        $arq = explode('.', $arquivo['name']);
            if($arq[sizeof($arq) - 1] != 'mp3' ){
                header("location: ../template.php?opcion=4");
                //die('Formato não suportado');
            }
            else{
                move_uploaded_file($arquivo['tmp_name'], '../musicas/'.$arquivo['name']);

                $sql="INSERT INTO musica (`titulo`, `cantor`, `estilo_id`, `caminho`) VALUES ('$titulo','$cantor','$estilo', '$dir')";
                mysqli_query($banco, $sql);  
                 header("location: ../template.php?opcion=0");
            }                

      

       
    }

    function MostrarMusicas(){
        $banco=db_conect();
        $sql="SELECT musica.*, descricao FROM musica inner join estilo on musica.estilo_id = estilo.id  ORDER BY titulo";
        $res= mysqli_query($banco, $sql);
        $output= array();
        while($resultado=mysqli_fetch_assoc($res)){
            $output[]=$resultado;
        }
        return $output;
    }

    function MostrarEstilos(){
        $banco=db_conect();
        $sql="SELECT * FROM estilo ORDER BY descricao";
        $res= mysqli_query($banco, $sql);
        $output= array();
        while($resultado=mysqli_fetch_assoc($res)){
            $output[]=$resultado;
        }
        return $output;
    }

   function MostrarMusica($id){
       $banco=db_conect();
       $sql="SELECT * FROM musica WHERE id=$id";
       $res=mysqli_query($banco, $sql);
       $out=mysqli_fetch_assoc($res);
       return $out;
   }

   function ApagarMusica(){
       $banco=db_conect();
       $id=mysqli_escape_string($banco, $_POST['id']);
       $sql="DELETE FROM musica WHERE id=$id";
       mysqli_query($banco, $sql);
       header("location: ../template.php?opcion=1");
         }
        
    function AtualizarMusica(){
        $banco=db_conect();
        $id=mysqli_escape_string($banco, $_POST['id']);
        $titulo= mysqli_escape_string($banco,$_POST['titulo']);
        $cantor= mysqli_escape_string($banco,$_POST['cantor']);
        $duracao= mysqli_escape_string($banco,$_POST['duracao']);
        $sql="UPDATE musica SET titulo='$titulo', duracao='$duracao', cantor='$cantor' WHERE id='$id'";
        mysqli_query($banco, $sql);
        header("location: ../template.php?opcion=1");
    }
?>
