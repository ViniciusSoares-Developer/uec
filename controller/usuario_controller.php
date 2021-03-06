<?php
//Iniciando a session
@session_start();
@include_once '../model/conexao.php';
@include_once '../model/usuario.php';

$email =  ( $_SERVER["REQUEST_METHOD"] == "POST" && !empty( $_POST['email']) )? $_POST['email'] : null; 
$senha =  ( $_SERVER["REQUEST_METHOD"] == "POST" && !empty( $_POST['senha']) )? $_POST['senha'] : null;
$tela =  ( $_SERVER["REQUEST_METHOD"] == "POST" && !empty( $_POST['tela']) )? $_POST['tela'] : null;
$idUsuario =  ( $_SERVER["REQUEST_METHOD"] == "POST" && !empty( $_POST['id']) )? $_POST['id'] : null;
$BuscaUsuario =  ( $_SERVER["REQUEST_METHOD"] == "POST" && !empty( $_POST['termo']) )? $_POST['termo'] : null;

$logout = ($_SERVER["REQUEST_METHOD"] == "GET" && !empty( $_GET['logout']) ) ? true : false;

if($_SESSION){
    if(Usuario::barrarUsuario()){
        header('Location: ../?pagina=0');
    }
}

if($tela == 'cadastroDeUsuario'){
    $usuarioObj = new Usuario($email, $senha);
    $resultado = $usuarioObj->buscarPorEmail( $usuarioObj->getEmail() );
    //Se existir o email cadastrado no bd ele não deve ser gravado
    if( $resultado ){
        header('Location: ?pagina=2&alert=3');
    } else {
        if( $usuarioObj->cadastrar()  ){
            header('Location: ?pagina=2&alert=1');
        }else{
            header('Location: ?pagina=2&alert=2');
        }
    }
}

// Verifica o login do usuário
if( $tela == 'loginDoUsuario' ){
    $usuarioObj = new Usuario($email, $senha);
    if( $usuarioObj->verificarLogin() ){
        $_SESSION["usuarioLogado"] = true;
        header('Location: ../?pagina=2');
    }
}
// Verifica edição do usuário
if( $tela == 'editarUsuario' ){
    $usuarioObj = new Usuario($email, $senha);
    $usuarioObj->editar($idUsuario);
    header('Location: ../?pagina=2&alert=1');
}

// Verifica da busca do usuario
if( $tela == 'buscarUsuario' ){
    header("Location: ../?pagina=2&termo=$BuscaUsuario");
}

if(!$tela){
    $usuarioObj = new Usuario(null, null);
    if($id){
        $usuario = $usuarioObj->buscarPorId($id);
        if($pagina == 4){
            $usuarioObj->deletar($id);
            header('Location: ?pagina=2');
        }
    }else if($logout){
        $_SESSION['usuarioLogado'] = false;
        header('Location: ?pagina=0');
    }else{
        //Quando não temos post mas temos um termo via get
        if( $termoBusca ){
            //editar
            $listaUsuarios = $usuarioObj->buscar( $termoBusca );
        }else{
            //listar
            $listaUsuarios = $usuarioObj->listar(); 
        }
    }
}
