<?php
/**
 * @class     : Router
 * @version   : 1.0.0
 * @author    : Brendown Ferreira
 * @editor    : Brendown Ferreira
 * @updated   : 2024
 * @*Classe para gerenciar a requisição de rota para o seu respectivo roteador*@
 */
namespace App\Models;

class Router
{
    public mixed $route;
    public string $router_file;
    public string $root_path;

    // Classe construtora
    public function __construct($route, $root_path)
    {
        // Verifica se os parametros enviados são validos
        if(empty($route) OR empty($root_path))
        {
            echo "Falha ao iniciar o roteador.";
            http_response_code(500);
            exit();
        }

        // Define a propriedade root_path da classe
        $this->root_path = $root_path;

        // Elimina a barra inicial da requisição crua da URL
        $route = substr($route, 1);

        // Cria o array de requisição separada por '/'
        $route = explode('/', $route);

        // Cria o array de requisição para o roteador e armazena na propriedade route da classe
        $this->route = $route;

        // Chama a função que vai tratar a rota com o roteador
        $this->call_router();
    }

    // Função que vai tratar a rota com o roteador
    public function call_router(): void
    {
        // Verifica o indice 0 do array de rota
        if (empty($this->route[0])) {
            // Define o indice 0 do array de rota como 'home'
            $this->route[0] = 'home';
        }

        // Verifica se o arquivo do roteador existe
        if (file_exists($this->root_path . 'app/Routes/' . $this->route[0] . '.php'))
        {
            // Define o caminho do arquivo do roteador
            $this->router_file = $this->root_path . 'app/Routes/' . $this->route[0] . '.php';
        }
        else
        {
            $this->router_file = $this->root_path . 'app/Routes/web.php';
        }

        // Chama o roteador
        require_once($this->router_file);
    }
}