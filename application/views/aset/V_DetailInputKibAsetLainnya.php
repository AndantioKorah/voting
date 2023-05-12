<?php if($result){ ?>
    <form id="form_edit_kib">
        <div class="row p-3">
            <div class="col-lg-12 form-group">
                <label>Nama/Jenis Barang</label><br>
                <input disabled class="form-control" value="<?=$result['nama_jenis_barang']?>" />
            </div>
            <div class="col-lg-12 form-group">
                <label>Kode Barang</label><br>
                <input disabled autocomplete="off" class="form-control" value="<?=$result['kode_barang']?>" />
            </div>
            <div class="col-lg-12 form-group">
                <label>Register</label><br>
                <input autocomplete="off" class="form-control" value="<?=$result['register']?>" name="register" ids="register" />
            </div>
            <div class="col-lg-12 form-group">
                <label>Tahun Pengadaan</label><br>
                <input autocomplete="off" class="form-control yearpickerthisfieldedit" value="<?=$result['tahun_pengadaan']?>" name="tahun_pengadaan" id="tahun_pengadaan" />
            </div>
            <div class="col-lg-12 form-group">
                <label>Judul / Nama</label><br>
                <input autocomplete="off" class="form-control" value="<?=$result['nama']?>" name="nama" id="nama" />
            </div>
            <div class="col-lg-12 form-group">
                <label>Pencipta</label><br>
                <input autocomplete="off" class="form-control" value="<?=$result['pencipta']?>" name="pencipta" id="pencipta" />
            </div>
            <div class="col-lg-12 form-group">
                <label>Spesifikasi</label><br>
                <input autocomplete="off" class="form-control" value="<?=$result['spesifikasi']?>" name="spesifikasi" id="spesifikasi" />
            </div>
            <div class="col-lg-12 form-group">
                <label>Kondisi</label><br>
                <input autocomplete="off" class="form-control" value="<?=$result['kondisi']?>" name="kondisi" id="konidisi" />
            </div>
            <div class="col-lg-12 form-group">
                <label>Asal Usul</label><br>
                <input autocomplete="off" class="form-control" value="<?=$result['asal_usul']?>" name="asal_usul" id="asal_usul" />
            </div>
            <div class="col-lg-12 form-group">
                <label>Harga</label><br>
                <input autocomplete="off" class="form-control formatcurrencythisedit" value="<?=formatCurrencyWithoutRp($result['harga'])?>" name="harga" id="harga" />
            </div>
            <div class="col-lg-12 form-group">
                <label>Keterangan</label><br>
                <input autocomplete="off" class="form-control" value="<?=$result['keterangan']?>" name="keterangan" id="keterangan" />
            </div>
            <div class="col-lg-12 text-right">
                <button class="btn btn-sm btn-navy" type="submit"><i class="fa fa-save"></i> Simpan Perubahan</button>
            </div>
        </div>
    </form>
    <script>
        $(function(){
            $('.select2_form_edit').select2()

            $('.datepickerthisfieldedit').datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true,
                todayBtn: true
            })

            $('.yearpickerthisfieldedit').datepicker({
                format: 'yyyy',
                autoclose: true,
                minViewMode: "years"
            })

            $('.formatcurrencythisedit').on('keyup', function(){
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

        $('#form_edit_kib').on('submit', function(e){
            e.preventDefault()
            $.ajax({
                url: '<?=base_url("aset/C_Aset/editDataAset/".$result['id'].'/'.$id_m_kib)?>',
                method: 'post',
                data: $(this).serialize(),
                success: function(rs){
                    // loadListAsetByKib()
                    successtoast('Update Data Aset Berhasil')
                }, error: function(e){
                    errortoast('Terjadi Kesalahan')
                }
            })
        })
    </script>
<?php } else { ?>
    <h5 class="text-center">Terjadi Kesalahan. Data Tidak Ditemukan <i class="fa fa-exclamation"></i></h5>
<?php } ?>