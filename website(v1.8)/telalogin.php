<!doctype html>
<html lang="pt-br">

<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Tela de Login</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
                integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
                crossorigin="anonymous">
        <link rel="stylesheet" href="./css/stylelogin.css">
</head>
<body">
        <br>
        <a href="./index.php" class="btnvoltar">VOLTAR</a>

        <div class="painel">

                <h1>FAÇA SEU LOGIN</h1>
                <br><br>
                <form  method="POST" name="formlogin" action="#" id="frmLogar">
                        <?php
                        
                        $options = [
                                'cost' => 14,
                        ];

                        $senha = '123123123';
                        $senhaHash = password_hash($senha, PASSWORD_BCRYPT, $options);

                        ?>
                        <input class="email" type="text" name="email" placeholder="EMAIL" id="inemail">
                        <br><br>
                        <input class="senha" type="password" name="senha" placeholder="SENHA" id="insenha">
                        <br><br>
                        <button class="inputSubmit" onclick="fazerlogin()" name="submit">ENTRAR</button>
                        <br><br>
                        <div class="alert alert-danger" role="alert" style="display: none; font-size : 80%;" id="erromsg">
                                Email Vazio
                        </div>
                        <br><br>
                        <p class="cad">Se ainda não possui login, <a href="./telacad.php" class="linkcad">CLIQUE
                                        AQUI!</a></p>
        </div>

        <script src="js/func.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
                integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
                crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
                integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
                crossorigin="anonymous"></script>
        
        </body>

</html>