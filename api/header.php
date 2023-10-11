<?php
if (!isset($_SESSION)) {
    session_start();
} ?>

<!DOCTYPE html>
<html lang="en" class="min-vh-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous" defer></script>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <link rel="shortcut icon" href="img/favicon-saviosantanna.png" type="image/x-icon">

    <link rel="stylesheet" href="css/style.css">

</head>

<body class="d-flex flex-column min-vh-100 bg-default m-0">
    <nav class="navbar navbar-expand-lg bg-light fw-bold d-flex justify-content-between">
        <div class="m-2 ms-5">
            <img src="img/Savio-Santanna_logo-sem fundo.png" style="width: 300px;" alt="">
        </div>

        <!-- Mostrar botão de sair se o usuário estiver logado -->

        <?php
        if (isset($_SESSION['login'])) {
        ?>
            <div class="me-4 m-2">
                <a href="checkLogout.php" class="text-decoration-none text-white"><button class="btn btn-danger" name="btn-sair">Sair</button></a>
            </div>
        <?php } ?>

    </nav>
    <div class="container border-bottom border-dark border-2 w-75"></div>