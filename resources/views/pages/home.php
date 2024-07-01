<html data-bs-theme="dark" lang="pt-br">
<?PHP
    // Inclui o Header do HMTL
    include_once ($this->root_path.'resources/views/parts/header.php');
?>
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