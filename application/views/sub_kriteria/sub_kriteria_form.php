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
          <h3 class="box-title">Input Data Sub Kriteria</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
	    <div class="box-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
            <label for="varchar">Nama Kriteria <?php echo form_error('id_kriteria') ?></label>
            <select name="id_kriteria" class="form-control">
                <option value="" >Nama Kriteria</option>
                <?php if ($list_kriteria):?>
                    <?php foreach ($list_kriteria as $lk):?>
                        <option value="<?php echo $lk->id_kriteria?>"><?php echo $lk->nama_kriteria?></option>
                    <?php endforeach?>
                <?php endif?>
            </select>
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Subkriteria <?php echo form_error('nama_subkriteria') ?></label>
            <input type="text" class="form-control" name="nama_subkriteria" id="nama_subkriteria" placeholder="Nama Subkriteria" value="<?php echo $nama_subkriteria; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Jenis Subkriteria <?php echo form_error('jenis_subkriteria') ?></label>
            <select class="form-control" id="jenis_subkriteria" name="jenis_subkriteria">
                <option value="Core Factor">Core Factor</option>
                <option value="Secondary Factor">Secondary Factor</option>
            </select>
        </div>
        <div class="form-group">
            <label for="varchar">Bobot Maksimal <?php echo form_error('nilai_maks') ?></label>
            <input type="text" class="form-control" name="nilai_maks" id="nilai_maks" placeholder="Bobot Maksimal" value="<?php echo $nilai_maks; ?>" />
        </div>
	    <input type="hidden" name="id_subkriteria" value="<?php echo $id_subkriteria; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('sub_kriteria') ?>" class="btn btn-danger">Cancel</a>
        </div>
	</form>
    </body>
</html>