<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: px;
            }
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Hasil Penilaian</h2><hr/>
        <section class="content">
      <div class="box">
        <div class="box-header">
		<!-- <h1 class="box-title">Ketentuan Pembobotan</h1> -->
            <div class="box-body ">
			<div class="pull-right">
			</div>
			</div>
       		 <div class="box-body">
			<table id="table4" class="table table-bordered">
        <!-- <table class="table table-bordered" style="margin-bottom: 10px"> -->
            <tr>
                <th>No</th>
		<th>Nama</th>
		<th>Total CF Rumah</th>
		<!-- <th>Jumlah CF Rumah</th> -->
		<th>Total SF Rumah</th>
        <!-- <th>Jumlah SF Rumah</th> -->
        
        <th>Total CF Pemilik</th>
		<!-- <th>Jumlah CF Pemilik</th> -->
		<th>Total SF Pemilik</th>
        <!-- <th>Jumlah SF Pemilik</th> -->
        <th>Nilai Akhir Rumah</th>
        <th>Nilai Akhir Pemilik</th>
        <th>Nilai Total</th>
        <th>Nilai Total</th>
            </tr><?php
            $count = 1;
            foreach ($hasil_hitung as $penilaian)
            {
                ?>
                <tr>
            <td><?php echo $count ?></td>
			<td><?php echo $penilaian->nama ?></td>
			<td><?php echo $penilaian->total_kriteriacf_rumah ?></td>
			<!-- <td><?php echo $penilaian->jumlah_kriteriacf_rumah ?></td> -->
			<td><?php echo $penilaian->total_kriteriasf_rumah?></td>
            <!-- <td><?php echo $penilaian->jumlah_kriteriasf_rumah?></td> -->

            <td><?php echo $penilaian->total_kriteriacf_pemilik ?></td>
			<!-- <td><?php echo $penilaian->jumlah_kriteriacf_pemilik ?></td> -->
			<td><?php echo $penilaian->total_kriteriasf_pemilik?></td>
            <!-- <td><?php echo $penilaian->jumlah_kriteriasf_pemilik?></td> -->
            <td><?php $nilaiCF1=$penilaian->total_kriteriacf_rumah/$penilaian->jumlah_kriteriacf_rumah * 60/100;
            $nilaiSF1=$penilaian->total_kriteriasf_rumah/$penilaian->jumlah_kriteriasf_rumah * 40/100;
            $total1=$nilaiCF1 + $nilaiSF1;

            echo $total1 * 60/100;
            ?>
        
            </td>
            <td><?php $nilaiCF=$penilaian->total_kriteriacf_pemilik/$penilaian->jumlah_kriteriacf_pemilik * 60/100;
            $nilaiSF=$penilaian->total_kriteriasf_pemilik/$penilaian->jumlah_kriteriasf_pemilik * 40/100;
            $total=$nilaiCF + $nilaiSF;
            echo $total * 40/100;
            ?>
        
            </td>
            <td><?php
            $akhir =($total1 * 60/100) + ($total * 40/100);
            // $max = max($akhir);
            // $bg = '';
            // if($akhir == $max)
            // $bg = "#ffb2ae ";
            //  else
            // $bg = 'ffffff';
            echo $akhir;
            ?></td>
            


		</tr>
            <?php
            ;$count++;
            }
            ?>
        
        </table>
        </div>
		<div>
		<div>
		<div>
        <div class="row">
            <div class="col-md-6">
                <!-- <a href="#" class="btn btn-danger">Total Record : <?php echo $total_rows ?></a> -->
		<?php echo anchor(site_url('penilaian/word'), 'Word', 'class="btn btn-primary"'); ?>
	    </div>
    </body>
</html>