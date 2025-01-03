<?php
/** @var \App\Core\LinkGenerator $link
* @var \App\Core\IAuthenticator $auth
*/
?>

<!-- komponent nav prevziaty z bootstrapu s miernymi upravami -->
<ul class="nav kino-navbar">
    <?php if ($auth->isLogged()) {?>
    <li class="nav-item">
        <a href="<?= $link->url('movie.pridaj') ?>" class="nav-link btn btn-primary">Pridať</a>
    </li>
    <?php } ?>
    <li class="nav-item">
        <a class="nav-link" href="#">Filmy</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">Seriály</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= $link->url("movie.index") ?>">Vlastný výber</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">Zaujímavosti</a>
    </li>
</ul>

<div class="row">
    <div class="col-md-6 kino-obsah">
        <h3 class="novinky">Filmové novinky</h3>

        <!-- tu su komponenty card prevziate z bootstrapu s miernymi upravami -->
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                    <a href="#" class="card-link">Novinka</a>
                </h5>
                <p class="card-text"></p>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                    <a href="#" class="card-link">Novinka</a>
                </h5>
                <p class="card-text"></p>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                    <a href="#" class="card-link">Novinka</a>
                </h5>
                <p class="card-text"></p>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                    <a href="#" class="card-link">Novinka</a>
                </h5>
                <p class="card-text"></p>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                    <a href="#" class="card-link">Novinka</a>
                </h5>
                <p class="card-text"></p>
            </div>
        </div>
    </div>

    <div class="col-md-6 kino-obsah">
        <h3 class="novinky">Seriálové novinky</h3>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                    <a href="#" class="card-link">Novinka</a>
                </h5>
                <p class="card-text"></p>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                    <a href="#" class="card-link">Novinka</a>
                </h5>
                <p class="card-text"></p>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                    <a href="#" class="card-link">Novinka</a>
                </h5>
                <p class="card-text"></p>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                    <a href="#" class="card-link">Novinka</a>
                </h5>
                <p class="card-text"></p>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                    <a href="#" class="card-link">Novinka</a>
                </h5>
                <p class="card-text"></p>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                    <a href="#" class="card-link">Novinka</a>
                </h5>
                <p class="card-text"></p>
            </div>
        </div>
    </div>
</div>
