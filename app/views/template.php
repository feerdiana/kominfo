<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=$title?> :: Kominfo</title>
    <link rel="icon" type="image/png" href="<?=base_url().'public/img/favicon.ico';?>">
    <link rel="stylesheet" href="<?=base_url()?>public/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url()?>public/dataTables/dataTables.bootstrap.min.css">
    <!-- <link rel="stylesheet" href="<?=base_url()?>public/custom/css/fa.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .footer {
        position: fixed;
        background-color : #FFF;
        width: 100%;
        left: 0;
        bottom: 0;
        text-align: center;
        }
        
        </style>
    </head>
<body>
<nav class="navbar navbar-default">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?=base_url()?>">Kominfo</a>
    </div>
    <!-- Collection of nav links and other content for toggling -->
    <div id="navbarCollapse" class="collapse navbar-collapse">
    <?php if($this->session->userdata('session_id')){?>
        <ul class="nav navbar-nav">
           <li <?php if($title=="Dashboard"){ echo "class='active'"; }?>><a href="<?=base_url()?>">Home</a></li>
           <li <?php if($title=="Petugas"){ echo "class='active'"; }?>><a href="<?=base_url().'apps/petugas'?>">Petugas</a></li>
           <li <?php if($title=="Instansi"){ echo "class='active'"; }?>><a href="<?=base_url().'apps/instansi'?>">Instansi</a></li>
           <li <?php if($title=="SPT"){ echo "class='active'"; }?>><a href="<?=base_url().'apps/spt'?>">SPT</a></li>
           <li <?php if($title=="SPPD"){ echo "class='active'"; }?>><a href="<?=base_url().'apps/sppd'?>">SPPD</a></li>
           <li <?php if($title=="Kwitansi"){ echo "class='active'"; }?>><a href="<?=base_url().'apps/kwitansi'?>">Kwitansi</a></li>
        </ul>
        <?php }?>
        <ul class="nav navbar-nav navbar-right">
            <?php if($this->session->userdata('session_id')){?>
                <li><a href="#"><i class="glyphicon glyphicon-user"></i> <?=$info['user_fullname']?></a></li>
                <li><a href="<?=base_url().'destroY'?>"  onclick="return confirm('Are you sure to Sign Out?'); "><i class="glyphicon glyphicon-log-out"></i> Sign out</a></li>
                <?php }else {?>
                    <li><a href="<?=base_url().'logiN'?>"><i class="glyphicon glyphicon-log-in"></i> Sign in</a></li>
            <?php }?>
        </ul>
    </div>
</nav>
<div class="container">
  <?php $this->load->view($content)?>
</div>
<footer class="footer">
      <div class="container">
          <div class="col-md-12 text-center">&copy; <?=date('Y')?> powered by <strong><a href="#" target="_blank">Kominfo</a></strong></div>
      </div>
    </footer>
</body>
  <!-- <script src="<?=base_url()?>public/bootstrap/js/jquery.js"></script> -->
  <script src="<?=base_url()?>public/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?=base_url()?>public/bootstrap/js/notify.min.js"></script>
</html>