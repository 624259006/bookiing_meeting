<?= $this->extend('layouts/admin/header-main') ?>
<?= $this->section('title') ?>Table about meeting room<?= $this->endSection() ?>
<?= $this->section('content') ?>
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
      <h5 class="text-center my-5">แก้ไขข้อมูลผู้ใช้งาน</h5>
      <form action="<?= base_url('admin/update_user'); ?>" method="POST">
        <div class="mt-3"></div>
        <label for="firstname">ชื่อ:</label>
        <input type="text" id="firstname" name="firstname" value="<?= $user_data->FIRSTNAME; ?>" class="form-control" placeholder="ชื่อ">
        <div class="mt-3"></div>
        <label for="lastname">นามสกุล:</label>
        <input type="text" id="lastname" name="lastname" value="<?= $user_data->LASTNAME; ?>" class="form-control" placeholder="นามสกุล">
        <div class="mt-3"></div>
        <label for="phone">เบอร์โทรศัพท์:</label>
        <input type="text" id="phone" name="phone" value="<?= $user_data->PHONE; ?>" class="form-control" placeholder="เบอร์">
        <label for="user_position">ตำแหน่ง:</label>
        <div class="mt-3"></div>
        <select name="user_position" id="user_position" class="form-control">
          <?php foreach ($position_data as $p_id => $val) { ?>
            <option value="<?= $p_id; ?>" <?= ($p_id == $user_data->USER_POSITION) ? "selected" : "" ?> ><?= $val['P_NAME']; ?></option>
          <?php } ?>
        </select>
        <div class="mt-3"></div>
        <label for="status">สถานะ:</label>
        <select name="user_status" id="user_status" class="form-control">
          <option value="1" <?= ($user_data->USER_ACTIVE == 1) ? "selected" : ""; ?> >Active</option>
          <option value="0" <?= ($user_data->USER_ACTIVE == 0) ? "selected" : ""; ?> >Unactive</option>
        </select>
        <div class="row mt-4">
          <div class="col-lg-12 text-center">
            <input type="hidden" name="user_id" value="<?= $user_data->USER_ID; ?>" readonly>
            <input type="submit" class="btn btn-success" value="บันทึก">
            <a href="<?= base_url("admin/nuser_management") ?>" class="btn btn-danger">ยกเลิก</a>
          </div>
        </div>
      </form>
    </div>
    <div class="col-lg-2"></div>
  </div>
</div>
<?= $this->endSection() ?>