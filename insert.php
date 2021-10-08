<?php
require_once './vendor/autoload.php';
use ExemploPDOMySQL\MySQLConnection;
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $bd = new MySQLConnection();
    $comando = $bd->prepare('INSERT INTO generos(nome) VALUES (:nome)');
    $comando->execute([':nome' => $_POST['nome']]);
    header('Location:/index.php');
}
?>

<!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Document</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    </head>
    <body>
        <main class="conteiner">
            <h1>Novo Genero</h1>
            <form action="insert.php" method="post">
                <div class="form-group">
                    <label for="nome">Nome do Genero</label>
                    <input class="form-control" type="text" required name="nome" />
                </div>
                <br />
                <button class="btn btn-success" type="submit">Salvar</button>
            </form>
        </main>
    </body>
</html>