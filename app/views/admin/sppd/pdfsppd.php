
<style>
.header, .footer {position: fixed;width:100%;}
p{font-size:14px;}
td{font-size:14px;line-height: 25px; }
table {border-collapse: collapse;}
.border{border: 1px solid black;font-size:10px;}
.center{ text-align:center;}
.footer { position: fixed; bottom: 0px; text-align:right;font-size:14px; }
.pagenum:before {counter-increment: pages; 
/* content: counter(page) */
 }
.page{page-break-after: always;}
@page { margin-left: 100px; margin-right: 100px; }
    .header { position: fixed; height: 65px; top: -70px;}
    .break-before { page-break-before: always; }
    .section { margin-top: 200px; }
@media print {
  footer {page-break-after: always;}
  .header { position: fixed; height: 65px; top: -70px;}
    .break-before { page-break-before: always; }
    .section { margin-top: 200px; }
}
</style>
<?php $idsppd = explode(',', $this->input->get('sppd'));?>
<?php $sppd = $this->db->from('__sppd AS A')->join('__spt AS B','B.id_spt = A.id_spt')->join('__instansi AS C','C.id_instansi = B.id_instansi')->where_in('A.id_sppd',$idsppd)->get();?>
<?php $no=1; foreach ($sppd->result() as $key) { ?>

<div class="" style="top: -70px;">
    <table style="width:100%; border-collapse: collapse;">
        <tr>
            <th style="width:100%;text-align: center;"><h3>LAPORAN PERJALANAN DINAS DALAM DAERAH<br><br><?=$key->nama.' di '.$key->alamat;?><br><hr></h3></th>
        </tr>
    </table>
</div>
<div class="footer"><span class="pagenum"></span></div>
<div class="body">
<strong><p class="center"><?=' NOMOR SPT : '.$key->nomor?></p></strong>
  <table style="width:100%;">
    <tr>
      <td style="vertical-align:top;">DASAR</td>
      <td style="width:3%; vertical-align:top;">:</td>
      <td style="width:75%; vertical-align:top;"><?=$key->dasar?></td>
    </tr>
    <tr>
      <td style="vertical-align:top;">MAKSUD</td>
      <td style="vertical-align:top;">:</td>
      <td style="vertical-align:top;"><?=$key->keperluan?></td>
    </tr>
    <tr>
      <td style="vertical-align:top;">TUJUAN</td>
      <td style="vertical-align:top;">:</td>
      <td style="vertical-align:top;"><?=$key->nama.' di '.$key->alamat;?></td>
    </tr>
    <tr>
      <td style="vertical-align:top;">TANGGAL</td>
      <td style="vertical-align:top;">:</td>
      <td style="vertical-align:top;"><?=date_long($key->tanggal)?></td>
    </tr>
    <tr>
      <td style="vertical-align:top;">PETUGAS</td>
      <td style="vertical-align:top;">:</td>
	  <?php $petugas =  $this->db->from('__spt_petugas AS A')->join('__petugas AS B','B.id_petugas = A.id_petugas')->where('id_spt',$key->id_spt)->get()?>
      <td style="vertical-align:top;">
	  	<?php foreach($petugas->result() as $pet){
			  echo '- '.$pet->nama.'<br>';
		  }?>
	  </td>
    </tr>
	
    <tr>
      <td style="vertical-align:top;">HASIL</td>
      <td style="vertical-align:top;">:</td>
      <td style="vertical-align:top;"><?=$key->hasil?></td>
    </tr>
  </table>
</div>
  <?php if($no<$sppd->num_rows()){ ?>
    <div style="counter-increment: page -<?=$no?>" class="page"></div>
  <?php }?>
<?php $no++; }?>
<script>
window.onload = window.print
</script>