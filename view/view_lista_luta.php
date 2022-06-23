<div class="container">
    <h1>Lutas</h1>
    <?php if($_SESSION['usuarioLogado'] === true):?>
        <div class="row mb-2">
            <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Adicionar luta
            </button>
        </div>
    <?php endif;?>
    <table class="table text-center">
        <tr>
            <th></th>
            <th>Desafiante</th>
            <th></th>
            <th>Desafiado</th>
            <th>Data da luta</th>
            <th>Vitoria</th>
            <th>Deletar</th>
        </tr>
        <?php
        $cont = 0;
        foreach($listaLuta as $luta): $cont++?>
            <tr>
                <td><?=$cont?></td>
                <td><?=$lutadorOBJ->buscarId($luta['id_desafiante'])['nome']?></td>
                <td>X</td>
                <td><?=$lutadorOBJ->buscarId($luta['id_desafiado'])['nome']?></td>
                <td><?=$luta['dataLuta']?></td>
                <td><?=$lutadorOBJ->buscarId($luta['id_vitoria'])['nome']?></td>
                <td><a href="?pagina=9&id=<?=$luta['id']?>"><button class="btn btn-primary">Deletar</button></a></td>
            </tr>
        <?php endforeach;?>
    </table>
</div>

