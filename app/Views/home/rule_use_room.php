<?= $this->extend('layouts/user/header-main') ?>
<?= $this->section('title') ?>rule use room<?= $this->endSection() ?>
<?= $this->section('header-content') ?>

<style>
    td {
        border: 1px solid black;
    }

    .bg-primarylight {
        background-color: #AFC8EE;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-10">
            <div class="row mt-5"></div>
            <div class="cow-lg-12 py-3 bg-primary text-center">
                <span>ข้อปฏิบัติในการจองห้องประชุม</span>
            </div>
            <div class="cow-lg-12 py-3 bg-primarylight ps-3">
                <form action="/action_page.php">
                    <label for="fname">1. ผู้ใช้บริการต้องดำเนินการจองห้องประชุมก่อนวันที่เข้าใช้ล่วงหน้าอย่างน้อย 7 วัน เพื่อประสานงานให้ผู้ดูแล จัดเตรียมห้องประชุมได้ทัน</label>
                    <div class="mt-4"></div>
                    <label for="fname">2. หากต้องการยกเลิกการจองห้องประชุมต้องดำเนินการก่อนวันที่เข้าใช้ล่วงหน้าอย่างน้อย 3 วัน หากเกินกว่านี้จะ ไม่สามารถยกเลิกการจองห้องประชุมได้</label>
                    <div class="mt-4"></div>
                    <label for="fname">3. ผู้ใช้บริการต้องช่วยกันดูแลรักษาความสะอาดภายในห้องประชุม</label>
                    <div class="mt-4"></div>
                    <label for="fname">4. ผู้ใช้บริการต้องช่วยกันประหยัดไฟฟ้า โดยอนุญาตให้เปิดใช้เครื่องใช้ไฟฟ้าก่อนใช้งานล่วงหน้า 30 นาที และช่วยกันปิดเครื่องใช้ไฟฟ้าต่าง ๆ ทันทีเมื่อไม่ได้ใช้งาน</label>
                    <div class="mt-4"></div>
                    <label for="fname">5. กรณีที่ผู้ใช้บริการต้องการอาหารว่างเพิ่มเติม ผู้ใช้บริการต้องจัดเตรียมอาหารว่างมาเอง</label>
                    <div class="mt-4"></div>
                    <label for="fname">6. กรณีที่ผู้ใช้บริการต้องการเปลี่ยนรูปแบบการจัดโต๊ะหรืออุปกรณ์ภายในห้อง ผู้ใช้บริการสามารถปรับการจัดรูปแบบ ได้ด้วยตนเอง แต่เมื่อใช้งานเสร็จสิ้นแล้ว ต้องจัดโต๊ะและอุปกรณ์ภายในห้องให้เหมืองเดิมด้วย</label>
                    <div class="mt-4"></div>
                    <label for="fname">7. หากผู้ใช้บริการฝ่าฝืนข้อปฏิบัติและข้อห้ามในการใช้ห้องประชุม เมื่อห้องประชุมหรืออุปกรณ์ต่างๆ ได้รับความเสียหาย หรือสูญหาย ผู้ใช้บริการหรือผู้เกี่ยวข้องต้องรับผิดชอบค่าเสียหายทั้งหมดที่เกิดขึ้นตามจริง</label>
                    <div class="mt-4"></div>
                    <div class="ps-5">
                        <form action="/action_page.php">
                            <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                            <label>ผู้จองสามารถปฏิบัติตามข้อปฏิบัติในการจองห้องประชุมได</label><br>
                            <input type="checkbox" id="vehicle2" name="vehicle2" value="Car">
                            <label>ผู้จองยินยอมรับผิดชอบกรณีที่เกิดความเสียหายจากการไม่ปฏิบัติตามข้อปฏิบัติในการจองห้องประชุมได้</label><br>
                        </form>
                    </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-lg-12 text-center">
                <input type="submit" class="btn btn-success" value="จองห้องประชุม">
                <a href="<?= base_url("profile") ?>" class="btn btn-danger">กลับสู่หน้าหลัก</a>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>