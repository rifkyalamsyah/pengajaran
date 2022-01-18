<!-- alert -->
<?= $this->session->flashdata('pesan'); ?>

<div class="card">
    <div class="card-header">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add-modal"><i class="fa fa-plus"></i>
            Tambah Data
        </button>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr class="text-center">
                    <th>NO</th>
                    <th>KODE MATAKULIAH</th>
                    <th>NAMA MATAKULIAH</th>
                    <th>SEMESTER</th>
                    <th>BOBOT SKS</th>
                    <th>DOKUMEN</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($dokumentasirps as $doc) : ?>
                    <tr class="text-center">
                        <td><?= $no++; ?></td>
                        <td><?= $doc['kode_matakuliah']; ?></td>
                        <td><?= $doc['nama_matakuliah']; ?></td>
                        <td><?= $doc['semester']; ?></td>
                        <td><?= $doc['bobot_sks']; ?></td>
                        <td><a href="<?= base_url(); ?>data/rps/<?= $doc['dokumen']; ?>" target="blank"><?= $doc['dokumen']; ?></a></td>
                        <td>
                            <!-- Button Download -->
                            <a href="<?= base_url(); ?>data/rps/<?= $doc['dokumen']; ?>" class="btn btn-success btn-sm" target="blank"><i class="fa fa-download"></i></a>
                            <!-- Button Edit trigger modal -->
                            <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit-modal<?= $doc['id_dokumentasirps']; ?>"><i class="fa fa-edit"></i>
                            </button>
                            <!-- button Delete -->
                            <a href="<?= base_url() ?>C_dokumentasirps/delete_data/<?= $doc['id_dokumentasirps']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>


<!-- Modal tambah data -->
<!-- Modal -->
<div class="modal fade" id="add-modal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Form Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('C_dokumentasirps/tambah_data'); ?>
                <div class="form-group">
                    <label for="">Nama Matakuliah</label>
                    <input type="text" name="nama_matakuliah" class="form-control" placeholder="Masukan Nama Matakuliah" required="">
                </div>
                <div class="form-group">
                    <label for="">Kode Matakuliah</label>
                    <input type="text" name="kode_matakuliah" class="form-control" placeholder="Masukan Kode Matakuliah" required="">
                </div>
                <div class="form-group">
                    <label for="">Semester</label>
                    <select class="form-control" name="semester" required="">
                        <option disabled selected>Pilih Semester</option>
                        <option value="Ganjil">Ganjil</option>
                        <option value="Genap">Genap</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Bobot SKS</label>
                    <select class="form-control" name="bobot_sks" required="">
                        <option disabled selected>Pilih Bobot SKS</option>
                        <option value="2 SKS">2 SKS</option>
                        <option value="4 SKS">4 SKS</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Upload Dokumen</label>
                    <input type="file" name="userfile" class="form-control" required="">
                    <hr>
                    <code>Jenis File yg dapat diupload *.pdf, *.doc, *.docx, *.xls, *.xlsx - Ukuran file max 4mb</code>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary"><i class="fa fa-trash"></i> Reset</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Submit</button>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
<!-- End Modal tambah data -->


<!-- Modal edit data -->
<?php
$no = 0;
foreach ($dokumentasirps as $doc) : $no++; ?>

    <div class="modal fade" id="edit-modal<?= $doc['id_dokumentasirps']; ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Form Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo form_open_multipart('C_dokumentasirps/edit_data'); ?>
                    <!-- hidden input -->
                    <input type="hidden" name="id_dokumentasirps" value="<?= $doc['id_dokumentasirps']; ?>">
                    <!-- end hidden input -->
                    <div class="form-group">
                        <label for="">Nama Matakuliah</label>
                        <input type="text" name="nama_matakuliah1" class="form-control" value="<?= $doc['nama_matakuliah']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Kode Matakuliah</label>
                        <input type="text" name="kode_matakuliah1" class="form-control" value="<?= $doc['kode_matakuliah']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Semester</label>
                        <!-- hidden input -->
                        <input type="hidden" name="semester1" class="form-control" value="<?= $doc['semester']; ?>">
                        <!-- end hidden input -->
                        <select class="form-control" name="semester1">
                            <option disabled selected><?= $doc['semester']; ?></option>
                            <option value="Ganjil">Ganjil</option>
                            <option value="Genap">Genap</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Bobot SKS</label>
                        <!-- hidden input -->
                        <input type="hidden" name="bobot_sks1" class="form-control" value="<?= $doc['bobot_sks']; ?>">
                        <!-- end hidden input -->
                        <select class="form-control" name="bobot_sks1">
                            <option disabled selected><?= $doc['bobot_sks']; ?></option>
                            <option value="2 SKS">2 SKS</option>
                            <option value="4 SKS">4 SKS</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Upload Dokumen</label>
                        <input type="file" name="editfile" class="form-control">
                        <hr>
                        <code>Jenis File yg dapat diupload *.pdf, *.doc, *.docx, *.xls, *.xlsx - Ukuran file max 4mb</code>
                    </div>

                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary"><i class="fa fa-trash"></i> Reset</button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>

<?php endforeach; ?>
<!-- End Modal edit data -->