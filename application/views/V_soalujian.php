<!-- alert -->
<?= $this->session->flashdata('pesan'); ?>

<div class="card">
    <div class="card-header">
        <!-- <a href="<?= base_url('C_soalujian/tambah_data'); ?>" class="btn btn-primary float-right">Tambah Data</a> -->
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add-modal">
            Tambah Data
        </button>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped text-center">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Kode Matakuliah</th>
                    <th>Nama Matakuliah</th>
                    <th>Semester</th>
                    <th>Jenis Soal</th>
                    <th>Dokumen</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($soalujian as $soal) :  ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $soal['kode_matakuliah']; ?></td>
                        <td><?= $soal['nama_matakuliah']; ?></td>
                        <td><?= $soal['semester']; ?></td>
                        <td><?= $soal['jenis_soal']; ?></td>
                        <td><?= $soal['dokumen']; ?></td>
                        <!-- <td><img src="<?= base_url() . '/data/soalujian/' . $soal['dokumen'] ?>" alt="doc" width="100"></td> -->
                        <td>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit-modal<?= $soal['id_soalujian']; ?>">
                                Edit
                            </button>
                            <!-- <a href="<?= base_url() ?>C_soalujian/edit_data/<?= $soal['id_soalujian']; ?>" class="btn btn-warning btn-sm">Edit</a> -->
                            <a href="<?= base_url() ?>C_soalujian/delete_file/<?= $soal['id_soalujian']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->


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
                <?php echo form_open_multipart('C_soalujian/proses_tambah_data'); ?>
                <div class="form-group">
                    <label for="">Nama Matakuliah</label>
                    <input type="text" name="nama_matakuliah" class="form-control" required="">
                </div>
                <div class="form-group">
                    <label for="">Kode Matakuliah</label>
                    <input type="text" name="kode_matakuliah" class="form-control" required="">
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
                    <label for="">Jenis Soal</label>
                    <select class="form-control" name="jenis_soal" required="">
                        <option disabled selected>Jenis Soal</option>
                        <option value="Individu">Individu</option>
                        <option value="Final Project">Final Project</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Upload Dokumen</label>
                    <input type="file" name="userfile" class="form-control" required="">
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary">Reset</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
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
foreach ($soalujian as $soal) : $no++; ?>

    <div class="modal fade" id="edit-modal<?= $soal['id_soalujian']; ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Form Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo form_open_multipart('C_soalujian/proses_edit_data'); ?>
                    <!-- hidden input -->
                    <input type="hidden" name="id_soalujian" value="<?= $soal['id_soalujian']; ?>">
                    <!-- end hidden input -->
                    <div class="form-group">
                        <label for="">Nama Matakuliah</label>
                        <input type="text" name="nama_matakuliah1" class="form-control" value="<?= $soal['nama_matakuliah']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Kode Matakuliah</label>
                        <input type="text" name="kode_matakuliah1" class="form-control" value="<?= $soal['kode_matakuliah']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Semester</label>
                        <input type="text" name="semester1" class="form-control" value="<?= $soal['semester']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Jenis Soal</label>
                        <input type="text" name="jenis_soal1" class="form-control" value="<?= $soal['jenis_soal']; ?>">
                    </div>
                    <div>
                        <label for="">Preview File Dokumen</label>
                        <p><?= $soal['dokumen']; ?></p>
                    </div>
                    <div class="form-group">
                        <label for="">Upload Dokumen</label>
                        <input type="file" name="editfile" class="form-control">
                    </div>

                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary">Reset</button>
                        <button type="submit" class="btn btn-primary">save</button>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>

<?php endforeach; ?>
<!-- End Modal edit data -->