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
            $sql = "INSERT INTO `luta`(`id_desafiante`, `id_desafiado`, `rounds`, `id_vitoria`, `id_derrota`, `dataLuta`)
            VALUES (:desafiante, :desafiado, :rounds, :vitoria, :derrota, :dataLuta)";
            $pdo = Database::conexao();
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':desafiante', intval($this->getDesafiante()['id']));
            $stmt->bindValue(':desafiado', intval($this->getDesafiado()['id']));
            $stmt->bindValue(':rounds', intval($this->getRounds()));
            $stmt->bindValue(':vitoria', -1);
            $stmt->bindValue(':derrota', -1);
            $stmt->bindValue(':dataLuta', $this->getData());
            $stmt->execute();
        }
    }

    public function lutar($idLuta)
    {
        if ($this->buscarPorId($idLuta)['id_vitoria'] == -1) {
            $lutaResultado = "";
            
            for ($i = 1; $i <= $this->getRounds(); $i++) {
                $random = rand(0, 5);
                if ($random < 2) {
                    $lutaResultado = "Desafiante";
                } else if ($random > 2) {
                    $lutaResultado = "Empate";
                } else {
                    $lutaResultado = "Desafiado";
                }
            }

            $sql = "UPDATE `luta` SET `id_vitoria` = :id1 WHERE `id` = $idLuta;
            UPDATE `luta` SET `id_derrota` = :id2 WHERE `id` = $idLuta;
            UPDATE `lutador` SET `vitorias` = (`vitorias` + 1)  WHERE `id` = :id1;
            UPDATE `lutador` SET `derrotas` = (`derrotas` + 1) WHERE `id` = :id2;";

            $sqlEmpate = "UPDATE `luta` SET `id_vitoria` = -1 WHERE `id` = $idLuta;
            UPDATE `luta` SET `id_derrota` = -1 WHERE `id` = $idLuta;
            UPDATE `lutador` SET `empates` = (`empates` + 1) WHERE `id` = :id1;
            UPDATE `lutador` SET `empates` = (`empates` + 1) WHERE `id` = :id2;";
            $pdo = Database::conexao();
            $stmt = $pdo->prepare($sql);

            switch ($lutaResultado) {
                case "Desafiante":
                    $stmt->bindvalue(':id1', intval($this->getDesafiante()['id']));
                    $stmt->bindvalue(':id2', intval($this->getDesafiado()['id']));
                    break;
                case "Desafiado":
                    $stmt->bindvalue(':id1', intval($this->getDesafiado()['id']));
                    $stmt->bindvalue(':id2', intval($this->getDesafiante()['id']));
                    break;
                default:
                    $stmt = $pdo->prepare($sqlEmpate);
                    $stmt->bindvalue(':id1', intval($this->getDesafiante()['id']));
                    $stmt->bindvalue(':id2', intval($this->getDesafiado()['id']));
                    break;
            }
            $stmt->execute();
        }
    }

    public function listar()
    {
        $sql = "SELECT * FROM luta";
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
