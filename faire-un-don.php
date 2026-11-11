<?php
require_once __DIR__ . '/includes/db.php';

$donationSuccess = null;
$donationError = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cbca_donation_submit'])) {
    $firstName = trim($_POST['first_name'] ?? '');
    $lastName  = trim($_POST['last_name'] ?? '');
    $phone     = trim($_POST['phone'] ?? '');
    $email     = trim($_POST['email'] ?? '');
    $amount    = isset($_POST['amount']) ? max(1, (float) $_POST['amount']) : 20.00;
    $method    = trim($_POST['contribution_method'] ?? 'Mobile Money (Airtel/M-Pesa/Orange)');
    $message   = trim($_POST['message'] ?? '');

    if ($firstName === '' || $lastName === '' || $phone === '' || $email === '') {
        $donationError = 'Veuillez remplir tous vos champs de coordonnées obligatoires.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $donationError = 'Veuillez saisir une adresse e-mail valide.';
    } else {
        if ($pdo) {
            try {
                $stmt = $pdo->prepare('
                    INSERT INTO `donations` (`first_name`, `last_name`, `email`, `phone`, `amount`, `currency`, `contribution_method`, `message`, `status`)
                    VALUES (:first_name, :last_name, :email, :phone, :amount, :currency, :method, :message, :status)
                ');
                $stmt->execute([
                    ':first_name' => $firstName,
                    ':last_name'  => $lastName,
                    ':email'      => $email,
                    ':phone'      => $phone,
                    ':amount'     => $amount,
                    ':currency'   => 'USD',
                    ':method'     => $method,
                    ':message'    => $message !== '' ? $message : null,
                    ':status'     => 'pending',
                ]);
            } catch (Throwable $e) {
                error_log('[CBCA Donation] ' . $e->getMessage());
            }
        }
        $donationSuccess = sprintf(
            'Merci %s %s ! Votre intention de don de $%s (%s) a bien été enregistrée. L\'équipe de la Coordination Humanitaire CBCA vous contactera très rapidement.',
            htmlspecialchars($firstName),
            htmlspecialchars($lastName),
            number_format($amount, 2),
            htmlspecialchars($method)
        );
    }
}

$pageTitle = "Soutenir nos Actions - CBCA Coordination Humanitaire";
include 'includes/head.php';
include 'includes/header.php';
?>

<!-- Breadcrumb start -->
<section class="breadcrumb" style="background: url('images/breadcrumb_bg.webp');">
    <div class="breadcrumb_overlay">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_text">
                        <h1>Soutenir nos Actions</h1>
                        <ul>
                            <li><a href="index">Accueil</a></li>
                            <li>Faire un Don / Engagement</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb end -->

<!-- First Section: Interactive Donation Showcase Section -->
<section class="dedication_influence_section">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-10 m-auto">
                <div class="section_heading text-center">
                    <h5>VOTRE GÉNÉROSITÉ SAUVE DES VIES</h5>
                    <h2>SOUTENEZ NOTRE MISSION HUMANITAIRE</h2>
                </div>
            </div>
        </div>

        <div class="row align-items-center mt_20">
            <!-- Left Side: Interactive Tabs -->
            <div class="col-lg-4 col-md-5">
                <div class="dedication_tabs_wrapper">
                    <!-- Tab 1 -->
                    <div class="dedication_tab_item" data-tab="crowdfunding">
                        <div class="tab_icon_box">
                            <i class="fas fa-hand-holding-usd"></i>
                        </div>
                        <h4 class="tab_title">Financement Participatif</h4>
                    </div>

                    <!-- Tab 2 (Active by default) -->
                    <div class="dedication_tab_item active" data-tab="quick-fund">
                        <div class="tab_icon_box">
                            <i class="fas fa-hands-helping"></i>
                        </div>
                        <h4 class="tab_title">Collecte de Fonds Rapide</h4>
                    </div>

                    <!-- Tab 3 -->
                    <div class="dedication_tab_item" data-tab="global-community">
                        <div class="tab_icon_box">
                            <i class="fas fa-globe-africa"></i>
                        </div>
                        <h4 class="tab_title">Donateurs & Partenaires</h4>
                    </div>

                    <!-- Tab 4 -->
                    <div class="dedication_tab_item" data-tab="healthy-food">
                        <div class="tab_icon_box">
                            <i class="fas fa-apple-alt"></i>
                        </div>
                        <h4 class="tab_title">Aide Alimentaire & Santé</h4>
                    </div>
                </div>
            </div>

            <!-- Right Side: Dark Showcase Card -->
            <div class="col-lg-8 col-md-7">
                <div class="dedication_hero_card">
                    <!-- Decorative red scribble SVG in bottom right -->
                    <svg class="dedication_scribble" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10 20 C 60 5, 90 20, 80 50 C 70 80, 20 60, 40 40 C 60 20, 90 60, 70 85" stroke="#e30613" stroke-width="4" stroke-linecap="round" fill="none"/>
                    </svg>

                    <div class="row align-items-center w-100 m-0">
                        <!-- Image Container -->
                        <div class="col-lg-6 col-12 p-0">
                            <div class="dedication_card_img_wrapper">
                                <img id="dedication_card_image" src="images/CBCA/CBCA KASIZI-1.jpg" alt="Impact CBCA" class="dedication_card_img" />
                            </div>
                        </div>

                        <!-- Content Details Container -->
                        <div class="col-lg-6 col-12 p-0">
                            <div class="dedication_content_box">
                                <div class="dedication_badge_icon">
                                    <i id="dedication_badge_icon_i" class="fas fa-hands-helping"></i>
                                </div>
                                <h3 id="dedication_card_title" class="dedication_card_title">Collecte de Fonds Rapide</h3>
                                <p id="dedication_card_desc" class="dedication_card_desc">
                                    Nous sommes bien plus qu'une organisation — nous sommes un mouvement d'espoir. Chaque don, chaque contribution et chaque geste de générosité apportent une aide urgente aux communautés vulnérables.
                                </p>
                                <ul class="dedication_checklist">
                                    <li><i class="fas fa-check"></i> <span id="check_item_1">Processus de don sécurisé & rapide</span></li>
                                    <li><i class="fas fa-check"></i> <span id="check_item_2">Garantie d'impact direct à 100%</span></li>
                                    <li><i class="fas fa-check"></i> <span id="check_item_3">Organisation humanitaire reconnue</span></li>
                                </ul>
                                <a href="#cbca_donation_form" class="btn_donate_now">
                                    Faire un Don Maintenant <i class="fas fa-arrow-down"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stat Counter Row -->
        <div class="dedication_stats_wrapper">
            <div class="row">
                <div class="col-md-3 col-6">
                    <div class="dedication_stat_item">
                        <div class="dedication_stat_number blue_val">
                            <span class="counter">25</span><span class="plus_sign">k+</span>
                        </div>
                        <p class="dedication_stat_label">Bénévoles Mobilisés</p>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="dedication_stat_item">
                        <div class="dedication_stat_number red_val">
                            <span class="counter">10</span><span class="plus_sign">k+</span>
                        </div>
                        <p class="dedication_stat_label">Campagnes Réussies</p>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="dedication_stat_item">
                        <div class="dedication_stat_number blue_val">
                            <span class="counter">500</span><span class="plus_sign">+</span>
                        </div>
                        <p class="dedication_stat_label">Donateurs Mensuels</p>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="dedication_stat_item">
                        <div class="dedication_stat_number red_val">
                            <span class="counter">45</span><span class="plus_sign">k+</span>
                        </div>
                        <p class="dedication_stat_label">Personnes Secourues</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Second Section: Donor Intention Form & Contact Info -->
<div class="donation_page_wrapper">
    <div class="container">
        <!-- Info Banner -->
        <div class="row">
            <div class="col-12">
                <div class="donation_info_banner">
                    <div class="info_icon">
                        <i class="fas fa-hand-holding-heart"></i>
                    </div>
                    <p><strong>Engagement & Transparence :</strong> Transmettez votre intention de don ou votre proposition de soutien. L'équipe de la Coordination Humanitaire CBCA prendra directement contact avec vous pour concrétiser votre geste de générosité en toute sécurité.</p>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Left Column: Main Donation Form -->
            <div class="col-lg-8">
                <div class="donation_main_card" id="cbca_donation_form_card">
                    <h3 class="section_title">1. Intention de Don & Contribution</h3>

                    <!-- Need Amount Header Banner -->
                    <div class="need_amount_banner">
                        Sélectionnez le Montant ou le Type de Don
                    </div>

                    <!-- Preset Amount Buttons -->
                    <div class="preset_amounts_grid">
                        <button type="button" class="preset_amount_btn active" data-amount="20">$20</button>
                        <button type="button" class="preset_amount_btn" data-amount="50">$50</button>
                        <button type="button" class="preset_amount_btn" data-amount="100">$100</button>
                        <button type="button" class="preset_amount_btn" data-amount="150">$150</button>
                        <button type="button" class="preset_amount_btn" data-amount="200">$200</button>
                        <button type="button" class="preset_amount_btn" data-amount="custom">Montant Personnalisé</button>
                    </div>

                    <!-- Custom Amount Input Field -->
                    <div class="custom_amount_input_wrapper" id="custom_amount_box">
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="number" id="custom_amount_input" class="form-control donation_form_control" placeholder="Entrez le montant de votre choix" min="1" step="1">
                        </div>
                    </div>

                    <div class="donation_form_divider"></div>

                    <!-- Select Preferred Contribution Method -->
                    <h3 class="section_title">2. Mode de Contribution Souhaité</h3>
                    <div class="contribution_methods_grid">
                        <label class="contribution_radio_card">
                            <input type="radio" name="contribution_method" value="Mobile Money (Airtel/M-Pesa/Orange)" checked />
                            <span class="method_label">📱 Mobile Money</span>
                        </label>
                        <label class="contribution_radio_card">
                            <input type="radio" name="contribution_method" value="Virement Bancaire" />
                            <span class="method_label">🏦 Virement / Dépôt Bancaire</span>
                        </label>
                        <label class="contribution_radio_card">
                            <input type="radio" name="contribution_method" value="Don en Nature (Vivres / Kits)" />
                            <span class="method_label">📦 Don en Nature / Vivres</span>
                        </label>
                        <label class="contribution_radio_card">
                            <input type="radio" name="contribution_method" value="Contact Direct" />
                            <span class="method_label">🤝 Remise Directe / Contact</span>
                        </label>
                    </div>

                    <div class="donation_form_divider"></div>

                    <!-- Personal Info Form -->
                    <h3 class="section_title">3. Vos Coordonnées de Contact</h3>
                    <?php if ($donationSuccess): ?>
                        <div class="alert alert-success mb-4"><?php echo $donationSuccess; ?></div>
                    <?php endif; ?>
                    <?php if ($donationError): ?>
                        <div class="alert alert-danger mb-4"><?php echo htmlspecialchars($donationError); ?></div>
                    <?php endif; ?>
                    <form id="cbca_donation_form" action="faire-un-don#cbca_donation_form_card" method="POST">
                        <input type="hidden" name="cbca_donation_submit" value="1" />
                        <input type="hidden" name="amount" id="hidden_donation_amount" value="20" />
                        <input type="hidden" name="contribution_method" id="hidden_contribution_method" value="Mobile Money (Airtel/M-Pesa/Orange)" />
                        <div class="row">
                            <div class="col-md-6">
                                <div class="donation_form_group">
                                    <label for="first_name">Prénom *</label>
                                    <input type="text" id="first_name" name="first_name" class="donation_form_control" placeholder="Votre prénom" required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="donation_form_group">
                                    <label for="last_name">Nom *</label>
                                    <input type="text" id="last_name" name="last_name" class="donation_form_control" placeholder="Votre nom" required />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="donation_form_group">
                                    <label for="phone_number">Téléphone / WhatsApp *</label>
                                    <input type="tel" id="phone_number" name="phone" class="donation_form_control" placeholder="+243..." required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="donation_form_group">
                                    <label for="email_address">Adresse E-mail *</label>
                                    <input type="email" id="email_address" name="email" class="donation_form_control" placeholder="votre.email@exemple.com" required />
                                </div>
                            </div>
                        </div>

                        <div class="donation_form_group">
                            <label for="message">Précisions ou Message d'Encouragement (Optionnel)</label>
                            <textarea id="message" name="message" class="donation_form_control" placeholder="Précisez votre don ou posez-nous vos questions..."></textarea>
                        </div>

                        <!-- Footer Action Row -->
                        <div class="donation_form_footer">
                            <button type="submit" class="btn_donate_now">
                                Transmettre mon Intention de Don <i class="fas fa-paper-plane"></i>
                            </button>

                            <div class="donation_total_display">
                                Estimation du Don : <span id="display_donation_total">$20</span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Right Column: Sidebar Showcase & Contact Cards -->
            <div class="col-lg-4">
                <!-- Campaign Card -->
                <div class="sidebar_campaign_card">
                    <div class="card_img_box">
                        <img src="images/CBCA/CBCA KASIZI-1.jpg" alt="Aide Médicale CBCA" />
                    </div>
                    <div class="card_body">
                        <h4 class="card_title">Aide Médicale & Humanitaire aux Zones Vulnérables</h4>

                        <div class="campaign_progress_box">
                            <div class="progress_top_info">
                                <span class="label">Mobilisation</span>
                                <span class="percentage_badge">85%</span>
                            </div>
                            <div class="custom_progress_track">
                                <div class="custom_progress_fill" style="width: 85%;"></div>
                            </div>
                            <div class="progress_bottom_info">
                                <span class="raised">Collecté - 5.000$</span>
                                <span class="goal">Objectif - 10.000$</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Direct Contact Information Box -->
                <div class="sidebar_contact_info_box">
                    <h4>Nous Contacter Directement</h4>

                    <div class="contact_detail_item">
                        <div class="icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="text">
                            <strong>Adresse du Bureau</strong>
                            Goma, Nord-Kivu, R.D. Congo
                        </div>
                    </div>

                    <div class="contact_detail_item">
                        <div class="icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="text">
                            <strong>Coordination Humanitaire</strong>
                            <a href="mailto:coordhum.cbca@gmail.com">coordhum.cbca@gmail.com</a>
                        </div>
                    </div>

                    <div class="contact_detail_item">
                        <div class="icon">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <div class="text">
                            <strong>Contact Téléphonique</strong>
                            Joignable du Lundi au Vendredi
                        </div>
                    </div>

                    <div class="contact_detail_item">
                        <div class="icon">
                            <i class="fas fa-file-invoice"></i>
                        </div>
                        <div class="text">
                            <strong>Reçu Officiel</strong>
                            Un reçu officiel est délivré pour chaque don enregistré.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Interactive Controllers (Tabs + Form) -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // 1. Tab Switcher Logic
    const tabData = {
        'crowdfunding': {
            title: 'Financement Participatif',
            icon: 'fas fa-hand-holding-usd',
            img: 'images/counter_3_img.jpg',
            desc: "Financement communautaire direct permettant de répondre immédiatement aux urgences vitales des populations déplacées et vulnérables.",
            checks: ['Collecte 100% directe et transparente', 'Projets validés sur le terrain', 'Déploiement rapide de l\'aide']
        },
        'quick-fund': {
            title: 'Collecte de Fonds Rapide',
            icon: 'fas fa-hands-helping',
            img: 'images/CBCA/CBCA KASIZI-1.jpg',
            desc: "Nous sommes bien plus qu'une organisation — nous sommes un mouvement d'espoir. Chaque don, chaque contribution et chaque geste de générosité apportent une aide urgente aux communautés vulnérables.",
            checks: ['Processus de don sécurisé & rapide', 'Garantie d\'impact direct à 100%', 'Organisation humanitaire reconnue']
        },
        'global-community': {
            title: 'Donateurs & Partenaires',
            icon: 'fas fa-globe-africa',
            img: 'images/CBCA/CBCA KIONDE-4.jpg',
            desc: "Un réseau solidaire de donateurs et partenaires engagés pour soutenir nos programmes de santé, éducation et réhabilitation.",
            checks: ['Réseau mondial de solidarité', 'Rapports d\'impact réguliers', 'Assistance continue 24/7']
        },
        'healthy-food': {
            title: 'Aide Alimentaire & Santé',
            icon: 'fas fa-apple-alt',
            img: 'images/CBCA/CBCA KASIZI-2.jpg',
            desc: "Distribution de vivres de première nécessité et soins médicaux d'urgence pour les mères et enfants dans les zones affectées.",
            checks: ['Assistance nutritionnelle d\'urgence', 'Soins de santé communautaires', 'Distribution de kits vivres']
        }
    };

    const tabs = document.querySelectorAll('.dedication_tab_item');
    const cardImg = document.getElementById('dedication_card_image');
    const badgeIcon = document.getElementById('dedication_badge_icon_i');
    const cardTitle = document.getElementById('dedication_card_title');
    const cardDesc = document.getElementById('dedication_card_desc');
    const check1 = document.getElementById('check_item_1');
    const check2 = document.getElementById('check_item_2');
    const check3 = document.getElementById('check_item_3');

    tabs.forEach(tab => {
        tab.addEventListener('click', function() {
            const key = this.getAttribute('data-tab');
            const data = tabData[key];
            if (!data) return;

            tabs.forEach(t => t.classList.remove('active'));
            this.classList.add('active');

            if (cardImg) {
                cardImg.style.opacity = '0';
                setTimeout(() => {
                    cardImg.src = data.img;
                    cardImg.style.opacity = '1';
                }, 200);
            }

            if (badgeIcon) badgeIcon.className = data.icon;
            if (cardTitle) cardTitle.textContent = data.title;
            if (cardDesc) cardDesc.textContent = data.desc;
            if (check1) check1.textContent = data.checks[0];
            if (check2) check2.textContent = data.checks[1];
            if (check3) check3.textContent = data.checks[2];
        });
    });

    // 2. Donation Form Preset Amounts Logic
    const presetBtns = document.querySelectorAll('.preset_amount_btn');
    const customBox = document.getElementById('custom_amount_box');
    const customInput = document.getElementById('custom_amount_input');
    const totalDisplay = document.getElementById('display_donation_total');
    let currentAmount = 20;

    presetBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            presetBtns.forEach(b => b.classList.remove('active'));
            this.classList.add('active');

            const val = this.getAttribute('data-amount');
            if (val === 'custom') {
                customBox.classList.add('show');
                customInput.focus();
                currentAmount = customInput.value ? parseFloat(customInput.value) : 0;
            } else {
                customBox.classList.remove('show');
                currentAmount = parseFloat(val);
            }
            updateTotal();
        });
    });

    customInput.addEventListener('input', function() {
        currentAmount = this.value ? parseFloat(this.value) : 0;
        updateTotal();
    });

    function updateTotal() {
        const cleanAmount = isNaN(currentAmount) || currentAmount <= 0 ? 20 : currentAmount;
        if (totalDisplay) {
            totalDisplay.textContent = '$' + (isNaN(currentAmount) ? 0 : currentAmount);
        }
        const hiddenAmount = document.getElementById('hidden_donation_amount');
        if (hiddenAmount) {
            hiddenAmount.value = cleanAmount;
        }
    }

    // 3. Synchronize Contribution Method Radio Inputs with Form Hidden Input
    const methodRadios = document.querySelectorAll('input[name="contribution_method"][type="radio"]');
    const hiddenMethod = document.getElementById('hidden_contribution_method');
    methodRadios.forEach(radio => {
        radio.addEventListener('change', function() {
            if (this.checked && hiddenMethod) {
                hiddenMethod.value = this.value;
            }
        });
    });
});
</script>

<?php include 'includes/footer.php'; ?>
