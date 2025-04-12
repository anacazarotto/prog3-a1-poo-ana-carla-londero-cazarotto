<?php
require_once '../classes/Sessao.php';

Sessao::iniciar();

# Caso não esteja logado na sessão o usuário
if (Sessao::get('usuario')) {
    header('Location: dashboard.php');
    exit;
}

$emailLembrado = isset($_COOKIE['email']) ? $_COOKIE['email'] : '';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="../style/style.css">
</head>
<body>
    <div class="container">
        <h1>Login</h1>
        <?php if (Sessao::get('mensagem')): ?>
            <p class="mensagem"><?= Sessao::get('mensagem') ?></p>
            <?php Sessao::set('mensagem', null); ?>
        <?php endif; ?>
        <?php if (Sessao::get('mensagem-sucesso')): ?>
            <p class="mensagem-sucesso"><?= Sessao::get('mensagem-sucesso') ?></p>
            <?php Sessao::set('mensagem-sucesso', null); ?>
        <?php endif; ?>
        <form action="../services/processa_login.php" method="POST">
            <div>
                <label for="email">E-mail:</label><br>
                <input type="email" name="email" id="email" value="<?= htmlspecialchars($emailLembrado) ?>" required>
            </div>
            <div>
                <label for="senha">Senha:</label><br>
                <input type="password" name="senha" id="senha" required>
            </div>
            <div>
                <input type="checkbox" name="lembrar" id="lembrar" <?= $emailLembrado ? 'checked' : '' ?>>
                <label for="lembrar">Lembrar e-mail</label>
            </div>
            <button type="submit">Entrar</button>
        </form>
        <p>Não tem uma conta? <a href="cadastro.php">Cadastre-se</a></p>
        <a href="../index.php">
            <button>Voltar ao Início</button>
        </a>
    </div>
</body>
</html>
