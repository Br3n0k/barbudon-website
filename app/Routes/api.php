<?php
/**
 * @file     : api.php
 * @version   : 1.0.0
 * @author    : Brendown Ferreira
 * @editor    : Brendown Ferreira
 * @updated   : 01/07/2024
 * Arquivo de roteamento para requisições de navegação da parte de api do frontend
 */

// Define o retorno das informações como JSON
header("Content-Type: application/json; charset=utf-8");


// Define um retorno padrão da api em caso de falhas
$this->api_response = [
    'success' => false,
    'code' => 500,
    'message' => 'Falha na inicialização da API',
];

http_response_code($this->api_response['code']);
echo json_encode($this->api_response, JSON_UNESCAPED_UNICODE);