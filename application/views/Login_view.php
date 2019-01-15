<!DOCTYPE html>
<html lang="">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Feerdiana</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>


    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <nav class="navbar navbar-default" role="navigation">
          <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">Authentikasi Multilevel</a>
            </div>
        
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
              <!-- <ul class="nav navbar-nav ">
                <li class="active"> <a href="<?= base_url('index.php'); ?>">Login</a></li>
              </ul> -->
              <ul class="nav navbar-nav navbar-right ">
                 <li ><a href="#"><i class="glyphicon glyphicon-user"></i></a></li>
              </ul>
            </div><!-- /.navbar-collapse -->
              
        </nav>
<div class="container text-center">
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <?php echo form_open('login/cekLogin') ?>
    <div class="form-group">
      <legend>Log in </legend>
    </div>

    <?php echo validation_errors(); ?>
    <div class="form-group">
      <label for="">Username</label>
      <input type="text" class="form-control" id="username" name="username" placeholder="Input field">

    </div>

    <div class="form-group">
      <label for="">Password</label>
      <input type="Password" class="form-control" id="password" name="password" placeholder="Input field">
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    <div class="form-group">
    <a href="<?php echo base_url('index.php/Login/register') ?>" >Belum Memiliki Akun?</a>
    </div>
  </div>
</div>

<style>
  .form-group {
  width: 100%;
  max-width: 330px;
  padding: 15px;
  margin: auto;
}
.form-group .checkbox {
  font-weight: 400;
}
.form-group {
  position: relative;
  box-sizing: border-box;
  height: auto;
  padding: 10px;
  font-size: 16px;
}

</style>