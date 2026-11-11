<?php
require_once __DIR__ . '/includes/db.php';

if (isset($_GET['logout'])) {
    unset($_SESSION['user_id']);
    session_destroy();
    header('Location: sign_in');
    exit;
}

$signInError = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cbca_signin_submit'])) {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($email === '' || $password === '') {
        $signInError = 'Veuillez saisir votre adresse email et votre mot de passe.';
    } elseif (!$pdo) {
        $signInError = 'Le service de base de données est momentanément indisponible.';
    } else {
        try {
            $stmt = $pdo->prepare('SELECT * FROM `users` WHERE `email` = :email LIMIT 1');
            $stmt->execute([':email' => $email]);
            $user = $stmt->fetch();

            if ($user && password_verify($password, $user['password_hash'])) {
                $_SESSION['user_id'] = (int) $user['id'];
                header('Location: dashboard_profile');
                exit;
            } else {
                $signInError = 'Identifiants incorrects. Veuillez vérifier votre email et votre mot de passe.';
            }
        } catch (Throwable $e) {
            error_log('[CBCA SignIn] ' . $e->getMessage());
            $signInError = 'Une erreur est survenue lors de la connexion.';
        }
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
                    <?php if ($signInError): ?>
                        <div class="alert alert-danger mb-3"><?php echo htmlspecialchars($signInError); ?></div>
                    <?php endif; ?>
                    <form action="sign_in" method="POST" class="login_form">
                        <input type="hidden" name="cbca_signin_submit" value="1">
                        <input type="email" name="email" placeholder="Adresse email" required>
                        <input type="password" name="password" placeholder="Mot de passe" required>
                        <div class="remember_me">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember_me" value="1"
                                    id="checkDefault">
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