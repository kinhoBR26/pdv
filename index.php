<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema</title>
    <link rel="icon" href="https://www.w3schools.com/favicon.ico">
    <?php include('header_bootstrap.php');?>
    </head>
<body>
<div class="container">
    <h1>PDV</h1>

    <main class="form-signin w-100 m-auto">
        <form action="login.php" method="post">
            <img class="mb-4" src="https://getbootstrap.com/docs/5.3/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
            <h1 class="h3 mb-3 fw-normal">Qual é seu login e senha?</h1>

            <div class="form-floating">
                <input type="email" class="form-control" name="email" placeholder="Qual é o seu login?">
                <label>Qual é o seu login?</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" name="senha" placeholder="Qual é o sua senha?">
                <label>Qual é o sua senha?</label>
            </div>
            <button class="btn btn-primary w-100 py-2" type="submit">Entrar</button>
        </form>
    </main>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>