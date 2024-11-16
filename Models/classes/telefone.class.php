<?php
// Funcionamento já verificado
class Telefone
{
    private $id_telefone = 0;
    private $numero_telefone = '';

    public function __construct(
        $id_telefone = 0,
        $numero_telefone = ''
    ) {
        $this->id_telefone = $id_telefone;
        $this->numero_telefone = $numero_telefone;
    }

    public function getId()
    {
        return $this->id_telefone;
    }

    public function setId($id)
    {
        $this->id_telefone = $id;
    }

    public function getNum()
    {
        return $this->numero_telefone;
    }

    public function setNum($num)
    {
        $this->numero_telefone = $num;
    }
}