<?php use App\models\repository\UserRepo; ?>
<section>
    <div>
        <p>
            <?php
            /* $session = $_SESSION;
            $currentAccount = $_SESSION["compte"];  */
            $userRepo = new UserRepo();
            /* var_dump($userRepo->setUserByChamp("nom","Theo")->getDataUserSelected());  */
            $userRepo->setUserToCreate("6","TEST","test@gmail.com","TEST","5","rue des bg","29000","TEST",)
            
            ?>
        </p>
    </div>
</section>