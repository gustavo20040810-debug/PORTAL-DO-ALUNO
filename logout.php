<?php
// TODO 21: recupera a sessão
session_start();
// TODO 22: remove os dados da sessão
session_unset();
// TODO 23: destrói a sessão
session_destroy();
// TODO 24: volta para a página inicial
header("Location: index.php");
exit;
