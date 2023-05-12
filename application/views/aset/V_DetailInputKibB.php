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
                <input autocomplete="off" class="form-control" value="<?=$result['register']?>" name="register" />
            </div>
            <div class="col-lg-12 form-group">
                <label>Merk / Type</label><br>
                <input autocomplete="off" class="form-control" value="<?=$result['merk']?>" name="merk" id="merk" />
            </div>
            <div class="col-lg-12 form-group">
                <label>Ukuran / CC</label><br>
                <input autocomplete="off" class="form-control" value="<?=$result['ukuran']?>" name="ukuran" id="ukuran" />
            </div>
            <div class="col-lg-12 form-group">
                <label>Bahan</label><br>
                <input autocomplete="off" class="form-control" value="<?=$result['bahan']?>" name="bahan" id="bahan" />
            </div>
            <div class="col-lg-12 form-group">
                <label>Tahun Pembelian</label><br>
                <input autocomplete="off" class="form-control datepickerthisfieldedit" value="<?=$result['tahun_pembelian']?>" name="tahun_pembelian" id="tahun_pembelian" />
            </div>
            <div class="col-lg-12 form-group">
                <label>Nomor Pabrik</label><br>
                <input autocomplete="off" class="form-control" value="<?=$result['pabrik']?>" name="pabrik" id="pabrik" />
            </div>
            <div class="col-lg-12 form-group">
                <label>Nomor Rangka</label><br>
                <input autocomplete="off" class="form-control" value="<?=$result['rangka']?>" name="rangka" id="rangka" />
            </div>
            <div class="col-lg-12 form-group">
                <label>Nomor Mesin</label><br>
                <input autocomplete="off" class="form-control" value="<?=$result['mesin']?>" name="mesin" id="mesin" />
            </div>
            <div class="col-lg-12 form-group">
                <label>Nomor Polisi</label><br>
                <input autocomplete="off" class="form-control" value="<?=$result['polisi']?>" name="polisi" id="polisi" />
            </div>
            <div class="col-lg-12 form-group">
                <label>Nomor BKPB</label><br>
                <input autocomplete="off" class="form-control" value="<?=$result['bpkb']?>" name="bpkb" id="bpkb" />
            </div>
            <div class="col-lg-12 form-group">
                <label>Asal Usul</label><br>
                <input autocomplete="off" class="form-control" value="<?=$result['asal_usul']?>" name="asal_usul" id="asal_usul" />
            </div>
            <div class="col-lg-12 form-group">
                <label>Harga (ribuan Rp)</label><br>
                <input autocomplete="off" class="form-control formatcurrencythis" value="<?=formatCurrencyWithoutRp($result['harga'])?>" name="harga" id="harga" />
            </div>
            <div class="col-lg-12 form-group">
                <label>Keterangan</label><br>
                <input autocomplete="off" class="form-control" value="<?=$result['keterangan']?>" name="keterangan" id="keterangan" />
            </div>

            <div class="col-lg-12 form-group">
                <label>Keluar</label><br>
                <input autocomplete="off" class="form-control" value="<?=$result['keluar']?>" name="keluar" id="keluar" />
            </div>
            <div class="col-lg-12 text-right">
                <button class="btn btn-sm btn-navy" type="submit"><i class="fa fa-save"></i> Simpan Perubahan</button>
            </div>
        </div>
    </form>
    <script>
        $(function(){
            $('.select2_form').select2()

            $('.datepickerthisfieldedit').datepicker({
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