<?php
class TelefoneDAO
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function buscarPorId($telefone)
    {
        // Funcionamento já verificado
        $sql = "SELECT * FROM telefones WHERE id_telefone = :telefone";
        $stmt = $this->pdo->prepare($sql);
        $telefone = $telefone->getId();
        $stmt->execute(['telefone' => $telefone]);  
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function buscarTodos($telefone)
    {
        $sql = "SELECT * FROM telefones";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();  
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}

