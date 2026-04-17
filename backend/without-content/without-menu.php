<?php
include '../auth/sql.php';
include '../auth/encryp.php';
session_start();

if (isset($_POST['simpan'])) {
    $user_id = $_POST['id_user'];
    $card_name = $_POST['card_name'];
    $card_script = $_POST['card_script'];
    $card_title = $_POST['card_title'];
    $card_paragraf = $_POST['card_paragraf'];
    $card_picture = $_POST['card_picture'];

    $insert = mysqli_query($conn, "INSERT INTO withoutmenu (id_user,card_name,card_script,card_title,card_paragraf,card_picture) VALUES ('$user_id','$card_name','$card_script','$card_title','$card_paragraf','$card_picture')");

    header("location: without-menu.php?withoutmenu-account=input");
}


$id  = isset($_GET['edit']) ? $_GET['edit'] : '';
$queryEdit = mysqli_query($conn, "SELECT DISTINCT  user.username, user.id as user_id, withoutmenu.* FROM withoutmenu LEFT JOIN user ON withoutmenu.id_user = user.id" . (!empty($id) ? " WHERE withoutmenu.id = '$id'" : "") . " GROUP BY user.id");
$rowEdit   = [];
while ($dataQUery = mysqli_fetch_array($queryEdit)) {
    $rowEdit[] = $dataQUery;
}

//untuk loop berdsarkan user.id
$usermenu = [];
foreach ($rowEdit as $menu) {
    $usermenu[$menu['id_user']][] = $menu;
}



if (isset($_POST['edit'])) {
    $user_id = $_POST['id_user'];
    $card_name = $_POST['card_name'];
    $card_script = $_POST['card_script'];
    $card_title = $_POST['card_title'];
    $card_paragraf = $_POST['card_paragraf'];
    $card_picture = $_POST['card_picture'];

    $update = mysqli_query($conn, "UPDATE withoutmenu SET 
    id_user = '$user_id',
    card_name = '$card_name',
    card_script = '$card_script',
    card_title = '$card_title',
    card_paragraf = '$card_paragraf',
    card_picture = '$card_picture'
    WHERE id='$id'");

    header("location:without-menu.php?withoutmenu-account=edit");
}


$queryLevel = mysqli_query($conn, "SELECT * FROM level");

if (isset($_GET['delete'])) {
    $id = decryptId($_GET['delete'], $key);

    $delete = mysqli_query($conn, "DELETE FROM level WHERE id ='$id'");
    header("location:without-menu.php?withoutmenu-account=remove");
}

$userdata = mysqli_query($conn, "SELECT * FROM user ORDER BY id DESC");
$rowdata = [];
while ($rowuser = mysqli_fetch_assoc($userdata)) {
    $rowdata[] = $rowuser;
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
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Layouts/</span> Vertical Layouts</h4>

                        <div class="row">
                            <?php if (isset($_GET['edit']) || isset($_GET['add_menu'])) : ?>
                                <div class="mb-3">
                                    <a href="" class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Tambah Card</a>
                                </div>
                                <hr>
                                <?php foreach ($usermenu as $key => $userroot): ?>
                                    <div class="card" style="width: 18rem;">
                                        <img src="..." class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title"><?= $userroot[0]['user_id'] ?></h5>
                                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
                                            <a href="?edit=<?= $userroot[0]['user_id'] ?>" class="btn btn-sm btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Go somewhere</a>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <a href="" class="btn btn-outline-primary shadow-md px-1">without Menu (Navigation)</a>
                                        </div>
                                        <hr>
                                        <div class="card-body">
                                            <?php if (isset($_GET['Delete'])): ?>
                                                <div class="alert alert-succes" role="alert"></div>
                                            <?php endif ?>
                                            <div class="mb-3" align="right">
                                                <a href="without-menu.php?add_menu" class="btn btn-sm btn-primary">Tambah</a>
                                            </div>
                                            <?php foreach ($rowEdit as $root) : ?>
                                                <div class="card" style="width: 18rem;">
                                                    <img src="..." class="card-img-top" alt="...">
                                                    <div class="card-body">
                                                        <h5 class="card-title"><?= $root['id_user'] ?></h5>
                                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
                                                        <a href="?edit=<?= $root['id'] ?>" class="btn btn-primary">Go somewhere</a>
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
    <!-- / Layout wrapper -->

    <?php include '../layout/js.php' ?>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Modal 1</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="row">
                            <div class="col-sm-6">
                                <img src="https://picsum.photos/300/300" class="card-img-top" alt="...">
                            </div>
                            <div class="col-sm-6">
                                <div class="card-body text-justify">
                                    <h5 class="card-title">Make your interactive</h5>
                                    <p class="card-text">create an attractive display for your card here</p>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
                                    <a href="#" class="btn btn-sm btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Do it now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class=" modal-footer">
                                <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Open second modal</button>
                        </div> -->
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Make Your Tamplate</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Your Name</label>
                            <div class="col-sm-10">
                                <?php if (isset($_GET['edit'])) : ?>
                                    <input type="text" class="form-control" value="<?= $rowEdit[0]['username'] ?>">
                                    <input type="hidden" name="id_user" value="<?= $rowEdit[0]['id'] ?>">
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
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Name Card</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="basic-default-name" name="card_name" placeholder="Lorem Ipsum" value="<?= isset($_GET['edit']) ? $rowEdit[0]['card_name'] : '' ?>" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-company">Card Script</label>
                            <div class="col-sm-10">
                                <input
                                    type="text"
                                    class="form-control"
                                    name="card_script"
                                    id="basic-default-company"
                                    placeholder="ACME Inc." />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-title">Title</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <textarea type="text"
                                        id="basic-default-email"
                                        class="form-control"
                                        name="card_title"
                                        placeholder="Build your template for card"
                                        id="editor"
                                        aria-label=""
                                        aria-describedby="basic-default-title"></textarea>
                                    <!-- <span class="input-group-text" id="basic-default-email2">@example.com</span> -->
                                </div>
                                <!-- <div class="form-text">You can use letters, numbers & periods</div> -->
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-Paragraf">Paragraf</label>
                            <div class="col-sm-10">
                                <textarea type="text"
                                    id="editor"
                                    name="card_paragraf"
                                    class="form-control phone-mask"
                                    placeholder="text Paragraf"
                                    aria-label=""
                                    aria-describedby="basic-default-Paragraf" id=""></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-message">Picture</label>
                            <div class="col-sm-10">
                                <textarea
                                    id="editor"
                                    class="form-control"
                                    name="card_picture"
                                    placeholder="Hi, Do have a moment to up your picture"
                                    aria-label=""
                                    aria-describedby="basic-icon-default-picture"></textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-sm btn-primary" name="<?= isset($_GET['edit']) ? 'edit' : 'simpan' ?>"><?= isset($_GET['edit']) ? 'Edit' : 'Save' ?> your card</button>
                    </form>
                </div>
                <hr>
                <div class="modal-footer">
                    <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Back to first</button>
                </div>
            </div>
        </div>
    </div>
    <?php
    $parameter = $_GET['withoutmenu-account'] ?? '';
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