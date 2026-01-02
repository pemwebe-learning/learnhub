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
          <table id="example1" class="table table-bordered table-hover mb-0 text-center align-middle">
            <thead class="table-dark">
              <tr>
                <th style="width: 100px">No</th>
                <th>Mapel</th>
                <th>kelas</th>
                <th style="width: 150px">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php if (!empty($mapel_by_guru)): ?>
            <?php foreach ($mapel_by_guru as $i => $a): ?>
                <tr>
                    <td><?= $i + 1 ?></td>
                    <td><?= esc($a['nama_mapel']) ?></td>
                    <td><?= esc($a['nama_kelas']) ?></td>
                    <td>
                    <a href="<?= base_url('guru/materi/'. $a['id_mapel']) ?>" class="btn btn-warning btn-sm" title="Edit">
                      <i class="fas fa-edit"></i>
                    </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="7" class="text-center text-muted">Belum ada data mapel.</td></tr>
        <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
