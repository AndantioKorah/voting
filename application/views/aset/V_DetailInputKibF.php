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
                <label>Bangunan (P, SP, D)</label><br>
                <input autocomplete="off" class="form-control" value="<?=$result['bangunan']?>" name="bangunan" id="bangunan" />
            </div>
            <div class="col-lg-12 form-group">
                <label>Bertingkat / Tidak</label><br>
                <select required class="form-control select2_form select2-navy select2_form_edit" style="width: 100%;" data-dropdown-css-class="select2-navy" name="bertingkat" id="bertingkat">
                    <option <?=$result['bertingkat'] == 'bertingkat' ? 'selected' : '';?> value="bertingkat" selected>Bertingkat</option>
                    <option <?=$result['bertingkat'] == 'tidak' ? 'selected' : '';?> value="tidak">Tidak</option>
                </select>
            </div>
            <div class="col-lg-12 form-group">
                <label>Beton / Tidak</label><br>
                <select required class="form-control select2_form select2-navy select2_form_edit" style="width: 100%;" data-dropdown-css-class="select2-navy" name="beton" id="beton">
                    <option <?=$result['beton'] == 'beton' ? 'selected' : '';?> value="beton" selected>Beton</option>
                    <option <?=$result['beton'] == 'tidak' ? 'selected' : '';?> value="tidak">Tidak</option>
                </select>
            </div>
            <div class="col-lg-12 form-group">
                <label>Luas (M2)</label><br>
                <input autocomplete="off" class="form-control" value="<?=$result['luas']?>" name="luas" id="luas" />
            </div>
            <div class="col-lg-12 form-group">
                <label>Alamat</label><br>
                <input autocomplete="off" class="form-control" value="<?=$result['alamat']?>" name="alamat" id="alamat" />
            </div>
            <div class="col-lg-12 form-group">
                <label>Tanggal Dokumen Gedung</label><br>
                <input autocomplete="off" class="form-control datepickerthisfield" value="<?=date('Y-m-d')?>" value="<?=$result['tanggal_dokumen']?>" name="tanggal_dokumen" id="tanggal_dokumen" />
            </div>
            <div class="col-lg-12 form-group">
                <label>Nomor Dokumen Gedung</label><br>
                <input autocomplete="off" class="form-control" value="<?=$result['nomor_dokumen']?>" name="nomor_dokumen" id="nomor_dokumen" />
            </div>
            <div class="col-lg-12 form-group">
                <label>Tanggal Mulai</label><br>
                <input autocomplete="off" class="form-control datepickerthisfield" value="<?=date('Y-m-d')?>" value="<?=$result['tanggal_mulai']?>" name="tanggal_mulai" id="tanggal_mulai" />
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
                <label>Asal Usul Pembiayaan</label><br>
                <input autocomplete="off" class="form-control" value="<?=$result['asal_usul']?>" name="asal_usul" id="asal_usul" />
            </div>
            <div class="col-lg-12 form-group">
                <label>Nilai Kontrak (ribuan Rp)</label><br>
                <input autocomplete="off" class="form-control formatcurrencythis" value="<?=formatCurrencyWithoutRp($result['nilai_kontrak'])?>" name="nilai_kontrak" id="nilai_kontrak" />
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