<?php
include '../auth/sql.php';
include '../auth/encryp.php';
session_start();

?>
<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html
    lang="en"
    class="light-style layout-menu-fixed"
    dir="ltr"
    data-theme="theme-default"
    data-assets-path="../assets/"
    data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <?php include '../layout/head.php' ?>
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            <?php include '../layout/sidebar.php' ?>
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                <?php include '../layout/navbar.php' ?>

                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header">Form Login</div>
                                    <div class="card-body">
                                        <div class="col-sm-8 offset-sm-2">
                                            <div class="card">
                                                <form id="formAuthentication" action="auth-login.php" class="m-3" method="POST">
                                                    <div class="mb-3">
                                                        <label for="email" class="form-label">Email or Username</label>
                                                        <input type="text" class="form-control" id="email" name="email"
                                                            placeholder="Enter your email or username" autofocus />
                                                    </div>
                                                    <div class="mb-3 form-password-toggle">
                                                        <div class="d-flex justify-content-between">
                                                            <label class="form-label" for="password">Password</label>
                                                            <a href="auth-forgot-password-basic.html">
                                                                <small>Forgot Password?</small>
                                                            </a>
                                                        </div>
                                                        <div class="input-group input-group-merge">
                                                            <input type="password" id="password" class="form-control" name="password"
                                                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                                                aria-describedby="password" />
                                                            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="remember-me" />
                                                            <label class="form-check-label" for="remember-me"> Remember Me </label>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <button class="btn btn-primary d-grid w-100" type="submit" name="login">Sign in</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- Total Revenue -->
                            <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">

                            </div>
                            <!--/ Total Revenue -->
                            <div class="col-12 col-md-8 col-lg-4 order-3 order-md-2">
                                <div class="row">

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <!-- Order Statistics -->
                            <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4">

                            </div>
                            <!--/ Order Statistics -->

                            <!-- Expense Overview -->
                            <div class="col-md-6 col-lg-4 order-1 mb-4">
                                <div class="card h-100">

                                </div>
                            </div>
                            <!--/ Expense Overview -->

                            <!-- Transactions -->
                            <div class="col-md-6 col-lg-4 order-2 mb-4">
                                <div class="card h-100">

                                </div>
                            </div>
                            <!--/ Transactions -->
                        </div>
                    </div>
                    <!-- / Content -->

                    <!-- Footer -->
                    <?= include '../layout/footer.php' ?>
                    <!-- / Footer -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <?php include '../layout/js.php' ?>

</html>