<link href="<?=base_url()?>public/summernote/summernote.css" rel="stylesheet">
<section class="content">
   <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2><?=$title?>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="<?=base_url()?>apps/dashboard"><i class="fa fa-home"></i> Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="<?=base_url()?>apps/spt">SPPD</a></li>
                    <li class="breadcrumb-item active">main</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade createData" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Tambah SPPD</h4>
            </div>
            <div class="modal-body form-horizontal">
                <div class="form-group">
                    <label class="control-label col-sm-3">Nomor SPT :</label>
                    <div class="col-sm-8">
                        <select class="form-control" id="id_spt">
                        <option value="">Pilih nomor SPT</option>
                            <?php $spt =  $this->db->get('__spt')->result()?>
                            <?php foreach($spt as $key){?>
                                <?php $sppd = $this->db->where(array('id_spt'=>$key->id_spt))->get('__sppd')->num_rows()?>
                                <?php if($sppd==0){?>
                                    <option value="<?=$key->id_spt?>"><?=$key->nomor?></option>
                                <?php }?>
                            <?php }?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Kendaraan :</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="angkutan">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Tempat Berangkat :</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="tempat_berangkat" value="Tulungagung">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Lama perjalanan :</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="lama_perjalanan">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Tanggal Berangkat :</label>
                    <div class="col-sm-8">
                        <input type="date" class="form-control" id="tanggal_berangkat">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Tanggal Kembali :</label>
                    <div class="col-sm-8">
                        <input type="date" class="form-control" id="tanggal_kembali">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Catatan :</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" id="catatan"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Hasil :</label>
                    <div class="col-sm-8">
                    <textarea class="summernote" id="hasil"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" onclick="tambah()" class="btn btn-primary">Simpan</button>
            </div>
            <script src="<?=base_url()?>public/bootstrap/js/jquery.js"></script>
            <script>
                function tambah(){
                    var id_spt = $('#id_spt').val();
                    var angkutan = $('#angkutan').val();
                    var tempat_berangkat = $('#tempat_berangkat').val();
                    var lama_perjalanan = $('#lama_perjalanan').val();
                    var tanggal_berangkat = $('#tanggal_berangkat').val();
                    var tanggal_kembali = $('#tanggal_kembali').val();
                    var catatan = $('#catatan').val();
                    var hasil = $('#hasil').val();
                    if(id_spt==''){
                        $.notify('Nomor SPT is required', "warn");
                    }else if(angkutan==''){
                        $.notify('angkutan is required', "warn");
                    }else if(tempat_berangkat==''){
                        $.notify('tempat berangkat is required', "warn");
                    }else if(tanggal_berangkat==''){
                        $.notify('tanggal berangkat is required', "warn");
                    }else if(tanggal_kembali==''){
                        $.notify('tanggal kembali is required', "warn");
                    }else{
                        $.ajax({
                            type:"POST",
                            url:"<?=base_url()?>apps/saveSppd",
                            data:{id_spt:id_spt, hasil:hasil,angkutan:angkutan,tempat_berangkat:tempat_berangkat,lama_perjalanan:lama_perjalanan,tanggal_berangkat:tanggal_berangkat,tanggal_kembali:tanggal_kembali,catatan:catatan},
                            cache:false,
                            success:function(a){
                                if(a=='failed'){
                                    $.notify('failed to save data', "warn");
                                }else{
                                    $.notify("Successfully saved data", "success");
                                    setTimeout(function () {
                                        $.notify("Please wait 3 seconds to refresh the page", "info");
                                    }, 2000);
                                    setTimeout(function () {
                                        location.reload();
                                    }, 5000);
                                }
                            },
                            error: function () {
                                $.notify("Refresh this page and try again", "error");
                            }
                        });
                    }
                }
            </script>
        </div>
    </div>
    </div>
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="body">
                        
                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target=".createData"><i class="glyphicon glyphicon-plus"></i> Baru</button>
                    <button type="button" class="btn btn-success btn-sm" onclick="print('print')"><i class="glyphicon glyphicon-print"></i> Cetak</button>
                    <button type="button" class="btn btn-success btn-sm" onclick="print('pdf')"><i class="fa fa-file-pdf-o"></i> PDF</button>
                    <button type="button" class="btn btn-success btn-sm" onclick="print('excel')"><i class="fa fa-file-excel-o"></i> Excel</button><br><br>
                    <table class="table table-striped table-bordered datatables" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>No</th>
                                <th>Nomor SPT</th>
                                <th>Tujuan</th>
                                <th>Jumlah Petugas</th>
                                <th>Berangkat</th>
                                <th>Kembali</th>
                                <th class="text-center">opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $instansi = $this->db->select('A.nomor,A.id_spt,C.*,A.tanggal,B.nama AS nama_instansi, C.tanggal_berangkat,C.tanggal_kembali')->from('__spt AS A')->join('__instansi AS B','B.id_instansi = A.id_instansi')->join('__sppd AS C','C.id_spt = A.id_spt')->order_by('C.id_sppd','ASC')->get();?>
                            <?php $no = 0;foreach($instansi->result() as $row){ $no++;?>
                            <tr>
                                <td class="text-center"><input type="checkbox" class="sppd" name="submit_id" value="<?=$row->id_sppd?>"></td>
                                <td><?=$no?></td>
                                <td><?=$row->nomor?></td>
                                <td><?=$row->nama_instansi?></td>
                                <td><?=$this->db->where('id_spt',$row->id_spt)->get('__spt_petugas')->num_rows()?> petugas</td>
                                <td><?=date_long($row->tanggal_berangkat)?></td>
                                <td><?=date_long($row->tanggal_kembali)?></td>
                                
                                <td class="text-center">
                                    <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target=".editData<?=$row->id_sppd?>"><i class="glyphicon glyphicon-edit"></i></button>
                                    <!-- Modal -->
                                </td>                                   
                                    <div class="modal fade editData<?=$row->id_sppd?>" role="dialog">
                                        <div class="modal-dialog modal-lg">
                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Edit SPT</h4>
                                                </div>
                                                <div class="modal-body form-horizontal">
                                                    <div class="form-group">
                                                        <label class="control-label col-sm-3">Nomor SPT :</label>
                                                        <div class="col-sm-8">
                                                            <select class="form-control" disabled id="id_spt<?=$row->id_sppd?>">
                                                                <?php $spt =  $this->db->where('id_spt',$row->id_spt)->get('__spt')->result()?>
                                                                <?php foreach($spt as $key){?>
                                                                        <option value="<?=$key->id_spt?>"><?=$key->nomor?></option>
                                                                <?php }?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-sm-3">Kendaraan :</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" id="angkutan<?=$row->id_sppd?>" value="<?=$row->angkutan?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-sm-3">Tempat Berangkat :</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" id="tempat_berangkat<?=$row->id_sppd?>" value="<?=$row->tempat_berangkat?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-sm-3">Lama perjalanan :</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" id="lama_perjalanan<?=$row->id_sppd?>" value="<?=$row->lama_perjalanan?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-sm-3">Tanggal Berangkat :</label>
                                                        <div class="col-sm-8">
                                                            <input type="date" class="form-control" id="tanggal_berangkat<?=$row->id_sppd?>" value="<?=$row->tanggal_berangkat?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-sm-3">Tanggal Kembali :</label>
                                                        <div class="col-sm-8">
                                                            <input type="date" class="form-control" id="tanggal_kembali<?=$row->id_sppd?>" value="<?=$row->tanggal_kembali?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-sm-3">Catatan :</label>
                                                        <div class="col-sm-8">
                                                            <textarea class="form-control" id="catatan<?=$row->id_sppd?>"><?=$row->catatan?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-sm-3">Hasil :</label>
                                                        <div class="col-sm-8">
                                                        <textarea class="summernote" id="hasil<?=$row->id_sppd?>"><?=$row->hasil?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <button type="button" onclick="edit('<?=$row->id_sppd?>')" class="btn btn-primary">Simpan</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>

                    </div>
                </div>
            </div>
        </div>
    </div>   
</section>

<script src="<?=base_url()?>public/bootstrap/js/jquery.js"></script>
  <script src="<?=base_url()?>public/dataTables/dataTables.bootstrap.min.js"></script>
  <script src="<?=base_url()?>public/dataTables/jquery.dataTables.min.js"></script>
  <script src="<?=base_url()?>public/summernote/summernote.js"></script>
<script>
$(document).ready(function() {
    $('.datatables').DataTable();
    $('.summernote').summernote();
} );
</script>
<script>
    function edit(row){
        if($('#id_spt'+row).val()==''){
            $.notify('Nomor SPT is required', "warn");
        }else if($('#angkutan'+row).val()==''){
            $.notify('Kendaraan is required', "warn");
        }else if($('#tempat_berangkat'+row).val()==''){
            $.notify('tempat berangkat is required', "warn");
        }else if($('#lama_perjalanan'+row).val()==''){
            $.notify('lama perjalanan is required', "warn");
        }else if($('#tanggal_berangkat'+row).val()==''){
            $.notify('tanggal berangkat is required', "warn");
        }else if($('#tanggal_kembali'+row).val()==''){
            $.notify('tanggal kembali is required', "warn");
        }else{
            var data = new FormData();
            data.append('id_sppd',row);
            data.append('id_spt',$('#id_spt'+row).val());
            data.append('angkutan',$('#angkutan'+row).val());
            data.append('tempat_berangkat',$('#tempat_berangkat'+row).val());
            data.append('lama_perjalanan',$('#lama_perjalanan'+row).val());
            data.append('tanggal_berangkat',$('#tanggal_berangkat'+row).val());
            data.append('tanggal_kembali',$('#tanggal_kembali'+row).val());
            data.append('catatan',$('#catatan'+row).val());
            data.append('hasil',$('#hasil'+row).val());
            $.ajax({
                type:"POST",
                url:"<?=base_url()?>apps/saveSppd",
                processData: false,
                data: data,
                contentType: false,
                cache:false,
                success:function(a){
                    if(a=='failed'){
                        $.notify('failed to save data', "warn");
                    }else{
                        $.notify("Successfully saved data", "success");
                        setTimeout(function () {
                            $.notify("Please wait 3 seconds to refresh the page", "info");
                        }, 2000);
                        setTimeout(function () {
                            location.reload();
                        }, 5000);
                    }
                },
                error: function () {
                    $.notify("Refresh this page and try again", "error");
                }
            });
        }
    }
</script>
<script>
function print(page){
    var countChecked = $('.sppd').filter(':checked').length;
    if(countChecked>0){
        var id_sppd = [];
        $("input[name='submit_id']:checked").each(function(){
            id_sppd.push(this.value);
        });
        $.ajax({
            type:"POST",
            url:"<?=base_url()?>apps/print",
            data:{page:page,id:id_sppd.toString()},
            cache:false,
            success:function(href){
                window.location = href;
            },
            error: function (status) {
                $.notify("Refresh this page and try again", "error");
            }
        });
    }else{
        $.notify('Please mark the item you want to print', "warn");
    }

}
</script>