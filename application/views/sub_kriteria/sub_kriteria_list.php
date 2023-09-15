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
        <h2 style="margin-top:0px">Data Sub Kriteria</h2><hr/>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('sub_kriteria/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('sub_kriteria/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('sub_kriteria'); ?>" class="btn btn-danger">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nama Kriteria</th>
		<th>Nama Subkriteria</th>
		<th>Jenis Subkriteria</th>
        <th>Bobot Maksimal</th>
		<th>Action</th>
            </tr><?php
            foreach ($sub_kriteria_data as $sub_kriteria)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $sub_kriteria->nama_kriteria ?></td>
			<td><?php echo $sub_kriteria->nama_subkriteria ?></td>
			<td><?php echo $sub_kriteria->jenis_subkriteria ?></td>
            <td><?php echo $sub_kriteria->nilai_maks ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				// echo anchor(site_url('sub_kriteria/read/'.$sub_kriteria->id_subkriteria),'Read'); 
				// echo ' | '; 
				echo anchor(site_url('sub_kriteria/update/'.$sub_kriteria->id_subkriteria),'<i class="fa fa-edit"></i>', 'class="btn btn-xs btn-warning"  data-toggle="tooltip" title="Edit"'); 
				echo ' | '; 
				echo anchor(site_url('sub_kriteria/delete/'.$sub_kriteria->id_subkriteria),'<i class="fa fa-trash"></i>', 'class="btn btn-xs btn-danger"  data-toggle="tooltip" title="Delete"','onclick="javasciprt: return confirm(\'Apakah Anda Yakin ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-danger">Total Record : <?php echo $total_rows ?></a>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>