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
        <title>Novo Genero</title>
    </head>
    <body>
        <h1>Novo Genero</h1>
        <form action="insert.php" method="post">
            <label for="nome">Nome do Genero</label>
            <input type="text" required name="name" />
            <button type="submit">Salvar</button>
        </form>
    </body>
</html>