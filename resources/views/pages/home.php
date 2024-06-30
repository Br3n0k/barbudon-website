<html data-bs-theme="dark" lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home - <?=$_ENV['APP_NAME']?></title>
    <meta name="twitter:title" content="<?=$_ENV['APP_NAME'].' - '.$_ENV['APP_DESCRIPTION']?>" />
    <meta name="twitter:description" content="<?=$_ENV['APP_SEO_DESCRIPTION']?>" />
    <meta property="og:image" content="1024x1024.png" />
    <meta name="description" content="<?=$_ENV['APP_SEO_DESCRIPTION']?>" />
    <meta name="twitter:image" content="1024x1024.png" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta property="og:title" content="<?=$_ENV['APP_NAME'].' - '.$_ENV['APP_DESCRIPTION']?>" />
    <link rel="apple-touch-icon" sizes="180x180" href="<?=$_ENV['APP_URL'].'img/icons/apple-touch-icon.png'?>"">
    <link rel="icon" type="image/png" sizes="32x32" href="<?=$_ENV['APP_URL'].'img/icons/favicon-32x32.png'?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?=$_ENV['APP_URL'].'img/icons/favicon-16x16.png'?>">
    <link rel="manifest" href="<?=$_ENV['APP_URL'].'img/icons/site.webmanifest'?>">
    <link rel="mask-icon" href="<?=$_ENV['APP_URL'].'img/icons/safari-pinned-tab.svg'?>" color="#5bbad5">
    <meta name="apple-mobile-web-app-title" content="<?=$_ENV['APP_NAME']?>">
    <meta name="application-name" content="<?=$_ENV['APP_NAME']?>">
    <meta name="msapplication-TileColor" content="#2b5797">
    <meta name="theme-color" content="#000000">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="<?=$_ENV['APP_NAME'].'css/app.css'?>" rel="stylesheet">
    <link href="<?=$_ENV['APP_NAME'].'css/home.css'?>" rel="stylesheet">
</head>
<body>
    <div class="container-fluid p-0">
        <?PHP
        include_once ($this->root_path.'resources/views/parts/navbar.php');
        //include_once ($this->root_path.'resources/views/parts/carousel.php');
        ?>
        <main class="p-0">
            <div class="position-relative overflow-hidden p-0 p-md-0 m-md-0 text-center bg-body-header">
                <div class="col-md-6 p-lg-5 mx-auto my-5">
                    <h1 class="display-3 fw-bold">Download Loader</h1>
                    <h3 class="fw-normal text-muted mb-3">Baixe aqui o Loader para acessar os cheats da <?=$_ENV['APP_NAME']?></h3>
                    <div class="d-flex gap-3 justify-content-center lead fw-normal">
                        <a class="icon-link" href="<?=$_ENV['APP_URL']."web/loader"?>">
                            Loader
                            <i class="bi bi-chevron-right"></i>
                        </a>
                    </div>
                </div>
                <!--div class="product-device shadow-sm d-none d-md-block"></div-->
                <!--div class="product-device product-device-2 shadow-sm d-none d-md-block"></div-->
            </div>
        </main>
        <?PHP
            include_once ($this->root_path.'resources/views/parts/footer.php');
        ?>
    </div>
</body>
</html>