<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Bobot Read</h2>
        <table class="table">
	    <tr><td>Nama Kriteria</td><td><?php echo $id_kriteria; ?></td></tr>
	    <tr><td>Nama Subkriteria</td><td><?php echo $id_subkriteria; ?></td></tr>
	    <tr><td>Nilai Bobot</td><td><?php echo $nilai_bobot; ?></td></tr>
	    <tr><td>Keterangan</td><td><?php echo $keterangan; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('bobot') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>