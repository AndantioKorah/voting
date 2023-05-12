<div class="row">
    <div class="col-lg-12 form-group">
        <label>Jenis Barang</label><br>
        <select required class="form-control select2_form select2-navy" style="width: 100%;" data-dropdown-css-class="select2-navy" name="id_m_jenis_barang" id="id_m_jenis_barang">
            <?php if($list_jenis_barang){ foreach($list_jenis_barang as $ljb){ ?>
                <option value="<?=$ljb['id'].';'.$ljb['kode_barang']?>"><?=$ljb['nama_jenis_barang']?></option>
            <?php } } ?>
        </select>
    </div>
    <div class="col-lg-12 form-group">
        <label>Kode Barang</label><br>
        <input disabled autocomplete="off" class="form-control" name="kode_barang" id="kode_barang" />
    </div>
    <div class="col-lg-12 form-group">
        <label>Register</label><br>
        <input autocomplete="off" class="form-control" name="register" ids="register" />
    </div>
    <div class="col-lg-12 form-group">
        <label>Luas (M2)</label><br>
        <input autocomplete="off" class="form-control formatcurrencythis" name="luas" id="luas" />
    </div>
    <div class="col-lg-12 form-group">
        <label>Tahun Pengadaan</label><br>
        <input autocomplete="off" class="form-control" value="<?=date('Y')?>" name="tahun_pengadaan" id="tahun_pengadaan" />
    </div>
    <div class="col-lg-12 form-group">
        <label>Alamat</label><br>
        <input autocomplete="off" class="form-control" name="alamat" id="alamat" />
    </div>
    <div class="col-lg-12 form-group">
        <label>Status Tanah</label><br>
        <input autocomplete="off" class="form-control" name="status_tanah" id="status_tanah" />
    </div>
    <div class="col-lg-12 form-group">
        <label>Sertifikat</label><br>
        <input autocomplete="off" class="form-control" name="sertifikat" id="sertifikat" />
    </div>
    <div class="col-lg-12 form-group">
        <label>Penggunaan</label><br>
        <input autocomplete="off" class="form-control" name="penggunaan" id="penggunaan" />
    </div>
    <div class="col-lg-12 form-group">
        <label>Asal Usul</label><br>
        <input autocomplete="off" class="form-control" name="asal_usul" id="asal_usul" />
    </div>
    <div class="col-lg-12 form-group">
        <label>Harga (ribuan Rp)</label><br>
        <input autocomplete="off" class="form-control formatcurrencythis" name="harga" id="harga" />
    </div>
    <div class="col-lg-12 form-group">
        <label>Keterangan</label><br>
        <input autocomplete="off" class="form-control" name="keterangan" id="keterangan" />
    </div>
</div>
<script>
    $(function(){
        $('.select2_form').select2()

        $('#tahun_pengadaan').datepicker({
            format: 'yyyy',
            autoclose: true,
            minViewMode: "years"
        })

        $('.formatcurrencythis').on('keyup', function(){
            $(this).val(formatRupiah($(this).val()))
        })

        getKodeBarang()
    })

    $('#id_m_jenis_barang').on('change', function(){
        getKodeBarang()
    })

    function getKodeBarang(){
        let value = $('#id_m_jenis_barang').val().split(";")
        $('#kode_barang').val(value[1])
    }
</script>