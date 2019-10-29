<?php 
//ALERTA
session_start();

//Connection data
$mysqli = new mysqli('localhost', 'root', '', 'agendapmnf') or die(mysqli_error($mysqli));

$update = false;

$secretaria = '';
$servidor = '';
$email = '';
$ramal = '';

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
//END DELETE OK

//EDIT
//    if (isset($_GET['editar'])) {
//        $id = $_GET['editar'];
//        $result = $mysqli->query("SELECT * FROM fazenda WHERE id=$id") or die ($mysqli_error());
//        if (count($result)==1) {
//            $row = $result->fetch_array();
//            $secretaria = $row['secretaria'];
//            $servidor = $row['servidor'];
//            $email = $row['email'];
//            $ramal = $row['ramal'];
//        }
//        header("Location: index.php");
//    }
//END EDIT
    
?>