<?= $this->extend('layouts/user/header-main') ?>
<?= $this->section('title') ?>Edit to a Profile<?= $this->endSection() ?>
<?= $this->section('header-content') ?>

<div class="container">
    <div class="row">
        <div class="col-lg-1"></div>
        <div class="col-lg-10">
            <h5 class="text-center my-5">แก้ไขข้อมูลส่วนตัว</h5>
            <form action="<?= base_url("user/save_edit"); ?>" method="POST">
                <div class="form-group">
                    <div class="row">
                        <div class="col-lg-4 text-end mt-2">
                            <label for="input-firstname">ชื่อเรื่อง :</label>
                        </div>
                        <div class="col-lg-5">
                            <input type="text" id="input-firstname" class="form-control" placeholder="ความสะอาด">
                        </div>
                        <div class="col-lg-3"></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-4 text-end mt-2">
                            <label for="input-lastname">ประเภท : </label>
                        </div>
                        <div class="col-lg-5">
                            <select name="report" id="report">
                                <option value="volvo">เกี่ยวกับห้องประชุม</option>
                                <option value="saab">เกี่ยวกับเว็บไซต์</option>
                                <option value="opel">เกี่ยวกับผู้ดูแล</option>
                            </select>
                        </div>
                        <div class="col-lg-3"></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-4 text-end mt-2">
                            <label for="input-email">ข้อความ : </label>
                        </div>
                        <div class="col-lg-5">
                            <input type="email" id="input-email" class="form-control" placeholder="ห้องมีความไม่สะอาด">
                        </div>
                        <div class="col-lg-3"></div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-lg-12 text-center">
                        <input type="submit" class="btn btn-success" value="ส่งข้อความ">
                        <a href="<?= base_url("profile") ?>" class="btn btn-danger">กลับสู่หน้าหลัก</a>
                    </div>
                </div>
            </form>
            <div class="col-lg-1"></div>
        </div>
    </div>
</div>
</div>

<?= $this->endSection() ?>