<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h3 class="card-title mb-0">Data kelas</h3>
          <a href="<?= base_url('admin/kelas/input') ?>" class="btn btn-flat btn-primary btn-sm">
          <i class="fas fa-plus"></i> Tambah
          </a>
        </div>
        

        <div class="card-body p-0">
          <table class="table table-bordered table-hover mb-0 text-center align-middle">
            <thead class="table-dark">
              <tr>
                <th style="width: 100px">No</th>
                <th style="width: 500px;">Kelas</th>
                <th style="width: 500px;">Tingkat</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php if (!empty($kelas)): ?>
            <?php foreach ($detail_kelas as $i => $a): ?>
                <tr>
                    <td><?= $i + 1 ?></td>
                    <td><?= esc($a['nama_kelas']) ?></td>
                    <td><?= esc($a['tingkat']) ?></td>
                    <td>
                    <a href="<?= base_url('admin/kelas/edit/'. $a['id_kelas']) ?>" class="btn btn-warning btn-sm" title="Edit">
                      <i class="fas fa-edit"></i>
                    </a>
                    <a href="<?= base_url('admin/kelas/delete/'. $a['id_kelas']) ?>" class="btn btn-danger btn-sm" title="Hapus" onclick="return confirm('Yakin ingin menghapus data ini?');">
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
