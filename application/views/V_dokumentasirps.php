<!-- alert -->
<?= $this->session->flashdata('pesan'); ?>

<div class="card">
    <div class="card-header">
        <a href="<?= base_url('C_dokumentasirps/tambah') ?>" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Data</a>
        <!-- Button trigger modal -->
        <!-- <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
            Tambah Data
        </button> -->

        <!-- Modal -->
        <!-- <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Tambah Data </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form action="C_dokumentasirps/tambah_aksi" method="POST">
                            <div class="form-group">
                                <label for="">Nama Matakuliah</label>
                                <input type="Text" class="form-control" name="nama_matakuliah"  placeholder="Nama Matakuliah">
                                <?= form_error('nama_matakuliah', '<div class="text-small text-danger">', '</div>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="">Kode Matakuliah</label>
                                <input type="Text" class="form-control"  placeholder="Kode Matakuliah">
                                <?= form_error('kode_matakuliah', '<div class="text-small text-danger">', '</div>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="">Semester</label>
                                <select class="form-control">
                                    <option>Ganjil</option>
                                    <option>Genap</option>
                                </select>
                                <?= form_error('semester', '<div class="text-small text-danger">', '</div>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="">Bobot SKS</label>
                                <select class="form-control">
                                    <option>2 SKS</option>
                                    <option>4 SKS</option>
                                </select>
                                <?= form_error('bobot_sks', '<div class="text-small text-danger">', '</div>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Upload Dokumen</label> <br>
                                <input type="file" id="exampleInputFile">
                            </div>
                            <div class="modal-footer">
                                <button type="reset" class="btn btn-default"><i class="fa fa-trash"></i> Reset</button>
                                <button type="button" class="btn btn-primary"><i class="fa fa-save"></i> Submit</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div> -->
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
                        <td><?= $doc->kode_matakuliah ?></td>
                        <td><?= $doc->nama_matakuliah ?></td>
                        <td><?= $doc->semester ?></td>
                        <td><?= $doc->bobot_sks ?></td>
                        <td><?= $doc->dokumen ?></td>
                        <td>
                            <button data-toggle="modal" data-target="#edit<?= $doc->id_dokumentasirps ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                            <a href="<?= base_url('c_dokumentasirps/delete/' . $doc->id_dokumentasirps) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>


<!-- Modal Edit -->
<?php foreach ($dokumentasirps as $doc) : ?>
    <div class="modal fade" id="edit<?= $doc->id_dokumentasirps ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Dokumentasi RPS</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('C_dokumentasirps/edit/' . $doc->id_dokumentasirps) ?>" method="POST">
                        <div class="form-group">
                            <label for="">Nama Matakuliah</label>
                            <input type="Text" class="form-control" name="nama_matakuliah" value="<?= $doc->nama_matakuliah ?>" placeholder="Nama Matakuliah">
                            <?= form_error('nama_matakuliah', '<div class="text-small text-danger">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="">Kode Matakuliah</label>
                            <input type="Text" class="form-control" name="kode_matakuliah" value="<?= $doc->kode_matakuliah ?>" placeholder="Kode Matakuliah">
                            <?= form_error('kode_matakuliah', '<div class="text-small text-danger">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="">Semester</label>
                            <input type="Text" class="form-control" name="semester" value="<?= $doc->semester ?>" placeholder="semester">
                            <?= form_error('semester', '<div class="text-small text-danger">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="">Bobot SKS</label>
                            <input type="Text" class="form-control" name="bobot_sks" value="<?= $doc->bobot_sks ?>" placeholder="Bobot SKS">
                            <?= form_error('bobot_sks', '<div class="text-small text-danger">', '</div>'); ?>
                        </div>
                        <!-- Upload File -->
                        <div class="form-group">
                            <label for="exampleInputFile">Upload Dokumen</label> <br>
                            <input type="file" id="exampleInputFile" name="dokument" value="<?= $doc->dokumen ?>">
                        </div>
                        <!-- button -->
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-danger"><i class="fa fa-trash"></i> Reset</button>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- End Modal Edit -->