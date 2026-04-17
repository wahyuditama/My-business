<?php
include '../auth/sql.php';
include '../auth/encryp.php';
session_start();
$redirectUrladd = 'news-content.php?news-clear=input';
$redirectUrledit = 'news-content.php?news-clear=edit';
$redirectUrlDelete = 'news-content.php?news-clear=remove';

if (isset($_POST['simpan'])) {
    $newstitle = $_POST['newstitle'];
    $newstext = $_POST['newstext'];

    if (!empty($_FILES['picture']['name'])) {
        $picture = $_FILES['picture']['name'];

        $ext = array('png', 'jpg', 'jpeg', 'svg');
        $extfoto = pathinfo($picture, PATHINFO_EXTENSION);
        if (!in_array($extfoto, $ext)) {
            echo 'Data extension tidak ditemukan';
        } else {
            move_uploaded_file($_FILES['picture']['tmp_name'], '../upload_picture/' . $picture);
            $queryAdd = mysqli_query($conn, "INSERT INTO newsarea (newstitle,newstext,picture) VALUES ('$newstitle','$newstext','$picture')");
        }
    } else {
        $queryAdd = mysqli_query($conn, "INSERT INTO newsarea (newstitle,newstext) VALUES ('$newstitle','$newstext')");
    }
    // print_r($queryAdd);
    // die();
    header("location: $redirectUrladd");
    exit();
}

if (isset($_POST['tambahPerson'])) {
    $name_person = $_POST['name_person'];
    $graduates = $_POST['graduates'];
    $academic = $_POST['academic'];
    $summary = $_POST['summary'];

    if (!empty($_FILES['picture']['name'])) {
        $person_picture = $_FILES['person_picture']['name'];

        $ext = array('png', 'jpg', 'jpeg', 'svg', 'SVG');
        $extfoto = pathinfo($person_picture, PATHINFO_EXTENSION);
        if (!in_array($extfoto, $ext)) {
            echo 'Data extension tidak ditemukan';
        } else {
            move_uploaded_file($_FILES['picture']['tmp_name'], '../upload_picture/' . $person_picture);
            $queryAdd = mysqli_query($conn, "INSERT INTO newsarea (person_picture,name_person,graduates,academic,summary) VALUES ('$person_picture','$name_person','$graduates','$academic','$summary')");
        }
    } else {
        $queryAdd = mysqli_query($conn, "INSERT INTO newsarea (name_person,graduates,academic,summary) VALUES ('$name_person','$graduates','$academic','$summary')");
    }
    header("location: $redirectUrladd");
    exit();
}

$id = isset($_GET['edit']) ? decryptId($_GET['edit'], $key) : '';
$queryEdit = mysqli_query($conn, "SELECT * FROM newsarea" . (!empty($id) ? " WHERE id = '$id'" : ""));
$rownewsEdit = [];
while ($dataEdit = mysqli_fetch_array($queryEdit)) {
    $rownewsEdit[] = $dataEdit;
}

if (isset($_POST['edit'])) {
    $newstitle = $_POST['newstitle'];
    $newstext = $_POST['newstext'];


    if (!empty($_FILES['picture']['name'])) {
        $picture = $_FILES['picture']['name'];

        $ext = array('png', 'jpg', 'jpeg', 'svg', 'SVG');
        $extfoto = pathinfo($picture, PATHINFO_EXTENSION);

        if (!in_array($extfoto, $ext)) {
            echo 'Data Extension tidak ditemukan';
            exit();
        } else {
            unlink('../upload_picture' . $rownewsEdit[0]['picture']);
            move_uploaded_file($_FILES['picture']['tmp_name'], '../upload_picture/' . $picture);
            $queryEdit = mysqli_query($conn, "UPDATE newsarea SET
            newstitle = '$newstitle',
            newstext = '$newstext',
            picture = '$picture'
            WHERE id='$id'");
        }
    } else {
        $queryEdit = mysqli_query($conn, "UPDATE newsarea SET
        newstitle = '$newstitle',
        newstext = '$newstext'
        WHERE id='$id'");
    }
    // print_r($queryEdit);
    // die();
    header("location: $redirectUrledit");
    exit();
}

if (isset($_POST['editPerson'])) {
    $name_person = $_POST['name_person'];
    $graduates = $_POST['graduates'];
    $academic = $_POST['academic'];
    $summary = $_POST['summary'];

    if (!empty($_FILES['person_picture']['name'])) {
        $person_picture = $_FILES['person_picture']['name'];

        $ext = array('png', 'jpg', 'jpeg', 'svg', 'SVG');
        $extfoto = pathinfo($person_picture, PATHINFO_EXTENSION);

        if (!in_array($extfoto, $ext)) {
            echo 'Data Extension tidak ditemukan';
            exit();
        } else {
            unlink('../upload_picture' . $rownewsEdit[0]['person_picture']);
            move_uploaded_file($_FILES['person_picture']['tmp_name'], '../upload_picture/' . $person_picture);
            $queryEdit = mysqli_query($conn, "UPDATE newsarea SET
            person_picture = '$person_picture',
            name_person = '$name_person',
            graduates = '$graduates',
            academic = '$academic',
            summary = '$summary'
            WHERE id='$id'");
        }
    } else {
        $queryEdit = mysqli_query($conn, "UPDATE newsarea SET
        name_person = '$name_person',
        graduates = '$graduates',
        academic = '$academic',
        summary = '$summary'
        WHERE id='$id'");
    }
    // print_r($summary);
    // die();
    header("location: $redirectUrledit");
    exit();
}

if (isset($_GET['delete'])) {
    $id = decryptId($_GET['delete'], $key);

    $delete = mysqli_query($conn, "DELETE FROM newsarea  WHERE id ='$id'");
    header("location: $redirectUrlDelete");
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
                                                            <label for="">Title Area</label>
                                                            <input type="text" name="newstitle" value="<?= isset($_GET['edit']) ? $rownewsEdit[0]['newstitle'] : '' ?>" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="mb-3">
                                                            <label for="">Text Area</label>
                                                            <textarea name="newstext" id="editor" class="form-control">
                                                                <?= isset($_GET['edit']) ? $rownewsEdit[0]['newstext'] : '' ?>
                                                        </textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="mb-3">
                                                        <label for="">Foto</label>
                                                        <input type="file" name="picture" id="" class="form-control">
                                                        <a href="" class="<?= isset($_GET['add_content']) ? 'd-none' : '' ?>">
                                                            <img src="../upload_picture/<?= isset($_GET['edit']) ? $rownewsEdit[0]['picture'] : '' ?>" width="150" height="auto" class="border border my-3">
                                                        </a>
                                                    </div>
                                                </div>
                                                <button class="btn btn-sm btn-primary" name="<?php echo isset($_GET['edit']) ? 'edit' : 'simpan' ?>" type="submit">
                                                    <?= isset($_GET['edit']) ? 'Edit' : 'Simpan' ?>
                                                </button>
                                                <button type="button" class="btn-sm btn-warning ms-3" data-bs-toggle="modal" data-bs-target="#exampleModal<?= isset($_GET['edit']) ? $rownewsEdit[0]['id'] : '' ?>">
                                                    Guest Person
                                                </button>
                                            </form>
                                        </div>
                                    <?php else : ?>
                                        <div class="my-2">
                                            <hr>
                                            <div align="left" class="mb-3">
                                                <a href="news-content.php?add_content" class="btn btn-sm btn-primary mt-2">Tambah</a>
                                            </div>
                                            <table class="table table-bordered text-wrap">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>News Title</th>
                                                        <th>News Text</th>
                                                        <th>Foto</th>
                                                        <th>Tools</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    foreach ($rownewsEdit as $valuesnews) : $encrypted = encryptId($valuesnews['id'], $key)  ?>
                                                        <tr>
                                                            <td><?= $no++ ?></td>
                                                            <td><?= $valuesnews['newstitle'] ?></td>
                                                            <td width="350rem" textjustify><?= $valuesnews['newstext'] ?></td>
                                                            <td>
                                                                <img src="../upload_picture/<?= $valuesnews['picture'] ?>" width="100" alt="">
                                                            </td>
                                                            <td>
                                                                <a href="news-content.php?edit=<?= $encrypted ?>" class="btn-sm btn-success btn-sm mx-2">
                                                                    <span class="tf-icon bx bx-pencil bx-18px "></span>
                                                                </a>
                                                                <a href="news-content.php?delete=<?= $encrypted ?>" class="btn-sm btn-danger btn-sm mx-2">
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


    <!-- Modal-person -->
    <div class="modal fade" id="exampleModal<?= $rownewsEdit[0]['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="">Name Person</label>
                                    <input type="text" name="name_person" class="form-control" value=" <?= isset($_GET['edit']) ? $rownewsEdit[0]['name_person'] : '' ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="">bachelor's degree</label>
                                    <input type="text" name="graduates" class="form-control" value=" <?= isset($_GET['edit']) ? $rownewsEdit[0]['graduates'] : '' ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="">Guest picture</label>
                                    <input type="file" name="person_picture" id="" class="form-control">
                                    <a href="" class="<?= isset($_GET['add_content']) ? 'd-none' : '' ?>">
                                        <img src="../upload_picture/<?= isset($_GET['edit']) ? $rownewsEdit[0]['person_picture'] : '' ?>" width="150" height="auto" class="border border my-3">
                                    </a>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="">Academic</label>
                                    <input type="text" name="academic" class="form-control" value=" <?= isset($_GET['edit']) ? $rownewsEdit[0]['academic'] : '' ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="">About Person</label>
                                    <textarea name="summary" id="editor" class="form-control">
                                         <?= isset($_GET['edit']) ? $rownewsEdit[0]['summary'] : '' ?>
                                    </textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                        <button type="submit" class="btn btn-primary" name="<?= isset($_GET['edit']) ? 'editPerson' : 'tambahPerson' ?>"> <?= isset($_GET['edit']) ? 'Edit' : 'Tambah' ?> Data Person</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php
    $parameter = $_GET['news-clear'] ?? '';
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
      text: 'Data $alert.',
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