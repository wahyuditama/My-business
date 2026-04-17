<?php
include '../auth/sql.php';
include '../auth/encryp.php';
session_start();

if (isset($_POST['simpan'])) {
    $titleConcerning = $_POST['titleConcerning'];
    $concernNavTab = $_POST['concernNavTab'];
    $concernNavContent = $_POST['concernNavContent'];

    if (!empty($_FILES['aboutPicture']['name'])) {
        $aboutPicture = $_FILES['aboutPicture']['name'];

        $ext = array('png', 'jpg', 'jpeg');
        $extfoto = pathinfo($aboutPicture, PATHINFO_EXTENSION);
        if (!in_array($extfoto, $ext)) {
            echo 'Data extension tidak ditemukan';
        } else {
            move_uploaded_file($_FILES['aboutPicture']['tmp_name'], '../upload_picture/' . $aboutPicture);
            $queryAdd = mysqli_query($conn, "INSERT INTO aboutContent (titleConcerning,concernNavTab,concernNavContent,aboutPicture) VALUES ('$titleConcerning','$concernNavTab','$concernNavContent','$aboutPicture')");
        }
    } else {
        $queryAdd = mysqli_query($conn, "INSERT INTO aboutContent (titleConcerning,concernNavTab,concernNavContent) VALUES ('$titleConcerning','$concernNavTab','$concernNavContent')");
    }
    // print_r($queryAdd);
    // die();
    header('location: about-content.php?about-content=input');
    exit();
}

$id = isset($_GET['edit']) ? decryptId($_GET['edit'], $key) : '';
$queryEdit = mysqli_query($conn, "SELECT * FROM aboutContent" . (!empty($id) ? " WHERE id = '$id'" : ""));
$rowAboutEdit = [];
while ($dataEdit = mysqli_fetch_array($queryEdit)) {
    $rowAboutEdit[] = $dataEdit;
}

if (isset($_POST['edit'])) {
    $titleConcerning = $_POST['titleConcerning'];
    $concernNavTab = $_POST['concernNavTab'];
    $concernNavContent = $_POST['concernNavContent'];

    if (!empty($_FILES['aboutPicture']['name'])) {
        $aboutPicture = $_FILES['aboutPicture']['name'];


        $ext = array('png', 'jpg', 'jpeg');
        $extfoto = pathinfo($aboutPicture, PATHINFO_EXTENSION);

        if (!in_array($extfoto, $ext)) {
            echo 'Data Extension tidak ditemukan';
            exit();
        } else {
            unlink('../upload_picture' . $rowAboutEdit[0]['aboutPicture']);
            move_uploaded_file($_FILES['aboutPicture']['tmp_name'], '../upload_picture/' . $aboutPicture);
            $queryEdit = mysqli_query($conn, "UPDATE aboutContent SET
            titleConcerning = '$titleConcerning',
            concernNavTab = '$concernNavTab',
            concernNavContent = '$concernNavContent',
            aboutPicture = '$aboutPicture'
            WHERE id='$id'");
        }
    } else {
        $queryEdit = mysqli_query($conn, "UPDATE aboutContent SET
        titleConcerning = '$titleConcerning',
        concernNavTab = '$concernNavTab',
        concernNavContent = '$concernNavContent'
        WHERE id='$id'");
    }

    header('location: about-content.php?about-content=edit');
    exit();
}

if (isset($_GET['delete'])) {
    $id = decryptId($_GET['delete'], $key);

    $delete = mysqli_query($conn, "DELETE FROM aboutContent  WHERE id ='$id'");
    header("location:about-Content.php?about-content=remove");
    exit();
}
// $selectAbout = mysqli_query($conn, 'SELECT * FROM aboutContent ORDER BY id DESC');
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
                                <div class="card-header">
                                    <?php if (empty('edit') || empty('add_content')): ?>
                                        <a href="javascript:window.history.back();" class="btn btn-sm btn-secondary">kembali</a>

                                    <?php endif; ?>
                                </div>
                                <div class="card-body">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <!-- global-form-input -->
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="my-2">
                                                    <label for="" class="">Title Content</label>
                                                    <input type="text" name="titleConcerning" value="<?= $rowAboutEdit[0]['titleConcerning'] ?>" <?= (!empty($rowAboutEdit[0]['id']) && $id != 1 ? 'readonly' : '') ?> class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="my-2">
                                                    <?php if (empty($_GET['edit'])) : ?>
                                                        <div class="text-center">
                                                            <img src="../upload_picture/<?php echo $rowAboutEdit[0]['aboutPicture'] ?>" width="150" height="auto" class="mt-2" alt="">
                                                        </div>
                                                    <?php else : ?>
                                                        <label for="" class="">Picture About</label>
                                                        <input type="<?= (!empty($rowAboutEdit[0][$id]) && $id != 1 ? 'text' : 'file') ?>" name="aboutPicture" value="" class="form-control" <?= (!empty($rowAboutEdit[0][$id]) && $id != 1 ? 'readonly' : '') ?>>
                                                    <?php endif ?>
                                                </div>
                                            </div>
                                            <!-- form-when-add/edit-button-is-clicked -->
                                            <?php if (isset($_GET['edit']) || isset($_GET['add_content'])) : ?>
                                                <div class="col-sm-6">
                                                    <div class="my-2">
                                                        <label for="" class="">Navigation Content Tab</label>
                                                        <input type="text" name="concernNavTab" value="<?= isset($_GET['edit']) ? $rowAboutEdit[0]['concernNavTab'] : '' ?>" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="my-2">
                                                        <label for="" class="">Navihation Content text</label>
                                                        <textarea name="concernNavContent" value="" id="editor">\
                                                            <?= isset($_GET['edit']) ? $rowAboutEdit[0]['concernNavContent'] : '' ?>
                                                        </textarea>
                                                    </div>
                                                </div>
                                        </div>
                                        <button class="btn btn-sm btn-primary" name="<?php echo isset($_GET['edit']) ? 'edit' : 'simpan' ?>" type="submit">
                                            <?= isset($_GET['edit']) ? 'Edit' : 'Simpan' ?>
                                        </button>
                                    </form>
                                <?php else : ?>
                                    <div class="my-2">
                                        <hr>
                                        <div align="left" class="mb-3">
                                            <a href="about-content.php?add_content" class="btn btn-sm btn-primary mt-2">Tambah</a>
                                        </div>
                                        <table class="table table-bordered text-wrap">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Navigation Content Tab</th>
                                                    <th>Navihation Content text</th>
                                                    <th>Tools</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                foreach ($queryEdit as $row) : $encryptedId = encryptId($row['id'], $key) ?>
                                                    <tr>
                                                        <td><?= $no++ ?></td>
                                                        <td><?= $row['concernNavTab'] ?></td>
                                                        <td width="550rem"><?= $row['concernNavContent'] ?></td>
                                                        <td>
                                                            <a href="about-content.php?edit=<?= urlencode($encryptedId) ?>" class="btn-sm btn-success btn-sm mx-2">
                                                                <span class="tf-icon bx bx-pencil bx-18px "></span>
                                                            </a>
                                                            <a href="about-content.php?delete=<?= urlencode($encryptedId) ?>" class="btn-sm btn-danger btn-sm mx-2">
                                                                <span class="tf-icon bx bx-trash bx-18px "></span>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                <?php endif; ?>
                                </div>
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

    <?php

    $parameter = $_GET['about-content'] ?? '';
    $notif = [
        'input' => 'successfuly',
        'edit' => 'change-successfuly',
        'remove' => 'remove-successfuly'
    ];

    if (array_key_exists($parameter, $notif)) {
        $alert = $notif[$parameter];
        echo "
    <script>
    Swal.fire({
      title: 'Berhasil!',
      text: 'Data  $alert.',
      icon: 'success'
    }).then(() => {
      window.history.replaceState(null, null, window.location.pathname);
    });
    </script>
  ";
    }
    ?>

</body>

</html>