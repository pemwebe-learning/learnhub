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
              <?php echo form_open_multipart('admin/pengumuman/insertdata') ?>

                <div class="row">
                  <div class="col-sm-4">
                  <div class="form-group">
                    <label>Judul</label>
                    <input name="judul_pengumuman" value="<?= old('judul_pengumuman') ?>" placeholder="Kelas" class="form-control">
                    <p class="text-danger"><?= $validation->hasError('judul_pengumuman') ? $validation->getError('judul_penguman') : '' ?></p>
                  </div>
                  </div>
                  </div>
                  <div class="row">
                  <div class="col-sm-12">
                  <div class="form-group">
                    <label>Isi</label>
                    <textarea rows="15" name="isi" value="<?= old('isi') ?>" placeholder="isi" class="form-control"> </textarea>
                    <p class="text-danger"><?= $validation->hasError('isi') ? $validation->getError('isi') : '' ?></p>
                  </div>
                  </div>                 
               </div>
            <button class="btn btn-primary btn-flat" type="submit">Simpan</button>
            <a href="<?= base_url('admin/kelas') ?>"class="btn btn-success btn-flat">Kembali</a>

              <?php echo form_close() ?>

        </div>
    </div>
</div>