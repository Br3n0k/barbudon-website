<nav class="navbar navbar-expand">
    <div class="container w-100">
        <a class="navbar-brand d-flex align-items-center logo" href="<?=$_ENV['APP_URL']?>">
            <span class="bs-icon-sm bs-icon-rounded bs-icon-primary d-flex justify-content-center align-items-center me-2 bs-icon">
                <img src="<?=$_ENV['APP_URL'].'img/icons/origin.png'?>" style="max-height: 40px;" alt="Logo">
            </span>
            <span><?=$_ENV['APP_NAME']?></span>
        </a>
        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navcol-2">
            <span class="visually-hidden">Toggle navigation</span>
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="navcol-2" class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link active" href="<?=$_ENV['APP_URL']?>">Inicio</a></li>
                <li class="nav-item"><a class="nav-link" href="<?=$_ENV['DISCORD_SERVER_INVITE']?>">Discord</a></li>
                <li class="nav-item"><a class="nav-link" href="<?=$_ENV['APP_URL']?>login">Login</a></li>
                <li class="nav-item"><a class="nav-link" href="<?=$_ENV['APP_URL']?>register">Register</a></li>
            </ul>
        </div>
    </div>
</nav>