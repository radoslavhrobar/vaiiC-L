<?php
/** @var Array $data */
/** @var \App\Core\LinkGenerator $link */
?>

<form action="<?= $link->url("auth.registruj") ?>" method="post" autocomplete="on">
    <h4 class="log-sign-info">Registrácia</h4>
    <div class="row form-container">
        <label class="col-sm-3" for="email">Email:
            <span class="dolezite">*</span>
        </label>
        <input class="col-sm-6" type="email" name="email" id="email" placeholder="meno@server.sk" value="<?= $_POST['email'] ?? '' ?>" required autofocus>
        <span><?= !empty($data['upozornenia']['email']) ? $data['upozornenia']['email'] : "" ?></span>
    </div>
    <div class="row form-container">
        <label class="col-sm-3" for="pmeno">Používateľské meno:
            <span class="dolezite">*</span>
        </label>
        <input class="col-sm-6" type="text" name="p_meno" id="pmeno" value="<?= $_POST['p_meno'] ?? '' ?>" required>
        <span><?= !empty($data['upozornenia']['p_meno']) ? $data['upozornenia']['p_meno'] : "" ?></span>
    </div>
    <div class="row form-container">
        <label class="col-sm-3" for="password">Heslo:
            <span class="dolezite">*</span>
        </label>
        <input class="col-sm-6" type="password" name="heslo" id="password" value="<?= $_POST['heslo'] ?? '' ?>" required>
        <span><?= !empty($data['upozornenia']['heslo']) ? $data['upozornenia']['heslo'] : "" ?></span>
    </div>
    <div class="row form-container">
        <label class="col-sm-3" for="checkPassword">Overenie hesla:
            <span class="dolezite">*</span>
        </label>
        <input class="col-sm-6" type="password" name="overenieHesla" id="checkPassword" value="<?= $_POST['overenieHesla'] ?? '' ?>" required>
        <span><?= !empty($data['upozornenia']['overenieHesla']) ? $data['upozornenia']['overenieHesla'] : "" ?></span>
    </div>
    <h5 class="dod-info-title">Dodatočné informácie:</h5>
    <div class="row form-container">
        <label class="col-sm-3" for="meno">Meno:</label>
        <input class="col-sm-6" type="text" name="meno" id="meno" pattern="[A-ZÁÄČĎÉĚÍĹĽŇÓÔŔŠŤÚŮÝŽ][a-záäčďéěíĺľňóôŕšťúůýž]*" title="Meno musí začínať veľkým písmenom a obsahovať len písmená!" value="<?= $_POST['meno'] ?? '' ?>">
        <span><?= !empty($data['upozornenia']['meno']) ? $data['upozornenia']['meno'] : "" ?></span>
    </div>
    <div class="row form-container">
        <label class="col-sm-3" for="priezvisko">Priezvisko:</label>
        <input class="col-sm-6" type="text" name="priezvisko" id="priezvisko" pattern="[A-ZÁÄČĎÉĚÍĹĽŇÓÔŔŠŤÚŮÝŽ][a-záäčďéěíĺľňóôŕšťúůýž]*" title="Priezvisko musí začínať veľkým písmenom a obsahovať len písmená!" value="<?= $_POST['priezvisko'] ?? '' ?>">
        <span><?= !empty($data['upozornenia']['priezvisko']) ? $data['upozornenia']['priezvisko'] : "" ?></span>
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
        <button class="btn btn-primary" type="submit">Zaregistrovať</button>
    </div>
</form>
