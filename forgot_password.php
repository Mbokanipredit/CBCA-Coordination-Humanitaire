<?php
$pageTitle = "CBCA - Coordination Humanitaire";
include 'includes/head.php';
include 'includes/header.php';
?>


    <!-- Breadcrumb start -->
    <section class="breadcrumb" style="background: url(images/breadcrumb_bg.webp);">
        <div class="breadcrumb_overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb_text">
                            <h1>Mot de passe oublié</h1>
                            <ul>
                                <li><a href="index">Accueil</a></li>
                                <li>Mot de passe oublié</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb end -->

    <!-- Forgot password start -->
    <section class="sign_up mt_100 mb_100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-xl-7">
                    <div class="sign_up_img">
                        <img src="images/registration_img.webp" alt="login" class="img-fluid w-100">
                    </div>
                </div>
                <div class="col-lg-6 col-xl-5">
                    <div class="sign_up_contant">
                        <h2>Mot de passe oublié ?</h2>
                        <p>Entrez votre adresse email ci-dessous pour réinitialiser votre mot de passe.</p>
                        <form action="#" class="login_form">
                            <input type="email" placeholder="Adresse email">
                            <button type="submit" class="common_btn">Envoyer l'instruction</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Forgot password end -->

    
<?php
include 'includes/footer.php';
?>