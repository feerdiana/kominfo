<style>
.header, .footer {position: fixed;width:100%;}
p{font-size:10px;}
td{font-size:10px;line-height: 15px; }
table {border-collapse: collapse;}
.border{border: 1px solid black;font-size:10px;}
.center{ text-align:center;}
.footer { position: fixed; bottom: 0px; text-align:right;font-size:20px; }
.pagenum:before {counter-increment: pages; 
/* content: counter(page) */
 }
.page{page-break-after: always;}
@page { margin: 100px; }
    .header { position: fixed; height: 65px; top: -70px;}
    .break-before { page-break-before: always; }
    .section { margin-top: 200px; }
    td[rowspan] {
	  vertical-align: top;
	  text-align: left;
	}
</style>
<div class="header">
    <table style="width:100%; border-collapse: collapse;" border="0">
        <tr>
            <td style="width:20%; text-align: center;"><img src="<?=base_url()?>uploads/logo.png" width="80px" height="100px" alt=""></td>
            <td style="width:70%;text-align: center;"><h4>DINAS KOMUNIKASI DAN INFORMATIKA</h4></td>
        </tr>
    </table>
</div>
<br> </br>
<br> </br>
<br> </br>
<div class="footer"><span class="pagenum"></span></div>
<div class="body">
  <table style="width: 100%; ">
	<thead>
		<tbody>
		<?php $sppd_list = $this->db->from('sppd')->get();
	$no =1; foreach ($sppd_list->result() as $key){ ?>
	<tr>
	 <td style="width: 13%; "><b>Nama Pegawai</b></td>
	 <td style="vertical-align: top;"> : </td>
	 <td style="width: 80%;"><?php echo $key->nama ?></td>
	</tr>
	<tr>
	 <td style="vertical-align: top;"><b>Pangkat / Gol. Ruang</b></td>
	 <td style="vertical-align: top;"> : </td>
	 <td style="vertical-align: top;"><?php echo $key->pangkat ?></td>
	</tr>
	<tr>
	 <td style="vertical-align: top;"><b>Jabatan</b></td>
	 <td style="vertical-align: top;"> : </td>
	 <td style="vertical-align: top;"><?php echo $key->jabatan ?></td>
	</tr>
	<tr>
	 <td style="vertical-align: top;"><b>Maksud Perj. Dinas</b></td>
	 <td style="vertical-align: top;"> : </td>
	 <td style="vertical-align: top;"><?php echo $key->maksud ?></td>
	</tr>
	<tr>
	 <td style="vertical-align: top;"><b>Tempat Berangkat</b></td>
	 <td style="vertical-align: top;"> : </td>
	 <td style="vertical-align: top;"><?php echo $key->tmp_berangkat ?></td>
	</tr>
	<tr>
	 <td style="vertical-align: top;"><b>Tempat Tujuan</b></td>
	 <td style="vertical-align: top;"> : </td>
	 <td style="vertical-align: top;"><?php echo $key->tmp_tujuan ?></td>
	</tr>
	<tr>
	 <td style="vertical-align: top;"><b>Tanggal Berangkat</b></td>
	 <td style="vertical-align: top;"> : </td>
	 <td style="vertical-align: top;"><?php echo date_format(date_create($key->tgl_berangkat),"d F Y") ?></td>
	</tr>
	<tr>
	 <td style="vertical-align: top;"><b>Tanggal Kembali</b></td>
	 <td style="vertical-align: top;"> : </td>
	 <td style="vertical-align: top;"><?php echo date_format(date_create($key->tgl_kembali),"d F Y") ?></td>
	</tr>
	<tr>
	 <td style="vertical-align: top;"><b>Instansi</b></td>
	 <td style="vertical-align: top;"> : </td>
	 <td style="vertical-align: top;"><?php echo $key->instansi ?></td>
	</tr>
	<tr>
	 <td style="vertical-align: top;"><b>Kode Rekening</b></td>
	 <td style="vertical-align: top;"> : </td>
	 <td style="vertical-align: top;"><?php echo $key->rekening ?></td>
	</tr>
	</thead>
	
	
	
	<?php $no++; } ?>
	</tbody></table>
</div>
  <?php if($no<$sppd_list->num_rows()){ ?>
    <div style="counter-increment: page -<?=$no?>" class="page"></div>
  <?php }?>
