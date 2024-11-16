<?php
// Funcionamento já verificado
class Item
{
    private $id_item = 0;
    private $quant_item = '';

    public function __construct(
        $id_item = 0,
        $quant_item = ''
    ) {
        $this->id_item = $id_item;
        $this->quant_item = $quant_item;
    }

    public function getId()
    {
        return $this->id_item;
    }

    public function setId($id)
    {
        $this->id_item = $id;
    }

    public function getQuant()
    {
        return $this->quant_item;
    }

    public function setQuant($quant)
    {
        $this->quant_item = $quant;
    }
}