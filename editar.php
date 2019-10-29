<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bootstrap.css">

    <title>Agenda PMNF 2019</title>
  </head>
  <body>
   
    <!--    NAVBAR-->
    <div class="container menu">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">AGENDA PMNF 2019</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Fazenda <span class="sr-only">(página atual)</span></a>
                </li>
                <li class="nav-item mr-3">
                    <a class="nav-link" href="#">Contato</a>
                </li>
            </ul>
<!--
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><strong>Pesquisar</strong></button>
            </form>
-->
        </div>
    </nav>
    </div>
    <!--    END NVABR -->
    
    <?php
//    Connection data  
    $mysqli = new mysqli('localhost', 'root', '', 'agendapmnf') or die(mysqli_error($mysqli));  
    
//    Recebendo parametros do index e select no BD  
        $edit_id=$_GET['editar'];
        $query="SELECT * FROM fazenda WHERE id='$edit_id'";
        $run=mysqli_query($mysqli,$query);
        while ($row=mysqli_fetch_assoc($run)) {
            $id=$row['id'];
            $secretaria=$row['secretaria'];
            $servidor=$row['servidor'];
            $email=$row['email'];
            $ramal=$row['ramal'];
    ?>   
        
    <!--    FORMULÁRIO      -->    
    <div class="container mt-2 mb-4 p-2 shadow bg-white">
        <h2 class="text-center">Editar Servidor</h2>    
        <div class="form-row justify-content-center">
            <form action="editar.php?edit_form=<?php echo $id; ?>" method="POST">
                <div class="row">
                    <div class="col">
                        <input type="text" name="secretaria" value="<?php echo $secretaria; ?>" title="O nome da sua secretaria '/' seu setor.  p. ex. Administração/Recursos Humanos." class="form-control" placeholder="Secretaria/Setor">
                    </div>
                    <div class="col">
                        <input type="text" name="servidor" value="<?php echo $servidor; ?>" title="Digite o seu login do computador,  p. ex. renato.bravo" class="form-control" placeholder="Servidor/Funcionário">
                    </div>
                    <div class="col">
                        <input type="text" name="email" value="<?php echo $email; ?>" class="form-control" title="De preferência o e-mail institucional: meu_email@pmnf.rj.gov.br Ou secretaria_tal@pmnf.rj.gov.br - Ou se não tiver o que estiver usando atualmente." placeholder="E-mail">
                    </div>
                    <div class="col">
                        <input type="text" name="ramal" value="<?php echo $ramal; ?>" class="form-control" title="Esse campo suporta apenas 4 Dígitos." placeholder="Ramal">
                    </div>

                    <div class="form-group">
                        <button type="submit" name="atualizar" class="btn btn-outline-success ml-2 mr-3"><strong>Atualizar</strong></button>
                    </div>

                </div><!--END ROW-->
            </form><!--END FORM-->
            
        </div><!--END FORM ROW-->
    </div><!-- FOMULÁRIO CONTAINER-->    
    
    <?php } ?>
      
<!--    ALERTA  -->
   <div class="container alerta text-center"> 
        <?php if (isset($_SESSION['message'])): ?>
            <div class="alert alert-<?=$_SESSION['msg_type']?>">
                <?php 
                echo $_SESSION['message'];
                unset($_SESSION['message']);
                ?>
            </div>
        <?php endif ?>
    </div>
<!--       END ALERTA-->        

    
    <!--    FOOTER-->    
    <footer class="footer">
      <div class="container fixed-bottom text-center">
        <span class="text-muted">Desenvolvido por Alex Araujo | PMNF 2019.</span>
      </div>
    </footer>
    <!--    END FOOTER-->

    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
    <!--    TIMER APAGAR ALERTA-->
    <script type="text/javascript">
        $(document).ready(function(){
            setTimeout(function(){
                $(".alert").remove();
            }, 3000);
        })
    </script>
    <!--  END TIMER APAGAR ALERTA-->
  </body>
</html>


<?php
    if(isset($_POST['atualizar'])){
    $id=$_GET['edit_form'];
    $secretaria=$_POST['secretaria'];
    $servidor=$_POST['servidor'];
    $email=$_POST['email'];
    $ramal=$_POST['ramal'];    

    $query="UPDATE `fazenda` SET `secretaria`='$secretaria',`servidor`='$servidor',`email`='$email',`ramal`='$ramal' WHERE id='$id'";    
    $row=mysqli_query($mysqli,$query);
    if($row){
    echo 'ok';
    header('Location: index.php');
        }
    }
?>