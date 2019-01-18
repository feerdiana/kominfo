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
            <li><a class="nav-link" href="<?php echo site_url()?>/Home">HOME<span class="sr-only">(current)</span></a></li>
          <li class="nav-item active">
            <a class="nav-link" href="<?php echo base_url() ?>index.php/spt">SPT</a> 
          </li>
          <li >
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
  <main role="main" class="container">
    <div class="jumbotron">
  <!-- <div class="jumbotron"> -->
  <h1 class="display">Perihal : <?php echo $spt[0]->perihal ?></h1>
  <p class="lead">No Surat : <?php echo $spt[0]->no_surat ?></p>
  <button class="btn btn-warning" onclick="window.open(' <?php echo base_url() ?>index.php/Petugas/print').print()"> Print</button>
  <a href="<?php echo base_url("index.php/Petugas/create/".$idPegawai) ?>" class="btn btn-primary">Tambah data</a>
  <a href="<?php echo base_url("index.php/Petugas/generate_to_pdf") ?>"><button type="button" class="btn btn-danger">Save As PDF</button></a>
      <a href="<?php echo base_url("index.php/Petugas/generate_to_excel") ?>"><button type="button" class="btn btn-success">Save As Excel</button></a>
  </div>


<h1>Detail Petugas</h1>
<table class="table">
  <thead>
    <th>Nama Petugas</th>
    <th>NIP</th>
    <th>Pangkat</th>
    <th>Jabatan</th>
    <th>Aksi</th>
  </thead>
  <tbody>
    <?php foreach ($petugas_list as  $key => $value): ?>
      <tr>
        <td><?php echo $value['nama_petugas'] ?></td>
        <td><?php echo $value['nip'] ?></td>
        <td><?php echo $value['pangkat'] ?></td>
        <td><?php echo $value['jabatan'] ?></td>
        <td>
          <a href="<?php echo base_url("index.php/Petugas/update/".$idPegawai."/".$value['id_petugas']) ?>" class="btn btn-sm btn-success">Edit</a>
          <a href="<?php echo base_url("index.php/Petugas/deleteData/".$idPegawai."/".$value['id_petugas']) ?>" class="btn btn-sm btn-danger">Hapus</a>
        </td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>
</div>
 </div>
  </script>
</main>  
    <?php 
        $this->load->view('footer');
     ?>
  