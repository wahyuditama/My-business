<?php
include 'frontend/assets/helper/query.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!--====== Required meta tags ======-->
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!--====== Title ======-->
    <title>Business | Bootstrap 5 Business Template</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="frontend/assets/images/favicon.svg" type="image/svg" />

    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="frontend/assets/css/bootstrap.min.css" />

    <!--====== Line Icons css ======-->
    <link rel="stylesheet" href="frontend/assets/css/lineicons.css" />

    <!--====== Tiny Slider css ======-->
    <link rel="stylesheet" href="frontend/assets/css/tiny-slider.css" />

    <!--====== gLightBox css ======-->
    <link rel="stylesheet" href="frontend/assets/css/glightbox.min.css" />

    <link rel="stylesheet" href="frontend/style.css" />
</head>

<body>

    <!--====== NAVBAR NINE PART START ======-->

    <section class="navbar-area navbar-nine">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg">
                        <a class="navbar-brand" href="index.html">
                            <img src="frontend/assets/images/white-logo.svg" alt="Logo" />
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarNine" aria-controls="navbarNine" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse sub-menu-bar" id="navbarNine">
                            <ul class="navbar-nav me-auto">
                                <li class="nav-item">
                                    <a class="page-scroll active" href="#hero-area">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="page-scroll" href="#services">Services</a>
                                </li>

                                <li class="nav-item">
                                    <a class="page-scroll" href="#pricing">Pricing</a>
                                </li>
                                <li class="nav-item">
                                    <a class="page-scroll" href="#contact">Contact</a>
                                </li>
                            </ul>
                        </div>

                        <div class="navbar-btn d-none d-lg-inline-block">
                            <a class="menu-bar" href="#side-menu-left"><i class="lni lni-menu"></i></a>
                        </div>
                    </nav>
                    <!-- navbar -->
                </div>
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </section>

    <!--====== NAVBAR NINE PART ENDS ======-->

    <!--====== SIDEBAR PART START ======-->

    <div class="sidebar-left">
        <div class="sidebar-close">
            <a class="close" href="#close"><i class="lni lni-close"></i></a>
        </div>
        <div class="sidebar-content">
            <div class="sidebar-logo">
                <a href="index.html"><img src="frontend/assets/images/logo.svg" alt="Logo" /></a>
            </div>
            <p class="text">Lorem ipsum dolor sit amet adipisicing elit. Sapiente fuga nisi rerum iusto intro.</p>
            <!-- logo -->
            <div class="sidebar-menu">
                <h5 class="menu-title">
                    <a href="backend/auth/auth-login.php">Quick Links</a>
                </h5>
                <ul>
                    <li><a href="javascript:void(0)">About Us</a></li>
                    <li><a href="javascript:void(0)">Our Team</a></li>
                    <li><a href="javascript:void(0)">Latest News</a></li>
                    <li><a href="javascript:void(0)">Contact Us</a></li>
                </ul>
            </div>
            <!-- menu -->
            <div class="sidebar-social align-items-center justify-content-center">
                <h5 class="social-title">Follow Us On</h5>
                <ul>
                    <li>
                        <a href="javascript:void(0)"><i class="lni lni-facebook-filled"></i></a>
                    </li>
                    <li>
                        <a href="javascript:void(0)"><i class="lni lni-twitter-original"></i></a>
                    </li>
                    <li>
                        <a href="javascript:void(0)"><i class="lni lni-linkedin-original"></i></a>
                    </li>
                    <li>
                        <a href="javascript:void(0)"><i class="lni lni-youtube"></i></a>
                    </li>
                </ul>
            </div>
            <!-- sidebar social -->
        </div>
        <!-- content -->
    </div>
    <div class="overlay-left"></div>

    <!--====== SIDEBAR PART ENDS ======-->

    <!-- Start header Area -->
    <section id="hero-area" class="header-area header-eight">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12 col-12">
                    <div class="header-content">
                        <h1><?= $dataHeader[0]['titleContent'] ?></h1>
                        <p>
                            <?= $dataHeader[0]['textContent'] ?>
                        </p>
                        <div class="button">
                            <a href="javascript:void(0)" class="btn primary-btn">Get Started</a>
                            <a href="https://www.youtube.com/watch?v=r44RKWyfcFw&fbclid=IwAR21beSJORalzmzokxDRcGfkZA1AtRTE__l5N4r09HcGS5Y6vOluyouM9EM"
                                class="glightbox video-button">
                                <span class="btn icon-btn rounded-full">
                                    <i class="lni lni-play"></i>
                                </span>
                                <span class="text">Watch Intro</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-12">
                    <div class="header-image">
                        <img src="backend/upload_picture/<?= $dataHeader[0]['headerContentPicture'] ?>" alt="#" />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End header Area -->

    <!--====== ABOUT FIVE PART START ======-->

    <section class="about-area about-five">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-12">
                    <div class="about-image-five">
                        <svg class="shape" width="106" height="134" viewBox="0 0 106 134" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <circle cx="1.66654" cy="1.66679" r="1.66667" fill="#DADADA" />
                            <circle cx="1.66654" cy="16.3335" r="1.66667" fill="#DADADA" />
                            <circle cx="1.66654" cy="31.0001" r="1.66667" fill="#DADADA" />
                            <circle cx="1.66654" cy="45.6668" r="1.66667" fill="#DADADA" />
                            <circle cx="1.66654" cy="60.3335" r="1.66667" fill="#DADADA" />
                            <circle cx="1.66654" cy="88.6668" r="1.66667" fill="#DADADA" />
                            <circle cx="1.66654" cy="117.667" r="1.66667" fill="#DADADA" />
                            <circle cx="1.66654" cy="74.6668" r="1.66667" fill="#DADADA" />
                            <circle cx="1.66654" cy="103" r="1.66667" fill="#DADADA" />
                            <circle cx="1.66654" cy="132" r="1.66667" fill="#DADADA" />
                            <circle cx="16.3333" cy="1.66679" r="1.66667" fill="#DADADA" />
                            <circle cx="16.3333" cy="16.3335" r="1.66667" fill="#DADADA" />
                            <circle cx="16.3333" cy="31.0001" r="1.66667" fill="#DADADA" />
                            <circle cx="16.3333" cy="45.6668" r="1.66667" fill="#DADADA" />
                            <circle cx="16.333" cy="60.3335" r="1.66667" fill="#DADADA" />
                            <circle cx="16.333" cy="88.6668" r="1.66667" fill="#DADADA" />
                            <circle cx="16.333" cy="117.667" r="1.66667" fill="#DADADA" />
                            <circle cx="16.333" cy="74.6668" r="1.66667" fill="#DADADA" />
                            <circle cx="16.333" cy="103" r="1.66667" fill="#DADADA" />
                            <circle cx="16.333" cy="132" r="1.66667" fill="#DADADA" />
                            <circle cx="30.9998" cy="1.66679" r="1.66667" fill="#DADADA" />
                            <circle cx="74.6665" cy="1.66679" r="1.66667" fill="#DADADA" />
                            <circle cx="30.9998" cy="16.3335" r="1.66667" fill="#DADADA" />
                            <circle cx="74.6665" cy="16.3335" r="1.66667" fill="#DADADA" />
                            <circle cx="30.9998" cy="31.0001" r="1.66667" fill="#DADADA" />
                            <circle cx="74.6665" cy="31.0001" r="1.66667" fill="#DADADA" />
                            <circle cx="30.9998" cy="45.6668" r="1.66667" fill="#DADADA" />
                            <circle cx="74.6665" cy="45.6668" r="1.66667" fill="#DADADA" />
                            <circle cx="31" cy="60.3335" r="1.66667" fill="#DADADA" />
                            <circle cx="74.6668" cy="60.3335" r="1.66667" fill="#DADADA" />
                            <circle cx="31" cy="88.6668" r="1.66667" fill="#DADADA" />
                            <circle cx="74.6668" cy="88.6668" r="1.66667" fill="#DADADA" />
                            <circle cx="31" cy="117.667" r="1.66667" fill="#DADADA" />
                            <circle cx="74.6668" cy="117.667" r="1.66667" fill="#DADADA" />
                            <circle cx="31" cy="74.6668" r="1.66667" fill="#DADADA" />
                            <circle cx="74.6668" cy="74.6668" r="1.66667" fill="#DADADA" />
                            <circle cx="31" cy="103" r="1.66667" fill="#DADADA" />
                            <circle cx="74.6668" cy="103" r="1.66667" fill="#DADADA" />
                            <circle cx="31" cy="132" r="1.66667" fill="#DADADA" />
                            <circle cx="74.6668" cy="132" r="1.66667" fill="#DADADA" />
                            <circle cx="45.6665" cy="1.66679" r="1.66667" fill="#DADADA" />
                            <circle cx="89.3333" cy="1.66679" r="1.66667" fill="#DADADA" />
                            <circle cx="45.6665" cy="16.3335" r="1.66667" fill="#DADADA" />
                            <circle cx="89.3333" cy="16.3335" r="1.66667" fill="#DADADA" />
                            <circle cx="45.6665" cy="31.0001" r="1.66667" fill="#DADADA" />
                            <circle cx="89.3333" cy="31.0001" r="1.66667" fill="#DADADA" />
                            <circle cx="45.6665" cy="45.6668" r="1.66667" fill="#DADADA" />
                            <circle cx="89.3333" cy="45.6668" r="1.66667" fill="#DADADA" />
                            <circle cx="45.6665" cy="60.3335" r="1.66667" fill="#DADADA" />
                            <circle cx="89.3333" cy="60.3335" r="1.66667" fill="#DADADA" />
                            <circle cx="45.6665" cy="88.6668" r="1.66667" fill="#DADADA" />
                            <circle cx="89.3333" cy="88.6668" r="1.66667" fill="#DADADA" />
                            <circle cx="45.6665" cy="117.667" r="1.66667" fill="#DADADA" />
                            <circle cx="89.3333" cy="117.667" r="1.66667" fill="#DADADA" />
                            <circle cx="45.6665" cy="74.6668" r="1.66667" fill="#DADADA" />
                            <circle cx="89.3333" cy="74.6668" r="1.66667" fill="#DADADA" />
                            <circle cx="45.6665" cy="103" r="1.66667" fill="#DADADA" />
                            <circle cx="89.3333" cy="103" r="1.66667" fill="#DADADA" />
                            <circle cx="45.6665" cy="132" r="1.66667" fill="#DADADA" />
                            <circle cx="89.3333" cy="132" r="1.66667" fill="#DADADA" />
                            <circle cx="60.3333" cy="1.66679" r="1.66667" fill="#DADADA" />
                            <circle cx="104" cy="1.66679" r="1.66667" fill="#DADADA" />
                            <circle cx="60.3333" cy="16.3335" r="1.66667" fill="#DADADA" />
                            <circle cx="104" cy="16.3335" r="1.66667" fill="#DADADA" />
                            <circle cx="60.3333" cy="31.0001" r="1.66667" fill="#DADADA" />
                            <circle cx="104" cy="31.0001" r="1.66667" fill="#DADADA" />
                            <circle cx="60.3333" cy="45.6668" r="1.66667" fill="#DADADA" />
                            <circle cx="104" cy="45.6668" r="1.66667" fill="#DADADA" />
                            <circle cx="60.333" cy="60.3335" r="1.66667" fill="#DADADA" />
                            <circle cx="104" cy="60.3335" r="1.66667" fill="#DADADA" />
                            <circle cx="60.333" cy="88.6668" r="1.66667" fill="#DADADA" />
                            <circle cx="104" cy="88.6668" r="1.66667" fill="#DADADA" />
                            <circle cx="60.333" cy="117.667" r="1.66667" fill="#DADADA" />
                            <circle cx="104" cy="117.667" r="1.66667" fill="#DADADA" />
                            <circle cx="60.333" cy="74.6668" r="1.66667" fill="#DADADA" />
                            <circle cx="104" cy="74.6668" r="1.66667" fill="#DADADA" />
                            <circle cx="60.333" cy="103" r="1.66667" fill="#DADADA" />
                            <circle cx="104" cy="103" r="1.66667" fill="#DADADA" />
                            <circle cx="60.333" cy="132" r="1.66667" fill="#DADADA" />
                            <circle cx="104" cy="132" r="1.66667" fill="#DADADA" />
                        </svg>
                        <img src="backend/upload_picture/<?= $dataAbout[0]['aboutPicture']  ?>" alt="about" />
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="about-five-content">
                        <h6 class="small-title text-lg">OUR STORY</h6>
                        <h2 class="main-title fw-bold">Our team comes with the experience and knowledge</h2>
                        <div class="about-five-tab">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <?php foreach ($aboutSelect as $i => $valueAbout): ?>
                                    <button class="nav-link <?= $i === 0 ? 'active' : '' ?>" data-bs-toggle="tab"
                                        data-bs-target="#no-<?= $valueAbout['id'] ?>" type="button" role="tab">
                                        <?= $valueAbout['concernNavTab'] ?>
                                    </button>
                                    <?php endforeach; ?>
                                </div>

                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <?php foreach ($aboutSelect as $i => $textValue): ?>
                                <div class="tab-pane fade <?= $i === 0 ? 'show active' : '' ?>"
                                    id="no-<?= $textValue['id'] ?>" role="tabpanel">
                                    <p><?= $textValue['concernNavContent'] ?></p>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- container -->
    </section>

    <!--====== ABOUT FIVE PART ENDS ======-->

    <!-- ===== service-area start ===== -->
    <section id="services" class="services-area services-eight">
        <!--======  Start Section Title Five ======-->
        <div class="section-title-five">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="content">
                            <h6>Services</h6>
                            <h2 class="fw-bold">Our Best Services</h2>
                            <p>
                                There are many variations of passages of Lorem Ipsum available,
                                but the majority have suffered alteration in some form.
                            </p>
                        </div>
                    </div>
                </div>
                <!-- row -->
            </div>
            <!-- container -->
        </div>
        <!--======  End Section Title Five ======-->
        <div class="container">
            <div class="row">
                <?php foreach ($dataServices as $r => $valServices) : ?>
                <div class="col-lg-4 col-md-6">
                    <div class="single-services">
                        <div class="service-icon">
                            <!-- <i class="lni lni-capsule"></i> -->
                            <img src="backend/upload_picture/<?= $valServices['picture'] ?>" width="200rem" alt="">
                        </div>
                        <div class="service-content">
                            <h4><?= $valServices['title'] ?></h4>
                            <p text-justify>
                                <?= $valServices['paragraph'] ?>
                            </p>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>

            </div>
        </div>
    </section>
    <!-- ===== service-area end ===== -->


    <!-- Start Pricing  Area -->
    <section id="pricing" class="pricing-area pricing-fourteen">
        <!--======  Start Section Title Five ======-->
        <div class="section-title-five">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="content">
                            <h6>Pricing</h6>
                            <h2 class="fw-bold">Pricing & Plans</h2>
                            <p>
                                There are many variations of passages of Lorem Ipsum available,
                                but the majority have suffered alteration in some form.
                            </p>
                        </div>
                    </div>
                </div>
                <!-- row -->
            </div>
            <!-- container -->
        </div>
        <!--======  End Section Title Five ======-->
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="pricing-style-fourteen">
                        <div class="table-head">
                            <h6 class="title">Starter</h4>
                                <p>Lorem Ipsum is simply dummy text of the printing and industry.</p>
                                <div class="price">
                                    <h2 class="amount">
                                        <span class="currency">$</span>0<span class="duration">/mo </span>
                                    </h2>
                                </div>
                        </div>

                        <div class="light-rounded-buttons">
                            <a href="javascript:void(0)" class="btn primary-btn-outline">
                                Start free trial
                            </a>
                        </div>

                        <div class="table-content">
                            <ul class="table-list">
                                <li> <i class="lni lni-checkmark-circle"></i> Cras justo odio.</li>
                                <li> <i class="lni lni-checkmark-circle"></i> Dapibus ac facilisis in.</li>
                                <li> <i class="lni lni-checkmark-circle deactive"></i> Morbi leo risus.</li>
                                <li> <i class="lni lni-checkmark-circle deactive"></i> Excepteur sint occaecat velit.
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="pricing-style-fourteen middle">
                        <div class="table-head">
                            <h6 class="title">Exclusive</h4>
                                <p>Lorem Ipsum is simply dummy text of the printing and industry.</p>
                                <div class="price">
                                    <h2 class="amount">
                                        <span class="currency">$</span>99<span class="duration">/mo </span>
                                    </h2>
                                </div>
                        </div>

                        <div class="light-rounded-buttons">
                            <a href="javascript:void(0)" class="btn primary-btn">
                                Start free trial
                            </a>
                        </div>

                        <div class="table-content">
                            <ul class="table-list">
                                <li> <i class="lni lni-checkmark-circle"></i> Cras justo odio.</li>
                                <li> <i class="lni lni-checkmark-circle"></i> Dapibus ac facilisis in.</li>
                                <li> <i class="lni lni-checkmark-circle"></i> Morbi leo risus.</li>
                                <li> <i class="lni lni-checkmark-circle deactive"></i> Excepteur sint occaecat velit.
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="pricing-style-fourteen">
                        <div class="table-head">
                            <h6 class="title">Premium</h4>
                                <p>Lorem Ipsum is simply dummy text of the printing and industry.</p>
                                <div class="price">
                                    <h2 class="amount">
                                        <span class="currency">$</span>150<span class="duration">/mo </span>
                                    </h2>
                                </div>
                        </div>

                        <div class="light-rounded-buttons">
                            <a href="javascript:void(0)" class="btn primary-btn-outline">
                                Start free trial
                            </a>
                        </div>

                        <div class="table-content">
                            <ul class="table-list">
                                <li> <i class="lni lni-checkmark-circle"></i> Cras justo odio.</li>
                                <li> <i class="lni lni-checkmark-circle"></i> Dapibus ac facilisis in.</li>
                                <li> <i class="lni lni-checkmark-circle"></i> Morbi leo risus.</li>
                                <li> <i class="lni lni-checkmark-circle"></i> Excepteur sint occaecat velit.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ End Pricing  Area -->



    <!-- Start Cta Area -->
    <section id="call-action" class="call-action">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-6 col-xl-7 col-lg-8 col-md-9">
                    <div class="inner-content">
                        <h2>We love to make perfect <br />solutions for your business</h2>
                        <p>
                            Why I say old chap that is, spiffing off his nut cor blimey
                            guvnords geeza<br />
                            bloke knees up bobby, sloshed arse William cack Richard. Bloke
                            fanny around chesed of bum bag old lost the pilot say there
                            spiffing off his nut.
                        </p>
                        <div class="light-rounded-buttons">
                            <a href="javascript:void(0)" class="btn primary-btn-outline">Get Started</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Cta Area -->



    <!-- Start Latest News Area -->
    <div id="blog" class="latest-news-area section">
        <!--======  Start Section Title Five ======-->
        <div class="section-title-five">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="content">
                            <h6>latest news</h6>
                            <h2 class="fw-bold">Latest News & Blog</h2>
                            <p>
                                There are many variations of passages of Lorem Ipsum available,
                                but the majority have suffered alteration in some form.
                            </p>
                        </div>
                    </div>
                </div>
                <!-- row -->
            </div>
            <!-- container -->
        </div>
        <!--======  End Section Title Five ======-->
        <div class="container">
            <div class="row">
                <?php foreach ($newsData as  $data) : ?>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Single News -->
                    <div class="single-news">
                        <div class="image">
                            <a href="javascript:void(0)">
                                <img class="thumb" src="backend/upload_picture/<?= $data['picture'] ?>"
                                    alt="Blog" /></a>

                            <div class="meta-details" data-bs-toggle="modal"
                                data-bs-target="#exampleModal<?= $data['id'] ?>">
                                <img class="thumb" src="backend/upload_picture/<?= $data['person_picture'] ?>"
                                    alt="Author" />
                                <span style="text-transform:uppercase;">By <?= $data['name_person'] ?></span>
                            </div>

                        </div>
                        <div class="content-body">
                            <h4 class="title">
                                <a href="javascript:void(0)"> <?= $data['newstitle'] ?> </a>
                            </h4>
                            <p>
                                <?= $data['newstext'] ?>
                            </p>
                        </div>
                    </div>
                    <!-- End Single News -->
                    <!-- <div class="col-lg-4 col-md-6 col-12"></div>
                    <div class="col-lg-4 col-md-6 col-12"></div> -->
                </div>
                <?php endforeach ?>

            </div>
        </div>
    </div>
    <!-- End Latest News Area -->

    <!-- Start Brand Area -->
    <div id="clients" class="brand-area section">
        <!--======  Start Section Title Five ======-->
        <div class="section-title-five">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="content">
                            <h6>Meet our Clients</h6>
                            <h2 class="fw-bold">Our Awesome Clients</h2>
                            <p>
                                There are many variations of passages of Lorem Ipsum available,
                                but the majority have suffered alteration in some form.
                            </p>
                        </div>
                    </div>
                </div>
                <!-- row -->
            </div>
            <!-- container -->
        </div>
        <!--======  End Section Title Five ======-->
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 col-12">
                    <div class="clients-logos">
                        <div class="single-image">
                            <img src="frontend/assets/images/client-logo/graygrids.svg" alt="Brand Logo Images" />
                        </div>
                        <div class="single-image">
                            <img src="frontend/assets/images/client-logo/uideck.svg" alt="Brand Logo Images" />
                        </div>
                        <div class="single-image">
                            <img src="frontend/assets/images/client-logo/ayroui.svg" alt="Brand Logo Images" />
                        </div>
                        <div class="single-image">
                            <img src="frontend/assets/images/client-logo/lineicons.svg" alt="Brand Logo Images" />
                        </div>
                        <div class="single-image">
                            <img src="frontend/assets/images/client-logo/tailwindtemplates.svg"
                                alt="Brand Logo Images" />
                        </div>
                        <div class="single-image">
                            <img src="frontend/assets/images/client-logo/ecomhtml.svg" alt="Brand Logo Images" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Brand Area -->

    <!-- ========================= contact-section start ========================= -->
    <section id="contact" class="contact-section">
        <div class="container">
            <div class="row">
                <div class="col-xl-4">
                    <div class="contact-item-wrapper">
                        <div class="row">
                            <div class="col-12 col-md-6 col-xl-12">
                                <div class="contact-item">
                                    <div class="contact-icon">
                                        <i class="lni lni-phone"></i>
                                    </div>
                                    <div class="contact-content">
                                        <h4>Contact</h4>
                                        <p><?= $dataContact[0]['companynumber'] ?></p>
                                        <p><?= $dataContact[0]['companycontact'] ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-xl-12">
                                <div class="contact-item">
                                    <div class="contact-icon">
                                        <i class="lni lni-map-marker"></i>
                                    </div>
                                    <div class="contact-content">
                                        <h4>Address</h4>
                                        <p><?= $dataContact['0']['address'] ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-xl-12">
                                <div class="contact-item">
                                    <div class="contact-icon">
                                        <i class="lni lni-alarm-clock"></i>
                                    </div>
                                    <div class="contact-content">
                                        <h4>Schedule</h4>
                                        <p><?= $dataContact[0]['schedule'] ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8">
                    <div class="contact-form-wrapper">
                        <div class="row">
                            <div class="col-xl-10 col-lg-8 mx-auto">
                                <div class="section-title text-center">
                                    <span> Get in Touch </span>
                                    <h2>
                                        Ready to Get Started
                                    </h2>
                                    <p>
                                        At vero eos et accusamus et iusto odio dignissimos ducimus
                                        quiblanditiis praesentium
                                    </p>
                                </div>
                            </div>
                        </div>
                        <form action="backend/content/contact.php" method="POST" class="contact-form">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" name="sender_name" id="name" placeholder="Name" required />
                                </div>
                                <div class="col-md-6">
                                    <input type="email" name="email" id="email" placeholder="Email" required />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" name="phone" id="phone" placeholder="Phone" required />
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="subject" id="email" placeholder="Subject" required />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <textarea name="message" id="message" placeholder="Type Message"
                                        rows="5"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="button text-center rounded-buttons">
                                        <button type="submit" name="sentMessage" class="btn primary-btn rounded-full">
                                            Send Message
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ========================= contact-section end ========================= -->

    <!-- ========================= map-section end ========================= -->
    <section class="map-section map-style-9">
        <div class="map-container">
            <object style="border:0; height: 500px; width: 100%;"
                data="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3102.7887109309127!2d-77.44196278417968!3d38.95165507956235!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzjCsDU3JzA2LjAiTiA3N8KwMjYnMjMuMiJX!5e0!3m2!1sen!2sbd!4v1545420879707"></object>
        </div>
        </div>
    </section>
    <!-- ========================= map-section end ========================= -->

    <!-- Start Footer Area -->
    <footer class="footer-area footer-eleven">
        <!-- Start Footer Top -->
        <div class="footer-top">
            <div class="container">
                <div class="inner-content">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-12">
                            <!-- Single Widget -->
                            <div class="footer-widget f-about">
                                <div class="logo">
                                    <a href="index.html">
                                        <img src="frontend/assets/images/logo.svg" alt="#" class="img-fluid" />
                                    </a>
                                </div>
                                <p>
                                    Making the world a better place through constructing elegant
                                    hierarchies.
                                </p>
                                <p class="copyright-text">
                                    <span>© 2024 Ayro UI.</span>Designed and Developed by
                                    <a href="javascript:void(0)" rel="nofollow"> Ayro UI </a>. <br> Distributed by <a
                                        href="http://themewagon.com" target="_blank">ThemeWagon</a>
                                </p>
                            </div>
                            <!-- End Single Widget -->
                        </div>
                        <div class="col-lg-2 col-md-6 col-12">
                            <!-- Single Widget -->
                            <div class="footer-widget f-link">
                                <h5>Solutions</h5>
                                <ul>
                                    <li><a href="javascript:void(0)">Marketing</a></li>
                                    <li><a href="javascript:void(0)">Analytics</a></li>
                                    <li><a href="javascript:void(0)">Commerce</a></li>
                                    <li><a href="javascript:void(0)">Insights</a></li>
                                </ul>
                            </div>
                            <!-- End Single Widget -->
                        </div>
                        <div class="col-lg-2 col-md-6 col-12">
                            <!-- Single Widget -->
                            <div class="footer-widget f-link">
                                <h5>Support</h5>
                                <ul>
                                    <li><a href="javascript:void(0)">Pricing</a></li>
                                    <li><a href="javascript:void(0)">Documentation</a></li>
                                    <li><a href="javascript:void(0)">Guides</a></li>
                                    <li><a href="javascript:void(0)">API Status</a></li>
                                </ul>
                            </div>
                            <!-- End Single Widget -->
                        </div>
                        <div class="col-lg-4 col-md-6 col-12">
                            <!-- Single Widget -->
                            <div class="footer-widget newsletter">
                                <h5>Subscribe</h5>
                                <p>Subscribe to our newsletter for the latest updates</p>
                                <form action="#" method="get" target="_blank" class="newsletter-form">
                                    <input name="EMAIL" placeholder="Email address" required="required" type="email" />
                                    <div class="button">
                                        <button class="sub-btn">
                                            <i class="lni lni-envelope"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <!-- End Single Widget -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ End Footer Top -->
    </footer>
    <!--/ End Footer Area -->



    <a href="#" class="scroll-top btn-hover">
        <i class="lni lni-chevron-up"></i>
    </a>

    <!-- Modal -->
    <?php foreach ($newsData as $key => $value) : ?>
    <div class="modal  fade" id="exampleModal<?= $value['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-4 border shadow-lg">
                            <a href="">
                                <img src="backend/upload_picture/<?= $value['person_picture'] ?>" alt="">
                            </a>
                        </div>
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label for="">Name Person</label>
                                <input type="text" name="name_person" class="form-control"
                                    value=" <?= $value['name_person'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="">bachelor's degree</label>
                                <input type="text" name="graduates" class="form-control"
                                    value=" <?= $value['graduates'] ?>">
                            </div>

                        </div>
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label for="">Academic</label>
                                <input type="text" name="academic" class="form-control"
                                    value=" <?= $value['academic'] ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="mb-3">
                            <label for="">About Person</label>
                            <div class="form-control">
                                <?= nl2br(htmlspecialchars($value['summary'])) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach ?>

    <!--====== js ======-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="frontend/assets/js/bootstrap.bundle.min.js"></script>
    <script src="frontend/assets/js/glightbox.min.js"></script>
    <script src="frontend/assets/js/main.js"></script>
    <script src="frontend/assets/js/tiny-slider.js"></script>

    <script>
    //===== close navbar-collapse when a  clicked
    let navbarTogglerNine = document.querySelector(
        ".navbar-nine .navbar-toggler"
    );
    navbarTogglerNine.addEventListener("click", function() {
        navbarTogglerNine.classList.toggle("active");
    });

    // ==== left sidebar toggle
    let sidebarLeft = document.querySelector(".sidebar-left");
    let overlayLeft = document.querySelector(".overlay-left");
    let sidebarClose = document.querySelector(".sidebar-close .close");

    overlayLeft.addEventListener("click", function() {
        sidebarLeft.classList.toggle("open");
        overlayLeft.classList.toggle("open");
    });
    sidebarClose.addEventListener("click", function() {
        sidebarLeft.classList.remove("open");
        overlayLeft.classList.remove("open");
    });

    // ===== navbar nine sideMenu
    let sideMenuLeftNine = document.querySelector(".navbar-nine .menu-bar");

    sideMenuLeftNine.addEventListener("click", function() {
        sidebarLeft.classList.add("open");
        overlayLeft.classList.add("open");
    });

    //========= glightbox
    GLightbox({
        'href': 'https://www.youtube.com/watch?v=r44RKWyfcFw&fbclid=IwAR21beSJORalzmzokxDRcGfkZA1AtRTE__l5N4r09HcGS5Y6vOluyouM9EM',
        'type': 'video',
        'source': 'youtube', //vimeo, youtube or local
        'width': 900,
        'autoplayVideos': true,
    });
    </script>
</body>

</html>