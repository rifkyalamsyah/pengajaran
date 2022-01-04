<!DOCTYPE html>
<html lang="en">

<head>
    <title>Pengajaran</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
        .row.content {
            height: 1500px
        }

        /* Set gray background color and 100% height */
        .sidenav {
            background-color: #f1f1f1;
            height: 100%;
        }

        /* Set black background color, white text and some padding */
        footer {
            background-color: #555;
            color: white;
            padding: 15px;
        }

        /* On small screens, set height to 'auto' for sidenav and grid */
        @media screen and (max-width: 767px) {
            .sidenav {
                height: auto;
                padding: 15px;
            }

            .row.content {
                height: auto;
            }
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row content">
            <div class="col-sm-3 sidenav">
                <h4>App Prodi</h4>
                <ul class="nav nav-pills nav-stacked">
                    <li class="active"><a href="#section1">Pengajaran</a></li>

                </ul><br>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search Blog..">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </span>
                </div>
            </div>

            <div class="col-sm-9">
                <h3>Dokumentasi RPS</h3>
                <hr>

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                    Tambah Data
                </button>

                <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Tambah Data </h4>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="form-group">
                                        <label for="">Nama Matakuliah</label>
                                        <input type="Text" class="form-control" id="" placeholder="Nama Matakuliah">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Kode Matakuliah</label>
                                        <input type="Text" class="form-control" id="" placeholder="Kode Matakuliah">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Semester</label>
                                        <select class="form-control">
                                            <option>Ganjil</option>
                                            <option>Genap</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Bobot SKS</label>
                                        <select class="form-control">
                                            <option>2 SKS</option>
                                            <option>4 SKS</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">Upload Dokumen</label>
                                        <input type="file" id="exampleInputFile">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="reset" class="btn btn-default">Reset</button>
                                        <button type="button" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>

                <table class="table table-bordered">
                    <thead class="text-center">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Kode Matakuliah</th>
                            <th scope="col">Nama Matakuliah</th>
                            <th scope="col">Semester</th>
                            <th scope="col">Bobot SKS</th>
                            <th scope="col">Dokumen</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>DT001</td>
                            <td>Pemrograman Web 2</td>
                            <td>Ganjil</td>
                            <td>4 SKS</td>
                            <td></td>
                            <td>
                                <button type="button" class="btn btn-success">Edit</button>
                                <button type="button" class="btn btn-danger">Hapus</button>
                            </td>
                        </tr>

                    </tbody>
                </table>

                <br>
                <h3>Soal Ujian</h3>
                <hr>

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                    Tambah Data
                </button>

                <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Tambah Data Soal Ujian</h4>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="form-group">
                                        <label for="">Nama Matakuliah</label>
                                        <input type="Text" class="form-control" id="" placeholder="Nama Matakuliah">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Kode Matakuliah</label>
                                        <input type="Text" class="form-control" id="" placeholder="Kode Matakuliah">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Semester</label>
                                        <select class="form-control">
                                            <option>Ganjil</option>
                                            <option>Genap</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Jenis Soal</label>
                                        <select class="form-control">
                                            <option>Individu</option>
                                            <option>Final Project</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">Upload Dokumen</label>
                                        <input type="file" id="exampleInputFile">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="reset" class="btn btn-default">Reset</button>
                                        <button type="button" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <table class="table table-bordered">
                    <thead class="text-center">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Kode Matakuliah</th>
                            <th scope="col">Nama Matakuliah</th>
                            <th scope="col">Semester</th>
                            <th scope="col">Jenis Soal</th>
                            <th scope="col">Dokumen</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>DT001</td>
                            <td>Pemrograman Web 2</td>
                            <td>Ganjil</td>
                            <td>Final Project</td>
                            <td></td>
                            <td>
                                <button type="button" class="btn btn-success">Edit</button>
                                <button type="button" class="btn btn-danger">Hapus</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <footer class="container-fluid">
        <p>Footer Text</p>
    </footer>

</body>

</html>