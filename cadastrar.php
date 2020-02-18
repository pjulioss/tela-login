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
        <h1>Cadastrar</h1>
        <form method="post">
            <input type="text" name="nome" placeholder="Nome Completo" maxlength="30" required>
            <input type="text" name="telefone" placeholder="Telefone" maxlength="30" required>
            <input type="email" name="email" placeholder="Email" maxlength="40" required>
            <input type="password" name="senha" placeholder="Senha" maxlength="15" required>
            <input type="password" name="confSenha" placeholder="Confirmar senha" maxlength="15" required>
            <input type="submit" name="submit" value="Cadastrar">
        </form>
    </div>

<?php 

if(!isset($_POST['submit']))
{
    //echo "Preencha todas as informações";
} else {
    $nome = addslashes($_POST['nome']);
    $telefone = addslashes($_POST['telefone']);
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);
    $confSenha = addslashes($_POST['confSenha']);

    
    
    $use->conectar("projeto_login","localhost", "root","");
    if($use->msgErro == "")
    {
        //tudo certo
        if($senha == $confSenha)
        {
            if($use->cadastrar($nome, $telefone,$email,$senha))
            {
                ?>
            <div class='msgSucesso'>
                Cadastro feito com sucesso!
            </div>
            <?php
        } else {
            ?>
            <div class='msgErro'>
                <p>Esse email já existe, faça <a href="index.php">Login</a> para continuar</p>
            </div>
            <?php
        }
        
    } else {
        ?>
            <div class='msgErro'>
                Verifique as senhas e tente novamente!
            </div>
            <?php
    }
    
} else {
    ?>
    <div class="msgErro">Erro: <?= $use->msgErro ?></div>
    <?php
}

}
; ?>
    
</body>
</html>