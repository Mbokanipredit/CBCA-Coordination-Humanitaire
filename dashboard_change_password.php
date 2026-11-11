<?php
require_once __DIR__ . '/includes/db.php';

$securitySuccess = null;
$securityError = null;
$currentUser = cbca_get_current_user($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cbca_email_update'])) {
    $newEmail = trim($_POST['new_email'] ?? '');
    if (!filter_var($newEmail, FILTER_VALIDATE_EMAIL)) {
        $securityError = 'Veuillez saisir une nouvelle adresse email valide.';
    } elseif ($pdo) {
        try {
            $stmt = $pdo->prepare('UPDATE `users` SET `email` = :email WHERE `id` = :id');
            $stmt->execute([':email' => $newEmail, ':id' => (int) $currentUser['id']]);
            $currentUser = cbca_get_current_user($pdo);
            $securitySuccess = 'Votre adresse email a bien été mise à jour.';
        } catch (Throwable $e) {
            $securityError = 'Impossible de mettre à jour l\'email (cette adresse est peut-être déjà utilisée).';
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cbca_password_update'])) {
    $currentPassword = $_POST['current_password'] ?? '';
    $newPassword     = $_POST['new_password'] ?? '';
    $confirmPassword = $_POST['confirm_password'] ?? '';

    if ($currentPassword === '' || $newPassword === '' || $confirmPassword === '') {
        $securityError = 'Veuillez remplir tous les champs de mot de passe.';
    } elseif (strlen($newPassword) < 6) {
        $securityError = 'Le nouveau mot de passe doit contenir au moins 6 caractères.';
    } elseif ($newPassword !== $confirmPassword) {
        $securityError = 'La confirmation du nouveau mot de passe ne correspond pas.';
    } elseif ($pdo) {
        try {
            $stmt = $pdo->prepare('SELECT `password_hash` FROM `users` WHERE `id` = :id LIMIT 1');
            $stmt->execute([':id' => (int) $currentUser['id']]);
            $row = $stmt->fetch();
            if ($row && password_verify($currentPassword, $row['password_hash'])) {
                $upd = $pdo->prepare('UPDATE `users` SET `password_hash` = :hash WHERE `id` = :id');
                $upd->execute([
                    ':hash' => password_hash($newPassword, PASSWORD_DEFAULT),
                    ':id'   => (int) $currentUser['id'],
                ]);
                $securitySuccess = 'Votre mot de passe a bien été mis à jour.';
            } else {
                $securityError = 'Le mot de passe actuel est incorrect.';
            }
        } catch (Throwable $e) {
            $securityError = 'Une erreur est survenue lors de la mise à jour du mot de passe.';
        }
    }
}

$fullName = trim($currentUser['first_name'] . ' ' . $currentUser['last_name']);

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
                            <h1>Changer le mot de passe</h1>
                            <ul>
                                <li><a href="index">Accueil</a></li>
                                <li>Changer le mot de passe</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb end -->

    <!-- Change password start -->
    <section class="dashboard mt_70 mb_100">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-md-4">
                    <div class="dashboard_sidebar">
                        <div class="dashboard_sidebar_top">
                            <div class="dashboard_banner">
                                <img src="images/single_topic_sidebar_banner.webp" alt="img" class="img-fluid">
                            </div>
                            <div class="img">
                                <img src="<?php echo htmlspecialchars($currentUser['avatar'] ?: 'images/dashboard_profile_img.webp'); ?>" alt="profile" class="img-fluid w-100">
                            </div>
                            <h4><?php echo htmlspecialchars($fullName); ?></h4>
                        </div>
                        <ul class="dashboard_sidebar_menu">
                            <li>
                                <a href="dashboard_profile">
                                    <div class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                        </svg>
                                    </div>
                                    Profil
                                </a>
                            </li>
                            <li>
                                <a class="active" href="dashboard_change_password">
                                    <div class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15.75 5.25a3 3 0 0 1 3 3m3 0a6 6 0 0 1-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1 1 21.75 8.25Z" />
                                        </svg>
                                    </div>
                                    Changer le mot de passe
                                </a>
                            </li>
                            <li>
                                <a href="sign_in?logout=1">
                                    <div class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15" />
                                        </svg>
                                    </div>
                                    Déconnexion
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-9 col-md-8">
                    <div class="dashboard_contant">
                        <div class="dashboard_contant_top d-flex flex-wrap justify-content-between">
                            <div class="dashboard_heading">
                                <h5>Sécurité du Compte</h5>
                                <p>Mettez à jour vos identifiants d'accès et paramètres de sécurité.</p>
                            </div>
                        </div>

                        <?php if ($securitySuccess): ?>
                            <div class="alert alert-success mb-3"><?php echo htmlspecialchars($securitySuccess); ?></div>
                        <?php endif; ?>
                        <?php if ($securityError): ?>
                            <div class="alert alert-danger mb-3"><?php echo htmlspecialchars($securityError); ?></div>
                        <?php endif; ?>

                        <div class="dashboard_email_change">
                            <h6>Adresse Email</h6>
                            <p>Votre adresse email actuelle est <a href="mailto:<?php echo htmlspecialchars($currentUser['email']); ?>"><?php echo htmlspecialchars($currentUser['email']); ?></a></p>
                            <form action="dashboard_change_password" method="POST">
                                <input type="hidden" name="cbca_email_update" value="1">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="dashboard_email_change_input">
                                            <label>Nouvelle adresse email</label>
                                            <input type="email" name="new_email" placeholder="Entrez la nouvelle adresse email" required>
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="dashboard_email_change_btn">
                                            <button type="submit" class="common_btn">Mettre à jour l'email</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="dashboard_password_change">
                            <h6>Changer le Mot de Passe</h6>
                            <p>Un email de confirmation vous sera envoyé une fois la modification effectuée.</p>
                            <form action="dashboard_change_password" method="POST">
                                <input type="hidden" name="cbca_password_update" value="1">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="dashboard_password_change_input">
                                            <label>Mot de passe actuel</label>
                                            <input type="password" name="current_password" placeholder="Entrez le mot de passe actuel" required>
                                        </div>
                                    </div>

                                    <div class="col-xl-6">
                                        <div class="dashboard_password_change_input">
                                            <label>Nouveau mot de passe</label>
                                            <input type="password" name="new_password" placeholder="Entrez le nouveau mot de passe" required>
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="dashboard_password_change_input">
                                            <label>Confirmer le mot de passe</label>
                                            <input type="password" name="confirm_password" placeholder="Confirmez le nouveau mot de passe" required>
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="dashboard_password_change_btn">
                                            <button type="submit" class="common_btn">Mettre à jour le mot de passe</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- Change password end -->

    
<?php
include 'includes/footer.php';
?>