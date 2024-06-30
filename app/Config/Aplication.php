<?php
/**
 * @class     : Aplication
 * @version   : 1.0.0
 * @author    : Brendown Ferreira
 * @editor    : Brendown Ferreira
 * @updated   : 2024
 * Classe para gerenciar a aplicação de forma geral, sendo utilizada como o kernel do sistema
 */

namespace App\Config;

use JetBrains\PhpStorm\NoReturn;
use App\Models\Database;
use App\Models\Router;

class Aplication
{
    public string $root_path;
    public string $request_method;
    public string $request_url;
    public array $route;

    public int $error_code;
    public string $error_message;

    // Classe construtora
    public function __construct()
    {

    }

    // Função que vai iniciar a aplicação
    public function start(): void
    {
        // Verifica se recebeu a requisição da URL e ele não é nulo
        if(empty($this->request_url) OR empty($this->root_path))
        {
            // Define o retorno para o erro
            $this->error_code = 500;
            $this->error_message = 'Falha interna do sistema 2.';

            // Retorna o erro
            $this->error();
        }
        else
        {
            // Instancia a classe de conexão com o banco de dados
            $database = new Database();

            $router = new Router(route: $this->request_url, root_path: $this->root_path);
        }
    }

    // Função de configuração da aplicação
    public function configure($root_path, $request_url): bool
    {
        // Verifica se recebeu conteudo de root path e ele não é nulo
        if(empty($root_path))
        {
            // Define o retorno para o erro
            $this->error_code = 501;
            $this->error_message = 'Falha na definição da pasta raiz do sistema.';

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
                // Define o retorno para o erro
                $this->error_code = 501;
                $this->error_message = 'Falha no armazenamento da URL solicitada.';

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
    #[NoReturn] public function error(): void
    {
        // Verifica se a propriedade error_code foi inicializada
        if(!empty($this->error_code) AND !empty($this->error_message))
        {
            // Define o retorno para o erro
            http_response_code($this->error_code);
            echo $this->error_message;
        }
        else
        {
            // Define o retorno para o erro
            http_response_code(500);
            echo 'Erro interno do sistema.';
        }
        exit();
    }
}