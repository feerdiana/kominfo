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
                    <li class="breadcrumb-item"><a href="<?=base_url()?>apps/dashboard"><i class="zmdi zmdi-home"></i> Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="<?=base_url()?>apps/spt">SPT</a></li>
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
                <h4 class="modal-title">Tambah SPT</h4>
            </div>
            <div class="modal-body form-horizontal">
                <div class="form-group">
                    <label class="control-label col-sm-2">Nomor :</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="nomor">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Dasar :</label>
                    <div class="col-sm-9">
                    <textarea class="summernote" id="dasar"></textarea>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-sm-2">Tujuan :</label>
                    <div class="col-sm-9">
                        <select class="form-control" id="id_instansi">
                            <?php $ins =  $this->db->where('is_active',1)->get('__instansi')->result()?>
                            <?php foreach($ins as $key){?>
                                <option value="<?=$key->id_instansi?>"><?=$key->nama?></option>
                            <?php }?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Tanggal :</label>
                    <div class="col-sm-9">
                        <input type="date" class="form-control" id="tanggal">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Keperluan :</label>
                    <div class="col-sm-9">
                    <textarea class="summernote" id="keperluan"></textarea>
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
                    var nomor = $('#nomor').val();
                    var dasar = $('#dasar').val();
                    var id_instansi = $('#id_instansi').val();
                    var tanggal = $('#tanggal').val();
                    var keperluan = $('#keperluan').val();
                    if(nomor==''){
                        $.notify('Nomor is required', "warn");
                    }else if(dasar==''){
                        $.notify('Dasar is required', "warn");
                    }else if(id_instansi==''){
                        $.notify('instansi is required', "warn");
                    }else if(tanggal==''){
                        $.notify('Tanggal is required', "warn");
                    }else if(keperluan==''){
                        $.notify('Keperluan is required', "warn");
                    }else{
                        $.ajax({
                            type:"POST",
                            url:"<?=base_url()?>apps/saveSpt",
                            data:{nomor:nomor, dasar:dasar,id_instansi:id_instansi,tanggal:tanggal,keperluan:keperluan},
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
                        
                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target=".createData"><i class="glyphicon glyphicon-plus"></i> Baru</button><br><br>
                    <table class="table table-striped table-bordered datatables" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nomor</th>
                                <th>Tujuan</th>
                                <th>Jumlah Petugas</th>
                                <th>Tanggal</th>
                                <th class="text-center">opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $instansi = $this->db->select('A.*,id_spt,B.nama AS nama_instansi')->from('__spt AS A')->join('__instansi AS B','B.id_instansi = A.id_instansi')->order_by('A.id_spt','ASC')->get();?>
                            <?php $no = 0;foreach($instansi->result() as $row){ $no++;?>
                            <tr>
                                <td><?=$no?></td>
                                <td><?=$row->nomor?></td>
                                <td><?=$row->nama_instansi?></td>
                                <td><?=$this->db->where('id_spt',$row->id_spt)->get('__spt_petugas')->num_rows()?> petugas</td>
                                <td><?=date_long($row->tanggal)?></td>
                                
                                <td class="text-center">
                                    <a href="<?=base_url()?>apps/spt?id=<?=en($row->id_spt)?>" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-user"></i></a>
                                    <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target=".editData<?=$row->id_spt?>"><i class="glyphicon glyphicon-edit"></i></button>
                                </td>
                                    
                                    <!-- Modal -->
                                    <div class="modal fade editData<?=$row->id_spt?>" role="dialog">
                                        <div class="modal-dialog modal-lg">
                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Edit SPT</h4>
                                                </div>
                                                <div class="modal-body form-horizontal">
                                                    <div class="form-group">
                                                        <label class="control-label col-sm-2">Nomor :</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="nomor<?=$row->id_spt?>" value="<?=$row->nomor?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-sm-2">Dasar :</label>
                                                        <div class="col-sm-9">
                                                        <textarea class="summernote" id="dasar<?=$row->id_spt?>"><?=$row->dasar?></textarea>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label class="control-label col-sm-2">Tujuan :</label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control" id="id_instansi<?=$row->id_spt?>">
                                                                <?php $ins =  $this->db->where('is_active',1)->get('__instansi')->result()?>
                                                                <?php foreach($ins as $key){?>
                                                                    <option value="<?=$key->id_instansi?>" <?=select($key->id_instansi,$row->id_instansi)?>><?=$key->nama?></option>
                                                                <?php }?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-sm-2">Tanggal :</label>
                                                        <div class="col-sm-9">
                                                            <input type="date" class="form-control" id="tanggal<?=$row->id_spt?>"  value="<?=$row->tanggal?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-sm-2">Keperluan :</label>
                                                        <div class="col-sm-9">
                                                        <textarea class="summernote" id="keperluan<?=$row->id_spt?>"><?=$row->keperluan?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <button type="button" onclick="edit('<?=$row->id_spt?>')" class="btn btn-primary">Simpan</button>
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
        if($('#nomor'+row).val()==''){
            $.notify('nomor is required', "warn");
        }else if($('#dasar'+row).val()==''){
            $.notify('dasar is required', "warn");
        }else if($('#id_instansi'+row).val()==''){
            $.notify('tanggal is required', "warn");
        }else if($('#tanggal'+row).val()==''){
            $.notify('tanggal is required', "warn");
        }else if($('#keperluan'+row).val()==''){
            $.notify('keperluan is required', "warn");
        }else{
            var data = new FormData();
            data.append('id_spt',row);
            data.append('nomor',$('#nomor'+row).val());
            data.append('dasar',$('#dasar'+row).val());
            data.append('id_instansi',$('#id_instansi'+row).val());
            data.append('tanggal',$('#tanggal'+row).val());
            data.append('keperluan',$('#keperluan'+row).val());
            $.ajax({
                type:"POST",
                url:"<?=base_url()?>apps/saveSpt",
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