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

    public function buscarItens($pedido) {
        $sql = "SELECT * FROM itens WHERE id_pedido_item = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'id' => $pedido->getId()
        ]);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function buscarPedidoEmAberto($pedido) {
        $sql = "SELECT * FROM pedidos WHERE id_usuario_pedido = :id AND status_pedido IS NULL";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'id' => $pedido->getUser()->getId()
        ]);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function finalizarPedido($pedido) {
        $sql = "UPDATE pedidos SET valor_pedido = :valor, pagamento_pedido = :pag, status_pedido = :stat, datacriacao_pedido = CURRENT_DATE WHERE id_pedido = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'valor' => $pedido->getValor(),
            'pag' => $pedido->getTipo(),
            'stat' => $pedido->getStatus(),
            'id' => $pedido->getId()
        ]);
    }

    public function inserir($pedido) {
        $sql = "INSERT INTO pedidos
        (id_pedido, id_endereco_pedido, id_usuario_pedido, pagamento_pedido, status_pedido, datacriacao_pedido) 
        VALUES (:id, :id_end, :id_usuario, :pagamento, :stat, :datacriacao_pedido)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'id' => 0,
            'id_end' => $pedido->getEnd()->getId(),
            'id_usuario' => $pedido->getUser()->getId(),
            'pagamento' => $pedido->getTipo(),
            'stat' => $pedido->getStatus(),
            'datacriacao_pedido' => $pedido->getData()
        ]);
    }

    public function inserirItem($pedido) {
        $sql = "SELECT id_pedido FROM pedidos WHERE id_usuario_pedido = :id AND status_pedido IS NULL";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'id' => $pedido->getUser()->getId()
        ]);
        $id_pedido = $stmt->fetchAll(PDO::FETCH_OBJ);

        // var_dump($id_pedido);

        $sql = "INSERT INTO itens 
        (id_item, id_pedido_item, id_espec_item, quantidade_item) VALUES (:id, :id_pedido, :id_espec, :quant)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'id' => 0,
            'id_pedido' => $id_pedido[0]->id_pedido,
            'id_espec' => $pedido->getItem()[0]->getEspec()->getId(),
            'quant' => $pedido->getItem()[0]->getQuant()
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

