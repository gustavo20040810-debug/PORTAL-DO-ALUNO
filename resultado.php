<?php
// TODO 16: sessão
session_start();

// TODO 17: dados do aluno (null se não existir)
$aluno = $_SESSION["aluno"] ?? null;

// TODO 18: mensagem flash: lê e apaga só a mensagem
$mensagem = $_SESSION["mensagem"] ?? "";
unset($_SESSION["mensagem"]);

// TODO 19: cabeçalho
require __DIR__ . '/includes/cabecalho.php';
?>
<h2>Resultado do cadastro</h2>
<?php if ($mensagem !== ""): ?>
    <p><?= htmlspecialchars($mensagem, ENT_QUOTES, "UTF-8") ?></p>
<?php endif; ?>
<?php if ($aluno !== null): ?>
    <p>Nome: <?= htmlspecialchars($aluno["nome"], ENT_QUOTES, "UTF-8") ?></p>
    <p>E-mail: <?= htmlspecialchars($aluno["email"], ENT_QUOTES, "UTF-8") ?></p>
    <p>Idade: <?= (int) $aluno["idade"] ?></p>
<?php else: ?>
    <p>Nenhum aluno cadastrado nesta sessão.</p>
<?php endif; ?>
<p><a href="cadastro.php">Novo cadastro</a> | <a href="logout.php">Encerrar sessão</a></p>
<?php
// TODO 20: rodapé
require __DIR__ . '/includes/rodape.php';
