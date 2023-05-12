<style>
    .form-divider{
        font-size: 10pt;
        font-weight: bold;
    }

    .form-divider:after{
        content: "";
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 0.5em;
        border-top: 1px solid black;
        z-index: -1;
    }
</style>
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
        <label>Tahun Pengadaan</label><br>
        <input autocomplete="off" class="form-control yearpickerthisfield" value="<?=date('Y')?>" name="tahun_pengadaan" id="tahun_pengadaan" />
    </div>
    <div class="col-lg-12 form-group">
        <label>Judul / Nama</label><br>
        <input autocomplete="off" class="form-control" name="nama" id="nama" />
    </div>
    <div class="col-lg-12 form-group">
        <label>Pencipta</label><br>
        <input autocomplete="off" class="form-control" name="pencipta" id="pencipta" />
    </div>
    <div class="col-lg-12 form-group">
        <label>Spesifikasi</label><br>
        <input autocomplete="off" class="form-control" name="spesifikasi" id="spesifikasi" />
    </div>
    <div class="col-lg-12 form-group">
        <label>Kondisi</label><br>
        <input autocomplete="off" class="form-control" name="kondisi" id="konidisi" />
    </div>
    <div class="col-lg-12 form-group">
        <label>Asal Usul</label><br>
        <input autocomplete="off" class="form-control" name="asal_usul" id="asal_usul" />
    </div>
    <div class="col-lg-12 form-group">
        <label>Harga</label><br>
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