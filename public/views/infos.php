<div class="container" style="width : 100vw;">
<form method  = "post" action = "?p=infos">
    <div class="row flex-column align-items-center justify-content-center">
        <p class="title col-md-12 text-center"  style="margin-bottom:10px;font-size:30px">Player <?= $pseudo ?></p>
        <p class="title col-md-12 text-center"  style="margin-bottom:30px;font-size:20px">Niveau : <?= $lvl ?></p>

        <div style="height:80px;margin-bottom:15px"class="row d-flex flex-column justify-content-evenly  align-items-center">
            <span class="col-md-5 text-center">pseudo :</span>
            <input type="text" name="pseudo" class=" text-center" style='width:auto'value=<?= $pseudo?> >
        </div>

        <div style="height:80px;margin-bottom:15px"class="row d-flex flex-column justify-content-evenly  align-items-center">
            <span class="col-md-5 text-center">email :</span>
            <input type="text" name="email" class=" text-center" style='width:auto'value=<?= $email?> >
        </div>

        <div style="height:80px;margin-bottom:15px"class="row d-flex flex-column justify-content-evenly  align-items-center">
            <span class="col-md-5 text-center">mot de passe :</span>
            <input type="text" name="mdp" class=" text-center" style='width:auto'value=<?= $mdp?> >
        </div>

        <div style="height:80px;margin-bottom:15px"class="row d-flex flex-column justify-content-evenly  align-items-center">
            <span class="col-md-5 text-center">adresse :</span>
            <input type="text" name="adresse" class=" text-center" style='width:auto'value=<?= $adresse?> >
        </div>

        <div style="height:80px;margin-bottom:15px"class="row d-flex flex-column justify-content-evenly  align-items-center">
            <span class="col-md-5 text-center">cp :</span>
            <input type="text" name="cp" class=" text-center" style='width:auto'value=<?= $cp?> >
        </div>

        <div style="height:80px;margin-bottom:15px"class="row d-flex flex-column justify-content-evenly  align-items-center">
            <span class="col-md-5 text-center">ville :</span>
            <input type="text" name="ville" class=" text-center" style='width:auto'value=<?= $ville?> >
        </div>
        <button type="submit" name="submit" class=" col-md-2 btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;" >Modifier </button>    

    </div>
</form>
</div>