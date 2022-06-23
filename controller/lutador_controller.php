<?php
@include_once '../model/conexao.php';
@include_once '../model/lutador.php';

$nome =  ( $_SERVER["REQUEST_METHOD"] == "POST" && !empty( $_POST['nome']) )? $_POST['nome'] : null; 
$nacionalidade =  ( $_SERVER["REQUEST_METHOD"] == "POST" && !empty( $_POST['nacionalidade']) )? $_POST['nacionalidade'] : null; 
$idade =  ( $_SERVER["REQUEST_METHOD"] == "POST" && !empty( $_POST['idade']) )? $_POST['idade'] : null; 
$altura =  ( $_SERVER["REQUEST_METHOD"] == "POST" && !empty( $_POST['altura']) )? $_POST['altura'] : null; 
$peso =  ( $_SERVER["REQUEST_METHOD"] == "POST" && !empty( $_POST['peso']) )? $_POST['peso'] : null; 
$vitorias =  ( $_SERVER["REQUEST_METHOD"] == "POST" && !empty( $_POST['vitorias']) )? $_POST['vitorias'] : 0; 
$derrotas =  ( $_SERVER["REQUEST_METHOD"] == "POST" && !empty( $_POST['derrotas']) )? $_POST['derrotas'] : 0; 
$empates =  ( $_SERVER["REQUEST_METHOD"] == "POST" && !empty( $_POST['empates']) )? $_POST['empates'] : 0;

$tela =  ( $_SERVER["REQUEST_METHOD"] == "POST" && !empty( $_POST['tela']) ) ? $_POST['tela'] : null;
$idLutador = ( $_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['id']) ) ? $_POST['id'] : null;

if($tela == 'cadastroLutador'){
    $lutadorOBJ = new Lutador($nome, $nacionalidade, $idade, $altura, $peso, $vitorias, $derrotas, $empates);
    $lutadorOBJ->add();
    header('Location: ../?pagina=1');
}
if($tela == 'editarLutador'){
    $lutadorOBJ = new Lutador($nome, $nacionalidade, $idade, $altura, $peso, $vitorias, $derrotas, $empates);
    $lutadorOBJ->editar($idLutador);
    header('Location: ../?pagina=1');
}
if(!$tela){
    $lutadorOBJ = new Lutador($nome, $nacionalidade, $idade, $altura, $peso, $vitorias, $derrotas, $empates);
    if($id){
        $lutador = $lutadorOBJ->buscarId($id);
        if($pagina == 7){
            $lutadorOBJ->deletar($id);
            header('Location: ?pagina=1');
        } 
    }else{
        $listaLutadores = $lutadorOBJ->listar();
    }
}