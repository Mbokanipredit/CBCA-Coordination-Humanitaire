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
                            <h1>Se connecter</h1>
                            <ul>
                                <li><a href="index">Accueil</a></li>
                                <li>Se connecter</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb end -->

    <!-- Sign in start -->
    <section class="sign_up mt_100 mb_100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-xl-7">
                    <div class="sign_up_img">
                        <img src="images/registration_img_2.webp" alt="login" class="img-fluid w-100">
                    </div>
                </div>
                <div class="col-lg-6 col-xl-5">
                    <div class="sign_up_contant">
                        <h2>Connexion</h2>
                        <p>Restez connecté avec la Coordination Humanitaire CBCA.</p>
                        <form action="#" class="login_form">
                            <input type="email" placeholder="Adresse email">
                            <input type="password" placeholder="Mot de passe">
                            <div class="remember_me">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="checkDefault">
                                    <label class="form-check-label" for="checkDefault">
                                        Se souvenir de moi
                                    </label>
                                </div>
                                <a class="forgot_password" href="forgot_password">Mot de passe oublié ?</a>
                            </div>
                            <button type="submit" class="common_btn">Se connecter</button>
                        </form>
                        <b>Ou</b>
                        <a href="#" class="sign_up_others_option">
                            <img src="images/google_login.webp" alt="google" class="img-fluid w-100">
                            Continuer avec Google
                        </a>
                        <p class="sign_up">Vous n'avez pas de compte ? <a href="sign_up">S'inscrire</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Sign in end -->

    
<?php
include 'includes/footer.php';
?>