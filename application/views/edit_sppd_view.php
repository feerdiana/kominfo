<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="../../../../favicon.ico">

  <title>KOMINFO</title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>

  <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
    <a class="navbar-brand" href="#">KOMINFO</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
            <li><a class="nav-link" href="<?php echo site_url()?>/Home">HOME<span class="sr-only">(current)</span></a></li>
          <li>
            <a class="nav-link" href="<?php echo base_url() ?>index.php/spt">SPT</a> 
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="<?php echo site_url() ?>/Sppd">SPPD</a></li>
           <LI> <a class="nav-link" href="<?php echo site_url() ?>/Home/gridDinamis">JS GRID</a></LI>
          </li>
          <li >
            <a class="nav-link" href="<?php echo site_url() ?>/kwitansi">KWITANSI</a></li>
        </ul>
        <form class="form-inline mt-2 mt-md-0">
          <a href="<?php echo base_url('index.php/Login/logout') ?>" class="btn btn-secondary my-2 my-sm-0 ml-2">Logout</a>
        </form>
      
    </div>
  </nav>
	

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<?php echo form_open('sppd/update/'.$this->uri->segment(3)); ?>
	<legend>Edit Data SPPD</legend>
	<?php echo validation_errors(); ?>
	<div class="form-group">
		<label for="">Nama Pegawai</label>
		<input type="text" class="form-control" name="nama" id="nama" value="<?php echo $sppd[0]->nama ?>" placeholder="Input field">
	</div>
  <div class="form-group">
    <label for="">Pangkat / Gol. Ruang</label>
    <input type="text" class="form-control" name="pangkat" id="pangkat" value="<?php echo $sppd[0]->pangkat ?>" placeholder="Input field">
  </div>
  <div class="form-group">
    <label for="">Jabatan</label>
    <input type="text" class="form-control" name="jabatan" id="jabatan" value="<?php echo $sppd[0]->jabatan ?>" placeholder="Input field">
  </div>
  <div class="form-group">
    <label for="">Maksud Perj. Dinas</label>
    <input type="text" class="form-control" name="maksud" id="maksud" value="<?php echo $sppd[0]->maksud ?>" placeholder="Input field">
  </div>
  <div class="form-group">
    <label for="">Tempat Berangkat</label>
    <input type="text" class="form-control" name="tmp_berangkat" id="tmp_berangkat" value="<?php echo $sppd[0]->tmp_berangkat ?>" placeholder="Input field">
  </div>
  <div class="form-group">
    <label for="">Tempat Tujuan</label>
    <input type="text" class="form-control" name="tmp_tujuan" id="tmp_tujuan" value="<?php echo $sppd[0]->tmp_tujuan ?>" placeholder="Input field">
  </div>
  <div class="form-group">
    <label for="">Tanggal Berangkat</label>
    <input type="date" class="form-control" name="tgl_berangkat" id="tgl_berangkat" value="<?php echo $sppd[0]->tgl_berangkat ?>" placeholder="Input field">
  </div>
  <div class="form-group">
    <label for="">Tanggal Kembali</label>
    <input type="date" class="form-control" name="tgl_kembali" id="tgl_kembali" value="<?php echo $sppd[0]->tgl_kembali ?>" placeholder="Input field">
  </div>
  <div class="form-group">
    <label for="">Instansi</label>
    <input type="text" class="form-control" name="instansi" id="instansi" value="<?php echo $sppd[0]->instansi ?>" placeholder="Input field">
  </div>
		<div class="form-group">
		<label for="">Kode Rekening</label>
		<input type="text" class="form-control" name="rekening" id="rekening" value="<?php echo $sppd[0]->rekening ?>" placeholder="Input field">
	</div>
	<button type="submit" class="btn btn-primary">Submit</button>
	<?php echo form_close(); ?>
</div>



  <!-- Bootstrap core JavaScript
      ================================================== -->
      <!-- Placed at the end of the document so the pages load faster -->
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
    </html>
