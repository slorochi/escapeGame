<div class="container" style="width : 100vw;">
    <div class="row flex-column align-items-center justify-content-center">
        <p class="title col-md-12 text-center"  style="margin-bottom:10px;font-size:30px">Player <?= $pseudo ?></p>
        <p class="title col-md-12 text-center"  style="margin-bottom:30px;font-size:20px">Niveau : <?= $lvl ?></p>

        <div style="height:100px;margin-bottom:15px"class="row d-flex flex-column justify-content-evenly  align-items-center">
            <span class="col-md-5 text-center">pseudo : <?= $pseudo?></span>
            <button type="submit" class=" col-md-2 btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;" >Modifier </button>    
        </div>

        <div style="height:100px;margin-bottom:15px"class="row d-flex flex-column justify-content-evenly  align-items-center">
            <span class="col-md-5 text-center">email : <?= $email?></span>
            <button type="submit" class=" col-md-2 btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;" >Modifier </button>    
        </div>

        <div style="height:100px;margin-bottom:15px"class="row d-flex flex-column justify-content-evenly  align-items-center">
            <span class="col-md-5 text-center">mot de passe : <?= $mdp?></span>
            <button type="submit" class=" col-md-2 btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;" >Modifier </button>    
        </div>

        <div style="height:100px;margin-bottom:15px"class="row d-flex flex-column justify-content-evenly  align-items-center">
            <span class="col-md-5 text-center">adresse : <?= $adresse?></span>
            <button type="submit" class=" col-md-2 btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;" >Modifier </button>    
        </div>

        <div style="height:100px;margin-bottom:15px"class="row d-flex flex-column justify-content-evenly  align-items-center">
            <span class="col-md-5 text-center">cp : <?= $cp?></span>
            <button type="submit" class=" col-md-2 btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;" >Modifier </button>    
        </div>

        <div style="height:100px;margin-bottom:15px"class="row d-flex flex-column justify-content-evenly  align-items-center">
            <span class="col-md-5 text-center">ville : <?= $ville?></span>
            <button type="submit" class=" col-md-2 btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;" >Modifier </button>    
        </div>
            
    </div>

</div>