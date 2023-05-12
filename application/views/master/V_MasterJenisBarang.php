<div class="card card-default">
    <div class="card-header"  style="display: block;">
        <h3 class="card-title">TAMBAH JENIS BARANG</h3>
    </div>
    <div class="card-body" style="display: block;">
        <form id="form_tambah_jenis_barang">
            <div class="row">
                <div class="col-3">
                    <div class="form-group">
                        <label class="bmd-label-floating">Nama Jenis Barang</label>
                        <input class="form-control" autocomplete="off" name="nama_jenis_barang" id="nama_jenis_barang" required/>
                    </div>
                </div>

                <div class="col-3">
                    <div class="form-group">
                        <label class="bmd-label-floating">Kode Barang</label>
                        <input class="form-control" autocomplete="off" name="kode_barang" id="kode_barang"/>
                    </div>
                </div>

                <div class="col-3">
                    <div class="form-group">
                        <label class="bmd-label-floating">Keterangan</label>
                        <input class="form-control" type="text" autocomplete="off" name="keterangan" id="keterangan"/>
                    </div>
                </div>

                <div class="col-3">
                    <div class="form-group">
                        <label class="bmd-label-floating">Kartu Inventaris Barang</label>
                        <select required class="form-control select2_this select2-navy" data-dropdown-css-class="select2-navy" name="id_m_kib" id="id_m_kib">
                            <option disabled value="0" selected>Pilih KIB</option>
                            <?php if($list_kib){ foreach($list_kib as $l){ ?>
                                <option value="<?=$l['id']?>"><?=$l['nama_kib']?></option>
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

<div class="card card-default">
    <div class="card-header">
        <h3 class="card-title">LIST DATA MASTER JENIS BARANG</h3>
    </div>
    <div class="card-body">
        <div id="list_opd" class="row">
        </div>
    </div>
</div>

<div class="modal fade" id="edit_data_jenis_barang" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div id="modal-dialog" class="modal-dialog modal-xl">
      <div class="modal-content">
          <div class="modal-header">
              <h6 class="modal-title">EDIT DATA PARAMETER</h6>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div id="edit_data_jenis_barang_content">
          </div>
      </div>
  </div>
</div>


<script>
    $(function(){
        loadMasterJenisBarang()
    })

    function loadMasterJenisBarang(){
        $('#list_opd').html('')
        $('#list_opd').append(divLoaderNavy)
        $('#list_opd').load('<?=base_url("master/C_Master/loadMasterJenisBarang")?>', function(){
            $('#loader').hide()
        })
    }

    $('#form_tambah_jenis_barang').on('submit', function(e){
        e.preventDefault();
        $.ajax({
            url: '<?=base_url("master/C_Master/insertDataJenisBarang")?>',
            method: 'post',
            data: $(this).serialize(),
            success: function(rs){
                let result = JSON.parse(rs)
                if(result.code != 1){
                    loadMasterJenisBarang()
                    $('#nama_jenis_barang').val('')
                    $('#kode_barang').val('')
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