<?php
/** @var Array $data */
/** @var \App\Core\LinkGenerator $link */
?>

<form action="<?= $link->url("auth.login") ?>" method="post">
    <h4 class="log-sign-info">Prihlásenie</h4>
    <div class="row form-container">
        <label class="col-sm-3" for="email">Email:</label>
        <input class="col-sm-6" type="email" name="email" id="email" placeholder="meno@server.sk" value="@" required autofocus>
    </div>
    <div class="row form-container">
        <label class="col-sm-3" for="password">Heslo:</label>
        <input class="col-sm-6" type="password" name="heslo" id="password" required>
    </div>

    <div class="text-center">
        <button class="btn btn-primary" type="submit">Prihlásiť</button>
    </div>
</form>