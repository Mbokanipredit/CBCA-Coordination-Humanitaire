<?php
$current_page = basename($_SERVER['PHP_SELF'], '.php');

// Helper to determine active link
function is_page_active($pages, $current_page)
{
    if (is_array($pages)) {
        return in_array($current_page, $pages) ? 'active' : '';
    }
    return $current_page === $pages ? 'active' : '';
}
?>
<!-- Header start -->
<header>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 d-none d-lg-block">
                <ul class="header_info">
                    <li>
                        <span>
                            <img src="images/mail_icon.svg" alt="mail" class="img-fluid injectable" />
                        </span>
                        <a href="mailto:coordhum.cbca@gmail.com" style="color: inherit;">coordhum.cbca@gmail.com</a> | 
                        <a href="mailto:cbca_office@yahoo.fr" style="color: inherit;">cbca_office@yahoo.fr</a> | 
                        <a href="mailto:skanyena3@gmail.com" style="color: inherit;">skanyena3@gmail.com</a>
                    </li>
                    <li>
                        <span>
                            <img src="images/call_icon.svg" alt="phone" class="img-fluid injectable" />
                        </span>
                        <a href="tel:+243999717524" style="color: inherit;">+243 999 717 524</a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-4">
                <div class="header_right">
                    <ul class="icon d-none d-sm-flex">
                        <li>
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fab fa-pinterest-p"></i></a>
                        </li>
                    </ul>
                    <ul class="language_currency">
                        <li>
                            <select class="select_js">
                                <option value="">English</option>
                                <option value="">French</option>

                            </select>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Header end -->

<!-- Main menu start -->
<nav class="navbar navbar-expand-lg main_menu">
    <div class="container-fluid px-3 px-xl-5">
        <a class="navbar-brand" href="index">
            <img src="images/CBCA/Logo.png" alt="CBCA Logo" class="img-fluid" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12H12m-8.25 5.25h16.5" />
            </svg>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-4 me-auto">
                <li class="nav-item">
                    <a class="nav-link <?php echo is_page_active('index', $current_page); ?>" href="index">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo is_page_active('apropos', $current_page); ?>" href="apropos">À Propos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo is_page_active('domaines', $current_page); ?>" href="domaines">Domaine d'intervention</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo is_page_active('projets', $current_page); ?>" href="projets">Projets</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo is_page_active('impact', $current_page); ?>" href="impact">Notre impact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo is_page_active('equipe', $current_page); ?>" href="equipe">Equipe</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo is_page_active('partenaires', $current_page); ?>" href="partenaires">Partenaires</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo is_page_active('ressources', $current_page); ?>" href="ressources">Ressources</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo is_page_active('media', $current_page); ?>" href="media">Media</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo is_page_active('actualites', $current_page); ?>" href="actualites">Actualités</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo is_page_active('contact', $current_page); ?>" href="contact">Contact</a>
                </li>
            </ul>
            <div class="menu_right">
                <a href="faire-un-don" class="common_btn">Faire un don</a>
                <div class="user_icon">
                    <a class="user_link" href="dashboard_profile" title="Dashboard">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>
<!-- Main menu end -->