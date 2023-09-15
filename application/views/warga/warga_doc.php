<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
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
        <h2>Warga List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nama</th>
		<th>Tempat Lahir</th>
		<th>Tanggal Lahir</th>
		<th>Jenis Kelamin</th>
		<th>Alamat</th>
		
            </tr><?php
            foreach ($warga_data as $warga)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $warga->nama ?></td>
		      <td><?php echo $warga->tempat_lahir ?></td>
		      <td><?php echo $warga->tanggal_lahir ?></td>
		      <td><?php echo $warga->jenis_kelamin ?></td>
		      <td><?php echo $warga->alamat ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>