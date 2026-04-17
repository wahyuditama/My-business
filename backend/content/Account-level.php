<?php
include '../auth/sql.php';
include '../auth/encryp.php';
session_start();

if (isset($_POST['simpan'])) {
  $nama_level = $_POST['nama_level'];

  $insert = mysqli_query($conn, "INSERT INTO level (level_name) VALUES ('$nama_level')");
  header("location: Account-level.php?level-account=input");
}


$id  = isset($_GET['edit']) ? decryptId($_GET['edit'], $key) : '';
$queryEdit = mysqli_query($conn, "SELECT * FROM level WHERE id ='$id'");
$rowEdit   = mysqli_fetch_assoc($queryEdit);


if (isset($_POST['edit'])) {
  $nama_level   = $_POST['nama_level'];

  $update = mysqli_query($conn, "UPDATE level SET level_name='$nama_level' WHERE id='$id'");
  header("location:Account-level.php?level-account=edit");
}


$queryLevel = mysqli_query($conn, "SELECT * FROM level");

if (isset($_GET['delete'])) {
  $id = decryptId($_GET['delete'], $key);

  $delete = mysqli_query($conn, "DELETE FROM level WHERE id ='$id'");
  header("location:Account-level.php?level-account=remove");
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
              <?php if (isset($_GET['edit']) || isset($_GET['add_level'])) : ?>
                <div class="col-sm-12">
                  <div class="card">
                    <div class="card-header">
                      <a href="" class="btn btn-sm btn-primary"><?php echo isset($_GET['edit']) ? 'Edit' : 'Tambah' ?> Level</a>
                    </div>
                    <div class="card-body">
                      <?php if (isset($_GET['Delete'])) : ?>
                      <?php endif  ?>
                      <form action="" method="POST" enctype="multipart/form-data">
                        <div class="mb-3 row">
                          <div class="col-sm-6">
                            <label for="" class="form-label">Nama Level</label>
                            <?php if (isset($_GET['edit']) && !isset($rowEdit['id'])) : ?>
                              <h5 style="color:red ;">Data Tidak ditemukan</h5>
                            <?php else : ?>
                              <input type="text" name="nama_level" class="form-control" placeholder="Masukan Nama Level" value="<?php echo isset($_GET['edit']) ? $rowEdit['level_name'] : '' ?>" required>
                            <?php endif ?>
                          </div>
                          <div class="my-3">
                            <?php if (isset($_GET['edit']) && !isset($rowEdit['id'])) : ?>
                              <a href="Account-level.php" class="btn btn-sm btn-secondary">Kembali</a>
                            <?php else : ?>
                              <button type="submit" class="btn-sm btn-primary" name="<?php echo  isset($_GET['edit']) ? 'edit' : 'simpan' ?>"> <?= isset($_GET['edit']) ? 'Edit' : 'Simpan' ?> Data</button>
                            <?php endif ?>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              <?php else : ?>
                <div class="col-sm-12">
                  <div class="card">
                    <div class="card-header">Data Level</div>
                    <div class="card-body">
                      <?php if (isset($_GET['Delete'])): ?>
                        <div class="alert alert-succes" role="alert"></div>
                      <?php endif ?>
                      <div class="mb-3" align="right">
                        <a href="Account-level.php?add_level" class="btn btn-sm btn-primary">Tambah</a>
                      </div>
                      <table class="table table-bordered text-center">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Nama Level</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $no = 1;
                          while ($rowLevel = mysqli_fetch_assoc($queryLevel)) {
                            $encryptedId = encryptId($rowLevel['id'], $key); ?>
                            <tr>
                              <td><?php echo $no++ ?></td>
                              <td><?php echo $rowLevel['level_name'] ?></td>
                              <td>
                                <a href="Account-level.php?edit=<?php echo urlencode($encryptedId) ?>" class="btn btn-sm btn-success">
                                  <span class="tf-icon bx bx-pencil bx-18px"></span>
                                </a>
                                <a href="Account-level.php?delete=<?php echo urlencode($encryptedId) ?>" onclick="return confirm('Apakah anda yakin akan menghapus data ini??')" class="btn btn-sm btn-danger">
                                  <span class="tf-icon bx bx-trash bx-18px"></span>
                                </a>
                              </td>
                            </tr>
                          <?php } ?>
                        </tbody>
                      </table>
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

  <?php
  $parameter = $_GET['level-account'] ?? '';
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