<?php
require_once '../classes/Autenticador.php';
require_once '../classes/Sessao.php';

Sessao::iniciar();

$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$senha = $_POST['senha'];

# Chama o método do Autenticador responsável por verificar a veracidade do usuário
$usuario = Autenticador::logar($email, $senha);

if ($usuario) {
    # Seta o usuário atual na sessão
    Sessao::set('usuario', $usuario);

    if (isset($_POST['lembrar'])) {
        setcookie('email', $email, time() + 3600, "/"); # 1 hora
    } else {
        setcookie('email', '', time() - 3600, '/'); # Remove o email do cookie
    }

    header('Location: ../templates/dashboard.php');
    exit;
} else {
    Sessao::set('mensagem', 'E-mail ou senha inválidos.');
    header('Location: ../templates/login.php');
    exit;
}
