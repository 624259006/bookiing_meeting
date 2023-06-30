<?= $this->extend('layouts/user/header-main') ?>
<?= $this->section('title') ?>Table about meeting room<?= $this->endSection() ?>
<?= $this->section('header-content') ?>

<div class="container" style="margin-bottom: 220px;">
  <div class="row">
    <div class="col-lg-1"></div>
    <div class="col-lg-10">
      <h5 class="text-center my-5">โปรไฟล์</h5>
      <div class="row">
        <center>
          <img class="me-2 mb-5" src="<?php echo base_url('images/user1.png'); ?>" id="imgblah" width="100px" height="100px" class="profile-user-profile">
        </center>
        <div class="col-lg-4"></div>
        <div class="col-lg-2">
          <label for="remarks">ชื่อ :</label>
          <div class="mt-3"></div>
          <label for="remarks">นามสกุล :</label>
          <div class="mt-3"></div>
          <label for="remarks">วัเบอร์โทรศัพท์ :</label>
          <div class="mt-3"></div>
          <label for="remarks">อีเมล์ :</label>
          <div class="mt-3"></div>
          <label for="remarks">รหัสผ่าน :</label>
        </div>
        <div class="col-lg-3">
          <p><?= $user->FIRSTNAME; ?></p>
          <div class="mt-3"></div>
          <p><?= $user->LASTNAME; ?></p>
          <div class="mt-3"></div>
          <p><?= $user->PHONE; ?></p>
          <div class="mt-3"></div>
          <p><?= $user->EMAIL; ?></p>
          <div class="mt-3"></div>
          <p>********</p>
          <div class="mt-3"></div>
        </div>
        <div class="col-lg-3"></div>
        <div class="col-lg-12 text-center mt-4">
          <a href="<?= base_url("user/edit") ?>" class="btn btn-warning">แก้ไข</a>
        </div>
      </div>
    </div>
    <div class="col-lg-1"></div>
  </div>
</div>

<?= $this->endSection() ?>