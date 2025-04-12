<?php
require_once '../classes/Sessao.php';

Sessao::iniciar();
Sessao::removeUsuario();

header('Location: ../templates/login.php');

