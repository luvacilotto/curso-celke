<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Celke - Administrativo</title>
</head>

<body>
    <?php

    // Inclui o autoloader para carregar as classes automaticamente
    require './vendor/autoload.php';

    // Instancia a classe ConfigController
    $home = new Core\ConfigController;

    // Carrega a página inicial usando o método loadPage
    $home->loadPage();

    ?>
</body>

</html>