<div class="card card-default">
    <div class="card-header"  style="display: block;">
        <h3 class="card-title">TAMBAH PERANGKAT DAERAH</h3>
    </div>
    <div class="card-body" style="display: block;">
        <form id="form_tambah_opd">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label class="bmd-label-floating">Nama OPD</label>
                        <input class="form-control" autocomplete="off" name="nama_opd" id="nama_opd" required/>
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label class="bmd-label-floating">Kode Organisasi</label>
                        <input class="form-control" type="text" autocomplete="off" name="kode_organisasi" id="kode_organisasi"/>
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
        <h3 class="card-title">LIST DATA OPD</h3>
    </div>
    <div class="card-body">
        <div id="list_opd" class="row">
        </div>
    </div>
</div>

<div class="modal fade" id="edit_data_opd" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div id="modal-dialog" class="modal-dialog modal-xl">
      <div class="modal-content">
          <div class="modal-header">
              <h6 class="modal-title">EDIT DATA OPD</h6>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div id="edit_data_opd_content">
          </div>
      </div>
  </div>
</div>


<script>
    $(function(){
        loadMasterOpd()
    })

    function loadMasterOpd(){
        $('#list_opd').html('')
        $('#list_opd').append(divLoaderNavy)
        $('#list_opd').load('<?=base_url("master/C_Master/loadMasterOpd")?>', function(){
            $('#loader').hide()
        })
    }

    $('#form_tambah_opd').on('submit', function(e){
        e.preventDefault();
        $.ajax({
            url: '<?=base_url("master/C_Master/insertDataOpd")?>',
            method: 'post',
            data: $(this).serialize(),
            success: function(){
                loadMasterOpd()
                $('#nama_opd').val('')
                $('#kode_organisasi').val('')
                successtoast('Berhasil')
                // $('#fee').val('')
            }, error: function(e){
                errortoast('Terjadi Kesalahan')
            }
        })
    })

    function openModalEdiMasterDokter(id = 0){
        $('#edit_master_dokter_content').html('')
        $('#edit_master_dokter_content').append(divLoaderNavy)
        $('#edit_master_dokter_content').load('<?=base_url("master/C_Master/loadEditMasterDokter")?>'+'/'+id, function(){
        $('#loader').hide()
        })
    }

</script>