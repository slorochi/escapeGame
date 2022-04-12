<section class="container">
<?php $admin = $_SESSION['compte']['admin'] ?? "";
        if($admin == 1) : ?>
        <div class="row adminPanel">
            <h3 class="text-center">Panel Admin</h3>
            <section>
                <div class="row">
                    <p class="col-md-6">Nombre total de comptes créés depuis la création</p>
                    <p class="col-md-6"><?=$accountsCreated?></p>
                    <p class="col-md-6">Nombre actuel de comptes</p>
                    <p class="col-md-6"><?=$accounts?></p>
                    <p class="col-md-6">Nombre total de connexions depuis la création</p>
                    <p class="col-md-6" ><?=$connexions?></p>
                </div>
            </section>
        </div>
<?php endif ?>

            <form method="POST" id="form">
                <select name="SelectOption" class="form-select text-center" id="SelectOption"?>
                    <option value="" >Tous les Escapes Games </option>
                    <?= $htmlOption ?>
                </select>
            </form>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">Nom du joueur</th>
            <th scope="col">Escape game</th>
            <th scope="col">Temps</th>
            <th scope="col">Date</th>
            </tr>
        </thead>
        <tbody>
            <?= $htmlLeaderboard ?>
        </tbody>
    </table>
</section>
