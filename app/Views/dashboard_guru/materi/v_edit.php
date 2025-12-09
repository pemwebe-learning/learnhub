<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h4>Materi - <?= $mapel['nama_mapel'] ?></h4>
            <a href="<?= base_url('guru/materi/' . $mapel['id_mapel'] . '/input') ?>" 
              class="btn btn-primary mb-3">Tambah Materi</a>

          <table class="table table-bordered">
              <thead>
                  <tr>
                      <th>No</th>
                      <th>Judul</th>
                      <th>Link</th>
                      <th>Aksi</th>
                  </tr>
              </thead>
              <tbody>
                  <?php $no=1; foreach ($materi as $m) : ?>
                  <tr>
                      <td><?= $no++ ?></td>
                      <td><?= $m['judul_materi'] ?></td>
                      <td><a href="<?= $m['link_materi'] ?>" target="_blank">Buka</a></td>
                      <td>
                          <a href="<?= base_url('guru/materi/edit/' . $mapel['id_mapel'] . '/' . $m['id_materi']) ?>" class="btn btn-warning btn-sm">Edit</a>

                          <a href="<?= base_url('guru/materi/delete/' . $mapel['id_mapel'] . '/' . $m['id_materi']) ?>" 
                            class="btn btn-danger btn-sm"
                            onclick="return confirm('Yakin hapus?')">Hapus</a>
                      </td>
                  </tr>
                  <?php endforeach ?>
              </tbody>
          </table>

        </div>
      </div>
    </div>
  </div>
</div>
