<?php
/** @var Array $data
 * @var \App\Models\Movie $movie
 * @var \App\Core\IAuthenticator $auth
 * @var \App\Core\LinkGenerator $link */
?>

<div class="row">
    <div class="col-xl-2 pozadie-vlavo d-none d-xl-block"></div>
    <div class="col-xl-8">
        <table class="tabulka-vyberu">
            <tr>
                <th>Typ:</th>
                <th>Žáner:</th>
                <th>Obdobie:</th>
                <th></th>
                <th></th>
            </tr>
            <tr>
                <td>
                    <button class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        film
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">seriál</a></li>
                    </ul>
                </td>
                <td>
                    <button class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        -všetky-
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">akčný</a></li>
                        <li><a class="dropdown-item" href="#">animovaný</a></li>
                        <li><a class="dropdown-item" href="#">dobrodružný</a></li>
                    </ul>
                </td>
                <td>
                    <button class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        -všetky-
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">2024</a></li>
                        <li><a class="dropdown-item" href="#">2023</a></li>
                        <li><a class="dropdown-item" href="#">2022</a></li>
                    </ul>
                </td>
                <td>-</td>
                <td>
                    <button class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        -všetky-
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">2024</a></li>
                        <li><a class="dropdown-item" href="#">2023</a></li>
                        <li><a class="dropdown-item" href="#">2022</a></li>
                    </ul>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="#" class="btn btn-primary">Zobraziť</a>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </table>

        <div class="vyber-prechadzanie">
            <button class="btn" type="button">ďalšie ></button>
        </div>
        <?php if ($auth->isLogged()) { ?>
            <form action="<?= $link->url('movie.pridajFilm')?>" method="post">
                <div>
                    <input name="meno" id="meno">
                    <label for="meno">Názov</label>
                </div>
                <div>
                    <input name="rokVydania" id="rokVydania">
                    <label for="rokVydania">Rok vydania</label>
                </div>
                <div>
                    <input name="miestoVydania" id="miestoVydania">
                    <label for="miestoVydania">Miesto vydania</label>
                </div>
                <div>
                    <input name="hodnotenie" id="hodnotenie">
                    <label for="hodnotenie">Hodnotenie</label>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Pridať film</button>
            </form>
        <?php } ?>
        <table class="tabulka-vybranych">
            <tr>
                <th colspan="4">Rebríček</th>
            </tr>
            <?php foreach ($data['movies'] as $index => $movie): ?>
                <tr>
                    <td></td>
                    <td><?= $index + 1 ?></td>
                    <td><?= $movie->getMeno()." (".$movie->getRokVydania().")" ?></td>
                    <td>
                        <?php if ($auth->isLogged()) { ?>
                            <a href="<?= $link->url('movie.zmazFilm', ['id' => $movie->getId()]) ?>" class="btn btn-primary">Odobrať film</a>
                        <?php } ?>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td><?= $movie->getMiestoVydania() ?></td>
                    <td><?= $movie->getHodnotenie() ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td>Réžia:</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td>Hrajú:</td>
                    <td></td>
                    <td></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <div class="col-xl-2 pozadie-vpravo d-none d-xl-block"></div>
</div>