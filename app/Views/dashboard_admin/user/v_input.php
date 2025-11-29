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
              <?php echo form_open_multipart('admin/user/insertdata') ?>

               <div class="row">
                  <div class="col-sm-3">
                  <div class="form-group">
                    <label>Email</label>
                    <input name="email" value="<?= old('email') ?>" placeholder="Email" class="form-control">
                    <p class="text-danger"><?= $validation->hasError('email') ? $validation->getError('email') : '' ?></p>
                  </div>
                  </div>

                  <div class="col-sm-3">
                  <div class="form-group">
                    <label>password</label>
                    <input name="password" value="<?= old('password') ?>" placeholder="password" class="form-control">
                    <p class="text-danger"><?= $validation->hasError('password') ? $validation->getError('password') : '' ?></p>
                  </div>                        
                  </div>

                  <div class="col-sm-3">
                  <div class="form-group">
                    <label>Nama Admin</label>
                    <input name="nama_admin" value="<?= old('nama_admin') ?>" placeholder="nama_admin" class="form-control">
                    <p class="text-danger"><?= $validation->hasError('nama_admin') ? $validation->getError('nama_admin') : '' ?></p>
                  </div>                        
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-3">
                  <div class="form-group">
                    <label>alamat</label>
                    <input name="alamat" value="<?= old('alamat') ?>" placeholder="alamat" class="form-control">
                    <p class="text-danger"><?= $validation->hasError('alamat') ? $validation->getError('alamat') : '' ?></p>
                  </div>
                  </div>

                  <div class="col-sm-3">
                  <div class="form-group">
                    <label>jenis kelamin</label>
                    <input name="jenis_kelamin" value="<?= old('jenis_kelamin') ?>" placeholder="jenis_kelamin" class="form-control">
                    <p class="text-danger"><?= $validation->hasError('jenis_kelamin') ? $validation->getError('jenis_kelamin') : '' ?></p>
                  </div>                        
                  </div>

                  <div class="col-sm-3">
                  <div class="form-group">
                    <label>no hp</label>
                    <input name="no_hp" value="<?= old('no_hp') ?>" placeholder="no_hp" class="form-control">
                    <p class="text-danger"><?= $validation->hasError('no_hp') ? $validation->getError('no_hp') : '' ?></p>
                  </div>                        
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-3">
                    <div class="form-group">
                      <input name="foto" type="file" accept="image/*" class="form-control" placeholder="masukan foto" required>
                    </div>
                  </div>
                  
                </div>          
            <button class="btn btn-primary btn-flat" type="submit">Simpan</button>
            <a href="<?= base_url('admin/user') ?>"class="btn btn-success btn-flat">Kembali</a>

              <?php echo form_close() ?>

        </div>
    </div>
</div>