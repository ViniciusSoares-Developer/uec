<?php
@include_once '../model/conexao.php';
@include_once '../model/luta.php';

$desafiante = ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['desafiante']))? intval($_POST['desafiante']) : null;
$desafiado = ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['desafiado']))? intval($_POST['desafiado']) : null;
$rounds = ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['rounds']))? $_POST['rounds'] : null;
$data = ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['data']))? $_POST['data'] : null;
$tela = ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['tela']))? $_POST['tela'] : null;

$idLuta = ($_SERVER["REQUEST_METHOD"] == 'GET' && !empty($_GET['id']))? $_GET['id'] : null;

if($tela == 'adicionarLuta'){
    $lutaOBJ = new Luta($desafiante, $desafiado, $rounds, $data);
    if($desafiante != $desafiado){
        $lutaOBJ->marcarLuta();
        header('Location: ../?pagina=8');
    }
}
else{
    $lutaOBJ = new Luta($desafiante, $desafiado, $rounds, $data);
    if($idLuta){
        $lutaOBJ->deletar($idLuta);
        header('Location: ?pagina=1');
    }else{
        $listaLuta = $lutaOBJ->listar();
        if($listaLuta){
            foreach($listaLuta as $luta){
                $dataLuta = date_parse($luta['dataLuta']);
                $dataAtual = date_parse(date('Y-m-d'));
                if(
                    ($dataLuta['year'] - $dataAtual['year']) < 1 &&
                    ($dataLuta['month'] - $dataAtual['month']) < 1 &&
                    ($dataLuta['day'] - $dataAtual['day']) < 1
                ){
                    $lutaLutadores = new Luta($luta['idDesafiante'], $luta['idDesafiado'], $luta['rounds'], null);
                    $lutaLutadores->lutar($luta['id']);
                }
            }
        }
    }
}