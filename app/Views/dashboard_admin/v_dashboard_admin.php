<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h1 class="card-title">SELAMAT DATANG <?= session()->get('nama_admin') ?></h1>
        </div>

        <div class="card-body">
            <div class="row">

                <!-- FOTO DI TENGAH + JARAK -->
                <div class="col-sm-12 text-center mb-4">
                    <img src="<?= base_url('uploads/admin/' . session()->get('foto')) ?>" 
                         width="200px" class="img-thumbnail">
                </div>

                <!-- TABEL -->
                <div class="col-sm-12">
                    <table class="table table-bordered">
                        <tr>
                            <th>Nama Admin</th>
                            <th width="30px">:</th>
                            <td><?= session()->get('nama_admin') ?></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <th>:</th>
                            <td><?= session()->get('email') ?></td>
                        </tr>
                        <tr>
                            <th>Alamat Rumah</th>
                            <th>:</th>
                            <td><?= session()->get('alamat') ?></td>
                        </tr>
                        <tr>
                            <th>Jenis Kelamin</th>
                            <th>:</th>
                            <td><?= session()->get('jenis_kelamin') ?></td>
                        </tr>
                        <tr>
                            <th>Nomor HP</th>
                            <th>:</th>
                            <td><?= session()->get('no_hp') ?></td>
                        </tr>
                    </table>

                    <a href="<?= base_url('admin/user/edit/'. session()->get('id_admin')) ?>" class="btn btn-success btn-flat">
                      <i class="fas-fa-edit"></i>Edit Profile</a>
                </div>
            </div>
        </div>
    </div>
</div>
