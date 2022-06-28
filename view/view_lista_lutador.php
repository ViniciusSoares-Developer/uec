<main>
    <?php if ($alert == '1') : ?>
        <div class="row col-md-6">
            <div class="alert alert-success alert-dismissible fade show">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong>Successo!</strong> Usuário cadastrado com sucesso.
            </div>
        </div>
    <?php endif; ?>
    <?php if ($alert == '2') : ?>
        <div class="row col-md-6">
            <div class="alert alert-danger alert-dismissible fade show">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong>Atenção!</strong> O usuário não foi cadastrado corretamente.
            </div>
        </div>
    <?php endif; ?>
    <?php if ($alert == '3') : ?>
        <div class="row col-md-6">
            <div class="alert alert-info alert-dismissible fade show">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong>Informação:</strong> O usuário já existe.
            </div>
        </div>
    <?php endif; ?>

    <div class="form">
        <h1>Lutadores</h1>
        <?php if ($_SESSION['usuarioLogado'] === true) : ?>
            <div class="row mb-2">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalLutador">
                    Cadastrar lutador
                </button>
            </div>
        <?php endif; ?>
        <table class="table table-striped">
            <tr>
                <th></th>
                <th>Nome</th>
                <th>Nacionalidade</th>
                <th>Categoria</th>
                <th>Idade</th>
                <th>Altura</th>
                <th>Peso</th>
                <th>Vitoria</th>
                <th>Derrota</th>
                <th>Empate</th>
                <?php if ($_SESSION['usuarioLogado'] === true) : ?>
                    <th>Data de Registro</th>
                    <th>Editar</th>
                    <th>Apagar</th>
                <?php endif; ?>
            </tr>
            <?php
            $cont = 0;
            foreach ($listaLutadores as $lutador) : $cont++ ?>
                <tr>
                    <td><?= $cont ?></td>
                    <td><?= $lutador['nome'] ?></td>
                    <td><?= $lutador['nacionalidade'] ?></td>
                    <td><?= $lutador['categoria'] ?></td>
                    <td><?= $lutador['idade'] ?></td>
                    <td><?= $lutador['altura'] ?></td>
                    <td><?= $lutador['peso'] ?></td>
                    <td><?= $lutador['vitorias'] ?></td>
                    <td><?= $lutador['derrotas'] ?></td>
                    <td><?= $lutador['empates'] ?></td>
                    <?php if ($_SESSION['usuarioLogado'] === true) : ?>
                        <td><?= $lutador['dataRegistro'] ?></td>
                        <td>
                            <a href="?pagina=6&id=<?= $lutador['id'] ?>" class="btn btn-light btn-sm">Editar</a>
                        </td>
                        <td>
                            <a href="?pagina=7&id=<?= $lutador['id'] ?>" class="btn btn-light btn-sm">Apagar</a>
                        </td>
                    <?php endif; ?>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
    <form action="controller/usuario_controller.php" method="post">
        <label for="buscar">Buscar:</label>
        <input type="buscar" class="form-control" name="termo">
        <input name="tela" type="hidden" value="buscarLutador">
        <button type="submit" class="btn btn-primary">Buscar</button>
    </form>

</main>