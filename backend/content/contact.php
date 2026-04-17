<?php
include '../auth/sql.php';
include '../auth/encryp.php';
session_start();

$redirectUrladd = 'contact.php?contact-message=input';
$redirectUrledit = 'contact.php?contact-message=edit';
$redirectUrlDelete = 'contact.php?contact-message=remove';

// Data input from frontend
if (isset($_POST['sentMessage'])) {
    $name = $_POST['sender_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $companycontact = $_POST['companycontact'];
    $companynumber = $_POST['companynumber'];
    $schedule = $_POST['schedule'];
    $address = $_POST['address'];

    $query = mysqli_query($conn, "INSERT INTO contact (name,email,phone,subject,message,companycontact,companynumber,schedule,address) VALUE ('$name','$email','$phone','$subject','$message','$companycontact','$companynumber','$schedule','$address')");

    header("location: $redirectUrladd");
}

$id = isset($_GET['edit']) ? decryptId($_GET['edit'], $key) : '';
$queryContact = mysqli_query($conn, query: "SELECT * FROM contact" . (!empty($id) ? " WHERE id = '$id'" : ""));

$dataContact = [];
while ($rowContact = mysqli_fetch_assoc($queryContact)) {
    $dataContact[] = $rowContact;
}

if (isset($_POST['edit'])) {
    $name = $_POST['sender_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $companycontact = $_POST['companycontact'];
    $companynumber = $_POST['companynumber'];
    $schedule = $_POST['schedule'];
    $address = $_POST['address'];

    $editContact = mysqli_query($conn, "UPDATE contact SET 
    name ='$name',
    email ='$email',
    phone ='$phone',
    subject ='$subject',
    message ='$message',
    companycontact = '$companycontact',
    companynumber = '$companynumber',
    schedule = '$schedule',
    address = '$address'
    WHERE id = '$id'");

    header("location: $redirectUrledit");
    var_dump($editContact);
    die();
}

if (isset($_GET['delete'])) {
    $id = decryptId($_GET['delete'], $key);

    $deleteComtact = mysqli_query($conn, "DELETE FROM contact WHERE id = '$id'");

    header("location: $redirectUrlDelete");
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
                                    <?php if (isset($_GET['edit']) || isset($_GET['add_contact'])): ?>
                                        <a href="javascript:window.history.back();" class="btn btn-sm btn-secondary">kembali</a>
                                        <div class="py-2">
                                            <hr>
                                            <form action="" method="post" enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="mb-3">
                                                            <label for="">Name</label>
                                                            <input type="text" name="sender_name" value="<?= isset($_GET['edit']) ? $dataContact[0]['name'] : '' ?>" class="form-control">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="">Email</label>
                                                            <input name="email" class="form-control" value="<?= isset($_GET['edit']) ? $dataContact[0]['email'] : '' ?>">
                                                        </div>
                                                        <?php if ($_SESSION['level_id'] == 1) : ?>
                                                            <div class="mb-3">
                                                                <label for=""> Number Company</label>
                                                                <input name="companynumber" class="form-control" type="number" value="<?= isset($_GET['edit']) ? $dataContact[0]['companynumber'] : '' ?>">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for=""> Company Address</label>
                                                                <input name="address" class="form-control" type="text" value="<?= isset($_GET['edit']) ? $dataContact[0]['address'] : '' ?>">
                                                            </div>
                                                        <?php endif; ?>
                                                        <div class="mb-3">
                                                            <label for="">Message</label>
                                                            <textarea name="message" id="editor" class="form-control">
                                                                <?= isset($_GET['edit']) ? $dataContact[0]['message'] : '' ?>
                                                        </textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="mb-3">
                                                            <label for="">Phone Number</label>
                                                            <input type="text" name="phone" id="" class="form-control" value="<?= isset($_GET['edit']) ? $dataContact[0]['phone'] : '' ?>">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="">Subject</label>
                                                            <input type="text" name="subject" id="" class="form-control" value="<?= isset($_GET['edit']) ? $dataContact[0]['subject'] : '' ?>">
                                                        </div>
                                                        <?php if ($_SESSION['level_id'] == 1): ?>
                                                            <div class="mb-3">
                                                                <label for="">Company contact</label>
                                                                <input type="email" name="companycontact" id="" class="form-control" value="<?= isset($_GET['edit']) ? $dataContact[0]['companycontact'] : '' ?>">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="">Schedule Company</label>
                                                                <input type="text" name="schedule" id="" class="form-control" value="<?= isset($_GET['edit']) ? $dataContact[0]['schedule'] : '' ?>">
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <button class="btn btn-sm btn-primary" name="<?php echo isset($_GET['edit']) ? 'edit' : 'sentMessage' ?>" type="submit">
                                                    <?= isset($_GET['edit']) ? 'Edit' : 'Simpan' ?>
                                                </button>
                                            </form>
                                        <?php else : ?>
                                            <div class="my-2">
                                                <hr>
                                                <div class="mb-3 d-flex justify-content-between">
                                                    <a href="contact.php?add_contact" class="btn btn-sm btn-primary mt-2">Tambah</a>
                                                    <a href="contact.php?edit=1" class="btn btn-sm btn-warning mt-2">Edit</a>
                                                </div>
                                                <table class="table table-bordered text-wrap">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Sender Name</th>
                                                            <th>message</th>
                                                            <th>Tools</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $no = 1;
                                                        foreach ($dataContact as $value) : $encrypted = encryptId($value['id'], $key) ?>
                                                            <tr>
                                                                <td><?= $no++ ?></td>
                                                                <td><?= $value['name'] ?></td>
                                                                <td width="350rem" textjustify><?= $value['message'] ?></td>
                                                                <td>
                                                                    <a href="contact.php?edit=<?= $encrypted ?>" class="btn-sm btn-success btn-sm mx-2">
                                                                        <span class="tf-icon bx bx-pencil bx-18px "></span>
                                                                    </a>
                                                                    <a href="contact.php?delete=<?= $encrypted ?>" class="btn-sm btn-danger btn-sm mx-2">
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

    $parameter = $_GET['contact-message'] ?? '';
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