<?php
require_once 'Usuario.php';
require_once 'Sessao.php';

class Autenticador {
    # Coloca em sessão o usuário cadastrado
    public static function registrar(Usuario $usuario) {
        Sessao::iniciar();
        if (!isset($_SESSION['usuarios'])) {
            $_SESSION['usuarios'] = [];
        }
        $_SESSION['usuarios'][] = $usuario;
    }

    # Verifica se o email já existe
    public static function existeEmail($email) {
        Sessao::iniciar();
        $usuarios = $_SESSION['usuarios'] ?? [];

        foreach ($usuarios as $usuario) {
            if ($usuario->getEmail() === $email) {
                return true;
            }
        }
        return false;
    }

    # Utilizando os usuários que existem em sessão caso existam o email e a senha existir é varificado a senha
    # com o método de verificação do Usuário
    public static function logar($email, $senha) {
        Sessao::iniciar();
        $usuarios = $_SESSION['usuarios'] ?? [];

        foreach ($usuarios as $usuario) {
            if ($usuario->getEmail() === $email && $usuario->verificarSenha($senha)) {
                return $usuario;
            }
        }
        return null;
    }

    # Busca todos os usuários existentes em sessão
    public static function usuarios() {
        Sessao::iniciar();
        return $_SESSION['usuarios'] ?? [];
    }
}
