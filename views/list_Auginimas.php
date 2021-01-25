<?php foreach ($store->getall() as $augalas) : ?>
    <div class="items">
        <div class="photo">
            <img class="img" src="<?= $augalas->photo ?>" alt="Agurkas">
        </div>
        <div>
            <h3 class="info">
                <?= $augalas->type ?> nr. <?= $augalas->id ?>
            </h3>
            <div class="info">
                Kaina : <?= $augalas->price ?> $
            </div>
            <div class="info">
                Kaina : <?= $augalas->price ?> €
            </div>
            <div class="info">
                <h3 style="display:inline;color:red;"> Priauginta: <?= $augalas->plius ?></h3>
            </div>
        </div>

        <div class="info">
            <h3>Iš viso augalų: </h3>
            <h3 style="display:inline;"><?= $augalas->count ?></h3>
            <input type="hidden" name="kiekis[<?= $augalas->id ?>]" value="<?= $augalas->plius ?>">
        </div>
    </div>
<?php endforeach ?>