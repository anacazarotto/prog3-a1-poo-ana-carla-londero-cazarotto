<?php
class Usuario {
    private string $nome;
    private string $email;
    private string $senha;

    # Construtor da Objeto de Usuario
    public function __construct(string $nome, string $email, string $senha) {
        $this->nome = htmlspecialchars($nome); # Sanetiza o nome
        $this->email = filter_var($email, FILTER_SANITIZE_EMAIL); # Sanetiza o email
        $this->senha = password_hash($senha, PASSWORD_DEFAULT); # Salva o password em hash, seguro
    }

    # Retorna o email do Objeto de Usuario instânciado
    public function getEmail(): string {
        return $this->email;
    }

    # Retorna o nome do Objeto de Usuario instânciado
    public function getNome(): string {
        return $this->nome;
    }

    # Faz a verificação da senha dada a senha digitada e a senha do objeto instânciado
    public function verificarSenha(string $senha): bool {
        return password_verify($senha, $this->senha);
    }
}
