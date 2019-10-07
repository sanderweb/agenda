<?php 
//ALERTA
session_start();

//Connection data
$mysqli = new mysqli('localhost', 'root', '', 'agendapmnf') or die(mysqli_error($mysqli));

// INSERT OK
if (isset($_POST['salvar'])) {
    $secretaria = $_POST['secretaria'];
    $servidor = $_POST['servidor'];
    $email = $_POST['email'];
    $ramal = $_POST['ramal'];
    
    $mysqli->query("INSERT INTO fazenda (secretaria, servidor, email, ramal) VALUES('$secretaria', '$servidor', '$email', '$ramal')") or die($mysqli->error);

    $_SESSION['message'] = "O SERVIDOR CRIADO COM SUCESSO!";
    $_SESSION['msg_type'] = "success";

    header("Location: index.php");
}
// END INSERT OK


//DELETE
if (isset($_GET['deletar'])) {
    $id = $_GET['deletar'];
    $mysqli->query("DELETE FROM fazenda WHERE id=$id") or die ($mysqli->error());

    $_SESSION['message'] = "O SERVIDOR FOI EXCLUIDO!";
    $_SESSION['msg_type'] = "danger";

    header("Location: index.php");
}
//END DELETE

?>