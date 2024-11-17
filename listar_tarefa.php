<?php
include 'B-conexao.php'; // Inclui o arquivo de conexão com o banco de dados

function listarTarefas() {
    global $conn; // Usa a conexão com o banco definida em `conexao.php`
    $query = "SELECT * FROM tarefas ORDER BY data ASC"; // Ordena por data
    return $conn->query($query); // Retorna o resultado da consulta
}
?>

