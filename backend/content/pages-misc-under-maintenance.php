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
    <!-- Layout-wrapper error-content -->

    <div class="container-xxl container-p-y">
        <div class="col-sm-8 offset-sm-4">
            <div class="misc-wrapper">
                <h2 class="mb-2 mx-2">Under Maintenance!</h2>
                <p class="mb-4 mx-2">Sorry for the inconvenience but we're performing some maintenance at the moment</p>
                <a href="index.php" class="btn btn-primary">Back to home</a>
                <div class="mt-4">
                    <img
                        src="../assets/img/illustrations/girl-doing-yoga-light.png"
                        alt="girl-doing-yoga-light"
                        width="500"
                        class="img-fluid"
                        data-app-dark-img="illustrations/girl-doing-yoga-dark.png"
                        data-app-light-img="illustrations/girl-doing-yoga-light.png" />
                </div>
            </div>
        </div>
    </div>
    <!-- / Layout wrapper -->

    <?php include '../layout/js.php' ?>

</html>