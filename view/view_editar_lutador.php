<main>
    <h1>Edição de Usuários</h1>
    <div class="form d-flex justify-content-center">
        <form action="controller/lutador_controller.php
            " method="post" class="d-flex flex-column w-50">
            <input class="form-control mb-1" name="nome" type="text" placeholder="Nome" maxlength="80" value="<?= $lutador['nome']?>" required>
            <input class="form-control mb-1" name="nacionalidade" type="text" placeholder="Nacionalidade" maxlength="30" value="<?= $lutador['nacionalidade']?>" required>
            <input class="form-control mb-1" name="idade" type="text" placeholder="Idade" value="<?= $lutador['idade']?>" required>
            <input class="form-control mb-1" name="altura" type="text" placeholder="Altura" value="<?= $lutador['altura']?>" required>
            <input class="form-control mb-1" name="peso" type="text" placeholder="Peso" value="<?= $lutador['peso']?>" required>
            <input class="form-control mb-1" name="vitorias" type="text" placeholder="Vitórias" value="<?= $lutador['vitorias']?>" required>
            <input class="form-control mb-1" name="derrotas" type="text" placeholder="Derrotas" value="<?= $lutador['derrotas']?>" required>
            <input class="form-control mb-1" name="empates" type="text" placeholder="Empates" value="<?= $lutador['empates']?>" required>
            <input name="tela" type="hidden" value="editarLutador">
            <input name="id" type="hidden" value="<?= $lutador['id'] ?>">
            <input class="btn btn-success" name="editar" type="submit" value="Editar">
        </form>
    </div>
</main>