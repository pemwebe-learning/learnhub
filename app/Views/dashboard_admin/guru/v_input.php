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
              <?php echo form_open_multipart('Rumah/InsertData') ?>

               <div class="row">
                  <div class="col-sm-3">
                  <div class="form-group">
                    <label>Nama Rumah</label>
                    <input name="rumah" value="<?= old('rumah') ?>" placeholder="Nama Rumah" class="form-control">
                    <p class="text-danger"><?= $validation->hasError('rumah') ? $validation->getError('rumah') : '' ?></p>
                  </div>
                  </div>

                  <div class="col-sm-3">
                  <div class="form-group">
                    <label>NIK</label>
                    <input name="nik" value="<?= old('nik') ?>" placeholder="NIK" class="form-control">
                    <p class="text-danger"><?= $validation->hasError('nik') ? $validation->getError('nik') : '' ?></p>
                  </div>                        
                  </div>

                  <div class="col-sm-3">
                  <div class="form-group">
                    <label>Mata Pencaharian</label>
                    <input name="mata_pencaharian" value="<?= old('mata_pencaharian') ?>" placeholder="Mata Pencaharian" class="form-control">
                    <p class="text-danger"><?= $validation->hasError('mata_pencaharian') ? $validation->getError('mata_pencaharian') : '' ?></p>
                  </div>                        
                  </div>

                  <div class="col-sm-3">
                  <div class="form-group">
                    <label>Keterangan</label>
                    <select name="id_keterangan" class="form-control">
                    <option value="">--Pilih Keterangan--</option>
                    <?php foreach ($keterangan as $key => $value) { ?>
                    <option value="<?= $value['id_keterangan'] ?>" <?= old('id_keterangan') == $value['id_keterangan'] ? 'selected' : '' ?>>
                    <?= $value['keterangan'] ?>
                    </option>
                    <?php } ?>
                    </select>
                    <p class="text-danger"><?= $validation->hasError('id_keterangan') ? $validation->getError('id_keterangan') : '' ?></p>
                  </div>                        
                  </div>
                </div>           
            <button class="btn btn-primary btn-flat" type="submit">Simpan</button>
            <a href="<?= base_url('Rumah') ?>"class="btn btn-success btn-flat">Kembali</a>

              <?php echo form_close() ?>

        </div>
    </div>
</div>