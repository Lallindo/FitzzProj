<?php
class ProdutoDAO
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function buscarTodos() {
        $sql = "SELECT * FROM produtos";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function buscarPorId($produto)
    {
        // Funcionamento já verificado
        $sql = "SELECT * FROM produtos WHERE id_produto = :produto";
        $stmt = $this->pdo->prepare($sql);
        $produto = $produto->getId();
        $stmt->execute(['produto' => $produto]);  
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function buscarEspecs($produto) {
        $sql_para_id = "SELECT id_produto FROM produtos WHERE nome_produto = :prod";
            $stmt = $this->pdo->prepare($sql_para_id);
            $stmt->execute([
                'prod' => $produto->getNome() 
            ]);
            $id_inserido = $stmt->fetchAll(PDO::FETCH_OBJ)[0]->id_produto;

        $sql = "SELECT * FROM especificacoes where id_prod_espec = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'id' => $id_inserido
        ]);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function buscarSubstring($produto) {
        $substringNome = "'%{$produto->getNome()}%'"; 
        $sql = "SELECT * FROM produtos WHERE nome_produto LIKE :sub";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'sub' => $substringNome
        ]);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function buscarFotosBasicas($produto) {
        $sql_para_id = "SELECT id_produto FROM produtos WHERE nome_produto = :prod";
            $stmt = $this->pdo->prepare($sql_para_id);
            $stmt->execute([
                'prod' => $produto->nome_produto 
            ]);
            $id_inserido = $stmt->fetchAll(PDO::FETCH_OBJ)[0]->id_produto;

        $sql = "SELECT * FROM especificacoes WHERE id_prod_espec = :id & cor_espec = 0";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'id' => $id_inserido
        ]);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function inserir($produto) {
        try {
                $sql_prod = "INSERT INTO produtos(id_produto, preco_produto, nome_produto, desc_produto) 
            VALUES (:id, :preco, :nome, :descr)";
            $stmt = $this->pdo->prepare($sql_prod);
            $stmt->execute([
                'id' => $produto->getId(),
                'preco' => $produto->getPreco(),
                'nome' => $produto->getNome(),
                'descr' => $produto->getDesc()
            ]);

            $sql_para_id = "SELECT id_produto FROM produtos WHERE nome_produto = :prod";
            $stmt = $this->pdo->prepare($sql_para_id);
            $stmt->execute([
                'prod' => $produto->getNome() 
            ]);
            $id_inserido = $stmt->fetchAll(PDO::FETCH_OBJ)[0]->id_produto;
            
            foreach ($produto->getEspec() as $espec) {
                // var_dump($espec);
                $sql_espec = "INSERT INTO especificacoes(id_espec, id_prod_espec, 
                cor_espec, tamanho_espec, quantidade_espec, imagem1_espec, imagem2_espec) 
                VALUES (:id, :id_prod, :cor, :tamanho, :quant, :img1, :img2)";
                $stmt = $this->pdo->prepare($sql_espec);
                $stmt->execute([
                    'id' => 0,
                    'id_prod' => $id_inserido,
                    'cor' => $espec->getCor(),
                    'tamanho' => $espec->getTam(),
                    'quant' => $espec->getQuant(),
                    'img1' => '',
                    'img2' => ''
                ]);
            }
        } catch (PDOException $e) {
            if ($e->getCode() == '23000') {
                echo "Item inserido já existe!";
            }
        }
    }
}

