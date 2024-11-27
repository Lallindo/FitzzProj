<?php
class UsuarioDAO
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function buscarTodos($usuario) {
        $sql = "SELECT * FROM usuarios";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function buscarTodosEnd($usuario) {
        $sql = "SELECT * FROM enderecos";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function buscarTodosTel($usuario) {
        $sql = "SELECT * FROM telefones";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function buscarTodosPro($usuario) {
        $sql = "SELECT * FROM produtos";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function buscarTodosPed($usuario) {
        $sql = "SELECT * FROM pedidos";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function buscarTodosItem($usuario) {
        $sql = "SELECT * FROM itens";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function buscarTodosEsp($usuario) {
        $sql = "SELECT * FROM especificacoes";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
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

    public function buscarPorEmail($usuario)
    {
        // Funcionamento já verificado
        $sql = "SELECT * FROM usuarios WHERE email_usuario = :email";
        $stmt = $this->pdo->prepare($sql);
        $email = $usuario->getEmail();
        $stmt->execute(['email' => $email]);
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

    public function buscarPedido($usuario) {
        $sql = "SELECT * FROM pedidos WHERE id_usuario_pedido = :id_usuario";
        $stmt = $this->pdo->prepare($sql);
        $id_usuario = $usuario->getId();
        $stmt->execute(['id_usuario' => $id_usuario]);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function buscarPedidoEmAberto($usuario) {
        $sql = "SELECT * FROM pedidos WHERE id_usuario_pedido = :id AND status_pedido IS NULL";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'id' => $usuario->getId()
        ]);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function adicionarTel($usuario) {
        $sql = "INSERT INTO telefones (id_telefone, id_usuario_telefone, numero_telefone) VALUES (:id, :id_usuario, :num)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'id' => $usuario->getTel()[0]->getId(),
            'id_usuario' => $usuario->getId(),
            'num' => $usuario->getTel()[0]->getNum()
        ]);
    }

    public function alterarTel($usuario) {
        $sql = "UPDATE telefones SET numero_telefone = :tel WHERE id_usuario_telefone = :id_usuario AND id_telefone = :id_telefone";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'tel' => $usuario->getTel()[0]->getNum(),
            'id_usuario' => $usuario->getId(),
            'id_telefone' => $usuario->getTel()[0]->getId()
        ]);
    }

    public function removerTel($usuario) {
        $sql = "DELETE FROM telefones WHERE id_telefone = :id_tel AND id_usuario_telefone = :id_usuario";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'id_tel' => $usuario->getTel()[0]->getId(),
            'id_usuario' => $usuario->getId()
        ]);
    }

    public function adicionarEnd($usuario) {
        $sql = "INSERT INTO enderecos(id_endereco, id_usuario_endereco, padrao_endereco, rua_endereco, bairro_endereco, cidade_endereco, estado_endereco, cep_endereco) 
        VALUES (:id, :id_usuario, 0, :rua, :bairro, :cidade, :estado, :cep)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'id' => 0,
            'id_usuario' => $usuario->getId(),
            'rua' => $usuario->getEnd()[0]->getRua(),
            'bairro' => $usuario->getEnd()[0]->getBairro(),
            'cidade' => $usuario->getEnd()[0]->getCidade(),
            'estado' => $usuario->getEnd()[0]->getEstado(),
            'cep' => $usuario->getEnd()[0]->getCEP()
        ]);
    }

    public function alterarEnd($usuario) {
        $sql = "UPDATE enderecos SET padrao_endereco = :padrao, rua_endereco = :rua, bairro_endereco = :bairro, cidade_endereco = :cidade, estado_endereco = :estado, cep_endereco = :cep
                WHERE id_usuario_endereco = :id_usuario AND id_endereco = :id_endereco";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'padrao' => $usuario->getEnd()[0]->getPadrao(),
            'rua' => $usuario->getEnd()[0]->getRua(),
            'bairro' => $usuario->getEnd()[0]->getBairro(),
            'cidade' => $usuario->getEnd()[0]->getCidade(),
            'estado' => $usuario->getEnd()[0]->getEstado(),
            'cep' => $usuario->getEnd()[0]->getCEP(),
            'id_usuario' => $usuario->getId(),
            'id_endereco' => $usuario->getEnd()[0]->getId()
        ]);
    }

    public function removerEnd($usuario) {
        $sql = "DELETE FROM enderecos WHERE id_endereco = :id_end AND id_usuario_endereco = :id_usuario";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'id_end' => $usuario->getEnd()[0]->getId(),
            'id_usuario' => $usuario->getId()
        ]);
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

        // Email será único então o SQL abaixo deverá usar ele
        $sql_para_id = "SELECT id_usuario FROM usuarios where email_usuario = :email";
        $stmt = $this->pdo->prepare($sql_para_id);
        var_dump($usuario->getCPF());
        $stmt->execute(['email' => $usuario->getEmail()]);
        $id_user_arg = $stmt->fetchAll(PDO::FETCH_OBJ)[0]->id_usuario;
        var_dump($id_user_arg);

        $sql_Tel = "INSERT INTO telefones (id_usuario_telefone, numero_telefone)
        VALUES (:id_user, :tel)";
        $stmt = $this->pdo->prepare($sql_Tel);

        var_dump($usuario->getTel()[0]->getNum());
        $stmt->execute([
            'id_user' => $id_user_arg,
            'tel' => $usuario->getTel()[0]->getNum()
        ]);  

        $sql_End = "INSERT INTO enderecos 
        (id_usuario_endereco, tipo_endereco, rua_endereco, bairro_endereco, cidade_endereco, estado_endereco, cep_endereco)
        VALUES (:id_usuario, :tipo, :rua, :bairro, :cidade, :estado, :cep)";

        $end = $usuario->getEnd()[0];

        $stmt = $this->pdo->prepare($sql_End);
        $stmt->execute([
            'id_usuario' => $id_user_arg,
            'tipo' => $end->getTipo(),
            'rua' => $end->getRua(),
            'bairro' => $end->getBairro(),
            'cidade' => $end->getCidade(),
            'estado' => $end->getEstado(),
            'cep' => $end->getCEP()
        ]);
    }
}