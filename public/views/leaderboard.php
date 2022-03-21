<?php

use App\models\repository\EscapeRepo;


 ?>
<section>
    <div>
        <p>
            <?php
                $data = new EscapeRepo;
                var_dump($data->deleteEscape("mission yakuza"));
            ?>
        </p>
    </div>
</section>