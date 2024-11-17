<?php
// php/Tarefa.php
class Tarefa
{
    private $conn;

    public function __construct($dbConnection)
    {
        $this->conn = $dbConnection;
    }

    public function adicionarTarefa($tarefa, $data = null, $descricao = '', $lembrete = false)
    {
        $sql = "INSERT INTO tarefas (tarefa, data, descricao, lembrete) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sssi", $tarefa, $data, $descricao, $lembrete);
        return $stmt->execute();
    }

    public function listarTarefas()
    {
        $sql = "SELECT * FROM tarefas ORDER BY data ASC";
        return $this->conn->query($sql);
    }

    public function atualizarTarefa($id, $tarefa, $data, $descricao, $lembrete)
    {
        $sql = "UPDATE tarefas SET tarefa=?, data=?, descricao=?, lembrete=? WHERE id=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sssii", $tarefa, $data, $descricao, $lembrete, $id);
        return $stmt->execute();
    }

    public function deletarTarefa($id)
    {
        $sql = "DELETE FROM tarefas WHERE id=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>
