<section id="Catalogue">

    <div class="container">

        <?php $admin = $_SESSION['compte']['admin'] ?? "";
        if ($admin == 1) : ?>

            <div class="row adminPanel">
                <h3 class="text-center">Panel Admin</h3>
                <?= $CrudsAdmin ?>
            </div>

        <?php endif ?>
        <form method="post" class="row" action="?p=catalogue">
            <div class="col-4">
                <select class='form-select text-center' name="ville">
                    <option value="all">Toutes les villes</option>
                    <?= $htmlOptionViles ?>
                </select>
            </div>
            <div class="col-4">
                <select class='form-select text-center col-4' id="level" name="level">
                    <option value="all">level</option>
                    <option value="1">lvl 1</option>
                    <option value="2">lvl 2</option>
                    <option value="3">lvl 3</option>
                    <option value="4">lvl 4</option>
                    <option value="5">lvl 5</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary btn-lg col-4" style="padding-left: 2.5rem; padding-right: 2.5rem;" name="submit">filtrer </button>
        </form>
        <div class="row">
            <?= $htmlEscp ?>
        </div>

    </div>

</section>