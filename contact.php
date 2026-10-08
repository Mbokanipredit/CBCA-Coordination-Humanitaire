<?php
$pageTitle = "Contact - CBCA";
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
                            <h1>Contactez-nous</h1>
                            <ul>
                                <li><a href="index">Accueil</a></li>
                                <li>Contactez-nous</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb end -->

    <!-- Contact page start -->
    <section class="contact mt_100">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="contact_info">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                            </svg>
                        </span>
                        <h3>Adresse du Bureau</h3>
                        <p>Goma, Nord-Kivu, R.D. Congo</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="contact_info">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                            </svg>
                        </span>
                        <h3>Adresses Électroniques</h3>
                        <p class="mb-1"><strong>Coordonnateur Humanitaire:</strong> <a href="mailto:coordhum.cbca@gmail.com">coordhum.cbca@gmail.com</a></p>
                        <p class="mb-1"><strong>Président CBCA:</strong> <a href="mailto:cbca_office@yahoo.fr">cbca_office@yahoo.fr</a></p>
                        <p class="mb-0"><a href="mailto:skanyena3@gmail.com">skanyena3@gmail.com</a></p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="contact_info">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 3.75 18 6m0 0 2.25 2.25M18 6l2.25-2.25M18 6l-2.25 2.25m1.5 13.5c-8.284 0-15-6.716-15-15V4.5A2.25 2.25 0 0 1 4.5 2.25h1.372c.516 0 .966.351 1.091.852l1.106 4.423c.11.44-.054.902-.417 1.173l-1.293.97a1.062 1.062 0 0 0-.38 1.21 12.035 12.035 0 0 0 7.143 7.143c.441.162.928-.004 1.21-.38l.97-1.293a1.125 1.125 0 0 1 1.173-.417l4.423 1.106c.5.125.852.575.852 1.091V19.5a2.25 2.25 0 0 1-2.25 2.25h-2.25Z" />
                            </svg>
                        </span>
                        <h3>Téléphone</h3>
                        <a href="tel:+243999717524">+243 999 717 524</a>
                    </div>
                </div>
            </div>
            <div class="contact_form">
                <form action="#">
                    <div class="row">
                        <div class="col-xl-7 col-lg-6">
                            <h3>Restez en contact avec nous</h3>
                            <div class=" row">
                                <div class="col-xl-6 col-md-6">
                                    <div class="contact_input">
                                        <label>Votre Nom</label>
                                        <input type="text" placeholder="Votre nom complet">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-md-6">
                                    <div class="contact_input">
                                        <label>Votre Email</label>
                                        <input type="email" placeholder="Adresse email">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-md-6">
                                    <div class="contact_input">
                                        <label>Votre Téléphone</label>
                                        <input type="text" placeholder="Numéro de téléphone">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-md-6">
                                    <div class="contact_input">
                                        <label>Sujet</label>
                                        <input type="text" placeholder="Objet de votre message">
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="contact_input">
                                        <label>Message</label>
                                        <textarea rows="5" placeholder="Écrivez votre message ici..."></textarea>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="contact_input mt_10">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                J'accepte la politique de confidentialité de la CBCA *
                                            </label>
                                        </div>
                                        <button type="submit" class="common_btn">Envoyer le message</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-6">
                            <div class="contact_img">
                                <img src="images/contact_img.webp" alt="contact" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="contact_map mt_100">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d127593.75!2d29.15!3d-1.67!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x19dd0f6f059c9913%3A0x63351d3b0e4e69b5!2sGoma%2C%20Democratic%20Republic%20of%20the%20Congo!5e0!3m2!1sfr!2s"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </section>
    <!-- Contact page end -->

    
<?php
include 'includes/donation_section.php';
include 'includes/footer.php';
?>