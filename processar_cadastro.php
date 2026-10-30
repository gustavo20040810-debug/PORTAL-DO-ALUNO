<?php
// TODO 09: sessão
session_start();

// TODO 10: funções, carregadas só uma vez
require_once __DIR__ . '/includes/funcoes.php';

// TODO 11: só processa se o método for POST
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: cadastro.php");
    exit;
}

// TODO 12: recebimento dos campos
$nome  = limparTexto(filter_input(INPUT_POST, "nome") ?? "");
$email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL); // false = inválido, null = ausente
$idade = filter_input(INPUT_POST, "idade", FILTER_VALIDATE_INT);   // false = inválido, null = ausente

// TODO 13: validação (na ordem pedida)
$erro = "";
if ($nome === "") {
    $erro = "O nome não pode estar vazio.";
} elseif ($email === false || $email === null) {
    $erro = "Informe um e-mail válido.";
} elseif ($idade === false || $idade === null || $idade <= 0) {
    $erro = "A idade deve ser um número inteiro maior que zero.";
}

// TODO 14: cadastro inválido
if ($erro !== "") {
    $_SESSION["erro"] = $erro;
    $_SESSION["dados_anteriores"] = [
        "nome"  => $nome,
        "email" => $_POST["email"] ?? "",  // valor bruto digitado
        "idade" => $_POST["idade"] ?? ""
    ];
    header("Location: cadastro.php");
    exit;
}

// TODO 15: cadastro válido
$_SESSION["aluno"] = [
    "nome"  => $nome,
    "email" => $email,
    "idade" => $idade
];
$_SESSION["mensagem"] = "Cadastro realizado com sucesso!";
header("Location: resultado.php");
exit;
