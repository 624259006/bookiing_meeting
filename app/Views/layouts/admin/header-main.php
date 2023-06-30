<?php

use App\Models\UsersModel;

$session = session();
if (!empty($session->get('session_user_id'))) {
  $user_id = $session->get('session_user_id');
  $user_model = new UsersModel();
  $obj_user = $user_model->get_user_data($user_id);
  $position = $obj_user->USER_POSITION;
  $firstname = $obj_user->FIRSTNAME;
  $lastname = $obj_user->LASTNAME;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $this->renderSection('title'); ?></title>
  <script type="text/javascript" src="<?= base_url("script/bootstrap.bundle.min.js"); ?>"></script>
  <script type="text/javascript" src="<?= base_url("script/jquery-3.6.4.js"); ?>"></script>
  <script type="text/javascript" src="<?= base_url("script/sweetalert.min.js"); ?>"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js"></script>
  <link rel="stylesheet" href="<?= base_url("style/bootstrap.min.css"); ?>">
  <link rel="stylesheet" href="<?= base_url("style/fontawesome/css/all.css"); ?>">
  <link rel="stylesheet" href="<?= base_url("style/admin/basic.css"); ?>">
  <link rel="stylesheet" href="<?= base_url("style/admin/wrapper.css"); ?>">
</head>

<body>
  <div class="wrapper">
    <?php require_once(APPPATH . 'Views/layouts/admin/wrapper-main.php'); ?>
    <div id="content">
      <!-- content of page -->
      <nav class="navbar mb-3 navbar-expand-lg navbar-light ps-0">
        <button type="button" id="sidebarCollapse" class="btn btn-warning">
          <i class="fa fa-user-circle-o"></i>
          <span>ซ่อน | แสดง</span>
        </button>
        <div class="navbartip">
          <span class="pe-3">
            <?= $firstname . " " . $lastname . " [" . $_SERVER['REMOTE_ADDR'] . "]"; ?>
          </span>
        </div>
      </nav>
      <?= $this->renderSection('content') ?>
    </div>
  </div>
</body>

</html>
<?php if (session()->getFlashdata('swel_title')) { ?>
  <script>
    $(document).ready(function() {
      Swal.fire({
        title: "<?= session()->getFlashdata('swel_title') ?>",
        text: "<?= session()->getFlashdata('swel_text') ?>",
        icon: "<?= session()->getFlashdata('swel_icon') ?>",
        confirmButtonText: '<?= session()->getFlashdata('swel_button') ?>',
        timerProgressBar: "<?= session()->getFlashdata('swel_progress') ? true : false; ?>",
      });
    });
  </script>
<?php } ?>