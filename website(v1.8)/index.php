<?php

include_once 'config/conexao.php';
include_once 'config/constantes.php';
include_once 'func/funcoes.php';

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Touch Cell</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/styleindex.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Play&display=swap" rel="stylesheet">
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


<div id="carouselExample" class="carousel slide">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="./img/banners/1.png" class="d-block" alt="..." style="width: 100%;height: 400px;">
        </div>
        <div class="carousel-item">
            <img src="./img/banners/2.png" class="d-block" alt="..." style="width: 100%;height: 400px;">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-3">
            <div>
                <br>
                <div class="container-fluid">
                    <a class="navbar-brand" href="#"><img src="./img/banners/bannerpromos5.gif" alt="Promoções Imperdíveis" style="width: 100%;"></a>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="row">
                <?php
                $retorno = listarTabela("idproduto, img", "produto", "idproduto");

                if ($retorno != "Vazio") {
                    $contador = 0;
                    $contado = FALSE;
                    foreach ($retorno as $itemretorno) {
                        $contador++;
                        $itemimagem = $itemretorno->img;
                        $itemid = $itemretorno->idproduto;
                        if ($contador % 9 == 0) {

                            ?>
                            <img src="img/banners/banner1.gif" alt="" class="mt-4" id="banner1562">

                            <?php
                        }
                        ?>
                        <div class="col-md-3 mt-4">
                            <div class="cardzin" style="width: 14rem;min-height: 100%;">
                                <img src="./img/prods/<?php echo $itemimagem; ?>" class="card-img-top img-fluid"
                                     alt="...">
                                <div class="card-body">
                                    <button class="btnbuy" onclick="(verproduto(<?php echo $itemid ?>))"> Ver Mais
                                    </button>
                                </div>
                            </div>

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
        <div class="col-3">
            <div>
                <br>
                <div class="container-fluid">
                    <a class="navbar-brand" href="#"><img src="./img/banners/bannerpromos4.gif"
                                                          alt="Promoções Imperdíveis" style="width: 100%; "></a>
                </div>
            </div>
        </div>
    </div>

    <br><br>
</div>


<footer>
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                </div>
                <div class="col">
                    <a href="#"><i class="fa fa-instagram"></i></a>
                </div>
                <div class="col">
                    <a href="#"><i class="fa fa-youtube"></i></a>
                </div>
                <div class="col">
                    <a href="#"><i class="fa fa-twitter"></i></a>
                </div>
            </div>
        </div>

        <div class="row">
            <ul>
                <li><a href="#">Nos Contate</a></li>
                <li><a href="#">Outros Serviços</a></li>
                <li><a href="#">Política de Privacidade</a></li>
                <li><a href="#">Termos e Condições</a></li>
                <li><a href="#">História</a></li>
            </ul>
        </div>

        <div class="row">
            TechWeb Copyright © 2021 TechWeb - Todos os Direitos Reservados
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
<script src="js/func.js">
</script>
</body>

</html>