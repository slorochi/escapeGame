
<!--Section: Contact v.2-->
<section class="container">
    <div class="row justify-content-md-center">
        <!--Grid column-->
        <div class="col-md-8 mb-md-0 mb-5">
            <form id="contact-form" name="contact-form" action="?p=contact" method="POST">

                <!--Grid row-->
                <div class="row">
                    <?php
                    echo $verif;
                    ?>
                    <!--Grid column-->
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <label for="name" >Votre nom</label>
                            <input type="text" id="name" name="name"
                            value="<?php 
                                if(!empty($_POST['name'])){
                                    echo $_POST['name'];} 
                                    ?>"
                            class="form-control">
                            <?php  
                                if(isset($errors["name"])){
                                    echo '<p class="alert alert-danger">'.$errors["name"]."</p>";
                                } 
                            ?>
                        </div>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <label for="email" class="">Votre Email</label>
                            <input type="text" id="email" name="email" 
                            value="<?php 
                                if(!empty($_POST['email'])){
                                    echo $_POST['email'];} 
                                    ?>"
                            class="form-control">
                            <?php  
                            if(isset($errors["email"])){
                                echo '<p class="alert alert-danger">'.$errors["email"]."</p>";
                            } ?>
                            
                        </div>
                    </div>
                    <!--Grid column-->

                </div>
                <!--Grid row-->

                <!--Grid row-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="md-form mb-0">
                            <label for="subject" class="">Sujet</label>
                            <input type="text" id="subject" name="subject" value="<?php 
                                if(!empty($_POST['subject'])){
                                    echo $_POST['subject'];} 
                                    ?>"class="form-control">
                            <?php  
                            if(isset($errors["subject"])){
                                echo '<p class="alert alert-danger">'.$errors["subject"]."</p>";
                            } ?>
                            
                        </div>
                    </div>
                </div>
                <!--Grid row-->

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-12">

                        <div class="md-form">

                            <label for="message">votre message</label>
                            <textarea type="text" id="message" name="message" rows="2"
                            class="form-control md-textarea"><?php 
                                if(!empty($_POST['message'])){
                                    echo $_POST['message'];} 
                                    ?></textarea>
                            <?php  
                            if(isset($errors["message"])){
                                echo '<p class="alert alert-danger">'.$errors["message"]."</p>";
                            } ?>
                            
                        </div>

                    </div>
                </div>
                <!--Grid row-->
                <input class="btn btn-primary" type="submit">
                <?php

                

                ?>
                
            </form>

        </div>
        <!--Grid column-->
    </div>

</section>
<!--Section: Contact v.2-->
