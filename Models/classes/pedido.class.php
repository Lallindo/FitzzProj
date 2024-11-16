<?php
// Funcionamento já verificado
class Pedido
{
    private $id_pedido = 0;
    private $tipo_pag_pedido = '';
    private $status_pedido = '';
    private $data_cria_pedido = '';
    private $usuario = null;
    private $item = [];
    private $endereco = null;
    public function __construct(
        $id_pedido = 0,
        $tipo_pag_pedido = '',
        $status_pedido = '',
        $data_cria_pedido = '',
        $usuario = '',
        $item = [],
        $endereco    
        ) {
        $this->id_pedido = $id_pedido;
        $this->tipo_pag_pedido = $tipo_pag_pedido;
        $this->status_pedido = $status_pedido;
        $this->data_cria_pedido = $data_cria_pedido;
        $this->usuario = $usuario;
        $this->item = $item;
        $this->endereco = $endereco;
    }

    public function getId()
    {
        return $this->id_pedido;
    }

    public function setId($id)
    {
        $this->id_pedido = $id;
    }

    public function getTipo()
    {
        return $this->tipo_pag_pedido;
    }

    public function setTipo($tipo)
    {
        $this->tipo_pag_pedido = $tipo;
    }
    
    public function getStatus()
    {
        return $this->status_pedido;
    }

    public function setStatus($status)
    {
        $this->status_pedido = $status;
    }
    
    public function getData()
    {
        return $this->data_cria_pedido;
    }

    public function setData($data)
    {
        $this->data_cria_pedido = $data;
    }
    public function getUser()
    {
        return $this->usuario;
    }

    public function setUser($user)
    {
        $this->usuario = $user;
    }
    
    public function getItem()
    {
        return $this->item;
    }

    public function setItem($item)
    {
        $this->item[] = $item;
    }

    public function getEnd()
    {
        return $this->endereco;
    }

    public function setEnd($end)
    {
        $this->endereco = $end;
    }
}