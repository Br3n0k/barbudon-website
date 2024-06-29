<?php
// Diretorio raiz do projeto para importação de arquivos
const DIR_ROOT = __DIR__ . '/../';

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
if($aplication->configure(root_path: DIR_ROOT, request_url: $_SERVER['REQUEST_URI']))
{
    // Inicia a aplicação
    $aplication->start();
}
else
{
    // Retorna o erro da configuração da aplicação
    $aplication->error();
}
