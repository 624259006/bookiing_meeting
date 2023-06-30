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
      <h5 class="text-center my-5">ติดตามสถานะการจองห้องประชุม</h5>
      <div class="row">
        <div class="cow-lg-12 py-3 bg-primary text-center">
          <span>รายละเอียดการจองห้องประชุม</span>
        </div>
        <div class="cow-lg-12 py-3 bg-primarylight">
          <div class="text-center">
        <img src="<?= base_url("images/room_1.jpg"); ?>" style="width:60%">
        </div>
          <table style="width:70%" class="ms-auto me-auto">
          <div class="row mt-5"></div>
            <tr>
              <td class="px-3 py-3">ชื้อห้องประชุม</td>
              <td class="px-3 py-3">ห้องประชุมมะจ๋องจองเยกทูน่า</td>
            </tr>
            <tr>
              <td class="px-3 py-3">ประเภทห้อง</td>
              <td class="px-3 py-3">ห้องประชุมขนาดเล็ก</td>
            </tr>
            <tr>
              <td class="px-3 py-3">จำนวนที่นั่ง</td>
              <td class="px-3 py-3">15ที่นั่ง</td>
            </tr>
            <tr>
              <td class="px-3 py-3">อาคาร/สถานที่</td>
              <td class="px-3 py-3">อาคารปื่นมาลาแก้วฟ้า ชั้น7</td>
            </tr>
            <tr>
              <td class="px-3 py-3">ผู้จองห้อง</td>
              <td class="px-3 py-3">นายประสบ อุบัติเหตุ</td>
            </tr>
            <tr>
              <td class="px-3 py-3">เบอร์โทรศัพท์ผู้ดูแล</td>
              <td class="px-3 py-3">012-345-6789</td>
            </tr>
            <tr>
              <td class="px-3 py-3">สถานะการจอง</td>
              <td class="px-3 py-3">รออนุมัติ</td>
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