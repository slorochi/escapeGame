<div class="container" style="width : 100vw;">
    <div class="row adminPanel">
        <div>
            <p class="title col-md-12 text-center" style="margin-bottom:10px;font-size:30px">Player <?= $pseudo ?></p>
            <p class="title col-md-12 text-center" style="margin-bottom:30px;font-size:20px">Niveau : <?= $lvl ?></p>
        </div>
        
        <form method="post" action="?p=infos" class="col-6 ">
            <div class="row flex-column align-items-center justify-content-center">
                

                <div style="height:80px;margin-bottom:15px" class="row d-flex flex-column justify-content-evenly  align-items-center">
                    <span class="col-md-5 text-center">pseudo :</span>
                    <input type="text" name="pseudo" class="form-control text-center" style='width:auto' value='<?= $pseudo ?>'>
                </div>

                <div style="height:80px;margin-bottom:15px" class="row d-flex flex-column justify-content-evenly  align-items-center">
                    <span class="col-md-5 text-center">email :</span>
                    <input type="text" name="email" class="form-control text-center" style='width:auto' value='<?= $email ?>'>
                </div>



                <div style="height:80px;margin-bottom:15px" class="row d-flex flex-column justify-content-evenly  align-items-center">
                    <span class="col-md-5 text-center">adresse :</span>
                    <input type="text" name="adresse" class="form-control text-center" style='width:auto' value='<?= $adresse ?>'>
                </div>

                <div style="height:80px;margin-bottom:15px" class="row d-flex flex-column justify-content-evenly  align-items-center">
                    <span class="col-md-5 text-center">cp :</span>
                    <input type="text" name="cp" class="form-control text-center" style='width:auto' value='<?= $cp ?>'>
                </div>

                <div style="height:80px;margin-bottom:15px" class="row d-flex flex-column justify-content-evenly  align-items-center">
                    <span class="col-md-5 text-center">ville :</span>
                    <input type="text" name="ville" class="form-control text-center" style='width:auto' value='<?= $ville ?>'>
                </div>
                <button type="submit" name="submit" class="col-md-5 btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">Modifier </button>

            </div>
        </form>

        <form method="post" action="?p=infos" class="col-6">
            <div class="row">
                <div style="height:80px;margin-bottom:15px" class="row d-flex flex-column justify-content-evenly  align-items-center">
                    <span class="col-md-5 text-center">Modifier mot de passe :</span>
                    <input type="password" name="mdp" class="form-control text-center" style='width:auto'>
                </div>
                <div style="height:80px;margin-bottom:15px" class="row d-flex flex-column justify-content-evenly  align-items-center">
                <button type="submit" name="submitPwd" class="col-md-5 btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">Valider</button>
                </div>
            </div>
        </form>
    </div>
    <?php $admin = $_SESSION['compte']['admin'] ?? "";
        if ($admin == 1) : ?>

            <div class="row adminPanel">
                
                <h3 class="text-center">Panel Admin</h3>
                <table class="table table-dark table-hover">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Pseudo</th>
                            <th scope="col">Mail</th>
                            <th scope="col">lvl</th>
                            <th scope="col">Cp</th>
                            <th scope="col">Ville</th>
                            <th scope="col">Admin</th>
                            <th scope="col">Supprimer</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?= $allUsers ?>
                    </tbody>
                </table>
            </div>

        <?php endif ?>
    <!-- bouton pour delete un user -->
        
</div>
