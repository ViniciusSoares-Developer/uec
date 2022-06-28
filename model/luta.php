<?php

class Luta
{

    //Atributos
    private $desafiante;
    private $desafiado;
    private $rounds;
    private $data;
    private $aprovada;

    public function __construct($desafiante, $desafiado, $rounds, $data)
    {
        $this->setDesafiante($desafiante);
        $this->setDesafiado($desafiado);
        $this->setRounds($rounds);
        $this->setData($data);
        $this->setAprovada($desafiante, $desafiado);
    }

    //Set
    public function setDesafiado($idDesafiado)
    {
        if ($idDesafiado) $this->desafiado = $this->buscarLutadorPorId($idDesafiado);
    }

    public function setDesafiante($idDesafiante)
    {
        if ($idDesafiante) $this->desafiante = $this->buscarLutadorPorId($idDesafiante);
    }

    public function setRounds($ro)
    {
        $this->rounds = $ro;
    }

    public function setAprovada($desafiante, $desafiado)
    {
        if ($this->getDesafiado() && $this->getDesafiante()) {
            if ($this->getDesafiante()['categoria'] === $this->getDesafiado()['categoria']) {
                $this->aprovada = true;
            }
        } else {
            $this->aprovada = false;
        }
    }

    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    public function getAprovada()
    {
        return $this->aprovada;
    }

    public function getRounds()
    {
        return $this->rounds;
    }

    public function getDesafiante()
    {
        return $this->desafiante;
    }
    public function getDesafiado()
    {
        return $this->desafiado;
    }

    public function getData()
    {
        return $this->data;
    }

    public function buscarLutadorPorId($id)
    {
        $sql = "SELECT * FROM `lutador` WHERE `id` = $id";
        $pdo = Database::conexao();
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($result) {
            return $result[0];
        }
    }

    public function buscarLutaPorId($id)
    {
        $sql = "SELECT * FROM `luta` WHERE `id` = $id";
        $pdo = Database::conexao();
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($result) {
            return $result[0];
        }
    }

    public function buscarPorId($id){
        $sql = "SELECT * FROM `luta` WHERE `id` = $id";
        $pdo = Database::conexao();
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($result) {
            return $result[0];
        }
    }

    public function marcarLuta()
    {
        if($this->getAprovada()){
            $sql = "INSERT INTO `luta`(`idDesafiante`, `idDesafiado`, `rounds`, `nomeVencedor`, `nomePerdedor`, `dataLuta`)
            VALUES (:desafiante, :desafiado, :rounds, :vitoria, :derrota, :dataLuta)";
            $pdo = Database::conexao();
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':desafiante', intval($this->getDesafiante()['id']));
            $stmt->bindValue(':desafiado', intval($this->getDesafiado()['id']));
            $stmt->bindValue(':rounds', intval($this->getRounds()));
            $stmt->bindValue(':vitoria', null);
            $stmt->bindValue(':derrota', null);
            $stmt->bindValue(':dataLuta', $this->getData());
            $stmt->execute();
        }
    }

    public function lutar($idLuta)
    {
        $luta = $this->buscarLutaPorId($idLuta);
        if ($luta && $luta['nomeVencedor'] == null) {

            $sql = "UPDATE `luta` SET `nomeVencedor` = :nomeVitoria, `nomePerdedor` = :nomeDerrota WHERE `id` = $idLuta;
                    UPDATE `lutador` SET `vitorias` = (`vitorias` + 1)  WHERE `id` = :idVitoria;
                    UPDATE `lutador` SET `derrotas` = (`derrotas` + 1) WHERE `id` = :idDerrota;";

            $sqlEmpate = "UPDATE `lutador` SET `empates` = (`empates` + 1) WHERE `id` = :idVitoria;
                          UPDATE `lutador` SET `empates` = (`empates` + 1) WHERE `id` = :idDerrota;";

            $pdo = Database::conexao();
            $stmt = $pdo->prepare($sql);

            for ($i = 1; $i <= $this->getRounds(); $i++) {
                $random = rand(0, 5);
                if ($random < 2) {
                    $stmt->bindValue(':nomeVitoria', $this->getDesafiante()['nome']);
                    $stmt->bindValue(':nomeDerrota', $this->getDesafiado()['nome']);
                    $stmt->bindValue(':idVitoria', intval($this->getDesafiante()['id']));
                    $stmt->bindValue(':idDerrota', intval($this->getDesafiado()['id']));
                } else if ($random > 2) {
                    $stmt = $pdo->prepare($sqlEmpate);
                    $stmt->bindValue(':idDerrota', intval($this->getDesafiante()['id']));
                    $stmt->bindValue(':idVitoria', intval($this->getDesafiado()['id']));
                    
                } else {
                    $stmt->bindValue(':nomeDerrota', $this->getDesafiante()['nome']);
                    $stmt->bindValue(':nomeVitoria', $this->getDesafiado()['nome']);
                    $stmt->bindValue(':idDerrota', intval($this->getDesafiante()['id']));
                    $stmt->bindValue(':idVitoria', intval($this->getDesafiado()['id']));
                }
            }
            $stmt->execute();
        }
    }

    public function listar()
    {
        $sql = "SELECT luta.*, l1.nome desafiante, l2.nome desafiado FROM `luta`
        INNER JOIN `lutador` l1 ON l1.id = luta.idDesafiante
        INNER JOIN `lutador` l2 ON l2.id = luta.idDesafiado ORDER BY luta.dataLuta DESC";
        $pdo = Database::Conexao();
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $lista;
    }

    public function deletar($id){
        $sql = "DELETE FROM luta WHERE id = $id";
        $pdo = Database::conexao();
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
    }
}
