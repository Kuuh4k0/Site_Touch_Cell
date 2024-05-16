<?php
include_once 'config/conexao.php';
include_once 'config/constantes.php';
include_once 'func/funcoes.php';
$conn = conectar();
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);


if (isset($dados)) {

    $email = $dados['email'];
    $senha = $dados['senha'];
    $retornoValidar = validarSenhaCriptografada('idusuario, nome, email, senha, img, tipo', 'usuario', 'senha', 'email', $senha, $email);
    if ($retornoValidar != null) {

        if ($retornoValidar == 'Email') {
            echo json_encode(['success' => false, 'message' => 'usuario invalido']);
        } else if ($retornoValidar == 'Senha') {
            echo json_encode(['success' => false, 'message' => 'senha invalida']);
        } else {
            $_SESSION['nome'] = $retornoValidar-> nome;
            $_SESSION['img'] = $retornoValidar-> img;
            echo json_encode(['success' => true, 'message' => 'Logado com sucesso']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Login com falha, usuario ou senha estão erradas']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Login nao efetuado, Erro: bd']);
}
?>