
    <main>
        <h1>Edição de Usuários</h1>
        <div class="form d-flex justify-content-center">
            <form action="controller/usuario_controller.php
            " method="post" class="d-flex flex-column w-50">
                <input class="form-control mb-1" name="email" type="text" placeholder="E-mail" value="<?=$usuario['email']?>" required>
                <input class="form-control mb-1" name="senha" type="password" placeholder="Nova Senha" value="" required>
                <input name="tela" type="hidden" value="editarUsuario">
                <input name="id" type="hidden" value="<?=$usuario['id']?>">
                <input class="btn btn-success" name="editar" type="submit" value="Editar">
            </form>
        </div>
    </main>
