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
        <label>Konstruksi</label><br>
        <input autocomplete="off" class="form-control" name="konstruksi" id="konstruksi" />
    </div>
    <div class="col-lg-12 form-group">
        <label>Panjang (Km)</label><br>
        <input autocomplete="off" class="form-control" name="panjang" id="panjang" />
    </div>
    <div class="col-lg-12 form-group">
        <label>Lebar (M)</label><br>
        <input autocomplete="off" class="form-control" name="lebar" id="lebar" />
    </div>
    <div class="col-lg-12 form-group">
        <label>Luas (M2)</label><br>
        <input autocomplete="off" class="form-control" name="luas" id="luas" />
    </div>
    <div class="col-lg-12 form-group">
        <label>Letak / Alamat</label><br>
        <input autocomplete="off" class="form-control" name="alamat" id="alamat" />
    </div>
    <div class="col-lg-12 form-group">
        <label>Tanggal Dokumen</label><br>
        <input autocomplete="off" class="form-control datepickerthisfield" value="<?=date('Y-m-d')?>" name="tanggal_dokumen" id="tanggal_dokumen" />
    </div>
    <div class="col-lg-12 form-group">
        <label>Nomor Dokumen</label><br>
        <input autocomplete="off" class="form-control" name="nomor_dokumen" id="nomor_dokumen" />
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
        <label>Kondisi</label><br>
        <input autocomplete="off" class="form-control" name="kondisi" id="kondisi" />
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