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
          <li >
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
    <div class="print">
      <button class="btn btn-warning" onclick="window.open(' <?php echo base_url() ?>index.php/Sppd/print').print()"> Print</button>
      <a href="<?php echo base_url('index.php/Sppd/create') ?>" class="btn btn-primary my-3">Tambah</a>
       <a href="<?php echo base_url("index.php/Sppd/generate_to_pdf") ?>"><button type="button" class="btn btn-danger">Save As PDF</button></a>
      <a href="<?php echo base_url("index.php/Sppd/generate_to_excel") ?>"><button type="button" class="btn btn-success">Save As Excel</button></a>
      <table class="table table-hover">
        <thead>
          <th>Nama Pegawai</th>
          <th>Pangkat / Gol. Ruang</th>
          <th>Jabatan</th>
          <th>Maksud Perj. Dinas</th>
          <th>Tempat Berangkat</th>
          <th>Tempat Tujuan</th>
          <th>Tanggal Berangkat</th>
          <th>Tanggal Kembali</th>
          <th>Instansi</th>
          <th>Kode Rekening</th>
          <th>Aksi</th>

        </thead>
        <tbody>
          <?php foreach ($sppd_list as $key => $value): ?>
            <tr>
              <td><?php echo $value['nama'] ?></td>
              <td><?php echo $value['pangkat'] ?></td>
              <td><?php echo $value['jabatan'] ?></td>
              <td><?php echo $value['maksud'] ?></td>
              <td><?php echo $value['tmp_berangkat'] ?></td>
              <td><?php echo $value['tmp_tujuan'] ?></td>
              <td><?php echo $value['tgl_berangkat'] ?></td>
              <td><?php echo $value['tgl_kembali'] ?></td>
              <td><?php echo $value['instansi'] ?></td>
              <td><?php echo $value['rekening'] ?></td>
              <td>
                <a href="<?php echo base_url("index.php/Sppd/update/".$value['id']) ?>" class="btn btn-sm btn-success">Edit</a>
                <a href="<?php echo base_url("index.php/Sppd/deleteData/".$value['id']) ?>" class="btn btn-sm btn-danger">Hapus</a>
              </td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
       </div>