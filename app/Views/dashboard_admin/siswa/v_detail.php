<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title"><?= $judul ?></h3>
        </div>

        <div class="card-body">
            <div class="row">

                <!-- FOTO DI TENGAH + JARAK -->
                <div class="col-sm-12 text-center mb-4">
                    <img src="<?= base_url('uploads/siswa/' . $siswa['foto']) ?>" 
                         width="200px" class="img-thumbnail">
                </div>

                <!-- TABEL -->
                <div class="col-sm-12">
                    <table class="table table-bordered">
                        <tr>
                            <th>Nama Siswa</th>
                            <th width="30px">:</th>
                            <td><?= $siswa['nama_siswa'] ?></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <th>:</th>
                            <td><?= $siswa['email'] ?></td>
                        </tr>
                        <tr>
                            <th>Alamat Rumah</th>
                            <th>:</th>
                            <td><?= $siswa['alamat'] ?></td>
                        </tr>
                        <tr>
                            <th>Jenis Kelamin</th>
                            <th>:</th>
                            <td><?= $siswa['jenis_kelamin'] ?></td>
                        </tr>
                        <tr>
                            <th>Nomor HP</th>
                            <th>:</th>
                            <td><?= $siswa['no_hp'] ?></td>
                        </tr>
                        <tr>
                            <th>Password</th>
                            <th>:</th>
                            <td><?= $siswa['password'] ?></td>
                        </tr>
                        <tr>
                            <th>Kelas</th>
                            <th>:</th>
                            <td><?= $siswa['nama_kelas'] ?></td>
                        </tr>
                    </table>

                    <a href="<?= base_url('admin/siswa') ?>" class="btn btn-success btn-flat">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
