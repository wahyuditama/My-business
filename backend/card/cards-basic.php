<?php
include '../auth/sql.php';
include '../auth/encryp.php';
include '../auth/query.php';
session_start();

//Main-ID

if (isset($_POST['send'])) {
    $user_id = htmlspecialchars($_POST['id_user']);
    $text = htmlspecialchars($_POST['text']);
    $paragraph = htmlspecialchars($_POST['paragraph']);

    if (!empty($_FILES['picture']['name'])) {
        $picture = $_FILES['picture']['name'];

        $ext = array('png', 'jpg', 'jpeg');
        $extfoto = pathinfo($picture, PATHINFO_EXTENSION);
        if (!in_array($extfoto, $ext)) {
            echo 'Data extension tidak ditemukan';
        } else {
            move_uploaded_file($_FILES['card_picture']['tmp_name'], '../upload_picture/' . $picture);
            $insert = mysqli_query($conn, "INSERT INTO primary_card (id_user,main_text,main_paragraph,picture) VALUES ('$user_id','$text','$paragraph','$picture')");
            header("location: cards-basic.php?card-account=input");
        }
    } else {
        $insert = mysqli_query($conn, "INSERT INTO primary_card (id_user,main_text,main_paragraph) VALUES ('$user_id','$text','$paragraph')");
        header("location: cards-basic.php?card-account=input");
    }
}




// print_r($rowEdit);
// die();

if (isset($_POST['edit'])) {
    $user_id = htmlspecialchars($_POST['id_user']);
    $text = htmlspecialchars($_POST['text']);
    $paragraph = htmlspecialchars($_POST['paragraph']);

    if (!empty($_FILES['picture']['name'])) {
        $picture = $_FILES['picture']['name'];

        $ext = array('jpg', 'png', 'jpeg');
        $extfoto = pathinfo($picture, PATHINFO_EXTENSION);
        if (!in_array($extfoto, $ext)) {
            echo 'Data extension tidak ditemukan';
        } else {
            unlink('../upload_picture' . $picture[0]['picture']);
            move_uploaded_file($_FILES['picture']['tmp_name'], '../upload_picture/' . $picture);
            $update = mysqli_query($conn, "UPDATE primary_card SET 
            id_user = '$user_id',
            main_text = '$text',
            main_paragraph = '$paragraph',
            picture = '$picture'
            WHERE id='$id'");
            header("location:cards-basic.php?card-account=edit");
        }
    } else {
        $update = mysqli_query($conn, "UPDATE primary_card SET 
            id_user = '$user_id',
            main_text = '$text',
            main_paragraph = '$paragraph'
            WHERE id='$id'");
    }
    header("location:cards-basic.php?card-account=edit");
}


$querycard = mysqli_query($conn, "SELECT * FROM primary_card");

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $delete = mysqli_query($conn, "DELETE FROM primary_card WHERE id ='$id'");
    header("location:cards-basic.php?card-account=remove");
}



//Sub-Main-ID
if (isset($_POST['MakeCards'])) {
    $mainID = htmlspecialchars($_POST['main_id']);
    $title = htmlspecialchars($_POST['title']);
    $paragraphMO = htmlspecialchars($_POST['line']);
    $text = htmlspecialchars($_POST['text_detail']);

    if (!empty($_FILES['photo']['name'])) {
        $photo = $_FILES['photo']['name'];

        $extFile = array('jpg', 'png', 'jpeg');
        $extinfo = pathinfo($photo, PATHINFO_EXTENSION);

        if (!in_array($extinfo, $extFile)) {
            echo ('Data tidak ditemukan');
            die();
        } else {
            move_uploaded_file($_FILES['photo']['tmp_name'], '../upload_picture/' . $photo);
            $dataInput = mysqli_query($conn, "INSERT INTO sub_card (id_primary_card,title,paragraph,detail_text,photo) VALUES ('$mainID','$title','$paragraphMO','$text','$photo')");
        }
    } else {
        $dataInput = mysqli_query($conn, "INSERT INTO sub_card (id_primary_card,title,paragraph,detail_text) VALUES ('$mainID','$title','$paragraphMO','$text')");
    }
    header("location: cards-basic.php?card-account=input");
}



if (isset($_POST['CardModify'])) {
    $mainID = $_POST['main_id'];
    $title = $_POST['title'];
    $paragraphMO = $_POST['line'];
    $text = $_POST['text_detail'];

    if (!empty($_FILES['photo']['name'])) {
        $photo = $_FILES['photo']['name'];

        $extFile = array('jpg', 'png', 'jpeg');
        $extinfo = pathinfo($photo, PATHINFO_EXTENSION);

        if (!in_array($extinfo, $extFile)) {
            echo 'Format file salah';
            die();
        }

        move_uploaded_file($_FILES['photo']['tmp_name'], '../upload_picture/' . $photo);

        mysqli_query($conn, "UPDATE sub_card SET 
            id_primary_card = '$mainID',
            title = '$title',
            paragraph = '$paragraphMO',
            detail_text = '$text',
            photo = '$photo'
            WHERE id = '$idCard'");
    } else {
        mysqli_query($conn, "UPDATE sub_card SET 
            id_primary_card = '$mainID',
            title = '$title',
            paragraph = '$paragraphMO',
            detail_text = '$text'
            WHERE id = '$idCard'");
    }

    header("location: cards-basic.php?card-account=input");
}


if (isset($_GET['delete'])) {
    $idCard = $_GET['delete'];

    $delete = mysqli_query($conn, "DELETE FROM sub_card WHERE id ='$idCard'");
    header("location:cards-basic.php?card-account=remove");
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


    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

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
                            <?php if (isset($_GET['MakeCards']) || isset($_GET['CardModify'])) : ?>
                                <div class="col-sm-12">
                                    <div class="card p-3 d-flex">
                                        <form method="POST" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="mb-3">
                                                        <label class="col-sm-2 col-form-label" for="basic-default-name">Name</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="basic-default-name" placeholder="<?= $rowEdit[0]['username'] ?>" disabled />
                                                            <input type="hidden" name="main_id" value="<?= $rowEdit[0]['id'] ?>" id="">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="col-sm-2 col-form-label" for="basic-default-company">Title</label>
                                                        <div class="col-sm-10">
                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                id="basic-default-title"
                                                                name="title"
                                                                value="<?= isset($_GET['CardModify']) ? $rowUpdateCards[0]['title'] : '' ?>"
                                                                placeholder="ACME Inc." />
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="col-sm-2 col-form-label" for="basic-default-email">Paragraph</label>
                                                        <div class="col-sm-10">
                                                            <div class="input-group input-group-merge">
                                                                <input
                                                                    type="text"
                                                                    id=""
                                                                    class="form-control"
                                                                    name="line"
                                                                    value="<?= isset($_GET['CardModify']) ? $rowUpdateCards[0]['paragraph'] : '' ?>"
                                                                    aria-describedby="basic-default" />
                                                                <!-- <span class="input-group-text" id="basic-default-email2">@example.com</span> -->
                                                            </div>
                                                            <!-- <div class="form-text">You can use letters, numbers & periods</div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="mb-3">
                                                        <label class="col-sm-2 col-form-label" for="basic-default-">Text</label>
                                                        <div class="col-sm-10">
                                                            <textarea type="text"
                                                                id="editor"
                                                                class="form-control text-mask text-left"
                                                                name="text_detail"
                                                                value=""
                                                                aria-describedby="basic-default-text">
                                                            <?= isset($_GET['CardModify']) ? $rowUpdateCards[0]['detail_text'] : '' ?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="col-sm-2 col-form-label" for="basic-default-"></label>
                                                        <div class="col-sm-10">
                                                            <input
                                                                type="file"
                                                                id="basic-default-photo"
                                                                class="form-control photo-mask"
                                                                name="photo"
                                                                value=""
                                                                aria-describedby="basic-default-photo" />
                                                        </div>
                                                        <div class="my-3 col-sm-3" align="right">
                                                            <img src="../upload_picture/<?= isset($_GET['CardModify']) ? $rowUpdateCards[0]['photo'] : ''  ?>" width="100" alt="">
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="row justify-content-left">
                                                <div class="col-sm-10 d-flex">
                                                    <div class="my-2">
                                                        <button type="submit" name="<?= isset($_GET['CardModify']) ? 'CardModify' : 'MakeCards'  ?>" class="btn btn-sm btn-primary"><?= isset($_GET['CardModify']) ? 'Edit' : 'Save' ?></button>
                                                    </div>
                                                    <?php if (isset($rowUpdateCards[0]['id'])) : ?>
                                                        <div class="m-2">
                                                            <a href="galery-profiles.php?MakeCards=<?= $rowEdit[0]['id'] ?>" class="btn btn-sm btn-success">Yours Template</a>
                                                        </div>
                                                    <?php else : ?>

                                                    <?php endif; ?>
                                                    <?php if (isset($_GET['MakeCards']) || !empty($_GET['CardModify'])) : ?>
                                                        <div class="m-2">
                                                            <a href="#" onclick="window.history.back()" class="btn btn-sm btn-secondary me-2">Previous</a>
                                                        </div>
                                                    <?php endif ?>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <hr>
                                </div>
                                <div class="col-sm-12 d-flex">
                                    <div class="row">
                                        <?php foreach ($rowUpdateCards as $guidance) : ?>
                                            <div class="col-md-4 col-sm-6 mb-3">
                                                <div class="card h-100">
                                                    <div class="row g-0 h-100 align-items-center">
                                                        <div class="col-4">
                                                            <img src="../upload_picture/<?= $guidance['photo'] ?>"
                                                                class="mt-2 rounded-start img-fluid" alt="">
                                                        </div>
                                                        <div class="col-8">
                                                            <div class="card-body d-flex flex-column h-100">
                                                                <h5 class="card-title" style="text-transform: capitalize;">
                                                                    <?= $guidance['title'] ?>
                                                                </h5>
                                                                <p><?= $guidance['detail_text'] ?></p>

                                                                <div class="mt-auto d-flex">
                                                                    <?php if (isset($_GET['CardModify'])) : ?>
                                                                        <a href="#" onclick="window.history.back()" class="btn btn-sm btn-primary me-2">Previous</a>
                                                                        <!-- Delete -->
                                                                        <a href="?delete=<?= $guidance['id'] ?>" class="btn btn-sm btn-danger">Delete</a>
                                                                    <?php endif; ?>

                                                                    <?php if (empty($_GET['CardModify'])) : ?>
                                                                        <div class="d-flex">
                                                                            <a href="?CardModify=<?= $guidance['id'] ?>" class="btn btn-sm btn-success me-3">
                                                                                <?= isset($_GET['MakeCards']) ? 'Edit' : 'Detail' ?>
                                                                            </a>
                                                                        </div>
                                                                    <?php endif ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            <?php else : ?>
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header">Data card</div>
                                        <div class="card-body">
                                            <?php if (isset($_GET['Delete'])): ?>
                                                <div class="alert alert-succes" role="alert"></div>
                                            <?php endif ?>
                                            <?php if (!isset($_GET['Q']) || !isset($_GET['edit'])) : ?>
                                                <div class="mb-3" align="left">
                                                    <a href="" type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah</a>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="container my-4">
                                        <div class="row g-4">
                                            <?php foreach ($rowEdit as $files) : ?>
                                                <div class="col-sm-4">
                                                    <div class="card h-100">
                                                        <div class="row g-0 h-100 align-items-center">
                                                            <div class="col-sm-4">
                                                                <img src="../upload_picture/<?= $files['picture'] ?>" class="mt-2 rounded-start card-img-top" width="100" height="auto" alt="">
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <div class="card-body d-flex flex-column h-100">
                                                                    <h5 class="card-title" style="text-transform: capitalize !important;"><?= $files['main_text'] ?></h5>
                                                                    <p class="card-text mb-1">Some quick example text to build on the</p>
                                                                    <p class="card-text mb-3">card title and make up the bulk of the card’s content.</p>
                                                                    <div class="mt-auto d-flex">
                                                                        <?php if (isset($_GET['Q'])) : ?>
                                                                            <a href="#" onclick="window.history.back()" class="btn btn-sm btn-primary me-2">Previous</a>
                                                                        <?php else : ?>
                                                                            <a href="cards-basic.php?MakeCards=<?= $files['id'] ?>" class="btn btn-sm btn-primary me-2">Galerry Photo</a>
                                                                        <?php endif; ?>
                                                                        <a href="?Q&edit=<?= $files['id'] ?>" class="btn btn-sm btn-success">
                                                                            <?= isset($_GET['Q']) ? 'Edit' : 'Detail' ?>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endif ?>
                            <!-- Total Revenue -->
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
                    <?= include '../layout/footer.php' ?>
                    <!-- Footer -->

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

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Make your experience</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="row">
                            <form method="POST" enctype="multipart/form-data">
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-name">Your Name</label>
                                    <div class="col-sm-10">
                                        <?php if (isset($_GET['edit'])) : ?>
                                            <input type="text" class="form-control" value="<?= $rowEdit[0]['username'] ?>" disabled>
                                            <input type="hidden" name="id_user" value="<?= $rowEdit[0]['id_user'] ?>">
                                        <?php else : ?>
                                            <select name="id_user" id="" class="form-control">
                                                <?php foreach ($rowdata as $key => $values) : ?>
                                                    <option value="<?= $values['id'] ?>"><?= $values['username'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-title">Title</label>
                                    <div class="col-sm-10">
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="basic-default-company"
                                            name="text"
                                            value="<?= isset($_GET['edit']) ? $rowEdit[0]['main_text']  : '' ?>"
                                            placeholder="" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-paragraph">paragraph</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <input
                                                type="text"
                                                id="basic-default-paragraph"
                                                class="form-control"
                                                value="<?= isset($_GET['edit']) ? $rowEdit[0]['main_paragraph']  : '' ?>"
                                                name="paragraph" />
                                        </div>
                                        <!-- <div class="form-text">You can use letters, numbers & periods</div> -->
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-paragraph">Your Photo</label>
                                    <div class="col-sm-10">
                                        <input
                                            type="file"
                                            id="basic-default-picture"
                                            class="form-control picture-mask"
                                            name="picture"
                                            aria-describedby="basic-default-picture" />
                                    </div>
                                    <div class="card-img py-3">
                                        <img src="../upload_picture/<?= isset($_GET['edit']) ? $rowEdit[0]['picture'] : '' ?>" class="card-img-top" style="width: 20rem; height=auto;" alt="">
                                    </div>
                                </div>

                        </div>
                    </div>
                </div>
                <div class="toolkit d-flex justify-content-between m-3">
                    <button type="submit" class="btn btn-sm btn-primary" name="<?= isset($_GET['edit']) ? 'edit' : 'send' ?>"><?= isset($_GET['edit']) ? 'Edit' : 'Make' ?> your card</button>

                    <a href="cards-basic.php?delete=<?= $rowEdit[0]['id'] ?>" class="btn btn-sm btn-danger mx-2">
                        <span class="tf-icon bx bx-trash bx-18px ">Hapus</span>
                    </a>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- / Layout wrapper -->

    <?php include '../layout/js.php' ?>

    <?php if (isset($_GET['edit'])): ?>
        <script>
            var myModal = new bootstrap.Modal(document.getElementById('exampleModal'));
            myModal.show();
        </script>
    <?php endif; ?>

    <?php
    $parameter = $_GET['card-account'] ?? '';
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