<?php

use App\Models\UsersModel;
use App\Models\NotificationModel;

$session = session();
if (!empty($session->get('session_user_id'))) {
  $user_id = $session->get('session_user_id');
  $position = $session->get('session_user_position');
  $userModel = new UsersModel();
  $obj_user = $userModel->get_user_data($user_id);
  $firstname = $obj_user->FIRSTNAME;
  $lastname = $obj_user->LASTNAME;

  $notificationModel = new NotificationModel();
  $noti_data = $notificationModel->getAllNoti_byUserId($user_id);
  $notification = array();
  if ($noti_data['success'] == true) {
    $notification = $noti_data['result'];
  }
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
  <link rel="stylesheet" href="<?= base_url("style/bootstrap.min.css"); ?>">
  <link rel="stylesheet" href="<?= base_url("style/fontawesome/css/all.css"); ?>">
  <link rel="stylesheet" href="<?= base_url("style/basic.css"); ?>">
</head>

<body>
  <div class="container-feild sticky-top">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <a href="<?= base_url(); ?>"><img src="<?= base_url("images/MRO.png"); ?>" id="nav-logo"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link <?= (!empty($active) && $active == "home" ? "active" : "") ?>" href="<?= base_url("home"); ?>">หน้าหลัก</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?= (!empty($active) && $active == "booking" ? "active" : "") ?>" href="<?= base_url("booking"); ?>">จองห้องประชุม</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?= (!empty($active) && $active == "calendar" ? "active" : "") ?>" href="<?= base_url("calendar"); ?>">ปฏิทิน</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?= (!empty($active) && $active == "table" ? "active" : "") ?>" href="<?= base_url("table"); ?>">ห้องประชุม</a>
            </li>
          </ul>
          <ul class="mb-2 mb-lg-0">
            <li>
              <?php if (empty($session->get('session_user_id'))) { ?>
                <a href="<?= base_url("login"); ?>" class="btn btn-warning">เข้าสู่ระบบ</a>
                <a href="<?= base_url("register"); ?>" class="btn btn-warning">สมัครสมาชิก</a>
              <?php } else { ?>
                <div class="collapse navbar-collapse">
                  <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle me-1" href="#" id="dropdown-notification" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-bell me-1" <?= (count($notification) >= 1 ? "style=\"color: #e6d200;\"" : "") ?> >
                          <span class="position-absolute translate-middle badge rounded-pill bg-danger">
                            <?= number_format(count($notification)); ?>
                          </span>
                        </i>
                      </a>
                      <ul class="dropdown-menu dropdown-menu-dark" style="min-width: 300px;" aria-labelledby="dropdown-notification">
                        <?php
                        if (count($notification) >= 1) {
                          $arr_noti_format_list = array();
                          foreach ($notification as $key => $val) {
                            $arr_noti_format_list[$key] = "<span class=\"notification_list\">$val->MESSAGE</span>";
                          }
                          echo implode("<hr class=\"mx-0 my-1 px-0 py-0\"/>", $arr_noti_format_list);
                        ?>
                        <?php
                        } else { ?>
                          <span class="notification_list text-danger">ไม่มีการแจ้งเตือนใดๆ</span>
                        <?php } ?>
                      </ul>
                    </li>
                  </ul>
                  <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="dropdown-user-navbar" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?= $firstname . " " . $lastname; ?>
                      </a>
                      <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdown-user-navbar">
                        <li><a class="dropdown-item" href="<?= base_url('profile'); ?>">ข้อมูลส่วนตัว</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('history'); ?>">ประวัติการจอง</a></li>
                        <?php if ($position > 1) { ?>
                          <li>
                            <hr class="dropdown-divider">
                          </li>
                          <li><a class="dropdown-item text-primary" href="<?= base_url('admin/dashboard'); ?>">การจัดการ</a></li>
                        <?php } ?>
                        <li>
                          <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item text-danger" href="<?= base_url('logout'); ?>">ออกจากระบบ</a></li>
                      </ul>
                    </li>
                  </ul>
                </div>
              <?php } ?>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>
  <!-- content of page -->
  <?= $this->renderSection('header-content') ?>
  <!-- footer content -->
  <footer class="main-footer">
    <?= view('layouts/user/footer-main') ?>
  </footer>
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