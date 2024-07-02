<html data-bs-theme="dark" lang="pt-br">
<?PHP
// Inclui o Header do HMTL
include_once ($this->root_path.'resources/views/parts/header.php');

if(isset($_POST['email']) && isset($_POST['password']))
{
    var_dump($_POST);
    echo "<br>";
}
?>

<body class="d-flex align-items-center py-4 bg-body-tertiary">
<main class="form-signin w-100 m-auto">
    <form method="post" action="<?=$this->request_url?>">
        <h1 class="h3 mb-3 fw-normal">Painel do Usuário</h1>

        <div class="form-floating">
            <input type="email" class="form-control" id="email" name="email" placeholder="nome@example.com">
            <label for="floatingInput">E-mail</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" id="password" name="password" placeholder="Senha">
            <label for="floatingPassword">Senha</label>
        </div>

        <button class="btn btn-primary w-100 py-2" type="submit">Entrar</button>
    </form>
</main>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="<?=$_ENV['APP_URL'].'js/app.js'?>"></script>
<script src="<?=$_ENV['APP_URL'].'js/login.js'?>"></script>
</body>
</html>
