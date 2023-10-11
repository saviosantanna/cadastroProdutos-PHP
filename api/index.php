<?php
session_start();
include_once 'header.php';
include_once 'validacoes.php';

$user = filter_input(INPUT_POST, 'user', FILTER_SANITIZE_SPECIAL_CHARS);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
$msg = "";
$email = 'admin@admin.com';
$senha = 'admin123';

if (isset($_POST['btn-clear'])) {
    $user = "";
    $password = "";
    redirectIndex();
}

if (isset($_POST['btn-login'])) {
    $user = trim($user);
    if (!empty($user) && !empty($password)) {

        $msg = validaLogin($user, $password, $email, $senha);

        if ($msg === true) {
            session_start();
            $_SESSION['login'] = true;
            redirectConsulta();
        } else {
            if ($msg === 'invalid_email') {
                $msg = 'O e-mail inserido é inválido, favor verificar!';
            } else {
                $msg = 'Usuário e/ou senha incorretos, favor tentar novamente.';
            }
        }
    } else {
        if (empty($user) && empty($password)) {
            $msg = 'Favor preencher os campos de email e a senha';
        } else {
            if (empty($user)) {
                $msg = 'O e-mail deve ser preenchido!';
            } else {
                $msg = 'A senha deve ser preenchida!';
            }
        }
    }
}

?>
<div class="container col-6 mt-3 mb-3 card-login">
    <div class="card-body card rounded-5 shadow">
        <h2 class="d-flex justify-content-center fs-3 mb-3">Login de Usuário</h2>
        <form action="" method="post">
            <div class="m-2">
                <div class="form-group">
                    <label for="user" class="form-label">Email</label>
                    <input type="text" class="form-control" name="user" id="user" placeholder="email@examplo.com" value=<?= $user ?>>
                </div>
                <div class="form-group">
                    <label for="password" class="form-label">Senha</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Senha" value=<?= $password ?>>
                </div>
                <input type="submit" name="btn-login" class="btn btn-secondary mt-3 border border-dark" value="Login">
                <input type="submit" name="btn-clear" class="btn btn-light mt-3 border border-dark" value="Limpar">
                <p class="m-0 text-danger mt-2"><?= $msg ?></p>
            </div>
        </form>
    </div>
</div>

<?php include_once 'footer.php' ?>