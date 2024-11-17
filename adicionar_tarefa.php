<?php
include 'conexao.php';
include 'Tarefa.php';

$tarefaObj = new Tarefa($conn);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tarefa = $_POST['tarefa'];
    $data = $_POST['data'] ?? null;
    $descricao = $_POST['descricao'] ?? '';
    $lembrete = isset($_POST['lembrete']) ? 1 : 0;

    $tarefaObj->adicionarTarefa($tarefa, $data, $descricao, $lembrete);
    header('Location: ../index.php');
}
?>
