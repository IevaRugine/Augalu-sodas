<?php foreach ($store->getall() as $augalas) : ?>
    <?php if ($augalas->type == 'Agurkas') : ?>
        <div class="items" id="agurkasList">
            <div class="photo">
                <img class="img" src="<?= $augalas->photo ?>" alt="Agurkas">
            </div>
            <div>
                <h3 class="info">
                    Agurkas nr. <?= $augalas->id ?>
                </h3>
                <div class="info">
                    Kiekis: <?= $augalas->count ?>
                </div>
                <div class="info">
                    Kaina : <?= $augalas->price ?> $
                </div>
                <div class="info">
                    Kaina : <?= $augalas->price ?> €
                </div>
            </div>

            <button type="button" name="rauti" value=<?= $augalas->id ?>>IŠRAUTI</button>

        </div>
    <?php elseif ($augalas->type == 'Pomidoras') : ?>

        <div class="items" id="pomidorasList">
        <div class="photo">
            <img class="img" src="<?= $augalas->photo ?>" alt="Pomidoras">
            </div>
            <div>
                <h3 class="info">
                    Pomidoras nr. <?= $augalas->id ?>
                </h3>
                <div class="info">
                    Kiekis: <?= $augalas->count ?>
                </div>
                <div class="info">
                    Kaina : <?= $augalas->price ?> $
                </div>
                <div class="info">
                    Kaina : <?= $augalas->price ?> €
                </div>
            </div>

            <button type="button" name="rauti" value=<?= $augalas->id ?>>IŠRAUTI</button>

        </div>
    <?php endif ?>
<?php endforeach ?>