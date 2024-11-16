<?php
class ItemDAO
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function buscarPorId($item)
    {
        // Funcionamento já verificado
        $sql = "SELECT * FROM itens WHERE id_item = :item";
        $stmt = $this->pdo->prepare($sql);
        $item = $item->getId();
        $stmt->execute(['item' => $item]);  
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}

