<?php
// Funcionamento já verificado
class Item
{
    private $id_item = 0;
    private $quant_item = '';
    private $espec = null;
    public function __construct(
        $id_item = 0,
        $quant_item = '',
        $id_espec_item = 0
    ) {
        var_dump($id_espec_item);
        $this->id_item = $id_item;
        $this->quant_item = $quant_item;
        $this->espec = new Especificacao($id_espec_item, '', '', 0, []);
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

    public function getEspec() {
        return $this->espec;
    }

    public function setEspec($id_espec, $cor_espec, $tamanho_espec, $quantidade_espec, $imgs_espec) {
        $this->espec = new Especificacao($id_espec, $cor_espec, $tamanho_espec, $quantidade_espec, $imgs_espec);
    }
}