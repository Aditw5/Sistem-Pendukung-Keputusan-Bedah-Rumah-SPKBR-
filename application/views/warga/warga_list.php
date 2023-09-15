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
        <h2 style="margin-top:0px">Data Warga</h2><hr/>
        <div class="row" style="margin-bottom: 10px">
        <?php if ($_SESSION['hak_akses'] == 'A'){
          ?>
            <div class="col-md-4">
                <?php echo anchor(site_url('warga/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <?php
         }
         ?>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('warga/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('warga'); ?>" class="btn btn-default">Reset</a>
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
		<th>Nama</th>
		<th>Tempat Lahir</th>
		<th>Tanggal Lahir</th>
		<th>Jenis Kelamin</th>
		<th>Alamat</th>
		<?php if ($_SESSION['hak_akses'] == 'A'){
          ?><th>Action</th><?php
        }?>
            </tr><?php
            foreach ($warga_data as $warga)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $warga->nama ?></td>
			<td><?php echo $warga->tempat_lahir ?></td>
			<td><?php echo $warga->tanggal_lahir ?></td>
			<td><?php echo $warga->jenis_kelamin ?></td>
			<td><?php echo $warga->alamat ?></td>
			<?php if ($_SESSION['hak_akses'] == 'A'){
          ?><td style="text-align:center" width="200px">
				<?php 
				// echo anchor(site_url('warga/read/'.$warga->id_warga),'Read'); 
				// echo ' | '; 
				echo anchor(site_url('warga/update/'.$warga->id_warga),'<i class="fa fa-edit"></i>', 'class="btn btn-xs btn-warning"  data-toggle="tooltip" title="Edit"'); 
				echo ' | '; 
				echo anchor(site_url('warga/delete/'.$warga->id_warga),'<i class="fa fa-trash"></i>', 'class="btn btn-xs btn-danger"  data-toggle="tooltip" title="Delete"','onclick="javasciprt: return confirm(\'Apakah Anda Yakin ?\')"'); 
				?>
			</td><?php
        }?>
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-danger">Total Record : <?php echo $total_rows ?></a>
		<!-- <?php echo anchor(site_url('warga/excel'), 'Excel', 'class="btn btn-success"'); ?>
		<?php echo anchor(site_url('warga/word'), 'Word', 'class="btn btn-primary"'); ?> -->
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>