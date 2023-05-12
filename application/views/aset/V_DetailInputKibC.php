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
                <label>Kondisi Bangunan</label><br>
                <input autocomplete="off" class="form-control" value="<?=$result['kondisi_bangunan']?>" name="kondisi_bangunan" id="kondisi_bangunan" />
            </div>
            <div class="col-lg-12 form-group">
                <label>Bertingkat / Tidak</label><br>
                <select required class="form-control select2_form_edit select2-navy" style="width: 100%;" data-dropdown-css-class="select2-navy" name="bertingkat" id="bertingkat">
                    <option <?=$result['bertingkat'] == 'bertingkat' ? 'selected' : '';?> value="bertingkat">Bertingkat</option>
                    <option <?=$result['bertingkat'] == 'tidak' ? 'selected' : '';?> value="tidak">Tidak</option>
                </select>
            </div>
            <div class="col-lg-12 form-group">
                <label>Beton / Tidak</label><br>
                <select required class="form-control select2_form_edit select2-navy" style="width: 100%;" data-dropdown-css-class="select2-navy" name="beton" id="beton">
                    <option <?=$result['beton'] == 'beton' ? 'selected' : '';?> value="beton">Beton</option>
                    <option <?=$result['beton'] == 'tidak' ? 'selected' : '';?> value="tidak">Tidak</option>
                </select>
            </div>
            <div class="col-lg-12 form-group">
                <label>Luas Lantai (M2)</label><br>
                <input autocomplete="off" class="form-control" value="<?=$result['luas_lantai']?>" name="luas_lantai" id="luas_lantai" />
            </div>
            <div class="col-lg-12 form-group">
                <label>Alamat</label><br>
                <input autocomplete="off" class="form-control" value="<?=$result['alamat']?>" name="alamat" id="alamat" />
            </div>
            <div class="col-lg-12 form-group">
                <label>Nomor Dokumen Gedung</label><br>
                <input autocomplete="off" class="form-control" value="<?=$result['nomor_dokumen_gedung']?>" name="nomor_dokumen_gedung" id="nomor_dokumen_gedung" />
            </div>
            <div class="col-lg-12 form-group">
                <label>Tanggal Nomor Gedung</label><br>
                <input autocomplete="off" class="form-control datepickerthisfieldedit" value="<?=date('Y-m-d')?>" value="<?=$result['tanggal_dokumen_gedung']?>" name="tanggal_dokumen_gedung" id="tanggal_dokumen_gedung" />
            </div>
            <div class="col-lg-12 form-group">
                <label>Luas (M2)</label><br>
                <input autocomplete="off" class="form-control" value="<?=$result['luas']?>" name="luas" id="luas" />
            </div>
            <div class="col-lg-12 form-group">
                <label>Status Tanah</label><br>
                <input autocomplete="off" class="form-control" value="<?=$result['status_tanah']?>" name="status_tanah" id="status_tanah" />
            </div>
            <div class="col-lg-12 form-group">
                <label>Nomor Kode Tanah</label><br>
                <input autocomplete="off" class="form-control" value="<?=$result['nomor_kode_tanah']?>" name="nomor_kode_tanah" id="nomor_kode_tanah" />
            </div>
            <div class="col-lg-12 form-group">
                <label>Asal Usul</label><br>
                <input autocomplete="off" class="form-control" value="<?=$result['asal_usul']?>" name="asal_usul" id="asal_usul" />
            </div>
            <div class="col-lg-12 form-group">
                <label>Harga (ribuan Rp)</label><br>
                <input autocomplete="off" class="form-control formatcurrencythisedit" value="<?=$result['harga']?>" name="harga" id="harga" />
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