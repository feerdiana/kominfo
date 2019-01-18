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
<div >
    <table style="width:100%; border-collapse: collapse;" border="0">
        <tr>
            <td style="width:20%; text-align: center;"><img src="<?=base_url()?>uploads/logo.png" width="80px" height="100px" alt=""></td>
            <td style="width:70%;text-align: center;"><h4>DINAS KOMUNIKASI DAN INFORMATIKA</h4></td>
        </tr>
    </table>
</div>
<br> </br>
<div class="footer"><span class="pagenum"></span></div>
<div class="body">
  <table style="width: 100%; ">
	<thead>
		<tbody>
		<?php $kwitansi_list = $this->db->from('kwitansi')->get();
	$no =1; foreach ($kwitansi_list->result() as $key){ ?>
	<tr>
	 <td style="width: 13%; "><b>No BKU</b></td>
	 <td style="vertical-align: top;"> : </td>
	 <td style="width: 80%;"><?php echo $key->no_bku ?></td>
	</tr>
	<tr>
	 <td style="vertical-align: top;"><b>Kode Rekening</b></td>
	 <td style="vertical-align: top;"> : </td>
	 <td style="vertical-align: top;"><?php echo $key->kode_rek ?></td>
	</tr>
	<tr>
	 <td style="vertical-align: top;"><b>No</b></td>
	 <td style="vertical-align: top;"> : </td>
	 <td style="vertical-align: top;"><?php echo $key->no ?></td>
	</tr>
	<tr>
	 <td style="vertical-align: top;"><b>Telah Terima Dari</b></td>
	 <td style="vertical-align: top;"> : </td>
	 <td style="vertical-align: top;"><?php echo $key->dari ?></td>
	</tr>
	<tr>
	 <td style="vertical-align: top;"><b>Uang Sejumlah</b></td>
	 <td style="vertical-align: top;"> : </td>
	 <td style="vertical-align: top;"><?php echo $key->sejumlah ?></td>
	</tr>
	<tr>
	 <td style="vertical-align: top;"><b>Untuk Pembayaran</b></td>
	 <td style="vertical-align: top;"> : </td>
	 <td style="vertical-align: top;"><?php echo $key->untuk ?></td>
	</tr>
	<tr>
	 <td style="vertical-align: top;"><b>Rp</b></td>
	 <td style="vertical-align: top;"> : </td>
	 <td style="vertical-align: top;"><?php echo $key->rp ?></td>
	</tr>
	</thead>
	
	
	
	<?php $no++; } ?>
	</tbody></table>
</div>
  <?php if($no<$kwitansi_list->num_rows()){ ?>
    <div style="counter-increment: page -<?=$no?>" class="page"></div>
  <?php }?>
