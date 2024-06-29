<?php
// Definição de constantes
const DIR_ROOT = __DIR__ . '/../'; // diretorio raiz do projeto para importação de arquivos

// Inicializa o autoloader do composer
require(DIR_ROOT . 'vendor/autoload.php');

// Instancia a biblioteca do dotenv
$dotenv = Dotenv\Dotenv::createImmutable(DIR_ROOT);

// Carrega o dotenv da aplicação
$dotenv->load();

// Carrega as bibliotecas do sistema
use App\Config\Aplication;

// Instancia a classe da aplicação do sistema
$aplication = new Aplication();

// Configura a aplicação
$aplication->configure(
  root_path: DIR_ROOT,
  request_url: $_SERVER['REQUEST_URI']
);