<?php
include '../auth/sql.php';
include '../auth/encryp.php';
session_start();

if (isset($_POST['simpan'])) {
    $title = $_POST['title'];
    $paragraph = $_POST['paragraph'];

    if (!empty($_FILES['picture']['name'])) {
        $picture = $_FILES['picture']['name'];

        $ext = array('png', 'jpg', 'jpeg', 'svg');
        $extfoto = pathinfo($picture, PATHINFO_EXTENSION);
        if (!in_array($extfoto, $ext)) {
            echo 'Data extension tidak ditemukan';
        } else {
            move_uploaded_file($_FILES['picture']['tmp_name'], '../upload_picture/' . $picture);
            $queryAdd = mysqli_query($conn, "INSERT INTO services (title,paragraph,picture) VALUES ('$title','$paragraph','$picture')");
        }
    } else {
        $queryAdd = mysqli_query($conn, "INSERT INTO services (title,paragraph) VALUES ('$title','$paragraph')");
    }
    // print_r($queryAdd);
    // die();
    header('location: service-content.php?services-account=input');
    exit();
}

$id = isset($_GET['edit']) ? decryptId($_GET['edit'], $key) : '';
$queryEdit = mysqli_query($conn, "SELECT * FROM services" . (!empty($id) ? " WHERE id = '$id'" : ""));
$rowServiceEdit = [];
while ($dataEdit = mysqli_fetch_array($queryEdit)) {
    $rowServiceEdit[] = $dataEdit;
}

if (isset($_POST['edit'])) {
    $title = $_POST['title'];
    $paragraph = $_POST['paragraph'];

    if (!empty($_FILES['picture']['name'])) {
        $picture = $_FILES['picture']['name'];


        $ext = array('png', 'jpg', 'jpeg', 'svg', 'SVG');
        $extfoto = pathinfo($picture, PATHINFO_EXTENSION);

        if (!in_array($extfoto, $ext)) {
            echo 'Data Extension tidak ditemukan';
            exit();
        } else {
            unlink('../upload_picture' . $rowServiceEdit[0]['picture']);
            move_uploaded_file($_FILES['picture']['tmp_name'], '../upload_picture/' . $picture);
            $queryEdit = mysqli_query($conn, "UPDATE services SET
            title = '$title',
            paragraph = '$paragraph',
            picture = '$picture'
            WHERE id='$id'");
        }
    } else {
        $queryEdit = mysqli_query($conn, "UPDATE services SET
        title = '$title',
        paragraph = '$paragraph'
        WHERE id='$id'");
    }

    header('location: service-content.php?services-account=edit');
    exit();
}

if (isset($_GET['delete'])) {
    $id = decryptId($_GET['delete'], $key);

    $delete = mysqli_query($conn, "DELETE FROM services  WHERE id ='$id'");
    header("location:service-Content.php?services-account=delete");
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
                                <div class="card-header">
                                    <?php if (isset($_GET['edit']) || isset($_GET['add_content'])): ?>
                                        <a href="javascript:window.history.back();" class="btn btn-sm btn-secondary">kembali</a>
                                        <div class="py-2">
                                            <hr>
                                            <form action="" method="post" enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="mb-3">
                                                            <label for="">Title For Service</label>
                                                            <input type="text" name="title" value="<?= isset($_GET['edit']) ? $rowServiceEdit[0]['title'] : '' ?>" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="mb-3">
                                                            <label for="">text For Service</label>
                                                            <textarea name="paragraph" id="editor" class="form-control">
                                                                <?= isset($_GET['edit']) ? $rowServiceEdit[0]['paragraph'] : '' ?>
                                                        </textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="mb-3">
                                                        <label for="">Foto</label>
                                                        <input type="file" name="picture" id="" class="form-control">
                                                        <a href="" class="<?= isset($_GET['add_content']) ? 'd-none' : '' ?>">
                                                            <img src="../upload_picture/<?= isset($_GET['edit']) ? $rowServiceEdit[0]['picture'] : '' ?>" width="150" height="auto" class="border border my-3">
                                                        </a>
                                                    </div>
                                                </div>
                                                <button class="btn btn-sm btn-primary" name="<?php echo isset($_GET['edit']) ? 'edit' : 'simpan' ?>" type="submit">
                                                    <?= isset($_GET['edit']) ? 'Edit' : 'Simpan' ?>
                                                </button>
                                            </form>
                                        </div>
                                    <?php else : ?>
                                        <div class="my-2">
                                            <hr>
                                            <div align="left" class="mb-3">
                                                <a href="service-content.php?add_content" class="btn btn-sm btn-primary mt-2">Tambah</a>
                                            </div>
                                            <table class="table table-bordered text-wrap">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Title</th>
                                                        <th>Text</th>
                                                        <th>Foto</th>
                                                        <th>Tools</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    foreach ($rowServiceEdit as $valuesService) : $encrypted = encryptId($valuesService['id'], $key) ?>
                                                        <tr>
                                                            <td><?= $no++ ?></td>
                                                            <td><?= $valuesService['title'] ?></td>
                                                            <td width="350rem" textjustify><?= $valuesService['paragraph'] ?></td>
                                                            <td><?= $valuesService['title'] ?></td>
                                                            <td></td>
                                                            <td>
                                                                <a href="service-content.php?edit=<?= urlencode($encrypted) ?>" class="btn-sm btn-success btn-sm mx-2">
                                                                    <span class="tf-icon bx bx-pencil bx-18px "></span>
                                                                </a>
                                                                <a href="about-content.php?delete=<?= urlencode($encrypted) ?>" class="btn-sm btn-danger btn-sm mx-2">
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
                                <div class="card-body">

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

    $parameter = $_GET['services-account'] ?? '';
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