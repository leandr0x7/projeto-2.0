<?php
include 'php/listar_tarefas.php';
?>

<?php include 'views/header.php'; ?>

<h2>Lembretes</h2>
<ul class="reminder-list">
    <?php
    $hoje = new DateTime();
    $intervaloLembrete = 3;
    $tarefas = listarTarefas();

    while ($tarefa = $tarefas->fetch_assoc()):
        if ($tarefa['data']) {
            $dataTarefa = new DateTime($tarefa['data']);
            $diferencaDias = $hoje->diff($dataTarefa)->days;
            if ($diferencaDias <= $intervaloLembrete && $tarefa['lembrete'] && $dataTarefa >= $hoje):
    ?>
                <li>
                    <strong><?php echo $tarefa['tarefa']; ?></strong> - <?php echo $tarefa['descricao']; ?>
                    <small>Data: <?php echo $tarefa['data']; ?> (Faltam <?php echo $diferencaDias; ?> dias)</small>
                </li>
    <?php
            endif;
        }
    endwhile;
    ?>
</ul>

<form action="php/adicionar_tarefa.php" method="POST" class="task-form">
    <input type="text" name="tarefa" placeholder="Título da Tarefa" required>
    <input type="date" name="data">
    <textarea name="descricao" placeholder="Descrição"></textarea>
    <label><input type="checkbox" name="lembrete"> Lembrar-me</label>
    <button type="submit"><i class="fas fa-plus"></i> Adicionar</button>
</form>

<h2>Lista de Tarefas</h2>
<ul class="task-list">
    <?php
    $tarefas = listarTarefas();
    while ($tarefa = $tarefas->fetch_assoc()):
    ?>
        <li>
            <?php echo $tarefa['tarefa']; ?>
            <a href="php/editar_tarefa.php?id=<?php echo $tarefa['id']; ?>">Editar</a> | 
            <a href="php/deletar_tarefa.php?id=<?php echo $tarefa['id']; ?>" onclick="return confirm('Tem certeza?')">Excluir</a>
        </li>
    <?php endwhile; ?>
</ul>

<?php include 'views/footer.php'; ?>
