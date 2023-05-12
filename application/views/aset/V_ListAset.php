<?php if($result){ ?>
    <table class="table table-hover" border=1>
        <thead>
            <th class="text-center">No</th>
            <th class="text-center">OPD</th>
            <th class="text-center">Nama/Jenis Barang</th>
            <th class="text-center">Kode Barang</th>
            <?php if(isset($result['register'])){ ?>
            <th class="text-center">Register</th>
            <?php } ?> 
            <th class="text-center">Pilihan</th>
        </thead>
        <tbody>
            <?php $no = 1; foreach($result as $rs){ ?>
                <tr style="cursor: pointer;">
                    <td class="text-center"><?=$no++;?></td>
                    <td class=""><?=$rs['nama_opd']?></td>
                    <td class=""><?=$rs['nama_jenis_barang']?></td>
                    <td class="text-center"><?=$rs['kode_barang']?></td>
                    <?php if(isset($result['register'])){ ?>
                        <td class="text-center"><?=$rs['register']?></td>
                    <?php } ?> 
                    <td class="text-center">
                        <button onclick="openEditModal('<?=$rs['id']?>')" href="#edit_data_aset" data-toggle="modal" 
                        class="btn btn-sm btn-info"><i class="fa fa-edit"></i> Edit</button>

                        <button onclick="hapusItem('<?=$rs['id']?>')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Hapus</button>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <script>
        function hapusItem(id){
            if(confirm('Apakah Anda yakin?')){
                $.ajax({
                    url: '<?=base_url("aset/C_Aset/deleteDataAset/")?>'+id+'/'+$('#id_m_kib_search').val(),
                    method: 'post',
                    data: $(this).serialize(),
                    success: function(rs){
                        loadListAsetByKib()
                        successtoast('Berhasil Menghapus Aset')
                    }, error: function(e){
                        errortoast('Terjadi Kesalahan')
                    }
                })
            }
        }

        function openEditModal(id){
            $('#edit_data_aset_content').html('')
            $('#edit_data_aset_content').append(divLoaderNavy)
            $('#edit_data_aset_content').load('<?=base_url('aset/C_Aset/loadDataAsetForEdit/')?>'+id+'/'+$('#id_m_kib_search').val(), function(){
                $('#loader').hide()
            })
        }
    </script>
<?php } else { ?>
    <h5 class="text-center">Data Tidak Ditemukan <i class="fa fa-exclamation"></i></h5>
<?php } ?>