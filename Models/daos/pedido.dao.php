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

    public function inserir($pedido) {
        $sql = "INSERT INTO pedidos
        (id_pedido, id_endereco_pedido, id_item_pedido, id_usuario_pedido, pagamento_pedido, status_pedido, datacriacao_pedido) VALUES (:id, :id_end, :id_item, :id_usuario, :pagamento, :stat, :datacriacao_pedido)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'id' => 0,
            'id_end' => $pedido->getEnd()->id_endereco,
            'id_item' => $pedido->getItem()[0]->id_item,
            'id_usuario' => $pedido->getUser(),
            'pagamento' => $pedido->getTipo(),
            'stat' => $pedido->getStatus(),
            'datacriacao_pedido' => $pedido->getData()
        ]);
    }

    public function remover($pedido) {
        $sql = "DELETE FROM pedidos where id_pedido = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'id' => $pedido->getId()
        ]);
    }
}

