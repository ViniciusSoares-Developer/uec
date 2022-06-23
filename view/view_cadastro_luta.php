<form action="./controller/luta_controller.php" method="POST">
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" class="add-luta container">
          <div class="row">
            <div class="col-6 d-flex flex-column text-center">
              <label for="desafiante">Desafiante</label>
              <select name="desafiante">
                <option value="">Escolha o Desafiante</option>
                <?php foreach ($listaLutadores as $lutador) : ?>
                  <option value="<?= $lutador['id'] ?>"><?= $lutador['nome'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="col-6 d-flex flex-column text-center">
              <label for="desafiado">Desafiado</label>
              <select name="desafiado">
                <option value="">Escolha o Desafiado</option>
                <?php foreach ($listaLutadores as $lutador) : ?>
                  <option value="<?= $lutador['id'] ?>"><?= $lutador['nome'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <input type="hidden" name="tela" value="adicionarLuta" required>
          <input class="w-100 mt-2" type="number" name="rounds" placeholder="Rounds" id="">
          <input class="w-100 mt-2" type="date" name="data">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
</form>