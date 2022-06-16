<h1>Login de Usuários</h1>
<div class="container w-50">
    <form action="controller/usuario_controller.php" method="post">
        <div class="imgcontainer">
            <img src="https://www.w3schools.com/howto/img_avatar2.png" alt="Avatar" class="avatar">
        </div>

        <div class="row justify-content-center">
            <input class="form-control mb-2" type="text" placeholder="Digite seu e-mail" name="email" required>
            <input class="form-control mb-2" type="password" placeholder="Digite sua senha" name="senha" required>
            <input name="tela" type="hidden" value="loginDoUsuario">

            <button type="submit" class="col-8 btn btn-primary">Entrar</button>
            <label>
                <input type="checkbox" checked="checked" name="remember"> Lembrar me
            </label>
        </div>

        <div class="container">
            <button type="reset" class="btn btn-danger cancelbtn">Cancelar</button>
            <span class="psw">Esqueceu <a href="#">sua senha?</a></span>
        </div>
    </form>
    <div class="row">
        <button type="button" class="col btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
            Cadastrar
        </button>
    </div>
</div>