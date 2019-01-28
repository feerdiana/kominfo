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
                    <li class="breadcrumb-item"><a href="<?=base_url()?>apps/instansi">Instansi</a></li>
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
                <h4 class="modal-title">Tambah Instansi</h4>
            </div>
            <div class="modal-body form-horizontal">
                <div class="form-group">
                    <label class="control-label col-sm-2">Nama :</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="nama">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Tempat :</label>
                    <div class="col-sm-9">
                        <select class="form-control" id="tempat">
                            <option value="Luar">Luar Daerah</option>
                            <option value="Dalam">Dalam Daerah</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Alamat :</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="alamat">
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
                    var nama = $('#nama').val();
                    var tempat = $('#tempat').val();
                    var alamat = $('#alamat').val();
                    var is_active = $('#is_active').val();
                    if(nama==''){
                        $.notify('nama is required', "warn");
                    }else if(tempat==''){
                        $.notify('tempat is required', "warn");
                    }else if(alamat==''){
                        $.notify('alamat is required', "warn");
                    }else{
                        $.ajax({
                            type:"POST",
                            url:"<?=base_url()?>apps/saveInstansi",
                            data:{nama:nama, tempat:tempat,alamat:alamat,is_active:is_active},
                            cache:false,
                            success:function(a){
                                if(a=='failed'){
                                    $.notify('failed to save data', "warn");
                                }else if(a=='available'){
                                    $.notify('nama is already used', "warn");
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
                                <th>Nama</th>
                                <th>Tempat</th>
                                <th>Alamat</th>
                                <th class="text-center">status</th>
                                <th class="text-center">opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $instansi = $this->db->from('__instansi')->get();?>
                            <?php $no = 0;foreach($instansi->result() as $row){ $no++;?>
                            <tr>
                                <td><?=$no?></td>
                                <td><?=$row->nama?></td>
                                <td><?=$row->tempat?></td>
                                <td><?=$row->alamat?></td>
                                <td class="text-center">
                                    <?php if($row->is_active==1){?>
                                        <span class="label label-info">Aktif</span>
                                    <?php }else{?>
                                        <span class="label label-danger">Non aktif</span>
                                    <?php }?>
                                </td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target=".editData<?=$row->id_instansi?>"><i class="glyphicon glyphicon-edit"></i></button><br><br>
                                    <!-- Modal -->
                                    <div class="modal fade editData<?=$row->id_instansi?>" role="dialog">
                                        <div class="modal-dialog">
                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Edit Petugas</h4>
                                                </div>
                                                <div class="modal-body form-horizontal">
                                                    <form id="form<?=$row->id_instansi?>">
                                                    <div class="form-group">
                                                        <label class="control-label col-sm-2">Nama :</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="nama<?=$row->id_instansi?>" value="<?=$row->nama?>">
                                                            <input type="hidden" class="form-control" id="nama_old<?=$row->id_instansi?>" value="<?=$row->nama?>">
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label class="control-label col-sm-2">Tempat :</label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control" id="tempat<?=$row->id_instansi?>">
                                                                <option value="Luar" <?=select($row->tempat,'Luar')?>>Luar Daerah</option>
                                                                <option value="Dalam" <?=select($row->tempat,'Dalam')?>>Dalam Daerah</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-sm-2">Alamat :</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="alamat<?=$row->id_instansi?>" value="<?=$row->alamat?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-sm-2">Status :</label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control" id="is_active<?=$row->id_instansi?>">
                                                                <option value="1" <?=select($row->is_active,1)?>>Aktif</option>
                                                                <option value="0" <?=select($row->is_active,0)?>>Non aktif</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <button type="button" onclick="edit('<?=$row->id_instansi?>')" class="btn btn-primary">Simpan</button>
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
  <script src="<?=base_url()?>public/summernote/summernote.js"></script>
<script>
$(document).ready(function() {
    $('.datatables').DataTable();
});
</script>
<script>
    function edit(row){
        if($('#nama'+row).val()==''){
            $.notify('nama is required', "warn");
        }else if($('#tempat'+row).val()==''){
            $.notify('tempat is required', "warn");
        }else if($('#alamat'+row).val()==''){
            $.notify('alamat is required', "warn");
        }else{
            var is_active = $('#is_active'+row).prop('selectedIndex');
            var data = new FormData();
            data.append('id_instansi',row);
            data.append('nama_old',$('#nama_old'+row).val());
            data.append('nama',$('#nama'+row).val());
            data.append('tempat',$('#tempat'+row).val());
            data.append('alamat',$('#alamat'+row).val());
            data.append('is_active',$('#is_active'+row).val());
            $.ajax({
                type:"POST",
                url:"<?=base_url()?>apps/saveInstansi",
                processData: false,
                data: data,
                contentType: false,
                cache:false,
                success:function(a){
                    if(a=='failed'){
                        $.notify('failed to save data', "warn");
                    }else if(a=='available'){
                        $.notify('nama is already used', "warn");
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