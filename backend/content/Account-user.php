<?php
include '../auth/sql.php';
include '../auth/encryp.php';
session_start();

if (isset($_POST['tambah'])) {
  $username = $_POST['username'];
  $phone = $_POST['telepon'];
  $alamat = $_POST['alamat'];
  $idLevel = $_POST['level'];
  $email = $_POST['email'];

  $insert = mysqli_query($conn, "INSERT INTO user (id_level,username, phone, address, email) VALUES ('$idLevel','$username','$phone','$alamat','$email')");
  header("location: Account-user.php?user-data=add_user");
}


$id = isset($_GET['edit']) ? decryptId($_GET['edit'], $key) : '';
$editData = mysqli_query($conn, "SELECT level.level_name, user.* FROM user LEFT JOIN level ON user.id_level = level.id
WHERE user.id ='$id'");

$rowEdit = mysqli_fetch_assoc($editData);

if (isset($_POST['edit'])) {
  $username   = $_POST['username'];
  $phone = $_POST['telepon'];
  $alamat = $_POST['alamat'];
  $email  = $_POST['email'];
  $idLevel = $_POST['level'];
  $update = mysqli_query($conn, "UPDATE user SET id_level='$idLevel', username='$username', phone='$phone', address='$alamat', email='$email' WHERE id='$id'");


  if ($_SESSION['user_id'] == 1) {
    header(header: "location:Account-user.php?user-data=change_user");
  } else {
    echo
    "<script>
            alert('Data Berhasil Diubah');
            window.location.href = 'Account-user.php?edit=" . urlencode(encryptId($id, $key)) . "';
        </script>";
  }
}


$id_hapus = isset($_GET['delete']) ? decryptId($_GET['delete'], $key) : '';
if ($id_hapus) {
  mysqli_query($conn, "DELETE FROM user WHERE id='$id_hapus'");
  // $_SESSION['delete_success'] = 'Data berhasil dihapus';
  header("location: Account-user.php?hapus=berhasil");
}

$queryuser = mysqli_query($conn, "SELECT * FROM user ORDER BY id DESC");

$level = mysqli_query($conn, "SELECT * FROM level ORDER BY id DESC");

if (isset($_SESSION['delete_success'])) {
  echo "
    <script>
Toastify({
  text: 'Data berhasil dihapus' ,
duration: 3000,
gravity: 'top',
position: 'right',
backgroundColor: 'red'
}).showToast();
</script>
";
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
            <?php if (isset($_GET['edit']) || isset($_GET['tambah'])) : ?>
              <div class="row">
                <div class="card">
                  <div class="card-header d-flex justify-content-between">
                    <a href=""><?php echo isset($_GET['edit']) ? 'Edit' : 'Tambah' ?> <?php echo empty($_SESSION['user_id'] == 1) ? 'Profile' : 'User' ?></a>
                    <a href="javascript:window.history.back();" class="btn btn-sm btn-secondary"> Kembali</a>
                  </div>
                  <div class="card-body">
                    <?php if (isset($_GET['edit']) && !isset($rowEdit)) : ?>
                      <h5 class="text-danger"> Data Tidak Ditemukan</h5>
                    <?php else : ?>
                      <form action="" method="post">
                        <div class="row">
                          <div class="col-sm-6">
                            <div class="mb-3">
                              <label for="" class="form-label"><?php echo isset($_GET['edit'])  ? 'Edit' : 'Input' ?> Username</label>
                              <input type="text" name="username" class="form-control" placeholder="Masukan Nama Pengguna" value="<?php echo isset($_GET['edit']) ? $rowEdit['username'] : '' ?>" <?php echo isset($_GET['detail']) ? 'readonly' : '' ?> required>
                            </div>
                            <div class="mb-3">
                              <label for="" class="form-label"><?php echo isset($_GET['edit']) ? 'Edit' : 'Input' ?> Phone Number</label>
                              <input type="text" name="telepon" class="form-control" placeholder="Masukan Nomor Telepon" value="<?php echo isset($_GET['edit']) ? $rowEdit['phone'] : '' ?>" <?php echo isset($_GET['detail']) ? 'readonly' : '' ?> required>
                            </div>
                            <div class="mb-3">
                              <label for="" class="form-label"><?php echo isset($_GET['edit']) ? 'Edit' : 'Input' ?> Your Address</label>
                              <input type="text" name="alamat" class="form-control" placeholder="Masukan Alamat" value="<?php echo isset($_GET['edit']) ? $rowEdit['address'] : '' ?>" <?php echo isset($_GET['detail']) ? 'readonly' : '' ?>>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="mb-3">
                              <label for="" class="form-label">Pilih Level</label>
                              <?php if ($_SESSION['user_id'] == 1): ?>
                                <select name="level" class="form-control">
                                  <?php while ($rowLevel = mysqli_fetch_assoc($level)) { ?>
                                    <option value="<?php echo isset($rowLevel['id']) ?>" <?php echo isset($_GET['edit']) && $rowEdit['id_level'] ? 'selected' : '' ?>>
                                      <?php echo $rowLevel['level_name'] ?>
                                    </option>
                                  <?php } ?>
                                </select>
                              <?php else : ?>
                                <input type="text" class="form-control" value="<?php echo isset($_GET['edit']) ? $rowEdit : '' ?>" readonly>
                              <?php endif; ?>
                            </div>
                            <div class="mb-3">
                              <label for="" class="form-label"><?= isset($_GET['edit']) ? 'Edit' : 'Input' ?> Your Email</label>
                              <input type="email" name="email" class="form-control" placeholder="Masukan Alamat Email" value="<?php echo isset($_GET['edit']) ? $rowEdit['email'] : '' ?>" <?php echo isset($_GET['detail']) ? 'readonly' : '' ?>>
                            </div>
                            <div class="mb-3">
                              <label for="" class="form-label"><?= isset($_GET['edit']) ? 'Edit' : 'Input' ?> Your password</label>
                              <input type="text" name="password" class="form-control" placeholder="Masukan  password" value="<?php echo isset($_GET['edit']) ? $rowEdit['password'] : '' ?>" <?php echo isset($_GET['detail']) ? 'readonly' : '' ?>>
                            </div>
                          </div>
                        </div>
                        <button type="submit" name="<?php echo isset($_GET['edit']) ? 'edit' : 'tambah' ?>" class="btn-sm btn-primary">Submit</button>
                      </form>
                    <?php endif; ?>
                  </div>
                </div>
                <!-- Total Revenue -->
                <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">

                </div>
                <!--/ Total Revenue -->
                <div class="col-12 col-md-8 col-lg-4 order-3 order-md-2">
                  <div class="row">

                  </div>
                </div>
              </div>
            <?php else : ?>
              <div class="row">
                <?php if ($_SESSION['level_id'] == 2): ?>
                  <a href="#" onclick="history.back()">Data Tidak Ditemukan</a>
                <?php else : ?>
                  <div class="col-md-12">
                    <div class="card">
                      <div class="card-header">
                        <div class="d-flex justify-content-between">
                          <a href="?true" class="btn btn-sm mb-3">Data users</a>
                          <a href="Account-user.php?tambah" class="btn btn-primary btn-sm mb-3">Tambah user</a>
                        </div>
                        <?php if (isset($_GET['hapus'])): ?>
                          <div class="alert alert-success" role="alert">
                            Data berhasil dihapus
                          </div>
                        <?php endif; ?>
                      </div>
                      <div class="card-body">
                        <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Nama</th>
                              <th>No. Telp</th>
                              <th>Alamat</th>
                              <th>Actions</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $no = 1;
                            while ($rowuser = mysqli_fetch_assoc($queryuser)) {
                              $encrypt = encryptId($rowuser['id'], $key) ?>
                              <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $rowuser['username'] ?></td>
                                <td><?php echo $rowuser['phone'] ?></td>
                                <td><?php echo $rowuser['address'] ?></td>
                                <td>
                                  <a href="?edit=<?php echo urlencode($encrypt) ?>" class="btn-sm btn-success bx bx-pencil"></a>
                                  <a href="?delete=<?php echo urlencode($encrypt) ?>" class="btn-sm btn-danger bx bx-trash"></a>
                                </td>
                              </tr>
                            <?php } ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                <?php endif; ?>
              </div>
            <?php endif; ?>
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
  $params = $_GET['user-data'] ?? '';
  $notif = [
    'add_user' => 'successfully',
    'change_user' => 'change_successfully'
  ];

  if (array_key_exists($params, $notif)) {
    $alert = $notif[$params];
    echo "
    <script>
    Swal.fire({
      title: 'Berhasil!',
      text: 'Data berhasil $alert.',
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