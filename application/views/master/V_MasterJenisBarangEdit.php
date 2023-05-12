<?php if($result){ ?>
    <div class="modal-body">
        <div class="row">
            <div class="col-lg-12">
                <form id="form_edit_jenis_barang">
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label class="bmd-label-floating">Nama Jenis Barang</label>
                                <input class="form-control" autocomplete="off" name="nama_jenis_barang" id="nama_jenis_barang_edit" required value="<?=$result['nama_jenis_barang']?>" />
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label class="bmd-label-floating">Kode Barang</label>
                                <input class="form-control" autocomplete="off" name="kode_barang" id="kode_barang_edit" required value="<?=$result['kode_barang']?>" />
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label class="bmd-label-floating">Keterangan</label>
                                <input class="form-control" type="text" autocomplete="off" name="keterangan" id="keterangan_edit" required value="<?=$result['keterangan']?>" />
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label class="bmd-label-floating">Kartu Inventaris Barang</label>
                                <select required class="form-control select2_this select2-navy" data-dropdown-css-class="select2-navy" name="id_m_kib" id="id_m_kib_edit">
                                    <option disabled value="0">Pilih KIB</option>
                                    <?php if($list_kib){ foreach($list_kib as $l){ ?>
                                        <option <?=$result['id_m_kib'] == $l['id'] ? 'selected' : '';?> value="<?=$l['id']?>"><?=$l['nama_kib']?></option>
                                    <?php } } ?>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-12 text-right mt-2">
                            <button class="btn btn-sm btn-navy" type="submit"><i class="fa fa-save"></i> SIMPAN</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>    
    </div>
    <script>
        $(function(){
            $('#id_m_kib_edit').select2()
        })

        $('#form_edit_jenis_barang').on('submit', function(e){
            e.preventDefault();
            $.ajax({
                url: '<?=base_url("master/C_Master/editJenisBarang")?>'+'/'+'<?=$result['id']?>',
                method: 'post',
                data: $(this).serialize(),
                success: function(){
                    $('#nama_jenis_barang_<?=$result['id']?>').html($('#nama_jenis_barang_edit').val())
                    $('#kode_barang_<?=$result['id']?>').html($('#kode_barang_edit').val())
                    $('#keterangan_<?=$result['id']?>').html($('#keterangan_edit').val())
                    // loadMasterOpd()
                    successtoast('Berhasil')
                    // $('#fee').val('')
                }, error: function(e){
                    errortoast('Terjadi Kesalahan')
                }
            })
        })
    </script>
<?php } else { ?>
    <div class="col-lg-12 text-center">
        <h6>Tidak Ada Data <i class="fa fa-exclamation"></i></h6>
    </div>
<?php } ?>
