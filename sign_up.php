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
                            <h1>Créer un compte</h1>
                            <ul>
                                <li><a href="index">Accueil</a></li>
                                <li>Créer un compte</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb end -->

    <!-- Sign up start -->
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
                        <h2>Inscription</h2>
                        <p>Rejoignez la communauté de la Coordination Humanitaire CBCA.</p>
                        <form action="#" class="login_form">
                            <input type="text" placeholder="Nom complet">
                            <input type="email" placeholder="Adresse email">
                            <input type="password" placeholder="Mot de passe">
                            <input type="password" placeholder="Confirmer le mot de passe">
                            <button type="submit" class="common_btn">S'inscrire</button>
                        </form>
                        <b>Ou</b>
                        <a href="#" class="sign_up_others_option">
                            <img src="images/google_login.webp" alt="google" class="img-fluid w-100">
                            S'inscrire avec Google
                        </a>
                        <p class="sign_up">Vous avez déjà un compte ? <a href="sign_in">Se connecter</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Sign up end -->

    
<?php
include 'includes/footer.php';
?>