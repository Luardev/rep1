<?php
$nota1 = $_POST["nota1"];
$nota2 = $_POST["nota2"];
$media = ($nota1 + $nota2) / 2;
if ($media >= 5){
    header("Location: index.php?error=notaboa");
    exit();
}else{
    header("Location: index.php?error=notaruim");
    exit();
}
?>