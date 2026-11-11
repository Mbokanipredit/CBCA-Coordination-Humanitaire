<?php
require_once __DIR__ . '/includes/db.php';

$signUpError = null;
$signUpSuccess = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cbca_signup_submit'])) {
    $fullName        = trim($_POST['full_name'] ?? '');
    $email           = trim($_POST['email'] ?? '');
    $password        = $_POST['password'] ?? '';
    $passwordConfirm = $_POST['password_confirm'] ?? '';

    if ($fullName === '' || $email === '' || $password === '') {
        $signUpError = 'Veuillez remplir tous les champs obligatoires.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $signUpError = 'Veuillez saisir une adresse email valide.';
    } elseif (strlen($password) < 6) {
        $signUpError = 'Le mot de passe doit contenir au moins 6 caractères.';
    } elseif ($password !== $passwordConfirm) {
        $signUpError = 'Les mots de passe ne correspondent pas.';
    } elseif (!$pdo) {
        $signUpError = 'Le service de base de données est momentanément indisponible.';
    } else {
        try {
            $check = $pdo->prepare('SELECT `id` FROM `users` WHERE `email` = :email LIMIT 1');
            $check->execute([':email' => $email]);
            if ($check->fetch()) {
                $signUpError = 'Cette adresse email est déjà associée à un compte.';
            } else {
                $parts = preg_split('/\s+/', $fullName, 2);
                $firstName = $parts[0] ?? $fullName;
                $lastName  = $parts[1] ?? '';

                $stmt = $pdo->prepare('
                    INSERT INTO `users` (`first_name`, `last_name`, `email`, `password_hash`)
                    VALUES (:first_name, :last_name, :email, :password_hash)
                ');
                $stmt->execute([
                    ':first_name'    => $firstName,
                    ':last_name'     => $lastName,
                    ':email'         => $email,
                    ':password_hash' => password_hash($password, PASSWORD_DEFAULT),
                ]);

                $_SESSION['user_id'] = (int) $pdo->lastInsertId();
                header('Location: dashboard_profile');
                exit;
            }
        } catch (Throwable $e) {
            error_log('[CBCA SignUp] ' . $e->getMessage());
            $signUpError = 'Une erreur est survenue lors de la création de votre compte.';
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
                        <?php if ($signUpError): ?>
                            <div class="alert alert-danger mb-3"><?php echo htmlspecialchars($signUpError); ?></div>
                        <?php endif; ?>
                        <form action="sign_up" method="POST" class="login_form">
                            <input type="hidden" name="cbca_signup_submit" value="1">
                            <input type="text" name="full_name" placeholder="Nom complet" required>
                            <input type="email" name="email" placeholder="Adresse email" required>
                            <input type="password" name="password" placeholder="Mot de passe" required>
                            <input type="password" name="password_confirm" placeholder="Confirmer le mot de passe" required>
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