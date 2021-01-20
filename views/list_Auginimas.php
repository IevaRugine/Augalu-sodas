<?php foreach ($store->getall() as $augalas) : ?>
    <div>
        <img src="<?= $augalas->foto ?>" alt="Agurkas">
        <?php $augalas->plius ?>
        <h1 style="display:inline;"><?= $augalas->count ?></h1>
        <h3 style="display:inline;color:red;">+<?= $augalas->plius ?></h3>

        <input type="hidden" name="kiekis[<?= $augalas->id ?>]" value="<?= $augalas->plius ?>">

        Augalo Nr. <?= $augalas->id ?>
    </div>
<?php endforeach ?>