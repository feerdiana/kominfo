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
              <a class="navbar-brand" href="#">CRUD</a>
            </div>
        
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
              <ul class="nav navbar-nav ">
                <li class="active"> <a href="<?= base_url('index.php'); ?>">Daftar Pegawai</a></li>
              </ul>
              <ul class="nav navbar-nav navbar-right ">
                 <li ><a href="#"><i class="glyphicon glyphicon-user"></i>FERDIANA</a></li>
              </ul>
            </div><!-- /.navbar-collapse -->
              
        </nav>

    <main role="main" class="container">
      <a href="<?php echo base_url('index.php/Pegawai/create') ?>" class="btn btn-primary my-3">Tambah</a>
      <table class="table table-hover">
        <thead>
          <th>ID</th>
          <th>Petugas</th>
          <th>No. Surat</th>
          <th>Tanggal</th>
          <th>Perihal</th>
          <th>Tujuan</th>
          <th>Hasil</th>

        </thead>
        <tbody>
          <?php foreach ($pegawai_list as $key => $value): ?>
            <tr>
              <td><?php echo $value['id'] ?></td>
              <td><?php echo $value['nama'] ?></td>
              <td><?php echo $value['nip'] ?></td>
              <td><?php echo $value['tanggalLahir'] ?></td>
              <td><?php echo $value['alamat'] ?></td>
              <td><img src="<?php echo base_url()?>assets/uploads/<?php echo $value['foto']?>" alt="" width=100 height=100></td>
              <td>
                <a href="<?php echo base_url("index.php/Pegawai/update/".$value['id']) ?>" class="btn btn-sm btn-success">Edit</a>
                <a href="<?php echo base_url("index.php/Pegawai/deleteData/".$value['id']) ?>" class="btn btn-sm btn-danger">Hapus</a>
                <a href="<?php echo base_url("index.php/Pendidikan/ByID/".$value['id']) ?>" class="btn btn-sm btn-info">Detail Pendidikan</a>
              </td>
            </tr>
            
          <?php endforeach ?>
        </tbody>
      </table>
    </main>
