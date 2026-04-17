<?php
include("../auth/sql.php");

if (isset($_POST['register'])) {
  $id = 2;
  $username = $_POST['username'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $address = $_POST['address'];
  $password = $_POST['password'];

  $queryRegist = mysqli_query($conn, "INSERT INTO user (id_level,username,email,phone,address,password) VALUE ('$id','$username','$email','$phone','$address','$password')");

  if (isset($_POST['page_register']) == 'pages_register') {
    header("location:../content/index.php?register-success");
  } else {
    header("location:auth-login.php?register-success");
  }
}
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
  class="light-style customizer-hide"
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
  <style>
    body {
      background: #1f2120;
    }

    input {
      background-color: #454746 !important;
      border-color: #0056b3;
      color: white;
      opacity: 1;
      outline: none;
    }
  </style>
  <!-- Content -->

  <div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
      <div class="authentication-inner">
        <!-- Register Card -->
        <div class="card" style="width: 30rem; background-color: #1f2120">
          <div class="card-body me-3">
            <!-- Logo -->
            <div class="app-brand justify-content-center">
              <a href="index.html" class="app-brand-link gap-2">
                <span class="app-brand-logo demo">
                  <a href="">
                    <img src="../../frontend/assets/images/white-logo.svg" alt="">
                  </a>
                </span>
              </a>
            </div>
            <!-- /Logo -->
            <!-- <h4 class="mb-2">Adventure starts here 🚀</h4> -->
            <p class="mb-4 text-center">Please register here to your account and start your business</p>

            <form id="formAuthentication" class="mb-3" method="POST">
              <div class="row">
                <div class="col-sm-6">
                  <div class="mb-3">
                    <label for="username" class="form-label">Username </label>
                    <input type="text" class="form-control" id="username" name="username"
                      placeholder="Enter your username" autofocus />
                  </div>
                  <div class="mb-3">
                    <label for="phone-number" class="form-label">Phone-Number </label>
                    <input type="text" class="form-control" id="phone" name="phone"
                      placeholder="Enter your phone-number" autofocus />
                  </div>
                  <div class="mb-3">
                    <label for="address" class="form-label">Alamat </label>
                    <input type="text" class="form-control" id="address" name="address"
                      placeholder="Enter your address" autofocus />
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="mb-3">
                    <label for="email" class="form-label">Email </label>
                    <input type="text" class="form-control" id="email" name="email"
                      placeholder="Enter your email" autofocus />
                  </div>
                  <div class="mb-3 form-password-toggle">
                    <div class="d-flex justify-content-between">
                      <label class="form-label" for="password">Password</label>
                      <a href="auth-forgot-password-basic.html">
                        <!-- <small>Forgot Password?</small> -->
                      </a>
                    </div>
                    <div class="input-group input-group-merge">
                      <input type="password" id="password" class="form-control" name="password"
                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                        aria-describedby="password" />
                      <span class="input-group-text cursor-pointer" style="background: #454746;"><i class="bx bx-hide"></i></span>
                    </div>
                  </div>
                </div>
              </div>

              <div class="mb-3">
                <div class="form-check">
                  <!-- <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms" required /> -->
                  <!-- <label class="form-check-label" for="terms-conditions">
                    I agree to
                    <a href="?privacy=1" data-bs-target="#privacyPolicy" data-bs-toggle="modal">privacy policy & terms</a>
                  </label> -->
                </div>
              </div>
              <button type="submit" class="btn btn-primary d-grid w-100" name="register">Sign up</button>
            </form>

            <p class="text-center">
              <span>Already have an account?</span>
              <a href="auth-login.php">
                <span>Sign in instead</span>
              </a>
            </p>
          </div>
        </div>
        <!-- Register Card -->
      </div>
    </div>
  </div>

  <!-- / Content -->

  <!-- <div class="buy-now">
    <a
      href="https://themeselection.com/products/sneat-bootstrap-html-admin-template/"
      target="_blank"
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

  <?php if (isset($_GET['privacy'])) : ?>
    <div class="modal fade" id="privacyPolicy" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Terms & Conditions</h1>

            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p style="text-align: justify;">
              Dengan mendaftar dan membuat akun di website ini, pengguna menyetujui pengumpulan dan penggunaan informasi pribadi seperti nama, email, username, dan data lain yang diberikan saat pendaftaran. Data tersebut digunakan untuk keperluan pembuatan dan pengelolaan akun, proses login, serta peningkatan keamanan dan layanan.<br>
              <hr>
              Password disimpan dalam bentuk terenkripsi dan tidak dibagikan kepada pihak lain. Website ini dapat menggunakan cookies dan session untuk mendukung fungsi login. Dengan melanjutkan pendaftaran, pengguna menyatakan telah membaca, memahami, dan menyetujui kebijakan privasi ini.
            </p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

  <?php endif; ?>
</body>

</html>