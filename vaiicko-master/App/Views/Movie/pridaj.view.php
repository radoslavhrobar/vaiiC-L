<?php
/** @var \App\Core\LinkGenerator $link */

?>

<form action="<?= $link->url('movie.novy')?>" method="post">
    <?php require 'sablona.view.php' ?>
    <button type="submit" name="submit" class="btn btn-primary">Pridaj film</button>
</form>
