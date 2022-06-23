<?php

class Lutador
{

    //Atributos
    private $nome;
    private $nacionalidade;
    private $idade;
    private $altura;
    private $peso;
    private $categoria;
    private $vitorias;
    private $derrotas;
    private $empates;

    //Construtor
    public function __construct(
        $no,
        $na,
        $id,
        $al,
        $pe,
        $vi,
        $de,
        $em
    ) {
        $this->setNome($no);
        $this->setNacionalidade($na);
        $this->setIdade($id);
        $this->setAltura($al);
        $this->setPeso($pe);
        $this->setVitorias($vi);
        $this->setDerrotas($de);
        $this->setEmpates($em);
    }

    //Métodos
    public function apresentar()
    {
        echo "Lutador: " . $this->getNome();
        echo "Origem: " . $this->getNacionalidade();
        echo " Idade: " . $this->getIdade();
        echo " Altura: " . $this->getAltura();
        echo " Pesando: " . $this->getPeso();
        echo " Ganhou: " . $this->getVitorias();
        echo " Perdeu: " . $this->getDerrotas();
        echo " Empatou: " . $this->getEmpates();
    }
    public function status()
    {
    }
    public function ganharLuta()
    {
        $this->setVitorias($this->getVitorias() + 1);
    }
    public function perderLuta()
    {
        $this->setDerrotas($this->getDerrotas() + 1);
    }
    public function empatarLuta()
    {
        $this->setEmpates($this->getEmpates() + 1);
    }

    //Métodos especiais
    public function getNome()
    {
        return $this->nome;
    }
    public function getNacionalidade()
    {
        return $this->nacionalidade;
    }
    public function getIdade()
    {
        return $this->idade;
    }
    public function getAltura()
    {
        return $this->altura;
    }
    public function getPeso()
    {
        return $this->peso;
    }
    public function getCategoria()
    {
        return $this->categoria;
    }
    public function getVitorias()
    {
        return $this->vitorias;
    }
    public function getDerrotas()
    {
        return $this->derrotas;
    }
    public function getEmpates()
    {
        return $this->empates;
    }

    //Set
    public function setNome($no)
    {
        $this->nome = $no;
    }
    public function setNacionalidade($na)
    {
        $this->nacionalidade = $na;
    }
    public function setIdade($id)
    {
        $this->idade = $id;
    }
    public function setAltura($al)
    {
        $this->altura = $al;
    }
    public function setPeso($pe)
    {
        $this->peso = $pe;
        $this->setCategoria();
    }
    public function setCategoria()
    {
        if ($this->getPeso() < 52.2) {
            $this->categoria = 'Inválido';
        } else if ($this->getPeso() < 70.3) {
            $this->categoria = 'Leve';
        } else if ($this->getPeso() < 83.9) {
            $this->categoria = 'Médio';
        } else if ($this->getPeso() < 120.2) {
            $this->categoria = 'Pesado';
        } else {
            $this->categoria = 'Inválido';
        }
    }
    public function setVitorias($vi)
    {
        $this->vitorias = $vi;
    }
    public function setDerrotas($de)
    {
        $this->derrotas = $de;
    }
    public function setEmpates($em)
    {
        $this->empates = $em;
    }

    public function testarConexao()
    {
        $pdo = Database::conexao();
        $stmt = $pdo->prepare('SELECT * FROM lutador');
        $stmt->execute();
        $list = $stmt->fetchAll(PDO::FETCH_ASSOC);
        var_dump($list);
        die;
    }

    public function add()
    {
        $sql = "INSERT INTO lutador(nome, nacionalidade, idade, altura, peso, categoria, vitorias, derrotas, empates, dataRegistro) 
        VALUES(:nome, :nacionalidade, :idade, :altura, :peso, :categoria, :vitorias, :derrotas, :empates, NOW())";
        $pdo = Database::conexao();
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':nome', $this->getNome());
        $stmt->bindValue(':nacionalidade', $this->getNacionalidade());
        $stmt->bindValue(':idade', $this->getIdade());
        $stmt->bindValue(':altura', $this->getAltura());
        $stmt->bindValue(':peso', $this->getPeso());
        $stmt->bindValue(':categoria', $this->getCategoria());
        $stmt->bindValue(':vitorias', $this->getVitorias());
        $stmt->bindValue(':derrotas', $this->getDerrotas());
        $stmt->bindValue(':empates', $this->getEmpates());
        $stmt->execute();
    }

    public function deletar($id){
        $sql = "DELETE FROM lutador WHERE id = $id";
        $pdo = Database::conexao();
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
    }

    public function listar()
    {
        $pdo = Database::conexao();
        $sql = 'SELECT * FROM lutador';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $list = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $list;
    }

    public function editar($id)
    {
        $sql = "UPDATE lutador SET 
        nome = :nome,
        nacionalidade = :nacionalidade,
        idade = :idade,
        altura = :altura,
        peso = :peso,
        categoria = :categoria,
        vitorias = :vitorias,
        derrotas = :derrotas,
        empates = :empates,
        dataRegistro = NOW()
        WHERE id = $id";
        $pdo = Database::conexao();
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':nome', $this->getNome());
        $stmt->bindValue(':nacionalidade', $this->getNacionalidade());
        $stmt->bindValue(':idade', $this->getIdade());
        $stmt->bindValue(':altura', $this->getAltura());
        $stmt->bindValue(':peso', $this->getPeso());
        $stmt->bindValue(':categoria', $this->getCategoria());
        $stmt->bindValue(':vitorias', $this->getVitorias());
        $stmt->bindValue(':derrotas', $this->getDerrotas());
        $stmt->bindValue(':empates', $this->getEmpates());
        $stmt->execute();
    }

    public function buscarId($id){
        $sql = "SELECT * FROM lutador WHERE `id` = $id";
        $pdo = Database::conexao();
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $list = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if($list){
            return $list[0];
        }else{
            return ["nome"=>"Inexistente"];
        }
    }

    public function buscarPorNome($nome){
        $pdo = Database::conexao();
        $sql = "SELECT * FROM lutador WHERE `nome`: $nome";
        $stmt = $pdo->prepare($sql);
        $list = $stmt->execute();
        $list = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $list;
    }
}
