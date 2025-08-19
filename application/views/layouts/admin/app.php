<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?= isset($title) ? $title : 'Destiny.Industries' ?> - Destiny.Industries</title>

  <!-- Custom fonts for this template-->
  <link href="<?= base_url() ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url() ?>assets/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?= base_url() ?>assets/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>assets/favicon-16x16.png">
	<link rel="manifest" href="<?= base_url() ?>assets/site.webmanifest">
  <!-- Custom styles for this template-->
  <link href="<?= base_url() ?>assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">
    <?php $this->load->view('layouts/admin/_sidebar') ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <?php $this->load->view('layouts/admin/_topbar') ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <?php $this->load->view($page) ?>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Destiny.Industries 2025</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url() ?>assets/js/sb-admin-2.min.js"></script>
  <script src="<?= base_url() ?>assets/js/app.js"></script>
</body>

</html>
