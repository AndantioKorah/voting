<?php if($result){ ?>
    <div class="col-lg-12 table-responsive">
        <table class="table table-hover datatable">
            <thead>
                <th class="text-center">No</th>
                <th class="text-left">Nama KIB</th>
                <th class="text-center">Kode KIB</th>
                <th class="text-center">Keterangan</th>
                <th class="text-center">Pilihan</th>
            </thead>
            <tbody>
                <?php $no=1; foreach($result as $rs){ ?>
                    <tr>
                        <td class="text-center"><?=$no++;?></td>
                        <td class="text-left"><span id="nama_kib_<?=$rs['id']?>"><?=$rs['nama_kib']?></span></td>
                        <td class="text-center"><span id="kode_kib_<?=$rs['id']?>"><?=$rs['kode_kib']?></span></td>
                        <td class="text-center"><span id="keterangan_<?=$rs['id']?>"><?=$rs['keterangan']?></span></td>
                        <td class="text-center">
                            <button data-toggle="modal" href="#edit_data_kib" style="color: white;" onclick="editKib('<?=$rs['id']?>')" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</button>
                            <button id="btn_delete_<?=$rs['id']?>" onclick="deleteKib('<?=$rs['id']?>')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</button>
                            <button style="display: none;" id="btn_loading_<?=$rs['id']?>" disabled class="btn btn-danger btn-sm"><i class="fa fa-spin fa-spinner"></i> Loading...</button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <script>
        $(function(){
            $('.datatable').dataTable()
        })

        function editKib(id){
            $('#edit_data_kib_content').html('')
            $('#edit_data_kib_content').append(divLoaderNavy)
            $('#edit_data_kib_content').load('<?=base_url("master/C_Master/loadDataKibById")?>'+'/'+id, function(){
            $('#loader').hide()
            })
        }

        function deleteKib(id){
            if(confirm('Apakah Anda yakin?')){
                $('#btn_delete_'+id).hide()
                $('#btn_loading_'+id).show()
                $.ajax({
                    url: '<?=base_url("master/C_Master/deleteDataKib")?>'+'/'+id,
                    method: 'post',
                    data: null,
                    success: function(){
                        loadMasterOpd()
                        successtoast('Berhasil')
                        // $('#fee').val('')
                    }, error: function(e){
                        errortoast('Terjadi Kesalahan')
                    }
                })
            }
        }
    </script>
<?php } else { ?>
    <div class="col-lg-12 text-center">
        <h6>Tidak Ada Data <i class="fa fa-exclamation"></i></h6>
    </div>
<?php } ?>
