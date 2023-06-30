<?= $this->extend('layouts/user/header-main') ?>
<?= $this->section('title') ?>Home Page<?= $this->endSection() ?>
<?= $this->section('header-content') ?>
<center>
<div class="container"> <div class="row mt-4"></div>
<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="<?= base_url("images/1.png"); ?>" class="d-block w-70" alt="<?= base_url("images/1.png"); ?>">
    </div>
    <div class="carousel-item">
      <img src="<?= base_url("images/2.png"); ?>" class="d-block w-70" alt="<?= base_url("images/1.png"); ?>">
    </div>
    <div class="carousel-item">
      <img src="<?= base_url("images/3.png"); ?>" class="d-block w-70" alt="<?= base_url("images/1.png"); ?>">
    </div>
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
</center>
<?= $this->endSection() ?>     