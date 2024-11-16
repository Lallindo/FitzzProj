<?php
class ProdutoDAO
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function buscarPorId($produto)
    {
        // Funcionamento já verificado
        $sql = "SELECT * FROM produtos WHERE id_produto = :produto";
        $stmt = $this->pdo->prepare($sql);
        $produto = $produto->getId();
        $stmt->execute(['produto' => $produto]);  
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    
}

