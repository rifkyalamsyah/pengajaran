<div class="card">
    <div class="card-body">
        <form action="<?= base_url('C_dokumentasirps/tambah_aksi'); ?>" method="POST">
            <div class="form-group">
                <label for="">Nama Matakuliah</label>
                <input type="Text" class="form-control" name="nama_matakuliah" id="" placeholder="Nama Matakuliah">
                <?= form_error('nama_matakuliah', '<div class="text-small text-danger">', '</div>'); ?>
            </div>
            <div class="form-group">
                <label for="">Kode Matakuliah</label>
                <input type="Text" class="form-control" name="kode_matakuliah" id="" placeholder="Kode Matakuliah">
                <?= form_error('kode_matakuliah', '<div class="text-small text-danger">', '</div>'); ?>
            </div>
            <div class="form-group">
                <label for="">Semester</label>
                <select class="form-control" name="semester">
                    <option disabled selected>Select your option</option>
                    <option value="Ganjil">Ganjil</option>
                    <option value="Genap">Genap</option>
                </select>
                <?= form_error('semester', '<div class="text-small text-danger">', '</div>'); ?>
            </div>
            <div class="form-group">
                <label for="">Bobot SKS</label>
                <select class="form-control" name="bobot_sks">
                    <option disabled selected>Select your option</option>
                    <option value="2 SKS">2 SKS</option>
                    <option value="4 SKS">4 SKS</option>
                </select>
                <?= form_error('bobot_sks', '<div class="text-small text-danger">', '</div>'); ?>
            </div>
            <div class="form-group">
                <label for="exampleInputFile">Upload Dokumen</label> <br>
                <input type="file" name="dokumen" id="exampleInputFile">
            </div>
            <hr>
            <!-- button -->
            <button type="reset" class="btn btn-default"><i class="fa fa-trash"></i> Reset</button>
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Submit</button>
        </form>
    </div>

</div>