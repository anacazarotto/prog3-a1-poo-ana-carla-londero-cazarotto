<?php
require_once '../classes/Sessao.php';

Sessao::iniciar();

# Caso não esteja logado na sessão o usuário
$usuario = Sessao::get('usuario');
if ($usuario) {
    header('Location: dashboard.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro</title>
    <link rel="stylesheet" href="../style/style.css">
</head>
<body>
    <div class="container">
        <h1>Cadastro de Usuário</h1>
        <?php if (Sessao::get('mensagem')): ?>
            <p class="mensagem"><?= Sessao::get('mensagem') ?></p>
            <?php Sessao::set('mensagem', null); ?>
        <?php endif; ?>
        <form action="../services/processa_cadastro.php" method="POST">
            <div>
                <label for="nome">Nome:</label><br>
                <input type="text" name="nome" id="nome" required>
            </div>
            <div>
                <label for="email">E-mail:</label><br>
                <input type="email" name="email" id="email" required>
            </div>
            <div>
                <label for="senha">Senha:</label><br>
                <input type="password" name="senha" id="senha" required>
            </div>
            <button type="submit">Cadastrar</button>
        </form>
        <p>Já tem uma conta? <a href="login.php">Logar</a></p>
        <a href="../index.php">
            <button>Voltar ao Início</button>
        </a>
    </div>
</body>
</html>
