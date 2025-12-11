<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title"><?= $judul ?></h3>
        </div>

        <div class="card-body">
            <?php 
            session();
            $validation = \Config\Services::validation();
            ?>

            <?= form_open_multipart('siswa/update/' . session()->get('id_siswa')) ?>

            <div class="row">
                <!-- Email -->
                <div class="col-sm-3">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" 
                               name="email" 
                               value="<?= $detail_siswa['email'] ?>" 
                               class="form-control <?= isset(session('errors')['email']) ? 'is-invalid' : '' ?>">
                        <div class="invalid-feedback">
                            <?= session('errors')['email'] ?? '' ?>
                        </div>
                    </div>
                </div>

                <!-- Password -->
                <div class="col-sm-3">
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" 
                               name="password"
                               placeholder="Kosongkan jika tidak ingin mengganti password"
                               class="form-control <?= isset(session('errors')['password']) ? 'is-invalid' : '' ?>">
                        <div class="invalid-feedback">
                            <?= session('errors')['password'] ?? '' ?>
                        </div>
                    </div>
                </div>

                <!-- Nama Siswa -->
                <div class="col-sm-3">
                    <div class="form-group">
                        <label>Nama Siswa</label>
                        <input type="text" 
                               name="nama_siswa" 
                               value="<?= $detail_siswa['nama_siswa'] ?>" 
                               class="form-control <?= isset(session('errors')['nama_siswa']) ? 'is-invalid' : '' ?>">
                        <div class="invalid-feedback">
                            <?= session('errors')['nama_siswa'] ?? '' ?>
                        </div>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group">
                        <label>Alamat Siswa</label>
                        <input type="text" 
                               name="alamat" 
                               value="<?= $detail_siswa['alamat'] ?>" 
                               class="form-control <?= isset(session('errors')['alamat']) ? 'is-invalid' : '' ?>">
                        <div class="invalid-feedback">
                            <?= session('errors')['alamat'] ?? '' ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">

                <!-- Dropdown Jenis Kelamin -->
                <div class="col-sm-3">
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <input type="text" 
                               name="jenis_kelamin" 
                               value="<?= $detail_siswa['jenis_kelamin'] ?>" 
                               class="form-control <?= isset(session('errors')['jenis_kelamin']) ? 'is-invalid' : '' ?>">
                        <div class="invalid-feedback">
                            <?= session('errors')['jenis_kelamin'] ?? '' ?>
                        </div>
                    </div>
                </div>

                <!-- Dropdown Kelas -->
                <div class="col-sm-3">
                    <div class="form-group">
                        <label>Kelas</label>
                        <select name="id_kelas" 
                                class="form-control <?= isset(session('errors')['id_kelas']) ? 'is-invalid' : '' ?>">
                            <option value="">-- Pilih Kelas --</option>
                            <?php foreach ($kelas as $k): ?>
                                <option value="<?= $k['id_kelas'] ?>" 
                                    <?= $detail_siswa['id_kelas'] == $k['id_kelas'] ? 'selected' : '' ?>>
                                    <?= $k['nama_kelas'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= session('errors')['id_kelas'] ?? '' ?>
                        </div>
                    </div>
                </div>

                <!-- No HP -->
                <div class="col-sm-3">
                    <div class="form-group">
                        <label>No HP</label>
                        <input type="text" 
                               name="no_hp" 
                               value="<?= $detail_siswa['no_hp'] ?>" 
                               class="form-control <?= isset(session('errors')['no_hp']) ? 'is-invalid' : '' ?>">
                        <div class="invalid-feedback">
                            <?= session('errors')['no_hp'] ?? '' ?>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
                <!-- Foto -->
                <div class="col-sm-3">
                    <div class="form-group">
                        <label>Foto</label>
                        <div>
                            <img src="<?= base_url('uploads/siswa/' . $detail_siswa['foto']) ?>" 
                                 width="150px" class="img-thumbnail mb-2">
                        </div>
                        <input type="file" name="foto" class="form-control">
                        <small class="text-muted">Kosongkan jika tidak ingin mengganti foto.</small>
                    </div>
                </div>
            </div>

            <button class="btn btn-primary btn-flat" type="submit">Simpan</button>
            <a href="<?= base_url('siswa/dashboard') ?>" class="btn btn-success btn-flat">Kembali</a>

            <?= form_close() ?>
        </div>
    </div>
</div>
