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
              <?php echo form_open_multipart('admin/kelas/insertdata') ?>

                <div class="row">
                  <div class="col-sm-3">
                  <div class="form-group">
                    <label>Kelas</label>
                    <input name="nama_kelas" value="<?= old('nama_kelas') ?>" placeholder="Kelas" class="form-control">
                    <p class="text-danger"><?= $validation->hasError('nama_kelas') ? $validation->getError('nama_kelas') : '' ?></p>
                  </div>
                  </div>
                  <div class="col-sm-3">
                  <div class="form-group">
                    <label>Kelas</label>
                    <select class="form-control" name="id_tingkat" required>
                        <option value="">-- Pilih Tingkat --</option>
                        <?php foreach ($tingkat as $row) : ?>
                            <option value="<?= $row['id_tingkat']; ?>"><?= $row['tingkat']; ?></option>
                        <?php endforeach; ?>
                    </select>
                  </div>                        
                  </div>
               </div>
            <button class="btn btn-primary btn-flat" type="submit">Simpan</button>
            <a href="<?= base_url('admin/kelas') ?>"class="btn btn-success btn-flat">Kembali</a>

              <?php echo form_close() ?>

        </div>
    </div>
</div>