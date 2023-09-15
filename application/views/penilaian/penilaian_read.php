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
        <h2 style="margin-top:0px">Penilaian Read</h2>
        <table class="table">
	    <tr><td>Nama</td><td><?php echo $id_warga; ?></td></tr>
	    <tr><td>Nama Kriteria</td><td><?php echo $id_kriteria; ?></td></tr>
	    <tr><td>Nama Subkriteria</td><td><?php echo $id_subkriteria; ?></td></tr>
	    <tr><td>Nilai Bobot</td><td><?php echo $nilai_bobot; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('penilaian') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>