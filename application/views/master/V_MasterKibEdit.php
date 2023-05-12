<?php if($result){ ?>
    <div class="modal-body">
        <div class="row">
            <div class="col-lg-12">
                <form id="form_edit_kib">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="bmd-label-floating">Nama KIB</label>
                                <input class="form-control" autocomplete="off" name="nama_kib" id="nama_kib_edit" required value="<?=$result['nama_kib']?>" />
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label class="bmd-label-floating">Kode KIB</label>
                                <input class="form-control" type="text" autocomplete="off" name="kode_kib" id="kode_kib_edit" required value="<?=$result['kode_kib']?>" />
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label class="bmd-label-floating">Keterangan</label>
                                <input class="form-control" type="text" autocomplete="off" name="keterangan" id="keterangan_edit" required value="<?=$result['keterangan']?>" />
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
        $('#form_edit_kib').on('submit', function(e){
            e.preventDefault();
            $.ajax({
                url: '<?=base_url("master/C_Master/editKib")?>'+'/'+'<?=$result['id']?>',
                method: 'post',
                data: $(this).serialize(),
                success: function(){
                    $('#nama_kib_<?=$result['id']?>').html($('#nama_kib_edit').val())
                    $('#kode_kib_<?=$result['id']?>').html($('#kode_kib_edit').val())
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
