<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tela de Cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/stylecad.css">
</head>
<body>
<br>
<a href="./telalogin.php" class="btnvoltar">VOLTAR</a>

<div class="painel">
    <h1>FAÇA SEU CADASTRO</h1>
    <br><br>
    <form action="" method="post" name="formcad" id="frmCad">
        <input class="nome" type="text" name="nome" placeholder="NOME" id="cadnome" required>
        <br><br>
        <input class="email" type="text" name="email" placeholder="EMAIL" id="cademail" required>
        <br><br>
        <input class="senha" type="text" name="senha" placeholder="SENHA" id="cadsenha" required>
        <br><br>
        <input class="foto" type="file" name="foto">
        <br><br>
        <input class="inputSubmit" type="submit" name="submit" value="CADASTRAR">
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>