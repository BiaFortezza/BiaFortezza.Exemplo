<?php
require_once './vendor/autoload.php';
use ExemploPDOMySQL\MySQLConnection;
$bd = new MySQLConnection();
$genero = null;
if($_SERVER['REQUEST_METHOD'] == 'GET') {
    $comando = $bd->prepare('SELECT * FROM generos WHERE id = :id');
    $comando->execute([':id' => $_GET['id']]);
    
    $genero = $comando->fetch(PDO::FETCH_ASSOC);
}else {
    $comando = $bd->prepare('DELETE FROM generos WHERE id = :id');
    $comando->execute([':id' => $_POST['id']]);

    header('Location:/index.php');
}

?>

<!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Remover Genero</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    </head>
    <body>
        <main class="container">
            <h1>Remover Genero</h1>
            <p>Tem certeza que deseja remover o gênero "<?= $genero['nome'] ?>" ?</p>
            <form action="delete.php" method="post">
                <input type="hidden" name="id" value="<?= $genero['id'] ?>" />
                <a class="btn btn-secondary" href="index.php">Voltar<a/>
                <button class="btn btn-danger" type="submit">Excluir</button>
            </form>
        </main>
    </body>
</html>