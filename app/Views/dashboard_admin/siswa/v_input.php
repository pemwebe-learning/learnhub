<div class="col-md-12">
    <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title"><?= $judul ?></h3>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <?php 
              session();
              $validation = \Config\Services::validation();
              ?>
              <?php echo form_open_multipart('admin/siswa/insertdata') ?>

               <div class="row">
                  <div class="col-sm-4">
                  <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" value="<?= old('email') ?>" placeholder="email" class="form-control <?= isset(session('errors')['email']) ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?= session('errors')['email'] ?? '' ?>
                    </div>
                  </div>
                  </div>
                  <div class="col-sm-4">
                  <div class="form-group">
                    <label>password</label>
                    <input type="text" name="password" value="<?= old('password') ?>" placeholder="password" class="form-control <?= isset(session('errors')['password']) ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?= session('errors')['password'] ?? '' ?>
                    </div>
                  </div>                        
                  </div>

                  <div class="col-sm-4">
                  <div class="form-group">
                    <label>Nama Siswa</label>
                    <input type="text" name="nama_siswa" value="<?= old('nama_siswa') ?>" placeholder="Nama" class="form-control <?= isset(session('errors')['nama_siswa']) ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?= session('errors')['nama_siswa'] ?? '' ?>
                    </div>
                  </div>                        
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-4">
                  <div class="form-group">
                    <label>alamat</label>
                    <input type="text" name="alamat" value="<?= old('alamat') ?>" placeholder="alamat" class="form-control <?= isset(session('errors')['alamat']) ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?= session('errors')['alamat'] ?? '' ?>
                    </div>
                  </div>
                  </div>

                  <div class="col-sm-4">
                  <div class="form-group">
                    <label>jenis kelamin</label>
                    <input type="text" name="jenis_kelamin" value="<?= old('jenis_kelamin') ?>" placeholder="jenis kelamin" class="form-control <?= isset(session('errors')['jenis_kelamin']) ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?= session('errors')['jenis_kelamin'] ?? '' ?>
                    </div>
                  </div>                        
                  </div>

                  <div class="col-sm-4">
                  <div class="form-group">
                    <label>no hp</label>
                    <input type="text" name="no_hp" value="<?= old('no_hp') ?>" placeholder="nomor hp" class="form-control <?= isset(session('errors')['no_hp']) ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?= session('errors')['no_hp'] ?? '' ?>
                    </div>
                  </div>                        
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-4 mb-4">
                    <select class="form-control" name="id_kelas" required>
                        <option value="">-- Pilih Kelas --</option>
                        <?php foreach ($detail_kelas as $row) : ?>
                            <option value="<?= $row['id_kelas']; ?>"><?= $row['nama_kelas']; ?></option>
                        <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-4">
                    <div class="form-group">
                      <input name="foto" type="file" accept="image/*" class="form-control <?= isset(session('errors')['foto']) ? 'is-invalid' : '' ?>" placeholder="masukan foto">
                      <div class="invalid-feedback">
                          <?= session('errors')['foto'] ?? '' ?>
                      </div>
                    </div>
                  </div>
                  
                </div>          
            <button class="btn btn-primary btn-flat" type="submit">Simpan</button>
            <a href="<?= base_url('admin/user') ?>"class="btn btn-success btn-flat">Kembali</a>

              <?php echo form_close() ?>

        </div>
    </div>
</div>