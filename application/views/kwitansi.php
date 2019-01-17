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
    <div class="print">
      <button class="btn btn-warning" onclick="acprint()"> Print</button>
      <a href="<?php echo base_url('index.php/kwitansi/create') ?>" class="btn btn-primary my-3">Tambah</a>
      <table class="table table-hover">
        <thead>
          <th>No BKU</th>
          <th>Kode Rekening</th>
          <th>No</th>
          <th>Telah Terima Dari</th>
          <th>Uang Sejumlah</th>
          <th>Untuk Pembayaran</th>
          <th>Rp</th>
          <th>Aksi</th>

        </thead>
        <tbody>
          <?php foreach ($kwitansi_list as $key => $value): ?>
            <tr>
              <td><?php echo $value['no_bku'] ?></td>
              <td><?php echo $value['kode_rek'] ?></td>
              <td><?php echo $value['no'] ?></td>
              <td><?php echo $value['dari'] ?></td>
              <td><?php echo $value['sejumlah'] ?></td>
              <td><?php echo $value['untuk']?></td>
              <td><?php echo $value['rp']?></td>
              <td>
                <a href="<?php echo base_url("index.php/kwitansi/update/".$value['id']) ?>" class="btn btn-sm btn-success">Edit</a>
                <a href="<?php echo base_url("index.php/kwitansi/deleteData/".$value['id']) ?>" class="btn btn-sm btn-danger">Hapus</a>
              </td>
            </tr>
            
          <?php endforeach ?>
        </tbody>
      </table>
       </div>
  <script type="text/javascript">
    function acprint(){
      window.print();
    }
  </script>
    </main>
