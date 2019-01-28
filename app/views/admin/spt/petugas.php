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
                    <li class="breadcrumb-item active">Petugas</li>
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
                    <label class="control-label col-sm-2">Petugas :</label>
                    <div class="col-sm-9">
                        <input type="hidden" id="id_spt" value="<?=de($this->input->get('id'))?>">
                        <select class="form-control" id="id_petugas">
                            <?php $pet =  $this->db->where('is_active',1)->get('__petugas')->result()?>
                            <?php foreach($pet as $key){?>
                                <?php $sptpet = $this->db->where(array('id_petugas'=>$key->id_petugas,'id_spt'=>de($this->input->get('id'))))->get('__spt_petugas')->num_rows()?>
                                <?php if($sptpet==0){?>
                                    <option value="<?=$key->id_petugas?>"><?=$key->nama?></option>
                                <?php }?>
                            <?php }?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" onclick="tambah('<?=$this->input->get('id')?>')" class="btn btn-primary">Simpan</button>
            </div>
            <script src="<?=base_url()?>public/bootstrap/js/jquery.js"></script>
            <script>
                function tambah(){
                    var id_spt = $('#id_spt').val();
                    var id_petugas = $('#id_petugas').val();
                    if(id_petugas==''){
                        $.notify('Petugas is required', "warn");
                    }else{
                        $.ajax({
                            type:"POST",
                            url:"<?=base_url()?>apps/savePetugasSpt",
                            data:{id_spt:id_spt, id_petugas:id_petugas},
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
                                <th>NIP</th>
                                <th>Nama</th>
                                <th class="text-center">opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $instansi = $this->db->from('__spt_petugas AS A')->join('__petugas AS B','B.id_petugas = A.id_petugas')->where('id_spt',de($this->input->get('id')))->get();?>
                            <?php $no = 0;foreach($instansi->result() as $row){ $no++;?>
                            <tr>
                                <td><?=$no?></td>
                                <td><?=$row->nip?></td>
                                <td><?=$row->nama?></td>
                                <td class="text-center">
                                    <a href="<?=base_url()?>apps/deletesptpetugas?id=<?=en($row->id_spt_pet)?>&spt=<?=$this->input->get('id')?>" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash"></i></a>
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