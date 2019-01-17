<style>
.header, .footer {position: fixed;width:100%;}
p{font-size:10px;}
td{font-size:10px;line-height: 15px; }
table {border-collapse: collapse;}
.border{border: 1px solid black;font-size:10px;}
.center{ text-align:center;}
.footer { position: fixed; bottom: 0px; text-align:right;font-size:12px; }
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
    <table style="width:100%; border-collapse: collapse;" border="1">
        <tr>
            <td style="width:25%;text-align: center;"><img src="<?=base_url()?>uploads/mfs.jpg" width="140px" height="40px" alt=""></td>
            <td style="width:50%;text-align: center;"><h4>PURCHASE ORDER</h4></td>
            <td style="width:25%;text-align: center; font-size:10px;">Nomor Dokumen : </td>
        </tr>
    </table>
</div>
<div class="footer"><span class="pagenum"></span></div>
<div class="body">
  <table style="width: 100%;">
	<thead>
		<tbody>
		<?php $spt_list = $this->db->from('spt')->join('petugas','spt.petugas = petugas.id_petugas')->get();
	$no =1; foreach ($spt_list->result() as $key){ ?>
	<tr>
	 <td style="width: 15%;"><b>No Surat</b></td>
	 <td> : </td>
	 <td><?php echo $key->no_surat ?></td>
	</tr>
	<tr>
	 <td><b>Perihal</b></td>
	 <td> : </td>
	 <td><?php echo $key->perihal ?></td>
	</tr>
	<tr>
	 <td><b>Tanggal</b></td>
	 <td> : </td>
	 <td><?php echo date_format(date_create($key->tanggal),"d F Y") ?></td>
	</tr>
	<tr>
	 <td><b>Petugas</b></td>
	 <td> : </td>
	 <td><?php echo $key->nama_petugas ?></td>
	</tr>
	<tr>
	 <td><b>Tujuan</b></td>
	 <td> : </td>
	 <td><?php echo $key->tujuan ?></td>
	</tr>
	<tr>
	 <td><b>Hasil</b></td>
	 <td> : </td>
	 <td><?php echo $key->hasil ?></td>
	</tr>
	</thead>
	
	
	
	<?php $no++; } ?>
	</tbody></table>
</div>
  <?php if($no<$spt_list->num_rows()){ ?>
    <div style="counter-increment: page -<?=$no?>" class="page"></div>
  <?php }?>
