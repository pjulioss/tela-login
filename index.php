<?php 
require_once "./classes/usuarios.php";

$use = new Usuario;

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>Projeto Login</title>
</head>
<body>
    <div id="corpo-form">
        <h1>Entrar</h1>
        <form method="post">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="senha" placeholder="Senha" required>
            <input type="submit" name="submit" id="" value="Acessar">
            <a href="cadastrar.php">Não tem uma conta? <strong>Cadastre-se!</strong></a>
        </form>
    </div>

<?php 

if(isset($_POST['submit']))
{
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);
    $use->conectar("projeto_login","localhost", "root","");

    if($use->logar($email, $senha))
    {
        
        header("location:perfil.php");
    } else {
        ?>
        <div class='msgErro'>Senha ou email inválidos!</div>
        <?php
    }

} 






; ?>
    
</body>
</html>