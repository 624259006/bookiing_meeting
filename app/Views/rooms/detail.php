<?= $this->extend('layouts/user/header-main') ?>
<?= $this->section('title') ?>Table about meeting room<?= $this->endSection() ?>
<?= $this->section('header-content') ?>
<style>
  table,
  th,
  td {
    border: 1px solid black;
  }

  .bg-primarylight {
    background-color: #AFC8EE;
  }
</style>
<div class="container">
  <div class="row">
    <div class="col-lg-1"></div>
    <div class="col-lg-10">
      <h5 class="text-center my-5">ห้องประชุม</h5>
      <div class="row">
        <div class="cow-lg-12 py-3 bg-primary text-center">
          <span>รายละเอียดห้องประชุม</span>
        </div>
        <div class="cow-lg-12 py-3 bg-primarylight">
          <div class="text-center">
            <div id="carouselExampleControls" class="carousel slide mx-auto" data-bs-ride="carousel" style="width: 70%;">
              <div class="carousel-indicators">
                <?php
                $i = 1;
                foreach (json_decode($room->IMAGES, true) as $img) {
                ?>
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?= $i - 1; ?>" <?= ($i === 1 ? "class=\"active\" aria-current=\"true\"" : "") ?> aria-label="Slide <?= $i; ?>"></button>
                <?php
                  $i++;
                }
                ?>
              </div>
              <div class="carousel-inner">
                <?php
                $i = 1;
                foreach (json_decode($room->IMAGES, true) as $img) {
                ?>
                  <div class="carousel-item <?= ($i === 1 ? "active" : "") ?>">
                    <img src="<?= base_url($img); ?>" class="d-block mx-auto" style="max-height: 300px;" alt="..." onerror="this.onerror=null; this.src='https://placeholder.pics/svg/753x300'">
                  </div>
                <?php
                  $i++;
                }
                ?>
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
          </div>
          <table style="width:70%" class="ms-auto me-auto">
            <div class="row mt-5"></div>
            <tr>
              <td class="px-3 py-3">ชื่อห้องประชุม</td>
              <td class="px-3 py-3"><?= $room->R_NAME; ?></td>
            </tr>
            <tr>
              <td class="px-3 py-3">ประเภทห้อง</td>
              <td class="px-3 py-3">ห้องประชุมขนาด<?= $room->R_TYPE; ?></td>
            </tr>
            <tr>
              <td class="px-3 py-3">จำนวนที่นั่ง</td>
              <td class="px-3 py-3"><?= $room->R_CHAIR; ?> ที่นั่ง</td>
            </tr>
            <tr>
              <td class="px-3 py-3">อาคาร/สถานที่</td>
              <td class="px-3 py-3"><?= $room->R_LOCATION; ?></td>
            </tr>
            <tr>
              <td class="px-3 py-3">ผู้ดูแลห้อง</td>
              <td class="px-3 py-3"><?= $room->FIRSTNAME . " " . $room->LASTNAME; ?></td>
            </tr>
            <tr>
              <td class="px-3 py-3">เบอร์โทรศัพท์ผู้ดูแล</td>
              <td class="px-3 py-3"><?= $room->PHONE; ?></td>
            </tr>
            <tr>
              <td class="px-3 py-3">อุปกรณ์ภายในห้อง</td>
              <td class="px-3 py-3"><?= $room->R_EQUIPMENT; ?></td>
            </tr>
          </table>
          <div class="row mt-5"></div>
          <div class="row mt-4">
            <div class="col-lg-12 text-center">
              <input type="submit" class="btn btn-success" value="จองห้องประชุม">
              <a href="<?= base_url("home") ?>" class="btn btn-danger">กลับสู่หน้าหลัก</a>
            </div>
          </div>
          <div class="row mt-5"></div>
          <div class="row mt-5"></div>
        </div>
      </div>
    </div>
    <div class="col-lg-1"></div>
  </div>
</div>
<?= $this->endSection() ?>