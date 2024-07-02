<?php
/**
 * @file     : header.php
 * @version   : 1.0.0
 * @author    : Brendown Ferreira
 * @editor    : Brendown Ferreira
 * @updated   : 01/07/2024
 * Arquivo construtor do html header da aplicação para o frontend
 */
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?=!empty($this->data['html']['title']) ? $this->data['html']['title'] : "Pagina Inicial";?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="<?=$_ENV['APP_URL'].'css/app.css'?>" rel="stylesheet">
    <?PHP
    if(!empty($this->data['html']['css'])) echo '<link href="'.$this->data['html']['css'].'" rel="stylesheet">';
    // Inclui as partes de SEO do sistema
    include_once ($this->root_path.'resources/views/parts/seo.php');
    ?>
</head>