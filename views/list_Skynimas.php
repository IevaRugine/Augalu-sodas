<?php foreach ($store->getall() as $augalas) : ?>
    <div class="items">
        <img src="<?= $augalas->foto ?>" alt="Augalas">
        Augalas nr. <?= $augalas->id ?>
        Galima skinti: <?= $augalas->count ?>
        <input type="text" name="minus">
        <button type="submit" name="skinti" value=<?= $augalas->id ?>>SKINTI</button>
        <button type="submit" name="visus" value=<?= $augalas->id ?>>SKINTI VISUS</button>
    </div>
<?php endforeach ?>