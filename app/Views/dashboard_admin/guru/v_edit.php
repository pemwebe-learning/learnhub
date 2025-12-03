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
              <?php echo form_open_multipart('admin/guru/update/'. $guru['id_guru']) ?>

               <div class="row">
                  <div class="col-sm-3">
                  <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" value="<?= $guru['email'] ?>" placeholder="email" class="form-control <?= isset(session('errors')['email']) ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?= session('errors')['email'] ?? '' ?>
                    </div>
                  </div>
                  </div>
                  <div class="col-sm-3">
                  <div class="form-group">
                    <label>password</label>
                    <input type="password" name="password"
                        placeholder="Kosongkan jika tidak ingin mengganti password"
                        class="form-control <?= isset(session('errors')['password']) ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?= session('errors')['password'] ?? '' ?>
                    </div>
                  </div>                        
                  </div>

                  <div class="col-sm-3">
                  <div class="form-group">
                    <label>Nama Admin</label>
                    <input type="text" name="nama_admin" value="<?= $guru['nama_guru'] ?>" placeholder="Nama" class="form-control <?= isset(session('errors')['nama_guru']) ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?= session('errors')['nama_guru'] ?? '' ?>
                    </div>
                  </div>                        
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-3">
                  <div class="form-group">
                    <label>alamat</label>
                    <input type="text" name="alamat" value="<?= $guru['alamat'] ?>" placeholder="alamat" class="form-control <?= isset(session('errors')['alamat']) ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?= session('errors')['alamat'] ?? '' ?>
                    </div>
                  </div>
                  </div>

                  <div class="col-sm-3">
                  <div class="form-group">
                    <label>jenis kelamin</label>
                    <input type="text" name="jenis_kelamin" value="<?= $guru['jenis_kelamin'] ?>" placeholder="jenis kelamin" class="form-control <?= isset(session('errors')['jenis_kelamin']) ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?= session('errors')['jenis_kelamin'] ?? '' ?>
                    </div>
                  </div>                        
                  </div>

                  <div class="col-sm-3">
                  <div class="form-group">
                    <label>no hp</label>
                    <input type="text" name="no_hp" value="<?= $guru['no_hp'] ?>" placeholder="nomor hp" class="form-control <?= isset(session('errors')['no_hp']) ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?= session('errors')['no_hp'] ?? '' ?>
                    </div>
                  </div>                        
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-3">
                    <div class="form-group">
                      <div class="form-group">
                        <label>Foto</label>
                        <div>
                        <img type="image" src="<?= base_url('uploads/guru/'. $guru['foto']) ?>" width="250px">
                        </div>
                        <input type="file" name="foto" class="form-control">
                        <small class="text-muted">Kosongkan jika tidak ingin mengganti foto.</small>
                    </div>
                    
                    </div>
                  </div>    
                </div>          
            <button class="btn btn-primary btn-flat" type="submit">Simpan</button>
            <a href="<?= base_url('admin/guru') ?>"class="btn btn-success btn-flat">Kembali</a>

              <?php echo form_close() ?>

        </div>
    </div>
</div>