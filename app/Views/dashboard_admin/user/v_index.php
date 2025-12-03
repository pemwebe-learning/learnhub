<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h3 class="card-title mb-0">Data Admin</h3>
        <div class="card-tools">
        <a href="<?= base_url('admin/user/input') ?>" class="btn btn-flat btn-primary btn-sm">
        <i class="fas fa-plus"></i> Tambah
        </a>
        </div>
      </div>

        <div class="card-body p-0">
          <table class="table table-bordered table-hover mb-0 text-center align-middle">
            <thead class="table-dark">
              <tr>
                <th style="width: 50px">No</th>
                <th>Foto</th>
                <th>Nama</th>
                <th>Email</th>
                <th>No HP</th>
                <th>Jenis Kelamin</th>
                <th style="width: 120px">Aksi</th>
              </tr>
            </thead>
        <tbody>
        <?php if (!empty($admins)): ?>
            <?php foreach ($admins as $i => $a): ?>
                <tr>
                    <td><?= $i + 1 ?></td>
                    <td>
                        <?php if ($a['foto']): ?>
                            <img src="<?= base_url('uploads/admin/' . $a['foto']) ?>" alt="Foto" width="50" height="50" class="rounded-circle">
                        <?php else: ?>
                            <span class="text-muted">Tidak ada</span>
                        <?php endif; ?>
                    </td>
                    <td><?= esc($a['nama_admin']) ?></td>
                    <td><?= esc($a['email']) ?></td>
                    <td><?= esc($a['no_hp']) ?></td>
                    <td><?= esc($a['jenis_kelamin']) ?></td>
                    <td>
                      <a href="<?= base_url('admin/user/detail/' . $a['id_admin']) ?>" class="btn btn-success btn-sm" title="Lihat">
                        <i class="fas fa-eye"></i>
                      </a>
                      <a href="<?= base_url('admin/user/edit/' . $a['id_admin']) ?>" class="btn btn-warning btn-sm" title="Edit">
                        <i class="fas fa-edit"></i>
                      </a>
                      <a href="<?= base_url('admin/user/delete/' . $a['id_admin']) ?>" class="btn btn-danger btn-sm" title="Hapus" onclick="return confirm('Yakin ingin menghapus data ini?');">
                        <i class="fas fa-trash"></i>
                      </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="7" class="text-center text-muted">Belum ada data admin.</td></tr>
        <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
