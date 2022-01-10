<div class="container">
    <div class="card">
        <div class="card-body">
            <?php echo form_open_multipart('C_soalujian/proses_edit_data')  ?>
            <!-- hidden input -->
            <input type="hidden" name="id" value="<?= $soalujian['id_soalujian']; ?>">
            <!-- end hidden input -->
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Nama Matakuliah</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="nama_matakuliah" value="<?= $soalujian['nama_matakuliah']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">kode Matakuliah</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="kode_matakuliah" value="<?= $soalujian['kode_matakuliah']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Semester</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="semester" value="<?= $soalujian['semester']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Jenis Soal</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="jenis_soal" value="<?= $soalujian['jenis_soal']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Upload Dokumen</label>
                <div class="col-sm-6">
                    <input type="file" class="form-control" name="editfile">
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-5">
                    <button type="reset" class="btn btn-secondary">Reset</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>

            </div>

            <?php form_close(); ?>
        </div>
    </div>
</div>