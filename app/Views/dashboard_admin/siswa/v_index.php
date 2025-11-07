<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h3 class="card-title mb-0">Data Siswa</h3>
        </div>

        <div class="card-body p-0">
          <table class="table table-bordered table-hover mb-0 text-center align-middle">
            <thead class="table-dark">
              <tr>
                <th style="width: 50px">No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Password</th>
                <th>Foto</th>
                <th>kelas</th>
                <th style="width: 120px">Aksi</th>
              </tr>
            </thead>
            <tbody>
            <?php if (!empty($siswa)): ?>
            <?php foreach ($siswa as $i => $a): ?>
                <tr>
                    <td><?= $i + 1 ?></td>
                    
                    <td><?= esc($a['nama_siswa']) ?></td>
                    <td><?= esc($a['email']) ?></td>
                    <td><?= esc($a['no_hp']) ?></td>
                    <td><?= esc($a['jenis_kelamin']) ?></td>
                    <td>
                        <?php if ($a['foto']): ?>
                            <img src="<?= base_url('siswa/' . $a['foto']) ?>" alt="Foto" width="50" height="50" class="rounded-circle">
                        <?php else: ?>
                            <span class="text-muted">Tidak ada</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="#" class="btn btn-success btn-sm" title="Lihat">
                      <i class="fas fa-eye"></i>
                    </a>
                    <a href="#" class="btn btn-warning btn-sm" title="Edit">
                      <i class="fas fa-edit"></i>
                    </a>
                    <a href="#" class="btn btn-danger btn-sm" title="Hapus" onclick="return confirm('Yakin ingin menghapus data ini?');">
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
