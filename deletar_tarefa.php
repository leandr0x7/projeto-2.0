<?php
include 'Tarefa.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    Tarefa::deletarTarefa($id);
    header('Location: ../A-index.php');
    exit();
}
?>
