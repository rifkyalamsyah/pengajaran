<div class="container">
    <div class="card">
        <div class="card-body">
            <form action="<?= base_url('C_soalujian/proses_tambah_data'); ?>" method="POST">
                <div class="form-group row">
                    <label for="nama_matakuliah" class="col-sm-2 col-form-label">Nama Matakuliah</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="nama_matakuliah">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kode_matakuliah" class="col-sm-2 col-form-label">Kode Matakuliah</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="kode_matakuliah">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="semester" class="col-sm-2 col-form-label">Semester</label>
                    <div class="col-sm-6">
                        <select class="form-control" name="semester">
                            <option disabled selected>Pilih Semester</option>
                            <option value="Ganjil">Ganjil</option>
                            <option value="Genap">Genap</option>
                        </select>
                    </div>

                </div>
                <div class="form-group row">
                    <label for="jenis_soal" class="col-sm-2 col-form-label">Jenis Soal</label>
                    <div class="col-sm-6">
                        <select class="form-control" name="jenis_soal">
                            <option disabled selected>Pilih Jenis Soal</option>
                            <option value="Individu">Individu</option>
                            <option value="Final Project">Final Project</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jenis_soal" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-6">
                        <button type="reset" class="btn btn-danger">Reset</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>