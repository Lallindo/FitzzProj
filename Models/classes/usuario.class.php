<?php
// Funcionamento já verificado
class Usuario
{
    private $id_usuario = 0;
    private $nomecomp_usuario = '';
    private $cpf_usuario = '';
    private $email_usuario = '';
    private $senha_usuario = '';
    private $datacriacao_usuario = '';
    private $datanasc_usuario = '';
    private $telefones = [];
    private $enderecos = [];

    public function __construct(
        $id_usuario = 0,
        $nomecomp_usuario = '',
        $cpf_usuario = '',
        $email_usuario = '',
        $senha_usuario = '',
        $datacriacao_usuario = '',
        $datanasc_usuario = '',
        $numero_telefone = '',
        $tipo_end = '',
        $rua_end = '',
        $bairro_end = '',
        $cidade_end = '',
        $estado_end = '',
        $cep_end = ''
    ) {
        $this->id_usuario = $id_usuario;
        $this->nomecomp_usuario = $nomecomp_usuario;
        $this->cpf_usuario = $cpf_usuario;
        $this->email_usuario = $email_usuario;
        $this->senha_usuario = $senha_usuario;
        $this->datacriacao_usuario = $datacriacao_usuario;
        $this->datanasc_usuario = $datanasc_usuario;
        $this->telefones[] = new Telefone(
            0, $numero_telefone
        );
        $this->enderecos[] = new Endereco(
            0, $tipo_end, 
            $rua_end, $bairro_end, $cidade_end,
            $estado_end, $cep_end
        );
    }

    public function getId()
    {
        return $this->id_usuario;
    }

    public function set($id)
    {
        $this->id_usuario = $id;
    }

    public function getNome()
    {
        return $this->nomecomp_usuario;
    }

    public function setNome($nome)
    {
        $this->nomecomp_usuario = $nome;
    }

    public function getCPF()
    {
        return $this->cpf_usuario;
    }

    public function setCPF($cpf)
    {
        $this->cpf_usuario = $cpf;
    }

    public function getEmail()
    {
        return $this->email_usuario;
    }

    public function setEmail($email)
    {
        $this->email_usuario = $email;
    }

    public function getSenha()
    {
        return $this->senha_usuario;
    }

    public function setSenha($senha)
    {
        $this->senha_usuario = $senha;
    }

    public function getDataCria()
    {
        return $this->datacriacao_usuario;
    }

    public function setDataCria($dataCria)
    {
        $this->datacriacao_usuario = $dataCria;
    }

    public function getDataNasc()
    {
        return $this->datanasc_usuario;
    }

    public function setDataNasc($dataNasc)
    {
        $this->datanasc_usuario = $dataNasc;
    }

    public function getTel()
    {
        return $this->telefones;
    }

    public function setTel($num_tel)
    {
        // new Telefone
        $this->telefones[] = new Telefone(numero_telefone: $num_tel);
    }

    public function getEnd()
    {
        return $this->enderecos;
    }

    public function setEnd($tipo_end, $rua_end, $bairro_end, $cidade_end, $estado_end, $cep_end)
    {
        // new Endereco
        $this->enderecos[] = new Endereco(0, $tipo_end, $rua_end, $bairro_end, $cidade_end, $estado_end, $cep_end);
    }
}

?>