<?php 
        $this->load->view('header');
     ?>

<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
      <a class="navbar-brand" href="#">KOMINFO</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li >
            <li><a class="nav-link" href="<?php echo site_url()?>/Home">HOME<span class="sr-only">(current)</span></a></li>
          <li >
            <a class="nav-link" href="<?php echo base_url() ?>index.php/spt">SPT</a> 
          </li>
          <li >
            <a class="nav-link" href="<?php echo site_url() ?>/Sppd">SPPD</a></li>
           <LI> <a class="nav-link" href="<?php echo site_url() ?>/Home/gridDinamis">JS GRID</a></LI>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="<?php echo site_url() ?>/kwitansi">KWITANSI</a></li>
        </ul>
        <form class="form-inline mt-2 mt-md-0">
          <a href="<?php echo base_url('index.php/Login/logout') ?>" class="btn btn-secondary my-2 my-sm-0 ml-2">Logout</a>
        </form>
      </div>
    </nav>
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <?php echo form_open_multipart('kwitansi/create'); ?>
      <legend>Tambah Data Kwitansi</legend>
      <?php echo validation_errors(); ?>

      <div class="form-group">
        	 <label for="">No BKU</label>
        <input type="text" class="form-control" name="no_bku" placeholder="Input field">
            <label for="">Kode Rekening</label>
        <input type="text" class="form-control" name="kode_rek" placeholder="Input field">
            <label for="">No</label>
        <input type="number" class="form-control" name="no" placeholder="Input field">
            <label for="">Telah Terima Dari</label>
        <input type="text" class="form-control" name="dari" placeholder="Input field">
            <label for="">Uang Sejumlah</label>
        <input type="text" class="form-control" name="sejumlah" placeholder="Input field">
            <label for="">Untuk Pembayaran</label>
        <textarea type="text" class="form-control" name="untuk" placeholder="Input field"></textarea>
            <label for="">Rp</label>
        <input type="text" class="form-control" name="rp" placeholder="Input field">
           


      </div>
      <button type="submit" class="btn btn-primary">submit</button>
      <?php echo form_close(); ?>
    </div>
