<?php
require_once __DIR__ . '/includes/db.php';

$profileSuccess = null;
$profileError = null;
$currentUser = cbca_get_current_user($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cbca_profile_update'])) {
    $firstName  = trim($_POST['first_name'] ?? $currentUser['first_name']);
    $lastName   = trim($_POST['last_name'] ?? $currentUser['last_name']);
    $phone      = trim($_POST['phone'] ?? $currentUser['phone']);
    $email      = trim($_POST['email'] ?? $currentUser['email']);
    $country    = trim($_POST['country'] ?? $currentUser['country']);
    $city       = trim($_POST['city'] ?? $currentUser['city']);
    $postalCode = trim($_POST['postal_code'] ?? $currentUser['postal_code']);
    $address    = trim($_POST['address'] ?? $currentUser['address']);
    $bio        = trim($_POST['bio'] ?? $currentUser['bio']);

    if ($firstName === '' || $email === '') {
        $profileError = 'Le prénom et l\'adresse email sont obligatoires.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $profileError = 'Veuillez saisir une adresse email valide.';
    } else {
        if ($pdo) {
            try {
                $stmt = $pdo->prepare('
                    UPDATE `users`
                    SET `first_name` = :first_name,
                        `last_name` = :last_name,
                        `phone` = :phone,
                        `email` = :email,
                        `country` = :country,
                        `city` = :city,
                        `postal_code` = :postal_code,
                        `address` = :address,
                        `bio` = :bio
                    WHERE `id` = :id
                ');
                $stmt->execute([
                    ':first_name'  => $firstName,
                    ':last_name'   => $lastName,
                    ':phone'       => $phone,
                    ':email'       => $email,
                    ':country'     => $country,
                    ':city'        => $city,
                    ':postal_code' => $postalCode,
                    ':address'     => $address,
                    ':bio'         => $bio,
                    ':id'          => (int) $currentUser['id'],
                ]);
                $currentUser = cbca_get_current_user($pdo);
                $profileSuccess = 'Vos informations de profil ont bien été mises à jour.';
            } catch (Throwable $e) {
                error_log('[CBCA Profile Edit] ' . $e->getMessage());
                $profileError = 'Impossible de mettre à jour le profil : ' . $e->getMessage();
            }
        } else {
            $profileSuccess = 'Vos modifications ont été prises en compte.';
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
                            <h1>Modifier le profil</h1>
                            <ul>
                                <li><a href="index">Accueil</a></li>
                                <li>Modifier le profil</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb end -->

    <!-- Profile edit start -->
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
                                <a class="active" href="dashboard_profile">
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
                                <a href="dashboard_change_password">
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
                                <h5>Mettre à jour vos informations</h5>
                                <p>Modifiez vos coordonnées personnelles et préférences de profil.</p>
                            </div>
                            <div class="dashboard_profile_delete">
                                <a href="#" class="common_btn">Supprimer le profil</a>
                            </div>
                        </div>

                        <div class="dashboard_profile dashboard_profile_avatar">
                            <div class="img">
                                <img src="images/dashboard_profile_img.webp" alt="profile" class="img-fluid w-100">
                                <label for="profile_photo">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M6.827 6.175A2.31 2.31 0 0 1 5.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 0 0-1.134-.175 2.31 2.31 0 0 1-1.64-1.055l-.822-1.316a2.192 2.192 0 0 0-1.736-1.039 48.774 48.774 0 0 0-5.232 0 2.192 2.192 0 0 0-1.736 1.039l-.821 1.316Z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M16.5 12.75a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0ZM18.75 10.5h.008v.008h-.008V10.5Z" />
                                    </svg>
                                </label>
                                <input type="file" id="profile_photo" hidden="">
                            </div>
                            <div class="text">
                                <h6>Votre photo de profil</h6>
                                <p>Format PNG ou JPG, taille recommandée 400x400 px.</p>
                            </div>
                        </div>

                        <?php if ($profileSuccess): ?>
                            <div class="alert alert-success mb-3"><?php echo htmlspecialchars($profileSuccess); ?></div>
                        <?php endif; ?>
                        <?php if ($profileError): ?>
                            <div class="alert alert-danger mb-3"><?php echo htmlspecialchars($profileError); ?></div>
                        <?php endif; ?>

                        <form action="dashboard_profile_edit" method="POST" class="dashboard_profile_update">
                            <input type="hidden" name="cbca_profile_update" value="1">
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="dashboard_profile_update_info">
                                        <label>Prénom</label>
                                        <input type="text" name="first_name" placeholder="Entrez votre prénom" value="<?php echo htmlspecialchars($currentUser['first_name']); ?>" required>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="dashboard_profile_update_info">
                                        <label>Nom</label>
                                        <input type="text" name="last_name" placeholder="Entrez votre nom" value="<?php echo htmlspecialchars($currentUser['last_name']); ?>">
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="dashboard_profile_update_info">
                                        <label>Téléphone</label>
                                        <input type="text" name="phone" placeholder="Entrez votre numéro" value="<?php echo htmlspecialchars($currentUser['phone']); ?>">
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="dashboard_profile_update_info">
                                        <label>Email</label>
                                        <input type="email" name="email" placeholder="Entrez votre email" value="<?php echo htmlspecialchars($currentUser['email']); ?>" required>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="dashboard_profile_update_info">
                                        <label>Pays</label>
                                        <select class="select_2" name="country">
                                            <option value="RDC" <?php echo $currentUser['country'] === 'RDC' ? 'selected' : ''; ?>>République Démocratique du Congo</option>
                                            <option value="RW" <?php echo $currentUser['country'] === 'RW' ? 'selected' : ''; ?>>Rwanda</option>
                                            <option value="UG" <?php echo $currentUser['country'] === 'UG' ? 'selected' : ''; ?>>Ouganda</option>
                                            <option value="BI" <?php echo $currentUser['country'] === 'BI' ? 'selected' : ''; ?>>Burundi</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="dashboard_profile_update_info">
                                        <label>Ville</label>
                                        <select class="select_2" name="city">
                                            <option value="Goma" <?php echo $currentUser['city'] === 'Goma' ? 'selected' : ''; ?>>Goma</option>
                                            <option value="Bukavu" <?php echo $currentUser['city'] === 'Bukavu' ? 'selected' : ''; ?>>Bukavu</option>
                                            <option value="Beni" <?php echo $currentUser['city'] === 'Beni' ? 'selected' : ''; ?>>Beni</option>
                                            <option value="Butembo" <?php echo $currentUser['city'] === 'Butembo' ? 'selected' : ''; ?>>Butembo</option>
                                            <option value="Kinshasa" <?php echo $currentUser['city'] === 'Kinshasa' ? 'selected' : ''; ?>>Kinshasa</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="dashboard_profile_update_info">
                                        <label>Code Postal</label>
                                        <input type="text" name="postal_code" placeholder="Code postal" value="<?php echo htmlspecialchars($currentUser['postal_code']); ?>">
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="dashboard_profile_update_info">
                                        <label>Adresse</label>
                                        <input type="text" name="address" placeholder="Votre adresse" value="<?php echo htmlspecialchars($currentUser['address']); ?>">
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="dashboard_profile_update_info">
                                        <label>À propos de moi</label>
                                        <textarea rows="5" name="bio" placeholder="Décrivez brièvement votre rôle ou votre engagement..."><?php echo htmlspecialchars($currentUser['bio']); ?></textarea>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="dashboard_profile_update_btn">
                                        <button type="submit" class="common_btn">Enregistrer les modifications</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Profile edit end -->

    
<?php
include 'includes/footer.php';
?>