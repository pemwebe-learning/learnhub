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
              <?php echo form_open_multipart('admin/mapel/insertdata') ?>

                <div class="row">
                  <div class="col-sm-4">
                  <div class="form-group">
                    <label>Kelas</label>
                    <input name="nama_mapel" value="<?= old('nama_mapel') ?>" placeholder="nama mapel" class="form-control">
                    <p class="text-danger"><?= $validation->hasError('nama_mapel') ? $validation->getError('nama_mapel') : '' ?></p>
                  </div>
                  </div>
                  <div class="col-sm-4">
                  <div class="form-group">
                    <label>Kelas</label>
                    <select class="form-control" name="id_kelas" required>
                        <option value="">-- Pilih Kelas --</option>
                        <?php foreach ($detail_kelas as $row) : ?>
                            <option value="<?= $row['id_kelas']; ?>"><?= $row['nama_kelas']; ?></option>
                        <?php endforeach; ?>
                    </select>
                  </div>                        
                  </div>
                   <div class="col-sm-4">
                  <div class="form-group">
                    <label>Kelas</label>
                    <select class="form-control" name="id_guru" required>
                        <option value="">-- Pilih Guru --</option>
                        <?php foreach ($detail_guru as $row) : ?>
                            <option value="<?= $row['id_guru']; ?>"><?= $row['nama_guru']; ?></option>
                        <?php endforeach; ?>
                    </select>
                  </div>                        
                  </div>
               </div>
            <button class="btn btn-primary btn-flat" type="submit">Simpan</button>
            <a href="<?= base_url('admin/mapel') ?>"class="btn btn-success btn-flat">Kembali</a>

              <?php echo form_close() ?>

        </div>
    </div>
</div>