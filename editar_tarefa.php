<?php
include 'Tarefa.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $tarefa = Tarefa::listarTarefas()->fetch_assoc();
}
?>

<?php include '../views/C-header.php'; ?>

<form action="salvar_edicao.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $tarefa['id']; ?>">
    <input type="text" name="tarefa" value="<?php echo $tarefa['tarefa']; ?>" required>
    <input type="date" name="data" value="<?php echo $tarefa['data']; ?>">
    <textarea name="descricao"><?php echo $tarefa['descricao']; ?></textarea>
    <label>
        <input type="checkbox" name="lembrete" <?php echo $tarefa['lembrete'] ? 'checked' : ''; ?>> Lembrar-me
    </label>
    <button type="submit">Salvar Alterações</button>
</form>

<?php include '../views/footer.php'; ?>
