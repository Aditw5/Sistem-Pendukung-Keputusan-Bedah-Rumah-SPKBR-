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
        <h2 style="margin-top:0px">Kriteria Read</h2>
        <table class="table">
	    <tr><td>Nama Kriteria</td><td><?php echo $nama_kriteria; ?></td></tr>
	    <tr><td>Jenis Kriteria</td><td><?php echo $jenis_kriteria; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('kriteria') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>