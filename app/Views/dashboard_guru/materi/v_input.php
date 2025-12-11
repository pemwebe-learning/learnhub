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
              <?php echo form_open_multipart('guru/materi/insertdata') ?>

                <div class="row">
                  <div class="col-sm-3">
                  <div class="form-group">
                    <label>judul materi</label>
                    <input name="judul_materi" value="<?= old('link_materi') ?>" placeholder="judul materi" class="form-control">
                    <p class="text-danger"><?= $validation->hasError('judul_materi') ? $validation->getError('judul_materi') : '' ?></p>
                  </div>
                  </div>
                  <div class="col-sm-3">
                  <div class="form-group">
                    <label>Link Materi</label>
                    <input name="link_materi" value="<?= old('link_materi') ?>" placeholder="Kelas" class="form-control">
                    <p class="text-danger"><?= $validation->hasError('link_materi') ? $validation->getError('link_materi') : '' ?></p>
                  </div>
                  </div>
                  <div class="col-sm-3">
                  <div class="form-group">
                    <label>Kelas</label>
                    <input value="<?= $mapel['nama_mapel'] ?>" placeholder="Kelas" class="form-control" readonly>
                  </div>
                  </div>
                  <input type="hidden" name="id_mapel" value="<?= $mapel['id_mapel'] ?>">
               </div>
            <button class="btn btn-primary btn-flat" type="submit">Simpan</button>
            <a href="<?= base_url('guru/materi/'. $mapel['id_mapel']) ?>"class="btn btn-success btn-flat">Kembali</a>

              <?php echo form_close() ?>

        </div>
    </div>
</div>