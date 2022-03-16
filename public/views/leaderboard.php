<?php use App\models\repository\UserRepo; ?>
<section>
    <div>
        <p>
            <?php
            $session = $_SESSION;
            $currentAccount = $_SESSION["compte"]; 
            $userRepo = new UserRepo();
            /* $userRepo->setAllUsers(); */
            var_dump($userRepo->setUserByChamp("niveau","2")->getDataUserSelected()); 

            ?>
        </p>
    </div>
</section>