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
            <h5 class="text-center my-5">เพิ่มห้องประชุม</h5>
            <div class="row">
                <div class="cow-lg-12 py-3 bg-primary text-center">
                    <span>รายละเอียดห้องประชุม</span>
                    <div class="cow-lg-12 py-3 bg-primarylight">
                        <form action="<?= base_url('admin/create_room'); ?>" method="POST">
                            <div class="row">
                                <div class="col-lg-3"></div>
                                <div class="col-lg-3">
                                    <div class="mt-3"></div>
                                    <label for="remarks">ชื่อ :</label>
                                    <div class="mt-3"></div>
                                    <div class="mt-3"></div>
                                    <label for="remarks">ประเภทห้องประชุม :</label>
                                    <div class="mt-4"></div>
                                    <div class="mt-4"></div>
                                    <label for="remarks">จำนวนที่นั่ง :</label>
                                    <div class="mt-4"></div>
                                    <div class="mt-4"></div>
                                    <div class="mt-5"></div>
                                    <div class="mt-5"></div>
                                    <label for="remarks">สถานะห้อง :</label>
                                    <div class="mt-4"></div>
                                    <label for="remarks">สถานที่ :</label>
                                    <div class="mt-4"></div>
                                    <div class="mt-4"></div>
                                    <div class="mt-5"></div>
                                    <label for="remarks">ผู้รับผิดชอบ :</label>
                                    <div class="mt-4"></div>
                                    
                                    <label for="remarks">อุปกรณ์ภายในห้อง :</label>
                                    <div class="mt-3"></div>


                                </div>
                                <div class="col-lg-3">
                                    <input type="text" id="r_name" name="r_name" class="form-control" placeholder="ชื่อห้องประชุม">
                                    <div class="mt-3"></div>
                                    <select name="r_type" id="r_type" class="form-control">
                                        <option value="">- เลือกเภทห้องประชุม -</option>
                                        <option value="เล็ก">เล็ก</option>
                                        <option value="กลาง">กลาง</option>
                                        <option value="ใหญ่">ใหม่</option>
                                    </select>
                                    <div class="mt-3"></div>
                                    <select name="r_chair" id="r_chair" class="form-control">
                                    <?php
                                    for ($i = 1; $i <=30; $i++) { ?>
                                         <option value="<?= $i  ?>"> <?= $i  ?> </option>
                                    <?php }?>
                                    </select>
                                    <div class="mt-3"></div>
                                    <select name="r_status" id="r_status" class="form-control">
                                        <option value="">- เลือกสถานะ -</option>
                                        <option value="Y">ใช้งานได้</option>
                                        <option value="E">ปิดปรับปรุง</option>
                                    </select>
                                    <div class="mt-3"></div>
                                    <input type="text" id="r_location" name="r_location" class="form-control" placeholder="สถานที่">
                                    <div class="mt-3"></div>
                                    <select name="r_attendant" id="r_attendant" class="form-control">
                                        <option value="">- เลือกผู้่รับผิดชอบ -</option>
                                        <option value="xxx">จักรินทร์</option>

                                    </select>
                                    <div class="mt-3"></div>

                                    <!-- <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">คอมพิวเอตร์</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                        <label class="form-check-label" for="flexCheckChecked">โปรเจคเตอร์</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                        <label class="form-check-label" for="flexCheckChecked">ไมโครโฟน</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                        <label class="form-check-label" for="flexCheckChecked">จอโปรเจคเตอร์</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                        <label class="form-check-label" for="flexCheckChecked">อื่นๆ
                                            <input type="text" id="emp_remarks" name="emp_remarks" class="form-control" placeholder="หมายเหตุ">
                                        </label>
                                    </div> -->
                                    <input type="text" id="r_equipment" name="r_equipment" class="form-control" placeholder="อุปกรณ์">

                                </div>

                                <div class="col-lg-3"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row mt-5"></div>
            <div class="row mt-4">
                <div class="col-lg-12 text-center">
                    <input type="submit" class="btn btn-success" value="บันทึก">
                    <a href="<?= base_url("admin/dashboard") ?>" class="btn btn-danger">ยกเลิก</a>
                </div>
                <div class="col-lg-1"></div>
            </div>
        </div>
        <?= $this->endSection() ?>