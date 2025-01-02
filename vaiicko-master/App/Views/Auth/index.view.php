<?php
/** @var Array $data */
/** @var \App\Core\LinkGenerator $link */
?>

<form id="registracia" class="register" action="<?= $link->url("auth.registruj") ?>" method="post" autocomplete="on">
    <h4 class="log-sign-info">Registrácia</h4>
    <div class="row form-container">
        <label class="col-sm-3" for="email">Email:
            <span class="dolezite">*</span>
        </label>
        <input class="col-sm-6" type="text" name="email" id="email" placeholder="meno@server.sk" value="<?= $_POST['email'] ?? '' ?>" autofocus>
        <span id="emailSprava"><?= !empty($data['upozornenia']['email']) ? $data['upozornenia']['email'] : "" ?></span>
    </div>
    <div class="row form-container">
        <label class="col-sm-3" for="pMeno">Používateľské meno:
            <span class="dolezite">*</span>
        </label>
        <input class="col-sm-6" type="text" name="pMeno" id="pMeno" value="<?= $_POST['pMeno'] ?? '' ?>">
        <span id="pMenoSprava"><?= !empty($data['upozornenia']['pMeno']) ? $data['upozornenia']['pMeno'] : "" ?></span>
    </div>
    <div class="row form-container">
        <label class="col-sm-3" for="heslo">Heslo:
            <span class="dolezite">*</span>
        </label>
        <input class="col-sm-6" type="password" name="heslo" id="heslo" value="<?= $_POST['heslo'] ?? '' ?>">
        <span id="hesloSprava"><?= !empty($data['upozornenia']['heslo']) ? $data['upozornenia']['heslo'] : "" ?></span>
    </div>
    <div class="row form-container">
        <label class="col-sm-3" for="overenieHesla">Overenie hesla:
            <span class="dolezite">*</span>
        </label>
        <input class="col-sm-6" type="password" name="overenieHesla" id="overenieHesla" value="<?= $_POST['overenieHesla'] ?? '' ?>">
        <span id="overenieHeslaSprava"><?= !empty($data['upozornenia']['overenieHesla']) ? $data['upozornenia']['overenieHesla'] : "" ?></span>
    </div>
    <h5 class="dod-info-title">Dodatočné informácie:</h5>
    <div class="row form-container">
        <label class="col-sm-3" for="meno">Meno:</label>
        <input class="col-sm-6" type="text" name="meno" id="meno" value="<?= $_POST['meno'] ?? '' ?>">
        <span id="menoSprava"><?= !empty($data['upozornenia']['meno']) ? $data['upozornenia']['meno'] : "" ?></span>
    </div>
    <div class="row form-container">
        <label class="col-sm-3" for="priezvisko">Priezvisko:</label>
        <input class="col-sm-6" type="text" name="priezvisko" id="priezvisko" value="<?= $_POST['priezvisko'] ?? '' ?>">
        <span id="priezviskoSprava"><?= !empty($data['upozornenia']['priezvisko']) ? $data['upozornenia']['priezvisko'] : "" ?></span>
    </div>
    <div class="row form-container">
        <label class="col-sm-3" for="pohlavie">Pohlavie:</label>
        <div class="col-sm-6">
            <input type="radio" name="pohlavie" id="pohlavie" value="muz" <?= isset($_POST['pohlavie']) && $_POST['pohlavie'] == 'muz' ? 'checked' : '' ?>>muž
            <input type="radio" name="pohlavie" id="pohlavie" value="zena"  <?= isset($_POST['pohlavie']) && $_POST['pohlavie'] == 'zena' ? 'checked' : '' ?>>žena
            <input type="radio" name="pohlavie" id="pohlavie" value="ine"  <?= isset($_POST['pohlavie']) && $_POST['pohlavie'] == 'ine' ? 'checked' : '' ?>>iné
        </div>
        <span><?= !empty($data['upozornenia']['pohlavie']) ? $data['upozornenia']['pohlavie'] : "" ?></span>
    </div>
    <div class="text-center">
        <input class="btn btn-primary" type="submit" value="Zaregistrovať">
    </div>
</form>
