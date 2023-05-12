<div class="card card-default">
    <div class="card-header"  style="display: block;">
        <h3 class="card-title">TAMBAH PARAMETER</h3>
    </div>
    <div class="card-body" style="display: block;">
        <form id="form_tambah_parameter">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label class="bmd-label-floating">Nama Parameter</label>
                        <input class="form-control" autocomplete="off" name="nama_parameter" id="nama_parameter" required/>
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label class="bmd-label-floating">Keterangan</label>
                        <input class="form-control" type="text" autocomplete="off" name="keterangan" id="keterangan"/>
                    </div>
                </div>
                
                <div class="col-12 text-right mt-2">
                    <button class="btn btn-sm btn-navy" type="submit"><i class="fa fa-save"></i> SIMPAN</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="card card-default">
    <div class="card-header">
        <h3 class="card-title">LIST DATA MASTER PARAMETER</h3>
    </div>
    <div class="card-body">
        <div id="list_opd" class="row">
        </div>
    </div>
</div>

<div class="modal fade" id="edit_data_parameter_kib" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div id="modal-dialog" class="modal-dialog modal-xl">
      <div class="modal-content">
          <div class="modal-header">
              <h6 class="modal-title">EDIT DATA PARAMETER</h6>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div id="edit_data_parameter_kib_content">
          </div>
      </div>
  </div>
</div>


<script>
    $(function(){
        loadMasterParameterKib()
    })

    function loadMasterParameterKib(){
        $('#list_opd').html('')
        $('#list_opd').append(divLoaderNavy)
        $('#list_opd').load('<?=base_url("master/C_Master/loadMasterParameterKib")?>', function(){
            $('#loader').hide()
        })
    }

    $('#form_tambah_parameter').on('submit', function(e){
        e.preventDefault();
        $.ajax({
            url: '<?=base_url("master/C_Master/insertDataParameterKib")?>',
            method: 'post',
            data: $(this).serialize(),
            success: function(rs){
                let result = JSON.parse(rs)
                if(result.code != 1){
                    loadMasterParameterKib()
                    $('#nama_parameter').val('')
                    $('#keterangan').val('')
                    successtoast('Berhasil')
                } else {
                    errortoast(result.message)
                }
                // $('#fee').val('')
            }, error: function(e){
                errortoast('Terjadi Kesalahan')
            }
        })
    })

</script>