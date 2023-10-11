<?php 

function validaNome($nome)
{
    if (str_starts_with($nome, "<") || str_starts_with($nome, ">") || str_starts_with($nome, "'") || str_starts_with($nome, "\"")) {
        return false;
    } else {
        return true;
    }

}

function validaLogin($u, $p, $e, $s)
{
    $u = filter_var(filter_var($u, FILTER_SANITIZE_SPECIAL_CHARS), FILTER_VALIDATE_EMAIL);
    $p = filter_var($p, FILTER_SANITIZE_SPECIAL_CHARS);

    if ($u) {
        if ($u == $e && $p == $s) {
            return true;
        } else {
            return false;
        }
    } else {
        return 'invalid_email';
    }
}

?>