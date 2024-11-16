<?php
// Funcionamento já verificado
class Endereco
{
    private $id_endereco = 0;
    private $tipo_endereco = '';
    private $rua_endereco = '';
    private $bairro_endereco = '';
    private $cidade_endereco = '';
    private $estado_endereco = '';
    private $cep_endereco = '';

    public function __construct(
        $id_endereco = 0,
        $tipo_endereco = '',
        $rua_endereco = '',
        $bairro_endereco = '',
        $cidade_endereco = '',
        $estado_endereco = '',
        $cep_endereco = ''
    ) {
        $this->id_endereco = $id_endereco;
        $this->tipo_endereco = $tipo_endereco;
        $this->rua_endereco = $rua_endereco;
        $this->bairro_endereco = $bairro_endereco;
        $this->cidade_endereco = $cidade_endereco;
        $this->estado_endereco = $estado_endereco;
        $this->cep_endereco = $cep_endereco;
    }

    public function getId()
    {
        return $this->id_endereco;
    }

    public function setId($id)
    {
        $this->id_endereco = $id;
    }

    public function getTipo()
    {
        return $this->tipo_endereco;
    }

    public function setTipo($tipo)
    {
        $this->tipo_endereco = $tipo;
    }

    public function getRua()
    {
        return $this->rua_endereco;
    }

    public function setRua($rua)
    {
        $this->rua_endereco = $rua;
    }
    
    public function getBairro()
    {
        return $this->bairro_endereco;
    }
    public function setBairro($bairro)
    {
        $this->bairro_endereco = $bairro;
    }
    
    public function getCidade()
    {
        return $this->cidade_endereco;
    }
    
    public function setCidade($cidade)
    {
        $this->cidade_endereco = $cidade;
    }

    public function getEstado()
    {
        return $this->estado_endereco;
    }

    public function setEstado($estado)
    {
        $this->estado_endereco = $estado;
    }

    public function getCEP()
    {
        return $this->cep_endereco;
    }

    public function setCEP($cep)
    {
        $this->cep_endereco = $cep;
    }
}