<?php
include '../config/koneksi.php';

$db = new Database();
// $db->tampil_data();
// echo "Hello World";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <title>OOP</title>
    <style>
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
</head>

<body>
    <div class="container p-4">
        <h1 class="text-center m-4">DATA SISWA</h1>

        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h5 class="">Data Siswa</h5>
                <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalTambah">Tambah Siswa</button>
            </div>
            <div class="card-body">
                <table class="table mt-4">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIS</th>
                            <th>Nama</th>
                            <th>Tanggal Lahir</th>
                            <th>Alamat</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($db->tampil_data() as $siswa) {
                        ?>
                            <tr>
                                <th scope="row"><?= $no++ ?></th>
                                <td><?= $siswa['nis'] ?></td>
                                <td><?= $siswa['nama'] ?></td>
                                <td><?= $siswa['tgl_lahir'] ?></td>
                                <td><?= $siswa['alamat'] ?></td>
                                <td>
                                    <!-- Modal Edit -->
                                    <div class="modal fade" id="modalEdit<?= $siswa['id'] ?>" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="modalEditLabel">Edit Data <?= $siswa['nama'] ?></h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="proses.php?aksi=update" method="POST">
                                                    <div class="modal-body">

                                                        <input type="hidden" name="id" value="<?= $siswa['id'] ?>">
                                                        <div class="mb-3 col-12">
                                                            <label for="edit_nis" class="form-label">NIS</label>
                                                            <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="number" maxlength="8" class="form-control" id="edit_nis" name="nis" value="<?= $siswa['nis'] ?>">
                                                        </div>
                                                        <div class="mb-3 col-12">
                                                            <label for="edit_nama" class="form-label">Nama</label>
                                                            <input type="text" class="form-control" id="edit_nama" name="nama" value="<?= $siswa['nama'] ?>">
                                                        </div>
                                                        <div class="mb-3 col-12">
                                                            <label for="edit_tgl_lahir" class="form-label">Tanggal Lahir</label>
                                                            <input name="tgl_lahir" type="date" id="edit_tgl_lahir" value="<?= $siswa['tgl_lahir'] ?>" class="form-control">
                                                        </div>
                                                        <div class="mb-3 col-12">
                                                            <label for="edit_alamat" class="form-label">Alamat</label>
                                                            <input type="text" name="alamat" id="edit_alamat" class="form-control" value="<?= $siswa['alamat'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type=" submit" class="btn btn-primary">Edit!</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Button Aksi -->
                                    <button data-bs-toggle="modal" data-bs-target="#modalEdit<?= $siswa['id'] ?>" class="btn btn-warning btn-sm">Edit</button>
                                    <a href="proses.php?id=<?= $siswa['id'] ?>&aksi=hapus" onclick="return confirm('Yakin ingin menghapus?')" class="btn btn-danger btn-sm">Hapus</a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Modal Tambah -->
        <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="modalTambahLabel">Tambah Data Siswa</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="proses.php?aksi=tambah" method="POST">
                        <div class="modal-body">
                            <div class="mb-3 col-12">
                                <label for="nis" class="form-label">NIS</label>
                                <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="number" maxlength="8" class="form-control" id="nis" name="nis">
                            </div>
                            <div class="mb-3 col-12">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama" required>
                            </div>
                            <div class="mb-3 col-12">
                                <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                                <input name="tgl_lahir" type="date" id="tgl_lahir" class="form-control" required>
                            </div>
                            <div class="mb-3 col-12">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input name="alamat" id="alamat" type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Tambah Data!</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>


    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>