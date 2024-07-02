<html data-bs-theme="dark" lang="pt-br">
<?PHP
    // Inclui o Header do HMTL
    include_once ($this->root_path.'resources/views/parts/header.php');
?>
<body>
<?PHP
    include_once ($this->root_path.'resources/views/parts/navbar.php');
    //include_once ($this->root_path.'resources/views/parts/carousel.php');
?>
<div class="container-fluid">
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
</div>
<?PHP
    include_once ($this->root_path.'resources/views/parts/footer.php');
?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="<?=$_ENV['APP_URL'].'js/app.js'?>"></script>
<script src="<?=$_ENV['APP_URL'].'js/home.js'?>"></script>
</body>
</html>