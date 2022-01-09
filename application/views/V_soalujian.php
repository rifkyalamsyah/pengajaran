<!-- alert -->
<?= $this->session->flashdata('pesan'); ?>

<div class="card">
    <div class="card-header">
        <!-- <a href="<?= base_url('C_soalujian/tambah_data'); ?>" class="btn btn-primary float-right">Tambah Data</a> -->
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-add">
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
                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-edit<?= $soal['id_soalujian']; ?>">
                                Edit
                            </button>
                            <a href="<?= base_url() ?>C_soalujian/edit_data/<?= $soal['id_soalujian']; ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="<?= base_url() ?>C_soalujian/delete_data/<?= $soal['id_soalujian']; ?>" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->


<!-- Modal Tambah Data -->

<!-- Modal -->
<div class="modal fade" id="modal-add" tabindex="-1" aria-labelledby="modal-add" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-add">Form Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <?php echo form_open_multipart('C_soalujian/proses_tambah_data'); ?>

                <div class="form-group">
                    <label for="">Nama Matakuliah</label>
                    <input type="text" name="nama_matakuliah" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Kode Matakuliah</label>
                    <input type="text" name="kode_matakuliah" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Semester</label>
                    <select class="form-control" name="semester">
                        <option disabled selected>Pilih Semester</option>
                        <option value="Ganjil">Ganjil</option>
                        <option value="Genap">Genap</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Jenis Soal</label>
                    <select class="form-control" name="jenis_soal">
                        <option disabled selected>Pilih Jenis Soal</option>
                        <option value="Individu">Individu</option>
                        <option value="Final Project">Final Project</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Dokumen</label>
                    <input type="file" name="userfile" class="form-control">
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary">Reset</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>

                <?php form_close(); ?>

            </div>
        </div>
    </div>
</div>
<!-- End Modal Tambah Data -->


<!-- Modal Edit Data -->
<!-- Modal -->
<?php
$no = 0;
foreach ($soalujian as $soal) : $no++; ?>
    <div class="modal fade" id="modal-edit<?= $soal['id_soalujian']; ?>" tabindex="-1" aria-labelledby="modal-edit" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-edit">Form Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <?php echo form_open_multipart('C_soalujian/proses_edit_data') ?>

                    <!-- hidden input id -->
                    <input type="hidden" name="id_soalujian" value="<?= $soal['id_soalujian']; ?>">
                    <!-- end hidden input id -->

                    <div class="form-group">
                        <label for="">Nama Matakuliah</label>
                        <input type="text" name="nama_matakuliah" class="form-control" required value="<?= $soal['nama_matakuliah']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Kode Matakuliah</label>
                        <input type="text" name="kode_matakuliah" class="form-control" required value="<?= $soal['kode_matakuliah']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Semester</label>
                        <input type="text" class="form-control" name="semester" value="<?= $soal['semester']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Jenis Soal</label>
                        <input type="text" class="form-control" name="jenis_soal" value="<?= $soal['jenis_soal']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Dokumen</label>
                        <input type="file" name="editfile" class="form-control" size="20">
                    </div>
                    <div>
                        <p>Preview Dokumen</p>
                        <img src="<?= base_url() . '/data/soalujian/' . $soal['dokumen']; ?>" alt="doc" width="100">
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary">Reset</button>
                        <button type="submit" class="btn btn-primary">save</button>
                    </div>

                    <?php form_close(); ?>

                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- End Modal Edit Data -->