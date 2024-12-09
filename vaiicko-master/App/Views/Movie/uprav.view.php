<?php
/** @var \App\Core\LinkGenerator $link */

?>

<form action="<?= $link->url('movie.upraveny')?>" method="post">
    <?php require 'sablona.view.php' ?>
    <button type="submit" name="submit" class="btn btn-primary">Uprav film</button>
</form>