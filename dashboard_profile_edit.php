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
                                <img src="images/dashboard_profile_img.webp" alt="profile" class="img-fluid w-100">
                            </div>
                            <h4>Jean Kabanga</h4>
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
                                <a href="sign_in">
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

                        <form action="#" class="dashboard_profile_update">
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="dashboard_profile_update_info">
                                        <label>Prénom</label>
                                        <input type="text" placeholder="Entrez votre prénom" value="Jean">
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="dashboard_profile_update_info">
                                        <label>Nom</label>
                                        <input type="text" placeholder="Entrez votre nom" value="Kabanga">
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="dashboard_profile_update_info">
                                        <label>Téléphone</label>
                                        <input type="text" placeholder="Entrez votre numéro" value="+243 999 717 524">
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="dashboard_profile_update_info">
                                        <label>Email</label>
                                        <input type="email" placeholder="Entrez votre email" value="coordhum.cbca@gmail.com">
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="dashboard_profile_update_info">
                                        <label>Pays</label>
                                        <select class="select_2" name="country">
                                            <option value="RDC">République Démocratique du Congo</option>
                                            <option value="RW">Rwanda</option>
                                            <option value="UG">Ouganda</option>
                                            <option value="BI">Burundi</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="dashboard_profile_update_info">
                                        <label>Ville</label>
                                        <select class="select_2" name="city">
                                            <option value="Goma">Goma</option>
                                            <option value="Bukavu">Bukavu</option>
                                            <option value="Beni">Beni</option>
                                            <option value="Butembo">Butembo</option>
                                            <option value="Kinshasa">Kinshasa</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="dashboard_profile_update_info">
                                        <label>Code Postal</label>
                                        <input type="text" placeholder="Code postal" value="6001">
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="dashboard_profile_update_info">
                                        <label>Adresse</label>
                                        <input type="text" placeholder="Votre adresse" value="Quartier Katindo, Goma, Nord-Kivu">
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="dashboard_profile_update_info">
                                        <label>À propos de moi</label>
                                        <textarea rows="5" placeholder="Décrivez brièvement votre rôle ou votre engagement...">Acteur humanitaire engagé au sein de la Coordination Humanitaire CBCA.</textarea>
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