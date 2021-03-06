
<?php use App\models\repository\UserRepo; ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet/less" href="views/style/reset.less">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet/less" href="views/style/style.less">
    <script src="https://cdn.jsdelivr.net/npm/less@4.1.1" ></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../script.js" async></script>

</head>

<body>
<!-- common header -->
<header class="container-fluid">
    <div class="header">
        <div class="row AZERTY">
            <div class="col-10 menu">
                <div class="row">
                    <div class="offset-4 col-4 logo">
                        <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 132.46 70.69"><defs></defs><g id="Calque_2" data-name="Calque 2"><g id="Calque_1-2" data-name="Calque 1"><path class="cls-1" d="M12.64,37.67V3.62A2.22,2.22,0,0,1,13.32,2a2.26,2.26,0,0,1,3.23,0,2.19,2.19,0,0,1,.68,1.61V33.07H33.48a2.33,2.33,0,0,1,1.65.67,2.25,2.25,0,0,1,0,3.26,2.33,2.33,0,0,1-1.65.67Z"/><path class="cls-1" d="M60,19.92v5.55a2.34,2.34,0,0,1-2.3,2.3H41.44v1.34a2.48,2.48,0,0,0,1,2l1.34,1.12a3.42,3.42,0,0,0,2.08.85H57.68a2.28,2.28,0,0,1,1.62.67A2.22,2.22,0,0,1,60,35.37a2.15,2.15,0,0,1-.7,1.61,2.21,2.21,0,0,1-1.6.69H45.57A7,7,0,0,1,43,37.16a6.94,6.94,0,0,1-2-1L39,34.3a6,6,0,0,1-1.6-2.13,6.09,6.09,0,0,1-.64-2.52V19.13a6.3,6.3,0,0,1,.7-2.44,6.3,6.3,0,0,1,1.76-2.38l1.92-1.5a6.46,6.46,0,0,1,4.18-1.53H51.8a6.64,6.64,0,0,1,4.6,2l1.72,1.64A6.36,6.36,0,0,1,60,19.92Zm-18.49-.36v3.56H55.44v-3.2a2.46,2.46,0,0,0-.79-2l-1.34-1.17a3.11,3.11,0,0,0-1.86-.85H45.68a2.89,2.89,0,0,0-1.94.74L42.4,17.79A2.13,2.13,0,0,0,41.49,19.56Z"/><path class="cls-1" d="M84.16,13.58V18l-8,18.11c-.51,1.07-1.19,1.61-2,1.61h-3A2.46,2.46,0,0,1,68.86,36L60.94,18V13.58A2.25,2.25,0,0,1,61.61,12a2.3,2.3,0,0,1,3.93,1.62l0,3.53,7,15.75,7-15.8V13.58A2.22,2.22,0,0,1,80.19,12a2.3,2.3,0,0,1,1.67-.67,2.21,2.21,0,0,1,1.63.67A2.25,2.25,0,0,1,84.16,13.58Z"/><path class="cls-1" d="M108.31,18.57v5.55a2.32,2.32,0,0,1-2.3,2.29H89.77v1.34a2.5,2.5,0,0,0,1,2l1.34,1.12a3.42,3.42,0,0,0,2.08.85H106a2.3,2.3,0,0,1,2.3,2.3,2.17,2.17,0,0,1-.7,1.61,2.24,2.24,0,0,1-1.6.68H93.9a7.24,7.24,0,0,1-2.53-.5,6.48,6.48,0,0,1-2-1.06L87.36,33a6,6,0,0,1-1.6-2.13,6.09,6.09,0,0,1-.64-2.52V17.77a6.26,6.26,0,0,1,.7-2.43A6.3,6.3,0,0,1,87.58,13l1.92-1.5a6.48,6.48,0,0,1,4.18-1.53h6.45a6.64,6.64,0,0,1,4.6,2l1.72,1.64A6.34,6.34,0,0,1,108.31,18.57Zm-18.48-.36v3.56h13.94v-3.2a2.44,2.44,0,0,0-.79-2l-1.34-1.18a3.15,3.15,0,0,0-1.86-.85H94a2.94,2.94,0,0,0-1.94.74l-1.34,1.12A2.14,2.14,0,0,0,89.83,18.21Z"/><path class="cls-1" d="M109.27,36.34V2.3A2.22,2.22,0,0,1,110,.68a2.25,2.25,0,0,1,3.22,0,2.22,2.22,0,0,1,.69,1.62V31.75h16.24a2.27,2.27,0,0,1,1.65.67,2.24,2.24,0,0,1,0,3.25,2.27,2.27,0,0,1-1.65.67Z"/><path class="cls-1" d="M13.43,33h7.62a2.25,2.25,0,0,1,1.63.67A2.32,2.32,0,0,1,22.63,37a2.28,2.28,0,0,1-1.58.67H13.77a2.27,2.27,0,0,0-1.86,1L5.46,47a4.15,4.15,0,0,0-.81,2.74V62.42a2.3,2.3,0,0,0,.67,1.67A2.2,2.2,0,0,0,7,64.77H16.3a2.32,2.32,0,0,0,2.29-2.3v-5H13.84a2.21,2.21,0,0,1-1.64-.67,2.34,2.34,0,0,1,0-3.26,2.21,2.21,0,0,1,1.64-.67h9.35v9.57a6.91,6.91,0,0,1-6.89,6.89H7a6.69,6.69,0,0,1-4.91-2,6.61,6.61,0,0,1-2-4.87V49.76A9.11,9.11,0,0,1,1.83,44l6.78-8.62a5.93,5.93,0,0,1,2.07-1.66A5.87,5.87,0,0,1,13.43,33Z"/><path class="cls-1" d="M33.33,52.79h9a10.08,10.08,0,0,1,2.13.33l0-3.25a2.29,2.29,0,0,0-2.3-2.3H33.38a2.32,2.32,0,0,1-2.3-2.3,2.17,2.17,0,0,1,.67-1.62A2.21,2.21,0,0,1,33.38,43h8.73A6.64,6.64,0,0,1,47,45a6.91,6.91,0,0,1,2.1,4.9l.57,17.2a2.3,2.3,0,0,1-2.29,2.29,2.27,2.27,0,0,1-1.67-.67A2.17,2.17,0,0,1,45,67.07l-3.88,2.29H33.33a6.91,6.91,0,0,1-7-6.94V59.74a7,7,0,0,1,7-7Zm11.49,8.94-.14-1.94A2.37,2.37,0,0,0,44,58.15a2.19,2.19,0,0,0-1.62-.65H33.32A2.29,2.29,0,0,0,31,59.79v2.57a2.34,2.34,0,0,0,2.3,2.3h6.49Z"/><path class="cls-1" d="M52.67,67.09V45.3A2.29,2.29,0,0,1,55,43a2.12,2.12,0,0,1,2.24,1.75A6.09,6.09,0,0,1,61.46,43,5.46,5.46,0,0,1,66,45.3,6.44,6.44,0,0,1,70.8,43a5.12,5.12,0,0,1,3.7,1.52,5.5,5.5,0,0,1,1.68,3.87l.66,18.75a2.34,2.34,0,0,1-2.3,2.3,2.26,2.26,0,0,1-1.64-.68,2.32,2.32,0,0,1-.71-1.62l-.55-18c0-1-.34-1.47-.9-1.47a1.49,1.49,0,0,0-1,.41L67.05,50.3V67.09a2.18,2.18,0,0,1-.67,1.59,2.31,2.31,0,0,1-3.24,0A2.19,2.19,0,0,1,62.45,67V48.77c0-.78-.33-1.17-1-1.17a1.36,1.36,0,0,0-.9.35l-3.29,2.79V67.09a2.27,2.27,0,0,1-.66,1.62,2.11,2.11,0,0,1-1.58.68,2.32,2.32,0,0,1-1.66-.68A2.22,2.22,0,0,1,52.67,67.09Z"/><path class="cls-1" d="M103.05,52.94v5.55a2.34,2.34,0,0,1-2.3,2.3H84.51v1.34a2.51,2.51,0,0,0,1,2l1.34,1.12a3.47,3.47,0,0,0,2.08.84h11.81a2.24,2.24,0,0,1,1.61.67,2.19,2.19,0,0,1,.69,1.63,2.36,2.36,0,0,1-2.3,2.3H88.64a7,7,0,0,1-2.53-.51,6.56,6.56,0,0,1-2-1.05l-2.05-1.8a6.75,6.75,0,0,1-2.24-4.65V52.15a7.74,7.74,0,0,1,2.46-4.81l1.91-1.51a6.51,6.51,0,0,1,4.19-1.53h6.45a6.69,6.69,0,0,1,4.6,2L101.19,48A6.33,6.33,0,0,1,103.05,52.94Zm-18.49-.35v3.55h14v-3.2a2.5,2.5,0,0,0-.79-2L96.38,49.8A3.11,3.11,0,0,0,94.52,49H88.75a3,3,0,0,0-2,.74l-1.33,1.12A2.12,2.12,0,0,0,84.56,52.59Z"/></g></g></svg></a>
                    </div>
                </div>
                    <div class="row liens">
                        <a href="?p=accueil"class="col-3" >Accueil</a>
                        <a href="?p=leaderboard"class="col-3" >Leader Board</a>
                        <a href="?p=catalogue"class="col-3" >Catalogue</a>
                    <a href="?p=contact"class="col-3" >Contact</a>
                    </div>
                </div>

                <?php  
                
                $compte = $_SESSION['compte'] ?? "";
                
                if($compte) :
                    $userRepo = new UserRepo();
                    $userRepo->setUserByChamp("email",$session->GetCompte()["email"] );
                    $try = $userRepo->getDataUserSelected(); ?>
                <!-- Si connect?? -->
                        <div class="col-2 connecter">
                            <a href="?p=infos" class="avatar">
                                <img src="views/style/img/avatar<?= $try->getNiveau();?>.png" alt="">
                                <span class="user"><?php 
                               
                                echo($try->getNom()); ?></span>
                                <span class="niveau">lvl&nbsp<?= $try->getNiveau(); ?></span>
                            </a>
                            <div class="userconnecter">
                                <div class="row">
                                    <a href="?p=stats" class="col-6"><i class="fas fa-trophy"></i></a>
                                    <a href="?p=login" class="col-6"><i class="fa-solid fa-right-from-bracket"></i></a>
                                </div>
                            </div>
                        </div>
                <?php else : ?>
                    <!-- Si d??connect?? -->
                        <div class="col-2 deconnecter">
                            <div class="userconnecter">
                                <div class="row">
                                    <a href="?p=login" class="col-12"><span>Connection</span><i class="fa-solid fa-right-to-bracket"></i></a>
                                </div>
                            </div>
                        </div>
                <?php endif ?>
                
            </div>
         </div>
    </div>
</header>

    <?= $page_content;?>
    
</body>
</html>
