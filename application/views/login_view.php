<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SPK BedahRumah</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/iCheck/square/blue.css">
  <link rel="icon" href="<?php echo base_url()?>assetsU/img/2.png" type="image/gif"> 
  

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <style type="text/css">
         body {
            color: #5c5c5c;
         }
         #mybutton {
            position: relative;
            z-index: 1;
            left: 92%;
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
<body class="hold-transition login-page" style="overflow-y: hidden;background:url(
  '<?php echo base_url('assetsU/img/backround login3.png');?>')no-repeat;background-size:100%">
<div class="login-box">
  <div class="login-logo">
  <!-- <img src="<?php echo base_url()?>assetsU/img/1.jpeg" class="img-responsive img-circle margin-1" style="display:inline" alt="saya" width="200" height="200"><br><br><br> -->
    <a ><b>SPK</b>BedahRumah</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Silahkan Login Terlebih Dahulu</p>
    <?php $pesan = $this->session->flashdata('pesan');?>
        <?php if (isset($pesan)):?>
         <div class="alert-danger">
            <strong>Login Salah!</strong> Username atau Password Anda Salah!.
         </div>
        <?php endif?>

    <form action="<?php echo site_url()?>/login/validasi" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control " placeholder="Username" name="username" >
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div> 

      <div class="form-group has-feedback">
      <input class="form-control" type="password" name="password" placeholder="Password" id="pass">
      <span id="mybutton" onclick="change()"><i class="glyphicon glyphicon-eye-open"></i></span>
        <!-- <input type="password" class="form-control" placeholder="Password" name="password" >
        <span class="glyphicon glyphicon-lock form-control-feedback"></span> -->
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Ingatkan Saya
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

   
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?php echo base_url()?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url()?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url()?>assets/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });

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
