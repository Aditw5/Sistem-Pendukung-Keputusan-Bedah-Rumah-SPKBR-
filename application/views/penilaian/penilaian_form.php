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
        <!-- SELECT2 EXAMPLE -->
      <form action="<?php echo $action; ?>" method="post">
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Input Data Penilaian</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Nama Warga</label>
                <select name="nama" class="form-control select2" style="width: 100%;">
                <option value="" >---</option>
                <?php if ($list_warga):?>
                    <?php foreach ($list_warga as $lw):?>
                        <option value="<?php echo $lw->id_warga?>"><?php echo $lw->nama?></option>
                    <?php endforeach?>
                <?php endif?>
              </select>
              </div>
        </div>
      </div>
      <div class="box-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">

              <label for="varchar">Nama Kriteria <?php echo form_error('nama_kriteria') ?></label>
            <select name="nama_kriteria" class="form-control">
                <option value="" >---</option>
                <?php if ($list_kriteria):?>
                    <?php foreach ($list_kriteria as $lk):?>
                        <option value="<?php echo $lk->id_kriteria?>"><?php echo $lk->nama_kriteria?></option>
                    <?php endforeach?>
                <?php endif?>
            </select><hr/>

            <label for="varchar">Input Subkriteria <?php echo form_error('nama_subkriteria') ?></label>
            <select name="nama_subkriteria" class="form-control">
                <option value="" >---</option>
                <?php if ($list_subkriteria):?>
                    <?php foreach ($list_subkriteria as $ls):?>
                        <option value="<?php echo $ls->id_subkriteria?>"><?php echo $ls->nama_subkriteria?></option>
                    <?php endforeach?>
                <?php endif?>
            </select><hr/>

            <label for="varchar"> Input Bobot <?php echo form_error('nama_subkriteria') ?></label>
            <select name="nilai_bobot" class="form-control">
                <option value="" >---</option>
                <?php if ($list_bobot):?>
                    <?php foreach ($list_bobot as $lb):?>
                        <option value="<?php echo $lb->nilai_bobot?>"><?php echo $lb->keterangan?></option>
                    <?php endforeach?>
                <?php endif?>
            </select>
           

                  
            <!-- <label for="varchar"> Input Bobot <?php echo form_error('nama_subkriteria') ?></label>
            <input type="radio" name="nilai_bobot" value="" class="form-control"/> 
                <?php if ($list_bobot):?>
                    <?php foreach ($list_bobot as $lb):?>
                        <option value="<?php echo $lb->nilai_bobot?>"><?php echo $lb->keterangan?></option>
                    <?php endforeach?>
                <?php endif?> -->
          </div>
        </div>
      </div>
      <input type="hidden" name="id_penilaian" value="<?php echo $id_penilaian; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('penilaian') ?>" class="btn btn-danger">Cancel</a>
      </form>
    </body>
</html>