<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h3 class="card-title mb-0">Data kelas</h3>
          <a href="<?= base_url('admin/mapel/input') ?>" class="btn btn-flat btn-primary btn-sm">
          <i class="fas fa-plus"></i> Tambah
          </a>
        </div>
        

        <div class="card-body p-0">
          <table class="table table-bordered table-hover mb-0 text-center align-middle">
            <thead class="table-dark">
              <tr>
                <th style="width: 100px">No</th>
                <th>Mapel</th>
                <th>kelas</th>
                <th>Guru</th>
                <th style="width: 150px">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php if (!empty($mapel)): ?>
            <?php foreach ($mapel as $i => $a): ?>
                <tr>
                    <td><?= $i + 1 ?></td>
                    <td><?= esc($a['nama_mapel']) ?></td>
                    <td><?= esc($a['nama_guru']) ?></td>
                    <td><?= esc($a['nama_kelas']) ?></td>
                    <td>
                    <a href="<?= base_url('admin/mapel/edit/'. $a['id_mapel']) ?>" class="btn btn-warning btn-sm" title="Edit">
                      <i class="fas fa-edit"></i>
                    </a>
                    <a href="<?= base_url('admin/mapel/delete/'. $a['id_mapel']) ?>" class="btn btn-danger btn-sm" title="Hapus" onclick="return confirm('Yakin ingin menghapus data ini?');">
                      <i class="fas fa-trash"></i>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="7" class="text-center text-muted">Belum ada data kelas.</td></tr>
        <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
