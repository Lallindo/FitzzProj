<?php
class EspecificacaoDAO
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function buscarPorId($espec)
    {
        // Funcionamento já verificado
        $sql = "SELECT * FROM especificacoes WHERE id_espec = :espec";
        $stmt = $this->pdo->prepare($sql);
        $espec = $espec->getId();
        $stmt->execute(['espec' => $espec]);  
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function buscarTodos($espec)
    {
        // Funcionamento já verificado
        $sql = "SELECT * FROM especificacoes";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();  
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function removerEspec($espec) {
        $sql = "DELETE FROM especificacoes WHERE id_espec = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'id' => $espec->getId()
        ]);
    }
}
