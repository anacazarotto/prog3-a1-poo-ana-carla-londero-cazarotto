<?php
require_once '../classes/Usuario.php';
require_once '../classes/Autenticador.php';
require_once '../classes/Sessao.php';

Sessao::iniciar();

# Caso não esteja logado na sessão o usuário
$usuario = Sessao::get('usuario');
if (!$usuario) {
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../style/style.css">
</head>
<body>
    <div class="container">
        <h1>
            Bem-vindo, <?= htmlspecialchars($usuario->getNome()) ?>! 
            <span style='font-size:50px;'>&#128640;</span>
        </h1>

        <?php if (isset($_COOKIE['email'])): ?>
            <p><b>Email lembrado: <?= htmlspecialchars($_COOKIE['email']) ?></b></p>
        <?php endif; ?>

        <h2>Usuários cadastrados:</h2>
        <?php foreach (Autenticador::usuarios() as $u): ?>
            <b>Usuário:</b> <?= htmlspecialchars($u->getNome()) ?> - <b>Email:</b> <?= htmlspecialchars($u->getEmail()) ?><br>
        <?php endforeach; ?>
        <br>
        <a href="../services/logout.php">
            <button class="sair">Sair</button>
        </a><br><br>
        <a href="../index.php">
            <button>Voltar ao Início</button>
        </a>
    </div>
</body>
</html>
