<?php

include 'sql.php';
session_start();

if (isset($_POST['login'])) {
    $Email = $_POST['email'];
    $Password = $_POST['password'];

    $queryLogin = mysqli_query($conn, 'SELECT * FROM user');
    while ($rowLogin = mysqli_fetch_array($queryLogin)) {
        if ($rowLogin['email'] == $Email && $rowLogin['password'] == $Password) {
            $_SESSION['Nama'] = $rowLogin['username'];
            $_SESSION['Email'] = $rowLogin['email'];
            $_SESSION['level_id'] = $rowLogin['id_level'];
            $_SESSION['user_id'] = $rowLogin['id'];

            header('location:../content/index.php');
            exit;
        }
    }
    header('location:auth-login.php?Login Gagal');
}

?>

<!DOCTYPE html>
<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="../assets/"
    data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>My-Business-Web</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <!-- <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" /> -->

    <?php include '../layout/head.php' ?>
</head>

<body>

    <style>
    body {
        background: #2b2c2c;
    }

    input {
        background-color: #454746 !important;
        border-color: #0056b3;
        outline: none !important;
    }

    .form-control::placeholder {
        color: white !important;
        opacity: 1 !important;
    }
    </style>
    <!-- Content -->

    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- Register -->
                <div class="card" style="background-color:#1f2120;">
                    <div class="card-body">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center">
                            <a href="index.html" class="app-brand-link gap-2">
                                <span class="app-brand-logo demo">
                                    <a href="">
                                        <img src="../../frontend/assets/images/white-logo.svg" alt="">
                                    </a>
                                </span>
                                <!-- <span class="app-brand-text demo text-body fw-bolder">Sneat</span> -->
                            </a>
                        </div>
                        <!-- /Logo -->
                        <!-- <h4 class="mb-2">Welcome 👋</h4> -->
                        <p class="mb-4 text-center">Please sign-in to your account and start the adventure</p>

                        <form id="formAuthentication" class="mb-3" method="POST">
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
                                    <span class="input-group-text cursor-pointer" style="background:#454746;"><i
                                            class="bx bx-hide"></i></span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-check">
                                    <!-- <input class="form-check-input" type="checkbox" id="remember-me" /> -->
                                    <!-- <label class="form-check-label" for="remember-me"> Remember Me </label> -->
                                </div>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary d-grid w-100" type="submit" name="login">Sign in</button>
                            </div>
                        </form>

                        <p class="text-center">
                            <span>New on our platform?</span>
                            <a href="auth-register.php">
                                <span>Create an account</span>
                            </a>
                        </p>
                    </div>
                </div>
                <!-- /Register -->
            </div>
        </div>
    </div>

    <!-- / Content -->

    <!-- <div class="buy-now">
        <a href="https://themeselection.com/products/sneat-bootstrap-html-admin-template/" target="_blank"
            class="btn btn-danger btn-buy-now">Upgrade to Pro</a>
    </div> -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>