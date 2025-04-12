<?php

class Sessao {
    # Inicia a sessão
    public static function iniciar() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    # Seta um valor na sessão dado chave/valor
    public static function set($chave, $valor) {
        $_SESSION[$chave] = $valor;
    }

    # Busca um valor(es) na sessão dado uma chave
    public static function get($chave) {
        return $_SESSION[$chave] ?? null;
    }

    # Remove valor(es) na sessão dado uma chave
    public static function remove($chave) {
        unset($_SESSION[$chave]);
    }

    # Remove o usuário logado da sessão
    public static function removeUsuario() {
        self::remove('usuario');
    }

    # Remove toda a sessão
    public static function removeTudo() {
        session_unset();
        session_destroy();
    }
}
