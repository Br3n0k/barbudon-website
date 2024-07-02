<header>
    <!-- Navbar -->
    <div id="logo" class="width-100 justify-content-center d-flex">
        <img src="<?=$_ENV['APP_URL'].'img/logo.png'?>" alt="Logo" class="logo">
    </div>

    <!-- Sub-Navbar -->
    <nav id="sub-navbar">
        <ul>
            <li class="nav-item">
                <a href="<?=$_ENV['APP_URL']?>">Inicio</a>
            </li>
            <li class="nav-item">
                <a href="<?=$_ENV['APP_URL']."cheats"?>">Cheats</a>
            </li>
            <li class="nav-item">
                <a href="<?=$_ENV['APP_URL']."status"?>">Status</a>
            </li>
            <li class="nav-item">
                <a href="<?=$_ENV['APP_URL']."login"?>">Login</a>
            </li>
        </ul>
    </nav>
</header>