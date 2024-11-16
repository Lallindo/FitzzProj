<?php
// Funcionamento já verificado
class Especificacao
{
    private $id_espec = 0;
    private $cor_espec = '';
    private $tamanho_espec = '';
    private $quantidade_espec = 0;
    private $imgs_espec = [];

    public function __construct(
        $id_espec = 0,
        $cor_espec = '',
        $tamanho_espec = '',
        $quantidade_espec = 0,
        $imgs_espec = []
    ) {
        $this->id_espec = $id_espec;
        $this->cor_espec = $cor_espec;
        $this->tamanho_espec = $tamanho_espec;
        $this->quantidade_espec = $quantidade_espec;
        $this->imgs_espec = $imgs_espec;
    }

    public function getId() {
        return $this->id_espec;
    }

    public function setId($id) {
        $this->id_espec = $id;
    }

    public function getCor() {
        return $this->cor_espec;
    }

    public function setCor($cor) {
        $this->cor_espec = $cor;
    }

    public function getTam() {
        return $this->tamanho_espec;
    }

    public function setTam($tam) {
        $this->tamanho_espec = $tam;
    }

    public function getQuant() {
        return $this->quantidade_espec;
    }

    public function setQuant($quant) {
        $this->quantidade_espec = $quant;
    }

    public function getImg() {
        return $this->imgs_espec;
    }

    public function setImg($img) {
        $this->imgs_espec[] = $img;
    }
}