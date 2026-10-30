<?php
// TODO 25: valida o formato do e-mail (retorna true ou false)
function validarEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

// TODO 26 (bônus): remove espaços no início e no fim do texto
function limparTexto($texto) {
    return trim($texto);
}
