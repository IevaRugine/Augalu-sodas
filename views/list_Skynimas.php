<?php foreach ($store->getall() as $augalas) : ?>
    <div class="items">
        <img class="img" src="<?= $augalas->photo ?>" alt="Augalas">
        <div>
            <h3 class="info">
                Agurkas nr. <?= $augalas->id ?>
            </h3>
            <div class="info">
                Kaina : <?= $augalas->price ?> €
            </div>
            <div class="info">
                Galima skinti: <?= $augalas->count ?>
            </div>
            <div class="info">
                <input type="text" name="minus">
            </div>
            <div class="info">
                <button type="submit" name="skinti" value=<?= $augalas->id ?>>SKINTI</button>
            </div>
        </div>
        <button type="submit" name="visus" value=<?= $augalas->id ?>>SKINTI VISUS</button>
    </div>
<?php endforeach ?>