<?php
include_once 'checkLogin.php';
include_once 'header.php';
include_once 'validacoes.php';

$msg = "";
$nome = $_POST['nome'] ?? "";
$qtd = $_POST['qtd'] ?? "";
$valor = $_POST['valor'] ?? "";
$produtos = $_SESSION['produtos'] ?? "";
$nome = trim($nome);

if (isset($_POST['btn-cadastrar'])) {

    if (validaNome($nome)) {

        $nome = filter_var($nome, FILTER_SANITIZE_SPECIAL_CHARS);

        if ($nome && $qtd && $valor) {
            $existeProduto = false;
            foreach ($produtos as $v) {
                if ($v['Nome'] == $nome) {
                    $existeProduto = true;
                    break;
                }
            }

            if ($existeProduto) {
                $msg = "O produto <strong>" . $nome . "</strong> já existe!";
            } else {
                $msg = "O produto <strong>" . $nome . "</strong> foi cadastrado com sucesso!";
                array_push($produtos, ["Nome" => $nome, "Quantidade" => $qtd, "Valor" => $valor]);
                $_SESSION['produtos'] = $produtos;
                $nome = "";
                $qtd = "";
                $valor = "";
            }
        } else {
            if (!$nome) {
                $msg = $msg . "Favor preencher o Nome.<br>";
            }
            if (!$qtd) {
                $msg = $msg . "Favor preencher a Quantidade.<br>";
            }
            if (!$valor) {
                $msg = $msg . "Favor preencher o Valor.<br>";
            }
        }
    } else {
        $msg = "Nome inválido!";
    }
}

?>

<div class="m-3">
    <div>
        <h3>Novo Produto</h3>
        <p class="fs-4">Preencha os campos abaixo para adicionar um novo produto</p>
        <form action="cadastro.php" method="post">
            <div class="m-2 ms-4 d-flex gap-2 align-middle">
                <div class=" col-4">
                    <div class="form-group mt-2">
                        <label for="nome" class="form-label">Nome</label>
                        <input type="text" class="form-control" name="nome" id="nome" placeholder="Digite o nome..." value=<?= $nome ?>>
                    </div>
                    <div class="form-group mt-2">
                        <label for="qtd" class="form-label">Quantidade</label>
                        <input type="number" class="form-control" name="qtd" id="qtd" placeholder="Digite a quantidade..." step="1" min="0" value=<?= $qtd ?>>
                    </div>
                    <div class="form-group mt-2">
                        <label for="valor" class="form-label">Valor/kg</label>
                        <input type="number" class="form-control" name="valor" id="valor" placeholder="Digite o valor R$0,00" step="0.01" min="0" value=<?= $valor ?>>
                    </div>
                </div>
                <div class="col-5 d-flex flex-column justify-content-center">
                    <p class="text-danger ms-3"><?= $msg ?></p>
                </div>
            </div>
            <input type="submit" name="btn-cadastrar" class="btn btn-secondary mt-3 border border-dark box-shadow-2" value="Cadastrar" data-bs-target="#exampleModal" data-bs-toggle="modal">
            <a href="consulta.php" class="text-decoration-none text-white"><button class="btn btn-light mt-3 border border-dark" type="button">Voltar</button></a>
        </form>
    </div>
</div>


<!-- TODO: verificar funcionamento modal. -->

<!-- 

<div class="modal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

-->


<?php include_once 'footer.php' ?>