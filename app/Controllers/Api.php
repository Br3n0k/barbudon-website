<?php
/**
 * @file     : Api.php
 * @version   : 1.0.0
 * @author    : Brendown Ferreira
 * @editor    : Brendown Ferreira
 * @updated   : 02/07/2024
 * Controlador para requisições da API
 */

// Define o retorno das informações como JSON
header("Content-Type: application/json; charset=utf-8");

// Permite o acesso de qualquer origem
header("Access-Control-Allow-Origin: *");

// Permite o acesso de qualquer tipo de requisição
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");

// Permite o acesso de qualquer tipo de cabecalho
header("Access-Control-Allow-Headers: *");

// Define um retorno padrão da api em caso de falhas
$this->api_response = [
    'success' => false,
    'code' => 500,
    'message' => 'Falha na inicialização da API',
];

// Implementação das requisições da API

// Define o codigo de resposta da requisição
http_response_code($this->api_response['code']);

// Efetua o retorno da requisição
echo json_encode($this->api_response, JSON_UNESCAPED_UNICODE);