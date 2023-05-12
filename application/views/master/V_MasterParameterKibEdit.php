<?php if($result){ ?>
    <div class="modal-body">
        <div class="row">
            <div class="col-lg-12">
                <form id="form_edit_parameter">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="bmd-label-floating">Nama Parameter</label>
                                <input class="form-control" autocomplete="off" name="nama_parameter" id="nama_parameter_edit" required value="<?=$result['nama_parameter']?>" />
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
        $('#form_edit_parameter').on('submit', function(e){
            e.preventDefault();
            $.ajax({
                url: '<?=base_url("master/C_Master/editParameterKib")?>'+'/'+'<?=$result['id']?>',
                method: 'post',
                data: $(this).serialize(),
                success: function(){
                    $('#nama_parameter_<?=$result['id']?>').html($('#nama_parameter_edit').val())
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
