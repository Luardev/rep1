<?php
    session_start();
    if (!isset($_SESSION['nome'])){
        header('Location: Login.html');
        exit();
    } 
?>
<script>
    function sair(){
        window.location.href = "Login.html";
    }
</script>
<!DOCTYPE html>
    <head>
    <link rel="stylesheet" type="text/css" href="stilo.css" />
		<title> Calculadora de média </title>
		<script>
			 document.addEventListener('DOMContentLoaded',function(){
            const urlParams = new URLSearchParams(window.location.search);
            const error = urlParams.get('error');
            const errop = document.getElementById('resposta');
            if (error === 'notaboa'){
                errop.textContent = 'Sua média esta aprovada!';
				errop.style.color="green";
            }else if (error === 'notaruim'){
                errop.textContent = 'Sua média esta reprovada!';
				errop.style.color="red";
            }
        })
		</script>
    </head>
    <body>
		<div class="centro">
        <h1> Bem vindo! , <?php echo htmlspecialchars($_SESSION['nome']);?></h1>
		</div>
        <button onclick='sair()'> sair </button>
        <form name="form" method="POST" action="calculo.php">
		<fieldset>
			<legend> Formulario para calculo de notas </legend>
			<label for="nota1"> <h2> Insira a sua primeira nota:</h2> </label>
			<input type="text" id="nota1" name="nota1"> 
			<br>
			<label for="nota2"> <h2> Insira a sua segunda nota:</h2> </label>
			<input type="text" id="nota2" name="nota2">
			<br>
			<br>
			<input type="submit" name="enviar" value="Enviar" onclick="cal()">
            <p id="resposta"> </p>
        </fieldset>
		</form>
    </body>  
</html>