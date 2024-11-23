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

    public function buscarIdAposInserido($item) {
        // Pega o último item criado no banco com da mesma especificação e quantidade
        $sql = "SELECT id_item FROM itens WHERE id_espec_item = :id_espec AND quantidade_item = :quant ORDER BY id_item DESC LIMIT 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'id_espec' => $item->getEspec()->getId(),
            'quant' => $item->getQuant()
        ]);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function inserir($item) {
        $sql = "INSERT INTO itens(id_item, id_espec_item, quantidade_item) VALUES (:id, :id_espec, :quant)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'id' => $item->getId(),
            'id_espec' => $item->getEspec()->getId(),
            'quant' => $item->getQuant()
        ]);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}

