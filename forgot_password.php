<?php
require_once __DIR__ . '/includes/db.php';

$forgotSuccess = null;
$forgotError = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cbca_forgot_submit'])) {
    $email = trim($_POST['email'] ?? '');
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $forgotError = 'Veuillez saisir une adresse email valide.';
    } else {
        $forgotSuccess = 'Si un compte est associé à ' . htmlspecialchars($email) . ', les instructions de réinitialisation ont été envoyées.';
    }
}

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
                        <?php if ($forgotSuccess): ?>
                            <div class="alert alert-success mb-3"><?php echo $forgotSuccess; ?></div>
                        <?php endif; ?>
                        <?php if ($forgotError): ?>
                            <div class="alert alert-danger mb-3"><?php echo htmlspecialchars($forgotError); ?></div>
                        <?php endif; ?>
                        <form action="forgot_password" method="POST" class="login_form">
                            <input type="hidden" name="cbca_forgot_submit" value="1">
                            <input type="email" name="email" placeholder="Adresse email" required>
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