# 📘 Projeto Prog3-A1-POO

**Aluna:** Ana Carla Londero Cazarotto  
**Turma:** Sistemas de Informação - Unoesc Chapecó

## 📝 Descrição

Este projeto é a resolução da proposta de trabalho:

> **PROJETO A1 – Programação III**  
> Sistema de Registro de Usuários com PHP utilizando **Programação Orientada a Objetos (POO)**.

O sistema implementa funcionalidades básicas de autenticação de usuários com uso de **sessões**, **cookies** e **boas práticas com validação e sanitização de dados**.

---

## ✅ Requisitos Atendidos e Solução Técnica

### 1. Cadastro
- Formulário com campos de **Nome, E-mail e Senha**.
- Dados validados e sanitizados.
- Informações encapsuladas em objetos da classe `Usuario`.
- Os usuários cadastrados são armazenados em **sessão** (array de usuários persistente).

### 2. Login
- Formulário com **E-mail, Senha** e opção "Lembrar e-mail".
- Validação e autenticação utilizando os dados armazenados em sessão.
- Caso as credenciais estejam corretas:
  - Sessão é iniciada.
  - Cookie é criado (se checkbox for marcado) ou removido (caso contrário).

### 3. Dashboard
- Mostra o **nome do usuário logado** (usando sessão).
- Mostra o **e-mail armazenado no cookie** (se existir).
- Exibe a **lista de todos os usuários cadastrados** na sessão atual.

### 4. Logout
- Remove o usuário logado da sessão.
- Mantém os demais usuários cadastrados.
- Remove o cookie de e-mail, se existir.

---

## 🛠️ Estrutura de Diretórios

```
/classes          # Classes de objetos e seus métodos 
│   ├── Autenticador.php
│   ├── Sessao.php
│   └── Usuario.php

/services         # Serviços responsáveis pelo processamento de dados
│   ├── logout.php
│   ├── processa_cadastro.php
│   └── processa_login.php

/style            # Arquivo de estilo (CSS)
│   └── style.css

/templates        # Páginas HTML com formulários e visualizações
│   ├── cadastro.php
│   ├── dashboard.php
│   └── login.php

/index.php        # Página inicial do projeto
```

---

## ▶️ Instruções para Execução com XAMPP

1. Instale o [XAMPP](https://www.apachefriends.org/index.html), caso ainda não tenha.
2. Baixe o repositório do projeto (via GitHub ou .zip) [PROJETO](https://github.com/anacazarotto/prog3-a1-poo-ana-carla-londero-cazarotto).
3. Copie a **pasta do projeto** e cole dentro de:
   ```
   C:\xampp\htdocs\
   ```
4. Inicie o servidor **Apache** pelo painel do XAMPP.
5. Acesse em seu navegador:
   ```
   http://localhost/prog3-a1-poo-ana-carla-londero-cazarotto/
   ```
