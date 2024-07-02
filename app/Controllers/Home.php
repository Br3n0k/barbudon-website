<?php
// Define as informações do HTML do frontend.
$this->data['html']['title'] = 'Inicio - '.$_ENV['APP_NAME'];
$this->data['html']['css'] = $_ENV['APP_URL'].'css/home.css';

// Inclui a pagina inicial do sistema.
include($this->root_path . 'resources/views/pages/home.php');