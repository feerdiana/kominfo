

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
                    <li class="breadcrumb-item"><a href="<?=base_url()?>apps/petugas">Petugas</a></li>
                    <li class="breadcrumb-item active">main</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade createData" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Tambah Petugas</h4>
            </div>
            <div class="modal-body form-horizontal">
                <div class="form-group">
                    <label class="control-label col-sm-2">NIP :</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="nip">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" >Nama :</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="nama">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Pangkat :</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="pangkat">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Jabatan :</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="jabatan">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Status :</label>
                    <div class="col-sm-9">
                        <select class="form-control" id="is_active">
                            <option value="1">Aktif</option>
                            <option value="0">Non aktif</option>
                        </select>
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
                    var nip = $('#nip').val();
                    var nama = $('#nama').val();
                    var pangkat = $('#pangkat').val();
                    var jabatan = $('#jabatan').val();
                    var is_active = $('#is_active').val();
                    if(nip==''){
                        $.notify('NIP is required', "warn");
                    }else if(nama==''){
                        $.notify('Nama is required', "warn");
                    }else if(pangkat==''){
                        $.notify('Pangkat is required', "warn");
                    }else if(jabatan==''){
                        $.notify('Jabatan is required', "warn");
                    }else{
                        $.ajax({
                            type:"POST",
                            url:"<?=base_url()?>apps/savePetugas",
                            data:{nip:nip, nama:nama,pangkat:pangkat,jabatan:jabatan,is_active:is_active},
                            cache:false,
                            success:function(a){
                                if(a=='failed'){
                                    $.notify('failed to save data', "warn");
                                }else if(a=='available'){
                                    $.notify('NIP is already used', "warn");
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
                                <th>NIP</th>
                                <th>Nama</th>
                                <th>Pangkat</th>
                                <th>Jabatan</th>
                                <th class="text-center">status</th>
                                <th class="text-center">opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $petugas = $this->db->from('__petugas')->get();?>
                            <?php $no = 0;foreach($petugas->result() as $row){ $no++;?>
                            <tr>
                                <td><?=$no?></td>
                                <td><?=$row->nip?></td>
                                <td><?=$row->nama?></td>
                                <td><?=$row->pangkat?></td>
                                <td><?=$row->jabatan?></td>
                                <td class="text-center">
                                    <?php if($row->is_active==1){?>
                                        <span class="label label-info">Aktif</span>
                                    <?php }else{?>
                                        <span class="label label-danger">Non aktif</span>
                                    <?php }?>
                                </td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target=".editData<?=$row->id_petugas?>"><i class="glyphicon glyphicon-edit"></i></button><br><br>
                                    <!-- Modal -->
                                    <div class="modal fade editData<?=$row->id_petugas?>" role="dialog">
                                        <div class="modal-dialog">
                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Edit Petugas</h4>
                                                </div>
                                                <div class="modal-body form-horizontal">
                                                    <form id="form<?=$row->id_petugas?>">
                                                    <div class="form-group">
                                                        <label class="control-label col-sm-2">NIP :</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="nip<?=$row->id_petugas?>" value="<?=$row->nip?>">
                                                            <input type="hidden" class="form-control" id="nip_old<?=$row->id_petugas?>" value="<?=$row->nip?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-sm-2" >Nama :</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="nama<?=$row->id_petugas?>" value="<?=$row->nama?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-sm-2">Pangkat :</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="pangkat<?=$row->id_petugas?>" value="<?=$row->pangkat?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-sm-2">Jabatan :</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="jabatan<?=$row->id_petugas?>" value="<?=$row->jabatan?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-sm-2">Status :</label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control" id="is_active<?=$row->id_petugas?>">
                                                                <option value="1" <?=select($row->is_active,1)?>>Aktif</option>
                                                                <option value="0" <?=select($row->is_active,0)?>>Non aktif</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <button type="button" onclick="edit('<?=$row->id_petugas?>')" class="btn btn-primary">Simpan</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
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
<script>
$(document).ready(function() {
    $('.datatables').DataTable();
} );
</script>
<script>
    function edit(row){
        if($('#nip'+row).val()==''){
            $.notify('NIP is required', "warn");
        }else if($('#nama'+row).val()==''){
            $.notify('Nama is required', "warn");
        }else if($('#pangkat'+row).val()==''){
            $.notify('Pangkat is required', "warn");
        }else if($('#jabatan'+row).val()==''){
            $.notify('Jabatan is required', "warn");
        }else{
            var is_active = $('#is_active'+row).prop('selectedIndex');
            var data = new FormData();
            data.append('id_petugas',row);
            data.append('nip_old',$('#nip_old'+row).val());
            data.append('nip',$('#nip'+row).val());
            data.append('nama',$('#nama'+row).val());
            data.append('pangkat',$('#pangkat'+row).val());
            data.append('jabatan',$('#jabatan'+row).val());
            data.append('is_active',$('#is_active'+row).val());
            $.ajax({
                type:"POST",
                url:"<?=base_url()?>apps/savePetugas",
                processData: false,
                data: data,
                contentType: false,
                cache:false,
                success:function(a){
                    if(a=='failed'){
                        $.notify('failed to save data', "warn");
                    }else if(a=='available'){
                        $.notify('NIP is already used', "error");
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