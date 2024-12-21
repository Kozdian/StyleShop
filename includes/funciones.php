<?php

function debug($variable) : string {
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}

// Escapa / Sanitizar el HTML
function s($html) : string {
    $s = htmlspecialchars($html);
    return $s;
}

function esUltimo(string $actual, string $proximo): bool {
    if($actual !== $proximo):
        return true;
    endif;

    return false;
}



// Función que revisa que el usuario esta autenticado 
function isAuth() : void {
    if(!isset($_SESSION['login'])):
        header('Location: /');
    endif;
}


function isAdmin(): void {
    if(!isset($_SESSION['admin'])):
        header('Location: /cita');
    endif;
}
