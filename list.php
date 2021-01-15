<?php foreach ($store->getall() as $augalas) : ?>
    <?php if ($augalas->name == 'Agurkas') : ?>
        <div class="items" id="agurkasList">
            <img class="img" src="<?= $augalas->foto ?>" alt="Agurkas">
            <div>
                <h3 class="info">
                    Agurkas nr. <?= $augalas->id ?>
                </h3>
                <div class="info">
                    Kiekis: <?= $augalas->count ?>
                </div>
                <div class="info">
                    Kaina : <?= $augalas->count ?> $
                </div>
                <div class="info">
                    Kaina : <?= $augalas->count ?> €
                </div>
            </div>
            <button type="button" name="rauti" value=<?= $augalas->id ?>>IŠRAUTI</button>
        </div>
    <?php elseif ($augalas->name == 'Pomidoras') : ?>

        <div class="items" id="pomidorasList">
            <img class="img" src="<?= $augalas->foto ?>" alt="Pomidoras">
            <div>
                <h3 class="info">
                    Pomidoras nr. <?= $augalas->id ?>
                </h3>
                <div class="info">
                    Kiekis: <?= $augalas->count ?>
                </div>
                <div class="info">
                    Kaina : <?= $augalas->count ?> $
                </div>
                <div class="info">
                    Kaina : <?= $augalas->count ?> €
                </div>
            </div>
            <button type="button" name="rauti" value=<?= $augalas->id ?>>IŠRAUTI</button>
        </div>
    <?php endif ?>
<?php endforeach ?>