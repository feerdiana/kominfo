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
            <li class="nav-item active"><a class="nav-link" href="<?php echo site_url()?>/Home">HOME<span class="sr-only">(current)</span></a></li>
          <li>
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

    <main role="main" class="container">
      <div class="jumbotron">
        <h1>Selamat Datang</h1>
        <p class="lead">
          <?php 
echo 'Anda Telah Masuk Sebagai, '.$this->session->userdata('logged_in')['username']; ?>
        </p>
      </div>
    </main>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="<?php echo base_url() ?>assets/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

  </body>
</html>

