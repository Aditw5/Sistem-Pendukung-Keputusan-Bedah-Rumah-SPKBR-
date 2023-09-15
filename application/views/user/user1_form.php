<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="./assets/css/bootstrap.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style type="text/css">
         body {
            color: #5c5c5c;
         }
         #mybutton {
            position: relative;
            z-index: 1;
            left: 96%;
            top: -25px;
            cursor: pointer;
         }
         .myform {
            margin-top: 15%;
            background: #fafafa;
            padding: 20px;
            border: 1px solid #f4f4f4;
         }
         .myinput {
            width: 100%;
            padding: 5px;
         }
      </style>

    </head>
    <body>
    <form action="<?php echo $action; ?>" method="post">
    <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Input Data User</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
	    <div class="box-body">
          <div class="row">
            <div class="col-md-6">
	    <div class="form-group">
            <label for="varchar">Username <?php echo form_error('username') ?></label>
            <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>" />
        </div>
	    <!-- <div class="form-group">
            <label for="varchar">Password <?php echo form_error('password') ?></label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>" />
        </div> -->
         <div class="form-group">
         <label for="varchar">Password <?php echo form_error('username') ?></label>
            <input class="myinput" type="password" name="password" value="" id="pass">
            <span id="mybutton" onclick="change()"><i class="glyphicon glyphicon-eye-open"></i></span>
        </div>
	    <div class="form-group">
            <label for="enum">Hak Akses <?php echo form_error('hak_akses') ?></label>
            <select class="form-control" id="hak_akses" name="hak_akses">
                <option value="A">Admnistrator</option>
                <option value="P">Kepala Pelaksana</option>
            </select>
        </div>
	    <input type="hidden" name="id_user1" value="<?php echo $id_user1; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('user') ?>" class="btn btn-danger">Cancel</a>
	</form>
    <script type="text/javascript">
         function change()
         {
            var x = document.getElementById('pass').type;
 
            if (x == 'password')
            {
               document.getElementById('pass').type = 'text';
               document.getElementById('mybutton').innerHTML = '<i class="glyphicon glyphicon-eye-close"></i>';
            }
            else
            {
               document.getElementById('pass').type = 'password';
               document.getElementById('mybutton').innerHTML = '<i class="glyphicon glyphicon-eye-open"></i>';
            }
         }
      </script>
    </body>
</html>