<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title"><?= $judul ?></h3>
        </div>

        <div class="card-body">
            <div class="row">

                <!-- FOTO DI TENGAH + JARAK -->
                <div class="col-sm-12 text-center mb-4">
                    <img src="<?= base_url('uploads/admin/' . $admins['foto']) ?>" 
                         width="200px" class="img-thumbnail">
                </div>

                <!-- TABEL -->
                <div class="col-sm-12">
                    <table class="table table-bordered">
                        <tr>
                            <th>Nama Admin</th>
                            <th width="30px">:</th>
                            <td><?= $admins['nama_admin'] ?></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <th>:</th>
                            <td><?= $admins['email'] ?></td>
                        </tr>
                        <tr>
                            <th>Alamat Rumah</th>
                            <th>:</th>
                            <td><?= $admins['alamat'] ?></td>
                        </tr>
                        <tr>
                            <th>Jenis Kelamin</th>
                            <th>:</th>
                            <td><?= $admins['jenis_kelamin'] ?></td>
                        </tr>
                        <tr>
                            <th>Nomor HP</th>
                            <th>:</th>
                            <td><?= $admins['no_hp'] ?></td>
                        </tr>
                        <tr>
                            <th>Password</th>
                            <th>:</th>
                            <td><?= $admins['password'] ?></td>
                        </tr>
                    </table>

                    <a href="<?= base_url('admin/user') ?>" class="btn btn-success btn-flat">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
