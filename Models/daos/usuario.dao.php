<?php
class UsuarioDAO
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function buscarPorId($usuario)
    {
        // Funcionamento já verificado
        $sql = "SELECT * FROM usuarios WHERE id_usuario = :id";
        $stmt = $this->pdo->prepare($sql);
        $id = $usuario->getId();
        $stmt->execute(['id' => $id]);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function buscarPorCPF($usuario)
    {
        // Funcionamento já verificado
        $sql = "SELECT * FROM usuarios WHERE cpf_usuario = :cpf";
        $stmt = $this->pdo->prepare($sql);
        $cpf = $usuario->getCPF();
        $stmt->execute(['cpf' => $cpf]);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function buscarTelefone($usuario) {
        $sql = "SELECT * FROM telefones WHERE id_usuario_telefone = :id_usuario";
        $stmt = $this->pdo->prepare($sql);
        $id_usuario = $usuario->getId();
        $stmt->execute(['id_usuario' => $id_usuario]);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }


    public function buscarEndereco($usuario) {
        $sql = "SELECT * FROM enderecos WHERE id_usuario_endereco = :id_usuario";
        $stmt = $this->pdo->prepare($sql);
        $id_usuario = $usuario->getId();
        $stmt->execute(['id_usuario' => $id_usuario]);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function registrarUsuario($usuario) {
        // Funcionamento já verificado
        $sql_user = "INSERT INTO usuarios 
        (nomecomp_usuario, cpf_usuario, email_usuario, senha_usuario, datacriacao_usuario, datanasc_usuario)
        VALUES (:nome, :cpf, :email, :senha, :dataCria, :dataNasc)";

        $stmt = $this->pdo->prepare($sql_user);
        
        $nome = $usuario->getNome();
        $cpf = $usuario->getCPF();
        $email = $usuario->getEmail();
        $senha = $usuario->getSenha();
        $dataCria = $usuario->getDataCria();
        $dataNasc = $usuario->getDataNasc();

        $stmt->execute([
            'nome' => $nome,
            'cpf' => $cpf,
            'email' => $email,
            'senha' => $senha,
            'dataCria' => $dataCria,
            'dataNasc' => $dataNasc
        ]);

        $sql_para_id = "SELECT id_usuario FROM usuarios where cpf_usuario = :cpf";
        $stmt = $this->pdo->prepare($sql_para_id);
        var_dump($usuario->getCPF());
        // $stmt->execute(['cpf' => $usuario->getCPF()]);
        // $id_user_arg = $stmt->fetchAll(PDO::FETCH_OBJ);
        // var_dump($id_user_arg);

        $sql_Tel = "INSERT INTO telefones (id_usuario_telefone, numero_telefone)
        VALUES (:id_user, :tel)";
        $stmt = $this->pdo->prepare($sql_Tel);

        var_dump($usuario->getTel());
        // $stmt->execute([
        //     'id_user' => $id_user_arg,
        //     'tel' => $usuario->getTel()[0]
        // ]);
    }
}