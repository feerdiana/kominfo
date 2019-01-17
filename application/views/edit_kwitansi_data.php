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

<?php 
	echo "Sukses Simpan Data";

	echo anchor('kwitansi', 'Masukan Data Lagi'); 
?>
