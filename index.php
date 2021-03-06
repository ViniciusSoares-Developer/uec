<?php
//Iniciando a session
session_start();
if(!$_SESSION || !$_SESSION['usuarioLogado']){
    //mantem a sessão como verdadeira
    $_SESSION['usuarioLogado'] = false;
    $paginaInicio = '0';
}else{
    $paginaInicio = '2';
}


//Operador ternario
$pagina = ($_SERVER["REQUEST_METHOD"] == "GET" && !empty( $_GET['pagina']) ) ? $_GET['pagina'] : $paginaInicio ;
$id = ($_SERVER["REQUEST_METHOD"] == "GET" && !empty( $_GET['id']) ) ? $_GET['id']: 0;
$alert = ($_SERVER["REQUEST_METHOD"] == "GET" && !empty( $_GET['alert']) ) ? $_GET['alert']: 0;
$termoBusca = ($_SERVER["REQUEST_METHOD"] == "GET" && !empty( $_GET['termo']) ) ? $_GET['termo']: 0;

if($pagina === '1'){
    //Cadastro Lutador
    include_once "./model/conexao.php";
    include_once "./model/lutador.php";
    include_once "./controller/lutador_controller.php";
    include_once "view/template/topo.php";
    include_once 'view/view_cadastro_lutador.php';
    include_once 'view/view_lista_lutador.php';
    include_once "view/template/rodape.php";
    
}else if($pagina === '2'){
    //lista de usuários
    include_once 'model/conexao.php';
    include_once 'model/usuario.php';
    include_once 'controller/usuario_controller.php';
    include_once "view/template/topo.php";
    include_once "view/view_cadastro_lutador.php";
    include_once 'view/view_lista_usuario.php';
    include_once "view/template/rodape.php";
    
}else if($pagina === '3'){
    //Edita de usuários
    include_once 'model/conexao.php';
    include_once 'model/usuario.php';
    include_once 'controller/usuario_controller.php';
    include_once "view/template/topo.php";
    include_once "view/view_editar_usuario.php";
    include_once "view/template/rodape.php";
} else if($pagina === '4'){
    //lista de deletar
    include_once 'model/conexao.php';
    include_once 'model/usuario.php';
    include_once 'controller/usuario_controller.php';
   
} else if($pagina === '5'){
    //lista de buscar
    include_once 'model/conexao.php';
    include_once 'model/usuario.php';
    include_once 'controller/usuario_controller.php';
    include_once "view/template/topo.php";
    include_once 'view/view_lista_usuario.php';
    include_once "view/template/rodape.php";
}else if($pagina === '6'){
    //editar Lutador
    include_once "./model/conexao.php";
    include_once "./model/lutador.php";
    include_once "./controller/lutador_controller.php";
    include_once "./view/template/topo.php";
    include_once "./view/view_editar_lutador.php";
    include_once "./view/template/rodape.php";
    
}else if($pagina === '7'){
    //deletar lutador
    include_once "./model/conexao.php";
    include_once "./model/lutador.php";
    include_once "./controller/lutador_controller.php";
}else if($pagina === '8'){
    //lutas
    include_once "./model/conexao.php";
    include_once "./model/lutador.php";
    include_once "./model/luta.php";
    include_once "./controller/lutador_controller.php";
    include_once "./controller/luta_controller.php";
    include_once "./view/template/topo.php";
    include_once "./view/view_cadastro_luta.php";
    include_once "./view/view_lista_luta.php";
    include_once "./view/template/rodape.php";
}else if($pagina === '9'){
    include_once "./model/conexao.php";
    include_once "./model/luta.php";
    include_once "./controller/luta_controller.php";
}
else{
    //login
    include_once "view/template/topo.php";
    include_once 'view/view_cadastro_usuario.php';
    include_once 'view/view_login_usuario.php';
    include_once "view/template/rodape.php";
}


