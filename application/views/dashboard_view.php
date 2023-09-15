<!DOCTYPE html>
<html lang="en">
<div class="jumbotron text-center">
        <img src="<?php echo base_url()?>assetsU/img/Picture1.png" width="150" height="150" class="rounded-circle"> 
        <h3 style="text-align:center">Selamat Datang di Aplikasi SPK Seleksi Penerimaan Bedah Rumah Dengan Metode Profile Matching</h3>
        <h5 style="text-align:center">Profile matching merupakan salah satu metode sistem pendukung keputusan dengan mengasumsikan bahwa terdapt tingkat variable prediktor yang ideal yang harus dipenuhi oleh subyek yang diteliti, bukannya tingkat minimal yang harus dipenuhi atau dilewati. Metode Profile Matching sangat penting dalam manajemen Sumber Daya Manusia (SDM) dimana terlebih dahulu ditentukan kompetensi (kemampuan) yang dibutuhkan. Proses Profile Matching dalam penelitian ini secara garis besar merupakan proses membandingkan antara kompetensi seorang masyarakat ke dalam kompetensi rumah sehingga dapat diketahui perbedaan kompetensinya (disebut juga gap kompetensi),
           semakin kecil gap yang dihasilkan maka bobot nilainya Semakin besar </h5>
</div>
<?php if ($_SESSION['hak_akses'] == 'A'){
          ?>
<h2>Panduan SPKBDR</h2>
<div class="row">
        <div class="col-md-6">
          <!-- The time line -->
          <ul class="timeline">
            <!-- timeline time label -->
            <li class="time-label">
                  <span class="bg-red">
                    Langkah Pertama
                  </span>
            </li>
            <!-- /.timeline-label -->
            <!-- timeline item -->
            <li>
              <i class="fa fa-group bg-blue"></i>
              <div class="timeline-item">
                <div class="timeline-body">
                  Menginputkan data warga
                </div>
              </div>
              </li>
                 <!-- The time line -->
          <ul class="timeline">
            <!-- timeline time label -->
            <li class="time-label">
                  <span class="bg-red">
                    Langkah Kedua
                  </span>
            </li>
            <!-- /.timeline-label -->
            <!-- timeline item -->
            <li>
              <i class="fa fa-check-square bg-blue"></i>
              <div class="timeline-item">
                <div class="timeline-body">
                 Menginputkan data subkriteria
                </div>
              </div>
              </li>
            <!-- END timeline item -->
            <!-- timeline item -->
          <ul class="timeline">
            <!-- timeline time label -->
            <li class="time-label">
                  <span class="bg-red">
                    Langkah Ketiga
                  </span>
            </li>
            <!-- /.timeline-label -->
            <!-- timeline item -->
            <li>
              <i class="fa fa-check-square bg-blue"></i>
              <div class="timeline-item">
                <div class="timeline-body">
                 Menginputkan data Bobot
                </div>
              </div>
              </li>
            <li>
               <!-- timeline item -->
          <ul class="timeline">
            <!-- timeline time label -->
            <li class="time-label">
                  <span class="bg-red">
                    Langkah Keempat
                  </span>
            </li>
            <!-- /.timeline-label -->
            <!-- timeline item -->
            <li>
              <i class="fa fa-check-square bg-blue"></i>
              <div class="timeline-item">
                <div class="timeline-body">
                 Melakukan penilaian
                </div>
              </div>
              </li>
            <li>
               <!-- timeline item -->
          <ul class="timeline">
            <!-- timeline time label -->
            <li class="time-label">
                  <span class="bg-red">
                    Hasil
                  </span>
            </li>
            <li>
              <i class="fa fa-hourglass bg-blue"></i>
           </div>
           </div>
              <?php
  }?>
  
<head>
</html>