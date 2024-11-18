<?php
class PedidoDAO
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function buscarPorId($pedido)
    {
        // Funcionamento já verificado
        $sql = "SELECT * FROM pedidos WHERE id_pedido = :pedido";
        $stmt = $this->pdo->prepare($sql);
        $pedido = $pedido->getId();
        $stmt->execute(['pedido' => $pedido]);  
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function buscarEndereco($pedido) {
        $sql = "SELECT * FROM enderecos WHERE id_endereco = :end";
        $stmt = $this->pdo->prepare($sql);
        $endereco = $pedido->getEnd();
        $id_endereco = $endereco->getId();
        $stmt->execute(['end' => $id_endereco]);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}

