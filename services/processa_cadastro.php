<?php
require_once '../classes/Usuario.php';
require_once '../classes/Autenticador.php';
require_once '../classes/Sessao.php';

Sessao::iniciar();

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$senha = $_POST['senha'];

if ($nome && $email && $senha) {
    if (Autenticador::existeEmail($email)) {
        Sessao::set('mensagem', 'E-mail já cadastrado!');
        header('Location: ../templates/cadastro.php');
        exit;
    }

    $usuario = new Usuario($nome, $email, $senha);
    Autenticador::registrar($usuario);
    Sessao::set('mensagem-sucesso', 'Cadastro realizado com sucesso!');
    header('Location: ../templates/login.php');
    exit;
} else {
    header('Location: ../templates/cadastro.php');
    exit;
}
