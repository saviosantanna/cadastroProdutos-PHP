<?php
include_once 'checkLogin.php';
include_once 'header.php';

if (!isset($_SESSION['produtos'])) {
    $produtos = [
        ["Nome" => "Maçã", "Quantidade" => 20, "Valor" => 3.99],
        ["Nome" => "Banana", "Quantidade" => 11, "Valor" => 6.79],
        ["Nome" => "Melão", "Quantidade" => 9, "Valor" => 8.49],
        ["Nome" => "Limão", "Quantidade" => 45, "Valor" => 7.59],
    ];
    $_SESSION['produtos'] = $produtos;
} else {
    $produtos = $_SESSION['produtos'];
}
?>

<h3 class="m-3">Lista de Produtos</h3>

<div class=" m-5 ">
    <table class="table table-hover text-center m-0 align-middle">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nome</th>
                <th scope="col">Quantidade</th>
                <th scope="col">Valor</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($produtos as $index => $item) { ?>
                <tr>
                    <th scope="row m-0"><?= $index + 1 ?></th>
                    <td><?= $item['Nome'] ?></td>
                    <td><?= $item['Quantidade'] ?></td>
                    <td>R$<?= number_format($item['Valor'], 2, ",", ".") ?>/kg</td>
                    <td>
                        <a href="#"><span class="material-symbols-outlined icone p-1 bg-success text-light border border-dark rounded-3">edit</span></a>
                        <a href="#"><span class="material-symbols-outlined icone p-1 bg-danger text-light border border-dark rounded-3">delete</span></a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <a href="cadastro.php" class="text-decoration-none text-white"><button class="btn btn-secondary mt-2 border border-dark" type="button">Cadastrar Produto</button></a>

</div>

<?php include_once 'footer.php' ?>