<?php
$pageTitle = "Notre Impact - CBCA";
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
                            <h1>Notre Impact & Engagement</h1>
                            <ul>
                                <li><a href="index">Accueil</a></li>
                                <li>Notre Impact</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb end -->

    <!-- become a volunteer start -->
    <section class="become_volunteer_page pt_65">
        <div class="container">
            <div class="row">
                <div class="col-xl-6">
                    <div class="become_volunteer_page_text wow fadeInLeft">
                        <h3>Devenir Bénévole ou Partenaire</h3>
                        <p>Engagez-vous aux côtés de la 3e CBCA Coordination Humanitaire pour faire la différence auprès des populations affectées par les crises au Nord-Kivu et en République Démocratique du Congo.</p>

                        <p>Nos bénévoles et intervenants de terrain apportent une aide inestimable dans la distribution de secours, la prise en charge sanitaire, l'encadrement des enfants et la réhabilitation des structures d'accueil.</p>

                        <h3>Engagements & Valeurs du Bénévole</h3>
                        <p>En vous inscrivant comme bénévole de la CBCA, vous adhérez aux principes humanitaires d'humanité, d'impartialité, de neutralité et d'indépendance.</p>
                        <ul>
                            <li>Respect de la dignité et des droits des personnes assistées.</li>
                            <li>Participation active aux formations et réunions de coordination.</li>
                            <li>Engagement dans les activités d'urgence et de relèvement communautaire.</li>
                            <li>Promotion de la paix et de la cohésion sociale dans les communautés.</li>
                        </ul>
                        <h3>Domaines d'Engagement</h3>
                        <p>Vous pouvez apporter votre expertise ou votre temps dans plusieurs domaines clés :</p>
                        <ul>
                            <li>Secours d'Urgence & Distributions de Vivres</li>
                            <li>Soutien Médical & Sensibilisation à la Santé</li>
                            <li>Éducation d'Urgence & Animation Enfantine</li>
                            <li>Logistique & Communication Humanitaire</li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="become_volunteer_page_form wow fadeInRight">
                        <h2>Rejoindre les Équipes CBCA</h2>
                        <form action="#">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="login_form_input">
                                        <label>Prénom *</label>
                                        <input type="text" placeholder="Votre prénom">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="login_form_input">
                                        <label>Nom *</label>
                                        <input type="text" placeholder="Votre nom">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="login_form_input">
                                        <label>Adresse Email *</label>
                                        <input type="email" placeholder="Votre adresse email">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="login_form_input">
                                        <label>Numéro de Téléphone *</label>
                                        <input type="text" placeholder="Votre numéro">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="login_form_input">
                                        <label>Ville / Adresse *</label>
                                        <input type="text" placeholder="Ex: Goma, Nord-Kivu">
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="login_form_input">
                                        <label>Présentation & Motivation</label>
                                        <textarea rows="5" placeholder="Parlez-nous de vos compétences et motivations..."></textarea>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="login_form_input m-0">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckDefault1">
                                            <label class="form-check-label" for="flexCheckDefault1">J'accepte les <a href="terms_condition">Conditions d'Utilisation</a> et la <a href="privacy_policy">Politique de Confidentialité</a> de la CBCA.
                                            </label>
                                        </div>
                                        <button type="submit" class="common_btn mt_20">Soumettre ma Candidature</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- become a volunteer end -->

    
<?php
include 'includes/donation_section.php';
include 'includes/footer.php';
?>