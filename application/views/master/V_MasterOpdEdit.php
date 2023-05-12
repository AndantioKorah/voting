<?php if($result){ ?>
    <div class="modal-body">
        <div class="row">
            <div class="col-lg-12">
                <form id="form_edit_opd">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="bmd-label-floating">Nama OPD</label>
                                <input class="form-control" autocomplete="off" name="nama_opd" id="nama_opd_edit" required value="<?=$result['nama_opd']?>" />
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label class="bmd-label-floating">Kode Organisasi</label>
                                <input class="form-control" type="text" autocomplete="off" name="kode_organisasi" id="kode_organisasi_edit" required value="<?=$result['kode_organisasi']?>" />
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
        $('#form_edit_opd').on('submit', function(e){
            e.preventDefault();
            $.ajax({
                url: '<?=base_url("master/C_Master/editOpd")?>'+'/'+'<?=$result['id']?>',
                method: 'post',
                data: $(this).serialize(),
                success: function(){
                    $('#nama_opd_<?=$result['id']?>').html($('#nama_opd_edit').val())
                    $('#kode_organisasi_<?=$result['id']?>').html($('#kode_organisasi_edit').val())
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
