<?= $this->extend('layouts/admin/header-main') ?>
<?= $this->section('title') ?>Table about meeting room<?= $this->endSection() ?>
<?= $this->section('content') ?>

<div class="row mx-0 px-0 mt-4">
  <div class="col-1 ps-0"></div>
  <div class="col-10">
    <center>
      <div class="container">
        <div class="row">
          <div class="col col-sm-12">
            <div class="alert alert-primary" role="alert">
              <h4>รายงานภาพรวม</h4>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-6 col-sm-3">
            <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
              <div class="card-header">
                <ion-icon name="people-outline"></ion-icon>
                จำนวนผู้สมัคร
              </div>
              <div class="card-body">
                <h5 class="card-title"> 20 </h5>
                <p class="card-text">
                  <a href="https://devbanban.com/?p=4425" class="text-white" style="text-decoration: none;"> คน</a>
                </p>
              </div>
            </div>
          </div>

          <div class="col-6 col-sm-3">
            <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
              <div class="card-header">
                <ion-icon name="cart-outline"></ion-icon>
                จำนวนการจองห้อง
              </div>
              <div class="card-body">
                <h5 class="card-title"> 15 </h5>
                <p class="card-text">
                  <a href="https://devbanban.com/?p=2867" class="text-white" style="text-decoration: none;"> ครั้ง </a>
                </p>
              </div>
            </div>
          </div>
          <div class="col-6 col-sm-3">
            <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
              <div class="card-header">
                <ion-icon name="desktop-outline"></ion-icon>
                จำนวนการจองวันนี้
              </div>
              <div class="card-body">
                <h5 class="card-title"> 0 </h5>
                <p class="card-text">
                  <a href="https://devbanban.com/?p=4425" class="text-white" style="text-decoration: none;"> ครั้ง </a>
                </p>
              </div>
            </div>
          </div>
          <div class="col-6 col-sm-3">
            <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
              <div class="card-header">
                <ion-icon name="cash-outline"></ion-icon>
                จำนวนการจองเดือนนี้
              </div>
              <div class="card-body">
                <h5 class="card-title"> 5 </h5>
                <p class="card-text">
                  <a href="https://devbanban.com/?p=2867" class="text-white" style="text-decoration: none;"> ครั้ง </a>
                </p>
              </div>
            </div>
          </div>
        </div> <!-- //row -->
        <div class="row">
          <div class="col-6 col-sm-3">
            <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
              <div class="card-header">
                <ion-icon name="people-outline"></ion-icon>
                จำนวนการจองปีนี้
              </div>
              <div class="card-body">
                <h5 class="card-title"> 5 </h5>
                <p class="card-text">
                  <a href="https://devbanban.com/?p=4425" class="text-white" style="text-decoration: none;"> ครั้ง </a>
                </p>
              </div>
            </div>
          </div>
          <div class="col-6 col-sm-3">
            <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
              <div class="card-header">
                <ion-icon name="cart-outline"></ion-icon>
                จำนวนการรออนุมัติ
              </div>
              <div class="card-body">
                <h5 class="card-title"> 3 </h5>
                <p class="card-text">
                  <a href="https://devbanban.com/?p=2867" class="text-white" style="text-decoration: none;"> รายการ </a>
                </p>
              </div>
            </div>
          </div>
          <div class="col-6 col-sm-3">
            <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
              <div class="card-header">
                <ion-icon name="desktop-outline"></ion-icon>
                จำนวนการอนุมัติ
              </div>
              <div class="card-body">
                <h5 class="card-title"> 2 </h5>
                <p class="card-text">
                  <a href="https://devbanban.com/?p=4425" class="text-white" style="text-decoration: none;"> รายการ </a>
                </p>
              </div>
            </div>
          </div>
          <div class="col-6 col-sm-3">
            <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
              <div class="card-header">
                <ion-icon name="cash-outline"></ion-icon>
                จำนวนการยกเลิกการจอง
              </div>
              <div class="card-body">
                <h5 class="card-title"> 0 </h5>
                <p class="card-text">
                  <a href="https://devbanban.com/?p=2867" class="text-white" style="text-decoration: none;"> รายการ </a>
                </p>
              </div>
            </div>
          </div>
        </div> <!-- //row -->
        <div class="row">
          <div class="col-sm-12">
            <canvas id="myChart" height="100px"></canvas>
            <script>
              var ctx = document.getElementById("myChart").getContext('2d');
              var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                  labels: ['2023', '2022', '2021', '2020'],
                  datasets: [{
                    label: 'รายงานภาพรวม แยกตามปี (คน)',
                    data: ['1000000', '2500000', '5000000', '3000000'],
                    backgroundColor: [
                      'rgba(255, 99, 132, 0.2)',
                      'rgba(54, 162, 235, 0.2)',
                      'rgba(255, 206, 86, 0.2)',
                      'rgba(75, 192, 192, 0.2)',
                      'rgba(153, 102, 255, 0.2)',
                      'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                      'rgba(255,99,132,1)',
                      'rgba(54, 162, 235, 1)',
                      'rgba(255, 206, 86, 1)',
                      'rgba(75, 192, 192, 1)',
                      'rgba(153, 102, 255, 1)',
                      'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                  }]
                },
                options: {
                  scales: {
                    yAxes: [{
                      ticks: {
                        beginAtZero: true
                      }
                    }]
                  }
                }
              });
            </script>
          </div>
        </div>
      </div>
      <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
      <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  </div>
</div>

<script>
  var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
  var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
  });
</script>

<?= $this->endSection() ?>