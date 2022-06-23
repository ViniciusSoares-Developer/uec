<main>
    <h1>Lista de Usuários</h1>
    <div class="row mb-3">
        <button type="button" class="col btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
            Adicionar Usuario
        </button>
    </div>
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
        <table class="table table-striped">
            <tr>
                <th>Id</th>
                <th>Email</th>
                <th>Senha</th>
                <th>Editar</th>
                <th>Apagar</th>
            </tr>
            <?php
            $cont = 0;
            foreach ($listaUsuarios as $usuario) : $cont++ ?>
                <tr>
                    <td><?= $cont ?></td>
                    <td>
                        <a href="?pagina=3&id=<?= $usuario['id'] ?>">
                            <?= $usuario['email'] ?>
                        </a>
                    </td>
                    <td><?= substr($usuario['senha'], 0, 10); ?> ...</td>
                    <td>
                        <a href="?pagina=3&id=<?= $usuario['id'] ?>" class="btn btn-light btn-sm">Editar</a>
                    </td>
                    <td>
                        <a href="?pagina=4&id=<?= $usuario['id'] ?>" class="btn btn-light btn-sm">Apagar</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
    <form action="controller/usuario_controller.php" method="post">
        <label for="buscar">Buscar:</label>
        <input type="buscar" class="form-control" name="termo">
        <input name="tela" type="hidden" value="buscarUsuario">
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