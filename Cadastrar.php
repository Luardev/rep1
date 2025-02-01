<?php
    session_start();
    require "conexcao.php";  
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $nome = $_POST['Nome'];
        $senha = $_POST['Senha']; 
        $stm = $con->prepare("SELECT * FROM `usuarios` WHERE Nome = ? and Senha = ?");
        if ($stm === false){
            die("variavel prepare() do SELECT falhou" . htmlspecialchars($con->error));
        }
        $stm->bind_param("ss",$nome,$senha); // nome de usuário como parametro para a consulta 
        $stm->execute();
        $result = $stm->get_result();
        if ($result->num_rows > 0){
            header('Location: Cadastrar.html?error=jaexist');
            exit();
        }else{
            if (strlen($nome) > 30){
                header('Location: Cadastrar.html?error=nomegrande');
                exit();
            }else if (strlen($senha) > 2){
                header('Location: Cadastrar.html?error=senhagrande');
                exit();
            }
            $stm2 = $con->prepare("INSERT INTO `usuarios`(`Nome`, `Senha`) VALUES (?,?)");
            $stm2->bind_param("ss",$nome,$senha); // nome de usuário como parametro para a consulta 
            $stm2->execute();
            if ($stm2 === false){
                die("variavel prepare() do INSERT falhou" . htmlspecialchars($con->error));
                header('Location: Cadastrar.html?error=ncadastrado');
                exit();
            }
            else{
                header('Location: Cadastrar.html?error=cadastrado');
                exit();
            }
            $con->close(); 
        }
    }
?>