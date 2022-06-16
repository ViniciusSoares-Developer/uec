    <!-- The Modal -->
    <!-- The Modal -->
<div class="modal fade" id="modalLutador">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h5>Cadastro de lutador</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body d-flex justify-content-center">
            <form action="controller/lutador_controller.php
            " method="post" class="w-50 d-flex flex-column">
                        <input class="mb-1" name="nome" type="text" placeholder="Nome" maxlength="80" required>
                        <input class="mb-1" name="nacionalidade" type="text" placeholder="Nacionalidade" maxlength="30" required>
                        <input class="mb-1" name="idade" type="text" placeholder="Idade" required>
                        <input class="mb-1" name="altura" type="text" placeholder="Altura" required>
                        <input class="mb-1" name="peso" type="text" placeholder="Peso" required>
                        <input class="mb-1" name="vitorias" type="text" placeholder="Vitórias" required>
                        <input class="mb-1" name="derrotas" type="text" placeholder="Derrotas" required>
                        <input class="mb-1" name="empates" type="text" placeholder="Empates" required>
                        <input class="mb-1" type="hidden" name="tela" value="cadastroLutador">
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