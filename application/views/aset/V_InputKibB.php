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
        <label>Merk / Type</label><br>
        <input autocomplete="off" class="form-control" name="merk" id="merk" />
    </div>
    <div class="col-lg-12 form-group">
        <label>Ukuran / CC</label><br>
        <input autocomplete="off" class="form-control" name="ukuran" id="ukuran" />
    </div>
    <div class="col-lg-12 form-group">
        <label>Bahan</label><br>
        <input autocomplete="off" class="form-control" name="bahan" id="bahan" />
    </div>
    <div class="col-lg-12 form-group">
        <label>Tahun Pembelian</label><br>
        <input autocomplete="off" class="form-control datepickerthisfield" name="tahun_pembelian" id="tahun_pembelian" />
    </div>
    <div class="col-lg-12 form-group">
        <label>Nomor Pabrik</label><br>
        <input autocomplete="off" class="form-control" name="pabrik" id="pabrik" />
    </div>
    <div class="col-lg-12 form-group">
        <label>Nomor Rangka</label><br>
        <input autocomplete="off" class="form-control" name="rangka" id="rangka" />
    </div>
    <div class="col-lg-12 form-group">
        <label>Nomor Mesin</label><br>
        <input autocomplete="off" class="form-control" name="mesin" id="mesin" />
    </div>
    <div class="col-lg-12 form-group">
        <label>Nomor Polisi</label><br>
        <input autocomplete="off" class="form-control" name="polisi" id="polisi" />
    </div>
    <div class="col-lg-12 form-group">
        <label>Nomor BKPB</label><br>
        <input autocomplete="off" class="form-control" name="bpkb" id="bpkb" />
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

    <div class="col-lg-12 form-group">
        <label>Keluar</label><br>
        <input autocomplete="off" class="form-control" name="keluar" id="keluar" />
    </div>
</div>
<script>
    $(function(){
        $('.select2_form').select2()

        $('.datepickerthisfield').datepicker({
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