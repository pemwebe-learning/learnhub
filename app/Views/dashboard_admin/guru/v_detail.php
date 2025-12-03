<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title"><?= $judul ?></h3>
        </div>

        <div class="card-body">
            <div class="row">

                <!-- FOTO DI TENGAH + JARAK -->
                <div class="col-sm-12 text-center mb-4">
                    <img src="<?= base_url('uploads/guru/' . $guru['foto']) ?>" 
                         width="200px" class="img-thumbnail">
                </div>

                <!-- TABEL -->
                <div class="col-sm-12">
                    <table class="table table-bordered">
                        <tr>
                            <th>Nama Admin</th>
                            <th width="30px">:</th>
                            <td><?= $guru['nama_guru'] ?></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <th>:</th>
                            <td><?= $guru['email'] ?></td>
                        </tr>
                        <tr>
                            <th>Alamat Rumah</th>
                            <th>:</th>
                            <td><?= $guru['alamat'] ?></td>
                        </tr>
                        <tr>
                            <th>Jenis Kelamin</th>
                            <th>:</th>
                            <td><?= $guru['jenis_kelamin'] ?></td>
                        </tr>
                        <tr>
                            <th>Nomor HP</th>
                            <th>:</th>
                            <td><?= $guru['no_hp'] ?></td>
                        </tr>
                        <tr>
                            <th>Password</th>
                            <th>:</th>
                            <td><?= $guru['password'] ?></td>
                        </tr>
                    </table>

                    <a href="<?= base_url('admin/user') ?>" class="btn btn-success btn-flat">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
