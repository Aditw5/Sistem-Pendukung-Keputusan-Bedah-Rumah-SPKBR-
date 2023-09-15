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
    <form action="<?php echo $action; ?>" method="post">
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Input Data Kriteria</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
	    <div class="box-body">
          <div class="row">
            <div class="col-md-6">
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
	    <a href="<?php echo site_url('kriteria') ?>" class="btn btn-danger">Cancel</a>
	</form>
    </body>
</html>