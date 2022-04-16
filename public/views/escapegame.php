<div class="container">
    <div class="row">
        <div class="card mb-3">
            <img src="views/style/img/escgame<?= $idType ?>.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?= $nom ?></h5>
                <p class="card-text"><?= $description ?></p>
                <p class="card-text">Le niveau requis est de <?= $niveau ?>.</p>
                <p class="card-text"><small class="">Adresse : <?= $adresse ?> <?=$cp?> <?=$ville?></small></p>
            </div>
        </div>
    </div>
</div>
