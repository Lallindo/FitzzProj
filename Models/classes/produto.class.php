<?php
// Funcionamento já verificado
class Produto {
    private $id_produto = 0;
    private $preco_produto = 0.0;
    private $nome_produto = '';
    private $descricao_produto = '';
    private $especificacoes = [];

    public function __construct(
        $id_produto = 0,
        $preco_produto = 0.0,
        $nome_produto = '',
        $descricao_produto = '',
        $cor_espec = '', 
        $tamanho_espec = '',
        $quant_espec = 0,
        $img_espec
    ) {
        // Adicionar new Especificacoes

        $this->id_produto = $id_produto;
        $this->preco_produto = $preco_produto;
        $this->nome_produto = $nome_produto;
        $this->descricao_produto = $descricao_produto;
        $this->especificacoes[] = new Especificacao(0, $cor_espec, $tamanho_espec, $quant_espec, $img_espec);
    }

    public function getId() {
        return $this->id_produto;
    }

    public function setId($id) {
        $this->id_produto = $id;
    }

    public function getPreco() {
        return $this->preco_produto;
    }

    public function setPreco($preco) {
        $this->preco_produto = $preco;
    }

    public function getNome() {
        return $this->nome_produto;
    }

    public function setNome($nome) {
        $this->nome_produto = $nome;
    }

    public function getDesc() {
        return $this->descricao_produto;
    }

    public function setDesc($desc) {
        $this->descricao_produto = $desc;
    }

    public function getEspec() {
        return $this->especificacoes;
    }

    public function setEspec($cor_espec, $tamanho_espec, $quant_espec, $img_espec) {
        // New Especificacoes
        $this->especificacoes[] = new Especificacao(0, $cor_espec, $tamanho_espec, $quant_espec, $img_espec);
    }
}