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
        <label>Kondisi Bangunan</label><br>
        <input autocomplete="off" class="form-control" name="kondisi_bangunan" id="kondisi_bangunan" />
    </div>
    <div class="col-lg-12 form-group">
        <label>Bertingkat / Tidak</label><br>
        <select required class="form-control select2_form select2-navy" style="width: 100%;" data-dropdown-css-class="select2-navy" name="bertingkat" id="bertingkat">
            <option value="bertingkat" selected>Bertingkat</option>
            <option value="tidak">Tidak</option>
        </select>
    </div>
    <div class="col-lg-12 form-group">
        <label>Beton / Tidak</label><br>
        <select required class="form-control select2_form select2-navy" style="width: 100%;" data-dropdown-css-class="select2-navy" name="beton" id="beton">
            <option value="beton" selected>Beton</option>
            <option value="tidak">Tidak</option>
        </select>
    </div>
    <div class="col-lg-12 form-group">
        <label>Luas Lantai (M2)</label><br>
        <input autocomplete="off" class="form-control" name="luas_lantai" id="luas_lantai" />
    </div>
    <div class="col-lg-12 form-group">
        <label>Alamat</label><br>
        <input autocomplete="off" class="form-control" name="alamat" id="alamat" />
    </div>
    <div class="col-lg-12 form-group">
        <label>Nomor Dokumen Gedung</label><br>
        <input autocomplete="off" class="form-control" name="nomor_dokumen_gedung" id="nomor_dokumen_gedung" />
    </div>
    <div class="col-lg-12 form-group">
        <label>Tanggal Nomor Gedung</label><br>
        <input autocomplete="off" class="form-control datepickerthisfield" value="<?=date('Y-m-d')?>" name="tanggal_dokumen_gedung" id="tanggal_dokumen_gedung" />
    </div>
    <div class="col-lg-12 form-group">
        <label>Luas (M2)</label><br>
        <input autocomplete="off" class="form-control" name="luas" id="luas" />
    </div>
    <div class="col-lg-12 form-group">
        <label>Status Tanah</label><br>
        <input autocomplete="off" class="form-control" name="status_tanah" id="status_tanah" />
    </div>
    <div class="col-lg-12 form-group">
        <label>Nomor Kode Tanah</label><br>
        <input autocomplete="off" class="form-control" name="nomor_kode_tanah" id="nomor_kode_tanah" />
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

        $('.datepickerthisfield').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayBtn: true
        })

        $('.yearpickerthisfield').datepicker({
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