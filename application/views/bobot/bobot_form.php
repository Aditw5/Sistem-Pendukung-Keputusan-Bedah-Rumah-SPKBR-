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
    <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Input Data Bobot</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
	    <div class="box-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
              <form action="<?php echo $action; ?>" method="post">
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
            <label for="varchar">Nama Subkriteria <?php echo form_error('id_subkriteria') ?></label>
            <select name="id_subkriteria" class="form-control">
                <option value="" >Nama Sub Kriteria</option>
                <?php if ($list_subkriteria):?>
                    <?php foreach ($list_subkriteria as $ls):?>
                        <option value="<?php echo $ls->id_subkriteria?>"><?php echo $ls->nama_subkriteria?></option>
                    <?php endforeach?>
                <?php endif?>
            </select>
        </div>
	    <div class="form-group">
            <label for="enum">Nilai Bobot <?php echo form_error('nilai_bobot') ?></label>
            <select class="form-control" id="nilai_bobot" name="nilai_bobot">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
            </select>
        </div>
	    <div class="form-group">
            <label for="keterangan">Keterangan <?php echo form_error('keterangan') ?></label>
            <input  type="text" class="form-control" style="width:400px; height: 100px;" name="keterangan" id="keterangan" placeholder="Keterangan" value="<?php echo $keterangan; ?>" />
        </div>
	    <input type="hidden" name="id_bobot" value="<?php echo $id_bobot; ?>" /> 
        <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('bobot') ?>" class="btn btn-danger">Cancel</a>
	</form>
    </body>
</html>