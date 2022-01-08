<div class="container">
    <div class="card">
        <div class="card-body">
            <form action="<?= base_url('C_soalujian/proses_edit_data'); ?>" method="POST">
                <!-- Hidden input id -->
                <input type="hidden" name="id_soalujian" value="<?= $soalujian['id_soalujian']; ?>">
                <!-- End hidden input id -->
                <div class="form-group row">
                    <label for="nama_matakuliah" class="col-sm-2 col-form-label">Nama Matakuliah</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="nama_matakuliah" value="<?= $soalujian['nama_matakuliah']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kode_matakuliah" class="col-sm-2 col-form-label">Kode Matakuliah</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="kode_matakuliah" value="<?= $soalujian['kode_matakuliah']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="semester" class="col-sm-2 col-form-label">Semester</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="semester" value="<?= $soalujian['semester']; ?>">
                    </div>

                </div>
                <div class="form-group row">
                    <label for="jenis_soal" class="col-sm-2 col-form-label">Jenis Soal</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="jenis_soal" value="<?= $soalujian['jenis_soal']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jenis_soal" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-6">
                        <button type="reset" class="btn btn-danger">Reset</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>