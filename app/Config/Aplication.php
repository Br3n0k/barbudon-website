<?php
namespace App\Config;

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
    public function configure($root_path, $request_url): bool
    {
        // Verifica se recebeu conteudo de root path e ele não é nulo
        if(empty($root_path))
        {
            // Retorna erro caso o root path seja nulo
            $this->error('501', 'Falha na definição da pasta raiz do sistema.');

            // Retorna falso
            return false;
        }
        else
        {
            // Define a propriedade e root path para a classe da aplicação
            $this->root_path = $root_path;

            // Verifica se recebeu o conteudo de requisição da URL e ele não é nulo
            if(empty($request_url))
            {
                // Retorna erro caso a requisição da URL seja nulo
                $this->error('501', 'Falha no armazenamento da URL solicitada.');

                // Retorna falso
                return false;
            }
            else
            {
                // Define a propriedade e requisição da URL para a classe da aplicação
                $this->request_url = $request_url;

                // Retorna verdadeiro
                return true;
            }
        }
    }

    // Função que vai trabalhar os erros no sistema
    public function error($code, $message): void
    {
        http_response_code($code);
        echo $message;
    }
}