<?php
class ProdutoDAO
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function buscarTodos($produto) {
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
        $sql_para_id = "SELECT id_produto FROM produtos WHERE nome_produto = :prod OR id_produto = :id";
            $stmt = $this->pdo->prepare($sql_para_id);
            $stmt->execute([
                'prod' => $produto->getNome(),
                'id' => $produto->getId() 
            ]);
            $id_inserido = $stmt->fetchAll(PDO::FETCH_OBJ)[0]->id_produto;

        $sql = "SELECT * FROM especificacoes where id_prod_espec = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'id' => $id_inserido
        ]);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function buscarEspecItem($produto) {
        $sql = "SELECT id_espec FROM especificacoes WHERE id_prod_espec = :id_prod AND cor_espec = :cor_espec AND tamanho_espec = :tamanho_espec";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'id_prod' => $produto->getId(),
            'cor_espec' => $produto->getEspec()[0]->getCor(),
            'tamanho_espec' => $produto->getEspec()[0]->getTam()
        ]);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    } 

    // Busca o nome da categoria dentro da string do nome do produto
    // Retorna todos os produtos com aquela substring 
    // https://github.com/Lallindo/FitzzProj/wiki/Nomea%C3%A7%C3%A3o-dos-produtos 
    public function buscarSubstring($produto) {
        $substringNome = "%{$produto->getNome()}%"; 
        $sql = "SELECT * FROM produtos WHERE nome_produto LIKE :sub";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'sub' => $substringNome
        ]);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    // Busca por especificações de uma cor padrão e pega as fotos dessa especificação
    // As fotos serão apresentadas no catálogo
    public function buscarImagens($produto) {
        $sql = "SELECT * FROM especificacoes WHERE id_prod_espec = :id AND tamanho_espec = 0 AND cor_espec = 0";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'id' => $produto->getId()
        ]);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function buscarTodasImagens($produto) {
        $sql = "SELECT * FROM especificacoes WHERE id_prod_espec = :id AND tamanho_espec = 0";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'id' => $produto->getId()
        ]);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function alterarProd($produto) {
        $sql = "UPDATE produtos SET preco_produto = :preco, nome_produto = :nome, desc_produto = :desc_prod WHERE id_produto = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'preco' => $produto->getPreco(),
            'nome' => $produto->getNome(),
            'desc_prod' => $produto->getDesc(),
            'id' => $produto->getId()
        ]);
    }

    public function alterarEspec($produto) {
        $sql = "UPDATE especificacoes SET cor_espec = :cor, tamanho_espec = :tam, quantidade_espec = :quant, imagem1_espec = :img1, imagem2_espec = :img2 WHERE id_espec = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'cor' => $produto->getEspec()[0]->getCor(),
            'tam' => $produto->getEspec()[0]->getTam(),
            'quant' => $produto->getEspec()[0]->getQuant(),
            'img1' => $produto->getEspec()[0]->getImg()[0],
            'img2' => $produto->getEspec()[0]->getImg()[1],
            'id' => $produto->getEspec()[0]->getId()
        ]);
    }

    public function removerProduto($produto) {
        $sql = "DELETE FROM produtos WHERE id_produto = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'id' => $produto->getId()
        ]);
    }

    // Adiciona um produto e suas espeficicações 
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
                var_dump($espec);
                $sql_espec = "INSERT INTO especificacoes(id_espec, id_prod_espec, 
                cor_espec, tamanho_espec, quantidade_espec, imagem1_espec, imagem2_espec) 
                VALUES (:id, :id_prod, :cor, :tamanho, :quant, :img1, :img2)";
                var_dump($espec->getImg());
                $stmt = $this->pdo->prepare($sql_espec);
                $stmt->execute([
                    'id' => 0,
                    'id_prod' => $id_inserido,
                    'cor' => $espec->getCor(),
                    'tamanho' => $espec->getTam(),
                    'quant' => $espec->getQuant(),
                    'img1' => $espec->getImg()[0],
                    'img2' => $espec->getImg()[1]
                ]);
            }
        } catch (PDOException $e) {
            if ($e->getCode() == '23000') {
                echo "Item inserido já existe!";
            }
        }
    }
}

