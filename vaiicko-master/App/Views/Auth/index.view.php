<?php
/** @var Array $data */
/** @var \App\Core\LinkGenerator $link */
?>

<form action="<?= $link->url("auth.index") ?>" method="post">
    <h4 class="log-sign-info">Registrácia</h4>
    <div class="row form-container">
        <label class="col-sm-3" for="pmeno">Používateľské meno:
            <span class="dolezite">*</span>
        </label>
        <input class="col-sm-6" type="text" name="pmeno" id="pmeno" required autofocus>
    </div>
    <?php require 'sablona.view.php' ?>
    <div class="row form-container">
        <label class="col-sm-3" for="password">Overenie hesla:
            <span class="dolezite">*</span>
        </label>
        <input class="col-sm-6" type="password" name="password" id="password" required>
    </div>
    <h5 class="dod-info-title">Dodatočné informácie:</h5>
    <div class="row form-container">
        <label class="col-sm-3" for="meno">Meno:</label>
        <input class="col-sm-6" type="text" name="meno" id="meno">
    </div>
    <div class="row form-container">
        <label class="col-sm-3" for="priezvisko">Priezvisko:</label>
        <input class="col-sm-6" type="text" name="priezvisko" id="priezvisko">
    </div>
    <div class="row form-container">
        <label class="col-sm-3" for="datumNarodenia">Dátum narodenia:</label>
        <input class="col-sm-6" type="date" name="datumNarodenia" id="datumNarodenia">
    </div>
    <div class="row form-container">
        <label class="col-sm-3" for="pohlavie">Pohlavie:</label>
        <div class="col-sm-6">
            <input type="radio" name="pohlavie" id="pohlavie" checked>muž
            <input type="radio" name="pohlavie" id="pohlavie">žena
            <input type="radio" name="pohlavie" id="pohlavie">iné
        </div>
    </div>
    <div class="text-center">
        <button class="btn btn-primary" type="submit">Zaregistrovať</button>
    </div>
</form>
