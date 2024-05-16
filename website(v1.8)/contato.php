<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Touch cell</title>
    <link rel="stylesheet" href="./css/stylectt.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <nav class="navbar">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="./img/logo2.png" alt="Logo" width="100%" height="100%" class="d-inline-block align-text-top">
            </a>
            <a class="btnvoltar" href="index.php">Voltar</a>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-md-6" id="form1">
                <div class="box">
                    <form action="">
                        <fieldset>
                            <legend><b>Contato</b></legend>
                            <br><br>
                            <div class="inputBox">
                                <input type="text" name="nome" id="nome" class="inputUser" required>
                                <label for="nome" class="labelInput">Nome completo</label>
                            </div>
                            <br>
                            <div class="inputBox">
                                <input type="mail" name="email" id="email" class="inputUser" required>
                                <label for="email" class="labelInput">Email</label>
                            </div>
                            <br>
                            <div class="inputBox">
                                <input type="text" name="assunto" id="assunto" class="inputUser" required>
                                <label for="assunto" class="labelInput">Assunto</label>
                            </div>
                            <br>
                            <div class="inputBox">
                                <input type="text" name="desc" id="desc" class="inputUser" required>
                                <label for="desc" class="labelInput">Descrição</label>
                            </div>
                            <br><br>
                            <input type="submit" name="submit" id="submit">
                        </fieldset>
                    </form>
                </div>
            </div>
            <div class="col-md-6" id="form2">
                <br><br>
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d15100.52255874515!2d-41.9673702!3d-18.88128475!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1spt-BR!2sbr!4v1715367170219!5m2!1spt-BR!2sbr" width="600" height="650" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</body>

</html>