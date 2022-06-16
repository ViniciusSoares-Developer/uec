<main>
    <?php if($alert == '1'):?>
        <div class="row col-md-6">
            <div class="alert alert-success alert-dismissible fade show">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong>Successo!</strong> Usuário cadastrado com sucesso.
            </div>
        </div>
    <?php endif;?>
    <?php if($alert == '2'):?>    
        <div class="row col-md-6">
            <div class="alert alert-danger alert-dismissible fade show">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong>Atenção!</strong> O usuário não foi cadastrado corretamente.
            </div>
        </div>
    <?php endif;?>
    <?php if($alert == '3'):?>    
        <div class="row col-md-6">
            <div class="alert alert-info alert-dismissible fade show">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong>Informação:</strong> O usuário já existe.
            </div>
        </div>
    <?php endif;?>

    <div class="form">
        <!-- <a href="http://localhost/diogo/uec/?pagina=2" class="btn btn-light btn-sm">Cadastrar</a> -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalLutador">
            Cadastrar
        </button>
        <h1>Lista de Lutadores</h1>
        <table class="table table-striped">
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Nacionalidade</th>
                <th>Categoria</th>
                <th>Idade</th>
                <th>Altura</th>
                <th>Peso</th>
                <th>Vitoria</th>
                <th>Derrota</th>
                <th>Empate</th>
                <th>Data de Registro</th>
                <th>Editar</th>
                <th>Apagar</th>
            </tr>
            <?php
            $cont = 0;
            foreach ($listaLutadores as $lutador) : $cont++ ?>
                <tr>
                    <td><?= $cont ?></td>
                    <td>
                        <a href="?pagina=6&id=<?= $usuario['id'] ?>">
                            <?= $lutador['nome'] ?>
                        </a>
                    </td>
                    <td><?=$lutador['nacionalidade']?></td>
                    <td><?=$lutador['categoria']?></td>
                    <td><?=$lutador['idade']?></td>
                    <td><?=$lutador['altura']?></td>
                    <td><?=$lutador['peso']?></td>
                    <td><?=$lutador['vitorias']?></td>
                    <td><?=$lutador['derrotas']?></td>
                    <td><?=$lutador['empates']?></td>
                    <td><?=$lutador['dataRegistro']?></td>
                    <td>
                        <a href="?pagina=6&id=<?= $lutador['id'] ?>" class="btn btn-light btn-sm">Editar</a>
                    </td>
                    <td>
                        <a href="?pagina=7&id=<?= $lutador['id'] ?>" class="btn btn-light btn-sm">Apagar</a>
                    </td>
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

    <!-- <div class="input-group">
        <div class="form-outline">
            <input type="search" id="form1" class="form-control" />
            <label class="form-label" for="form1">Search</label>
        </div>
        <button type="button" class="btn btn-primary">
            <i class="fas fa-search"></i>
        </button>
    </div> -->
</main>