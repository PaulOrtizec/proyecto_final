<?php
function obtenerCargos() {
    // Puedes personalizar esta lista según tus necesidades
    return ['estudiante', 'profesor', 'administrador'];
}

function validarCargo($cargo) {
    $cargos = obtenerCargos();
    return in_array($cargo, $cargos);
}
?>
