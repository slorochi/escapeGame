
<?php $admin = $_SESSION['compte']['admin'] ?? "";
        if($admin == 1) : ?>
            <section>
                <div class="row text-center ">
                    <div class="col-md-12" style="font-weight:800; font-size:2em; text-shadow:1px 1px 13px black; margin-bottom:20px;margin-top:20px;">Nombre total de comptes créés depuis la création</div>
                    <div class="col-md-12" style="font-size:1.25em;"><?=$accountsCreated?></div>
                    <div class="col-md-12" style="font-weight:800; font-size:2em; text-shadow:1px 1px 13px black!important; margin-bottom:20px; margin-top:20px;">Nombre actuel de comptes</div>
                    <div class="col-md-12" style="font-size:1.25em;"><?=$accounts?></div>
                    <div class="col-md-12" style="font-weight:800; font-size:2em; text-shadow:1px 1px 13px black;  margin-bottom:20px;margin-top:20px;">Nombre total de connexions depuis la création</div>
                    <div class="col-md-12" style="font-size:1.25em;"><?=$connexions?></div>
                </div>
            </section>
<?php endif ?>

            <form method="POST">
                <select name="SelectOption" id="SelectOption">
                    <option value="">--Please choose an option--</option>
                    <?= $htmlOption ?>
                </select>
            </form>
    <table class="container table table-dark table-hover">
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
