<?php
/** @var Array $data */
/** @var \App\Core\LinkGenerator $link */
?>

<form action="<?= $link->url("auth.login") ?>" method="post">
    <h4 class="log-sign-info">Prihlásenie</h4>
    <?php require 'sablona.view.php' ?>
    <div class="text-center">
        <button class="btn btn-primary" type="submit">Prihlásiť</button>
    </div>
</form>