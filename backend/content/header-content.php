<?php
include '../auth/sql.php';
include '../auth/encryp.php';
session_start();

if (isset($_POST['add_data'])) {
    $titlecontent = $_POST['titlecontent'];
    $textcontent = $_POST['textcontent'];

    if (!empty($_FILES['headercontentPicture']['name'])) {
        $picture = $_FILES['headercontentPicture']['name'];
        $sizePicture = $_FILES['headercontentPicture']['size'];

        $ext = array('png', 'jpeg', 'jpg');
        $extfoto = pathinfo($picture, PATHINFO_EXTENSION);
        if (!in_array($extfoto, $ext)) {
            echo "Ekstensi tidak valid. Hanya PNG, JPEG, dan JPG yang diperbolehkan.";
            die();
        } else {
            move_uploaded_file($_FILES['headercontentPicture']['tmp_name'], '../upload_picture' . $picture);
            $queryAddHeader = mysqli_query($conn, "INSERT INTO headercontent (titleContent,textContent,headerContentPicture) VALUES ('$titlecontent','$textcontent','$picture')");
        }
    } else {
        $queryAddHeader = mysqli_query($conn, "INSERT INTO headercontent (titleContent,textContent) VALUES ('$titlecontent','$textContent')");
    }
    print_r($queryAddHeader);
    die();
    header('location: header-content.php?add=success');
    exit();
}

$id = isset($_GET['edit']) ? decryptId($_GET['edit'], $key) : '';
$queryEdit = mysqli_query($conn, "SELECT * FROM headercontent WHERE id = '$id'");
$rowEdit = [];
while ($editData = mysqli_fetch_array($queryEdit)) {
    $rowEdit[] = $editData;
}


if (isset($_POST['edit'])) {
    $titlecontent = $_POST['titlecontent'];
    $textcontent = $_POST['textcontent'];

    if (!empty($_FILES['headercontentPicture']['name'])) {
        $picture = $_FILES['headercontentPicture']['name'];
        $sizePicture = $_FILES['headercontentPicture']['size'];
        $ext = array('png', 'jpeg', 'jpg');
        $extfoto = pathinfo($picture, PATHINFO_EXTENSION);
        if (!in_array($extfoto, $ext)) {
            echo 'Data extensi tidak ditemukan ';
            die();
        } else {
            unlink('../upload_picture/' . $rowEdit['headerContentPicture']);
            move_uploaded_file($_FILES['headercontentPicture']['tmp_name'], '../upload_picture/' . $picture);

            $queryUpdateHeader = mysqli_query($conn, "UPDATE headercontent set titlecontent = '$titlecontent',
            textcontent = '$textcontent',
            headerContentPicture = '$picture'
            WHERE id = '$id'");
        }
    } else {
        $queryUpdateHeader = mysqli_query($conn, "UPDATE headercontent set titlecontent = '$titlecontent',
            textcontent = '$textcontent'
            WHERE id = '$id'");
    }
    $encrypted = encryptId(1, $key);

    header("location:header-content.php?edit=$encrypted");
    exit();
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
                            <div class="card">
                                <div class="card-header"></div>
                                <div class="card-body">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label for="">Title Content</label>
                                                <input type="text" name="titlecontent" class="form-control" value="<?php echo $rowEdit[0]['titleContent'] ?>" <?= isset($_GET['open']) ? 'readonly' : '' ?>>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label for="">Text Content</label>
                                                    <textarea type="text" id="editor" name="textcontent" class="form-control" value="" style="text-align: left !important;" <?= isset($_GET['open']) ? 'readonly' : '' ?>>
                                                        <?php echo $rowEdit[0]['textContent']  ?>
                                                    </textarea>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label for="">header content picture</label>
                                                    <input type="file" name="headercontentPicture" class="form-control" value="<?= $rowEdit[0]['headerContentPicture'] ?>" <?= isset($_GET['open']) ? 'readonly' : '' ?>>
                                                    <img src="../upload_picture/<?= $rowEdit[0]['headerContentPicture'] ?>" height="auto" width="100" class="mb-2">
                                                </div>
                                            </div>
                                        </div>
                                        <?php if (isset($_SESSION['level_id']) && $_SESSION['level_id'] == 1): ?>
                                            <button type="submit" onclick="deleteparams()" name="<?php echo isset($_GET['edit']) ? 'edit' : 'add_data' ?>" class="btn-sm btn-primary"><?= isset($_GET['edit']) ? 'Edit Data' : 'Submit' ?></button>
                                        <?php endif; ?>
                                        <script>
                                            function deleteparams() {
                                                const url = new URL(window.location);
                                                url.searchParams.delete('open');
                                                window.history.replaceState({}, '', url);
                                            }
                                        </script>
                                    </form>
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