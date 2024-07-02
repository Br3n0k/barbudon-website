<?php
// Define as informações do HTML do frontend.
$this->data['html']['title'] = 'Login - '.$_ENV['APP_NAME'];
$this->data['html']['css'] = $_ENV['APP_URL'].'css/login.css';

// Inclui a pagina de login do sistema.
include($this->root_path . 'resources/views/pages/login.php');