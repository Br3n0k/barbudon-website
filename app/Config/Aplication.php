<?php

namespace App\Config;

use JetBrains\PhpStorm\NoReturn;

class Aplication
{
    public string $root_path;
    public string $request_method;
    public string $request_url;
    public array $route;

    // Classe construtora
    public function __construct()
    {

    }

    // Função de configuração da aplicação
    public function configure($root_path, $request_url): static
    {
        // Define a propriedade de rooth path do sistema
        (!empty($root_path)) ? $this->root_path = $root_path : $this->error('501', 'Falha na definição da pasta raiz do sistema.');

        // Define a propridade de request url
        (!empty($request_url)) ? $this->request_url = $request_url : $this->error('501', 'Falha no armazenamento da URL solicitada.');
        
        return $this;
    }

    // Função que vai trabalhar os erros no sistema
    #[NoReturn] public function error($code, $message): void
    {
        http_response_code($code);
        echo $message;
        exit();
    }
}