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

  <div class="print">
    <button class="btn btn-warning" onclick="window.open(' <?php echo base_url() ?>index.php/spt/print').print()"> Print</button>
      <a href="<?php echo base_url('index.php/spt/create') ?>" class="btn btn-primary my-3">Tambah</a>
      <a href="<?php echo base_url("index.php/spt/generate_to_pdf") ?>"><button type="button" class="btn btn-danger">Save As PDF</button></a>
      <a href="<?php echo base_url("index.php/spt/generate_to_excel") ?>"><button type="button" class="btn btn-success">Save As Excel</button></a>
      <table class="table table-hover">
        <thead>
          <th>No Surat</th>
          <th>Perihal</th>
          <th>Tanggal</th>
          <th>Petugas</th>
          <th>Tujuan</th>
          <th>Hasil</th>
          <th>Aksi</th>

        </thead>
        <tbody>
          <?php foreach ($spt_list as $key => $value): ?>
            <tr>
              <td><?php echo $value['no_surat'] ?></td>
              <td><?php echo $value['perihal'] ?></td>
              <td><?php echo $value['tanggal'] ?></td>
              <td><?php echo $value['petugas'] ?></td>
              <td><?php echo $value['tujuan'] ?></td>
              <td><?php echo $value['hasil'] ?></td>
              <td>
                <a href="<?php echo base_url("index.php/spt/update/".$value['id']) ?>" class="btn btn-sm btn-success">Edit</a>
                <a href="<?php echo base_url("index.php/spt/deleteData/".$value['id']) ?>" class="btn btn-sm btn-danger">Hapus</a>
                <a href="<?php echo base_url("index.php/Petugas/ByID/".$value['id']) ?>" class="btn btn-sm btn-info">Info Petugas</a>
              </td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
  </div>