<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Kriteria <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nama Kriteria <?php echo form_error('nama_kriteria') ?></label>
            <input type="text" class="form-control" name="nama_kriteria" id="nama_kriteria" placeholder="Nama Kriteria" value="<?php echo $nama_kriteria; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Jenis Kriteria <?php echo form_error('jenis_kriteria') ?></label>
            <select class="form-control" id="jenis_kriteria" name="jenis_kriteria">
                <option value="Core Factor">Core Factor</option>
                <option value="Secondary Factor">Secondary Factor</option>
            </select>
        </div>
	    <input type="hidden" name="id_kriteria" value="<?php echo $id_kriteria; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('kriteria') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>