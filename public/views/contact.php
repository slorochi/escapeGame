
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
                        <div class="md-form form-contener mb-0">
                            
                            <input type="text" id="name" name="name"
                            value="<?php 
                                if(!empty($_POST['name'])){
                                    echo $_POST['name'];} 
                                    ?>"
                            class="form-escape" required>

                            <label for="name" >Votre nom</label>

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
                        <div class="md-form form-contener mb-0">
                            
                            <input type="text" id="email" class="form-escape" name="email" 
                            value="<?php 
                                if(!empty($_POST['email'])){
                                    echo $_POST['email'];} 
                                    ?>"
                            class="form-escape" required>

                            <label for="email" class="">Votre Email</label>

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
                        <div class="md-form form-contener mb-0">
                            
                            <input type="text" class="form-escape" id="subject" name="subject" value="<?php if(!empty($_POST['subject'])){ echo $_POST['subject'];}?>"class="form-escape" required>
                            <?php  
                            if(isset($errors["subject"])){ echo '<p class="alert alert-danger">'.$errors["subject"]."</p>";} ?>

                            <label for="subject" class="">Sujet</label>

                        </div>
                    </div>
                </div>
                <!--Grid row-->

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-12">

                        <div class="md-form form-contener">
                        
                            <textarea type="text" id="message" name="message" rows="2"
                            class="form-escape  md-textarea" required><?php if(!empty($_POST['message'])){echo $_POST['message'];}  ?></textarea>

                            <label for="message">Votre message</label>
                            <?php  
                            if(isset($errors["message"])){ echo '<p class="alert alert-danger">'.$errors["message"]."</p>";} ?>
                            
                        </div>

                    </div>
                </div>
                <!--Grid row-->
                <input class="btn btn-primary" type="submit">

            </form>

        </div>
        <!--Grid column-->
    </div>

</section>
<!--Section: Contact v.2-->
