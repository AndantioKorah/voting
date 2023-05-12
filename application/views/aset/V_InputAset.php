<div class="card card-default">
    <div class="card-header"  style="display: block;">
        <h3 class="card-title">Input Aset</h3>
    </div>
    <div class="card-body" style="display: block;">
        <div class="row">
            <div class="col-lg-12"><span style="font-size: 16px; font-weight: 400;">Unit Kerja:</span></div>
            <div class="col-lg-12"><span style="font-size: 20px; font-weight: bold;"><?=strtoupper($this->general_library->getOpdName());?></span></div><br><br>
            <div class="col-lg-12">
                <button id="btn_tambah_aset" class="btn btn-sm btn-navy"><i class="fa fa-plus"></i> Tambah Aset Baru</button>
            </div>
            <div class="col-lg-12 mt-3" id="div_tambah_aset" style="display: none;">
                <form id="form_tambah_aset">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="bmd-label-floating">Pilih Kartu Inventaris Barang</label><br>
                                <select required class="form-control select2_this select2-navy" style="width: 100%;" data-dropdown-css-class="select2-navy" name="id_m_kib" id="id_m_kib">
                                    <?php if($list_kib){ foreach($list_kib as $l){ ?>
                                        <option value="<?=$l['id']?>"><?=$l['nama_kib']?></option>
                                    <?php } } ?>
                                </select>
                            </div>
                        </div>
                        <?php if($this->general_library->isSuperAdmin() || $this->general_library->isProgrammer()){ ?>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Pilih OPD</label><br>
                                    <select required class="form-control select2_this select2-navy" style="width: 100%;" data-dropdown-css-class="select2-navy" name="id_m_opd" id="id_m_opd">
                                        <?php if($list_opd){ foreach($list_opd as $o){ ?>
                                            <option value="<?=$o['id']?>"><?=$o['nama_opd']?></option>
                                        <?php } } ?>
                                    </select>
                                </div>
                            </div>
                        <?php } else { ?>
                            <input style="display: none;" name="id_m_opd" id="id_m_opd" value="<?=$this->general_library->getOpdId()?>" />
                        <?php } ?>
                        <div class="col-lg-12" id="div_input_aset"></div>
                        
                        <div class="col-12 text-right mt-2">
                            <button class="btn btn-sm btn-navy" type="submit"><i class="fa fa-save"></i> SIMPAN DATA</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="card card-default">
    <div class="card-header">
        <h3 class="card-title">LIST DATA ASET</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <?php if($this->general_library->isSuperAdmin() || $this->general_library->isProgrammer()){ ?>
            <div class="col">
                <label class="bmd-label-floating">Pilih OPD</label><br>
                <select required class="form-control select2_this select2-navy" style="width: 100%;" data-dropdown-css-class="select2-navy" name="id_m_opd_search" id="id_m_opd_search">
                    <?php if($list_opd){ foreach($list_opd as $o){ ?>
                        <option value="<?=$o['id']?>"><?=$o['nama_opd']?></option>
                    <?php } } ?>
                </select>
            </div>
            <?php } else { ?>
                <input style="display: none;" name="id_m_opd_search" id="id_m_opd_search" value="<?=$this->general_library->getOpdId()?>" />
            <?php } ?>
            <div class="col">
                <label class="bmd-label-floating">Pilih Kartu Inventaris Barang</label><br>
                <select required class="form-control select2_this select2-navy" style="width: 100%;" data-dropdown-css-class="select2-navy" name="id_m_kib_search" id="id_m_kib_search">
                    <?php if($list_kib){ foreach($list_kib as $l){ ?>
                        <option value="<?=$l['id']?>"><?=$l['nama_kib']?></option>
                    <?php } } ?>
                </select>
            </div>
            <div class="col-lg-12">
                <hr>
            </div>
            <div id="list_data_aset" class="col-lg-12">
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="edit_data_aset" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div id="modal-dialog" class="modal-dialog modal-xl">
      <div class="modal-content">
          <div class="modal-header">
              <h6 class="modal-title">EDIT DATA ASET</h6>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div id="edit_data_aset_content">
          </div>
      </div>
  </div>
</div>


<script>
    $(function(){
        loadListAsetByKib()
        loadFormInputAset()
    })

    $('#id_m_kib').on('change', function(){
        loadFormInputAset()
    })

    $('#id_m_opd_search').on('change', function(){
        loadListAsetByKib()
    })

     $('#id_m_kib_search').on('change', function(){
        loadListAsetByKib()
    })

    function formatRupiah(angka, prefix = "Rp ") {
        var number_string = angka.replace(/[^,\d]/g, "").toString(),
        split = number_string.split(","),
        sisa = split[0].length % 3,
        rupiah = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if (ribuan) {
            separator = sisa ? "." : "";
            rupiah += separator + ribuan.join(".");
        }

        rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
        return prefix == undefined ? rupiah : rupiah ? rupiah : "";
    }

    function loadFormInputAset(){
        $('#div_input_aset').html('')
        $('#div_input_aset').append(divLoaderNavy)
        $('#div_input_aset').load('<?=base_url("aset/C_Aset/loadFormInputAset/")?>'+$('#id_m_kib').val(), function(){
            $('#loader').hide()
        })
    }

    $('#btn_tambah_aset').on('click', function(){
        $('#div_tambah_aset').toggle()
    })

    function loadListAsetByKib(){
        $('#list_data_aset').html('')
        $('#list_data_aset').append(divLoaderNavy)
        $('#list_data_aset').load('<?=base_url("aset/C_Aset/loadListAsetByKib/")?>'+$('#id_m_opd_search').val()+'/'+$('#id_m_kib_search').val(), function(){
            $('#loader').hide()
        })
    }

    $('#form_tambah_aset').on('submit', function(e){
        e.preventDefault();
        $.ajax({
            url: '<?=base_url("aset/C_Aset/insertDataAset")?>',
            method: 'post',
            data: $(this).serialize(),
            success: function(rs){
                let result = JSON.parse(rs)
                if(result.code != 1){
                    loadFormInputAset()
                    loadListAsetByKib()
                    successtoast('Berhasil Menambahkan Aset')
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