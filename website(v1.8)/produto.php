<?php
include_once 'config/conexao.php';
include_once 'config/constantes.php';
include_once 'func/funcoes.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn = conectar();
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    if (isset($dados) && !empty($dados)) {
        $_SESSION['idproduto'] = $dados['id'];

        echo json_encode(['sucess' => false]);
    } else {
        echo json_encode(['sucess' => false, "message" => "Erro ao ir a pagina do produto"]);
    }
} else {

    if (isset($_SESSION['idproduto'])) {
?>

        <!DOCTYPE html>
        <html lang="pt-br">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Produtos</title>
            <link rel="stylesheet" href="./css/styleprod.css">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
            <link rel="stylesheet" href="./css/styleindex.css">
        </head>

        <body>
            <nav class="navbar">
                <div class="container">
                    <a class="navbar-brand" href="#">
                        <img src="./img/logo1.png" alt="Logo" width="100%" height="100%" class="d-inline-block align-text-top">
                    </a>
                    <a class="btnctt" href="contato.php">Contato</a>
                    <a class="btnlogar" href="telalogin.php">Logar</a>
                </div>
            </nav>

            <div class="row">
                <div class="col-md-2">

                </div>
                <div class="col-md-8">
                    <div class="card mt-4 bg-white">
                        <div class="card-body bg-white">
                            <div class="row">
                                <?php
                                $retorno = listarId("img, produto, descricao", "produto", "idproduto", $_SESSION['idproduto']);

                                if ($retorno != "Vazio") {

                                    foreach ($retorno as $itemretorno) {
                                        $itemimagem = $itemretorno->img;
                                        $itemnome = $itemretorno->produto;
                                        $itemdescricao = $itemretorno->descricao;
                                ?>
                                        <div class="col-md-3">
                                            <div class="cardzin">
                                                <img src="./img/prods/<?php echo $itemimagem; ?>" class="card-img-top img-fluid" alt="...">
                                            </div>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="row mt-2">
                                                <!-- Nome produto -->
                                                <h3><?php echo $itemnome ?></h3>
                                            </div>
                                            <hr>
                                            <div class="row mt-3 mx-3">
                                                <p class="lead">
                                                    <?php echo $itemdescricao ?>
                                                </p>
                                            </div>
                                            <hr>
                                            <br>

                                        </div>
                                    <?php
                                    }
                                } else {
                                    ?>

                                    <div class="col-12 text-center mt-5 mb-5">
                                        <h1 style="color: white">Sem produtos disponíveis.</h1>
                                    </div>
                                <?php
                                }

                                ?>
                            </div>
                        </div>
                        <div class="btns">
                            <div class="d-flex align-items-end d-flex justify-content-end" id="btns">
                                <button type="button" class="btnaddcart">
                                    Adicionar ao carrinho
                                </button>
                                <button type="button" class="btncomprar">
                                    Comprar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">

                </div>
            </div>
        </body>

        </html>

<?php
    } else {
        header("Location: index.php");
    }
}
?>