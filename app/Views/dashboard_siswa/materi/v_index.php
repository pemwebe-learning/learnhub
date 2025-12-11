<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h3 class="card-title mb-0">Materi - <?= $mapel['nama_mapel'] ?></h3>
          <a href="<?= base_url('guru/materi/'.$mapel['id_mapel'].'/input') ?>" class="btn btn-flat btn-primary btn-sm">
          <i class="fas fa-plus"></i> Tambah
          </a>
        </div>
        
          <table class="table table-bordered table-hover mb-0 text-center align-middle">
              <thead class="table-dark">
                  <tr>
                      <th style="width: 100px;;">No Materi</th>
                      <th>Judul</th>
                      <th>Link</th>
                  </tr>
              </thead>
              <tbody>
                  <?php $no=1; foreach ($materi as $m) : ?>
                    <?php
                    $link = $m['link_materi'];

                    // Jika tidak dimulai dengan http atau https → tambahkan https://
                    if (!preg_match('/^https?:\/\//', $link)) {
                        $link = 'https://' . $link;
                    }
                    ?>
                  <tr>
                      <td><?= $no++ ?></td>
                      <td><?= $m['judul_materi'] ?></td>
                      <td><a href="<?= esc($link) ?>" target="_blank" rel="noopener noreferrer">Buka</a></td>
                  </tr>
                  <?php endforeach ?>
              </tbody>
          </table>
      </div>
      <a href="<?= base_url('siswa/mapel') ?>"class="btn btn-success btn-flat">Kembali</a>
    </div>
  </div>
</div>
