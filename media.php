<?php
$pageTitle = "Media / Galerie - CBCA";
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
                            <h1>Media / Galerie</h1>
                            <ul>
                                <li><a href="index">Accueil</a></li>
                                <li>Media / Galerie</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb end -->

    <!-- Media Page tabs start -->
    <section class="media_page mt_100 mb_100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Bootstrap Tab Navigation -->
                    <ul class="nav nav-pills justify-content-center mb_50" id="mediaTab" role="tablist" style="gap: 15px;">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active common_btn" id="photos-tab" data-bs-toggle="tab" data-bs-target="#photos" type="button" role="tab" aria-controls="photos" aria-selected="true" style="border: none; border-radius: 30px; padding: 12px 30px; font-weight: 700; text-transform: uppercase;">Photos</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link common_btn" id="videos-tab" data-bs-toggle="tab" data-bs-target="#videos" type="button" role="tab" aria-controls="videos" aria-selected="false" style="border: none; border-radius: 30px; padding: 12px 30px; font-weight: 700; text-transform: uppercase;">Vidéos</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link common_btn" id="testimonials-tab" data-bs-toggle="tab" data-bs-target="#testimonials" type="button" role="tab" aria-controls="testimonials" aria-selected="false" style="border: none; border-radius: 30px; padding: 12px 30px; font-weight: 700; text-transform: uppercase;">Témoignages</button>
                        </li>
                    </ul>

                    <style>
                        /* Customize tabs to use the site's primary color when active */
                        #mediaTab .nav-link:not(.active) {
                            background: #f5f5f5;
                            color: #333;
                        }
                        #mediaTab .nav-link.active {
                            background: var(--colorPrimary, #ff6600) !important;
                            color: #fff !important;
                        }
                    </style>

                    <!-- Tab Content -->
                    <div class="tab-content" id="mediaTabContent">
                        
                        <!-- Photos Tab Pane -->
                        <div class="tab-pane fade show active" id="photos" role="tabpanel" aria-labelledby="photos-tab">
                            <div class="photo_gallery">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-6">
                                        <a class="gallery_item venobox" data-gall="gallery01" href="images/gallery_img_1.webp">
                                            <img src="images/gallery_img_1.webp" alt="gallery1" class="img-fluid w-100">
                                            <div class="gallery_item_overlay">
                                                <span><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                                    </svg>
                                                </span>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-4 col-sm-6">
                                        <a class="gallery_item venobox" data-gall="gallery01" href="images/gallery_img_2.webp">
                                            <img src="images/gallery_img_2.webp" alt="gallery1" class="img-fluid w-100">
                                            <div class="gallery_item_overlay">
                                                <span><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                                    </svg>
                                                </span>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-4 col-sm-6">
                                        <a class="gallery_item venobox" data-gall="gallery01" href="images/gallery_img_3.webp">
                                            <img src="images/gallery_img_3.webp" alt="gallery1" class="img-fluid w-100">
                                            <div class="gallery_item_overlay">
                                                <span><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                                    </svg>
                                                </span>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-4 col-sm-6">
                                        <a class="gallery_item venobox" data-gall="gallery01" href="images/gallery_img_4.webp">
                                            <img src="images/gallery_img_4.webp" alt="gallery1" class="img-fluid w-100">
                                            <div class="gallery_item_overlay">
                                                <span><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                                    </svg>
                                                </span>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-4 col-sm-6">
                                        <a class="gallery_item venobox" data-gall="gallery01" href="images/gallery_img_5.webp">
                                            <img src="images/gallery_img_5.webp" alt="gallery1" class="img-fluid w-100">
                                            <div class="gallery_item_overlay">
                                                <span><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                                    </svg>
                                                </span>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-4 col-sm-6">
                                        <a class="gallery_item venobox" data-gall="gallery01" href="images/gallery_img_6.webp">
                                            <img src="images/gallery_img_6.webp" alt="gallery1" class="img-fluid w-100">
                                            <div class="gallery_item_overlay">
                                                <span><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                                    </svg>
                                                </span>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-4 col-sm-6">
                                        <a class="gallery_item venobox" data-gall="gallery01" href="images/gallery_img_7.webp">
                                            <img src="images/gallery_img_7.webp" alt="gallery1" class="img-fluid w-100">
                                            <div class="gallery_item_overlay">
                                                <span><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                                    </svg>
                                                </span>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-4 col-sm-6">
                                        <a class="gallery_item venobox" data-gall="gallery01" href="images/gallery_img_8.webp">
                                            <img src="images/gallery_img_8.webp" alt="gallery1" class="img-fluid w-100">
                                            <div class="gallery_item_overlay">
                                                <span><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                                    </svg>
                                                </span>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-4 col-sm-6">
                                        <a class="gallery_item venobox" data-gall="gallery01" href="images/gallery_img_9.webp">
                                            <img src="images/gallery_img_9.webp" alt="gallery1" class="img-fluid w-100">
                                            <div class="gallery_item_overlay">
                                                <span><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                                    </svg>
                                                </span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Videos Tab Pane -->
                        <div class="tab-pane fade" id="videos" role="tabpanel" aria-labelledby="videos-tab">
                            <div class="video_gallery">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-6">
                                        <a class="gallery_item venobox" data-autoplay="true" data-vbtype="video"
                                            href="https://youtu.be/5q1YBhJA-rU?si=W6ATPvd4KvLUK1yg">
                                            <img src="images/gallery_img_1.webp" alt="gallery1" class="img-fluid w-100">
                                            <div class="gallery_item_overlay">
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.347a1.125 1.125 0 0 1 0 1.972l-11.54 6.347a1.125 1.125 0 0 1-1.667-.986V5.653Z" />
                                                    </svg>
                                                </span>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-4 col-sm-6">
                                        <a class="gallery_item venobox" data-autoplay="true" data-vbtype="video"
                                            href="https://youtu.be/5q1YBhJA-rU?si=W6ATPvd4KvLUK1yg">
                                            <img src="images/gallery_img_2.webp" alt="gallery1" class="img-fluid w-100">
                                            <div class="gallery_item_overlay">
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.347a1.125 1.125 0 0 1 0 1.972l-11.54 6.347a1.125 1.125 0 0 1-1.667-.986V5.653Z" />
                                                    </svg>
                                                </span>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-4 col-sm-6">
                                        <a class="gallery_item venobox" data-autoplay="true" data-vbtype="video"
                                            href="https://youtu.be/5q1YBhJA-rU?si=W6ATPvd4KvLUK1yg">
                                            <img src="images/gallery_img_3.webp" alt="gallery1" class="img-fluid w-100">
                                            <div class="gallery_item_overlay">
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.347a1.125 1.125 0 0 1 0 1.972l-11.54 6.347a1.125 1.125 0 0 1-1.667-.986V5.653Z" />
                                                    </svg>
                                                </span>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-4 col-sm-6">
                                        <a class="gallery_item venobox" data-autoplay="true" data-vbtype="video"
                                            href="https://youtu.be/5q1YBhJA-rU?si=W6ATPvd4KvLUK1yg">
                                            <img src="images/gallery_img_4.webp" alt="gallery1" class="img-fluid w-100">
                                            <div class="gallery_item_overlay">
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.347a1.125 1.125 0 0 1 0 1.972l-11.54 6.347a1.125 1.125 0 0 1-1.667-.986V5.653Z" />
                                                    </svg>
                                                </span>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-4 col-sm-6">
                                        <a class="gallery_item venobox" data-autoplay="true" data-vbtype="video"
                                            href="https://youtu.be/5q1YBhJA-rU?si=W6ATPvd4KvLUK1yg">
                                            <img src="images/gallery_img_5.webp" alt="gallery1" class="img-fluid w-100">
                                            <div class="gallery_item_overlay">
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.347a1.125 1.125 0 0 1 0 1.972l-11.54 6.347a1.125 1.125 0 0 1-1.667-.986V5.653Z" />
                                                    </svg>
                                                </span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Testimonials Tab Pane -->
                        <div class="tab-pane fade" id="testimonials" role="tabpanel" aria-labelledby="testimonials-tab">
                            <div class="testimonial_page mt_30">
                                <div class="row">
                                    <div class="col-xl-6 col-md-6">
                                        <div class="testimonial_item">
                                            <p class="rating">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </p>
                                            <p class="description">Grâce à l'intervention rapide de la Coordination Humanitaire CBCA en eau potable et kits sanitaires, notre communauté dans le camp de déplacés a pu éviter des épidémies majeures.</p>
                                            <div class="testimonial_footer">
                                                <img src="images/author_img.webp" alt="author" class="img-fluid w-100">
                                                <h3>Mambo Kahindo
                                                    <span>Bénéficiaire local - Goma</span>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-md-6">
                                        <div class="testimonial_item">
                                            <p class="rating">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </p>
                                            <p class="description">Le soutien apporté aux centres de santé partenaires dans le Nord-Kivu a sauvé des centaines d'enfants atteints de malnutrition aiguë et amélioré la prise en charge médicale.</p>
                                            <div class="testimonial_footer">
                                                <img src="images/author_img.webp" alt="author" class="img-fluid w-100">
                                                <h3>Dr. Jean-Marc Paluku
                                                    <span>Médecin Partenaire</span>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-md-6">
                                        <div class="testimonial_item">
                                            <p class="rating">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </p>
                                            <p class="description">La mise en place des espaces d'apprentissage sécurisés pour nos enfants déplacés leur a permis de continuer leur scolarité malgré la crise sécuritaire.</p>
                                            <div class="testimonial_footer">
                                                <img src="images/author_img.webp" alt="author" class="img-fluid w-100">
                                                <h3>Amani Masika
                                                    <span>Enseignante communautaire</span>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-md-6">
                                        <div class="testimonial_item">
                                            <p class="rating">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </p>
                                            <p class="description">Travailler aux côtés de la CBCA sur le terrain montre la force de la solidarité et de l'engagement chrétien envers les populations les plus vulnérables.</p>
                                            <div class="testimonial_footer">
                                                <img src="images/author_img.webp" alt="author" class="img-fluid w-100">
                                                <h3>Kambale Tsongo
                                                    <span>Volontaire Humanitaire</span>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Media Page tabs end -->

<?php
include 'includes/donation_section.php';
include 'includes/footer.php';
?>
