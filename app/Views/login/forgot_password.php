<?= $this->extend('layouts/user/header-main') ?>
<?= $this->section('title') ?>Table about meeting room<?= $this->endSection() ?>
<?= $this->section('header-content') ?>

<?php
$arr_month = array(
  '1' => 'มกราคม',
  '2' => 'กุมภาพันธ์',
  '3' => 'มีนาคม',
  '4' => 'เมษายน',
  '5' => 'พฤษภาคม',
  '6' => 'มิถุนายน',
  '7' => 'กรกฎาคม',
  '8' => 'สิงหาคม',
  '9' => 'กันยายน',
  '10' => 'ตุลาคม',
  '11' => 'พฤศจิกายน',
  '12' => 'ธันวาคม'
);
?>

<div class="container mt-4">
  <div class="form-group">
    <div class="row mt-3">
      <div class="row mt-4">
        <div class="col-lg-4 text-end mt-2">
          <label for="input-id-card">รหัสบัตรประชาชน : </label>
        </div>
        <div class="col-lg-4">
          <input type="id-card" id="input-id-card" name="id_card" class="form-control" placeholder="ID Card">
        </div>
        <div class="col-lg-4"></div>
      </div>
      <div class="row mt-3"></div>
      <div class="col-lg-4 text-end mt-2">
        <label for="input-birthday">วันที่ : </label>
      </div>
      <div class="col-lg-5">
        <div class="row">
          <div class="col-4">
            <select id="b_day" name="b_day" class="form-control">
              <option value="" class="text-center">- วัน -</option>
              <?php for ($day = 1; $day <= 31; $day++) { ?>
                <option value="<?= $day; ?>" class="text-center" <?php if (session()->getFlashdata('b_day') && session()->getFlashdata('b_day') == $day) {
                                                                    echo "selected";
                                                                  } ?>><?= $day; ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="col-4">
            <select id="b_month" name="b_month" class="form-control">
              <option value="" class="text-center">- เดือน -</option>
              <?php for ($month = 1; $month <= 12; $month++) { ?>
                <option value="<?= $month; ?>" class="text-center" <?php if (session()->getFlashdata('b_month') && session()->getFlashdata('b_month') == $month) {
                                                                      echo "selected";
                                                                    } ?>><?= $arr_month[$month]; ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="col-4">
            <select id="b_year" name="b_year" class="form-control">
              <option value="" class="text-center">- ปี -</option>
              <?php for ($year = (date("Y") - 60 + 543); $year <= (date("Y") - 16 + 543); $year++) { ?>
                <option value="<?= $year; ?>" class="text-center" <?php if (session()->getFlashdata('b_year') && session()->getFlashdata('b_year') == $year) {
                                                                    echo "selected";
                                                                  } ?>><?= $year; ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
      </div>
      <div class="col-lg-4"></div>
    </div>
  </div>
  <div class="row mt-4">
    <div class="col-lg-12 text-center">
      <input type="submit" class="btn btn-success" value="ส่งข้อความ">
      <a href="<?= base_url("profile") ?>" class="btn btn-danger">กลับสู่หน้าหลัก</a>
    </div>
  </div>
</div>
</div>
</div>
<?= $this->endSection() ?>