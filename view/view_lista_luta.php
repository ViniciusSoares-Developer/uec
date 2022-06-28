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
            <th>Detalhes</th>
            <?php if($_SESSION['usuarioLogado'] === true):?>
                <th>Deletar</th>
            <?php endif?>
        </tr>
        <?php
        $cont = 0;
        foreach($listaLuta as $luta): $cont++?>
            <tr>
                <td><?=$cont?></td>
                <td><?=$luta['desafiante']?></td>
                <td>X</td>
                <td><?=$luta['desafiado']?></td>
                <td><?=$luta['dataLuta']?></td>
                <td>
                    <?php if($luta['nomeVencedor'] != null):?>
                        <span class="vitoria">Vitoria: <?=$luta['nomeVencedor']?></span><br>
                        <span class="derrota">Derrota: <?=$luta['nomePerdedor']?></span>
                    <?php endif;?>
                </td>
                <?php if($_SESSION['usuarioLogado'] === true):?>
                <td><a href="?pagina=9&id=<?=$luta['id']?>"><button class="btn btn-primary">Deletar</button></a></td>
                <?php endif;?>
            </tr>
        <?php endforeach;?>
    </table>
</div>

