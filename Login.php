<?php
session_start();
require "conexcao.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nome = $_POST['Nome'];
    $senha = $_POST['senha'];
    // prepara isntrução
    $stm = $con->prepare("SELECT * FROM `usuarios` WHERE Nome = ?");
    if ($stm === false){
        die("variavel prepare() falhou" . htmlspecialchars($con->error));
    }
    $stm->bind_param("s",$nome); // nome de usuário como parametro para a consulta ("s" significa que é para ser tratado com uma string)
    $stm->execute();
    $result = $stm->get_result();
    if ($result->num_rows > 0){
        while($user = $result->fetch_assoc()){
            if($senha == $user['Senha']){
              $_SESSION['nome'] = $nome;
              header('Location: index.php');
              exit();
            }
        }
        header('Location: Login.html?error=incorrect');
        exit();
    }
    else{
        header('Location: Login.html?error=exist');
        exit();
    }
}
?>