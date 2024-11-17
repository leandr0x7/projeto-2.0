<?php
include 'B-conexao.php';
include 'Tarefa.php';

$tarefaObj = new Tarefa($conn);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];
    $tarefa = $_POST['tarefa'];
    $data = $_POST['data'] ?? null;
    $descricao = $_POST['descricao'] ?? '';
    $lembrete = isset($_POST['lembrete']) ? 1 : 0;

    $tarefaObj->atualizarTarefa($id, $tarefa, $data, $descricao, $lembrete);
    header('Location: ../A-index.php');
}
?>
