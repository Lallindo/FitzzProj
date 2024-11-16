<?php
class EnderecoDAO
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    public function buscarPorId($endereco)
    {
        // Funcionamento já verificado
        $sql = "SELECT * FROM enderecos WHERE id_endereco = :endereco";
        $stmt = $this->pdo->prepare($sql);
        $endereco = $endereco->getId();
        $stmt->execute(['endereco' => $endereco]);  
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}

