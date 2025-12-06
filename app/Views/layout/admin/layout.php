<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Tugas Besar Web
  </title>
  <link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css') ?>" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="<?= base_url('css/nucleo-icons.css') ?>" />
  <link rel="stylesheet" href="<?= base_url('css/nucleo-svg.css') ?>" />
  <link rel="stylesheet" href="<?= base_url('css/argon-dashboard.css?v=2.0.4') ?>" />
  <link rel="stylesheet" href="<?= base_url('fonts/https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700') ?>" />
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="../public/css/nucleo-svg.css" rel="stylesheet" />
</head>

<body>

    <?= $this->include('layout/admin/navbar') ?>

    
        <?= $this->renderSection('content') ?>
    

    <!-- js-->
    <script src="<?= base_url('js/jquery.min.js') ?>"></script>
    <script src="<?= base_url('js/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('js/core/popper.min.js') ?>"></script>
  <script src="<?= base_url('js/core/bootstrap.min.js') ?>></script>
  <script src="<?= base_url('js/plugins/perfect-scrollbar.min.js') ?>></script>
  <script src="<?= base_url('js/plugins/smooth-scrollbar.min.js') ?></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/argon-dashboard.min.js?v=2.0.4"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>