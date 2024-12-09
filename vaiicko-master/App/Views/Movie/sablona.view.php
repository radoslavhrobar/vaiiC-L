<?php
/** @var Array $data */
?>

<div class="form-label-group mb-3">
    <input type="hidden" name="id" value="<?= !empty($data['movie']) ? $data['movie']->getId() : "" ?>">
</div>
<div class="form-label-group mb-3">
    <?php if (!empty($data['movie'])) { ?>
        <input name="nazov" id="nazov" disabled="disabled" value="<?= $data['movie']->getNazov() ?>">
    <?php } else { ?>
        <input name="nazov" id="nazov" value="">
    <?php } ?>
    <label for="nazov" >Názov</label>
    
</div>
<div class="form-label-group mb-3">
    <input name="rokVydania" id="rokVydania" value="<?= !empty($data['movie']) ? $data['movie']->getRokVydania() : "" ?>">
    <label for="rokVydania">Rok vydania</label>
</div>
<div class="form-label-group mb-3">
    <input name="miestoVydania" id="miestoVydania" value="<?= !empty($data['movie']) ? $data['movie']->getMiestoVydania() : "" ?>">
    <label for="miestoVydania">Miesto vydania</label>
</div>
<div class="form-label-group mb-3">
    <input name="hodnotenie" id="hodnotenie" value="<?= !empty($data['movie']) ? $data['movie']->getHodnotenie() : "" ?>">
    <label for="hodnotenie">Hodnotenie</label>
</div>


