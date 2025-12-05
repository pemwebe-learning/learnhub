<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h3 class="card-title mb-0">Data Siswa</h3>
          <a href="<?= base_url('admin/siswa/input') ?>" class="btn btn-flat btn-primary btn-sm">
          <i class="fas fa-plus"></i> Tambah
          </a>
        </div> 

        <div class="card-body p-0">
          <table class="table table-bordered table-hover mb-0 text-center align-middle">
            <thead class="table-dark">
              <tr>
                <th style="width: 50px">No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Foto</th>
                <th>kelas</th>
                <th style="width: 150px">Aksi</th>
              </tr>
            </thead>
            <tbody>
            <?php if (!empty($detail_siswa)): ?>
            <?php foreach ($detail_siswa as $i => $a): ?>
                <tr>
                    <td><?= $i + 1 ?></td>
                    
                    <td><?= esc($a['nama_siswa']) ?></td>
                    <td><?= esc($a['email']) ?></td>
                    <td><?= esc($a['nama_kelas']) ?></td>
                    <td>
                        <?php if ($a['foto']): ?>
                            <img src="<?= base_url('uploads/siswa/' . $a['foto']) ?>" alt="Foto" width="50" height="50" class="rounded-circle">
                        <?php else: ?>
                            <span class="text-muted">Tidak ada</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="<?= base_url('admin/siswa/detail/'. $a['id_siswa']) ?>" class="btn btn-success btn-sm" title="Lihat">
                      <i class="fas fa-eye"></i>
                    </a>
                    <a href="<?= base_url('admin/siswa/edit/'. $a['id_siswa']) ?>" class="btn btn-warning btn-sm" title="Edit">
                      <i class="fas fa-edit"></i>
                    </a>
                    <a href="<?= base_url('admin/siswa/delete/'. $a['id_siswa']) ?>" class="btn btn-danger btn-sm" title="Hapus" onclick="return confirm('Yakin ingin menghapus data ini?');">
                      <i class="fas fa-trash"></i>
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
