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
              <?php echo form_open_multipart('admin/mapel/update/'. $mapel['id_mapel']) ?>

                <div class="row">
                  <div class="col-sm-4">
                  <div class="form-group">
                    <label>Kelas</label>
                    <input name="nama_mapel" value="<?= $mapel['nama_mapel'] ?>" placeholder="Nama Mapel" class="form-control">
                    <p class="text-danger"><?= $validation->hasError('nama_mapel') ? $validation->getError('nama_mapel') : '' ?></p>
                  </div>
                  </div>
                  <div class="col-sm-4">
                  <div class="form-group">
                    <label>Guru</label>
                    <select class="form-control" name="id_guru" required>
                        <option value="">-- Pilih Guru --</option>
                        <?php foreach ($detail_guru as $key => $value) { ?>
                        <option value="<?= $value['id_guru'] ?>" <?= $value['id_guru'] == $mapel['id_guru'] ? 'selected' : '' ?>><?= $value['nama_guru'] ?></option>
                        <?php } ?>
                    </select>
                  </div>                        
                  </div>
                  <div class="col-sm-4">
                  <div class="form-group">
                    <label>Kelas</label>
                    <select class="form-control" name="id_kelas" required>
                        <option value="">-- Pilih Kelas --</option>
                        <?php foreach ($detail_kelas as $key => $value) { ?>
                        <option value="<?= $value['id_kelas'] ?>" <?= $value['id_kelas'] == $mapel['id_kelas'] ? 'selected' : '' ?>><?= $value['nama_kelas'] ?></option>
                        <?php } ?>
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