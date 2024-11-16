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
}

