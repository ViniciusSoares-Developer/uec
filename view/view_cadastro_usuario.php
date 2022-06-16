<!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h5>Cadastro de usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body d-flex justify-content-center">
                <form action="controller/usuario_controller.php
                            " method="post" class="w-50 d-flex flex-column">
                    <input class="mb-1" name="email" type="text" placeholder="E-mail" required>
                    <input class="mb-1" name="senha" type="password" placeholder="Senha" required>
                    <input class="mb-1" name="tela" type="hidden" value="cadastroDeUsuario">
                    <input class="btn btn-primary" name="cadastrar" type="submit" value="Cadastrar">
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>