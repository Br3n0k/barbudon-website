<?php
/**
 * @class     : Aplication
 * @version   : 1.0.0
 * @author    : Brendown Ferreira
 * @editor    : Brendown Ferreira
 * @updated   : 01/07/2024
 * Classe para gerenciar a aplicação de forma geral, sendo utilizada como o kernel do sistema
 */

namespace App\Config;

use JetBrains\PhpStorm\NoReturn;
use App\Models\Database;
use App\Models\Router;

class Aplication
{
    // Propriedade que vai conter o caminho fisico no servidor para importação de arquivos na raiz.
    public string $root_path;

    // Propriedade que futuramente vai armazenar o tipo da requisição vinda da URL.
    public string $request_method;

    // Propriedade que vai armazenar a requisição na URL para ser tratada pelas classes posteriores.
    public string $request_url;

    // Propriedade que vai armazenar a rota já em array tratada para o sistema.
    public array $route;

    // Propriedade que vai armazenar o roteador da rota
    public string $router_file;

    // Propriedade que vai conter o codigo do errro na aplicação
    public int $error_code;

    // Propriedade que vai conter a descrição do erro na aplicação
    public string $error_message;

    // Dados para comunicação entre os arquivos importados da aplicação
    public array $data;

    // Propriedade que vai armazenar a conexão do PDO com o banco de dados
    public mixed $pdo;

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
            // Instancia a classe de conexão com o banco de dados, e abre a conexão
            $database = new Database();

            // Instancia a classe de roteamento
            $router = new Router();

            // Passsa para classe de rotas o root path da aplicação
            $router->root_path = $this->root_path;

            // Passa a requisição da url para a propriedade do roteador
            $router->route = $this->request_url;

            // Chama a função que vai tratar a rota com o roteador
            $this->route = $router->get_route();

            // Chama a função que vai tratar a rota com o roteador
            $this->router_file = $router->get_router();

            // Inclui e carrega o arquivo do roteador
            include_once($this->router_file);
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

                // Define a propriedade do tipo de requisição para a classe da aplicação
                $this->request_method = $_SERVER['REQUEST_METHOD'];

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